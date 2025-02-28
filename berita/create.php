<?php
include('../../db.php'); 
include('dateConversion.php');

$sql = "SELECT * FROM berita WHERE judul LIKE '%senat tetapkan 13 calon direktur politeknik negri batam%'";
$query = mysqli_query($conn,$sql);

while($row = $query->fetch_assoc()){
    $name = changeName($row['judul'],"-");
    $file_handle = fopen("$name.php", 'w');
    fwrite($file_handle,'
    <?php include("../../db.php");?>
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
    $sql = "SELECT * FROM berita WHERE judul=\"'.$row['judul'].'\"";
    $query = mysqli_query($conn,$sql);
    while($row = $query->fetch_assoc()){
    ?>

        <div class="col-12 col-md-7 mb-5 mb-md-0 p-berita">
            <h2 class="fs-1 fw-bold"><?= htmlspecialchars($row["judul"])?></h2>  
            <time class="time fs-5 text-secondary"><?= dateConversion($row["tanggal"])?></time>
            <img src="../../uploads/<?=htmlspecialchars($row["foto"])?>" alt="<?=htmlspecialchars($row["foto"])?>" class="w-100 d-block mb-3"> 
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
}

?>