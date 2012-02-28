<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Book 2 </title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>

<div id="contents">

<?php
	include "db_connect.php";
	$username = $_SESSION['username'];
?>

					<!-- CONTENT -->
					<h1>Your book was added</h1>

					<?php
					
					echo "<p>Thanks for adding a book, $username!</p>";

					$title = $_POST['title'];
					$author = $_POST['author'];
					$isbn = $_POST['isbn'];
					$class = $_POST['class'];
					$price = $_POST['price'];
					$quality = $_POST['quality'];
					
					echo "<p>Book Title: $title</p>";
					echo "<p>Author: $author</p>";
					echo "<p>ISBN: $isbn</p>";
					echo "<p>Class: $class</p>";
					echo "<p>Price: $price</p>";
					echo "<p>Quality: $quality</p>";

					?>

<form method = "post" action = 	"addBook.php">

<table>
<tr><td>&nbsp;</td><td><input type="submit" value="Add Another Book" /></td></tr>
</table>

<?php

$insertInto = "INSERT INTO Books VALUES('$username', 	'$title', 'author', '$isbn', '$class', '$price', '$quality')";
$insertIntoQuery = mysqli_query($db, $insertInto);

$query = "SELECT * FROM Books ORDER BY User";
$result = mysqli_query($db, $query) or die("Error Querying Database");
					
mysqli_close($db);

?>

					
					</form>
					<!-- END CONTENT -->
					
				</div>
	</body>
</html>