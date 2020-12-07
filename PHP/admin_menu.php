<h2>List of Contracts:</h2>

<?php
	$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="select* from Contract";

	$result=mysqli_query($conn,$sql);
	
	while($row=mysqli_fetch_array($result)){
		echo "Contract id: ".$row["Id"]."<br>". 
		"Client id: ".$row["Company_id"]."<br>".
		"Company Name: ".$row["Comp_name"]."<br>".
		"Contract type: ".$row["Type"]."<br>".
		"Contract start date: ".$row["Start_date"]."<br>".
		"Contract end date: ".$row["End_date"]."<br>".
		"Contract service type: ".$row["Service_type"]."<br>".
		"Contract status: ".$row["Active_Expired"]."<br>".
		"Contract Manager Id: ".$row["Mid"]."<br>".
		"Contract Satisfation Score: ".$row["Satisfaction"]."<br>".
		"Contract Department: ".$row["Department"]."<br>"."<br>";
?>	
<form action="update_contract.php">

<input type="hidden" name="update_contract_id" value = "<?php echo $row["Id"];?>">

<input type="submit" value="Update Contract">

</form>

<br><br>

<form action ="delete_contract.php">
<input type="hidden" name="delete_contract_id" value = "<?php echo $row["Id"];?>">
<input type= "submit" value ="Delete Contract">
</form>



<?php
	echo "<br>"."<br>"."<br>";


	}

?>


<br><br><br>
<form name="signout" action="login.php">
<input type="submit" value="Sign Out">
</form>
