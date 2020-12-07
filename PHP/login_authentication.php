<?php
session_start();

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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql="select Username,Password,Permission from Login where Username='$uname' and Password='$pass' ";

$result=mysqli_query($conn,$sql);

	
if(mysqli_num_rows($result)==1){
	$row = mysqli_fetch_assoc($result);
	$permission=$row["Permission"];
	
	if($permission==1){ //---------------------------------->Sales Associate Access
		include "client_new_old.php";
		exit;
	}
	if($permission==2){//----------------------------------->Manager Access
		$sql="select Id, First_name, Last_name, Role from Information where Id='$uname' ";		
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "USER INFORMATION:"."<br>";		
		echo "Manager Id:   ".$row["Id"]."<br>";
		echo "Manager Name: ".$row["First_name"]." ".$row["Last_name"]."<br>";
		echo $row["Role"]." "."<br>";
		$sql ="select Business_line from Manager where Mid=$uname";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "Line of Business : ".$row["Business_line"];
		include "manager_menu.php";
		exit;	
	}
	if($permission==3){//------------------------------------>Technical Account Manager Access
		$sql="select Id, First_name, Last_name, Role from Information where Id='$uname' ";		
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		echo "USER INFORMATION:"."<br>";		
		echo "Technical Account Manager Id:   ".$row["Id"]."<br>";
		echo "TAM Name: ".$row["First_name"]." ".$row["Last_name"]."<br>";
		echo $row["Role"]." "."<br>";
		include "TAM.php";
		exit;	
	}
	if($permission=='C'){//----------------------------------->Client Access
	       $sql="select Id, First_name, Last_name, Role from Information where Id='$uname'";
	       $result=mysqli_query($conn,$sql);
	       $row = mysqli_fetch_assoc($result);
	       echo "USER INFORMATION: "."<br>";
	       echo "Client Id: ".$row["Id"]."<br>";
	       echo "Client Name:".$row["First_name"]." ".$row["Last_name"]."<br>";
               echo $row["Role"]."<br>";;			
	       include "client_menu.php";
	       exit;	
	}
	if($permission==4){//------------------------------------>Technical Account Manager Access
		echo "Welcome Admin:"."<br>";
		include "admin_menu.php";
		exit;	
	}
	if($permission==5){//------------------------------------>OCN Access
		echo "<h1>Welcome to the OCN</h1>"."<br>";
		include "OCN.php";
		exit;	
	}
}

else{
	echo " invalid id and password";
	include "login.php";
	exit;
}




$conn->close();
?>



