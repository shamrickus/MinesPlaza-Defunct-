<?php
define('_DB_HOST', 'localhost');
define('_DB_PASS', 'foobar');
define('_DB_USER', 'root');
define('_DB_PORT', 3306);
define('_DB_TABLE', 'MinesPlaza');

if(!isset($mysqli)) $mysqli = createDBObject();
if(!isset($USERID)){
	$USERID = 0;
    $USERNAME = "";
    $EMAIL = "";
    $FIRSTNAME = "";
    $LASTNAME = "";
    $PHONE = 0;
    $DISABLED = false;
    $MOD = false;
}

function createDBObject(){
    $mysqli = new mysqli(_DB_HOST, _DB_USER, _DB_PASS, _DB_TABLE, _DB_PORT);
    $mysqli->set_charset('utf8');
    return $mysqli;
}
?>
