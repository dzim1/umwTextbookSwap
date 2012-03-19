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
		
		<table id=\"hor-minimalist-b\">
			<tr>
			<td>
			<form method = "post" action = "logout.php">
			<td>&nbsp;</td><td><input type="submit" value="Logout" /></td>
			</form>
			</td>
	
			<td>
			<form method="post" action="search.php" /></td>
			<td>&nbsp;</td><td><input type="submit" value="Search" /></td>
			</form>
			</td>
			</tr>
		</table>
		
		<hr/ color="#0000A0">
	
		<?php
			include "db_connect.php";
			
			$query = "SELECT * FROM User ORDER BY User;";
			$result = mysqli_query($db, $query);
			
			echo "<table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>Email</th><th>Profile</th><tr>\n\n";
			while($row = mysqli_fetch_array($result)) 
			{
				$user = $row['User'];
				$email = $row['UMWEmail'];
				echo "<tr><td  >$user</td><td >$email</td><td><a href = 'redirectProfile.php?user=$user'> $user </a></td></tr>\n";
			}
			echo "</table>\n"; 
		?>
	</div>
	</body>
</html>