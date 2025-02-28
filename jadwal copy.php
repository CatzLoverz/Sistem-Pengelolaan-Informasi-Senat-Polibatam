<?php include('dashboard/db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        

    <title>Jadwal Rapat</title>
</head>
<body>

    <?php include('nav.php');?>

    <h2 class="mb-5 text-center">Jadwal Rapat Politeknik Negri Batam</h2>

    <table class="jadwal table table-striped table-responsive-lg container-lg" id="example">
        <thead>
          <tr>
            <th scope="col">JUDUL</th>
            <th scope="col">DESKRIPSI</th>
            <th scope="col">TAHUN</th>
            <th scope="col">JAM</th>
            <th scope="col">EMAIL</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql1 = "SELECT jadwal.Id_rapat, jadwaL_email.Id_rapat, struktur.Id_struktur, struktur.nama FROM jadwal LEFT JOIN jadwal_email ON jadwal.Id_rapat = jadwal_email.Id_rapat LEFT JOIN struktur ON struktur.Id_struktur = jadwal_email.Id_struktur";
            $result1 = $conn->query($sql1);
            $anggota = array();
            while($row = $result1->fetch_assoc()){
            
                // Menambahkan data ke array jika Id_rapat tidak ada
                if(isset($anggota[$row['Id_rapat']])){
                    $anggota[$row['Id_rapat']][] = $row['nama'];
                } else{
                    $anggota[$row['Id_rapat']] = array();
                    $anggota[$row['Id_rapat']][] = $row['nama'];
                }
            }
            $sql = "SELECT jadwal.*, jadwal_email.*, struktur.* FROM `jadwal` LEFT JOIN jadwal_email ON jadwal.Id_rapat = jadwal_email.Id_rapat LEFT JOIN struktur ON struktur.Id_struktur = jadwal_email.Id_struktur";
            $query = mysqli_query($conn,$sql);
            // $result = mysqli_fetch_assoc($query);
            include('dateConversion.php');
            while($row = $query->fetch_assoc()){
              $year = strtotime($row['Tanggal']);
              echo "<tr>";
              echo "<td>".$row['Judul']."</td>";
              echo "<td>".$row['Deskripsi']."</td>";
              echo "<td>".date("Y",$year)."</td>";
              echo "<td>".$row['Jam']."</td>";
              echo "<td>".$row['Email']."</td>";
              echo "</tr>";
            };
          ?>
        </tbody>
      </table>

      <script>
    	$(document).ready(function () {
            $('#example').DataTable();
        });
      </script>

      <?php include('footer.php'); ?>
    
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>