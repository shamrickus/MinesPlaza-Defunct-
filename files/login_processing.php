<?php
require('../includes/variables.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$mysqli = CreateDBObject();
//NEED TO DO SANITIZATION BEFORE DOING DB STUFF
$result = $mysqli->query('SELECT password, salt, uid
        FROM users
        WHERE username = "'.$username.'"');
if ($row = $result->fetch_assoc())
{
	$hash = hash('sha256', $row['salt'].hash('sha256', $password));
	if($hash != $row['password']){
    	header('Location: login.php?msg=Wrong Password');
    	die();
	}
	else{
		validateUser($row['uid']);
		print_r('here');
		header('Location: test.php');
	}
}else{
	header('Location: login.php?msg=No User With That Name');
	die();
}
?>