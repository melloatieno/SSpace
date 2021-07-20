<?php
// Initialize the session
session_start();
 

$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login 
header("location: login.php");
exit;
?>