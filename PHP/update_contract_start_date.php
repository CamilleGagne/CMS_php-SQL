<?php
$contract_id = $_GET["id"];
$start_date=$_GET["startdate"];
echo $start_date;

$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="UPDATE Contract set Start_date='$start_date' WHERE Id=$contract_id";

	mysqli_query($conn,$sql);
$conn->close();
echo "the Contract start date has been changed";
include "admin_menu.php";
exit;


?>
