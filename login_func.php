<?php
 function validateUser($userid){
    session_regenerate_id();
    $_SESSION['valid'] = 1;
    $_SESSION['userid'] = $userid;
    $_SESSION['time'] = time();
}

function isLoggedIn(){
    if(isset($_SESSION['valid']) && $_SESSION['valid']) return true;
    return false;
}

function logout(){
	session_start();
    session_destroy();
    $_SESSION = array();
    Header('Location: login.php?msg=You have been logged out');
}


?>