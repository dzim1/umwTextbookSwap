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
	//include "db_connect.php";
	//include "BookExchange.sql";
?>

					<!-- CONTENT -->
					<h3>Your book was added</h3>
					<p>Thanks for adding a book!
					
					<?php
					
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

					</form>
					<!-- END CONTENT -->
					
				</div>
	</body>
</html>