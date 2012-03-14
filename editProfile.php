<?php
	session_start();
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
	
	<table>
	<form method="post" action="search.php" /></td>
	<td>&nbsp;</td><td><input type="submit" value="Search" /></td>
	
				
	</form>
<form method="post" action="addBook.php" /></td>
	<td>&nbsp;</td><td><input type="submit" value="Add a Book" /></td>
	
				
	</form>
	</table>
		<?php
			include "db_connect.php";
		
			//Session variables (This should be fixed later WED)
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
				//SQL for Password
				$queryPass = "SELECT Pass FROM User WHERE User = '$profile'";
				$resultPass = mysqli_query($db, $queryPass);
			
				//Password Controller
				if ($_POST['password'] == null)
				{
					if ($row = mysqli_fetch_array($resultPass))
					{
						$password = $row['Pass'];
					}
					else
					{
						$password = "N/A";
					}
				}
				else
				{
					$setPassword = $_POST['password'];
					$querySetPass = "UPDATE User SET Pass = '$setPassword' WHERE User = '$profile'";
					if (mysqli_query($db, $querySetPass))
					{
						$resultGetPass = mysqli_query($db, $queryPass);
						if ($row = mysqli_fetch_array($resultGetPass))
						{
							$password = $row['Pass'];
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
				echo "<h1>Edit Your Profile: $profile</h1>";
				
				//Change Password Form
				echo "<form method=\"post\" action=\"editProfile.php\">";
				echo "<label for=\"password\">Current Password: $password <br/> Edit Password:</label><input type=\"password\" id=\"password\" name=\"password\" />";
				echo "<input type=\"submit\" value=\"Change Password\" ><br/>";
			
				//Change Email Form
				echo "<form method=\"email\" action=\"editProfile.php\">";
				echo "<label for=\"email\">Current Email: $email <br/> Edit Email :</label><input type=\"text\" id=\"email\" name=\"email\" />";
				echo "<input type=\"submit\"value=\"Change Email\" /><br/>";
				
				//Change Phone Form
				echo "<form method=\"phone\" action=\"editProfile.php\">";
				echo "<label for=\"phone\">Current Phone #: $phone <br/> Edit Phone #:</label><input type=\"text\" id=\"phone\" name=\"phone\" />";
				echo "<input type=\"submit\" value=\"Change Phone #\" />";
			}
			else
			{
				echo "<h1> $profile's Profile </h1>";
				echo "<h3> $profile's email: $email";
				echo "<h3> $profile's phone #: $phone";
			}
		?>
		
	</div>
	</body>
</html>
	