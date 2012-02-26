<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Create An Account </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
<?php
  include "db_connect.php";
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $zip = $_POST['zip'];
  
  $query = "INSERT INTO users (username,password,zipcode) VALUES ('$username',Sha('$pass'),$zip)";
  $query1 = "Select * from users WHERE username = '$username'";
  $result1 = mysqli_query($db, $query1);
  
  if ($username == null)
  {
	echo "<h1>Create An Account</h1>\n  <form method=\"post\" action=\"createAccount.php\">";
    echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
    echo "<label for=\"pass\">Password:</label><input type=\"password\" id=\"pass\" name=\"pass\" /><br />";
	echo "<label for=\"zip\">ZipCode:</label><input type=\"text\" id=\"zip\" name=\"zip\" /><br />";
    echo "<input type=\"submit\" value=\"CreateAccount\" name=\"submit\" />";
  }
  else
  {
	if ($row = mysqli_fetch_array($result1))
	{
		if ($username != null)
		{
			echo "<p>There already is someone with that username</p>\n";
		}
		echo "<h1>Create An Account</h1>\n  <form method=\"post\" action=\"createAccount.php\">";
		echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
		echo "<label for=\"pass\">Password:</label><input type=\"password\" id=\"pass\" name=\"pass\" /><br />";
		echo "<label for=\"zip\">ZipCode:</label><input type=\"text\" id=\"zip\" name=\"zip\" /><br />";
		echo "<input type=\"submit\" value=\"CreateAccount\" name=\"submit\" />";
	}
	else
	{
		$result = mysqli_query($db, $query);
		$query2 = "Select zipcode from users where username = '$username'";
		$result2 = mysqli_query($db, $query2);
		if ($row = mysqli_fetch_array($result2))
		{
			$_SESSION['zip'] = $row['zipcode'];
		}
		echo "<p>Congratulations, you have created an account</p>\n";
		echo "<p><a href=\"search.php\">Continue</a></p>";
	} 
  }
?>
  
</div>
</body>
</html>