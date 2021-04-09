<?php
// require __DIR__ . '/vendor/autoload.php';
// include('function.php');
// include('connect/connect.php');

// $key = "example_key";
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$userName = $obj['userName'];
$password = md5($obj['password']);


require("jwt.php");
require("dbCon.php");

$qr = "SELECT * FROM account
       WHERE userName ='$userName'
       AND password ='$password'
       ";
$accounts =$mysqli->query($qr);
if(mysqli_num_rows($accounts)==1){
    $a = mysqli_fetch_array($accounts);
    $token = array();
    $token["id"]=$a["id"];
    $token["userID"]=$a["userID"];
    $token["userName"]=$a["userName"];
    $jsonwebtoken = JWT::encode($token,"BI_MAT");
echo JsonHelper::getJson("token",$jsonwebtoken);
}else{
    echo "ERROR";
}

?>