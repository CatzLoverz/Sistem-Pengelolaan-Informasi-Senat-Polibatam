<?php
include "db.php";
include "dateConversion.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Pastikan ID valid
if ($id > 0) {
    // Query untuk menghapus data berdasarkan ID
    $deleteSql = "DELETE FROM `berita` WHERE id= ?";
    $getSql = "SELECT judul FROM `berita` WHERE id= $id";
    

    // Persiapkan dan bind parameter
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $id);

    $query = mysqli_query($conn,$getSql);

    // Eksekusi query

    if ($stmt->execute()) {
        // Redirect ke halaman jadwal-rapat.php setelah penghapusan berhasil
        while($row = $query->fetch_assoc()){
            $name = changeName($row['judul'],"-");
            unlink("../berita/$name.php");
        }
        header("Location: berita.php?status=delete-success");
        exit; // Pastikan script berhenti di sini setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
} else {
    // Jika ID tidak valid, redirect ke jadwal-rapat.php
    header("Location: berita.php");
    exit;
}

$conn->close();
?>