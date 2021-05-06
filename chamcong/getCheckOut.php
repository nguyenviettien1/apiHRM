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

$sql = "SELECT * FROM checkin
WHERE userID = '$userID' AND day = '$day' AND month = '$month' 
ORDER BY day DESC
LIMIT 1
";
$result =$mysqli->query($sql);
$chamcong = mysqli_fetch_assoc($result);

if($chamcong){
    $array = array('message'=>'Thành công','status'=> true, 'chamcong'=>$chamcong);
    print_r(json_encode($array));
}else{
    $array = array('status'=> false, 'message'=>'Sai thông tin checkin');
    print_r(json_encode($array));
}
?>