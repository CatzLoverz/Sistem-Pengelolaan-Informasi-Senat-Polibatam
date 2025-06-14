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
    <title>JADWAL RAPAT | SENAT POLIBATAM</title>
</head>
<body>
    
    <?php include('nav.php'); ?>    
    <h1 class="text-center mt-5 mb-5">Jadwal Rapat Senat Politeknik Negeri Batam</h1>

<!-- proker senat tabel -->
<div class="row container-lg mx-auto mt-5 justify-content-sm-around">
<table class="jadwal table table-striped table-responsive-lg container-lg " id="example" >
        <thead>
            <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>DESKRIPSI</th>
                <th>TAHUN</th>
                <th>JAM</th>
                <th>EMAIL</th>
            </tr>
        </thead>
        
        <tbody>
            <?php 
            include 'dashboard/dbpublic.php';
            $sql1 = "SELECT jadwal.Id_rapat, jadwal_email.Id_rapat, struktur.Id_struktur, struktur.nama, struktur.Email FROM jadwal LEFT JOIN jadwal_email ON jadwal.Id_rapat = jadwal_email.Id_rapat LEFT JOIN struktur ON struktur.Id_struktur = jadwal_email.Id_struktur";
            $result1 = $conn->query($sql1);
            $anggota = array();
            while($row = $result1->fetch_assoc()){

                // Menambahkan data ke array jika Id_rapat tidak ada
                if(isset($anggota[$row['Id_rapat']])){
                    $anggota[$row['Id_rapat']][] = $row['Email'];
                } else{
                    $anggota[$row['Id_rapat']] = array();
                    $anggota[$row['Id_rapat']][] = $row['Email'];
                }
            }
            $no = 0;
            
            // Query untuk mengambil data dari tabel jadwal_rapat
            $sql = "SELECT * FROM `jadwal`";
            $result = $conn->query($sql);

            
            include('dateConversion.php');

            // while($row){
                // $dt = strtotime($data['tahun']);
                // $day = date("N",$dt);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    $no++;
            ?>
            
            
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['Judul'] ?></td>
                <td><?= $row['Deskripsi'] ?></td>
                <td><?= $row['Tanggal'] ?></td>
                <td><?= $row['Jam'] ?></td>
                <td>
                    <?php
                    foreach($anggota[$row['Id_rapat']] as $daftar){
                        echo $daftar ."</br>";
                    }
                    ?>
                 </td>
            </tr>
            <?php 
                } 
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";    
            }
            $conn->close();
            ?>
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