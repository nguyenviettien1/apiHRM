<?php
include('function.php');
include('connect/connect.php');
require("jwt.php");

$sql = "SELECT * FROM `departmentdetail`
       ";
       
$result =$mysqli->query($sql);

while ($row = $result->fetch_object()){
	$phongban[] = $row;
}
print_r(json_encode($phongban));
?>