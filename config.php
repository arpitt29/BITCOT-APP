<?php
$servername = "PUT_RDS_ENDPOINT_HERE";   // or 127.0.0.1 if you use local DB
$username = "your_db_user";
$password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
