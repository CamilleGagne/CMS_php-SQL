<?php
session_start();
//echo $_SESSION['id'];
$Id=$_SESSION['id'];
$pref=$_GET["preference"];


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

	 $sql = "UPDATE Preference set Category='$pref' where Id=$Id";
	$result=mysqli_query($conn,$sql);
		
$conn->close();

echo "Preference Added<br>";
include "client_new_old.php";
exit;

?>

