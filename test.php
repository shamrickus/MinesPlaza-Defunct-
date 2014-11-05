<?php
session_start();
if(!isLoggedIn())
{
    header('Location: login.php');
    die();
}
?>