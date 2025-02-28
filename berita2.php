<?php include('dashboard/db.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERITA</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-berita{
            height: 400px;
        }
    </style>
</head>

<body>
    <?php include('nav.php')?>

    <h2 class="text-center mt-3">BERITA TERBARU</h2>

    <div class="row container-lg mx-auto mt-5 justify-content-sm-around">

    <?php
        $sql = 'SELECT b.id, b.judul, b.deskripsi, b.tanggal, s.nama as penulis, b.foto FROM berita b JOIN struktur s ON b.penulis = s.Id_struktur ORDER BY b.tanggal DESC';
        $query = mysqli_query($conn,$sql);
        include('dateConversion.php');
        while($row = $query->fetch_assoc()){
            echo '<div class="column-1 col-lg-4 ">
            <div class="card mb-4 ">
                <img src="uploads/'.$row['foto'].'" class="img-fluid card-img-top card-berita">
                <div class="card-body ">
                    <div class="small text-muted fs-5">'. htmlspecialchars(dateConversion($row['tanggal'])).'</div>';
            echo '<h2 class="card-title h4">'.htmlspecialchars($row['judul']).'</h2>';
            echo '<p class="card-text fs-5">'.substr($row['deskripsi'],0,61).'</p>';
            echo '<p class="card-text fs-5">Penulis: '.htmlspecialchars($row['penulis']).'</p>';
            echo '<a class="btn btn-primary" href="berita/'.implode("-",explode(" ",$row['judul'])).'.php" target="_blank">Read more →</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        };
    ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <?php include('footer.php'); ?>

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>