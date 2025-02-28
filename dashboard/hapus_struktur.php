<?php
include "db.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Pastikan ID valid
if ($id > 0) {
    // Query untuk menghapus data berdasarkan ID
    $deleteSql = "DELETE FROM `struktur` WHERE Id_struktur = ?";

    // Persiapkan dan bind parameter
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $id);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke halaman jadwal-rapat.php setelah penghapusan berhasil
        header("Location: struktur.php?status=delete-success");
        exit; // Pastikan script berhenti di sini setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
} else {
    // Jika ID tidak valid, redirect ke jadwal-rapat.php
    header("Location: struktur.php");
    exit;
}

$conn->close();
?>
