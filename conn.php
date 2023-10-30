<?php
ob_start();
// Create connection
$conn = new mysqli("localhost","root","","f0_35316860_db");
// $conn = new mysqli("sql303.infinityfree.com","if0_35316860","dhWP1SbPKV","if0_35316860_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>


