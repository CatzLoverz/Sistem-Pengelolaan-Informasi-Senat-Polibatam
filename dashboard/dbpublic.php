<?php
$servername = "localhost";
$username = "userWeb";
$password = "user123";
$dbname = "senat_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}