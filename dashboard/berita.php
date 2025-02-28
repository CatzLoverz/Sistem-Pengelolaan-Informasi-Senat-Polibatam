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
                    
<?php
// Query untuk mengambil data penulis dari tabel struktur
$sqlPenulis = "SELECT Id_struktur, nama FROM struktur";
$resultPenulis = $conn->query($sqlPenulis);
?>                  
<div id="layoutSidenav_content">
    <main>
        <div class="container my-5">
            <div class="row text-center mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-calendar-alt"></i>
                        <b>BERITA</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Penulis</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin ingin menghapus data ini?");
                                        }

                                        function formatText(text) {
    const maxLength = 100; // Batas panjang per baris
    let formattedText = '';
    let i = 0;

    while (i < text.length) {
        formattedText += text.substring(i, i + maxLength) + '\n'; // Potong teks setiap 100 karakter
        i += maxLength;
    }
    return formattedText;
}

function toggleReadMore(id) {
    const fullDesc = document.getElementById('full-' + id);
    const readMoreBtn = document.getElementById('read-more-' + id);
    const shortDesc = document.getElementById('short-' + id);

    if (fullDesc && readMoreBtn && shortDesc) {
        const fullText = document.getElementById('full-text-' + id);
        if (fullDesc.style.display === 'none') {
            // Tampilkan deskripsi lengkap tanpa mengubah gaya
            fullDesc.style.display = 'block';
            readMoreBtn.textContent = 'Read Less';
            shortDesc.style.display = 'none';  // Sembunyikan deskripsi singkat
            
            // Membagi teks menjadi 100 karakter per baris
            const wrappedText = wrapTextInLines(fullText.textContent, 70);
            fullText.innerHTML = wrappedText;
        } else {
            // Sembunyikan deskripsi lengkap dan ubah tombol menjadi 'Read More'
            fullDesc.style.display = 'none';
            readMoreBtn.textContent = 'Read More';
            shortDesc.style.display = 'block';  // Tampilkan deskripsi singkat
        }
    } else {
        console.error("Elemen dengan ID yang diberikan tidak ditemukan.");
    }
}

// Fungsi untuk membungkus teks menjadi 100 karakter per baris
function wrapTextInLines(text, maxLength) {
    const lines = [];
    let currentLine = '';

    // Memecah teks berdasarkan panjang maksimal per baris
    for (let i = 0; i < text.length; i++) {
        currentLine += text[i];

        if (currentLine.length >= maxLength) {
            lines.push(currentLine);
            currentLine = '';
        }
    }

    // Menambahkan baris terakhir yang tersisa
    if (currentLine.length > 0) {
        lines.push(currentLine);
    }

    // Gabungkan semua baris dengan <br> untuk memisahkan baris
    return lines.join('<br>');
}




                                    </script>

<?php
// Query untuk mengambil data berita dan penulis dari tabel struktur
$sql = "SELECT berita.*, struktur.nama AS penulis_nama FROM berita LEFT JOIN struktur ON berita.penulis = struktur.Id_struktur";
$result = $conn->query($sql);
$no = 1;

// Periksa apakah ada data
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $short_desc = substr($row['deskripsi'], 0, 50); // Deskripsi singkat (50 karakter pertama)
        $full_desc = $row['deskripsi']; // Deskripsi lengkap

        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";

        // Cek panjang deskripsi, jika lebih dari 50 karakter, tampilkan tombol Read More
        if (strlen($full_desc) > 50) {
            echo "<td id='description-row-" . $row['id'] . "'>
                    <div id='short-" . $row['id'] . "' class='short-desc'>" . nl2br(htmlspecialchars($short_desc)) . "...</div>
                    <div id='full-" . $row['id'] . "' class='full-desc' style='display:none;'>
                        <span id='full-text-" . $row['id'] . "'>" . nl2br(htmlspecialchars($full_desc)) . "</span>
                    </div>
                    <button id='read-more-" . $row['id'] . "' onclick='toggleReadMore(" . $row['id'] . ")' class='btn btn-link'>Read More</button>
                </td>";
        } else {
            // Jika deskripsi kurang dari atau sama dengan 50 karakter, tampilkan langsung
            echo "<td>" . nl2br(htmlspecialchars($full_desc)) . "</td>";
        }

        echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
        // Menampilkan nama penulis dari tabel struktur
        echo "<td>" . htmlspecialchars($row['penulis_nama']) . "</td>";
        echo "<td>
                <img src='../uploads/" . htmlspecialchars($row['foto']) . "' alt='Foto' style='max-width: 50px; max-height: 50px;' />
              </td>";
        echo "<td>
                <button 
                    type='button' 
                    class='btn btn-primary edit-button' 
                    data-id='" . $row['id'] . "' 
                    data-judul='" . htmlspecialchars($row['judul']) . "' 
                    data-deskripsi='" . htmlspecialchars($row['deskripsi']) . "' 
                    data-tanggal='" . htmlspecialchars($row['tanggal']) . "' 
                    data-penulis='" . htmlspecialchars($row['penulis_nama']) . "' 
                    data-foto='" . htmlspecialchars($row['foto']) . "' 
                    data-bs-toggle='modal' 
                    data-bs-target='#editModal'>
                    <i class='fa-solid fa-pen-to-square'></i> 
                </button>
                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' data-id='" . $row['id'] . "'>
                    <i class='fa-solid fa-trash-can'></i> 
                </button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
}

