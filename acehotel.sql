-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 10:46 AM
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
  `telepon_hotel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `username_owner`, `nama_hotel`, `alamat_hotel`, `telepon_hotel`) VALUES
('araya001', 'agung001', 'Hotel Araya', 'Jl araya no 3', '08123456789'),
('araya002', 'agung001', 'Hotel Citra Araya', 'Jl araya no 99F', '088459345775'),
('qwe123', 'asd', 'sdgrfg fgv', 'rfgdf ffgc', '1245678754'),
('test20jul', 'agung001', 'Hotel Test July', 'Melati no 7', '082331602198');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `nama_kamar`, `max_guest`) VALUES
(1, 'araya001', 'Double Bed standar', 2),
(2, 'araya001', 'Double Bed Premium', 2),
(3, 'araya002', 'Double Bed', 2),
(4, 'araya002', 'Family Room', 4),
(5, 'araya001', 'KingSize', 3),
(6, 'qwe123', 'King size', 2),
(8, 'test20jul', 'Double Bed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nokamar`
--

CREATE TABLE `nokamar` (
  `no_kamar` varchar(255) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `lantai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nokamar`
--

INSERT INTO `nokamar` (`no_kamar`, `id_kamar`, `lantai`) VALUES
('101', 1, '1D'),
('101', 2, '1'),
('102', 1, '1F'),
('102', 3, '1'),
('103', 1, '1F'),
('103', 4, '1'),
('104', 1, '2'),
('105', 1, '2'),
('106', 1, '2'),
('107', 1, '2'),
('201', 2, '2F'),
('202', 2, '2F'),
('203', 2, '2F');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_hotel`, `id_kamar`, `no_kamar`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `no_ktp_pemesan`, `tanggal_check_in`, `tanggal_check_out`, `tanggal_check_in_real`, `tanggal_check_out_real`, `jumlah_guest`, `jumlah_room`, `max_guest`, `nama_kamar`, `nama_hotel`, `alamat_hotel`, `telepon_hotel`, `request_jam_check_in_awal`, `request_jam_check_in_akhir`, `request_breakfast`, `request_rent_car`, `total_harga`, `tanggal_order`, `sumber_order`, `status_order`) VALUES
(1, 'araya001', 1, '105,106', 'Benny Hartono', '09834092834', 'email@gmail.com', '923748503450345', '2020-02-03', '2020-02-05', '2020-02-03', '2020-02-04', 2, 2, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 180000, '2020-02-02', 'OYO', 'completed'),
(2, 'araya001', 1, '103', 'Yoko', '0749853948545', 'email@gmail.com', '40953045803450345', '2020-02-04', '2020-02-05', '2020-02-04', '2020-02-05', 1, 1, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 120000, '2020-02-03', 'TRAVELOKA', 'completed'),
(3, 'araya001', 1, '101', 'Andreas', '093459845934', 'email@gmail.com', '9385798357954', '2020-02-05', '2020-02-08', '2020-02-05', NULL, 2, 1, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 100000, '2020-02-04', 'OTHER', 'inhouse'),
(4, 'araya001', 1, '101,102', 'Benny Hartono', '09834092834', 'email@gmail.com', '923748503450345', '2020-02-03', '2020-02-04', '2020-02-03', '2020-02-04', 2, 2, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 180000, '2020-02-02', 'OYO', 'completed'),
(5, 'araya001', 1, '104', 'Yoko', '0749853948545', 'email@gmail.com', '40953045803450345', '2020-02-04', '2020-02-06', '2020-02-04', '2020-02-06', 1, 1, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 120000, '2020-02-03', 'TRAVELOKA', 'completed'),
(6, 'araya001', 1, '102', 'Andreas', '093459845934', 'email@gmail.com', '9385798357954', '2020-02-06', '2020-02-08', '2020-02-06', NULL, 2, 1, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 100000, '2020-02-05', 'OTHER', 'inhouse'),
(7, 'araya001', 1, '103,104', 'Benny Hartono', '09834092834', 'email@gmail.com', '923748503450345', '2020-02-06', '2020-02-08', '2020-02-06', NULL, 2, 2, 2, 'double Bed standar', 'Hotel Araya', 'Jl Araya no 3', '08984759834759', NULL, NULL, NULL, NULL, 180000, '2020-02-05', 'OYO', 'inhouse'),
(8, 'araya001', 1, '105', 'Yoko', '0749853948545', 'email@gmail.com', '40953045803450345', '2020-02-07', '2020-02-08', NULL, NULL, 1, 1, 2, 'Double Bed standar', 'Hotel Araya', 'Jl araya no 3', '08123456789', NULL, NULL, NULL, NULL, 120000, '2020-02-03', 'bookingcom', 'upcoming'),
(9, 'araya001', 5, NULL, 'Andre', '087857419412', 'bekkostudio@gmail.com', '3518361925191', '2020-02-09', '2020-02-03', NULL, NULL, 4, 2, 3, 'KingSize', 'Hotel Araya', 'Jl araya no 3', '08123456789', NULL, NULL, NULL, NULL, 5000000, '2020-02-08', 'bookingcom', 'upcoming'),
(10, 'araya001', 1, '103', 'vfcfbt', '08589559885855', 'ddfx@grgr.com', '56775433467678546', '2020-02-12', '2020-02-13', '2020-02-11', '2020-02-11', 2, 1, 2, 'Double Bed standar', 'Hotel Araya', 'Jl araya no 3', '08123456789', '14:30:00', '15:33:00', NULL, NULL, 300000, '2020-02-11', 'oyo', 'completed'),
(11, 'araya001', 1, NULL, 'Benny', '08623232656', 'benny@yaho.com', '84859696968585', '2020-07-20', '2020-07-21', NULL, NULL, 2, 1, 2, 'Double Bed standar', 'Hotel Araya', 'Jl araya no 3', '08123456789', NULL, NULL, NULL, NULL, 10000, '2020-07-20', 'tiketcom', 'upcoming');

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
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`username_receptionist`, `password_receptionist`, `id_hotel`, `nama_receptionist`, `telepon_receptionist`) VALUES
('araya001', 'd01393436e02c4c5078bd5d4a9808182', 'araya001', 'Bunga Melati', '081234567898'),
('citra002', 'd01393436e02c4c5078bd5d4a9808182', 'araya002', 'Bunga Citra Lestari', '0485034580348');

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
