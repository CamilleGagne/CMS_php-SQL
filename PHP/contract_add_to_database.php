<?php
session_start();
echo $_SESSION["new_id"]."<br>";
$client_id=$_SESSION["new_id"];	
		$companyname= $_GET["comp_name"];
		$startDate=$date= date('Y-m-d');
		$type=$_GET["type"];
		$service=$_GET["service"];
		$ACV=$_GET["ACV"];
		$InitialAmt=$_GET["InitialAmt"];
		
		$department= $_GET["department"];
		$manager=$_GET["manager"];
		

echo $client_id;
echo "company name=". $companyname."<br>";
echo "start date=".$startDate."<br>";
echo "type=".$type."<br>";
echo "service=".$service."<br>";
echo "ACV=".$ACV."<br>";
echo "InitialAmt=".$InitialAmt."<br>";
echo "department=".$department."<br>";
echo "manager=".$manager."<br>";

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




$sql="Insert into Contract (Company_id, Comp_name, Type, Start_date, Service_type, Initial_amount$, Mid, Department) values ($client_id,'$companyname','$type','$startDate','$service',$InitialAmt,$manager,$department)";

mysqli_query($conn,$sql);

$conn->close();
?>
