<?php

require ('../includes/variables.php');
require '../includes/login_func.php';

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['password'];
$pass_re = $_REQUEST['password_re'];

$msg = '';
$msg .= validateEmail($email);
$msg .= validateUsername($username);
$msg .= validatePassword($pass, $pass_re);

if($msg != '') $msg = header('Location: register.php?msg='.$msg);
else{
	$hash = password_hash($pass, PASSWORD_DEFAULT);

	if ($stmt = $mysqli->prepare('INSERT INTO users ( username, password, email )
				VALUES ( ?, ?, ?)')){
        $stmt->bind_param('sss', $username, $hash, $email);
		$stmt->execute();
		$stmt->close();
		header('Location: login.php?msg=Created User');
	}
    else{
        header('Location: register.php?msg=Cannot Insert Into DB');
    }
}

?>