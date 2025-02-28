<?php include('dashboard/db.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELAMAT DATANG DI WEBSITE SENAT POLIBATAM</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .card-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* Rasio 16:9 */
            overflow: hidden; 
            background-color: #f8f9fa; /* Background untuk ruang kosong */
        }

        .card-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-text {
            flex-grow: 1; /* Pastikan deskripsi memenuhi ruang vertikal */
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include('nav.php')?>

    <div class="container container-xl">
    <div class="row container-lg mx-auto mt-3">

    <?php
    include('dateConversion.php');

    if (isset($_GET['search']) ){
        $search = $_GET['search'];
        $sql = "SELECT b.id, b.judul, b.deskripsi, b.tanggal, s.nama as penulis, b.foto 
                FROM berita b 
                JOIN struktur s ON b.penulis = s.Id_struktur 
                WHERE judul LIKE '%$search%'
                ORDER BY b.tanggal DESC";
        $query = mysqli_query($conn,$sql);
        while($row = $query->fetch_assoc()){
            echo '<div class="col-lg-4 d-flex">';
            echo '<div class="card mb-4">';
            echo '<div class="card-img-wrapper">';
            echo '<img src="uploads/' . $row['foto'] . '" alt="Gambar Berita">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<div class="small text-muted fs-5">' . htmlspecialchars(dateConversion($row['tanggal'])) . '</div>';
            echo '<h2 class="card-title h4">' . htmlspecialchars($row['judul']) . '</h2>';
            echo '<p class="card-text fs-5">' . substr($row['deskripsi'],0,100) . '...</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<p class="mb-0">Penulis: ' . htmlspecialchars($row['penulis']) . '</p>';
            echo '<a class="btn btn-primary" href="berita/' . implode("-", explode(" ", $row['judul'])) . '.php" target="_blank">Read more →</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        // var_dump($result);
    } else{
        header("Location: index.php");
        exit();
    }
    ?>
    </div>
    </div>
    

    <?php include('footer.php')?>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>