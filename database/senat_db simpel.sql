
CREATE USER 'Admin'@'%' IDENTIFIED BY 'admin123';
GRANT ALL PRIVILEGES ON senat_db.* TO 'Admin'@'%';
FLUSH PRIVILEGES;

CREATE DATABASE senat_db;
USE senat_db;

CREATE TABLE login (
    `id_senat` int(11) AUTO_INCREMENT,
    `email` varchar(50),
    `password` varchar(50),
    `foto` varchar(255),
    PRIMARY KEY (id_senat)
);

CREATE TABLE `aspirasi` (
    `id` int(11) AUTO_INCREMENT,
    `judul` varchar(30),
    `kategori` varchar(50),
    `aspirasi` text,
    `tanggal` date DEFAULT current_timestamp(),
    PRIMARY KEY (id)
);

CREATE TABLE `struktur` (
    `Id_struktur` int(11) AUTO_INCREMENT,
    `jabatan` varchar(50),
    `nama` varchar(100),
    `Email` varchar(100),
    PRIMARY KEY (Id_struktur)
);

CREATE TABLE `berita` (
    `id` int(11) AUTO_INCREMENT,
    `judul` varchar(255),
    `deskripsi` text,
    `tanggal` date,
    `penulis` int(11),
    `foto` varchar(50),
    PRIMARY KEY (id),
    FOREIGN KEY (penulis) REFERENCES struktur(Id_struktur)
);

CREATE TABLE `produk` (
    `id` int(11) AUTO_INCREMENT,
    `judul` varchar(30),
    `isi` text,
    `tanggal` date,
    `p_unggah` int(11),
    PRIMARY KEY (id),
    FOREIGN KEY (p_unggah) REFERENCES struktur(Id_struktur)
);

CREATE TABLE `program` (
    `id_program` int(11) AUTO_INCREMENT,
    `kegiatan` varchar(50),
    `tanggal` date,
    `p_jawab` int(11),
    PRIMARY KEY (id_program),
    FOREIGN KEY (p_jawab) REFERENCES struktur(Id_struktur)
);

CREATE TABLE `jadwal` (
    `Id_rapat` int(11) AUTO_INCREMENT,
    `Judul` varchar(50),
    `Deskripsi` text,
    `Tanggal` varchar(4),
    `Jam` time,
    `Email` int(11),
    PRIMARY KEY (Id_rapat)
);

CREATE TABLE `jadwal_email` (
    `Id_rapat` int(11),
    `Id_struktur` int(11),
    FOREIGN KEY (`Id_rapat`) REFERENCES `jadwal`(`Id_rapat`) ON DELETE CASCADE,
    FOREIGN KEY (`Id_struktur`) REFERENCES `struktur`(`Id_struktur`) ON DELETE CASCADE
);


INSERT INTO `struktur` (`Id_struktur`, `jabatan`, `nama`, `email`) VALUES
(1, 'KETUA ', 'Dr.Budi Sugandi, ST., M.Eng', 'budi@gmail.com'),
(2, 'SEKRETARIS', 'Sudra Irawan, S.Pd.Si., M.Sc', '[Email Anda Disini]'),
(3, 'KETUA KOMISI I', 'Nanik Lestari,S.E., M.S.Ak', 'nanik@gmail.com'),
(4, 'KETUA KOMISI II', 'Metta Santiputri, St., M.Sc., Ph.D', 'metta@dmail.com'),
(5, 'KETUA KOMISI III', 'Hanifah Widiastuti, S.T., Ph.D', 'hanifah@gmail.com'),
(6, 'ANGGOTA KOMISI I', 'Dr. UuF Brajawidagda', 'uuf@gmail.com\r\n'),
(7, 'ANGGOTA KOMISI I', 'Ahmad Riyadi Firdaus, S.Si., M.T., Ph.D', 'ahmad@gmail.com'),
(8, 'ANGGOTA KOMISI I', 'Nur Sakinah Assad, S.T., M.T\r\n', 'nur@gmail.com'),
(9, 'ANGGOTA KOMISI I', 'Sudra Irawan, S.pd.Si., M.Sc\r\n', 'sudra@gmail.com'),
(10, 'ANGGOTA KOMISI I', 'Sapto Wiranto Satoto, S.T., M.T', 'sapto@gmail.com'),
(11, 'ANGGOTA KOMISI II', 'Dr. Muhammad Zaenuddin', 'zaenudddi@gmail.com'),
(12, 'ANGGOTA KOMISI II', 'Daniel Sutopo Pamungkas, S.T., M.T., Phh.D.\r\n', 'daniel@gmail.com'),
(13, 'ANGGOTA KOMISI II', 'Dr.Vudi Sugandi, S.T.,M.Eng\r\n', 'vudi@gmail.com'),
(14, 'ANGGOTA KOMISI II', 'Shinta Wahyu Hati, S.Sos., M.AB', 'shinta@gmail.com'),
(15, 'ANGGOTA KOMISI III', 'Bambang Hendrawan, S.T., M.S.M\r\n', 'bambang@gmail.com'),
(16, 'ANGGOTA KOMISI III', 'Dr.Imam Fahruzi\r\n', 'imam@gmail.com'),
(17, 'ANGGOTA KOMISI III', 'Sinarti, S.E., M.Sc.Akt.,CA\r\n', 'sinarti@gmail.com'),
(18, 'ANGGOTA KOMISI III', 'Ahmad Hamim Thohari, S.S.T., M.T.\r\n', 'hamim@gmail.com'),
(19, 'ANGGOTA KOMISI III', 'Ihsan Saputra, S.T., M.Sc.', 'ihsan@gmail.com');

