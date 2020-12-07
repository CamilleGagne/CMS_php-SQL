<?php
	$update_sat=$_GET["satisfaction"];
	$Contract_id=$_GET["Contract_id"];
	//echo $update_sat."<br>";
	//echo $Contract_id;
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
	
	$sql = "UPDATE Contract SET Satisfaction=$update_sat where Id=$Contract_id";
	mysqli_query($conn, $sql);
	
	$conn->close();
	echo "Score updated";

?>
<form action= "client_menu.php">
<input type="submit" value="Return">
</form>
