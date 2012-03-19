<?php
	session_start();
?>
<?php
	error_reporting(~E_ALL);
?>
<html>
<head>
<?php
	if ($_GET['user'] != NULL)
	{
		$_SESSION['profile'] = $_GET['user'];
	}
	else
	{
		$_SESSION['profile'] = $_SESSION['username'];
	}
	?>
<meta http-equiv="REFRESH" content="0;url=editProfile.php">
</head>
</html>