<?php

function random($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateCSRF($page, $html = true, $token = ""){
	global $mysqli, $USERID;
	$USERID = 1;
	if($USERID){
		$csrf = "";
		if($token == ""){
			$csrf = sha1($token);
		}
		else $csrf = sha1(microtime());

		$stmt = $mysqli->prepare('DELETE FROM user_csrf WHERE user_id = ? AND page = ?');
		$stmt->bind_param("is", $USERID, $page);
		$stmt->execute();
		$stmt->close();

		if($stmt = $mysqli->prepare('INSERT INTO user_csrf (user_id, page, csrf, expire_time) VALUES (?, ?, ?, ?)')){
			$time = time() + 3600;
			$stmt->bind_param('issi', $USERID, $page, $csrf, $time);
			$stmt->execute();
			$stmt->close();
			if($html){
				return "<meta content='".$csrf."' name='csrf_token'></meta>";
			}
			else return $csrf;
		}
	}
}

function validateCSRF($page, $token){
	global $mysqli, $USERID;
	$USERID = 1;
	if($USERID){
		if($stmt = $mysqli->prepare("SELECT * FROM user_csrf WHERE user_id = ? AND page = ?")){
			$stmt->bind_param("is", $USERID, $page);
			$stmt->execute();
			$result = $stmt->get_result();
        	$row = $result->fetch_assoc();
        	if($row['csrf'] != $token) return 'Invalid csrf token';
        	else if ($row['expire_time'] < time()) return 'Token as expired';
        	else{
        		$stmt->close();
        		$stmts = $mysqli->prepare('DELETE FROM user_csrf WHERE user_id = ? AND page = ?');
				$stmts->bind_param("is", $USERID, $page);
				$stmts->execute();
				$stmts->close();
        		return '';
        	}
		}
		else{
			return "Cannot connect to DB";
		}
	}
	else{
		return "You are not logged in";
	}
}

?>