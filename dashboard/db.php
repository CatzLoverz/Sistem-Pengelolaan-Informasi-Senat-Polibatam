<?php
$servername = "localhost";
$username = "adminWeb";
$password = "admin123";
$dbname = "senat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
