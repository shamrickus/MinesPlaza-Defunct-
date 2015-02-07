<?php
require ('../includes/common_func.php');
require ('../includes/variables.php');

function createSession($userid){
    session_start();
    $_SESSION['user_id'] = $userid;
    $_SESSION['session_id'] = random(32);
    $sid = $_SESSION['session_id'];
    
    $mysqli = createDBObject();
    
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    $query = "INSERT INTO user_session (user_id, session_id, expire_time)
				VALUES ( '.$userid.', '.$sid.')";
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
    }
    else{
        logout($userid);
    }
    
    return true;
}

 function validateUser($userid){
    $query = "SELECT FROM user_session WHERE user_id='.$userid";
     if($stmt = $mysqli->prepare($query)){
        $stmt->execute();
        $row = $stmt->fetch_assoc();
        if($row['user_id'] == $_SESSION['user_id'] && strcmp($_SESSION['session_id'], $row['session_id']));
     }
}

function validatePassword($pass, $pass_re){
    if(!strcmp($pass, $pass_re)) return "Passwords don't match";
    if(length($pass) < 7) return "Password is not long enough";
    return '';
}

function isLoggedIn(){
    
}

function logout($user_id = ''){
	session_start();
    session_destroy();
    $_SESSION = array();
    if(!strcmp($user_id, '')){
        $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    }
    Header('Location: login.php?msg=You have been logged out');
}


?>