INSERT INTO `login` (`id_senat`, `email`, `password`, `foto`) VALUES
(1, '[Email Anda Disini]', '[Password Anda Disini]', '../uploads/foto_profil.jpg');

INSERT INTO `aspirasi` (`id`, `judul`, `kategori`, `aspirasi`) VALUES
(1, 'Parkir Kendaraan', 'Parkir Kendaraan', 'tolong perluas lahan untuk parkir ya'),
(2, 'Parkir Kendaraan', 'Parkir Kendaraan', 'tolong perluas lahan untuk parkirnya ya'),
(3, 'Pendidikan', 'Pendidikan', 'setiap prodi mungkin dapat pembelajaran umum untuk pengetahuan yang luas'),
(4, 'Pembelajaran', 'Pendidikan', 'sebaiknya dalam pembelajran disertai juga dengan ice breaking'),
(5, 'fasilitas komputer', 'Fasilitas Belajar', 'mungkin perbanyak fasilitas komputer'),
(6, 'jaringan WIFI', 'Fasilitas Belajar', 'mungkin perbanyak jaringan wifi'),
(7, 'CCTV', 'Keamanan', 'perbanyak cctv untuk mencegah kemalingan'),
(8, 'petugas keamanan', 'Keamanan', 'perbanyak petugas keamanan untuk mencegah kemalingan'),
(9, 'kebersihan RTF', 'Kebersihan', 'kebersihan di lingkungan gedung RTF kurang'),
(10, 'daun kerinng di poltek', 'Kebersihan', 'masih banyak daun-daun kering yang bertebaran di poltek'),
(11, 'batas waktu di poltek', 'Lainnya', 'batas waktu untuk di poltek mohon diperpanjang untuk dipakai diskusi organisasi');

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `tanggal`, `penulis`, `foto`) VALUES
(1, 'senat tetapkan 13 calon direktur politeknik negri batam', 'Tahap penajaringan politeknik negri batam pada periode 2024-2028', '2024-11-28', 3, 'Polibatam.jpg'),
(2, 'Penetapan 3 calon direktur polibatam', 'senat polibatam telah menetapkan 3 kandidat calon direktur', '2024-12-08', 5, 'Polibatam.jpg'),
(3, 'Terpilihnya direktur politeknik negeri batam periode 2022-2024', 'menjabat sebagai Wakil Direktur II bidang Perencanaan, Keuangan dan Umum Politeknik Negeri Batam (Polibatam) kini telah dilantik menjadi Direktur Polibatam. Selamat bertugas sebagai Direktur Polibatam yang memiliki visi menjadikan politeknik bermutu, unggul, inovatif, dan bermitra erat dengan industri dan masyarakat untuk mendukung Indonesia Maju dan Sejahtera 2045 diperlukan 4 hal yang akan terus didorong yaitu peningkatan kalaborasi dengan industri, peningkatan relevansi lulusan, peningkatan dampak penelitian bagi masyarakat, dan peningkatan kapabilitas, keluwesan, dan kelincahan organisasi. Program-program dari Kemendikbud seperti Kampus Merdeka dan Merdeka Belajar akan terus diimplementasikan.', '2023-08-17', 7, 'Polibatam.jpg');

INSERT INTO `jadwal` (`Id_rapat`, `Judul`, `Deskripsi`, `Tanggal`, `Jam`) VALUES
(1, 'Rapat Pleno', 'Jenis rapat yang melibatkan seluruh anggota suatu organisasi, komite, atau badan tertentu untuk membahas dan memutuskan agenda penting secara kolektif', '2024', '00:00:00'),
(2, 'pembaruan kurikulum', 'Peninjauan dan pembaruan kurikulum sesuai dengan kebutuhan pasar dan standar nasional/internasional.', '2024', '08:00:00'),
(3, 'kebijakan akademik', 'Peraturan terkait penilaian, ujian, atau sistem pembelajaran (online/hybrid/tradisional).\\r\\nStandar akademik untuk kelulusan, skripsi, tesis, atau disertasi.', '2024', '10:00:00');

INSERT INTO `jadwal_email` (`Id_rapat`, `Id_struktur`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 5),
(2, 6),
(2, 7),
(3, 15),
(3, 16),
(3, 17);

INSERT INTO `produk` (`id`, `judul`, `isi`, `tanggal`, `p_unggah`) VALUES
(1, 'Tata Tertib Senat Polibatam', 'PBL-TRPL101 Laporan prototyping and testing (1)_1732605395.pdf', '2024-11-26', 19),
(2, 'Tata Cara Pemilihan Direktur', 'SRS_PBL-101_1734142684.pdf', '2020-12-09', 6);

INSERT INTO `program` (`id_program`, `kegiatan`, `tanggal`, `p_jawab`) VALUES
(1, 'Pengawasan Lembaga Mahasiswa', '2024-11-18', 3),
(2, 'Pelatihan Dan Pendidikan Mahasiswa', '2024-11-18', 4),
(3, 'Penyusunan Peraturan Perundang-undangan', '2024-11-18', 1),
(4, 'Peningkatan Kebugaran Jasmani', '2024-11-18', 5),
(5, 'tes', '2024-12-16', 1);
