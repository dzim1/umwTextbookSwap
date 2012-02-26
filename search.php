<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Search</title>
</head>

<body>
<div id="contents">
	<h1>Search for a Person</h1>
	<p>*you do not have to fill all fields</p>

	<form name="userSearch" method="post" id="userSearch" action="submitSearch.php">
	<table>

	<tr><td><b>User Name: </b></td><td> <input type="text" name="user" id="user"/></td></tr>

	<tr><td><b>Email: </b></td><td> <input type="test" name="email" id="email" /></td></tr>

</table>

	<tr><td>&nbsp;</td><td><input type ="submit" value=Search /></td></tr>
</form>
</div>


<div id="contents">
	<h2>Search for a Book</h2>
	<p>*you do not have to fill all fields<p>
	
	<form name="bookSearch" method="post" id="bookSearch" action="submitSearch.php">
	
	<table>

	<tr><td><b>Book Name: </b></td><td> <input type="text" name="bookName" id="bookname" /></td></tr>

	<tr><td><b>Subject: </b></td>
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
</div>
</body>
</html>
