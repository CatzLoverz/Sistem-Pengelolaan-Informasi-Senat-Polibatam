<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Koneksi ke database
$servername = "localhost";
$username = "Admin";
$password = "admin123";
$dbname = "senat_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari form dengan validasi awal
$judul = htmlspecialchars(trim($_POST['judul']));
$deskripsi = htmlspecialchars(trim($_POST['deskripsi']));
$tanggal = htmlspecialchars(trim($_POST['tanggal']));
$jam = htmlspecialchars(trim($_POST['jam']));
$emails = isset($_POST['email']) ? $_POST['email'] : [];

// Validasi input kosong
if (empty($judul) || empty($deskripsi) || empty($tanggal) || empty($jam) || empty($emails)) {
    die(header('Location: jadwal-rapat.php?status=add-failed'));
}

// Gunakan prepared statements untuk mencegah SQL Injection
$sql = $conn->prepare("INSERT INTO `jadwal` (Judul, Deskripsi, Tanggal, Jam) VALUES (?, ?, ?, ?)");
$sql->bind_param("ssss", $judul, $deskripsi, $tanggal, $jam);

if ($sql->execute() === TRUE) {
    $id_rapat = $conn->insert_id;

    // Tambahkan data ke tabel jadwal_email
    if (!empty($emails)) {
        $sql2 = $conn->prepare("INSERT INTO `jadwal_email` (Id_rapat, Id_struktur) VALUES (?, ?)");
        foreach ($emails as $id_struktur) {
            $id_struktur = (int)$id_struktur;
            $sql2->bind_param("ii", $id_rapat, $id_struktur);
            $sql2->execute();
        }
        $sql2->close();
    }

    // Ambil email valid berdasarkan ID yang dipilih
    $email_list = [];
    if (!empty($emails)) {
        $placeholders = implode(',', array_fill(0, count($emails), '?'));
        $email_query = $conn->prepare("SELECT email FROM struktur WHERE Id_struktur IN ($placeholders)");
        $email_query->bind_param(str_repeat('i', count($emails)), ...$emails);
        $email_query->execute();
        $result = $email_query->get_result();

        while ($row = $result->fetch_assoc()) {
            if (filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                $email_list[] = $row['email'];
            }
        }
        $email_query->close();
    }

    // Kirim email menggunakan PHPMailer
    if (!empty($email_list)) {
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '..'; // Email Anda
            $mail->Password = '..'; // App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Pengaturan penerima dan pengirim
            $mail->setFrom('youremailhere', 'SENAT POLIBATAM');
            foreach ($email_list as $email) {
                $mail->addAddress($email);
            }

            // Konten email
            $mail->isHTML(true);
            $mail->Subject = 'Notifikasi Jadwal Baru';
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f9;
                            color: #333;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background: #fff;
                            border-radius: 8px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            background-color: #4CAF50;
                            color: white;
                            text-align: center;
                            padding: 10px;
                            border-radius: 8px 8px 0 0;
                        }
                        .content {
                            margin: 20px;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 20px;
                            font-size: 12px;
                            color: #777;
                        }
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        .table th, .table td {
                            padding: 10px;
                            border: 1px solid #ddd;
                            text-align: left;
                        }
                        .table th {
                            background: #f9f9f9;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h2>Notifikasi Jadwal Baru</h2>
                        </div>
                        <div class='content'>
                            <p>Halo,</p>
                            <p>Berikut adalah jadwal rapat terbaru:</p>
                            <table class='table'>
                                <tr>
                                    <th>Judul</th>
                                    <td>$judul</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>$deskripsi</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>$tanggal</td>
                                </tr>
                                <tr>
                                    <th>Jam</th>
                                    <td>$jam</td>
                                </tr>
                            </table>
                            <p>Terima kasih atas perhatian Anda.</p>
                        </div>
                        <div class='footer'>
                            <p>SENAT POLIBATAM</p>
                        </div>
                    </div>
                </body>
                </html>
            ";

            // Kirim email
            $mail->send();
            header('Location: jadwal-rapat.php?status=add-success');
            exit();
        } catch (Exception $e) {
            // Tangani kesalahan email
            header('Location: jadwal-rapat.php?status=email_error&message=' . urlencode($e->getMessage()));
            exit();
        }
    } else {
        header('Location: jadwal-rapat.php?status=add-failed');
        exit();
    }
} else {
    header('Location: jadwal-rapat.php?status=error&message=' . urlencode($conn->error));
    exit();
}

// Tutup koneksi database
$conn->close();
?>
