<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body>

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
<p>

<center><h1>********WELCOME ADMIN*******</h1> 
<?php
session_start();	
	if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=../index.php"); 
	}
?>
</body>
</html>