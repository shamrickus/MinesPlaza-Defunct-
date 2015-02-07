<?php
require ('../includes/common_func.php');
require_once('../includes/variables.php');

//Create a session
function createSession($userid){
    $time = time() + 3600;
    setcookie('SessionUser', $userid, $time);
    setcookie('SessionID', random(32), $time);
    $sid = $_COOKIE['SessionID'];
    
    $mysqli = createDBObject();
    
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    $query = "INSERT INTO user_session (user_id, session_id, expire_time)
				VALUES ( '.$userid.', '.$sid.', '.$time.')";
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
    }
    else{
        logout($userid);
    }
    
    return true;
}

//Check if a user is logged in
 function loggedIn($userid = ''){
    if(strcmp($userid, '')) $userid = $_COOKIE['SessionUser'];
    $query = "SELECT FROM user_session WHERE user_id='.$userid";
     if($stmt = $mysqli->prepare($query)){
        $stmt->execute();
        $row = $stmt->fetch_assoc();
        if(strcmp($_SESSION['SessionID'], $row['session_id'])){
            if(time() < $row['expire_time']){
                $time = time() + 3600;
                $query = "UPDATE user_session SET exipre_time = ".$time." WHERE user_id = ".$userid;
                if($stmt = $mysqli->prepare($query)){
                    $stmt->execute();
                }
                else logout($userid);
            }
            else logout($userid);
        }
        else logout($userid);
     }
     else logout($userid);
}

//Logout given user or logout user based on cookies
function logout($userid = ''){
    $mysqli = createDBObject();
    if(strcmp($userid, '')) $userid = $_COOKIE['SessionUser'];
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    setcookie('SessionUser', 0, 1);
    setcookie('SessionId', 0, 1);
    Header('Location: login.php?msg=You have been logged out');
}

//Validates password for registering
function validatePassword($pass, $pass_re){
    if($pass != $pass_re) return "Passwords don't match";
    if(strlen($pass) < 7) return "Password is not long enough";
    return '';
}




?>