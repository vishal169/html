<?php 
session_start();
echo $_SESSION['name'];
session_unset(); 
session_destroy(); 
// to send to main page//
header('location:home_page.php');
?>