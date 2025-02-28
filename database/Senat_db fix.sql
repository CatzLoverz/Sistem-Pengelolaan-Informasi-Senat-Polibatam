-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 06:57 AM
-- Server version: 11.6.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senat_db`
--
CREATE DATABASE IF NOT EXISTS `senat_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci;
USE `senat_db`;

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `aspirasi` text DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `judul`, `kategori`, `aspirasi`, `tanggal`) VALUES
(1, 'parkir kendaraan', 'parkir kendaraan', 'tolong perluas lahan untuk parkir ya', '2025-01-05'),
(2, 'parkir kendaraan', 'parkir kendaraan', 'tolong perluas lahan untuk parkirnya ya', '2025-01-05'),
(3, 'pendidikan umum', 'pendidikan', 'setiap prodi mungkin dapat pembelajaran umum untuk pengetahuan yang luas', '2025-01-05'),
(4, 'pembelajaran', 'pendidikan', 'sebaiknya dalam pembelajran disertai juga dengan ice breaking', '2025-01-05'),
(5, 'fasilitas komputer', 'fasilitas belajar', 'mungkin perbanyak fasilitas komputer', '2025-01-05'),
(6, 'jaringan WIFI', 'fasilitas belajar', 'mungkin perbanyak jaringan wifi', '2025-01-05'),
(7, 'CCTV', 'keamanan', 'perbanyak cctv untuk mencegah kemalingan', '2025-01-05'),
(8, 'petugas keamanan', 'keamanan', 'perbanyak petugas keamanan untuk mencegah kemalingan', '2025-01-05'),
(9, 'kebersihan RTF', 'kebersihan', 'kebersihan di lingkungan gedung RTF kurang', '2025-01-05'),
(10, 'daun kerinng di poltek', 'kebersihan', 'masih banyak daun-daun kering yang bertebaran di poltek', '2025-01-05'),
(11, 'batas waktu di poltek', 'lainnya', 'batas waktu untuk di poltek mohon diperpanjang untuk dipakai diskusi organisasi', '2025-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `penulis` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `tanggal`, `penulis`, `foto`) VALUES
(1, 'senat tetapkan 13 calon direktur politeknik negri batam', 'Tahap penajaringan politeknik negri batam pada periode 2024-2028', '2024-11-28', 3, 'Polibatam.jpg'),
(2, 'Penetapan 3 calon direktur polibatam', 'senat polibatam telah menetapkan 3 kandidat calon direktur', '2024-12-08', 5, 'Polibatam.jpg'),
(3, 'Terpilihnya direktur politeknik negeri batam periode 2022-2024', 'menjabat sebagai Wakil Direktur II bidang Perencanaan, Keuangan dan Umum Politeknik Negeri Batam (Polibatam) kini telah dilantik menjadi Direktur Polibatam. Selamat bertugas sebagai Direktur Polibatam yang memiliki visi menjadikan politeknik bermutu, unggul, inovatif, dan bermitra erat dengan industri dan masyarakat untuk mendukung Indonesia Maju dan Sejahtera 2045 diperlukan 4 hal yang akan terus didorong yaitu peningkatan kalaborasi dengan industri, peningkatan relevansi lulusan, peningkatan dampak penelitian bagi masyarakat, dan peningkatan kapabilitas, keluwesan, dan kelincahan organisasi. Program-program dari Kemendikbud seperti Kampus Merdeka dan Merdeka Belajar akan terus diimplementasikan.', '2023-08-17', 7, 'Polibatam.jpg'),
(4, 'tes lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent efficitur auctor tortor, eu dictum ante imperdiet vel. Pellentesque quis ultrices ipsum. Donec malesuada porta urna, a luctus urna eleifend rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent efficitur augue quis nisi sollicitudin varius. Morbi venenatis libero vitae lacus elementum eleifend quis vel dui. Duis congue, nunc vitae suscipit imperdiet, nisi sapien sagittis justo, sit amet mollis leo diam quis odio. Aliquam erat volutpat. Sed elementum augue in enim finibus hendrerit. Integer sagittis sem a leo lobortis, eget iaculis leo dignissim. Aliquam tempor augue purus, non ullamcorper libero mollis non. Nulla facilisi. Sed at tellus aliquam quam eleifend placerat a id erat.\r\n\r\nUt malesuada elit a orci egestas efficitur vitae eget libero. Donec non mi eget turpis luctus mattis. Nullam non nunc placerat, faucibus tellus ut, porta quam. Phasellus vel tortor euismod augue blandit condimentum. Aenean condimentum, justo in posuere cursus, dolor felis rutrum nulla, vitae varius sem magna id leo. Curabitur nibh dui, sagittis vel lacus non, cursus vestibulum arcu. In non lectus felis. Sed vitae vehicula elit.\r\n\r\nPraesent lacus ipsum, vehicula in fringilla sed, posuere nec ligula. Praesent ac luctus risus. Duis gravida diam mauris, ac faucibus turpis rhoncus vitae. Quisque at nisl eget lectus condimentum fermentum. Suspendisse suscipit, lorem vitae ultrices tincidunt, metus nulla bibendum nulla, ut convallis justo mauris ut ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed facilisis diam non eros hendrerit, a accumsan ante rutrum. Maecenas vitae semper ligula, in posuere velit. Nullam nulla nibh, commodo aliquet diam placerat, tempus dapibus velit. Aliquam erat volutpat. Donec vel diam pharetra nunc dictum faucibus sit amet fringilla turpis. Praesent placerat aliquet ante non aliquet. Mauris pharetra mauris eu odio dictum sollicitudin.\r\n\r\nNulla facilisi. Pellentesque ac faucibus augue, eu porta ligula. Pellentesque molestie eros neque, ac lacinia risus volutpat id. Pellentesque hendrerit commodo leo sit amet mattis. Nunc quis odio magna. Nunc ornare, lacus vitae consectetur mattis, risus urna accumsan lorem, nec aliquam eros tellus eget augue. Maecenas laoreet felis a metus convallis porta. Donec vel lacus ullamcorper, tempor ligula at, convallis nisi. Integer cursus euismod nibh in vehicula.\r\n\r\nSed scelerisque semper massa, sed aliquam urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc vehicula nisl eget metus dictum hendrerit. Vivamus quis porta erat, vel rhoncus velit. Aenean ac dignissim augue. Mauris justo diam, sollicitudin blandit mattis vel, ornare et purus. Nulla tincidunt metus luctus nisl laoreet gravida. Curabitur id dui in risus auctor dictum sit amet sit amet turpis. Aliquam tincidunt justo tellus, quis sollicitudin urna feugiat mollis. Aenean tortor mi, consectetur a viverra vel, consectetur et risus.', '2025-01-07', 2, '1734248588_logo_polibatam.png');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Id_rapat` int(11) NOT NULL,
  `Judul` varchar(50) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Tanggal` varchar(4) DEFAULT NULL,
  `Jam` time DEFAULT NULL,
  `Email` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Id_rapat`, `Judul`, `Deskripsi`, `Tanggal`, `Jam`, `Email`) VALUES
(1, 'Rapat Pleno', 'Jenis rapat yang melibatkan seluruh anggota suatu organisasi, komite, atau badan tertentu untuk membahas dan memutuskan agenda penting secara kolektif', '2024', '00:00:00', NULL),
(2, 'pembaruan kurikulum', 'Peninjauan dan pembaruan kurikulum sesuai dengan kebutuhan pasar dan standar nasional/internasional.', '2024', '08:00:00', NULL),
(3, 'kebijakan akademik', 'Peraturan terkait penilaian, ujian, atau sistem pembelajaran (online/hybrid/tradisional).\\r\\nStandar akademik untuk kelulusan, skripsi, tesis, atau disertasi.', '2024', '10:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_email`
--

CREATE TABLE `jadwal_email` (
  `Id_rapat` int(11) DEFAULT NULL,
  `Id_struktur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `jadwal_email`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_senat` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_senat`, `email`, `password`, `foto`) VALUES
(1, 'youremailhere', 'gasken1234', '../uploads/foto_profil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `p_unggah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `judul`, `isi`, `tanggal`, `p_unggah`) VALUES
(1, 'Tata Tertib Senat Polibatam', 'PBL-TRPL101 Laporan prototyping and testing (1)_1732605395.pdf', '2024-11-26', 19),
(2, 'Tata Cara Pemilihan Direktur', 'SRS_PBL-101_1734142684.pdf', '2020-12-09', 6);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `kegiatan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `p_jawab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `kegiatan`, `tanggal`, `p_jawab`) VALUES
(1, 'Pengawasan Lembaga Mahasiswa', '2024-11-18', 3),
(2, 'Pelatihan Dan Pendidikan Mahasiswa', '2024-11-18', 4),
(3, 'Penyusunan Peraturan Perundang-undangan', '2024-11-18', 1),
(4, 'Peningkatan Kebugaran Jasmani', '2024-11-18', 5),
(5, 'tes', '2024-12-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `Id_struktur` int(11) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `struktur`
--

INSERT INTO `struktur` (`Id_struktur`, `jabatan`, `nama`, `Email`) VALUES
(1, 'KETUA ', 'Dr.Budi Sugandi, ST., M.Eng', 'budi@gmail.com'),
(2, 'SEKRETARIS', 'Sudra Irawan, S.Pd.Si., M.Sc', 'youremailhere@gmail.com'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penulis` (`penulis`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Id_rapat`);

--
-- Indexes for table `jadwal_email`
--
ALTER TABLE `jadwal_email`
  ADD KEY `Id_rapat` (`Id_rapat`),
  ADD KEY `Id_struktur` (`Id_struktur`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_senat`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_unggah` (`p_unggah`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `p_jawab` (`p_jawab`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`Id_struktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `Id_rapat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_senat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `Id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`penulis`) REFERENCES `struktur` (`Id_struktur`);

--
-- Constraints for table `jadwal_email`
--
ALTER TABLE `jadwal_email`
  ADD CONSTRAINT `jadwal_email_ibfk_1` FOREIGN KEY (`Id_rapat`) REFERENCES `jadwal` (`Id_rapat`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_email_ibfk_2` FOREIGN KEY (`Id_struktur`) REFERENCES `struktur` (`Id_struktur`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`p_unggah`) REFERENCES `struktur` (`Id_struktur`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`p_jawab`) REFERENCES `struktur` (`Id_struktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
