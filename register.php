<?php
require 'variables.php';
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$email = $_POST['email'];
//NEED TO SANITIZE INPUTS BEFORE DOING DB STUFF

$msg = '';
if(strcmp($pass1, $pass2) != 0)$msg = 'Passwords do not match';
if(strlen($username) > 30) $msg = 'Username is too long';
if(strlen($email) > 32) $msg= 'Email is too long';

$query = 'SELECT * FROM users WHERE username = "'.$username.'"';
$result = $mysqli->query($query);
if($result->num_rows) $msg = 'Username already exists';

$query = 'SELECT * FROM users WHERE email = "'.$email.'"';
$result = $mysqli->query($query);
if($result->num_rows) $msg =  'Email already exists';

if($msg != '') $msg = header('Location: register_form.php?msg='.$msg);
else{
	$salt = createSalt();
	$hash = hash('sha256', $pass1);
	$hash = hash('sha256', $salt . $hash);

	$query = "INSERT INTO users ( username, password, salt, email )
				VALUES ( '$username' , '$hash' , '$salt', '$email' );";
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
		$stmt->close();
		header('Location: login.php?msg=Created User');
	}
}


function createSalt(){
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}
?>