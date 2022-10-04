<?php
session_start();

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "restaurant2";
 
try {
  $conn = new PDO("mysql:localhost=$dbservername;dbname=restaurant2", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>