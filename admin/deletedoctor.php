<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "doctordesk.jpg" background-repeat: no-repeat;
  background-attachment: fixed>
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
</ul>
</h2>
<h1>
<center><h1>DELETE DOCTOR</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Enter DID:<center><input type="number" name="did"></center>
			<button type="submit" name="Submit1">Delete by DID</button>
			<br>---------OR---------<br>
Select Name:<br><?php
                require ('dbconfig.php');
				require_once('dbconfig.php');
				$doctor_result = $conn->query('select * from doctor order by DID ASC');
				?>
				<center>
				<select name="doctorname">
				<option value="">---Select Name---</option>
				<?php
				if ($doctor_result->num_rows > 0) {
				while($row = $doctor_result->fetch_assoc()) {
				?>
				<option value="<?php echo $row["DID"]; ?>"><?php echo "(DID= $row[DID]) Dr. ".$row["Name"]; ?></option>
				<?php
					}
					}
				?>
				</select></center>
				
				<button type="submit" name="Submit2">Delete by Name</button>
</form>			
<?php
session_start();
include 'dbconfig.php';
if(isset($_POST['Submit1']))
{
	$did=$_POST['did'];
	$sql = "DELETE FROM doctor WHERE DID= $did ";
	$sqlda = "DELETE FROM doctor_availability WHERE DID= $did ";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully from doctors table.Refreshing....";
		header( "Refresh:3; url=deletedoctor.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
		
	if (mysqli_query($conn, $sqlda))
		{
		echo "Record deleted successfully from doctors_availability table.Refreshing....";
		header( "Refresh:3; url=deletedoctor.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
}
if(isset($_POST['Submit2']))
{
	$did=$_POST['doctorname'];
	$sql = "DELETE FROM doctor WHERE did = $did ";
	$sqlda = "DELETE FROM doctor_availability WHERE DID= $did ";
	if (mysqli_query($conn, $sql))
		{
		echo "Record deleted successfully.Refreshing....";
		header( "Refresh:3; url=deletedoctor.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
	if (mysqli_query($conn, $sqlda))
		{
		echo "Record deleted successfully from doctors_availability table.Refreshing....";
		header( "Refresh:3; url=deletedoctor.php");
		}
	else
		{
			echo "Error deleting record: " . mysqli_error($conn);
		}
}	
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
?>			
</body>
</html>