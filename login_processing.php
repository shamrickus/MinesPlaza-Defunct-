<?php
require('variables.php');
echo 'asdf';
session_start();
echo 'pfft';
$username = $_POST['username'];
$password = $_POST['password'];
$mysqli->$query = ("SELECT password, salt
        FROM users
        WHERE username = '$username'");
if ($row = $result->fetch_assoc())
{
	echo 'here';
	$hash = hash('sha256', $row['salt'] . hash('sha256', $password) );
	if($hash != $row['password']){
		echo 'plz';
    	header('Location: login.php');
    	die();
	}
	else validateUser();
}else{
	echo 'die';
	header('Location: login.php');
	die();
}
header('Location: test.php'):
?>