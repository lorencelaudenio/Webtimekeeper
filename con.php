<?php
ob_start();
// Create connection
//$conn = new mysqli("localhost","root","","db_ldlpadalaexpress");
$conn = new mysqli("localhost","root","","f0_35316860_db");
// $conn = new mysqli("sql104.infinityfree.com","if0_34821151","xZRvdH06Ds","if0_34821151_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>


