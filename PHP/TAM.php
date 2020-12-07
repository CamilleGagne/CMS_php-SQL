<?php

$uname =$_GET["uname"]; 
$pass = $_GET["psw"];

$_SESSION['id']= $_GET["uname"];

//$userName['sales_id']=$uname;
//echo $userName['sales_id'];

$servername = "bbc5531.encs.concordia.ca";
$username = "bbc55311";
$password = "21Colour";
$dbname = "bbc55311";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
$sql= "select* from Categories";
$result = mysqli_query($conn, $sql);

echo "<br>Definintion of All types of Contracts<br>";
echo "<table>";
echo "<tr><td>Contract Type</td><td> First Deliverable </td><td>Second Deliverable</td><td>Third Deliverable</td><td></td><td>Final";
while($row=mysqli_fetch_array($result)){
echo "<tr><td>".$row["Categories"]."</td><td> ".$row["FD"]."</td><td>".$row["SD"]."</td><td>".$row["TD"]."</td><td></td><td></td><td>".$row["Final"]."</td></tr>";
}

echo "</table>"."<br>";


$sql= "select Information.First_name,Information.Last_name,Contract.Id,Contract.Comp_name,Contract.Type,Contract.Start_date,Contract.Mid FROM Contract JOIN Information ON Information.Id=Contract.Company_id";
$result = mysqli_query($conn, $sql);

echo "List of Contracts: <br>";
echo "<table>";
echo "<tr><td> Client Name </td><td> Contract Id </td><td> Company name </td><td> Type </td><td> Start Date </td><td>Manager Id</td><td> Update Manager</td></tr><br>";


while($row=mysqli_fetch_array($result)){
echo "<tr><td>".$row["First_name"]." ".$row["Last_name"]."</td><td>".$row["Id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["Type"]."</td><td>".$row["Start_date"]."</td><td>".$row["Mid"]."</td><td>";
?>
<form action="update_man.php">
<select name= "change_Manager" required>
<option value="">Select</option>
<option value="15" name="change_Manager">15- Camille Gagne</option>
<option value="34" name="change_Manager">34- Holly Ryan</option>
<option value="37" name="change_Manager">37- Connor Neundorff</option>
<option value="38" name="change_Manager">38- David Van</option>
<option value="41" name="change_Manager">41- Akshat Bisht</option>
</select>
<input type="hidden" value= <?php echo $row["Id"]?> name="contract_id">
<input type="submit" value="update">
</form>
<?php 	

echo "</td></tr>";



}

echo "</table>";



$conn->close();



?>


<br><br><br>
<form name="signout" action="login.php">
<input type="submit" value="Sign Out">
</form>
