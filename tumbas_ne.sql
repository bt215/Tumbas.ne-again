-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 01:23 AM
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
('3628', 'Marsha', 'janice_marsha_27rpl@student.smktekom-mlg.sch.id', '085790291176', 'marsha', '1d1754a54519ceb89e95b4ee11efac51', '3628-20190930.jpeg', '2019-09-30 15:54:24', '2019-09-30 15:54:24'),
('3913', 'Kevin', 'michael_kevin_27rpl@student.smktekom-mlg.sch.id', '085790291176', 'kev', '3b812175a3bbca97b079857d20ee12f1', '3913-20190926.jpeg', '2019-09-26 03:38:56', '2019-09-25 17:03:08'),
('9976', 'Sabina', 'sabina_okta_27rpl@student.smktekom-mlg.sch.id', '0857941654879', 'sabina', 'eb3eeacd08783aec919e447f3b4e2499', '9976-20190930.jpeg', '2019-09-30 15:54:49', '2019-09-30 15:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_pesan` varchar(300) NOT NULL,
  `id_kantin` int(100) NOT NULL,
  `id_pembeli` varchar(100) NOT NULL,
  `id_menu` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL,
  `total_harga` int(100) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_pesan`, `id_kantin`, `id_pembeli`, `id_menu`, `jumlah`, `harga`, `total_harga`, `tanggal_beli`, `created_at`, `updated_at`) VALUES
('926695', 2, '4042', '3213', 3, 5500, 16500, '2019-10-07', '2019-10-06 22:47:34', '2019-10-06 22:47:34'),
('926695', 1, '4042', '3447', 5, 2000, 10000, '2019-10-07', '2019-10-06 22:47:34', '2019-10-06 22:47:34'),
('815193', 2, '4042', '7810', 1000, 10000, 10000000, '2019-11-15', '2019-11-14 17:23:17', '2019-11-14 17:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id_kantin` int(100) NOT NULL,
  `id_penjual` varchar(100) NOT NULL,
  `nama_kantin` varchar(200) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `saldo` double NOT NULL,
  `image_penjual` varchar(100) NOT NULL,
  `image_kantin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`id_kantin`, `id_penjual`, `nama_kantin`, `nama_penjual`, `no_telp`, `saldo`, `image_penjual`, `image_kantin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, '7832', 'Kantin 1', 'Kevin', '085790291176', 130100, '7832-20190926.jpeg', '1-20191003.jpeg', '1', '40f5888b67c748df7efba008e7c2f9d2', '2019-10-07 05:47:34', '2019-10-06 22:47:34'),
(2, '8636', 'Kantin 2', 'Derik', '08755', 10022000, '8636-20191002.jpeg', '2-20191003.jpeg', '2', '1102774157837fdba32b0df0811ab9ea', '2019-11-15 00:23:17', '2019-11-14 17:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(100) NOT NULL,
  `id_kantin` int(100) NOT NULL,
  `nama_menu` varchar(300) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` double NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kantin`, `nama_menu`, `deskripsi`, `harga`, `image`, `created_at`, `updated_at`) VALUES
('1291', 1, 'Roti', 'roti enak', 3000, '1291-20191002.jpeg', '2019-10-01 20:49:12', '2019-10-01 20:49:12'),
('3213', 2, 'Mie Goreng', 'mie enak', 5500, '3213-20191002.jpeg', '2019-10-01 21:01:44', '2019-10-01 21:01:44'),
('3447', 1, 'Kopi', 'kopi enak', 2000, '3447-20190930.jpeg', '2019-09-29 18:50:50', '2019-09-29 18:50:50'),
('7810', 2, 'Geprek Sapi', 'mantap', 10000, '7810-20191007.jpeg', '2019-10-06 23:07:47', '2019-10-06 23:07:47');

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
  `saldo` double DEFAULT NULL,
  `image` varchar(300) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `kelas`, `email`, `no_telp`, `saldo`, `image`, `username`, `password`, `created_at`, `updated_at`) VALUES
('188', 'Marsha', '11 RPL 4', 'janice_marsha_27rpl@student.smktekom-mlg.sch.id', '085790291176', 3000, '188-20191002.jpeg', 'ahsram', '827ccb0eea8a706c4c34a16891f84e7b', '2019-10-07 03:06:04', '2019-10-06 20:06:04'),
('4042', 'Michael Kevin Adinata', '11 RPL 4', 'michael_kevin_27rpl@student.smktekom-mlg.sch.id', '085790291176', -9926500, '4042-20191007.jpeg', 'kev', '3b812175a3bbca97b079857d20ee12f1', '2019-11-15 00:23:17', '2019-11-14 17:23:17');

--
-- Triggers `pembeli`
--
DELIMITER $$
CREATE TRIGGER `change_pass` BEFORE INSERT ON `pembeli` FOR EACH ROW SET new.password = md5(new.password)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(100) NOT NULL,
  `id_pembeli` varchar(200) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pembeli`, `tanggal_beli`, `created_at`, `updated_at`) VALUES
('2239369', '188', '2019-10-07', '2019-10-06 20:06:04', '2019-10-06 20:06:04'),
('415999', '188', '2019-10-06', '2019-10-05 17:39:03', '2019-10-05 17:39:03'),
('521244', '188', '2019-10-07', '2019-10-06 20:04:58', '2019-10-06 20:04:58'),
('5394249', '188', '2019-10-05', '2019-10-05 07:16:21', '2019-10-05 07:16:21'),
('5621356', '188', '2019-10-05', '2019-10-05 08:29:43', '2019-10-05 08:29:43'),
('57152', '188', '2019-10-04', '2019-10-03 17:11:11', '2019-10-03 17:11:11'),
('7614035', '188', '2019-10-05', '2019-10-05 07:17:06', '2019-10-05 07:17:06'),
('8018768', '188', '2019-10-04', '2019-10-03 17:36:14', '2019-10-03 17:36:14'),
('815193', '4042', '2019-11-15', '2019-11-14 17:23:17', '2019-11-14 17:23:17'),
('9149587', '188', '2019-10-06', '2019-10-05 17:38:34', '2019-10-05 17:38:34'),
('926695', '4042', '2019-10-07', '2019-10-06 22:47:33', '2019-10-06 22:47:33');

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
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_kantin` (`id_kantin`),
  ADD KEY `id_pembeli` (`id_pembeli`);

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
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kantin`
--
ALTER TABLE `kantin`
  MODIFY `id_kantin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD CONSTRAINT `detail_pesan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesan_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesan_ibfk_3` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesan_ibfk_4` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
