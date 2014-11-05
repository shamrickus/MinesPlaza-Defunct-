<?php
 function validateUser(){
    session_regenerate_id ();
    $_SESSION['valid'] = 1;
    $_SESSION['userid'] = $userid;
}

function isLoggedIn(){
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

function logout(){
    $_SESSION = array();
    session_destroy();
}


?>