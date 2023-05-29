<?php   
session_start();
session_destroy(); 
header("location:HMW1.HomePage.php"); 
exit();
?>