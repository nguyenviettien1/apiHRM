<?php
require("jwt.php");
require __DIR__ . '/vendor/autoload.php';
include('function.php');
include('connect/connect.php');

$key = "example_key";
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$userName = $obj['userName'];
$password = md5($obj['password']);

$sql = "SELECT a.id, a.userID, a.userName, a.password, a.permission, a.created_at, a.updated_at, b.status FROM account as a
        inner join baccount as b
        on a.userID = b.id
       WHERE a.userName ='$userName'
       AND a.password ='$password'
       AND b.status = 1
       ";
$result =$mysqli->query($sql);

$account = mysqli_fetch_assoc($result);
$kk = json_encode($account);
 $x = json_decode($kk);
if($account){
    $jwt = getToken($userName, $x->userID);
    $array = array('message'=>'Thành công','status'=> true,'token'=>$jwt, 'account'=>$account);
    print_r(json_encode($array));
}else{
    $array = array('status'=> false, 'message'=>'Sai thông tin đăng nhập');
    print_r(json_encode($array));
}
?>