<?php
$Eid= $_GET["remove_emp_id"];
$Cid=$_GET["remove_contract_id"];

$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	// Create connection


	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
		if ($conn->connect_error) {
   	 		die("Connection failed: " . $conn->connect_error);
		} 
	$sql = "delete from Productivity where Contract_id=$Cid AND Eid=$Eid";
	mysqli_query($conn, $sql);
$conn->close();
include "manager_menu.php";
exit;
?>
