<?php
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$sql = "SELECT nama,email FROM struktur WHERE jabatan LIKE '%SEKRETARIS%'";

$query = mysqli_query($conn,$sql);

while($row = $query->fetch_assoc()){
    $email = $row['email'];
    $pass = "SELECT password FROM login WHERE email = '$email'";
    $password = '';
    foreach ($conn->query($pass) as $index) {
        $password = $index['password'];
    }
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
        // $mail->addAddress($row['email']);
        $mail->addAddress($email);

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'Notifikasi Lupa Password';
        $mail->Body = '
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
                <div class="container">
                    <div class="header">
                        <h2>Notifikasi Lupa Password</h2>
                    </div>
                    <div class="content">
                        <p>Halo,</p>
                        <p>Berikut adalah Email dan password: </p>
                        <table class="table">
                            <tr>
                                <th>Email</th>
                                <td>'.$email.'</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>'.$password.'</td>
                            </tr>
                        </table>
                        <p>Terima kasih atas perhatian Anda.</p>
                    </div>
                    <div class="footer">
                        <p>SENAT POLIBATAM</p>
                    </div>
                </div>
            </body>
            </html>
        ';

        // Kirim email
        $mail->send();
        header('Location: ../login.php?status=email-sent');
?>
    <!-- <script>
        alert("Password telah di kirimkan. Silahkan Cek Email Anda");
        window.location.href= '../login.php';
    </script> -->
<?php
        exit();
    } catch (Exception $e) {
        // Tangani kesalahan email
        header('Location: ../login.php?status=email_error&message=' . urlencode($e->getMessage()));
        echo "<script>alert('Email tidak ditemukan')</script>";
        exit();
    }
}

?>
