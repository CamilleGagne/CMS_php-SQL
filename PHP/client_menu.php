<?php session_start();
$client_id=$_SESSION['id'];
echo"<br>"."<br>";
echo "<h1>"."Welcome Client"."</h1>"."<br>"."<br>"."<br>";
echo "<h2>List of Your Contracts and their status': </h2>"."<br>"."<br>"; 

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

$sql = "select Contract.Id,Contract.Satisfaction, Comp_name, Active_Expired, Contract.Mid, First_name, Last_name from Contract, Information where Company_id = $client_id and Contract.Mid = Information.Id";
$result = mysqli_query($conn, $sql);
	
while($row= mysqli_fetch_array($result)){

	echo "Contract Id -".$row["Id"]."<br>".
	     "Company Name -".$row["Comp_name"]."<br>".
	     "Contract Status -".$row["Active_Expired"]."<br>".
	     "Manager Name - ".$row ["First_name"]." ".$row["Last_name"]."<br>".
	     "Satisfaction - ".$row ["Satisfaction"]."<br>"."<br>"."<br>";
	
?><!--breaking out of php code-->
SATISFACTION LEVEL<br>
<form action="satisfaction.php">
<select name="satisfaction" required >
<option value = "">select</option>
<option value = "1">1</option>
<option value = "2">2</option>
<option value = "3">3</option>
<option value = "4">4</option>
<option value = "5">5</option>
<option value = "6">6</option>
<option value = "7">7</option>
<option value = "8">8</option>
<option value = "9">9</option>
<option value = "10">10</option>
</select>
<input type="hidden"  name="Contract_id" value=<?php echo $row["Id"];?>>
<input type="submit" value="UPDATE">
</form><br><br><br>


<?php

}//--------------->closing the while loop

$conn->close();

echo "<h2>Client's Contract Manager's Track Record</h2>"."<br>";
?>









<form action="satisfaction_history.php" >
<select name="Mid" required>
<option value="" >Select</option>



<?php
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



	$sql="SELECT Information.First_name,Information.Last_name, Contract.Mid FROM Information JOIN Contract ON Information.Id=Contract.Mid WHERE Contract.Company_id=$client_id";
	$result = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result)){
?>

		<option value="<?php echo $row["Mid"]?>" > <?php echo $row["First_name"]." ".$row["Last_name"];?></option>


<?php
	}

$conn->close();

?>




</select>

<input type = "submit" value="Track Record">
</form>








