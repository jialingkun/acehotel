-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 01:39 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acehotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('admin1', 'd01393436e02c4c5078bd5d4a9808182'),
('admin2', 'd01393436e02c4c5078bd5d4a9808182');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` varchar(255) NOT NULL,
  `username_owner` varchar(255) DEFAULT NULL,
  `nama_hotel` varchar(255) DEFAULT NULL,
  `alamat_hotel` varchar(255) DEFAULT NULL,
  `telepon_hotel` varchar(255) DEFAULT NULL,
  `kota_hotel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `username_owner`, `nama_hotel`, `alamat_hotel`, `telepon_hotel`, `kota_hotel`) VALUES
('119933', NULL, 'Hotel Araya dummy', '', NULL, ''),
('120003', NULL, 'Hotel Candi Agung', '', '0938409840984', '');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL,
  `ukuran_kamar` varchar(255) DEFAULT NULL,
  `fasilitas_kamar` text DEFAULT NULL,
  `harga_min_kamar` int(11) DEFAULT NULL,
  `harga_max_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nokamar`
--

CREATE TABLE `nokamar` (
  `no_kamar` varchar(255) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `lantai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `no_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `telepon_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `no_ktp_pemesan` varchar(255) DEFAULT NULL,
  `tanggal_check_in` date DEFAULT NULL,
  `tanggal_check_out` date DEFAULT NULL,
  `tanggal_check_in_real` date DEFAULT NULL,
  `tanggal_check_out_real` date DEFAULT NULL,
  `jumlah_guest` int(11) DEFAULT NULL,
  `jumlah_room` int(11) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `nama_hotel` varchar(255) DEFAULT NULL,
  `alamat_hotel` varchar(255) DEFAULT NULL,
  `telepon_hotel` varchar(255) DEFAULT NULL,
  `request_jam_check_in_awal` time DEFAULT NULL,
  `request_jam_check_in_akhir` time DEFAULT NULL,
  `request_breakfast` tinyint(1) DEFAULT NULL,
  `request_rent_car` tinyint(1) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tanggal_order` date DEFAULT NULL,
  `sumber_order` varchar(255) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `username_owner` varchar(255) NOT NULL,
  `password_owner` varchar(255) DEFAULT NULL,
  `nama_owner` varchar(255) DEFAULT NULL,
  `telepon_owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`username_owner`, `password_owner`, `nama_owner`, `telepon_owner`) VALUES
('agung001', 'd01393436e02c4c5078bd5d4a9808182', 'Agung Setiawan', '08123456789'),
('andreas002', 'd01393436e02c4c5078bd5d4a9808182', 'Andreas KS', '081234567899'),
('asd', '7815696ecbf1c96e6894b779456d330e', 'asdfgh', '3467854465');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `username_receptionist` varchar(255) NOT NULL,
  `password_receptionist` varchar(255) DEFAULT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nama_receptionist` varchar(255) DEFAULT NULL,
  `telepon_receptionist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `hotel_ibfk_1` (`username_owner`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kamar_ibfk_1` (`id_hotel`);

--
-- Indexes for table `nokamar`
--
ALTER TABLE `nokamar`
  ADD PRIMARY KEY (`no_kamar`,`id_kamar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`username_owner`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`username_receptionist`),
  ADD KEY `receptionist_ibfk_1` (`id_hotel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`username_owner`) REFERENCES `owner` (`username_owner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nokamar`
--
ALTER TABLE `nokamar`
  ADD CONSTRAINT `nokamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
