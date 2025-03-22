# Sistem-Pengelolaan-Informasi-Senat-Polibatam
Sistem aplikasi senat merupakan sistem yang dibuat untuk memberikan informasi kepada sivitas akademika baik itu kepada para mahasiswa maupun kepada pihak luar yang ingin mencari informasi tentang Senat Polibatam. Sistem aplikasi senat berbasis web berfungsi untuk mengelola informasi tentang senat yang ada di Polibatam. Karena dalam sistem ini tersimpan informasi, sehingga dapat diakses oleh seluruh pihak yang ingin melihat. Selain menyajikan informasi juga berisi tentang senat, di dalam sistem ini juga berisikan data-data tentang pengawasan, peraturan, kebijakan, dan berita terbaru tentang Senat Polibatam.

Aplikasi senat berbasis web ini memiliki beberapa informasi dan fitur yang dapat diakses oleh Sivitas Akademika. Informasi dan fitur-fitur tersebut antara lain seperti tugas dan wewenang senat, peran senat dalam pendidikan, struktur senat, berita-berita terbaru, produk senat, program kerja, jadwal rapat senat, serta anggota senat akan mendapatkan notifikasi terkait jadwal-jadwal kegiatan senat. Selain itu, Sivitas Akademika dapat mengirimkan masukan dan sarannya kepada senat agar kualitas senat menjadi lebih baik kedepan nya.


tahapan setup:
1. Edit database SQL sehingga pada tabel login value kolom email merupakan email yang benar
2. Edit database SQL pada tabel Struktur sehingga email pada record dengan jabatan "SEKRETARIS" sama dengan email login
3. Edit email yang akan digunakan oleh phpmailer untuk mengirim email pada (dashboard/tambah_jadwal.php) & (dashboard/lupa.php)
