<?php 
session_start();
error_reporting(~E_ALL);include "header.html" 
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

	<form name="userSearch" method="post" id="userSearch" action="editProfile.php">
		<table>

			<tr><td><h2>User Name: </h2></td><td> <input type="text" name="user" id="user"/></td></tr>

			<tr><td><h2>Email: </h2></td><td> <input type="test" name="email" id="email" /></td></tr>

		</table>

		<tr><td>&nbsp;</td><td><input type ="submit" value=Search /></td></tr>
	</form>
</div>

<div id="contents">
	<center><h1>Search for a Book</h1></center>
	<p>*you do not have to fill all fields<p>
	
	<form name="bookSearch" method="post" id="bookSearch" action="submitSearch.php">
	
		<table>

		<tr><td><h2>Book Name: </h2></td><td> <input type="text" name="bookName" id="bookname" /></td></tr>

		<tr><td><h2>Subject: </h2></td>
			<td><select name="subject" id="subject">
				<option value="Business">Business</option>
				<option value="History">History</option>
				<option value="CompSci">Comp Sci</option>
				<option value="Art">Art</option>
				<option value="Music">Music</option>
				<option value="Biology">Biology</option>
			</select></td>
			
		</table>
		<tr><td>&nbsp;</td><td><input type="submit" value="Search" /></td></tr>
	</form>
	
<?php
   $query = "Select User from user WHERE user = 'user'";
   
   $result = mysqli_query($db, $query);
   
   if ($row = mysqli_fetch_array($result))
   {
		$_SESSION['profile']= $row['User'];
   }
   else 
    {
		if ($name != null)
		{
			echo "<p>Sorry, I did not find what you where searching for</p>\n";
		}
   		//echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    	//echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
        //echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
        //echo "<input type=\"submit\" value=\"Login\" name=\"submit\" />";
    }
?>

</div>
</body>
</html>