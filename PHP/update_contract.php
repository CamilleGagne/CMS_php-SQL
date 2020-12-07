<?php
$cid = $_GET["update_contract_id"];
//echo $cid;



	$servername = "bbc5531.encs.concordia.ca";
	$username = "bbc55311";
	$password = "21Colour";
	$dbname = "bbc55311";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}
	$sql="select* from Contract where Id=$cid";

	$result=mysqli_query($conn,$sql);
	
	while($row=mysqli_fetch_array($result)){
		echo "Contract id: ".$row["Id"]."<br>". 
		//---------->check if entered contract id doesn't already exist
		
//-----------------------------------------------------------------------------------------------------------------------------------------------


		"Client id: ".$row["Company_id"];
		//---------->It has to be a drop down list of already existing clients, change data in Contract NOT in Inforamtion
	
?>
	<form action= "update_contract_client_id.php">
	
	<select name="change_client" required>
	<option value="">Select</option>
<?php	
	$client_list="select First_name,Last_name, Id from Information where Role='Client'";
	$client_result= mysqli_query($conn,$client_list);
	while($client_row= mysqli_fetch_array($client_result)){
?>	
	<option value="<?php echo $client_row["Id"]?>" name="change_client"  ><?php echo $client_row["First_name"]." ".$client_row["Last_name"]?></option>



<?php 
	}
?>

	
	</select>
	<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
	<input type="submit" value="Submit">	
	</form>


<?php


//---------------------------------------------------------------------------------------------------------------------------------------------------




		echo "<br>"."Company Name: ".$row["Comp_name"]."<br>";
		
		//---------->It can be any new Company Name
?>
		<form action="update_company_name.php">
		<input type="text" name="new_comp_name" placeholder = "Enter New Company Name" required>
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type="submit" value="Submit">
		</form>

<?php		
		
//----------------------------------------------------------------------------------------------------------------------------------------------------		
		echo "Contract type: ".$row["Type"]."<br>";
		//---------->Drop Down list of already existing Types of Contracts
?>
		<form action="update_contract_type.php">
		<select name="type" required>
		<option value="">Select</option>
		<option value="Diamond" name="type">Diamond</option>
		<option value="Gold" name="type">Gold</option>
		<option value="Silver" name="type">Silver</option>
		<option value="Premium" name="type">Premium</option>
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>



<?php
//---------------------------------------------------------------------------------------------------------------------------------------------------

		echo "Contract start date: ".$row["Start_date"]."<br>";
		//---------->Can change the start date, but have to make sure it is a legitimate date
?>


		<form action = "update_contract_start_date.php">
		<input type="date" name="startdate" placeholder="yyyy-mm-dd" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
		<span class="validity"></span>
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>



<?
		

//----------------------------------------------------------------------------------------------------------------------------------------------------		
		echo "Contract service type: ".$row["Service_type"]."<br>";
		//----------->Drop down list of already existing Service Types

?>
		<form action="update_contract_service.php">
		<select name="service" required>
		<option value="">Select</option>
		<option value="On-premises" name="service">On-premises</option>
		<option value="Cloud Services" name="service">Cloud Services</option>
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>

<?php



//-----------------------------------------------------------------------------------------------------------------------------------------------------		
		echo "Contract status: ".$row["Active_Expired"]."<br>";
		//----------->It can either be Active or Expired
?>
		<form action ="update_contract_status.php">
		<select name="status" required>
		<option value="">Select</option>
		<option value="Active" name="status">Active</option>
		<option value="Expired" name="status">Expired</option>
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>

<?php



//---------------------------------------------------------------------------------------------------------------------------------------------------
		echo "Contract Manager Id: ".$row["Mid"]."<br>";
		//----------->A drop down list of already existing Managers

?>
				


<form action ="update_contract_manager.php">
		<select name="manager" required>
		<option value="">Select</option>
		<option value="15" name="manager">Camille Gagne</option>
		<option value="34" name="manager">Holly Ryan</option>
		<option value="37" name="manager">Connor Neuendorff</option>
		<option value="38" name="manager">David Van</option>
		<option value="41" name="manager">Akshat Bisht</option>
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>











<?php
//----------------------------------------------------------------------------------------------------------------------------------------------------		
		echo "Contract Satisfation Score: ".$row["Satisfaction"]."<br>"
		//----------->A drop down list of the scores from 1 - 10
?>	
		<form action="update_company_satisfaction.php">
		<select name="satisfaction" required>
		<option value="">Select</option>
		<option value=1 name="satisfaction">1</option>
		<option value=2 name="satisfaction">2</option>
		<option value=3 name="satisfaction">3</option>
		<option value=4 name="satisfaction">4</option>
		<option value=5 name="satisfaction">5</option>
		<option value=6 name="satisfaction">6</option>
		<option value=7 name="satisfaction">7</option>
		<option value=8 name="satisfaction">8</option>
		<option value=9 name="satisfaction">9</option>
		<option value=10 name="satisfaction">10</option>		
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>

<?php
//----------------------------------------------------------------------------------------------------------------------------------------------------
		echo "Contract Department: ".$row["Department"]."<br>"."<br>";
		//----------->A drop down list of already existing list of departments
?>
		<form action="update_contract_department.php">
		<select name="department" required>
		<option value="">Select</option>
		<option value=1 name="department">1</option>
		<option value=2 name="department">2</option>
		<option value=3 name="department">3</option>
		<option value=4 name="department">4</option>
		<option value=5 name="department">5</option>
		<option value=6 name="department">6</option>		
		</select>		
		<input type="hidden" name="id" value = "<?php echo $row["Id"];?>">
		<input type= "submit" value="submit">
		</form>

<?php




?>











<?php		

	}
?>
