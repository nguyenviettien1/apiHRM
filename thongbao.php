<?php
include('function.php');
include('connect/connect.php');
require("jwt.php");

$sql = "SELECT * FROM `notification`
       ";
       
$result =$mysqli->query($sql);

while ($row = $result->fetch_object()){
	$noti[] = $row;
}
print_r(json_encode($noti));
?>