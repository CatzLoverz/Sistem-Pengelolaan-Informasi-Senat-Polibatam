<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>LOGIN</title>
    <style>
        body {
            background: url('uploads/imghero.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.5); /* Semi-transparent white */
            z-index: 1;
        }
        .form-login {
            max-width: 400px;
            width: 100%;
            margin: 10px auto; /* Add margin to the top and bottom */
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 2; /* Ensure form is above the overlay */
        }
        .header-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .header-container h2 {
            flex-grow: 1;
            text-align: center;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .input {
            margin-bottom: 15px;
        }
        .input label {
            margin-bottom: 5px;
        }
        .input input {
            width: 100%;
        }
        @media (max-width: 576px) {
            .form-login {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <!-- FORM -->
    <form action="auth.php" method="post" class="form-login form-control">
        <div class="container-sm">
            <div class="header-container mb-3">
                <h2 class="fw-bold">Masuk</h2>
            </div>
            <img src="uploads/1734248588_logo_polibatam.png" alt="polibatam" class="d-block mx-auto mb-3">
            <!-- Pesan error ketika senat tidak mengisi salah satu -->
            <?php
                # if(isset($_GET['error'])){?>
                <!-- <p class="error"><?php #echo $_GET['error']?></p> -->
                <?php
            ?>
    
            <div class="form">
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Email" id="email" class="mb-3 form-control" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" id="password" class="mb-3 form-control" required>
                </div>
                <a href="dashboard/lupa.php" class="mb-3">Lupa password?</a>
                
                <button type="submit" class="btn btn-primary btn-md">LOGIN</button>
                <a href="index.php" class="btn btn-secondary btn-sm mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </form>

    <?php
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    ?>   

    <!-- Modal for Faied Notification (Edit) -->
    <?php if ($status === 'login-failed'): ?>
    <div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="successModalLabel">Kesalahan!</h5>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-danger">Login Gagal</h4>
                    <p>Periksa kembali email dan kata sandi Anda.</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-danger">OK</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Modal for Success Notification (Lupa password) -->
    <?php if ($status === 'email-sent'): ?>
    <div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel"></h5>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-success">Email Terkirim</h4>
                    <p>Email berisi informasi login Anda telah dikirim ke alamat email yang terdaftar.</p>
                </div>
                <div class="modal-footer">
                    <a href="login.php" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>