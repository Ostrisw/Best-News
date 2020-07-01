<?php
$mysql = new mysqli('localhost','root','root','News');
if (!$mysql) { die ('Connection error: ' . mysql_error()); }

$Email = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
$Password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$Password = md5($Password); 


$result = $mysql->query("SELECT * FROM `user` WHERE `Email` ='$Email' AND `Password` = '$Password' ");
$user = $result->fetch_assoc();
if(count($user) == 0){
	echo "Такой юзер не найден";
	exit();
}

setcookie('user', $user['name'], time() + 60, "/");

	$mysql->close();
	header('Location:/Best News/BEST NEWS.html');


?>