<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="adminmain.css"> 
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getclinic.php",
	data:'city='+val,
	success: function(data){
		$("#clinic-list").html(data);
	}
	});
}
function getDoctorRegion(val) {
	$.ajax({
	type: "POST",
	url: "getdoctorregion.php",
	data:'city='+val,
	success: function(data){
		$("#doctor-list").html(data);
	}
	});
}

</script>
</head>
<body background= "clinicview.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN DASHBOARD</font></li>
<br>
<h2>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Doctor</a>
    <div class="dropdown-content">
      <a href="adddoctor.php">Add Doctor</a>
      <a href="deletedoctor.php">Delete Doctor</a>
      <a href="showdoctor.php">Show Doctor</a>
	  <a href="showdoctorschedule.php">Show Doctor Schedule</a>
    </div>
  </li>
  
  <li class="dropdown">
  <a href="javascript:void(0)" class="dropbtn">Hospital</a>
    <div class="dropdown-content">
      <a href="addhospital.php">Add Hospital</a>
      <a href="deletehospital.php">Delete Hospital</a>
      <a href="adddoctorhospital.php">Assign Doctor to Hospital</a>
	    <a href="addmanagerhospital.php">Assign Psychologist to Hospital</a>
	    <a href="deletedoctorhospital.php">Delete Doctor from Hospital</a>
	    <a href="deletemanagerhospital.php">Delete Psychologist from Hospital</a>
	    <a href="showhospital.php">Show Hospital</a>
    </div>
  </li>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Psychologist</a>
    <div class="dropdown-content">
      <a href="addpsychologist.php">Add Psychologist</a>
      <a href="deletepsychologist.php">Delete Psychologist</a>
	  <a href="showpsychologist.php">Show Psychologist</a>
    </div>
  </li>
  
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Cases</a>
    <div class="dropdown-content">
      <a href="viewcase.php">View Case</a>
      <a href="deletecase.php">Delete Case</a>

    </div>
  </li>
   <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>
	
</ul>
</h2>
<center><h1>ASSIGN DOCTOR TO A HOSPITAL</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label style="font-size:20px" >City:</label>
		<select name="city" id="city-list" class="demoInputBox"  onChange="getState(this.value);getDoctorRegion(this.value);">
		<option value="">Select City</option>
		<?php
		include 'dbconfig.php';
		$sql1="SELECT distinct City FROM clinic";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["City"]; ?>"><?php echo $rs["City"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >Hospital:</label>
		<select id="clinic-list" name="clinic"  >
		<option value="">Select Hospital</option>
		</select>
		
		<label style="font-size:20px" >Doctor:</label>
		<select name="doctor" id="doctor-list">
		<option value="">Select Doctor</option>
		</select>
		
		<label style="font-size:20px" >
		Available Days<br>
		<table>
		<tr><td>Monday:</td><td><input type="checkbox" value="Monday" name="daylist[]"/></td></tr>
		<tr><td>Tuesday:</td><td><input type="checkbox" value="Tuesday" name="daylist[]"/></td></tr>
		<tr><td>Wednesday:</td><td><input type="checkbox" value="Wednesday" name="daylist[]"/></td></tr>
		<tr><td>Thursday:</td><td><input type="checkbox" value="Thursday" name="daylist[]"/></td></tr>
		<tr><td>Friday:</td><td><input type="checkbox" value="Friday" name="daylist[]"/></td></tr>
		<tr><td>Saturday:</td><td><input type="checkbox" value="Saturday" name="daylist[]"/></td></tr>
		</table>
		Availability:<br>
		From:<input type="time" name="starttime"><br>
		To:<input type="time" name="endtime"> &nbsp &nbsp &nbsp
		
		</label>
		<button name="Submit" type="submit">Submit</button>
	</form>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
if(isset($_POST['Submit']))
{
		include 'dbconfig.php';
		$cid=$_POST['clinic'];
		$did=$_POST['doctor'];
		$starttime=$_POST['starttime'];
		$endtime=$_POST['endtime'];
		
		foreach($_POST['daylist'] as $daylist)
		{
				$sql = "INSERT INTO doctor_availability (CID, DID, Day, Starttime, Endtime) VALUES ('$cid','$did','$daylist','$starttime','$endtime')";
				if (mysqli_query($conn, $sql)) 
				{
					echo "<h2>Record created successfully( CID=$cid DID=$did Day=$daylist )!!</h2>";
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
}

?>

</body>
</html>