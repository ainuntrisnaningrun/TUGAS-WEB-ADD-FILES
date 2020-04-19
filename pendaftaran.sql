-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_daftar`
--

CREATE TABLE `tabel_daftar` (
  `id` int(8) NOT NULL,
  `Nama_Lengkap` varchar(255) NOT NULL,
  `Nama_Depan` varchar(255) NOT NULL,
  `Nama_Belakang` varchar(255) NOT NULL,
  `Jenis_Kelamin` varchar(10) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Kota_Asal` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `Jenis_tempat_tinggal` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_daftar`
--

INSERT INTO `tabel_daftar` (`id`, `Nama_Lengkap`, `Nama_Depan`, `Nama_Belakang`, `Jenis_Kelamin`, `Username`, `Email`, `Kota_Asal`, `Alamat`, `tanggal_lahir`, `Jenis_tempat_tinggal`, `jurusan`, `tahun_angkatan`, `waktu_daftar`, `foto`) VALUES
(1, 'ainun trisnaningrun', 'ainun', 'trisnaningrun', 'perempuan', 'ainun23', 'ainun23@gmail.com', 'Makassar', 'Perumnas Sudiang', '2000-09-23', 'Rumah Orang Tua', 'Teknik Elektro', 2018, '2020-04-10 22:06:40', 'ainun23.png'),
(3, 'Aisyah Irmadani', 'Aisyah', 'Irmadani', 'perempuan', 'aisyahhh', 'aisyahhh55@gmail.com', 'Makassar', 'Perumnas Sudiang', '2002-11-21', 'Rumah Orang Tua', 'Akuntansi', 2019, '2020-04-10 22:42:37', ''),
(4, 'Israyanti Saputri', 'Isra', 'yanti', 'perempuan', 'israaaaa', 'israyantii@gmail.com', 'Makassar', 'Perumnas Sudiang', '1999-11-03', 'Rumah Orang Tua', 'Teknik Sipil', 2018, '2020-04-11 12:51:04', ''),
(8, 'Maghfirah Nurpadila', 'Fira', 'Padila', 'perempuan', 'firapadila', 'firapadila@gmail.com', 'Lombok', 'Daya', '2001-01-11', 'Rumah Wali', 'Akuntansi', 2018, '2020-04-11 17:31:52', ''),
(9, 'Nabila Fathun', 'Nabila', 'Fathun', 'perempuan', 'nabiwaa', 'nabila55@gmail.com', 'Makassar', 'Daya', '2002-12-12', 'Rumah Orang Tua', 'Administrasi Bisnis', 2019, '2020-04-19 15:04:53', 'nabiwaa.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_daftar`
--
ALTER TABLE `tabel_daftar`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
