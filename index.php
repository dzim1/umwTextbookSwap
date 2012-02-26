<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Home Page </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="contents">				
	<!-- CONTENT -->
	<h3>UMW Textbook Swap</h3>
	<p>Welcome to the official textbook swap website at the University of Mary Washington! </p>
					
	<form method = "post" action = "login.php">
		<table>
			<tr><td>&nbsp;</td><td><input type="submit" value="Login" /></td>
	</form>
	<form method = "post" action = "register.php">
		<td>&nbsp;</td><td><input type="submit" value="Register" /></td>
	</form>
	<form method= "post" action= "search.php">
		<td>&nbsp;</td><td><input type="submit" value="Search" /></td></tr>
	</form>
	</table>

					<!-- END CONTENT -->
					
</div>
</body>
</html>
