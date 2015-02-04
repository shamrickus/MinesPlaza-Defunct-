<?php

require '../includes/variables.php';
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['password'];
$pass_re = $_REQUEST['password_re'];


//NEED TO SANITIZE INPUTS BEFORE DOING DB STUFF

$mysqli = CreateDBObject();

$msg = '';
$msg .= validatePassword($pass, $pass_re);
// Unimplemented functions
/*
$msg .= validateEmail($email);
$msg .= validateUsername)($username);
*/

if(strcmp($msg, '')) $msg = header('Location: login.php?msg='.$msg);
else{
	$hash = password_hash($pass1, PASSWORD_DEFAULT);

	$query = "INSERT INTO users ( username, password, email )
				VALUES ( '$username' , '$hash' , '$email' );";
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
		$stmt->close();
		header('Location: home.php?msg=Created User');
	}
    else{
        header('Location: login.php?msg=Cannot Insert Into DB');
    }
}

?>