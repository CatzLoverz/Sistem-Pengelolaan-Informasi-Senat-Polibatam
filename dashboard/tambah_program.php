<?php
include "db.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah data yang diperlukan ada di POST
    if (isset($_POST['p_jawab']) && isset($_POST['kegiatan']) && isset($_POST['tanggal'])) {
        $p_jawab = $_POST['p_jawab'];
        $kegiatan = $_POST['kegiatan'];
        $tanggal = $_POST['tanggal'];

        // Escape data untuk mencegah SQL injection
        $p_jawab = $conn->real_escape_string($p_jawab);
        $kegiatan = $conn->real_escape_string($kegiatan);  // Asumsi kegiatan adalah string
        $tanggal = $conn->real_escape_string($tanggal);

        // Query untuk memasukkan data ke dalam tabel
        $sql = "INSERT INTO `program` (p_jawab, kegiatan, Tanggal) 
                VALUES ('$p_jawab', '$kegiatan', '$tanggal')"; // Pastikan $kegiatan dibungkus dengan tanda petik jika itu string

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            header("Location: program.php?status=add-success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Form data tidak lengkap.";
    }
} else {
    echo "Request tidak valid.";
}

$conn->close();
?>
