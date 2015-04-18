<?php
include "header.php";

loggedIn(0);

$csrf = $_REQUEST['csrf'];
//
$username = $_REQUEST['username'];
$email = $_REQUEST['emailaddr'];
$pass = $_REQUEST['passwd'];
$pass_re = $_REQUEST['passwd_re'];//The password recheck
$phone = $_REQUEST['phone'];
$first = $_REQUEST['first_name'];
$last = $_REQUEST['last_name'];
$pass_check = $_REQUEST['change_pass'];
$msg = '';
$msg .= validateEmail($email);
$msg .= validateUsername($username);
if($pass_check!="on") {
	$msg .= validatePassword($pass, $pass_re);
}
$msg .= validateName($first);
$msg .= validateName($last);
$msg .= validatePhone($phone);
//
print_r($msg);
$page = $_REQUEST['page'];
$msg = validateCSRF($page, $csrf);
if($msg != ''){
    header('Location: '.$page.'.php?msg='.$msg);
    exit();
}

if($pass_check =="on"){
	if($stmt=$mysqli->prepare ("UPDATE users SET email = ?, username = ?, password = ? WHERE id = ".$GLOBALS["USERID"])){
		$stmt->bind_param("sss", $_POST["emailaddr"], $_POST["username"], password_hash($_POST["passwd"], PASSWORD_DEFAULT));
		$stmt->execute();
		$stmt->close();

	}
	else
		header("Location: accounts.php?msg=Update Failed");
}else {
	if($stmt=$mysqli->prepare ("UPDATE users SET email = ?, username = ?, WHERE id = ".$GLOBALS["USERID"])){
		$stmt->bind_param("ss", $_POST["emailaddr"], $_POST["username"]);
		$stmt->execute();
		$stmt->close();

	}
	else
		header("Location: accounts.php?msg=Update Failed");
}

	if($stmt=$mysqli->prepare("UPDATE user_detail SET first_name = ?, last_name = ?, phone = ? WHERE user_id = ".$GLOBALS["USERID"])){
		$stmt->bind_param("sss", $_POST["firstname"], $_POST["lastname"], $_POST["phone"]);
		$stmt->execute();
		$stmt->close();
		header("Location: accounts.php?msg=Updated Succesfully");
	}
	else
		header("Location: accounts.php?msg=Update Failed");
 ?>
