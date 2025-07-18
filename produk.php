<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- database -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" class="col-md-7"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <title>PRODUK PERATURAN | SENAT POLIBATAM</title>
</head>
<body>
    
    <?php include('nav.php'); ?>    
    <h1 class="text-center mt-5 mb-5">Produk Peraturan Senat Politeknik Negeri Batam</h1>

<!-- proker senat tabel -->
<div class="row container-lg mx-auto mt-5 justify-content-sm-around">
<table class="jadwal table table-striped table-responsive-lg container-lg " id="example" >
        <thead>
            <tr>
                <th>NO</th>
                <th>PENGUNGGAH</th>
                <th>JUDUL</th>
                <th>ISI</th>
                <th>TANGGAL</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            include 'dashboard/dbpublic.php';
            $q = mysqli_query($conn, "SELECT produk.*, struktur.Id_struktur, struktur.nama  FROM produk LEFT JOIN struktur ON struktur.Id_struktur = produk.p_unggah");
            $no = 0;
            
            include('dateConversion.php');

            while($data = mysqli_fetch_array($q)){
                $no++;
                $dt = strtotime($data['tanggal']);
                $day = date("N",$dt);
            
            ?>
            
            
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><a href="uploads/<?= $data['isi'] ?>" target="_blank"><?= $data['isi'] ?></a></td>
                <td><?= dateConversion($data['tanggal']) ?></td>
            </tr>
            <?php } ?>
        </tbody>
</table>

<script>
    	$(document).ready(function () {
            $('#example').DataTable();
        });
        new DataTable('#example', {
            scrollX: true
        });
</script>
</div>

<?php include('footer.php'); ?>


    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>