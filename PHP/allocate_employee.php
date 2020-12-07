<?php 
session_start();
$Mid=$_SESSION['id'];
//echo $Mid."<br>";

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
	echo "The list of employees asking for a transfer to a different Contract type::"."<br>"."<br>";
echo "<table>";	
echo "<tr><td>Employee Id</td><td>Category</td></tr>";


$sql = "select Id,Category from Preference where Category IS NOT NULL";//list of employees who have set their preferences
$result=mysqli_query($conn,$sql);
?>

<form action="select_employee_for_pref_change.php">

<?php        
while($row=mysqli_fetch_array($result)){

		echo "<tr><td>".$row["Id"]." </td><td>" . $row["Category"]."</td><td>"."<input type='submit' value='select Employee' >"."</td></tr>";
?>

<input type= "hidden" value="<?php echo $row["Category"]?>" name="change_category">
<input type= "hidden" value="<?php echo $row["Id"]?>" name="change_employee"  >



<?php
	}
	echo "</table>";
?>

</form>





