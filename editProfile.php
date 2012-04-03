<?php
	session_start();
	include "header.html"
?>
<?php
	error_reporting(~E_ALL);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Profile Page </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>


	<body>
	<div id="contents">
			
		<?php
			include "db_connect.php";
		
			$username = $_SESSION['username'];
			$profile  = $_SESSION['profile'];
			
			//SQL for Email and Phone
			$queryMail = "SELECT UMWEmail FROM User WHERE User = '$profile'";
			$queryPhone = "SELECT Phone FROM User WHERE User = '$profile'";
			$resultMail = mysqli_query($db, $queryMail);
			$resultPhone = mysqli_query($db, $queryPhone);
			
			//Sets the variables beforehand for profile
			
			if ($username == $profile)
			{
				//Password Controller
				if ($_POST['oldpassword'] != null || $_POST['newpassword'] != null || $_POST['newpassword1'] != null )
				{
					$oldPassword = $_POST['oldpassword'];
					$newPassword = $_POST['newpassword'];
					$newPassword1 = $_POST['newpassword1'];
					if ($newPassword != $newPassword1)
					{
						echo "<p> The New Passwords you have entered do not match one another </p>";
					}
					else
					{
						$queryComparePass = "SELECT * FROM USER WHERE User = '$profile' AND Pass = SHA('$oldPassword')";
						$resultCompare = mysqli_query($db, $queryComparePass);
						if ($row1 = mysqli_fetch_array($resultCompare))
						{
							$querySetPass = "UPDATE User SET Pass = SHA('$newPassword') WHERE User = '$profile'";
							if (mysqli_query($db, $querySetPass))
							{
									echo "<p> You have changed your password </p>";
							}
						}
						else
						{
							echo "<p> The Current Password you have entered does not match your Current Password </p>";
						}
					}
				}
				//Email Controller
				if ($_POST['email'] == null)
				{
					if ($row = mysqli_fetch_array($resultMail))
					{
						$email = $row['UMWEmail'];
					}
					else
					{
						$email = "N/A";
					}
				}
				else
				{
					$setEmail = $_POST['email'];
					$querySetMail = "UPDATE User SET UMWEmail = '$setEmail' WHERE User = '$profile'";
					if (mysqli_query($db, $querySetMail))
					{
						$resultGetMail = mysqli_query($db, $queryMail);
						if ($row = mysqli_fetch_array($resultGetMail))
						{
							$email = $row['UMWEmail'];
						}
					}
				}
				//Phone # Controller
				if ($_POST['phone'] == null)
				{
					if ($row = mysqli_fetch_array($resultPhone))
					{
						$phone = $row['Phone'];
					}
					else
					{
						$phone = "N/A";
					}
				}
				else
				{
					$setPhone = $_POST['phone'];
					$querySetPhone = "UPDATE User SET Phone = '$setPhone' WHERE User = '$profile'";
					if (mysqli_query($db, $querySetPhone))
					{
						$resultGetPhone = mysqli_query($db, $queryPhone);
						if ($row = mysqli_fetch_array($resultGetPhone))
						{
							$phone = $row['Phone'];
						}
					}
				}
			}
			else
			{
				// Set Email
				if ($row = mysqli_fetch_array($resultMail))
				{
					$email = $row['UMWEmail'];
				}
				else
				{
					$email = "N/A";
				}
				//Set Phone
				if ($row = mysqli_fetch_array($resultPhone))
				{
					$phone = $row['Phone'];
				}
				else
				{
					$phone = "N/A";
				}			
			}
			//This displays the profile according to who is viewing it
			if ($username == $profile)
			{
				echo "<center><h1>Edit Your Profile: $profile</h1></center>";
				
				//Change Password Form
				echo "<form method=\"post\" action=\"editProfile.php\">";
				echo "<h2><u> Change Password </u></h2>";
				echo "<label for=\"oldpassword\">Current Password</label><input type=\"password\" name=\"oldpassword\" /><br/>";
				echo "<label for=\"newpassword\">New Password</label><input type=\"password\" name=\"newpassword\" /><br/>";
				echo "<label for=\"newpassword1\">Re-enter New Password</label><input type=\"password\" name=\"newpassword1\" />";
				echo "<input type=\"submit\" value=\"Change Password\" ><br/>";
			
				//Change Email Form
				echo "<form method=\"email\" action=\"editProfile.php\">";
				echo "<h2><u> Change Email </u></h2>";
				echo "<label for=\"email\">$email <br/> Edit Email :</label><input type=\"text\" maxlength =\"20\" id=\"email\" name=\"email\" />";
				echo "<input type=\"submit\"value=\"Change Email\" /><br/>";
				
				//Change Phone Form
				echo "<form method=\"phone\" action=\"editProfile.php\">";
				echo "<h2><u> Change Phone Number </u></h2>";
				echo "<label for=\"phone\">$phone<br/> Edit Phone #:</label><input type=\"text\" maxlength =\"10\" id=\"phone\" name=\"phone\" />";
				echo "<input type=\"submit\" value=\"Change Phone #\" />";
			}
			else
			{
				echo "<center><h1> $profile's Profile </h1></center>";
				echo "<h2> $profile's email: $email";
				echo "<h2> $profile's phone #: $phone";
			}
		?>
			
	</div>
	
	<div id="contents">
	
	
		<?php
			
			echo "<center><h1> $profile's Books</h1>";
			
			$queryId = "SELECT * FROM User WHERE User = '$profile'";
			$resultId = mysqli_query($db, $queryId);
			
			if ($id = mysqli_fetch_array($resultId))
			{
				$coolId = (int)$id['ID'];
			}
			
			$queryJ = "SELECT * FROM Junction WHERE UID = $coolId";
			$resultJ = mysqli_query($db, $queryJ);
			
			echo "<table id=\"hor-minimalist-b\">\n<tr><th>Title</th><th>Author</th><th>Subject</th><th>Price</th><th>Quality</th></tr>\n\n";
			while($rowJ = mysqli_fetch_array($resultJ)) 
			{
				$class = $rowJ['Class'];
				$book = (int)$rowJ['BID'];
				$price = $rowJ['Price'];
				$quality = $rowJ['Quality'];
				
				$queryB = "SELECT * FROM Books WHERE BID = $book";
				$resultB = mysqli_query($db, $queryB);
				
				while ($rowB = mysqli_fetch_array($resultB))
				{
					$title = $rowB['Title'];
					$author = $rowB['Author'];
				}
				echo "<tr><td>$title</td><td>$author</td><td>$class</td><td>$price</td><td>$quality</td></tr>\n";
			}
			echo "</table>\n </center>"; 
		?>
	</div>
	</body>
</html>
	
