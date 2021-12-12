-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2021 at 04:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_xampp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_anggota` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_anggota`, `username`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(7, 'lindasaputri', 'Linda Saputri', 'Purbalingga', 'linda.sapturi@gmail.com', '085855882123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guestbook`
--

CREATE TABLE `tb_guestbook` (
  `id_guestbook` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guestbook`
--

INSERT INTO `tb_guestbook` (`id_guestbook`, `nama`, `alamat`, `pesan`, `tanggal`) VALUES
(1, 'lindasaputri', 'purbalingga', 'Bertemu dengan Kepala sekolah', '2021-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `nama_pengarang` varchar(32) NOT NULL,
  `judul_jurnal` text NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `volume` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id_jurnal`, `nama_pengarang`, `judul_jurnal`, `penerbit`, `tahun_terbit`, `volume`) VALUES
(1, 'Putri Armadiyanti, Sri Iswati', 'CORPORATE POLITICAL CONNECTION AND AUDIT QUALITY', 'Jurnal Akuntansi dan Keuangan Indonesia', 2019, '16'),
(2, 'Alex Johanes Simamora', 'EARNINGS MANAGEMENT AND FUTURE EARNINGS', 'Jurnal Akuntansi dan Keuangan Indonesia', 2020, '14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_guestbook`
--
ALTER TABLE `tb_guestbook`
  ADD PRIMARY KEY (`id_guestbook`);

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_guestbook`
--
ALTER TABLE `tb_guestbook`
  MODIFY `id_guestbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
