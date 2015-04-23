
<?php
	
$dsn='mysql:host=localhost;dbname=user;charset=utf8';
$user='root';
$pass='';
try
{
$db= new PDO ($dsn, $user, $pass);
}
	catch (PDOException $e) {
	echo 'Подключение не удалось: '.$e->getMessage();
	}		
?>