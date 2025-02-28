<?php
include "db.php";
?>

<?php

session_start();

# cek sesi yang sedang berjalan
if (isset($_SESSION['id_senat']) && isset($_SESSION['email'])){

require('db.php');
$sesi = $_SESSION['id_senat'];

#query data dari sesi yang sedang berjalan
$senat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM login WHERE id_senat='$sesi'"));

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
    <a class="navbar-brand ps-3" href="#">
        <img src="logo_polibatam.png" width="60" class="logo">
        SENAT POLIBATAM
    </a>

    <!-- Navbar Right Section (Sidebar Toggle and Search) -->
    <div class="ms-auto d-flex align-items-center">
        <!-- Sidebar Toggle Button -->
        <button class="btn btn-link btn-sm me-3" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <!-- Home Navigation Item -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i> 
        </a>
    </li>
    <!-- User Dropdown-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
                <span class="user-name">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php">Profil</a></li>
               
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
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
                    <a class="nav-link collapsed nav-link" href="index.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const body = document.body;

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function () {
                body.classList.toggle('sb-sidenav-toggled');
            });
        }
    });
</script>


        <!-- Dashboard Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dasbor</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Ringkasan</li>
                    </ol>
                    <?php
// Koneksi ke database
include 'db.php';

// Query untuk menghitung jumlah rapat
$query = "SELECT COUNT(id_rapat) AS total_rapat FROM `jadwal`";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total_rapat = $data['total_rapat'];

$query = "SELECT COUNT(id) AS total_berita FROM berita";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total_berita = $data['total_berita'];

$query = "SELECT COUNT(id) AS total_aspirasi FROM aspirasi";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
$total_aspirasi = $data['total_aspirasi'];


// Query untuk menghitung jumlah struktur
$query = "SELECT COUNT(id_struktur) AS total_struktur FROM struktur";
$result = mysqli_query($conn, $query);
// Memeriksa apakah query berhasil
if ($result) {
    $data = mysqli_fetch_assoc($result);
    $total_struktur = $data['total_struktur'];
} else {
    $total_struktur = 0; // Jika query gagal
}
?>







                   <!-- Row for Statistics with Animations -->
<div class="row">
    <!-- Card for Berita Masuk -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4 statistic-card">
            <div class="card-body">
                <i class="fas fa-newspaper fa-3x mb-3"></i>
                <div>Berita masuk: <?php echo $total_berita; ?></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-dark">
                <a class="small text-white stretched-link" href="berita.php">Lihat Selengkapnya</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <!-- Card for Rapat Terjadwal -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 statistic-card">
            <div class="card-body">
                <i class="fas fa-calendar-alt fa-3x mb-3"></i>
                <div>Rapat Terjadwal: <?php echo $total_rapat; ?></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-dark">
                <a class="small text-white stretched-link" href="jadwal-rapat.php">Lihat Selengkapnya</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <!-- Card for Aspirasi Masuk -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4 statistic-card">
            <div class="card-body">
                <i class="fas fa-inbox fa-3x mb-3"></i>
                <div>Aspirasi Masuk: <?php echo $total_aspirasi;?></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-dark">
                <a class="small text-white stretched-link" href="aspirasi.php">Lihat Selengkapnya</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <!-- Card for Anggota Aktif -->
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4 statistic-card">
            <div class="card-body">
                <i class="fas fa-users fa-3x mb-3"></i>
                <div>Anggota Aktif: <?php echo $total_struktur; ?></div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between bg-dark">
                <a class="small text-white stretched-link" href="struktur.php">Lihat Selengkapnya</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply fade-in animation to the cards */
    .statistic-card {
        animation: fadeIn 1s ease-out;
    }

    /* Hover Effects for Cards */
    .statistic-card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    /* Hover Effects for Card Footer */
    .statistic-card .card-footer:hover {
        background-color: #444;
        transform: translateX(5px);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Shadow Effect on Cards */
    .statistic-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .statistic-card:hover {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    /* Font Style for Card Body Text */
    .statistic-card .card-body {
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Add smooth transitions for text color changes */
    .statistic-card .card-footer .small {
        color: #f1f1f1;
        transition: color 0.3s ease;
    }

    .statistic-card .card-footer:hover .small {
        color: #00bfff;
    }
</style>


                    <!-- Charts Section -->
<div class="row fade-in">
    <!-- Statistika Rapat Card -->
    <div class="col-lg-6">
        <div class="card mb-4 animate-card">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i> Statistik Rapat
            </div>
            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Aspirasi Berdasarkan Kategori Card -->
    <div class="col-lg-6">
        <div class="card mb-4 animate-card">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i> Aspirasi Berdasarkan Kategori
            </div>
            <div class="card-body">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animasi Fade-In untuk Row */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Apply fade-in animation to the charts section */
    .fade-in {
        animation: fadeIn 1.5s ease-out;
    }

    /* Animasi untuk Kartu */
    @keyframes scaleUp {
        0% {
            transform: scale(0.9);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Apply scale-up animation to individual cards */
    .animate-card {
        animation: scaleUp 0.8s ease-out;
    }

    /* Card Header Styling */
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    /* Add Hover Effect to Card */
    .card:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>

    <?php
include "db.php"; // Include the database connection

// Fetching the data for the bar chart (e.g., count of meetings per month or category)
$labels = [];
$data = [];

// Query untuk mengambil data berdasarkan tahun
$sql = "SELECT Tanggal AS year, COUNT(*) AS meeting_count 
        FROM `jadwal` 
        GROUP BY Tanggal 
        ORDER BY Tanggal;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Gunakan nilai tahun langsung sebagai label
        $labels[] = $row['year']; // Misalnya: "2024", "2023"
        $data[] = $row['meeting_count']; // Jumlah rapat
    }
} else {
    echo "No data found for meetings.";
}

$conn->close();
?>
<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = <?php echo json_encode($labels); ?>; // ["2024", "2023", ...]
const data = <?php echo json_encode($data); ?>; // [10, 15, ...]

const barChart = new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels, // Langsung gunakan tahun sebagai label
        datasets: [{
            label: 'Jumlah Rapat per Tahun',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



    <?php
// Koneksi database
$conn = new mysqli("localhost", "root", "", "senat_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching the count of each category
$categories = ['Pendidikan', 'Fasilitas Belajar', 'Keamanan', 'Parkir Kendaraan', 'Kebersihan'];
$categoryCounts = [];

foreach ($categories as $category) {
    $sql = "SELECT COUNT(*) AS count FROM aspirasi WHERE kategori = '$category'";
    $result = $conn->query($sql);
    
    if ($result) {
        $row = $result->fetch_assoc();
        $categoryCounts[$category] = $row['count'];
    } else {
        $categoryCounts[$category] = 0; // Default to 0 if no records are found
    }
}

$conn->close();
?>

<!-- HTML part to display the pie chart -->
<div style="width: 30%; margin: auto;">
    <canvas id="pieChart"></canvas>
</div>

<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for Pie Chart based on categories
    const categoryData = <?php echo json_encode(array_values($categoryCounts)); ?>;
    const categoryLabels = <?php echo json_encode(array_keys($categoryCounts)); ?>;

    // Creating the Pie Chart
    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: categoryLabels,
            datasets: [{
                data: categoryData,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#FF7F50']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
  
</body>
</html>

<?php
} else{
    // mengarahkan user ke halaman awal jika belum login
    header("Location: ../login.php");
    exit();
}
?>