-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:07 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_kelas_sunusetyojati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus A', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'SMAN 3 Bandung', 88.00, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus A', NULL, NULL, NULL, NULL),
(3, 'Budi Santoso', 'SMKN 2 Surabaya', 82.25, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Citra Dewi', 'SMAN 5 Yogyakarta', 90.00, 250000.00, 'Reguler', 'Arsitektur', 'Kampus A', NULL, NULL, NULL, NULL),
(5, 'Dedi Kurniawan', 'SMAN 1 Medan', 79.50, 250000.00, 'Reguler', 'Manajemen', 'Kampus C', NULL, NULL, NULL, NULL),
(6, 'Eka Putri', 'SMAN 8 Makassar', 86.75, 250000.00, 'Reguler', 'Akuntansi', 'Kampus C', NULL, NULL, NULL, NULL),
(7, 'Fajar Hidayat', 'SMAN 2 Semarang', 84.00, 250000.00, 'Reguler', 'Ilmu Komunikasi', 'Kampus B', NULL, NULL, NULL, NULL),
(8, 'Gilang Perkasa', 'SMAN 1 Solo', 92.00, 250000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Hany Rahmawati', 'SMAN 3 Malang', 94.50, 250000.00, 'Prestasi', NULL, NULL, 'Futsal Putri', 'Provinsi', NULL, NULL),
(10, 'Indra Wijaya', 'SMAN 1 Denpasar', 89.00, 250000.00, 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(11, 'Joko Susilo', 'SMAN 4 Palembang', 91.25, 250000.00, 'Prestasi', NULL, NULL, 'Pencak Silat', 'Internasional', NULL, NULL),
(12, 'Kartika Sari', 'SMAN 7 Balikpapan', 93.00, 250000.00, 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(13, 'Laksana Tri', 'SMAN 1 padang', 88.50, 250000.00, 'Prestasi', NULL, NULL, 'Juara Catur', 'Kabupaten', NULL, NULL),
(14, 'Mega Utami', 'SMAN 2 bogor', 95.00, 250000.00, 'Prestasi', NULL, NULL, 'Hafizh Al-Quran', 'Nasional', NULL, NULL),
(15, 'Naufal Rizqi', 'SMAN 1 Bandung', 87.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-101/DISDIK/2026', 'Kementerian Pendidikan'),
(16, 'Olivia tandra', 'SMAN 6 Jakarta', 89.50, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-202/BUMN/2026', 'PT Pertamina'),
(17, 'Putra Pratama', 'SMAN 3 Yogyakarta', 86.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-303/DISHUB/2026', 'Dinas Perhubungan'),
(18, 'Qori sandra', 'SMAN 1 Surabaya', 91.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-404/KOMINFO/2026', 'Kementerian Kominfo'),
(19, 'Rian Hidayat', 'SMAN 2 Semarang', 85.25, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-505/DEPDAGRI/2026', 'Kementerian Dalam Negeri'),
(20, 'Sinta Bella', 'SMAN 1 Medan', 88.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-606/KEMENKEU/2026', 'Kementerian Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
