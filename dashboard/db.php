<?php
$servername = "localhost";
$username = "adminWeb";
$password = "admin123";
$dbname = "senat_db";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4_uca1400_ai_ci");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
