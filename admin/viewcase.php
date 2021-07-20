<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
table{
    width: 75%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}

th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>

</head>
<body background= "doctordesk.jpg">
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
<center><h1>REPORTED CASES</h1><hr>
<?php
session_start();
$con = mysqli_connect('localhost','root','','sspace');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM cases order by ID ASC";
$result = mysqli_query($con,$sql);
echo "<br><h2>CASES REPORTED IN THE DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>ID</th>
<th>Location</th>
<th>Hospital</th>
<th>Name</th>
<th>For</th>
<th>Gender</th>
<th>Phone No.</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	  echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['Location'] . "</td>";
    echo "<td>" . $row['Hospital'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['For'] . "</td>";
	  echo "<td>" . $row['Gender'] . "</td>";
	  echo "<td>" . $row['Phone No.'] . "</td>";
  
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
?>
</body>
</html>