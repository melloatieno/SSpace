<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head>
<?php include "dbconfig.php"; ?>

<body style="background-image:url(images/bookback.jpg)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><strong> Safe Space </strong></a></li>
			<li><a href="index.php">Home</a></li>
		</ul>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="sucontainer" style="background-image:url(images/bookback.jpg)">
    <label><b>Location:</b></label><br>
		<input type="text" placeholder="Enter the current loaction" name="location" required><br>

    <label><b>Hospital Chosen:</b></label><br>
		<input type="text" placeholder="Enter The hospital you chose" name="hospital" required><br>

		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter Full name" name="fname" required><br>

        <div>
        <label><b>Reporting for:</b></label><br>
		<select class="" id="report" onchange="breport1()" name="report">
              <option value="select">--select--</option>
              <option value="oneself">oneself(reporting as victim)</option>
              <option value="someone else">Someone Else</option>
            </select>
		</div>
        <br>
		<label><b>Gender:</b></label><br>
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other<br><br>

        <label><b>Phone Number:</b></label><br>
		<input type="number" name="phnnmbr" class="form-control" value="" placeholder="07XXXXXXXX" required><br>
		
		<div class="container">
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
		</div>

  </form>
<?php
session_start();
$con = mysqli_connect('localhost','root','','sspace');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
function newReport()
{
  include 'dbconfig.php';
    $location =$_POST['location'];
    $hospital =$_POST['hospital'];
    $name =$_POST['fname'];
    $who = $_POST['report'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phnnmbr'];

   $sql="INSERT INTO cases(location, hospital, name, who, gender, phonenumber)VALUES('$location','$hospital','$fname', '$report', '$gender','$phnnmbr')";

   if (mysqli_query($conn, $sql)) 
   {
     echo "<h2>Case reported successfully. Kindly check your messages for further directions.</h2>";
     header( "Refresh:3; url=report.php");
 
   } 
   else
   {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
 }

 ?>
	
</body>
</html>