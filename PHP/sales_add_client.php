<!DOCTYPE html>
<html>
<body>

<h2>Client Information</h2>
<!--1.As a sales associate, I should be able to create an account of a client 
by entering client details from the browser. (All details as in Warm up project)

2.As a sales associate, I should be able to select a “Province” and “City” from pre
-populated list of Provinces and Cities of Canada.

3.As a sales associate, I should be able
to select from the list of managers assigned to the 
project.

create a form for all the client's information
Information table:: Id, First_name, Last_name,Address, City, Province, Phone_number, Email, Employee_Client

have to make sure that phone number is 10 digits

 -->

<form name="myform" action ="contract_add.php" id="myForm">
  First name:<br>
  <input type="text" name="firstname" required >
  <br><br >
  Last name:<br>
  <input type="text" name="lastname" required >
  <br><br >
  
  Country:<br > 

   <select id="countySel" size="1" name="country" required>
        <option value="" selected="selected" required>-- Select Country --</option>
    </select>
     <br>
    <br><br > 
   Province:<br > 
    <select id="stateSel" size="1" name="province" required>
        <option value="" selected="selected" required>-- Select Province--</option>
    </select>
    <br>
    <br><br >     
   City:<br > 
    <select id="citySel" size="1" name="city" required>
        <option value="" selected="selected" required>-- Select City--</option>
    </select>
 
    <br > <br > <br > 
  Address:<br>
     <input type="text" name="address" required >
     <br><br ><br>
  
  Phone Number:<br>
<input type="text" name="phone" pattern="[1-9]{1}[0-9]{9}" required> 
  <br><br>
  Email:<br>
  <input id="emailAddress" type="email" name="emailAddress" required>
  <br>
  <br>

<input type="hidden"  name="id" value="000">

<br><br><br>


  <input type="submit" value="Submit">



</form>






<script>
var countryStateInfo = {
	"Canada": {
		"QC": {
			"Montreal": ["90001", "90002", "90003", "90004"],
			"Quebec City": ["90001", "90002", "90003", "90004"],
			"Laval": ["92093", "92101"]
		},
		"NB": {
			"Bathurst": ["75201", "75202"],
			"Moncton": ["75201", "75202"],
			"Miramchi": ["73301", "73344"]
		},
		"MB": {
			"Winnipeg": ["73301", "73344"]
		},
		"BC": {
			"Vancouver": ["73301", "73344"]
		},
		"AB": {
			"Calgary": ["75201", "75202"],
			"Edmonton": ["75201", "75202"]
		}
	}
}


window.onload = function () {
	
	//Get html elements
	var countySel = document.getElementById("countySel");
	var stateSel = document.getElementById("stateSel");	
	var citySel = document.getElementById("citySel");

	
	//Load countries
	for (var country in countryStateInfo) {
		countySel.options[countySel.options.length] = new Option(country, country);
	}
	
	//County Changed
	countySel.onchange = function () {
		 
		 stateSel.length = 1; // remove all options bar first
		 citySel.length = 1; // remove all options bar first

		 
		 if (this.selectedIndex < 1)
			 return; // done
		 
		 for (var state in countryStateInfo[this.value]) {
			 stateSel.options[stateSel.options.length] = new Option(state, state);
		 }
	}
	
	//State Changed
	stateSel.onchange = function () {		 
		 
		 citySel.length = 1; // remove all options bar first

		 
		 if (this.selectedIndex < 1)
			 return; // done
		 
		 for (var city in countryStateInfo[countySel.value][this.value]) {
			 citySel.options[citySel.options.length] = new Option(city, city);
		 }
	}
	
	//City Changed
	citySel.onchange = function () {

		
		if (this.selectedIndex < 1)
			return; // done
		
		
	}	
}



</script>






</body>
</html>


