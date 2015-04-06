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
	$csrf = "";
	if($token != ""){
		$csrf = sha1(microtime());
	}
	else $csrf = sha1($token);

	
	
	if($html){
		return "<meta content='".$csrf."' name='csrf_token'></meta>";
	}
	else return $csrf;
}

?>