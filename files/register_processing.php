<?php

require ('../includes/variables.php');
require '../includes/login_func.php';

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['password'];
$pass_re = $_REQUEST['password_re'];


//NEED TO SANITIZE INPUTS BEFORE DOING DB STUFF

$msg = '';
$msg .= validatePassword($pass, $pass_re);
// Unimplemented functions
/*
$msg .= validateEmail($email);
$msg .= validateUsername)($username);
*/

if($msg != '') $msg = header('Location: register.php?msg='.$msg);
else{
	$hash = password_hash($pass, PASSWORD_DEFAULT);

	$query = "INSERT INTO users ( username, password, email )
				VALUES ( '$username' , '$hash' , '$email' );";
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
		$stmt->close();
		header('Location: login.php?msg=Created User');
	}
    else{
        header('Location: register.php?msg=Cannot Insert Into DB');
    }
}

?>