// Tambahkan tombol untuk tambah data
echo "<tr>";
echo "<td colspan='6' class='text-center'><strong>Tambah Data Baru</strong></td>";
echo "<td>
        <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addModal'>
            <i class='fa-solid fa-circle-plus'></i> TAMBAH DATA
        </button>
      </td>";
echo "</tr>";

$conn->close();
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>




<style>
/* Untuk menyembunyikan elemen yang memiliki kelas 'hidden' */

/* Menambahkan gaya untuk membatasi lebar dan memecah baris */
.full-desc pre {
    white-space: pre-wrap;   /* Menjaga format teks asli dan memecah kata ke baris berikutnya */
    word-wrap: break-word;   /* Memecah kata yang terlalu panjang */
    max-width: 100%;         /* Membatasi lebar kontainer */
    overflow-wrap: break-word; /* Memastikan teks panjang dipotong di baris baru */
}

.hidden {
    display: none;
}

/* Menampilkan deskripsi singkat secara default */
.short-desc {
    display: inline;
}

/* Menyembunyikan deskripsi lengkap pada awalnya */
.full-desc {
    display: none;
}
/* CSS untuk membatasi panjang teks setiap baris dalam deskripsi lengkap */
.full-desc {
    white-space: pre-wrap; /* Agar teks terputus dan pindah baris jika terlalu panjang */
    word-wrap: break-word; /* Agar kata-kata panjang bisa dipotong agar pas di dalam baris */
    max-width: 100%; /* Tidak melebihi lebar kolom */
}

/* Optional: Menambahkan margin untuk teks */
.full-desc {
    margin-top: 10px;
}


</style>





        </tbody>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel"><i class="fas fa-plus-circle"></i> Tambah Data Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambah_berita.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Judul Input -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control form-control-lg" id="judul" name="judul" placeholder="Masukkan judul program" required>
                    </div>
                    
                    <!-- Deskripsi Input -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control form-control-lg" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi program" required></textarea>
                        <div class="insert-tag mt-3 justify-content-start">
                                <button type="button" class="tag paragraf btn btn-primary">paragraf</button>
                        </div>
                    </div>
                    
                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control form-control-lg" id="tanggal" name="tanggal" required>
                    </div>
                    
                    <!-- Penulis Dropdown -->
                    <div class="mb-3">
                        <Label for="Penulis" class="form-label">Penulis</Label>
                        <select class="form-control form-control-lg" id="penulis" name="penulis" required>
                            <option value="">Pilih Penulis</option>
                            <?php
                            if ($resultPenulis->num_rows > 0) {
                                while ($row = $resultPenulis->fetch_assoc()) {
                                    $penulisId = htmlspecialchars($row['Id_struktur']);
                                    $penulisNama = htmlspecialchars($row['nama']);
                                    echo "<option value='$penulisId'>$penulisNama</option>";
                                }
                            } else {
                                echo "<option value=''>Tidak ada penulis</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <!-- Foto Input -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control form-control-lg" id="foto" name="foto" accept=".jpg,.jpeg,.png" required onchange="previewImage(event)">
                    </div>
                    <!-- Preview Gambar -->
                    <div class="mb-3 d-flex justify-content-center align-items-center" style="height: 220px; border: 1px dashed #ddd; border-radius: 10px;">
                        <img id="imagePreview" src="#" alt="Preview Gambar" style="display: none; max-height: 200px; border-radius: 10px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                    <!-- Success Button -->
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        
        // Jika ada file yang dipilih
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            // Load file sebagai URL Data dan set sebagai sumber gambar
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        } else {
            // Jika tidak ada file, sembunyikan gambar
            preview.style.display = 'none';
        }
    }
