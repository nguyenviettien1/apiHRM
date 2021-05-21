<?php
require("jwt.php");
require __DIR__ . '/vendor/autoload.php';
include('function.php');
include('connect/connect.php');
$key = "example_key";
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$name = $obj['name'];
$age = $obj['age'];
$dateOfBirth = $obj['dateOfBirth'];
$gender = $obj['gender'];
$email = $obj['email'];
$phone = $obj['phone'];
$positionID = $obj['positionID'];
$departmentID = $obj['departmentID'];
$address = $obj['address'];
$education = $obj['education'];
$ethnicity = $obj['ethnicity'];
$id = $obj['id'];
$religion = $obj['religion'];
$sql = " UPDATE baccount
    SET name = '$name' , age = '$age', dateOfBirth ='$dateOfBirth' , gender = '$gender' , phone ='$phone' ,
    email = '$email', positionID = '$positionID', departmentID ='$departmentID' , address = '$address',
     education = '$education',ethnicity = '$ethnicity', religion = '$religion'
    WHERE id = '$id' 
       ";
$result =$mysqli->query($sql);

$array = array('message'=>'Thành công','status'=> true);
print_r(json_encode($array));

?>