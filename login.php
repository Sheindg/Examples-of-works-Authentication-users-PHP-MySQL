<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
		<title>Login</title>
		<link href="css/style.css" media="screen" rel="stylesheet">
	
</head> 

	<body>

	<div class="container mlogin">
		<div id="login">
	<h1>LOGIN</h1>
<form name="loginform" id="loginform" action="" method="POST">
	<p>
		<label for="Username">Username<br />
		<input type="text" name="userName" id="userName" class="input" value="" size="40" placeholder="Enter your login" /></label>
	</p>
	<p>
		<label for="password">Password<br />
		<input type="password" name="password" id="password" class="input" value="" size="40" placeholder="Enter your password" /></label>
	</p>
	<p class="submit">
		<input type="submit" name="login" class="button" value="Log In" />
	</p>
	<p class="regtext">No account yet? <a href="register.php" >Register Here</a>!</p>
	<p class="regtext">Forgot password? <a href="forgotpass.php" >Restore Password Here</a>!</p>
</form>

		</div>

    </div>

<?php

require_once("includes/connectionDb.php");

if(isset($_SESSION["session_username"])){
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['userName']) && !empty($_POST['password'])) {
	$userName=$_POST['userName'];
	$password=$_POST['password'];
   
	$res = $db->prepare ("SELECT * FROM usertbl WHERE username = :userName AND password = :password");
	$res -> bindValue (':userName', $userName);
	$res -> bindValue (':password', $password);
	$res -> execute();
	$numrows = $res ->rowCount();
	
	if($numrows!=0)
    {
		
			$_SESSION['session_username']=$userName;
			header("Location: intropage.php");
			
			} else {

			$message =  "Invalid Username or Password!";
			}

	} else {
    $message = "All fields are required!";
	}
}

if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} 
?>	
		
	<footer>© 2015 DEN. All rights reserved. </footer>	
</body>
</html>
	