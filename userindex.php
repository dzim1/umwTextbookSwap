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
			
			$query = "SELECT * FROM User ORDER BY User;";
			$result = mysqli_query($db, $query);
			
			echo "<center><h1> User Index </h1></center>";
			
			echo "<center><table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>Email</th><th>Profile</th><tr>\n\n";
			while($row = mysqli_fetch_array($result)) 
			{
				$user = $row['User'];
				$email = $row['UMWEmail'];
				echo "<tr><td  >$user</td><td >$email</td><td><a href = 'redirectProfile.php?user=$user'> $user </a></td></tr>\n";
			}
			echo "</table></center>\n"; 
		?>
	</div>
	</body>
</html>
