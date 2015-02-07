<?php
require_once('../includes/variables.php');
require('../includes/login_func.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//NEED TO DO SANITIZATION BEFORE DOING DB STUFF
$query = 'SELECT * FROM users WHERE username = "'.$username.'"';
if($stmt = $mysqli->prepare($query)){
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(!password_verify($password, $row['password'])) header('Location: login.php?msg=Invalid Username/Password');
    else{
        createSession($row['id']);
        header('Location: home.php?msg=Successfully logged in.');
    }
}
else header('Location: login.php?msg=Invalid Username/Password');
?>