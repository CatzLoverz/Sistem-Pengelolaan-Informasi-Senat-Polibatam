<?php
include "db.php";
include "dateConversion.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $penulis = $_POST['penulis'];

    // Mengecek apakah file foto diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $fileName = $_FILES['foto']['name']; // Menggunakan nama asli file
        $fileTmpName = $_FILES['foto']['tmp_name'];
        $fileSize = $_FILES['foto']['size'];
        $fileType = $_FILES['foto']['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileExt, $allowed)) {
            if ($fileSize <= 2000000) { // Max file size: 2MB
                // Gunakan nama asli file
                $newFileName = $fileName;
                $uploadPath = '../uploads/' . $newFileName;

                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    // File upload berhasil, simpan data ke database
                    $sql = "INSERT INTO `berita` (judul, deskripsi, tanggal, penulis, foto) 
                            VALUES ('$judul', '$deskripsi', '$tanggal', '$penulis', '$newFileName')";

                    if ($conn->query($sql) === TRUE) {
                        $name = changeName($judul,"-");
                        $file_handle = fopen("../berita/$name.php", 'w');
                        fwrite($file_handle,'
                        <?php include("../dashboard/db.php");?>
                        <?php
                            include("dateConversion.php");

                            $namaFile = implode(" ",explode("-",chopExtension($_SERVER["SCRIPT_NAME"])));
                        ?>

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title><?=$namaFile?></title>
                            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
                            <link rel="stylesheet" href="../style2.css">
                            <link rel="stylesheet" href="berita_style.css">
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
                                integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                        </head>

                        <body>
                            <?php include("nav.php")?>
                            
                            <div class="row container-lg mx-auto mt-5 justify-content-sm-between">
                            <?php
                            $sql = "SELECT * FROM berita WHERE judul=\"'.$judul.'\"";
                            $query = mysqli_query($conn,$sql);
                            while($row = $query->fetch_assoc()){
                            ?>

                                <div class="col-12 col-md-7 mb-5 mb-md-0 p-berita">
                                    <h2 class="fs-1 fw-bold"><?= htmlspecialchars($row["judul"])?></h2>  
                                    <time class="time fs-5 text-secondary"><?= dateConversion($row["tanggal"])?></time>
                                    <img src="../uploads/<?=htmlspecialchars($row["foto"])?>" alt="<?=htmlspecialchars($row["foto"])?>" class="w-100 d-block mb-3"> 
                                    <br>

                                    <?= $row["deskripsi"] ?>
                                </div>

                            <?php
                            }
                            ?>
                                <div class="col-12 col-md-4 mt-5 mt-md-0 px-3 py-3" style="border:1px solid black; height:fit-content;">
                                    <h2 class="fs-1">-- BERITA TERBARU --</h2>

                            <?php
                            $sql2 = "SELECT * FROM berita ORDER BY tanggal desc";
                            $query2 = mysqli_query($conn,$sql2);
                            while($row = $query2->fetch_assoc()){
                            ?>
                                <div class="berita-terbaru mt-3 mb-4">
                                    <a href="<?= implode("-",explode(" ",htmlspecialchars($row["judul"]))) ?>.php" class="link-offset-2 link-offset-3-hover link-underline-dark link-underline-opacity-0 link-underline-opacity-75-hover link-opacity-75 link-opacity-100-hover link-dark">
                                        <h3 class="mb-0 fs-3 text-"><?=htmlspecialchars($row["judul"])?></h3>
                                    </a>
                                    <time class="fs-5"><?= dateConversion(htmlspecialchars($row["tanggal"]))?></time>
                                </div>
                            <?php
                            }
                            ?>
                                </div>

                            </div>

                            <?php include("footer.php"); ?>

                            <script src="bootstrap/js/bootstrap.min.js"></script>
                        </body>

                        </html>
                            ');
                        fclose($file_handle);
                        header("Location: berita.php?status=add-success");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    header("Location: berita.php?status=add-failed");
                }
            } else {
                header("Location: berita.php?status=add-failed");
            }
        } else {
            header("Location: berita.php?status=add-failed");
        }
    } else {
        header("Location: berita.php?status=add-failed");
    }
} else {
    echo "Request tidak valid.";
}
?>
