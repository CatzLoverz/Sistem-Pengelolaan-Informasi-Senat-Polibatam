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
            <div id="layoutSidenav_content">
            <main>
            <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-people-line"></i>
                    <b>STRUKTUR</b>
                </div>
    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>no</th>
                <th>Jabatan</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mengambil data dari tabel struktur
            $sql = "SELECT * FROM struktur";
            $result = $conn->query($sql);
            $no = 1;

            // Periksa apakah ada data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['jabatan']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>
                           <button 
                    type='button' 
                    class='btn btn-primary edit-button' 
                    data-id='" . $row['Id_struktur'] . "' 
                    data-jabatan='" . htmlspecialchars($row['jabatan']) . "' 
                    data-nama='" . htmlspecialchars($row['nama']) . "' 
                    data-email='" . htmlspecialchars($row['Email']) . "' 
                    data-bs-toggle='modal' 
                    data-bs-target='#editModal'>
                    <i class='fa-solid fa-pen-to-square'></i> 
                </button>                          
                </a>
               <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' data-id='" . $row['Id_struktur'] . "'>
                    <i class='fa-solid fa-trash-can'></i> 
                </button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            echo "<tr>";
echo "<td colspan='4' class='text-center'><strong>Tambah Data Baru</strong></td>";
echo "<td>
        <button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addModal'>
            <i class='fa-solid fa-circle-plus'></i> TAMBAH DATA
        </button>
      </td>";
echo "</tr>";
$conn->close();
            ?>
        </tbody>
   <!-- Edit Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header" style="background-color: #4169E1; color: white;">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Ubah Struktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST" action="edit_struktur.php">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <!-- Jabatan Input -->
                    <div class="mb-3">
                        <label for="editJabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control form-control-lg" id="editJabatan" name="jabatan" placeholder="Masukkan jabatan" required>
                    </div>
                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-lg" id="editNama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" id="editEmail" name="email" placeholder="Masukkan email" required>
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

  

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel"><i class="fas fa-plus-circle"></i> Tambah Data Struktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="tambah_struktur.php" method="POST">
                <div class="modal-body">
                    <!-- Jabatan Input -->
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control form-control-lg" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" required>
                    </div>
                    
                    <!-- Nama Input -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Masukkan email" required>
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

<!-- Additional CSS for Success Theme -->
<style>
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
            deleteLink.href = 'hapus_struktur.php?id=' + id; // Set the href of the delete link in the modal
        });
    });
</script>
<script>
    // Attach event listener to edit buttons
    const editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const jabatan = button.getAttribute('data-jabatan');
            const nama = button.getAttribute('data-nama');
            const email = button.getAttribute('data-email');

            // Populate modal fields
            document.getElementById('editId').value = id;
            document.getElementById('editJabatan').value = jabatan;
            document.getElementById('editNama').value = nama;
            document.getElementById('editEmail').value = email;
        });
    });
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
                <a href="struktur.php" class="btn btn-primary">OK</a>
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
                <a href="struktur.php" class="btn btn-success">OK</a>
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
                <a href="struktur.php" class="btn btn-danger">OK</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<!-- Optional: JavaScript for Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



                            
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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
</body>
</html>

<?php
} else{
    // mengarahkan user ke halaman awal jika belum login
    header("Location: ../login.php");
    exit();
}
?>