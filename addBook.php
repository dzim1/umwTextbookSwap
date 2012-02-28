

<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Book </title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>

<div id="contents">

					<!-- CONTENT -->
					<h1>Add a Book</h1>
					<p>Add a book to be put on the market. </p>
					<form method = "post" action = "addBook2.php">

					<table>

					<tr><td>Book Title</td><td><input type="text" id="title" name="title" /></td></tr>
					<tr><td>Author</td><td><input type="text" id="author" name="author" /></td></tr>
					<tr><td>ISBN</td><td><input type="number" id="isbn" name="isbn" /></td></tr>	
					<tr><td>Class</td><td><input type="text" id="class" name="class" /></td></tr>
					<tr><td>Price</td><td><input type="number" id="price" name="price" /></td></tr>								<tr><td>Quality</td><td><input type="text" id="quality" name="quality" /></td></tr>

					<tr><td>&nbsp;</td><td><input type="submit" value="Submit Book" /></td></tr>

					</table>

<?php
	include "db_connect.php";

	//$username = $_SESSION['username'];
	$username = 'Bob';
	$insertInto = "INSERT INTO Books VALUES('$username', 	'$title', 'author', '$isbn', '$class', '$price', 	'$quality')";
	$insertIntoQuery = mysqli_query($db, $insertInto);
?>

					
					
					</form>
					<!-- END CONTENT -->
					
				</div>
	</body>
</html>