<?php
	

$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	
$sql="SELECT A.Id,A.First_name,A.Last_name FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Technical Support') AS A GROUP BY Id Having COUNT(*)=(SELECT max(temp) FROM (SELECT COUNT(*) as temp FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Technical Support') as C GROUP BY C.Id) AS B)";

	$result=mysqli_query($conn,$sql);

	
	$row= mysqli_fetch_array($result);

	echo "The client with the most number of TECHNICAL SUPPORT Business Line Contract is - ". 
	$row["First_name"]." ". $row["Last_name"]."<br>";

$sql="SELECT A.Id,A.First_name,A.Last_name FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Cloud services') AS A GROUP BY Id Having COUNT(*)=(SELECT max(temp) FROM (SELECT COUNT(*) as temp FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Cloud services') as C GROUP BY C.Id) AS B)";

	$result=mysqli_query($conn,$sql);


	$row= mysqli_fetch_array($result);
	echo "The client with the most number of CLOUD SERVICES Business Line Contract is - ". 
	$row["First_name"]." ". $row["Last_name"]."<br>";

$sql="SELECT A.Id,A.First_name,A.Last_name FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Business Development') AS A GROUP BY Id Having COUNT(*)=(SELECT max(temp) FROM (SELECT COUNT(*) as temp FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Business Development') as C GROUP BY C.Id) AS B)";

	$result=mysqli_query($conn,$sql);


	$row= mysqli_fetch_array($result);
	echo "The client with the most number of Business Development Business Line Contract is - ". 
	$row["First_name"]." ". $row["Last_name"]."<br>";




$sql="SELECT A.Id,A.First_name,A.Last_name FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Research ') AS A GROUP BY Id Having COUNT(*)=(SELECT max(temp) FROM (SELECT COUNT(*) as temp FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Research ') as C GROUP BY C.Id) AS B)";

	$result=mysqli_query($conn,$sql);


	$row= mysqli_fetch_array($result);
	echo "The client with the most number of Research Business Line Contract is - ". 
	$row["First_name"]." ". $row["Last_name"]."<br>";




$sql="SELECT A.Id,A.First_name,A.Last_name FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Social Media') AS A GROUP BY Id Having COUNT(*)=(SELECT max(temp) FROM (SELECT COUNT(*) as temp FROM (select Information.Id, Information.First_name,Information.Last_name, Manager.Business_line from Contract INNER JOIN Manager on Contract.Mid=Manager.Mid INNER JOIN Information on Information.Id=Company_id WHERE Business_line='Social Media') as C GROUP BY C.Id) AS B)";

	$result=mysqli_query($conn,$sql);
	$row= mysqli_fetch_array($result);
	echo "The client with the most number of SOCIAL MEDIA Business Line Contract is - ". 
	$row["First_name"]." ". $row["Last_name"]."<br>"."<br>";

echo "<h2>The details of the Contracts recorded within the Last 10 days in all categories by sales associate</h2><br>";


$sql="select Contract.*, First_name, Last_name from Contract join Productivity on Contract.Id = Productivity.Contract_id join Information on Productivity.Eid = Information.Id where Start_date >= current_date - interval '10' day order by Last_name;";

echo "<table>";
echo "<tr><td> Salse Associate Name
	</td><td>Contract Id
	</td><td>Company Name
	</td><td>Contract Id
	</td><td>Contract Type
	</td><td>Start Date
	</td><td>Annual Contract Value
	</td><td>Initial Amount
	</td><td>Contract Status
	</td><td> Manager Id
	</td><td>Satisfaction
	</td><td>Department</td><tr>";
$result=mysqli_query($conn, $sql);

while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["First_name"]." ".$row["Last_name"]."</td><td>"
	.$row["Id"]."</td><td>"
	.$row["Comp_name"]."</td><td>"
	.$row["Type"]."</td><td>"
	.$row["Start_date"]."</td><td>"
	.$row["Service_type"]."</td><td>"
	.$row["ACV$"]."</td><td>"
	.$row["Initial_amount$"]."</td><td>"
	.$row["Active_Expired"]."</td><td>"
	.$row["Mid"]."</td><td>"
	.$row["Satisfaction"]."</td><td>"
	.$row["Department"]."</td></tr>";
}
echo "</table>";



echo "<br>";




echo "<h2>"."The Information of all the Employees in Province = 'QC' - "."</h2>"."<br>"."<br>";
	$sql = "SELECT * FROM Information WHERE Province='QC' AND Role!='Client'";
	$result=mysqli_query($conn,$sql);
echo "<table>";
echo "<tr><td> Employee Id </td><td> First Name</td><td>Last Name</td><td>Address</td><td> City in Quebec </td><td> Phone Number</td><td>Email</td><td>Role</td></tr><br>";

	while($row= mysqli_fetch_array($result)){
		echo "<tr><td>".$row["Id"]."</td><td>".$row["First_name"]."</td><td>".$row["Last_name"]."</td><td>".$row["Address"]."</td><td>".$row["City"]."</td><td>".$row["Phone_number"]."</td><td>".$row["Email"]."</td><td>".$row["Role"]."</td></tr>";	
	}


echo "</table>.<br>";




echo "<h2>The details of all the Contracts in Diamond Category</h2>";

$sql="select Contract.Id, Information.First_name, Information.Last_name,Contract.Comp_name from Contract JOIN Information ON Contract.Company_Id= Information.Id WHERE Contract.Type='Diamond'";

	$result=mysqli_query($conn,$sql);

