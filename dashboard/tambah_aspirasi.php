<?php
// Koneksi database
include 'dbpublic.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $aspirasi = $_POST['aspirasi'];

    // Query untuk menyimpan data aspirasi
    $sql = "INSERT INTO aspirasi (judul, kategori, aspirasi) VALUES ('$judul', '$kategori', '$aspirasi')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman aspirasi.php dan tampilkan modal
        header("Location: ../aspirasi.php?success=true");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

