<?php
$token=$_GET["token"];
require("jwt.php");
include('connect/connect.php');
include('function.php');
 $json = JWT::decode($token,"example_key",array('HS256'));
 $userName = $json->userName;
 $sql = "SELECT b.id, b.name, s.month ,s.salaryBase, 
        s.salaryWork, s.salarySeniority, p.coefficientSalary, s.salaryTreatment,
        s.total
         FROM account as a
         inner join baccount as b
         on a.userID = b.id
         inner join positiondetail as p
         on p.id = b.positionID
         inner join salary as s
         on b.id = s.userID
         WHERE a.userName = '$userName'
         ORDER BY s.month DESC
        ";
 $result =$mysqli->query($sql);
 while ($row = $result->fetch_object()){
	$salary[] = $row;
}
print_r(json_encode($salary));

 ?>