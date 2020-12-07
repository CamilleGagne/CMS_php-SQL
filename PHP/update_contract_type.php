<?php

$contract_id = $_GET["id"];
$change_type=$_GET["type"];
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
	$sql="UPDATE Contract set Type='$change_type' WHERE Id=$contract_id";

	mysqli_query($conn,$sql);
	$conn->close();
	echo "the Contract Type has been changed";
	include "admin_menu.php";
	exit;
?>
