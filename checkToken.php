<?php
$token=$_GET["token"];
require("jwt.php");
include('connect/connect.php');
include('function.php');
 $json = JWT::decode($token,"example_key",array('HS256'));
 $userName = $json->userName;
 $sql = "SELECT b.id, b.name, b.age, b.avatarMobile, b.gender, 
        b.email, b.phone, b.address, b.dateOfBirth, 
        b.education, b.ethnicity, b.religion, p.description as position,
        d.description as department, b.insurance, b.dayToWork
         FROM account as a
         inner join baccount as b
         on a.userID = b.id
         inner join positiondetail as p
         on b.positionID = p.id
         inner join departmentdetail as d
         on b.departmentID = d.id
         WHERE a.userName = '$userName'
        ";
 $result =$mysqli->query($sql);
 $account = mysqli_fetch_assoc($result);
 echo json_encode($account);

?>