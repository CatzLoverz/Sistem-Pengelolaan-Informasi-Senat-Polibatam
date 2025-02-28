<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $sql = "UPDATE `struktur` SET Jabatan = ?, Nama = ?, Email = ? WHERE Id_struktur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $jabatan, $nama, $email, $id);

    if ($stmt->execute()) {
        header("Location: struktur.php?status=edit-success"); // Redirect tanpa notifikasi
        exit();
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>




