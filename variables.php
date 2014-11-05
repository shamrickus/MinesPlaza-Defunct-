<?php
require 'login_func.php';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'foobar';
$db_table = 'MinesPlaza';
$db_port = 3306;
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_table, $db_port);
?>