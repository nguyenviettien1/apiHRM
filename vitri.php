<?php
include('function.php');
include('connect/connect.php');
require("jwt.php");

$sql = "SELECT * FROM `positiondetail`
       ";
       
$result =$mysqli->query($sql);

while ($row = $result->fetch_object()){
	$vitri[] = $row;
}
print_r(json_encode($vitri));
?>