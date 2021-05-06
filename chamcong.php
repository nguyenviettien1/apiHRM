<?php
$token=$_GET["token"];
require("jwt.php");
include('connect/connect.php');
include('function.php');
 $json = JWT::decode($token,"example_key",array('HS256'));
 $userName = $json->userName;
 $sql = "SELECT b.id, b.name, c.month ,c.day, c.checkInAt, c.checkOutAt, c.workTime
         FROM account as a
         inner join baccount as b
         on a.userID = b.id
         inner join checkin as c
         on b.id = c.userID
         WHERE a.userName = '$userName'
         ORDER BY c.day DESC
         LIMIT 7
        ";
 $result =$mysqli->query($sql);
 while ($row = $result->fetch_object()){
	$chamcong[] = $row;
}
print_r(json_encode($chamcong));
?>