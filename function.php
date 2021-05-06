<?php
require __DIR__ . '/vendor/autoload.php';
function getToken($userName, $userID ,$key='example_key'){
	$token = array(
		"userName" => $userName,
		"userID" => $userID,
	    "iat" => time(),
	    "expire" =>time() + 86400*2 //2 days
	);

	return $jwt = JWT::encode($token, $key);
}

?>