<?php
function dateConversion($date){
    // ubah format tanggal ke string
    $dt = strtotime($date);

    // konversi ke hari
    $hari = date("N",$dt);
    switch ($hari){
        case "1":
            $hari = "Senin";
            break;
        case "2":
            $hari = "Selasa";
            break;
        case "3":
            $hari = "Rabu";
            break;
        case "4":
            $hari = "Kamis";
            break;
        case "5":
            $hari = "Jumat";
            break;
        case "6":
            $hari = "Sabtu";
            break;
        case "7":
            $hari = "Minggu";
            break;
    }

    //Konversi ke tanggal 
    $tanggal = date("j",$dt);

    // Konversi ke bulan
    $bulan = date("n",$dt);
    switch ($bulan){
        case "1":
            $bulan = "Januari";
            break;
        case "2":
            $bulan = "Februari";
            break;
        case "3":
            $bulan = "Maret";
            break;
        case "4":
            $bulan = "April";
            break;
        case "5":
            $bulan = "Mei";
            break;
        case "6":
            $bulan = "Juni";
            break;
        case "7":
            $bulan = "Juli";
            break;
        case "8":
            $bulan = "Agustus";
            break;
        case "9":
            $bulan = "September";
            break;
        case "10":
            $bulan = "Oktober";
            break;
        case "11":
            $bulan = "November";
            break;
        case "12":
            $bulan = "Desember";
            break;
    }

    // Konversi ke tahun
    $tahun = date("Y",$dt);

    return $hari . ", " . $tanggal . " " . $bulan . " " . $tahun;
}

function chopExtension($filename) {
    return pathinfo($filename, PATHINFO_FILENAME);
}
function changePath($title){
    return $title = implode(" ",explode("-",chopExtension($_SERVER['SCRIPT_NAME'])));
}

function changeName($title,$mode){
    try{
        if($mode == "-"){
            return $title = implode("-", explode(" ",$title));
        } elseif ($mode == ' ') {
            return $title = implode(" ", explode("-",$title));
        } else{
            throw new Exception("Gagal menjalankan Fungsi");
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
}

?>