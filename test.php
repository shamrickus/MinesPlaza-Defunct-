<?php
require 'variables.php';
session_start();
if(!isLoggedIn())
{
    header('Location: login.php?msg=You need to be logged in to view test.php.');
    die();
}
echo '<span>Log in required page</span>';
echo "\n";
echo '<a href="logout.php">Logout</a>';
?>