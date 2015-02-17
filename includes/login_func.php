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
    $query = 'INSERT INTO user_session (user_id, session_id, expire_time)
				VALUES ( '.$userid.', "'.$sid.'", '.$time.')';
	if ($stmt = $mysqli->prepare($query)){
		$stmt->execute();
    }
    else{
        logout($userid);
    }
}

//Check if a user is logged in
 function loggedIn($userid = 0){
     $mysqli = createDBObject();
    if($userid == 0) $userid = $_COOKIE['SessionUser'];
    $query = "SELECT * FROM user_session WHERE user_id= ?";
    if($stmt = $mysqli->prepare($query)){
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(strcmp($_SESSION['SessionID'], $row['session_id'])){
            if(time() < $row['expire_time']){
                $time = time() + 3600;
                $query = "UPDATE user_session SET expire_time = ? WHERE user_id = ?";
                if($stmt = $mysqli->prepare($query)){
                    $stmt->bind_param('ii', $time, $userid);
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
function logout($userid = 0){
    $mysqli = createDBObject();
    if($userid == 0) $userid = $_COOKIE['SessionUser'];
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    setcookie('SessionUser', 0, 1);
    setcookie('SessionId', 0, 1);
    Header('Location: login.php?msg=You have been logged out');
}

//Validates password for registering
function validatePassword($pass, $pass_re){
    if($pass != $pass_re) return "Passwords don't match\n";
    if(strlen($pass) < 7) return "Password is not long enough\n";
    return '';
}

function validateEmail($email){
  if(!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) return "Must be a valid email\n";
  return '';
}

function validateUsername($user){
  if(strlen($user) < 4) return "Username must be atleast three characters\n";
  if(!preg_match('/^[\pL0-9]+$/', $user)) return "Username must be alpha numeric\n";
  return '';
}

?>