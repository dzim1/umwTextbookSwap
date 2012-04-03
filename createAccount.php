<?php
	session_start();
?>
<?php
	error_reporting(~E_ALL);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Create An Account </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
<?php
  include "db_connect.php";
  $username = trim($_POST['username']);
  $pass = trim($_POST['pass']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  
  $query = "INSERT INTO User (User,Pass,UMWEmail,Phone) VALUES ('$username',SHA('$pass'),'$email', '$phone')";
  $query1 = "Select * from User WHERE User = '$username'";
  $result1 = mysqli_query($db, $query1);
  
  if ($username == null)
  {
	echo "<h1>Create An Account</h1>\n  <form method=\"post\" action=\"createAccount.php\">";
    echo "<label for=\"username\">Username:</label><input type=\"text\" maxlength =\"30\" id=\"username\" name=\"username\" /><br />";
    echo "<label for=\"pass\">Password:</label><input type=\"password\" maxlength =\"40\" id=\"pass\" name=\"pass\" /><br />";
	echo "<label for=\"email\">Email:</label><input type=\"text\" maxlength =\"20\" id=\"email\" name=\"email\" /><br />";
	echo "<label for=\"phone\">Phone:</label><input type=\"text\" maxlength =\"10\" id=\"phone\" name=\"phone\" /><br />";
	echo "
		<table>
			<tr>
				<td>
					<input type=\"submit\" value=\"Register\" name=\"submit\">
					</form>
				</td>
				<td>
				<form method =\"post\" action =\"index.php\">
					<td>&nbsp;</td><td><input type=\"submit\" value=\"Home\" /></td>
				</form>
				</td>
			</tr>
		</table>";
  }
  else
  {
	if ($row = mysqli_fetch_array($result1))
	{
		if ($username != null)
		{
			echo "<p>There already is someone with that username</p>\n";
		}
		echo "<h1>Create An Account</h1>\n  <form method=\"post\" action=\"createAccount.php\">";
		echo "<label for=\"username\">Username:</label><input type=\"text\" maxlength =\"30\" id=\"username\" name=\"username\" /><br />";
		echo "<label for=\"pass\">Password:</label><input type=\"password\" maxlength =\"40\" id=\"pass\" name=\"pass\" /><br />";
		echo "<label for=\"email\">Email:</label><input type=\"text\" maxlength =\"20\" id=\"email\" name=\"email\" /><br />";
	    echo "<label for=\"phone\">Phone:</label><input type=\"text\" maxlength =\"10\" id=\"phone\" name=\"phone\" /><br />";
		echo "
			<table>
				<tr>
					<td>
						<input type=\"submit\" value=\"Register\" name=\"submit\">
						</form>
					</td>
					<td>
					<form method =\"post\" action =\"index.php\">
						<td>&nbsp;</td><td><input type=\"submit\" value=\"Home\" /></td>
					</form>
					</td>
				</tr>
			</table>";
	}
	else if (($pass == NULL) || ($username == NULL) || ($email == NULL) || ($phone == NULL))
	{
		echo "<p> You left a field empty </p>\n";
		
		echo "<h1>Create An Account</h1>\n  <form method=\"post\" action=\"createAccount.php\">";
		echo "<label for=\"username\">Username:</label><input type=\"text\" maxlength =\"30\" id=\"username\" name=\"username\" /><br />";
		echo "<label for=\"pass\">Password:</label><input type=\"password\" maxlength =\"40\" id=\"pass\" name=\"pass\" /><br />";
		echo "<label for=\"email\">Email:</label><input type=\"text\" maxlength =\"20\" id=\"email\" name=\"email\" /><br />";
	    echo "<label for=\"phone\">Phone:</label><input type=\"text\" maxlength =\"10\" id=\"phone\" name=\"phone\" /><br />";
		echo "
			<table>
				<tr>
					<td>
						<input type=\"submit\" value=\"Register\" name=\"submit\">
						</form>
					</td>
					<td>
					<form method =\"post\" action =\"index.php\">
						<td>&nbsp;</td><td><input type=\"submit\" value=\"Home\" /></td>
					</form>
					</td>
				</tr>
			</table>";
	}
	else
	{
		$result = mysqli_query($db, $query);
		$query2 = "Select User from user where User = '$username'";
		$result2 = mysqli_query($db, $query2);
		if ($row = mysqli_fetch_array($result2))
		{
			$_SESSION['username'] = $row['User'];
		}
		
		$_SESSION['profile']= $username;
		echo "<p>Congratulations, you have created an account</p>\n";
		echo "<p><a href=\"editProfile.php\">Continue</a></p>";
	} 
  }
?>
  
</div>
</body>
</html>
