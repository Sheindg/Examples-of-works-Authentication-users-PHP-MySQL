
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
		<title>Registration</title>
		<link href="css/style.css" media="screen" rel="stylesheet"> 
	
</head> 
<body>

	<div class="container mregister">
		<div id="login">
		<h1>REGISTRATION</h1>
		
<form name="registerform" id="registerform" action="register.php" method="post">
	<p>
		<label for="fullName">Full Name<br />
		<input type="text" name="fullName" id="fullName" class="input" size="40" placeholder="Enter your full name"  value="" /></label>
	</p>
	
	<p>
		<label for="userName">username<br />
		<input type="text" name="userName" id="userName" class="input" placeholder="Enter your login" value="" size="40" /></label>
	</p>
		
	<p>
		<label for="email">Email<br />
		<input type="email" name="email" id="email" class="input" placeholder="Enter your Email" value="" size="40" /></label>
	</p>
			
	<p>
		<label for="password">Password<br />
		<input type="password" name="password" id="password" class="input" placeholder="Enter your password" value="" size="40" /></label>
	</p>	
	
	<p class="submit">
		<input type="submit" name="signUp" id="signUp" class="button" value="Sign Up" />
	</p>
	
	<p class="regtext">Already a member? <a href="login.php" >Login Here</a>!</p>
</form>
	
		</div>
	</div>
		
<?php require_once("includes/connectionDb.php");

if(isset($_POST["signUp"])){

if(!empty($_POST['fullName']) && !empty($_POST['email']) && !empty($_POST['userName']) && !empty($_POST['password'])) {
	$fullName=$_POST['fullName'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	
		$res = $db->prepare ("SELECT * FROM usertbl WHERE userName = :userName");
		$res -> bindValue (':userName', $userName);
		$res -> execute();
		$numrows = $res ->rowCount();

		if($numrows==0)
		{
			
			$sql=$db->exec("INSERT INTO usertbl
			(`fullName`, `email`, `username`, `password`) 
			VALUES ('$fullName','$email', '$userName', '$password')");
			
$message = "Account Successfully Created";
		} else {
		$message = "That username already exists! Please try another one!";
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
