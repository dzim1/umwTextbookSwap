<?php
	session_start();
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
		
			//Session variables (This should be fixed later WED)
			$username = "Bob";//$_SESSION['username'];
			$profile = "Lex";//$_SESSION['profile'];
			
			//SQL for Email and Phone
			$queryMail = "SELECT UMWEmail FROM User WHERE User = '$profile'";
			$queryPhone = "SELECT Phone FROM User WHERE User = '$profile'";
			$resultMail = mysqli_query($db, $queryMail);
			$resultPhone = mysqli_query($db, $queryPhone);
			
			
			//Sets the variables beforehand for profile
			if ($username == $profile)
			{
				//SQL for Password
				$queryPass = "SELECT Pass FROM User where User = '$profile'";
				$resultPass = mysqli_query($db, $queryPass);
			
				//Password Controller
				if ($_POST['password'] == null)
				{
					if ($row = mysqli_fetch_array($resultPass))
					{
						$password = mysqli_fetch_assoc($resultPass);
					}
					else
					{
						$password = "N/A";
					}
				}
				else
				{
					$password = $_POST['password'];
					$querySetPass = "UPDATE User SET Pass = '$password' WHERE User = '$profile'";
					$resultSetPass = mysqli_query($db, $querySetPass);
					$password = mysqli_fetch_assoc($resultSetPass);
				}
				//Email Controller
				if ($_POST['email'] == null)
				{
					if ($row = mysqli_fetch_array($resultMail))
					{
						$email = mysqli_fetch_assoc($resultMail);
					}
					else
					{
						$email = "N/A";
					}
				}
				else
				{
					$email = $_POST['email'];
					$querySetMail = "UPDATE User SET UMWEmail = '$email' WHERE User = '$profile'";
					$resultSetMail = mysqli_query($db, $querySetMail);
					$email = mysqli_fetch_assoc($resultSetMail);
				}
				//Phone # Controller
				if ($_POST['phone'] == null)
				{
					if ($row = mysqli_fetch_array($resultPhone))
					{
						$phone = mysqli_fetch_assoc($resultPhone);
					}
					else
					{
						$phone = "N/A";
					}
				}
				else
				{
					$phone = $_POST['phone'];
					$querySetPhone = "UPDATE User SET Phone = '$phone' WHERE User = '$profile'";
					$resultSetPhone = mysqli_query($db, $querySetPhone);
					$phone = mysqli_fetch_assoc($resultSetPhone);
				}
			}
			else
			{
				// Set Email
				if ($row = mysqli_fetch_array($resultMail))
				{
					$email = mysqli_fetch_assoc($resultMail);
				}
				else
				{
					$email = "N/A";
				}
				//Set Phone
				if ($row = mysqli_fetch_array($resultPhone))
				{
					$phone = mysqli_fetch_assoc($resultPhone);
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
				echo "<input type=\"submit\" value=\"Change Password\" name=\"password\" ><br/>";
			
				//Change Email Form
				echo "<form method=\"email\" action=\"editProfile.php\">";
				echo "<label for=\"email\">Current Email: $email <br/> Edit Email :</label><input type=\"text\" id=\"email\" name=\"email\" />";
				echo "<input type=\"submit\"value=\"Change Email\" name=\"email\" /><br/>";
				
				//Change Phone Form
				echo "<form method=\"phone\" action=\"editProfile.php\">";
				echo "<label for=\"phone\">Current Phone #: $phone <br/> Edit Phone #:</label><input type=\"text\" id=\"phone\" name=\"phone\" />";
				echo "<input type=\"submit\" value=\"Change Phone #\" name=\"phone\" />";
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
	