<?php
session_start();
error_reporting(~E_ALL);
include "header.html"
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Add Book </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="contents">

<center><h1>Add a Book</h1></center>

<!--<p>Add a book to be put on the market. </p> -->

<?php
include "db_connect.php";
?>

<form method = "post" action = "addBook2.php">
<table>
	<tr><td><h2>Book Title</h2></td><td><input type="text" id="title" maxlength = "30" name="title" /></td></tr>
	<tr><td><h2>Author</h2></td><td><input type="text" id="author" maxlength = "30" name="author" /></td></tr>
	<tr><td><h2>ISBN</h2></td><td><input type="number" id="isbn" name="isbn" /></td></tr> 
	<tr><td><h2>Class</h2></td><td><input type="text" id="class" maxlength = "20" name="class" /></td></tr>
	<tr><td><h2>Price</h2></td><td><input type="number" maxlength = "10" id="price" name="price" /></td></tr> 
	<tr><td><h2>Quality</h2></td><td>
	<select name="quality" id="quality">
		<option value="New">New</option>
		<option value="Excellent">Excellent</option>
		<option value="Good">Good</option>
		<option value="Decent">Decent</option>
		<option value="Bad">Bad</option>
	</select></td>
</table>

<table>
	<td>&nbsp;</td><td><input type="submit" value="Submit Book" /></td>
</table>
</form>

</div>
</body>
</html>
