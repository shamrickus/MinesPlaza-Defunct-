<?php
require('../includes/variables.php');
require('../includes/login_func.php');

$username = $_REQUEST['login_username'];
$password = $_REQUEST['login_password'];

$mysqli = CreateDBObject();

//NEED TO DO SANITIZATION BEFORE DOING DB STUFF

$result = $mysqli->query('SELECT password, id FROM users WHERE username = "'.$username.'"');
if ($row = $result->fetch_assoc())
{
	if(password_verify($password, $row['password'])){
    	header('Location: login.php?msg=Invalid Username/Password');
	}
	else{
		createSession($row['id']);
		header('Location: test.php?msg=Successfully logged in.');
	}
}else{
	header('Location: login.php?msg=Invalid Username/Password');
}
?>