<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halo</title>
</head>
<body>
    <?php
    $sql = "SELECT jadwal.*, jadwal_email.*, struktur.Email, struktur.nama FROM jadwal LEFT JOIN jadwal_email ON jadwal_email.Id_rapat = jadwal.Id_rapat LEFT JOIN struktur ON jadwal_email.Id_struktur = struktur.Id_struktur";
    $result = $conn->query($sql);
    $anggota = array();
    function calculateArray($angka){
        $index = array();
        array_push($index,$angka);
        return $index;
    }
    while($row = $result->fetch_assoc()){
        array_push($anggota,$row['Id_rapat']);
        
        ?>
    <p><?=$row['Id_rapat']?>: </p>
    <span><?=$row['Id_struktur']?> - <?=$row['Email']?> = <?=$row['nama']?></span>
    <?=$row['Id_rapat']?></br>
    
    <?php
    }
    print_r(array_unique($anggota,SORT_NUMERIC));
    foreach($anggota as $angg){
        echo $angg;
    }
    ?>
</body>
</html>