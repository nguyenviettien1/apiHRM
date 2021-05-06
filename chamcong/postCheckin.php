<?php
$token=$_GET["token"];
require("../jwt.php");
include('../connect/connect.php');
include('../function.php');
 $json = JWT::decode($token,"example_key",array('HS256'));
 $userID = $json->userID;
 $day = date("Y-m-d");
 $today = date("d");
 $monthAfter = date('Y-m-d',strtotime('+1 month',strtotime(date('Y-m-d'))));
 $month = date('Y-m-d',strtotime('-'.$today.' day',strtotime($monthAfter)));
 $checkIn = time();  
 $todayX = date("Y-m-d h:i:s");
 $sqlx = "INSERT INTO checkin(userID, month, day, checkInAt, created_at, updated_at) 
         VALUES ('$userID', '$month', '$day','$checkIn',NOW(),NOW())
        ";
$resultx =$mysqli->query($sqlx);

$array = array('message'=>'Thành công','status'=> true);
echo(json_encode($array));

?>