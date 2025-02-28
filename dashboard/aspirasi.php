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
                    <div class="sb-sidenav-menu-heading text-uppercase">Tampilan</div>
                    <!-- Dashboard Link -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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

<!-- Ensure Bootstrap JS is included after the CSS -->
<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional: Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

   

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
<div id="layoutSidenav_content">
    <main>
    <?php
    // Koneksi database
    $conn = new mysqli("localhost", "Admin", "admin123", "senat_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menghitung jumlah aspirasi berdasarkan kategori
    $sql = "SELECT kategori, COUNT(*) as count FROM aspirasi GROUP BY kategori";
    $result = $conn->query($sql);

    // Array untuk menyimpan kategori dan jumlah
    $categories = [];
    $counts = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['kategori'];
            $counts[] = $row['count'];
        }
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aspirasi Pie Chart</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f4f4f9;
                margin: 0;
                padding: 0;
            }
            .container {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 50px;
                margin: 50px auto;
                max-width: 1200px;
            }
            #pieChart {
                width: 400px !important;
                height: 400px !important;
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }
            .form-container {
                width: 100%;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                background-color: #fff;
                display: none;
                transition: all 0.3s ease-in-out;
            }
            .form-container h4 {
                margin-bottom: 20px;
                font-weight: bold;
                font-size: 1.2rem;
                color: #333;
            }
            .aspirasi-item {
                padding: 15px;
                margin-bottom: 10px;
                border-radius: 6px;
                border: 1px solid #ddd;
                box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                background-color: #f9f9f9;
                transition: background-color 0.3s ease;
            }
            .aspirasi-item:hover {
                background-color: #e9f7ff;
            }
            .aspirasi-item strong {
                color: #2c3e50;
                font-size: 1.1rem;
            }
            .aspirasi-item p {
                color: #555;
            }
            .aspirasi-item .aspirasi-content {
                font-size: 0.9rem;
                margin-top: 8px;
                color: #666;
            }
            .aspirasi-item .date {
                font-size: 0.8rem;
                color: #aaa;
            }
            .aspirasi-item .category-label {
                font-size: 0.8rem;
                font-weight: bold;
                color: #007BFF;
            }
            .loading {
                text-align: center;
                padding: 20px;
                font-size: 1.2rem;
                color: #007BFF;
            }
            .no-data {
                text-align: center;
                font-size: 1.2rem;
                color: #e74c3c;
            }
            /* Styling for Tables */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #007BFF;
                color: white;
            }
            tr:hover {
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <!-- Pie Chart -->
            <div>
                <h3 class="text-center">Grafik Distribusi Aspirasi Berdasarkan Kategori</h3>
                <canvas id="pieChart"></canvas>
            </div>

            <!-- Daftar Aspirasi Berdasarkan Kategori -->
            <div class="form-container" id="formContainer">
                <h4 id="formTitle">Pilih Kategori untuk Melihat Aspirasi</h4>
                <div id="aspirasiList" class="loading">
                    <!-- Daftar aspirasi akan ditampilkan di sini -->
                    Loading...
                </div>
            </div>
        </div>
   

        <script>
            // Ambil data PHP ke JavaScript
            var categories = <?php echo json_encode($categories); ?>;
            var counts = <?php echo json_encode($counts); ?>;

            // Konfigurasi pie chart
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',  // Jenis grafik pie
                data: {
                    labels: categories,  // Kategori aspirasi
                    datasets: [{
                        data: counts,  // Jumlah aspirasi untuk setiap kategori
                        backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#FFD700', '#80ced6'],  // Warna untuk tiap kategori
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' Aspirasi';
                                }
                            }
                        }
                    },
                    onClick: function(event, chartElement) {
                        if (chartElement.length) {
                            var selectedCategory = chartElement[0].index;
                            showAspirasiList(categories[selectedCategory]);
                        }
                    }
                }
            });

          

            function applyDateFilter() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    // Pastikan ada kategori yang dipilih
    const category = document.getElementById('formTitle').innerText.replace('Aspirasi untuk Kategori: ', '');

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_aspirasi.php?kategori=" + encodeURIComponent(category) + "&startDate=" + startDate + "&endDate=" + endDate, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const aspirasiData = JSON.parse(xhr.responseText);
            displayAspirasi(aspirasiData);
        }
    };
    xhr.send();
}

