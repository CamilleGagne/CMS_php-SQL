<?php
session_start();
$uname=$_SESSION["id"];
$plan = $_GET["insurance"];
//echo $plan;
//echo $uname;
	$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="update Sales_associates set Insurance_plan='$plan' where Eid=$uname";
	
	mysqli_query($conn,$sql);
	
$conn->close();
include"client_new_old.php";
exit;
?>

