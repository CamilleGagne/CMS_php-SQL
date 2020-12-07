<?php	session_start();
	$Mid=$_SESSION['id'];
?>
<!-- 
As a manager I should be able to retrieve the report of number of hours and employee works on the contract::

query: select the Mid from the logged in Manager- to get which contracts are assigned to him
       get all the employees working on those contracts.
       select the employee
       print the hours from the Productivity table

As a manager I should allocate employee to which type of contract they want to work on::

query: select the Mid from the logged in Manager
	print the EmployeeId and the find his preference from the preference table IF AND ONLY IF THE
	PREFERENCE CONTRACT TYPE AND THE CURRENT CONTRACT TYPE DON'T MATCH
        get all the list of contracts he is working on that matches the employee's preference.
	put an add button.
-->




<!DOCTYPE html>
<html>
<body>

<h2>Welcome </h2>
<p><b>Manager's List of Contracts</b></p>
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
	$sql = "select* from Contract where Mid=$Mid ORDER BY Type";
	$result = mysqli_query($conn, $sql);
	echo "<table>";
	echo "<tr><td> Contract ID</td><td> Client Id</td><td>Company Name</td><td>Contract Type</td><td>Contract Start Date</td><td>Contract Service Type</td><td> Annual Contract Value</td><td>Initial Value</td><td> Client Satisfaction</td><td>Department Id</td><tr>";
	while($row= mysqli_fetch_array($result)){
		echo "<tr><td>".$row["Id"]."</td><td>".$row["Company_id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["Type"]."</td><td>".$row["Start_date"]."</td><td>".$row["Service_type"]."</td><td>".$row["ACV$"]."</td><td>".$row["Initial_amount$"]."</td><td>".$row["Active_Expired"]."</td><td>".$row["Satisfaction"]."</td><td>".$row["Department"]."</td></tr>";		
		
	}
echo "</table>";
?>
<p><b>See Productivity Details</b></p>
Contract Progress Details<br><br>
<?php 
$sql = "SELECT Contract.Id,Contract.Type , DATEDIFF(Start_date, First_deliverable) AS FD, datediff (First_deliverable, Second_deliverable) as SD, datediff (Second_deliverable, Third_deliverable) as TD, datediff (Third_deliverable, Final_deliverable) as Final from Productivity join Contract on Productivity.Contract_id = Contract.id where Mid = $Mid";

$result = mysqli_query($conn,$sql);

echo "<table>";

echo "<tr><td>Contract Id</td><td>Contract Type</td><td> First Deliverable </td><td> Second Deliverable</td><td> Third Deliverable </td><td>Final Deliverable";

while($row= mysqli_fetch_array($result)){
echo "<tr><td>".$row["Id"]."</td><td>".$row["Type"]."</td><td>".$row["FD"]."</td><td>".$row["SD"]."</td><td>".$row["TD"]."</td><td>".$row["Final"]."</td></tr>";

}
echo "</table>";


?>


<br>
Employee Work hours
<br><br>

<?php
$sql="SELECT P.Eid, Contract_id, SUM(HOUR(Time)+MINUTE(Time)/60+Second(Time)/3600) as Time_tot FROM Productivity as P join Contract AS C on P.Contract_id = C.Id where Mid =$Mid GROUP BY P.Eid";
$result = mysqli_query($conn, $sql);
echo "<table>";


echo "<tr><td>Employee Id</td><td>Contract Id</td><td>Total Time Employee Worked </td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Eid"]."</td><td>".$row["Contract_id"]."</td><td>".$row["Time_tot"];
}

echo "</table>";
?>







<br><br><br>

<h3>Employee Options</h3>

Employee Preferences
<form name="preferences" action="allocate_employee.php" >
<br>
  
  <input type="submit" value="allocate_employee">
</form>
<br>
Remove Employee
<br>
<br>
<?php

$sql="select Mid, Contract_id, Productivity.Eid from Contract join Productivity ON Productivity.Contract_id = Contract.Id where Mid = $Mid";
$result=mysqli_query($conn, $sql);
echo "<table>";
echo "<tr><td>Contract Id</td><td>Employee Id</td></tr>";
while($row=mysqli_fetch_array($result)){
?>
<form action="delete_employee.php">

<?php
	echo "<tr><td>".$row["Contract_id"]."</td><td>".$row["Eid"]."</td><td>"."<input type='submit' value='remove'>"."</td></tr>";
?>	
<input type="hidden" name="remove_emp_id" value="<?php echo $row["Eid"]?>">
	
<input type="hidden" name="remove_contract_id" value="<?php echo $row["Contract_id"]?>">


</form>

<?php
}
echo "</table>";




?>



<br><br><br>
<form name="signout" action="login.php">
<input type="submit" value="Sign Out">
</form>

</body>
</html>