function showAspirasiList(category) {
    const formContainer = document.getElementById('formContainer');
    formContainer.style.display = 'block';

    const formTitle = document.getElementById('formTitle');
    formTitle.innerText = 'Aspirasi untuk Kategori: ' + category;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_aspirasi.php?kategori=" + encodeURIComponent(category), true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const aspirasiData = JSON.parse(xhr.responseText);
            displayAspirasi(aspirasiData);
        }
    };
    xhr.send();
}

function displayAspirasi(aspirasiData) {
    const aspirasiList = document.getElementById('aspirasiList');
    aspirasiList.innerHTML = ''; // Reset the list

    if (aspirasiData.error) {
        aspirasiList.innerHTML = '<div class="no-data">Tidak ada aspirasi untuk kategori ini.</div>';
    } else {
        let tableHTML = `
            <table class="aspirasi-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Aspirasi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
        `;
        aspirasiData.forEach(function (item) {
            const maxLength = 50; // Maksimal karakter sebelum "Read More"
            const isLongText = item.aspirasi.length > maxLength;
            const shortText = item.aspirasi.slice(0, maxLength);

            tableHTML += `
                <tr class="row-hover">
                    <td><strong>${item.judul}</strong></td>
                    <td>
                        <div class="aspirasi-text">
                            ${
                                isLongText
                                    ? ` 
                                    <span class="short-text">${shortText}...</span>
                                    <span class="full-text hidden">${item.aspirasi}</span>
                                    <a href="#" class="read-more" onclick="toggleReadMore(this); return false;">Read More</a>
                                    `
                                    : `<span>${item.aspirasi}</span>`
                            }
                        </div>
                    </td>
                    <td>${new Date(item.tanggal).toLocaleDateString()}</td>  <!-- Tanggal sesuai data yang diterima -->
                </tr>
            `;
        });
        tableHTML += `</tbody></table>`;
        aspirasiList.innerHTML = tableHTML;
    }
}

           


function toggleReadMore(link) {
    const shortText = link.previousElementSibling.previousElementSibling;
    const fullText = link.previousElementSibling;

    if (fullText.classList.contains('hidden')) {
        fullText.classList.remove('hidden');
        shortText.classList.add('hidden');
        link.innerText = 'Read Less';
    } else {
        fullText.classList.add('hidden');
        shortText.classList.remove('hidden');
        link.innerText = 'Read More';
    }
}

</script>
<div class="filter-tanggal">
    <label for="startDate">Mulai:</label>
    <input type="date" id="startDate" name="startDate">
    
    <label for="endDate">Sampai:</label>
    <input type="date" id="endDate" name="endDate">
    
    <button onclick="applyDateFilter()">Filter</button>
</div>
<style>

/* Styling untuk filter tanggal */
.filter-tanggal {
    margin-bottom: 20px;
    font-size: 16px;
    text-align: right; /* Keep text aligned to the right */
    margin-left: auto;  /* Align the filter to the center */
    margin-right: auto; /* Align the filter to the center */
    width: 50%; /* Make the filter section narrower to align it better */
}

.filter-tanggal input[type="date"] {
    padding: 5px;
    font-size: 14px;
    margin-right: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.filter-tanggal button {
    padding: 6px 12px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.filter-tanggal button:hover {
    background-color: #0056b3;
}

/* Gaya tabel */
.aspirasi-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
    table-layout: fixed; /* Pastikan kolom tabel tidak melebar */
}

.aspirasi-table th,
.aspirasi-table td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    vertical-align: top; /* Teks tetap di bagian atas */
    word-wrap: break-word; /* Menghindari teks keluar dari tabel */
}

/* Gaya teks panjang */
.aspirasi-text {
    display: block; /* Memastikan kontainer teks berada dalam satu kolom */
}

.short-text,
.full-text {
    font-size: 14px;
    color: #555;
    line-height: 1.5; /* Jarak antar baris */
}

.hidden {
    display: none; /* Menyembunyikan teks penuh */
}

/* Gaya untuk tautan "Read More" */
.read-more {
    color: #007BFF;
    font-size: 12px;
    text-decoration: none;
    margin-top: 5px;
    display: inline-block;
}

.read-more:hover {
    text-decoration: underline;
}

/* Gaya baris tabel saat hover */
.row-hover:hover {
    background-color: #e3f2fd;
    cursor: pointer;
}

/* Gaya untuk tidak ada data */
.no-data {
    font-size: 16px;
    color: #555;
    text-align: center;
    margin-top: 20px;
}

</style>
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
                <a href="logout.php" class="btn btn-danger px-4 py-2">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</body>
</html>
</main>
</div>

<?php
} else{
    // mengarahkan user ke halaman awal jika belum login
    header("Location: ../login.php");
    exit();
}
?>