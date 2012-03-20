<?php
	session_start();
?>
<?php include "header.html" ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

	<body>
	<div id="contents">
		


	<form method = "post" action = "profile.php">
					<table>
					<tr><td></td>User Name<td><input type="text" id="username" name="username" /></td></tr>					
					<tr><td></td>Password<td><input type="text" id="password" name="password" /></td></tr>				
					<tr><td>&nbsp;</td><td><input type="submit" value="Log In" /></td></tr>
					</table>
					
					</form>		
	
		<?php
			include "db_connect.php";		
			$_SESSION['user']
			
			
			$queryMail = "SELECT * FROM User WHERE User = '{$_SESSION['user']}'";
		
					
?>
		
	</div>
	</body>
</html>
	
