-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 09:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `telepon_hotel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `username_owner`, `nama_hotel`, `alamat_hotel`, `telepon_hotel`) VALUES
('araya001', 'agung001', 'Hotel Araya', 'Jl araya no 3', '08123456789'),
('araya002', 'agung001', 'Hotel Citra Araya', 'Jl araya no 99F', '088459345775'),
('melati001', 'andreas002', 'Melati utara Guest House', 'Jl Melati utara no 9', '043835948598');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(255) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `nama_kamar`, `jumlah_kamar`, `max_guest`) VALUES
('araya001_001', 'araya001', 'Double Bed standar', 10, 2),
('araya001_002', 'araya001', 'Double Bed Premium', 3, 2),
('araya002_001', 'araya002', 'Double Bed', 5, 2),
('araya002_002', 'araya002', 'Family Room', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `id_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `telepon_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `no_ktp_pemesan` varchar(255) DEFAULT NULL,
  `tanggal_check_in` date DEFAULT NULL,
  `tanggal_check_out` date DEFAULT NULL,
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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_hotel`, `id_kamar`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `no_ktp_pemesan`, `tanggal_check_in`, `tanggal_check_out`, `jumlah_guest`, `jumlah_room`, `max_guest`, `nama_kamar`, `nama_hotel`, `alamat_hotel`, `telepon_hotel`, `request_jam_check_in_awal`, `request_jam_check_in_akhir`, `request_breakfast`, `request_rent_car`, `total_harga`, `tanggal_order`, `sumber_order`, `status_order`) VALUES
(1, 'araya001', 'araya001_001', 'Benny Hartono', '09834092834', 'email@gmail.com', '923748503450345', '2019-11-14', '2019-11-17', 2, 1, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 199999, '2019-11-12', 'OYO', 'upcoming'),
(2, 'araya001', 'araya001_001', 'Yoko', NULL, NULL, NULL, '2019-11-15', '2019-11-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upcoming');

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
('andreas002', 'd01393436e02c4c5078bd5d4a9808182', 'Andreas KS', '081234567899');

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
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`username_receptionist`, `password_receptionist`, `id_hotel`, `nama_receptionist`, `telepon_receptionist`) VALUES
('araya001', 'd01393436e02c4c5078bd5d4a9808182', 'araya001', 'Resepsionis araya', '0878345934855'),
('citra002', 'd01393436e02c4c5078bd5d4a9808182', 'araya002', 'Bunga Citra Lestari', '0485034580348'),
('melati001', 'd01393436e02c4c5078bd5d4a9808182', 'melati001', 'Resepsionis Melati', '0385093458034');

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
