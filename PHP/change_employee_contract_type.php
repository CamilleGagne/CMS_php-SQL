<?php
$Eid=$_GET["Employee_id"];
$Cid=$_GET["Contract_id"];
//echo $Eid;
//echo $Cid;

$servername = "bbc5531.encs.concordia.ca";
$username = "bbc55311";
$password = "21Colour";
$dbname = "bbc55311";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   	 	die("Connection failed: " . $conn->connect_error);
	} 
$sql = "insert into Productivity (Contract_id, Eid) values($Cid, $Eid) ";//list of employees who have set their preferences
mysqli_query($conn,$sql);
$sql = "update Preference set Category = NULL where Id=$Eid";
mysqli_query($conn,$sql);
//echo "The Employee is added to Contract=".$Cid;
include "allocate_employee.php";
exit;
?>

