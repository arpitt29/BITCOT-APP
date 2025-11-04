<?php
$servername = "bitcotdb.cbioyyk4o6pl.ap-south-1.rds.amazonaws.com";
$username = "admin";
$password = "7771905843";
$dbname = "bitcotdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
