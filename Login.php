<?php
	session_start();
?>
<?php
	error_reporting(~E_ALL);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="contents">
<?php
  include "db_connect.php";
  
  
  
  if ($_POST['username'] != null)
  {
		$name = $_POST['username'];
  }
  else
  {
		$name = null;
  }
  if ($_POST['pw'] != null)
  {
		$pw = $_POST['pw'];
  }
  else
  {
		$pw = null;
  }
	
   $query = "Select * from user WHERE user = '$name' AND pass = SHA('$pw')";
   $result = mysqli_query($db, $query);
   
   if ($row = mysqli_fetch_array($result))
   {
		$result1 = mysqli_query($db, $query1);
   		echo "<p>Thanks for logging in, $name</p>\n";
   		echo "<p><a href=\"editProfile.php\">Continue</a></p>";
		$_SESSION['username']=$name;
		$_SESSION['profile']= $name;
   }
   else 
    {
		if ($name != null)
		{
			echo "<p>Incorrect username or password</p>\n";
		}
   		echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    	echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
        echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
        echo "<input type=\"submit\" value=\"Login\" name=\"submit\" />";
    }
   
  
  
?>
  
  </div>
</body>
</html>
