<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	<link href="css/style.css" media="screen" rel="stylesheet">
	
</head> 

<body>

<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>

<div id="welcome">	
	<h2>Welcome, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	
	<p><a href="logout.php">Logout</a> Here!</p>
</div>

<?php
}
?>
<footer>© 2015 DEN. All rights reserved. </footer>	
</body>
</html>