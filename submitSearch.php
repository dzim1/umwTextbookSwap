<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="CSS.css" />
  <title>Search</title>
</head>

<body>
<div id="content">

<?php
   include('db_connect.php');
   
  	$name = $_POST['user'];
 	$query = "";
   
	if($name != "") {
		$query = "SELECT username FROM User WHERE username = '$name'";
	}

	$result = mysqli_query($db, $query) or die("Error Querying Database");
	echo '<H1>Search Results</H1>';

	while($row = mysqli_fetch_array($result)) {
		$first = $row['first_name'];
		$last = $row['new_last_name'];
		$id = $row['user_id'];

	} 
?>
</div>
</body>
</html>

