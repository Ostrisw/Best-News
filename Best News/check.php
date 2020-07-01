<?php
$mysql = new mysqli('localhost','root','root','News');
if (!$mysql) { die ('Connection error: ' . mysql_error()); }

$FirstName = filter_var(trim($_POST['Fname']), FILTER_SANITIZE_STRING);
$LastName = filter_var(trim($_POST['Lname']), FILTER_SANITIZE_STRING);
$Email = filter_var(trim($_POST['Email']), FILTER_SANITIZE_STRING);
$Password = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);
$Password = md5($Password); 

$mysql->query("INSERT INTO `user` (`Email`,`FirstName`,`LastName`,`Password`) VALUES('$Email','$FirstName','$LastName','$Password')");

$mysql->close();
header('Location:/Best News/BEST NEWS.html');

?>