echo "<table>";
echo "<br>";
echo "<tr><td> Contract Id </td><td> Client Name </td><td>Company Name</td></tr>";


while($row= mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Id"]."</td><td>".$row["First_name"]." ".$row["Last_name"]."</td><td>".$row["Comp_name"]."</td></tr>";

}

echo "</table>";



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


echo "<br><h2>Report for each Category that indicates the clients whose contracts have the highest satisfaction scores in that category, Grouped by the cities of clients</h2><br>";

$sql= "select Company_id, Comp_name, Type, City from Contract join Information ON Contract.Company_id = Information.Id where Satisfaction = (select MAX(Satisfaction) from Contract) and Type = 'Premium' order by City;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<b>Contract type : Premium</b>";
echo "<tr><td> Contract Id </td><td> Company Name </td><td>City</td></tr>";

while($row = mysqli_fetch_array($result)){

	echo "<tr><td>".$row["Company_id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["City"]."</td></tr>";

}

echo "</table>";

$sql= "select Company_id, Comp_name, Type, City from Contract join Information ON Contract.Company_id = Information.Id where Satisfaction = (select MAX(Satisfaction) from Contract) and Type = 'Gold' order by City;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<b>Contract type : Gold</b>";
echo "<tr><td> Contract Id </td><td> Company Name </td><td>City</td></tr>";

while($row = mysqli_fetch_array($result)){

	echo "<tr><td>".$row["Company_id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["City"]."</td></tr>";

}

echo "</table>";



$sql= "select Company_id, Comp_name, Type, City from Contract join Information ON Contract.Company_id = Information.Id where Satisfaction = (select MAX(Satisfaction) from Contract) and Type = 'Diamond' order by City;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<b>Contract type : Diamond</b>";
echo "<tr><td> Contract Id </td><td> Company Name </td><td>City</td></tr>";

while($row = mysqli_fetch_array($result)){

	echo "<tr><td>".$row["Company_id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["City"]."</td></tr>";

}

echo "</table>";


$sql= "select Company_id, Comp_name, Type, City from Contract join Information ON Contract.Company_id = Information.Id where Satisfaction = (select MAX(Satisfaction) from Contract) and Type = 'Silver' order by City;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<b>Contract type : Silver</b>";
echo "<tr><td> Contract Id </td><td> Company Name </td><td>City</td></tr>";

while($row = mysqli_fetch_array($result)){

	echo "<tr><td>".$row["Company_id"]."</td><td>".$row["Comp_name"]."</td><td>".$row["City"]."</td></tr>";

}

echo "</table>";

echo "<h2>The Number of Employees wtih Premium Employee Plan with working hours less than 80 hours a Month<h2><br>";
$sql= "SELECT P.Eid,SUM(HOUR(Time)+MINUTE(Time)/60+Second(Time)/3600) as Time_tot FROM Productivity as P join Sales_associates AS S on P.Eid=S.Eid where S.Insurance_plan='A' GROUP BY P.Eid having Time_tot<80";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<tr><td>"."Employee Id"."</td><td>.Total Time"."</td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Eid"]."</td><td>".$row["Time_tot"]."</td></tr>";
}
echo "</table>";


echo "<h2>The Premium Contract Ids that delivered in More than 10 Business days with employees with Silver Insurance plan<h2><br>";
$sql= "Select T.Id From(select Contract.Id, Contract.Type, Sales_associates.Eid, Sales_associates.Insurance_plan, Productivity.First_deliverable, Productivity.Final_deliverable from Contract JOIN Productivity On Contract.Id=Productivity.Contract_id Join Sales_associates ON Sales_associates.Eid=Productivity.Eid where Sales_associates.Insurance_plan='B' and Contract.type='Premium') T
WHERE DATEDIFF(T.Final_deliverable, T.First_deliverable) >10;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<tr><td>"."Contract Id"."</td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Id"]."</td></tr>";
}
echo "</table>";




echo "<h2>The Comparison of delivery Schedule of 'First Deliverable' of all types of contracts<h2><br>";
$sql= "SELECT Contract.Id,Contract.Type,Contract.Start_date, Productivity.First_deliverable FROM Contract join Productivity on Contract.Id= Productivity.Contract_id;";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<tr><td>"."Contract Id"."</td><td>"."Contract Type"."</td><td>"."Start date"."</td><td></td><td></td><td>"."First Deliverable date"."</td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Id"]."</td><td>".$row["Type"]."</td><td>".$row["Start_date"]."</td><td></td><td></td><td>".$row["First_deliverable"]."</td></tr>";
}
echo "</table>";


echo "<h2>Highest Revenue from the Line Of Business<h2><br>";
$sql= "select Mid,T.Business_line, sum(T.ACV$) as sum from (select Manager.Mid, Manager.Business_line, Contract.ACV$ FROM Manager Join Contract On Contract.Mid=Manager.Mid) T group by T.Business_line having sum>=all(select sum(T.ACV$) from (select Manager.Mid, Manager.Business_line, Contract.ACV$ FROM Manager Join Contract On Contract.Mid=Manager.Mid) T group by T.Business_line);";
$result = mysqli_query($conn,$sql);
echo "<table>";
echo "<tr><td>"."Techincal Account Manager Id"."</td><td>"."Business Line"."</td><td>"."Total Business"."</td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr><td>".$row["Mid"]."</td><td>".$row["Business_line"]."</td><td>".$row["sum"]."</td></tr>";
}
echo "</table>";





	$conn->close();
	





?>
