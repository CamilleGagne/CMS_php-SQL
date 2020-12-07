<?php
session_start();
$_SESSION["new_id"];
$_SESSION["old_id"];
/*
Old client::
------------
Just update the Contract table and the Employee Table


New client::
------------
 
Update the Contract table and the Information table.



*/


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


	$client_id= $_GET["id"];	

//-----------------------------------------------------------------------------------------------------------------
	if($client_id!=000){

		$sql = "select* from Information where Id=$client_id";

		$result=mysqli_query($conn,$sql);
		$_SESSION["new_id"]=$client_id;
		echo $_SESSION["new_id"]."<br>";

		if(mysqli_num_rows($result)==1){//---------->old client
			$row=mysqli_fetch_array($result);
			echo "CLIENT ID FOUND"."<br>"."<br>";
			echo "CLIENT INFORMATION ::"."<br>"."<br>";			
			echo "ID: ".$row["Id"]."<br>";
			echo "FIRST NAME: ".$row["First_name"]."<br>";
			echo "LAST NAME: ".$row["Last_name"]."<br>";
			echo "ADDR NAME: ".$row["Address"]."<br>";
			echo "CITY NAME: ".$row["City"]."<br>";
			echo "PROVINCE NAME: ".$row["Province"]."<br>";
			echo "PHONE NO.: ".$row["Phone_number"]."<br>";
			echo "EMAIL: ".$row["Email"]."<br>";
			
			//just update the Contract table using the client_id(=company_id)
		}else{
			echo "the client id entered is incorrect";
			include "client_new_old.php";
			exit;
		}

	}

	if($client_id==000){
		$name=$_GET["firstname"];
		$lastname= $_GET["lastname"];
		$province=$_GET["province"];
		$city=$_GET["city"];
		$address=$_GET["address"];
		$phone=$_GET["phone"];
		$email=$_GET["emailAddress"];
		/*echo $name."<br>";//string type
		echo $lastname."<br>";//string type
		echo $province."<br>";//string type
		echo $city."<br>";//string type
		echo $address."<br>";//string type
		echo $phone."<br>";//string type
		echo $email."<br>";//string type*/
		$sql = "insert into Information (First_name, Last_name, Address, City, Province, Phone_number, Email, Role) values ('$name' , '$lastname', '$address','$city','$province','$phone','$email','Client');";
		
		mysqli_query($conn, $sql);
		


		$sql = "Select* FROM Information where First_name='$name'AND Last_name='$lastname' AND Address='$address' AND City='$city' AND Province='$province' AND Email='$email' AND Role='Client' AND Phone_number='$phone'";
		
		$result = mysqli_query($conn, $sql);
		$row= mysqli_fetch_array($result);
		
		$_SESSION["new_id"]=$row["Id"];
		
		echo $row["Id"];
		
		$sql="insert into Login(Username,Password,Permission,Active) values ($NewClientId, 'hello', 'C',1)";
		mysqli_query($conn, $sql);
	}
 
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------




	$conn->close();
	
?>
 



<!--
Data to be inputted for the Contract table
Id*, Company_id*, /Comp_name, /Type, Start_date*, End_date, /Service_type, /ACV$, /Initial_amount$, *Active_Expired, Mid, Satifaction*, /Department

Perform auto increment for Contract id
Find a new Company_id(=Client_id) 





-->
<br>
<b> CONTRACT INFORMATION</b>
<form name="myform" action ="contract_add_to_database.php" id="myForm">
  Company Name:<br>
  <input type="text" name="comp_name" required>
  <br><br >
Start Date<br>
   <input type = "date" id="startDate" name="startDate" value="<?php $date= date('Y-m-d');echo $date;?>" disabled>
<br><br>

  Contract Type:<br>
	<select name="type" required>
	<option value="">Select</option>
	<option value="Diamond" name="type">Diamond</option>
	<option value="Silver" name="type">Silver</option>
	<option value="Premium" name="type"> Premium</option>
	<option value="Gold"name="type">Gold</option>
	</select>

 
    <br > <br > <br> 
Service Type:<br>
	<select name="service" required>
	<option value="">Select</option>
	<option value="On-Premises" name="service">On-Premises</option>
	<option value="Cloud Services" name="service">Cloud Services</option>
	</select>

 
    <br > <br > <br > 
Annual Contract Value:<br>
<input type="text" name="ACV" placeholder ="CAD" required> 
 
<br > <br > <br > 
Initial Amount:<br>
<input type="text" name="InitialAmt" placeholder ="CAD" required> 
  
<br > <br > <br > 





Enter Department: <br>
<select name="department">
<option value ="">Select</option>
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

	 $sql = "SELECT * FROM Department";
	$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_array($result)){
		


?>

<option value="<?php echo $row["Did"]?>" name="department"> <?php echo $row["Dept_name"]?></option>



<?php 
}


$conn->close();
?>

</select>
<br><br><br>






Select Manager: <br>
<select name="manager" required>
<option value ="">Select</option>
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

	 $sql = "SELECT Id, First_name, Last_name From Information WHERE Role='Manager' order by First_name";
	$result=mysqli_query($conn,$sql);

		while($row=mysqli_fetch_array($result)){
		


?>

<option value="<?php echo $row["Id"];?>" name="manager"> <?php echo $row["First_name"]." ".$row["Last_name"];?></option>



<?php 
}


$conn->close();

?>

</select>
<br><br><br>




<input type="submit" value="Submit">




</form>





