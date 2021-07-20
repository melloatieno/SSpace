<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body style= "background-color:green"; background-repeat: no-repeat; 
    background-attachment: fixed;>
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
<center><h1>ADD PSYCHOLOGIST</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  PID:<input type="number" name="pid" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <br>
  Experience: <input type ="number" name="experience" required>
  Contact no.: <input type="number" name="contact" maxlength="10" minlength="10" required>
  <br>
  Address: <input type="text" name="address" required>
  <br>
  Username: <input type="text" name="username" required>
  <br>
  Password: <input type="password" name="pwd" required>
  <br>
  Region: <input type="text" name="region" required>
  <br>
  
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
<?php
session_start();
$con = mysqli_connect('localhost','root','','sspace');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
function newUser()
{
	include 'dbconfig.php';
		$did=$_POST['pid'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$experience=$_POST['experience'];
		$contact=$_POST['contact'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['pwd'];
		$region=$_POST['region'];
		$sql = "INSERT INTO doctor (PID, Name, Gender, Experience, Contact,Address,Username,Password,Region) VALUES ('$pid','$name','$gender','$experience','$contact','$address','$username','$password','$region') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
		header( "Refresh:3; url=adddoctor.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkdid()
{
	include 'dbconfig.php';
	$did=$_POST['did'];
	$sql= "SELECT * FROM doctor WHERE DID = '$did'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>DID already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		newUser();
	}

	
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
	$sql= "SELECT * FROM doctor WHERE Username = '$usn'";

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
       {
			echo"<b><br>Username already exists!!";
       }
	else 
		if(isset($_POST['Submit']))
	{ 
		checkdid();
	}

	
}
if(isset($_POST['Submit']))
{
	if(!empty($_POST['pid']) && !empty($_POST['username']) && !empty($_POST['pwd'])&& !empty($_POST['region']) &&!empty($_POST['experience']) &&!empty($_POST['name']) && !empty($_POST['gender']) &&!empty($_POST['address']) && !empty($_POST['contact']))
		checkusername();
	else
		echo "EMPTY VALUES NOT ALLOWED";
}

?>

</body>
</html>