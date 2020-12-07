<?php

$mid=$_GET["Mid"];
//echo $mid;
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

$sql = "select Id,Comp_name, Type, Satisfaction FROM Contract where Mid=$mid ";
$result = mysqli_query($conn, $sql);
echo"<table>";
echo "<tr><td><b>"."Contract Id"."</b></td>"."<td>"."  "."</td>"."<td><b>"."Company Name"."</b></td>"."<td>"."  "."</td>"."<td><b>"."Contract Type"."</b></td>"."<td>"."  "."</td>"."<td><b>"."Satisfaction"."</b></td></tr>"."<br>"."<br>";
while($row= mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Id"]."</td>"."<td>"."  "."</td>"."<td> ".$row["Comp_name"]." </td>"."<td>"."  "."</td>"."<td>".$row["Type"]." </td>"."<td>"."  "."</td>"."<td>".$row["Satisfaction"]."</td></tr><br>";
}
echo "</table>";


?>

<form action="client_menu.php">
<input type="submit" value="Return">
</form>
