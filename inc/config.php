<?php 
header('Content-type: text/plain; charset=utf-8');
$servername = "localhost";
$username = "synerry_cash";
$password = "itoL2oAZ7";
$dbname = "synerry_cash";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
 ?>