</script>

<!-- Additional CSS for Success Theme -->
<style>
    #imagePreview {
        max-width: 100%; /* Agar gambar menyesuaikan lebar area */
        max-height: 100%; /* Membatasi tinggi maksimal gambar */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    /* Modal Dialog */
    .modal-dialog {
        max-width: 600px;
        border-radius: 15px;
    }

    /* Modal Content */
    .modal-content {
        border-radius: 15px;
    }

    /* Input Field Styles */
    .form-control-lg {
        font-size: 1.1rem;
        padding: 12px;
    }

    /* Button Icon */
    .btn i {
        margin-right: 8px;
    }

    /* Input focus effect */
    .form-control:focus {
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Green focus */
        border-color: #28a745; /* Success green border */
    }

    /* Modal Header with Success Color */
    .modal-header {
        border-bottom: 2px solid #28a745; /* Green border for header */
    }

    /* Hover effect for Success Button */
    .btn-success:hover {
        background-color: #218838; /* Darker green for hover */
        border-color: #1e7e34;
    }
</style>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header" style="background-color: #4169E1; color: white;">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Ubah Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST" action="edit_berita.php" enctype="multipart/form-data">
                <div class="modal-body">
                <form id="editForm" method="POST" action="edit_berita.php" enctype="multipart/form-data">
                      <input type="hidden" id="editId" name="id"> <!-- Hidden field for ID -->
                       <input type="hidden" id="old_foto" name="old_foto"> <!-- Hidden field for old photo -->

                       <!-- Other form fields... -->
                    <!-- Judul Input -->
                     
                    <div class="mb-3">
                        <label for="editJudul" class="form-label">Judul</label>
                        <input type="text" class="form-control form-control-lg" id="editJudul" name="judul" placeholder="Masukkan judul program" required>
                    </div>

                    <!-- Deskripsi Input -->
                    <div class="mb-3">
                        <label for="editDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control form-control-lg" id="editDeskripsi" name="deskripsi" rows="4" placeholder="Masukkan deskripsi program" required></textarea>
                        <div class="insert-tag-edit mt-3 justify-content-start">
                            <button type="button" class="tag paragraf btn btn-primary">paragraf</button>
                        </div>
                    </div>

                    <!-- Tanggal Input -->
                    <div class="mb-3">
                        <label for="editTanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control form-control-lg" id="editTanggal" name="tanggal" required>
                    </div>

                  <!-- Foto Display and Upload -->
                    <div class="mb-3">
                        <label for="editFoto" class="form-label">Foto</label>

                        <!-- Display the existing image if available -->
                        <div id="existingFotoContainer" style="display: none;">
                            <img id="existingFoto" src="" alt="Current Foto" style="max-width: 100px; max-height: 100px; object-fit: cover; margin-bottom: 10px;">
                        </div>

                        <!-- File input to upload a new image -->
                        <input type="file" class="form-control form-control-lg" id="editFoto" name="foto" accept=".jpg,.jpeg,.png" required>
                    </div>
                  


                </div>
                <div class="modal-footer">
                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>

                    <!-- Save Button -->
                    <button type="submit" class="btn" style="background-color: #4169E1; color: white;"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<!-- Additional CSS for Custom Theme -->
<style>
    /* Modal Dialog */
    .modal-dialog {
        max-width: 600px;
        border-radius: 15px;
    }

    /* Modal Content */
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Input Field Styles */
    .form-control-lg {
        font-size: 1.1rem;
        padding: 12px;
    }

    /* Button Icon */
    .btn i {
        margin-right: 8px;
    }

    /* Input focus effect */
    .form-control:focus {
        box-shadow: 0 0 5px rgba(65, 105, 225, 0.5); /* Royal blue focus */
        border-color: #4169E1; /* Royal blue border */
    }

    /* Modal Header with Royal Blue */
    .modal-header {
        border-bottom: 2px solid #4169E1; /* Royal blue border for header */
    }

    /* Hover effect for Button */
    .btn:hover {
        background-color: #365c9f; /* Darker royal blue for hover */
        border-color: #365c9f;
    }
</style>
<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Dynamic Delete Link -->
                <a id="confirmDeleteLink" href="" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Optional: JavaScript to handle dynamic modal -->
