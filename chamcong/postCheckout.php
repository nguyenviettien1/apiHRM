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
 $checkOut = time();  
 $sqlx = "  UPDATE checkin
            SET checkOutAt = '$checkOut', workTime = (checkOutAt - checkInAt)
            WHERE userID = '$userID' AND day = '$day' 
            AND month = '$month' AND checkInAt IS NOT NULL
        ";
$resultx =$mysqli->query($sqlx);

$array = array('message'=>'Thành công','status'=> true);
print_r(json_encode($array));

?>