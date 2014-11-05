<?php
require 'variables.php';

$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$email = $_POST['email'];
if($pass1 != $pass2) header('Location: register_form.php');
if(strlen($username) > 30) header('Location: register_form.php');
if(strlen($email) > 32) header('Location: register_form.php');

$salt = createSalt();
$hash = hash('sha256', $salt . $hash);

$query = "INSERT INTO users ( username, password, salt, email )
			VALUES ( '$username' , '$hash' , '$salt', '$email' );";
if ($stmt = $mysqli->prepare($query)){
	$stmt->execute();
	$stmt->close();
}
header('Location: login.php');

function createSalt(){
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}
?>