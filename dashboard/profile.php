<?php
include "db.php";
session_start();

// Pastikan ID Senat tersedia
if (!isset($_SESSION['id_senat'])) {
    die(header("Location: ../login.php"));
}
$id_senat = $_SESSION['id_senat'];

// Ambil data dari database
$query = "SELECT  email, foto, password FROM login WHERE id_senat = ?";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    die("Kesalahan query: " . $conn->error);
}
$stmt->bind_param("i", $id_senat);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Validasi hasil query
if (!$user) {
    die("Data tidak ditemukan untuk ID Senat: $id_senat");
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $email = $_POST['email'];
   
    $password = $_POST['password'];

    // Proses unggah file foto jika ada
    $foto = $user['foto']; // Gunakan foto lama jika tidak diunggah yang baru
    if (!empty($_FILES['foto']['name'])) {
        $fotoDir = "../uploads/";
        $fotoPath = $fotoDir . basename($_FILES['foto']['name']);
        $fotoType = strtolower(pathinfo($fotoPath, PATHINFO_EXTENSION));

        // Validasi jenis file
        if (in_array($fotoType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
                $foto = $fotoPath; // Set path baru jika upload berhasil
            } else {
                echo "<script>alert('Gagal mengunggah foto.');</script>";
            }
        } else {
            echo "<script>alert('Jenis file foto tidak valid. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.');</script>";
        }
    }

    // Query update
    $updateQuery = "UPDATE login SET  email = ?,  foto = ?, password = ? WHERE id_senat = ?";
    $updateStmt = $conn->prepare($updateQuery);
    if ($updateStmt === false) {
        die("Kesalahan query update: " . $conn->error);
    }
    $updateStmt->bind_param("sssi",  $email,  $foto, $password, $id_senat);

    if ($updateStmt->execute()) {
        echo "<script>window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui profile!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SENAT POLIBATAM</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">
        <img src="logo_polibatam.png" width="60" class="logo">
        SENAT POLIBATAM
    </a>

     <!-- Navbar Right Section (Sidebar Toggle and Search) -->
<div class="ms-auto d-flex align-items-center">
    <!-- Sidebar Toggle Button -->
    <button class="btn btn-link btn-sm me-3" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    
</div>

<!-- User Dropdown-->
<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <!-- Home Navigation Item -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i> 
        </a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user fa-fw"></i>
        <span class="user-name">Admin</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="profile.php">Profil</a></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>

    </ul>
</li>
<!-- Tombol pemanggil modal -->






</nav>


    <!-- Add custom CSS below -->
    <style>
        /* Logo Styling */
        .navbar-brand .logo {
            border-radius: 50%; /* Circular logo */
            transition: transform 0.3s ease;
        }
        .navbar-brand .logo:hover {
            transform: scale(1.1); /* Enlarge logo on hover */
        }

        /* Navbar Styling */
        .navbar {
            padding: 0.8rem 1.5rem;
            background-color: #007BFF; /* Custom Blue */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Navbar Search Button */
        .navbar .form-control {
            width: 250px;
            border-radius: 25px;
            padding-left: 20px;
            transition: width 0.3s ease-in-out;
        }

        .navbar .form-control:focus {
            width: 300px;
            border-color: #5BC0DE; /* Light blue focus border */
        }

        .navbar .btn-primary {
            background-color: #5BC0DE; /* Lighter blue for button */
            border-radius: 50%;
        }

        .navbar .btn-primary:hover {
            background-color: #4AB0CC;
        }

        /* Dropdown Styling */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease-in-out;
        }

        .nav-link {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #ffdf00; /* Golden hover effect */
        }

        .dropdown-menu {
            border-radius: 5px;
            background-color: #333;
            padding: 10px;
        }

        .dropdown-item {
            color: #ddd;
            font-weight: 500;
        }

        .dropdown-item:hover {
            color: #fff;
            background-color: #555;
        }

        /* Active User Section */
        .user-name {
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
        }

        .nav-item.dropdown a {
            padding: 10px 15px;
        }
        .nav-item .nav-link {
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
}

.nav-item .nav-link:hover {
    color: #ffdf00; /* Golden hover effect */
}


    </style>
</body>

        <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Section Heading -->
                    <div class="sb-sidenav-menu-heading text-uppercase">tampilan</div>
                    <!-- Dashboard Link -->
                    <a class="nav-link collapsed nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        MENU
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <!-- Collapsible Menu -->
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <!-- News Link -->
                            <a class="nav-link" href="berita.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                BERITA
                            </a>    
                            <!-- Rules Product Link -->
                            <a class="nav-link" href="produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-gavel"></i></div>
                                PRODUK PERATURAN
                            </a>    
                            <!-- Program Link -->
                            <a class="nav-link" href="program.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                PROGRAM KERJA 
                            </a>    
                            <!-- Structure Link -->
                            <a class="nav-link" href="struktur.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                STRUKTUR
                            </a>    
                            <!-- Schedule Link -->
                            <a class="nav-link" href="jadwal-rapat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                                JADWAL RAPAT
                            </a>    
                            <!-- Aspirations Link -->
                            <a class="nav-link" href="aspirasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                                ASPIRASI
                            </a>    
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<style>
    /* Sidebar background and styling */
    .sb-sidenav-dark {
        background-color: #2C3E50;
        color: #ECF0F1;
    }
    .sb-sidenav {
    width: 200px; /* Adjust this value to your desired sidebar width */
    }
    #layoutSidenav_content {
    padding-left: 250px; /* Adjust this value based on your sidebar width */
    }

    /* Section Heading */
    .sb-sidenav-menu-heading {
        font-size: 1.1rem;
        font-weight: bold;
        padding: 10px 15px;
        background-color: #34495E;
        color: #BDC3C7;
    }

    /* Link Styling */
    .nav-link {
        padding: 12px 20px;
        font-size: 1rem;
        font-weight: 500;
        color: #BDC3C7;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        background-color: #1ABC9C;
        color: white;
        border-radius: 5px;
        transform: translateX(5px);
    }

    /* Active state styling */
    .nav-link.active {
        background-color: #16A085;
        color: white;
        border-radius: 5px;
    }

    /* Icons */
    .sb-nav-link-icon {
        margin-right: 10px;
        color: #BDC3C7;
    }

    .nav-link .sb-nav-link-icon {
        font-size: 1.2rem;
    }

    .sb-sidenav-collapse-arrow {
        color: #BDC3C7;
        font-size: 1.2rem;
    }

    /* Collapse effect for submenus */
    .sb-sidenav-menu-nested .nav-link:hover {
        background-color: #16A085;
        color: white;
    }

    /* Accordion collapsible animation */
    .collapse {
        transition: all 0.3s ease-in-out;
    }

    /* Active link color */
    .nav-link.active {
        background-color: #1ABC9C !important;
        color: white;
    }

    /* Adding spacing and responsiveness */
    @media (max-width: 768px) {
        .sb-sidenav-menu {
            padding-top: 10px;
        }
    }
    /* Ensure content is not hidden under the navbar */
     #layoutSidenav_content {
    padding-top: 70px; /* Adjust based on your navbar height */
     }

    /* Sidebar adjustments */
     #layoutSidenav_nav {
    height: 100%;
     }   

    /* Adjust the navbar height if needed */
    .sb-topnav {
    height: 70px; /* Adjust this value according to your design */
    position: fixed;
    width: 100%;
    z-index: 1000; /* Ensure it stays above other content */
     }

    /* Body to adjust layout */
    body {
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    height: 100vh;
      }

