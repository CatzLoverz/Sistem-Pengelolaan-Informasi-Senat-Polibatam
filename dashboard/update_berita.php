
<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE berita SET judul = '$judul', deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diubah!'); window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!'); window.location = 'index.php';</script>";
    }
}
?>
