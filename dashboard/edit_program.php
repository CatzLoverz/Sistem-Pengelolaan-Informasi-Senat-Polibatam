<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debug data yang diterima
    var_dump($_POST);

    // Ambil data dari form
    $id = $_POST['id'] ?? '';
    $kegiatan = $_POST['kegiatan'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';

    // Perbarui data di database
    $sql = "UPDATE program SET 
            Kegiatan = '$kegiatan', 
            Tanggal = '$tanggal' 
            WHERE Id_program = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui.";
        header("Location: program.php?status=edit-success"); // Redirect setelah sukses
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "Request tidak valid.";
}
?>


