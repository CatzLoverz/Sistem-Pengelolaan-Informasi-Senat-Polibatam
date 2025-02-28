<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Aspirasi</title>
</head>
<body>

    <?php include('nav.php')?>
    
    <h2 class="text-center fs-1">KIRIMKAN ASPIRASI ANDA</h2>

    <form action="dashboard/tambah_aspirasi.php" method="post" class="container-lg mx-auto mt-5 bg-secondary" id="form-aspirasi">
        <label for="judul" class="fs-2">Judul Aspirasi</label><br>
        <input type="text" id="judul" name="judul" class="form-control py-2 p5-2" required><br>
        
        <label for="judul" class="fs-2">Kategori</label><br>
        <select name="kategori" id="kategori-aspirasi" class="form-select fs-4" required>
            <option value="" class="fs-4" selected hidden></option>
            <option value="pendidikan" class="fs-4">Pendidikan</option>
            <option value="Fasilitas" class="fs-4">Fasilitas Belajar</option>
            <option value="Keamanan" class="fs-4">Keamanan</option>
            <option value="Parkir" class="fs-4">Parkir Kendaraan</option>
            <option value="Kebersihan" class="fs-4">Kebersihan</option>
            <option value="Kebersihan" class="fs-4">Lainnya</option>
        </select> <br>
        
        <label for="judul" class="fs-2">Aspirasi Anda</label><br>
        <textarea name="aspirasi" id="aspirasi" class="form-control" rows="5" required></textarea>
        
        <button type="submit" class="btn btn-primary mt-4 fs-4 rounded-pill px-5 py-2">KIRIM</button>
        
    </form>
    <!-- Modal "Terima Kasih" -->
<?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
<div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #a1c4fd, #c2e9fb);">
                <h5 class="modal-title text-white" id="thankYouModalLabel">
                    <i class="fas fa-check-circle"></i> Terimakasih atas Masukan Anda
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="font-size: 1.1rem; color: #555;">
                <p>Aspirasi Anda telah berhasil disimpan.</p>
                <p>Terimakasih telah memberikan masukan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-success" data-bs-dismiss="modal">
                    <i class="fas fa-thumbs-up"></i> Terima Kasih
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap CSS and Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Custom CSS for Modal Styling and Animation -->
<style>
    .modal-content {
        animation: modalFadeIn 0.5s ease-out;
    }

    .modal-header {
        border-bottom: 2px solid #ddd;
        padding: 15px;
        text-align: center;
    }

    .modal-body {
        padding: 30px 20px;
    }

    .modal-footer {
        padding: 10px 20px;
        text-align: center;
    }

    .modal-title {
        font-size: 1.4rem;
        font-weight: 600;
    }

    .btn-close {
        font-size: 1.5rem;
        color: #fff;
    }

    .btn-close:hover {
        color: #f1c40f;
    }

    .modal-footer .btn {
        font-size: 1.1rem;
        padding: 10px 20px;
    }

    /* Light Blue Gradient for the modal header */
    .modal-header {
        background: linear-gradient(135deg, #a1c4fd, #c2e9fb); /* Light Blue Gradient */
    }

    /* Animation for the modal */
    @keyframes modalFadeIn {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script to show the modal -->
<script>
    // Only show the modal if the success query parameter is set
    if (window.location.search.includes('success=true')) {
        var myModal = new bootstrap.Modal(document.getElementById('thankYouModal'));
        myModal.show();
    }
</script>


    <?php endif; ?>

    <?php include('footer.php')?>
    
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>