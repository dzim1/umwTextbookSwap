<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>New User Page </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

	<body>
	<div id="contents">
		


	<form method = "post" action = "login.php">
					<table>
					<tr><td>User Name</td><td><input type="text" id="username" name="username" /></td></tr>
					<tr><td>Password</td><td><input type="text" id="password" name="password" /></td></tr>
					<tr><td>School Email</td><td><input type="text" id="email" name="email" /></td></tr>
				    <tr><td>Phone Number</td><td><input type="text" id="phonenumber" name="phonenumber" /></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" value="Register" /></td></tr>
					</table>
					
					</form>		
	
		<?php
			include "db_connect.php";
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phonenumber = $_POST['phonenumber'];
			
			
			$insertInto = "INSERT INTO user VALUES('$username',SHA('$password'),'$email','$phonenumber',0,0,0)";
			$insertIntoQuery = mysqli_query($db, $insertInto);
	
					
?>
		
	</div>
	</body>
</html>
	
