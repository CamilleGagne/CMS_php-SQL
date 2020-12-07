<?php
session_start();
$Mid=$_SESSION['id'];
//echo $Mid."<br>";
$Eid=$_GET["change_employee"];
$Category=$_GET["change_category"];

//echo $Eid;


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


echo "The list of Contracts the Manager has"."<br>"."<br>";
$sql = "select Type,Id From Contract where Mid =$Mid AND Type='$Category' ";//list of employees who have set their preferences
error_reporting(E_ERROR | E_PARSE);
$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>=1){
?>
	
<?php

	while($row=mysqli_fetch_array($result)){
		echo $row["Type"]." = " . $row["Id"]."<br>";
?>
	<form action="change_employee_contract_type.php">
	<input type="hidden" value="<?php echo $row["Id"]?>" name="Contract_id">
	<input type="hidden" value="<?php echo $Eid?>" name="Employee_id">
	<input type="submit" value="ADD">	
	</form>
<?php	

	}
}else{
		echo "No Contract exists of the Employee Preference<br>";	
		include "allocate_employee.php";
		exit;
	}
	


$conn->close();

?>

