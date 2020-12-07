<?php
$servername = "bbc5531.encs.concordia.ca";
$username = "bbc55311";
$password = "21Colour";
$dbname = "bbc55311";

// Create connection

$mid=$_GET["change_Manager"];
$cid=$_GET["contract_id"];
echo $mid;
echo $cid;
$conn = new mysqli($servername, $username, $password, $dbname);
$sql= "update Contract set Mid=$mid where Id=$cid";
mysqli_query($conn, $sql);

echo "Manager Updated";
include "TAM.php";
$conn->close();
?>
