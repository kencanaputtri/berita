-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar_berita`
--

INSERT INTO `komentar_berita` (`id_komentar`, `id_berita`, `nama_pengguna`, `isi_komentar`, `tanggal_komentar`) VALUES
(17, 3, 'kyra', 'selamat untuk timnas kita!', '2024-12-21 16:02:09'),
(18, 4, 'euis', 'waduhh kacaw', '2024-12-21 16:02:44'),
(19, 4, 'irpan', 'baguslahh, lagian mahal', '2024-12-21 16:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('admin','penulis','pembaca') DEFAULT 'pembaca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `nomor` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `isiberita` varchar(200) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `penulis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`nomor`, `judul`, `isiberita`, `gambar`, `penulis`) VALUES
(3, 'Olahraga', 'Timnas Indonesia berhasil meraih kemenangan atas Timnas Arab dengan skor 2-0 pada ajang kualifikasi Piala Dunia 2026.', 'olahraga.jpg', 'Usep'),
(4, 'Ekonomi', 'SPBU Shell akan menutup semua SPBUnya karena penurunan pendapatan yang disebabkan SPBU Pertamina terlalu mendominasi Pasar.', 'ekonomi.jpg', 'Ujang'),
(24, 'Life style', 'JFW akan diadakan di Bekasi', 'jfw.jpg', 'Puttri'),
(27, 'Olahraga', 'Timnas Indonesia berhasil meraih kemenangan atas Timnas Arab dengan skor 2-0 pada ajang kualifikasi Piala Dunia 2026.', '', 'inull'),
(28, 'Olahraga', 'Timnas Indonesia berhasil meraih kemenangan atas Timnas Arab dengan skor 2-0 pada ajang kualifikasi Piala Dunia 2026.', '', 'inull kosasih');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD CONSTRAINT `komentar_berita_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `tb_berita` (`nomor`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