</style>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ccc;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 5px rgba(111, 66, 193, 0.5);
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            background-color: #6f42c1;
            color: #fff;
            border: none;
        }

        .btn-primary {
            background-color: #6f42c1;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #552f9a;
            transform: scale(1.05);
        }

        .btn-outline-secondary {
            border-radius: 0 10px 10px 0;
            border: none;
            background-color: #f1f1f1;
            color: #6f42c1;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #e0d4f7;
            color: #552f9a;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <form method="POST" enctype="multipart/form-data" class="form-container">
        <h2>Edit Profil</h2>

      
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
        </div>
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <!-- Komisi -->
  
        <!-- No Kontak -->
       

        <!-- Foto -->
        <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <div class="mb-2 text-center">
        <img id="fotoPreview" src="<?= htmlspecialchars($user['foto'] ?? 'default-photo.jpg') ?>" alt="Foto Profil" class="img-thumbnail" style="max-width: 150px;">
    </div>
    <div class="input-group">
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
    </div>
</div>
<style>
    .text-center {
    text-align: center;
}

</style>

        

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('fotoPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    });
</script>


<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3" style="background-color: #f8f9fa;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-dark" id="logoutModalLabel">
                    <i class="fa-solid fa-door-open text-warning" style="font-size: 1.5rem;"></i> Konfirmasi Keluar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="fs-5 text-dark">Apakah Anda yakin ingin keluar?</p>
                <p class="text-muted">Semua sesi Anda akan diakhiri, pastikan Anda sudah menyimpan perubahan.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary px-4 py-2" data-bs-dismiss="modal">Batal</button>
                <a href="../index.php" class="btn btn-danger px-4 py-2">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
       
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <footer class="py-4 bg-light mt-auto">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



