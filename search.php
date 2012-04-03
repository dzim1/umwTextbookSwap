<?php 
session_start();
error_reporting(~E_ALL);
include "header.html" ;
include "db_connect.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Search</title>
</head>

<body>
<div id="contents">

	<center><h1>Search for a Person</h1></center>
	<p>*you do not have to fill all fields</p>

	<form name="userSearch" method="post" id="userSearch" action="search.php">
		<table>

			<tr><td><h2>User Name: </h2></td><td> <input type="text" name="user" id="user"/></td></tr>

			<!--<tr><td><h2>Email: </h2></td><td> <input type="test" name="email" id="email" /></td></tr>-->

		</table>

		<tr><td>&nbsp;</td><td><input type ="submit" value=Search /></td></tr>
	</form>
</div>

<div id="contents">
	<center><h1>Search for a Book</h1></center>
	<p>*you do not have to fill all fields<p>
	
	<form name="bookSearch" method="post" id="bookSearch" action="search.php">
	
		<table>

		<tr><td><h2>Book Name: </h2></td><td> <input type="text" name="bookName" id="bookname" /></td></tr>
		<!--
		<tr><td><h2>Subject: </h2></td>
			<td><select name="subject" id="subject">
				<option value="Business">Business</option>
				<option value="History">History</option>
				<option value="CompSci">Comp Sci</option>
				<option value="Art">Art</option>
				<option value="Math">Math</option>
				<option value="Language">Language</option>
				<option value="Music">Music</option>
				<option value="Science">Science</option>
			</select></td>
		-->
		</table>
		<tr><td>&nbsp;</td><td><input type="submit" value="Search" /></td></tr>
	</form>
	

<?php
	$user = $_POST['user'];
	$book = $_POST['bookName'];
	
	if ($user != null)
	{
		$query = "Select * from user WHERE user = '$user'";
   
		$result = mysqli_query($db, $query);
   
		if ($row = mysqli_fetch_array($result))
		{
			$_SESSION['profile']= $row['User'];
			echo"<meta http-equiv=\"REFRESH\" content=\"0;url=editProfile.php\">";
		}
	}
	else if ($book != null)
	{
		$query1 = "Select * from Books Where Title LIKE \"%$book%\"";
		$result2 = mysqli_query($db, $query1);
		
		if ($rowd = mysqli_fetch_array($result2))
		{
			echo "<center><table id=\"hor-minimalist-b\">\n<tr><th>Title</th><th>Author</th><th>Subject</th><th>User</th><tr>\n\n";
		}
		else
		{
			echo "<h2>NO RESULTS";
		}
		
		while($rowj = mysqli_fetch_array($result2)) 
		{
			$bid = $rowj['BID'];
			$title = $rowj['Title'];
			$author = $rowj['Author'];
				
			$query0 = "SELECT * FROM Junction WHERE BID = '$bid'";
			$result1 = mysqli_query($db, $query0);
				
			while ($rowh = mysqli_fetch_array($result1))
			{
				$uid = $rowh['UID'];
				$subject = $rowh['Class'];
					
				$query2 = "SELECT * FROM User where ID = '$uid'";
				$result3 = mysqli_query($db, $query2);
					
				while ($rowu = mysqli_fetch_array($result3))
				{
					$user = $rowu['User'];
				}
			}
				
			echo "<tr><td>$title</td><td>$author</td><td>$subject</td><td><a href = 'redirectProfile.php?user=$user'> $user </a></td></tr>\n";
		}
		if ($rowd = mysqli_fetch_array($result2))
		{
			echo "</table></center>\n";
		}
	}
	else 
	{
		echo "<p>Sorry, I did not find what you where searching for</p>\n";
	}
?>

</div>
</body>
</html>