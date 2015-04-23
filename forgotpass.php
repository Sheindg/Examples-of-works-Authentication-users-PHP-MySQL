<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Restore Password</title>
	<link href="css/style.css" media="screen" rel="stylesheet">
		
</head> 
<body>

<div  class="container mrestore">
	<div id="login">
	<h1>RESTORE PASSWORD</h1>
<form name="forgot" method="post" action="forgotpass.php">
	<p>
		<label for="UserName">Username<br />
		<input type="text" name="userName" id="userName" class="input" placeholder="Username" value="" size="40" placeholder="Enter your login" /></label>
	</p>
									
	<p class="submit">
		<input type="submit" name="go" class="button" value="Restore" />
    </p>
		
	<p class="text">No account yet? <a href="register.php" >Register Here</a>!</p>
	<p class="regtext">Already a member? <a href="login.php" >Login Here</a>!</p>
            
</form>
        
    </div>
</div>

<?php    

require_once("includes/connectionDb.php");

if(isset($_POST["go"]))
{

if(!empty($_POST['userName']))
	{
	
	$userName=$_POST['userName'];
	
	$res = $db->prepare ("SELECT email FROM usertbl WHERE userName = :userName");
	$res -> bindValue (':userName', $userName);
	$res -> execute();
	$numrows = $res ->rowCount();

	$row = $res->fetchColumn();
	
	$mail=$row;
			
		if($numrows==1)
		{
		$length = rand(6, 12);
		$string = "0123456789abcdefghijklmnoprstuvwxyz!@#$%^&*_-+"; 
		function getPassword ($length, $string) {
		$str = mb_strlen ($string) - 1;
		$pass=null;
		for ($i=0; $i < $length; $i++)
			$pass.=  mb_substr ($string, rand (0, $str), 1);
	return $pass;  
		}
	
$pass= getPassword ($length, $string);

$sql=$db->prepare("UPDATE usertbl SET `password`= ? WHERE `username`= ?");

$sql->execute(array($pass,$userName));

mail($mail, "RESTORE PASSWORD", "Hello $userName your new password : $pass");
print_r(error_get_last());
 $message =  "Email sent to your new password!";

	} else {
	 $message = "Invalid username!";
			}

}else {
	 $message = "All fields are required!";
	}
}

if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	<footer>© 2015 DEN. All rights reserved. </footer>	
</body>
</html>
	