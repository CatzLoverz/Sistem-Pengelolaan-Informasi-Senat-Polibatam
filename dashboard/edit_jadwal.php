<?php
include "db.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id']; // ID jadwal rapat
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];

    // Query untuk update data berdasarkan ID
    $sql = "UPDATE `jadwal` SET Judul = ?, Deskripsi = ?, Tanggal = ?, Jam = ? WHERE Id_rapat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $judul, $deskripsi, $tanggal, $jam, $id);

    if ($stmt->execute()) {
        header("Location: jadwal-rapat.php?status=edit-success"); // Redirect tanpa notifikasi
        exit();
    } else {
        // Tampilkan pesan error jika eksekusi gagal
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

