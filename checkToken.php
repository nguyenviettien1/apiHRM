<?php
$token=$_GET["token"];
require("jwt.php");

$json = JWT::decode($token,"BI_MAT", true);
echo json_encode($json);
?>