<?php
require ('../includes/common_func.php');
require_once('../includes/variables.php');

//Create a session
function createSession($userid){
    global $mysqli;
    
    $time = time() + 3600;
    setcookie('SessionUser', $userid, $time);
    setcookie('SessionID', random(32), $time);
    $sid = $_COOKIE['SessionID'];

    
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    $query = 'INSERT INTO user_session (user_id, session_id, expire_time)
                VALUES ( '.$userid.', "'.$sid.'", '.$time.')';
    if ($stmt = $mysqli->prepare($query)){
        $stmt->execute();
        defineUser($userid);
    }
    else{
        logout($userid);
    }
}

//Check if a user is logged in, 0 means check cookies,
//-1 means check cookies but don't logout if not logged in
 function loggedIn($userids = 0){
    global $mysqli;
    if($userids <= 0) $userid = $_COOKIE['SessionUser'];
    if($userid == 0 && $userids != -1) logout($userid);
    else if($userid == 0) return false;
    $query = "SELECT * FROM user_session WHERE user_id= ?";
    if($stmt = $mysqli->prepare($query)){
        $stmt->bind_param('i', $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if(strcmp($_COOKIE['SessionID'], $row['session_id'])){
            if(time() < $row['expire_time']){
                $time = time() + 3600;
                $query = "UPDATE user_session SET expire_time = ? WHERE user_id = ?";
                if($stmt = $mysqli->prepare($query)){
                    $stmt->bind_param('ii', $time, $userid);
                    $stmt->execute();
                }
                else if($userids != -1) logout($userid);
                else return false;
            }
            else if($userids != -1) logout($userid);
            else return false;
        }
        else if($userids != -1) logout($userid);
        else return false;
     }
     else if($userids != -1) logout($userid);
     else return false;
     return true;
}

//Logout given user or logout user based on cookies
function logout($userid = 0){
    global $mysqli;
    if($userid == 0) $userid = $_COOKIE['SessionUser'];
    $result = $mysqli->query('DELETE FROM user_session WHERE user_id='.$userid);
    setcookie('SessionUser', 0, time() + 3600 * 3600);
    setcookie('SessionId', "", time() + 3600 * 3600);
    defineUser(-1);
    header('Location: login.php?msg=You have been logged out');
    exit();
}

//Validates password for registering
function validatePassword($pass, $pass_re){
    if($pass != $pass_re) return "Passwords don't match||";
    if(strlen($pass) < 6) return "Password must be atleast 6 characters||";
    return '';
}

function validateEmail($email, $new){
    global $mysqli;
    if(strlen($email) > 32) return "Email is too long||";
    if(!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) return "Must be a valid email||";
    if($stmt = $mysqli->prepare('SELECT * FROM users WHERE email = ?') && $new){
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (count($row)) return "Email already exists||";
    }
    else return "Cannot connect to DB||";
  return '';
}

function validateUsername($user, $new){
    global $mysqli;
    if(strlen($user) < 3) return "Username must be at least three characters||";
    if(strlen($user) > 30) return "Username is too long||";
    if(!preg_match('/^[\pL0-9]+$/', $user)) return "Username must be alpha numeric||";
    if($stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?') && $new){
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (count($row)) return "Username already exists||";
    }
    else return "Cannot connect to DB||";
    return '';
}

function validatePhone($phone){
    if(strlen($phone) != 10) return "Phone Number is not right length||";
    else if(!preg_match('/^[0-9]+/', $phone)) return "Phone Numbers should only contain 0-9||";
    else return '';
}

function validateName($name){
    if(strlen($name) <= 0) return "Name is too short||";
    else if(strlen($name) > 63) return "Name is too long||";
    else if(!preg_match('/^[\pL0-9]+$/', $name)) return "Name must be alpha numeric||";
    else return '';
}

function validateCaptcha($cap){
    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify?secret=6LfEZgITAAAAAB0LQG4S46ghPpLi5dThqB5ZOX5Y&response='.$cap.'&remoteip='.$_SERVER['REMOTE_ADDR']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if(!$data = curl_exec($ch)){
        $response = json_decode($data,true);
        if (!$response['success']) return 'Recaptcha error';
    }
    curl_close($ch);
    return '';
}
//Pass userid for given uid, 0 for destroy, -1 for cookies
function defineUser($uid = -1){
    global $mysqli;
    if($uid || $uid == -1){
        if($uid == -1){
            if(!isset($_COOKIE['SessionUser'])) return;
            $uid = $_COOKIE['SessionUser'];  
        } 
        $stmt = $mysqli->prepare('SELECT * FROM user_detail, users WHERE users.id = user_detail.user_id AND users.id = ?');
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $GLOBALS['USERID'] = $uid;
        $GLOBALS['USERNAME'] = $row['username'];
        $GLOBALS['EMAIL'] = $row['email'];
        $GLOBALS['FLAGGED'] = $row['flagged'];
        $GLOBALS['FIRSTNAME'] = $row['first_name'];
        $GLOBALS['LASTNAME'] = $row['last_name'];
        $GLOBALS['PHONE'] = $row['phone'];
        $GLOBALS['DISABLED'] = $row['disabled'];
        $GLOBALS['MOD'] = $row['moderator'];
        $stmt->close();
    }
    else{
        $GLOBALS['USERID'] = 0;
        $GLOBALS['USERNAME'] = "";
        $GLOBALS['EMAIL'] = "";
        $GLOBALS['FIRSTNAME'] = "";
        $GLOBALS['LASTNAME'] = "";
        $GLOBALS['PHONE'] = 0;
        $GLOBALS['DISABLED'] = false;
        $GLOBALS['MOD'] = false;
    }
}

?>