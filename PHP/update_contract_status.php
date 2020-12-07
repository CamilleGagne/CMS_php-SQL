<?php

$contract_id = $_GET["id"];
$change_status=$_GET["status"];
/*echo $client_id;
echo $contract_id;
*/
	$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="UPDATE Contract set Active_Expired='$change_status' WHERE Id=$contract_id";

	mysqli_query($conn,$sql);
	$conn->close();
	echo "the Status has been changed";
	include "admin_menu.php";
	exit;
?>
