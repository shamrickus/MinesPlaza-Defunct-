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
$msg = '';
$msg .= validateEmail($email);print_r($msg);
$msg .= validateUsername($username);print_r($msg);
$msg .= validatePassword($pass, $pass_re);print_r($msg);
$msg .= validateName($first);print_r($msg);
$msg .= validateName($last);print_r($msg);
$msg .= validatePhone($phone);print_r($msg);
//
print_r($msg);
$page = $_REQUEST['page'];
$msg = validateCSRF($page, $csrf);
if($msg != ''){
    header('Location: '.$page.'.php?msg='.$msg);
    exit();
}

if($stmt=$mysqli->prepare ("UPDATE users SET email = ?, username = ?, password = ? WHERE id = ".$USERID)){
	$stmt->bind_param("sss", $_POST["emailaddr"], $_POST["username"], password_hash($_POST["passwd"], PASSWORD_DEFAULT));
	$stmt->execute();
	$stmt->close();

	if($stmt=$mysqli->prepare("UPDATE user_detail SET first_name = ?, last_name = ?, phone = ? WHERE user_id = ".$USERID)){
		$stmt->bind_param("sss", $_POST["firstname"], $_POST["lastname"], $_POST["phone"]);
		$stmt->execute();
		$stmt->close();
		header("Location: accounts.php?msg=Updated Succesfully");
	}
	else
		header("Location: accounts.php?msg=Update Failed");

		

}
else
	header("Location: accounts.php?msg=Update Failed");
 ?>
