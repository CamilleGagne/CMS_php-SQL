<?php
$new_comp_name=$_GET["new_comp_name"];
//echo $new_comp_name;
$cid = $_GET["id"];
//echo $cid;
	$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql="update Contract set Comp_name='$new_comp_name' where Id=$cid";

	mysqli_query($conn,$sql);
	
	$conn->close();
	echo "Company name updated";
	include "admin_menu.php";
	exit;



?>
