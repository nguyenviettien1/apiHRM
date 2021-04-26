<?php
$token=$_GET["token"];
require("jwt.php");
include('connect/connect.php');
include('function.php');
 $json = JWT::decode($token,"example_key",array('HS256'));
 $userName = $json->userName;
 $sql = "SELECT b.id, b.name, w.month ,w.actual, w.target, w.progress
         FROM account as a
         inner join baccount as b
         on a.userID = b.id
         inner join work as w
         on b.id = w.userID
         WHERE a.userName = '$userName'
        ";
 $result =$mysqli->query($sql);
 while ($row = $result->fetch_object()){
	$work[] = $row;
}
print_r(json_encode($work));
?>