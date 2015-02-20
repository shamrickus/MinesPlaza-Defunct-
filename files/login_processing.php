<?php
require_once('../includes/variables.php');
require('../includes/login_func.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$cap = $_REQUEST['g-recaptcha-response'];

if(validateCaptcha($cap) != '') header('Location: login.php?msg=Invalid Recaptcha');

if($stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?')){
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(!password_verify($password, $row['password'])) header('Location: login.php?msg=Invalid Username/Password');
    else{
        createSession($row['id']);
        header('Location: home.php?msg=Successfully logged in.');
        exit();
    }
}
else header('Location: login.php?msg=Invalid Username/Password');
exit();
?>