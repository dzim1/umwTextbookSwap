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
$profile  = $_SESSION['profile'];
?>

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

<form method = "post" action = "addBook.php">
<table>
<td>&nbsp;</td><td><input type="submit" value="Add Another Book" /></td>
</form>
<form method = "post" action = "editProfile.php">
<td>&nbsp;</td><td><input type="submit" value="Back to edit profile page" /></td>
</table>
</form>

<?php
$insertInto = "INSERT INTO `Books` (`Title`, `Author`, `ISBN`) VALUES ('$title', '$author', '$isbn')";
$insertIntoQuery = mysqli_query($db, $insertInto);

$userid = "SELECT * from User WHERE User = '$profile'";
$uid = mysqli_query($db, $userid);
if($id = mysqli_fetch_array($uid))
{
	$uid = (int)$id['ID'];
}

$bookid = "SELECT * from Books WHERE Title = '$title'";
$bid = mysqli_query($db, $bookid);
if($id = mysqli_fetch_array($bid))
{
	$bid = (int)$id['BID'];
}

$insertInto1 = "INSERT INTO Junction VALUES ($id2,$id3,'$class', '$price', '$quality')";
$insertIntoQuery1 = mysqli_query($db, $insertInto1);

//echo "<p> $uid </p>";
//echo "<p> $bid </p>";

$insertInto = "INSERT INTO `Junction` (`UID`, `BID`, `Class`, `Price`, `Quality`) VALUES
('$uid','$bid', '$class', '$price', '$quality')";
$insertIntoQuery = mysqli_query($db, $insertInto);

?>

</div>
</body>
</html>