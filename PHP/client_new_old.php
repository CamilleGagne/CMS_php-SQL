<?php 
session_start();
$uname=$_SESSION["id"];
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
$sql="select Id, First_name, Last_name, Role from Information where Id='$uname' ";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "USER INFORMATION:"."<br>";		
		echo "Employee Id:   ".$row["Id"]."<br>";
		echo "Employee Name: ".$row["First_name"]." ".$row["Last_name"]."<br>";
		echo $row["Role"]." "."<br>";
		$sql="select Information.Id,Sales_associates.Insurance_plan From Information JOIN Sales_associates ON Information.Id = Sales_associates.Eid where Information.Id=$uname";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		echo "Employee Insurance Plan: ".$row["Insurance_plan"]."<br>";






?>

<!DOCTYPE html>
<html>
<body>

<h2>Welcome </h2>
<p>Adding a Contract</p>


<br>
<form name ="new" action= "sales_add_client.php">
<input type="submit" value="New Client">

</form> 
<br><br>
Does the client already exists? If Yes, enter client Id and click submit
<br>
<form name="old" action="contract_add.php" >
<input type="text" name=id required>
<br><br>
  <input type="submit" value="Submit">
</form>

<br><br><br>

<h3>Employee Options</h3>

Would you like to work on a different Contract?
<form action="sales_data.php" >
<br>
  <select name="preference">
  <option name="preference" value="">Select</option>
  <option name="preference" value="Diamond">Diamond </option>
  <option name="preference" value="Gold">Gold</option>
  <option name="preference" value="Premium">Premium</option>
  <option name="preference" value="Silver">Silver</option>
  </select>
  <input type="submit" value="Yes">
</form>




Would you like a differenent Insurance Plan?
<form name="Insurance" action="change_insurance.php" >
<br>
  <select name="insurance" required>
  <option name="insurance" value="">SELECT</option>
  <option name="insurance" value="A">Premium</option>
  <option name="insurance" value="B">Silver</option>
  <option name="insurance" value="C">Normal</option>
  </select>
  <input type="submit" value="change">
</form>
<br><br><br>




<form name="signout" action="login.php">
<input type="submit" value="Sign Out">
</form>





</body>
</html>

