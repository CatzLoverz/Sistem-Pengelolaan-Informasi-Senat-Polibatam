<?php
// Koneksi database
$conn = new mysqli("localhost", "Admin", "admin123", "senat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Periksa apakah parameter 'kategori' ada di URL
if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
} else {
    echo json_encode(["error" => "Kategori tidak ditemukan."]);
    exit;
}

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

// Query untuk mengambil aspirasi berdasarkan kategori dan tanggal
$sql = "SELECT judul, aspirasi, tanggal FROM aspirasi WHERE kategori = '$kategori'";

// Jika startDate dan endDate ada, filter berdasarkan rentang tanggal
if ($startDate && $endDate) {
    $sql .= " AND tanggal BETWEEN '$startDate' AND '$endDate'";
}

// Urutkan berdasarkan tanggal dari yang paling awal
$sql .= " ORDER BY tanggal ASC";

$result = $conn->query($sql);

// Array untuk menyimpan data aspirasi
$aspirasi = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aspirasi[] = $row;
    }
} else {
    echo json_encode(["error" => "Tidak ada data aspirasi."]);
    exit;
}

// Menutup koneksi
$conn->close();

// Mengembalikan data dalam format JSON
echo json_encode($aspirasi);
?>




