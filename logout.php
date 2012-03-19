<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Log Out </title>
	<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
	<?php
		session_destroy();
	?>
	
	<div id="contents">
		<h1> You have been logged out </h1>
		<p><a href="index.php">Go back to Home Page</a></p>
	</div>
	
</body>
</html>
