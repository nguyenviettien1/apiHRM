<?php
require __DIR__ . '/vendor/autoload.php';
function getToken($userName, $key='example_key'){
	$token = array(
		"userName" => $userName,
	    "iat" => time(),
	    "expire" =>time() + 86400*2 //2 days
	);

	return $jwt = JWT::encode($token, $key);
}

?>