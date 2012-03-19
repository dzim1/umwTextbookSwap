<?php
	session_start();
?>
<html>
<head>
<?php
	$_SESSION['profile'] = $_GET['user'];
?>
<meta http-equiv="REFRESH" content="0;url=editProfile.php">
</head>
</html>