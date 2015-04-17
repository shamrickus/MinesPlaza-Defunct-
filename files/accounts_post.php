<?php
include "header.php";

loggedIn(0);

$csrf = $_REQUEST['csrf'];
$page = $_REQUEST['page'];
$msg = validateCSRF($page, $csrf);
if($msg != ''){
    header('Location: '.$page.'.php?msg='.$msg);
    exit();
}

if($stmt=$mysqli->prepare ("UPDATE users SET email = ?, username = ?, password = ? WHERE id = ".$USERID)){
	$stmt->bind_param("sss", $_POST["emailaddr"], $_POST["username"], $_POST["passwd"] );
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
