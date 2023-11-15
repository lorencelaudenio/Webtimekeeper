<?php
ob_start();
// Create connection
$conn = new mysqli("localhost","id20750947_root","11152023Ldl!","id20750947_timein");
// $conn = new mysqli("sql303.infinityfree.com","if0_35316860","dhWP1SbPKV","if0_35316860_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>


