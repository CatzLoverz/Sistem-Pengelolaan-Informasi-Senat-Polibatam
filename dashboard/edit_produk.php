<?php
include "db.php";


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // Get the ID to update the specific record
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];

    // Default to the existing file name in the database, check if it's set
    // If no existing file is provided, set $isi to an empty string to prevent undefined variable errors
    $isi = isset($_POST['existing_file']) && !empty($_POST['existing_file']) ? $_POST['existing_file'] : '';    

    // Check if a new file is uploaded
    if (isset($_FILES['isi']['name']) && $_FILES['isi']['error'] === 0) {
        $fileName = $_FILES['isi']['name'];
        $fileTmpName = $_FILES['isi']['tmp_name'];
        $fileSize = $_FILES['isi']['size'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed = ['pdf'];

        if (in_array($fileExt, $allowed)) {
            if ($fileSize <= 2000000) { // Max size: 2MB
                // Use the original file name but ensure it's unique by appending a timestamp or unique ID
                $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . $fileExt;
                $uploadPath = '../uploads/' . $newFileName;

                // Move the file to the uploads directory
                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    // If a new file is uploaded, delete the old one if it exists
                    if (!empty($isi) && file_exists('../uploads/' . $isi)) {
                        unlink('../uploads/' . $isi); // Remove old file
                    }

                    // Update the variable with the new file name
                    $isi = $newFileName;
                } else {
                    header("Location: produk.php?status=edit-failed");
                    exit;
                }
            } else {
                header("Location: produk.php?status=edit-failed");
                exit;
            }
        } else {
            header("Location: produk.php?status=edit-failed");
            exit;
        }
    }

    // Update the database record
    $sql = "UPDATE produk SET judul = ?, tanggal = ?, isi = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $judul, $tanggal, $isi, $id);

    if ($stmt->execute()) {
        header("Location: produk.php?status=edit-success"); // Redirect to the list page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
