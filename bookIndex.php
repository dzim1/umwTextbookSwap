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
	<title>Book Index </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

	<body>
	
	<div id="contents">
	
		<?php
			include "db_connect.php";
			
			$query = "SELECT * FROM Books ORDER BY Title;";
			$result = mysqli_query($db, $query);
			
			echo "<center><h1> Book Index </h1></center>";
			
			echo "<center><table id=\"hor-minimalist-b\">\n<tr><th>Title</th><th>Author</th><tr>\n\n";
			while($row = mysqli_fetch_array($result)) 
			{
				$title = $row['Title'];
				$author = $row['Author'];
				echo "<tr><td>$title</td><td>$author</td></tr>\n";
			}
			echo "</table></center>\n"; 
		?>
	</div>
	</body>
</html>