<script>
    // Capture the 'Hapus Data' button click event to update the modal's delete link dynamically
    var deleteButtons = document.querySelectorAll('.btn-danger[data-bs-toggle="modal"]');
    
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id'); // Get the 'Id_struktur' from the button's data-id attribute
            var deleteLink = document.getElementById('confirmDeleteLink');
            deleteLink.href = 'hapus_berita.php?id=' + id; // Set the href of the delete link in the modal
        });
    });
</script>

<script>
const deskripsiText = document.querySelector("#deskripsi");
const editDeskripsi = document.querySelector("#editDeskripsi");
const [paragraf] = document.querySelectorAll(".insert-tag .tag");
const [paragrafEdit] = document.querySelectorAll(".insert-tag-edit .tag");



const insertText = (textarea, text) => {
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    textarea.setRangeText(text, start, end, 'select');
};

paragraf.addEventListener('click', () => {
    const paragrafTag = "<p></p>";
    const insertText = (textarea, text) => {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        textarea.setRangeText(text, start, end, 'select');
    };
    insertText(deskripsiText,paragrafTag);
})

paragrafEdit.addEventListener('click', () => {
    const paragrafTag = "<p></p>";
    const insertText = (textarea, text) => {
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        textarea.setRangeText(text, start, end, 'select');
    };
    insertText(editDeskripsi,paragrafTag);
})

</script>

<script>

// const editButtons = document.querySelectorAll('.edit-button');
// editButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         const id = button.getAttribute('data-id');
//         const judul = button.getAttribute('data-judul');
//         const deskripsi = button.getAttribute('data-deskripsi');
//         const tanggal = button.getAttribute('data-tanggal');
        
//         const foto = button.getAttribute('data-foto');

//         // Set the modal values
//         document.getElementById('editId').value = id;
//         document.getElementById('editJudul').value = judul;
//         document.getElementById('editDeskripsi').value = deskripsi;
//         document.getElementById('editTanggal').value = tanggal;
      

//         // Handle existing photo
//         document.getElementById('old_foto').value = foto;
//         const fotoContainer = document.getElementById('existingFotoContainer');
//         const fotoElement = document.getElementById('existingFoto');
//         if (foto) {
//             fotoElement.src = 'uploads/' + foto;
//             fotoContainer.style.display = 'block';
//         } else {
//             fotoContainer.style.display = 'none';
//         }
//     });
// });

</script>
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>   

<!-- Modal for Success Notification (Edit) -->
<?php if ($status === 'edit-success'): ?>
<div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="successModalLabel">Berhasil!</h5>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-primary">Data berhasil diperbarui!</h4>
                <p>Perubahan telah berhasil disimpan.</p>
            </div>
            <div class="modal-footer">
                <a href="berita.php" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for Failed Notification (Edit) -->
<?php if ($status === 'edit-failed'): ?>
<div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="successModalLabel">Gagal!</h5>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-danger">Data gagal diperbarui!</h4>
                <p>File gagal diperbarui, pastikan unggah dalam format jpg, jpeg, png dengan ukuran ≤2MB .</p>
            </div>
            <div class="modal-footer">
                <a href="berita.php" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for Success Notification (Add) -->
<?php if ($status === 'add-success'): ?>
<div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Berhasil!</h5>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-success">Data berhasil ditambahkan!</h4>
                <p>File Anda telah diunggah dengan sukses.</p>
            </div>
            <div class="modal-footer">
                <a href="berita.php" class="btn btn-success">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for Failed Notification (Add) -->
<?php if ($status === 'add-failed'): ?>
<div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="successModalLabel">Gagal!</h5>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-danger">Data gagal diunggah!</h4>
                <p>File gagal diunggah, pastikan unggah dalam format jpg, jpeg, png dengan ukuran ≤2MB .</p>
            </div>
            <div class="modal-footer">
                <a href="berita.php" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for Success Notification (Delete) -->
<?php if ($status === 'delete-success'): ?>
<div class="modal fade show animate__animated animate__zoomIn" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="successModalLabel">Berhasil!</h5>
            </div>
            <div class="modal-body text-center">
                <h4 class="text-danger">Data berhasil dihapus!</h4>
                <p>File Anda telah dihapus dengan sukses.</p>
            </div>
            <div class="modal-footer">
                <a href="berita.php" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<!-- Optional: JavaScript for Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



        <script src="js/scripts.js"></script>
     
    
       
        <footer class="py-4 bg-light mt-auto">
   
        
                </form>
            </div>
        </div>
    </div>
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
</div>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


</body>
</html>

<?php
} else{
    // mengarahkan user ke halaman awal jika belum login
    header("Location: ../login.php");
    exit();
}
?>