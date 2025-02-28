<?php
// memulai sesi
session_start();

// hubungkan login.php dengan database
require('dashboard/db.php');


if (isset($_POST['email']) && isset($_POST['password']) ){

    # Mengambil inputan user
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    # cek apakah salah satu form kosong
    if(empty($email)){
        header("Location: login.php?error=login-failed");
        exit();
    } else if(empty($password)) {
        header("Location: login.php?error=login-failed");
        exit();
    } else {
        $escape = mysqli_real_escape_string($conn,$email);

        $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";

        # query ke database
        $result = mysqli_query($conn,$sql);

        # jika ada data yang di return dari database
        if(mysqli_num_rows($result) === 1){
            $data = mysqli_fetch_assoc($result);
            # cek email dan password antara input dengan database
            if ($data['email'] === $email && $data['password'] === $password){
                # Simpan data ke sesi
                $_SESSION['email'] = $data['email'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['id_senat'] = $data['id_senat'];
                header("Location: dashboard/index.php");
                exit();
            }
        } else{
            # pesan error jika email atau password salah
            header("Location:login.php?status=login-failed");
            exit();
        }
    };


} else{
    header("Location: login.php");
    exit();
}