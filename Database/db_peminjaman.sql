-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `namapemesan` varchar(200) NOT NULL,
  `no_telp` int(200) NOT NULL,
  `divisi` varchar(290) NOT NULL,
  `waktuawal` varchar(200) NOT NULL,
  `waktuakhir` varchar(200) NOT NULL,
  `haritgl` varchar(200) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tempatstandby` varchar(200) NOT NULL,
  `jumlahpenumpang` varchar(10) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `waktustandby` varchar(200) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `namapemesan`, `no_telp`, `divisi`, `waktuawal`, `waktuakhir`, `haritgl`, `tujuan`, `area`, `tempatstandby`, `jumlahpenumpang`, `jenis`, `waktustandby`, `catatan`, `unit`) VALUES
(10, 'Reggy Aditya', 821007008, 'Sales', '11:00', '12:30', '2024-06-28', 'Bambu Apus', 'Gudang LintasArta Taman Tekno', 'Lobby Utama', '2 ', 'LCGC', '10:00', 'Area Parkir', 'Toyota Avanza'),
(11, 'Haikal', 0, 'SPV', '09:00', '11:30', '2024-06-29', 'Jakarta Barat', 'Bambu Apus', 'Lobby Utama', '1 ', 'SUV', '08:38', 'Area Parkir', 'APV Arena'),
(15, 'Taufik', 822, 'Marketing', '10.00', '13.00', '12-07-2024', 'Centennial Tower', 'JAKTIM', '', '15', 'LCGC', '', 'Lobby Utama', 'Toyota Hiace');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `jenismobil` varchar(200) NOT NULL,
  `nomor` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `jenismobil`, `nomor`, `jenis`) VALUES
(6, 'MVP', 'B 1298 PLO', 'Genap'),
(7, 'SUV', 'B 2901 POS', 'Ganjil'),
(8, 'Mini Bus 20 Seat', 'B 8971 PJH', 'Ganjil'),
(10, 'LCGC', 'B 1212 ADE', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` char(20) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `email`, `alamat`, `no_hp`, `level`, `gambar`) VALUES
(4, 'admin', 'admin', 'Admin', 'andostanding@gmail.com', 'Dadap', '081282498758', 'admin', '../admin/gambar_admin/annonymous.jpg'),
(5, 'Parlan', 'parlan123', 'Parlan', 'parlan@gmail.com', 'Rusun Cinta Kasih Tzu Chi ', '123123', 'admin', '../admin/gambar_admin/tzuchi-logo.jpg'),
(6, 'user', 'user', 'user', '-', '-', '-', 'user', '../admin/gambar_admin/tzuchi-logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
