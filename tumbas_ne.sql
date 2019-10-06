-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 02:58 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tumbas.ne`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(100) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `no_telp`, `username`, `password`, `image`, `created_at`, `updated_at`) VALUES
('1', 'Kevin', 'michael_kevin_27rpl@student.smktekom-mlg.sch.id', '085790291179', '1', '28c8edde3d61a0411511d3b1866f0636', '1-1569037151.jpeg', '2019-09-21 04:00:45', '2019-09-20 21:00:45'),
('2', 'Marsha', 'janice_marsha_27rpl@student.smktekom-mlg.sch.id', '085790291176', '2', '4a9bd19b3b8676199592a346051f950c', '2-1569037324.jpeg', '2019-09-21 03:42:04', '2019-09-20 20:42:04'),
('3', 'Derik', 'derik_dwi_27rpl@student.smktekom-mlg.sch.id', '05855465465', '3', '38026ed22fc1a91d92b5d2ef93540f20', '3-1569043987.jpeg', '2019-09-23 00:26:22', '2019-09-22 17:26:22'),
('4', 'Sabina', 'sabina_okta_27rpl@student.smktekom-mlg.sch.id', '09876546', '4', '011ecee7d295c066ae68d4396215c3d0', '4-1569044243.jpeg', '2019-09-21 05:37:23', '2019-09-20 22:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_pesan` varchar(300) NOT NULL,
  `id_menu` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL,
  `pesan_teks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id_kantin` varchar(100) NOT NULL,
  `nama_kantin` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `saldo` double NOT NULL,
  `image` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`id_kantin`, `nama_kantin`, `no_telp`, `saldo`, `image`, `username`, `password`, `created_at`, `updated_at`) VALUES
('1', 'Kantin 1', '0857941654879', 10000, '1-1569075669.jpeg', '1', '28c8edde3d61a0411511d3b1866f0636', '2019-09-23 00:26:36', '2019-09-22 17:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(100) NOT NULL,
  `id_kantin` varchar(100) NOT NULL,
  `nama_menu` varchar(300) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` double NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `saldo` double NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(100) NOT NULL,
  `id_kantin` varchar(300) NOT NULL,
  `id_pembeli` varchar(200) NOT NULL,
  `tanggal_beli` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD KEY `id_pesan` (`id_pesan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `kantin`
--
ALTER TABLE `kantin`
  ADD PRIMARY KEY (`id_kantin`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kantin` (`id_kantin`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pe` (`id_kantin`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD CONSTRAINT `detail_pesan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `detail_pesan_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`);

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `dashboard` (`id_pembeli`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
