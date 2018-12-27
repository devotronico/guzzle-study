<?php
$hostname = "";
$username = "";
$password = "";

$conn = new mysqli("localhost", "root", "", "db_sicurezza");
if($conn->connect_error) {
  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset("utf8mb4");
/*
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

} 
*/
