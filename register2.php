<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thank You For Registering </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

	<body>
	<div id="contents">
		


		<?php
		
			include "db_connect.php";
			include "BookExchange.sql";
			
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phonenumber = $_POST['phonenumber'];
			
			
		    echo "<p>$username $password</p>";
			echo '<p>$username $password</p>';
			echo "<p>$email $phonenumber</p>";
			echo '<p>$email $phonenumber</p>';
			
									
	
					
?>
		
	</div>
	</body>
</html>
	