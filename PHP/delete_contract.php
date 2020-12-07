<?php
$Cid=$_GET["delete_contract_id"];
//echo $Cid;
$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="delete from Contract where Id=$Cid";

	mysqli_query($conn,$sql);

	$sql="delete from Productivity where Contract_id=$Cid";

	mysqli_query($conn,$sql);
$conn->close();
include "admin_menu.php";
exit;
?>
