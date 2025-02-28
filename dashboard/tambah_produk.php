<?php
include "db.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $p_unggah = $_POST['p_unggah']; 
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];

    // Mengecek apakah file PDF diunggah
    if (isset($_FILES['isi']) && $_FILES['isi']['error'] == 0) {
        $fileName = $_FILES['isi']['name']; // Nama asli file
        $fileTmpName = $_FILES['isi']['tmp_name'];
        $fileSize = $_FILES['isi']['size'];
        $fileType = $_FILES['isi']['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed = ['pdf'];

        if (in_array($fileExt, $allowed)) {
            if ($fileSize <= 2000000) { // Max file size: 2MB
                // Create a unique file name by appending timestamp or unique ID
                $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . $fileExt;
                $uploadPath = '../uploads/' . $newFileName;

                // Move the uploaded file to the target directory
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    // File upload berhasil, simpan data ke database
                    $sql = "INSERT INTO `produk` (p_unggah,judul, isi, tanggal) 
                            VALUES ('$p_unggah', '$judul', '$newFileName', '$tanggal')";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: produk.php?status=add-success"); // Redirect after success
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header("Location: produk.php?status=add-failed");
                }
            } else {
                header("Location: produk.php?status=add-failed");
            }
        } else {
            header("Location: produk.php?status=add-failed");
        }
    } else {
        header("Location: produk.php?status=add-failed");
    }
} else {
    echo "Request tidak valid.";
}
?>



