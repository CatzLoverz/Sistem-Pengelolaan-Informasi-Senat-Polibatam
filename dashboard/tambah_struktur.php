<?php
// Koneksi database
include 'db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari formulir
$jabatan = $_POST['jabatan'];
$nama = $_POST['nama'];
$email = $_POST['email'];

// Query insert
$sql = "INSERT INTO struktur (Jabatan, Nama, Email) VALUES ('$jabatan', '$nama', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan!";
    header("Location: struktur.php?status=add-success");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

