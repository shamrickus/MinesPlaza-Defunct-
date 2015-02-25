<?php
	include "../includes/variables.php";
	include "../includes/login_func.php";

	loggedIn(0);
	if($stmt=$mysqli->prepare ("UPDATE users SET first_name = ?,last_name = ?, email = ?, username = ?, password = ? WHERE id = 7")){
		$stmt->bind_param("sssss", $_POST["firstname"], $_POST["lastname"], $_POST["emailaddr"], $_POST["passwd"] );
		$stmt->execute();
		$stmt->close();
	
		header("Location: accounts.php?msg=Updated Succesfully");
	}
	else
		header("Location: accounts.php?msg=Update Failed");
 ?>
