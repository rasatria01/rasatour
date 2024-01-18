-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2024 at 10:13 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_penumpang`
--

CREATE TABLE `t_penumpang` (
  `id_penumpang` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `id_travel` varchar(12) NOT NULL,
  `kota_keberangkatan` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `kontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_penumpang`
--

INSERT INTO `t_penumpang` (`id_penumpang`, `nama`, `tgl_berangkat`, `id_travel`, `kota_keberangkatan`, `tujuan`, `kontak`) VALUES
('22004', 'Newbie', '2023-12-05 00:00:00', '01002', 'Surakarta', 'Boyolali', 'newbie_19'),
('22011', 'Satt', '2024-01-17 09:00:00', '01002', 'Solo', 'Klaten', '0882137137613'),
('22012', 'Gogon', '2024-01-20 10:00:00', '01005', 'Solo', 'Cirebon', 'gogon_ho');

-- --------------------------------------------------------

--
-- Table structure for table `t_staff`
--

CREATE TABLE `t_staff` (
  `id_pegawai` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(12) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_staff`
--

INSERT INTO `t_staff` (`id_pegawai`, `nama`, `tgl_lahir`, `jk`, `tgl_masuk`, `posisi`) VALUES
('11001', 'Satriaa', '2000-01-13', 'Laki-laki', '2022-01-14', 'Founder'),
('11002', 'Gonjang', '2000-01-13', 'Laki-laki', '2022-01-14', 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `t_tour`
--

CREATE TABLE `t_tour` (
  `id_tour` varchar(12) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `durasi` int NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_tour`
--

INSERT INTO `t_tour` (`id_tour`, `nama`, `tujuan`, `durasi`, `fasilitas`, `harga`) VALUES
('02001', 'Pantai View', 'Jogja', 2, 'Lengkap', 500000),
('02002', 'City Tour Night', 'Yogyakarta', 3, 'Moderate', 300000),
('02003', 'Diving', 'Raja Ampat', 6, 'Bintang 5', 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_penumpang` varchar(12) NOT NULL,
  `id_travel` varchar(12) NOT NULL,
  `statuss` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id_transaksi`, `id_penumpang`, `id_travel`, `statuss`) VALUES
('99004', '22004', '01002', 'Lunas'),
('99011', '22011', '01002', 'Belum Lunas'),
('99012', '22012', '01005', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `t_travel`
--

CREATE TABLE `t_travel` (
  `id_travel` varchar(12) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  `kota_berangkat` varchar(20) NOT NULL,
  `jadwal` varchar(15) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `kapasitas` int NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_travel`
--

INSERT INTO `t_travel` (`id_travel`, `tujuan`, `kota_berangkat`, `jadwal`, `jam_berangkat`, `kapasitas`, `harga`) VALUES
('01001', 'Salatiga', 'Surakarta', 'Selasa', '07:50:00', 8, 30000),
('01002', 'Jogja', 'Solo', 'Rabu', '18:00:00', 10, 50000),
('01003', 'Bandung', 'Solo', 'Jumat', '20:00:00', 12, 230000),
('01005', 'Jakarta', 'Solo', 'Sabtu', '07:19:00', 20, 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_penumpang`
--
ALTER TABLE `t_penumpang`
  ADD PRIMARY KEY (`id_penumpang`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Indexes for table `t_staff`
--
ALTER TABLE `t_staff`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `t_tour`
--
ALTER TABLE `t_tour`
  ADD PRIMARY KEY (`id_tour`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penumpang` (`id_penumpang`),
  ADD KEY `id_travel` (`id_travel`);

--
-- Indexes for table `t_travel`
--
ALTER TABLE `t_travel`
  ADD PRIMARY KEY (`id_travel`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_penumpang`
--
ALTER TABLE `t_penumpang`
  ADD CONSTRAINT `t_penumpang_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `t_travel` (`id_travel`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `t_transaksi_ibfk_1` FOREIGN KEY (`id_penumpang`) REFERENCES `t_penumpang` (`id_penumpang`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `t_transaksi_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `t_travel` (`id_travel`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
