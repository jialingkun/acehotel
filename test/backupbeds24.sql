-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2021 at 05:48 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u8521482_manajemen_acehotel`
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
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `id_log` datetime NOT NULL DEFAULT current_timestamp(),
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `error_log`
--

INSERT INTO `error_log` (`id_log`, `value`) VALUES
('2020-09-28 15:50:05', 'webhookBooking: 20041946| Property: 119933'),
('2020-09-30 21:32:05', 'webhookBooking: 20067998| Property: 121758'),
('2020-10-07 13:47:05', 'webhookBooking: 20067998| Property: 121758'),
('2020-10-07 13:47:05', 'webhookBooking: 20041946| Property: 119933'),
('2020-10-07 13:47:05', 'webhookBooking: 20067915| Property: 121758');

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
('119933', 'testowner', 'Hotel Araya dummy', 'JL melatu 9839', '098450954'),
('121758', NULL, 'ACE Business Hotel', 'Galaxi Bumi permai Blok I-1 16A', NULL),
('122191', 'Ratna', 'Hotel Citra', 'Jl Bunga bunga no 13', '09102910923');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(255) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `nama_kamar` varchar(255) DEFAULT NULL,
  `max_guest` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `nama_kamar`, `max_guest`) VALUES
('270169', '119933', 'Double Bed', 3),
('273763', '121758', 'Standar', 2),
('273764', '121758', 'Deluxe', 2),
('274529', '122191', 'Standar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nokamar`
--

CREATE TABLE `nokamar` (
  `no_kamar` int(11) NOT NULL,
  `id_kamar` varchar(255) NOT NULL,
  `nama_no_kamar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nokamar`
--

INSERT INTO `nokamar` (`no_kamar`, `id_kamar`, `nama_no_kamar`) VALUES
(1, '270169', '101'),
(1, '273763', '101'),
(1, '273764', '201'),
(1, '274529', '101'),
(2, '273763', '102'),
(2, '273764', '301'),
(2, '274529', '102'),
(3, '274529', '201'),
(4, '274529', '202');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_hotel` varchar(255) DEFAULT NULL,
  `id_kamar` varchar(255) DEFAULT NULL,
  `no_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `telepon_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `tanggal_check_in` date DEFAULT NULL,
  `tanggal_check_out` date DEFAULT NULL,
  `tanggal_check_in_real` date DEFAULT NULL,
  `tanggal_check_out_real` date DEFAULT NULL,
  `jumlah_guest` int(11) DEFAULT NULL,
  `jumlah_room` int(11) DEFAULT NULL,
  `request_jam_tiba` varchar(255) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `sumber_order` varchar(255) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL,
  `invoice` text DEFAULT NULL,
  `tanggal_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_hotel`, `id_kamar`, `no_kamar`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `tanggal_check_in`, `tanggal_check_out`, `tanggal_check_in_real`, `tanggal_check_out_real`, `jumlah_guest`, `jumlah_room`, `request_jam_tiba`, `total_harga`, `comments`, `tanggal_order`, `sumber_order`, `status_order`, `invoice`, `tanggal_modified`) VALUES
(20031868, '119933', '270169', '3', 'Recep,Test', '22222,11111', 'receptest@gamil.com', '2020-09-28', '2020-09-30', '2020-09-27', '2020-09-27', 1, 1, '09:12', 1150000, 'tidak req', '2020-09-27 02:13:27', 'traveloka', 'completed', '[{\"invoiceId\":\"29656009\",\"description\":\"tidak info\",\"status\":\"\",\"qty\":\"1\",\"price\":500000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29656010\",\"description\":\"Request Breakfast Rp50,000.00 per person daily\",\"status\":\"\",\"qty\":\"1\",\"price\":50000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29656011\",\"description\":\"Rent Car innova\",\"status\":\"\",\"qty\":\"1\",\"price\":600000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-27 02:17:03'),
(20041545, '119933', '270169', '1', 'Benny,Hartono', '09138019238,092809348', 'bekkostudio@gmail.com', '2020-09-29', '2020-09-30', '2020-09-28', '2020-09-28', 2, 1, 'Jam 1', 255000, 'No smoking', '2020-09-28 08:09:42', 'Benny', 'completed', '[{\"invoiceId\":\"29675132\",\"description\":\"Booking\",\"status\":\"\",\"qty\":\"1\",\"price\":55000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29675133\",\"description\":\"Rent Car\",\"status\":\"\",\"qty\":\"1\",\"price\":100000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29675134\",\"description\":\"Breakfast\",\"status\":\"\",\"qty\":\"1\",\"price\":100000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-28 08:42:38'),
(20041946, '119933', '270169', '1', 'Benny,Hartono', '029832093,082323892389', 'bekkostudio@gmail.com', '2020-10-06', '2020-10-07', '2020-09-28', NULL, 3, 1, 'Telat', 310000, NULL, '2020-09-28 08:49:45', 'direct', 'cancelled', '[{\"invoiceId\":\"29676413\",\"description\":\"Double Bed Monday,  5 October, 2020 - Tuesday,  6 October, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":100000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29676414\",\"description\":\"Request Breakfast Rp50,000.00 per person daily\",\"status\":\"\",\"qty\":\"1\",\"price\":150000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29676415\",\"description\":\"Rent Car Rp60,000.00\",\"status\":\"\",\"qty\":\"1\",\"price\":60000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-10-07 06:46:36'),
(20067915, '121758', '273763', NULL, 'Benny,Hartono', '0823316019,08231602198', 'Bekko@gmail.com', '2020-10-08', '2020-10-09', '2020-09-30', '2020-09-30', 2, 1, 'Telat', 400000, 'No smoking', '2020-09-30 14:27:40', 'direct', 'cancelled', '[{\"invoiceId\":\"29731959\",\"description\":\"Standar Thursday,  8 October, 2020 - Friday,  9 October, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":250000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29731960\",\"description\":\"Request Breakfast\",\"status\":\"\",\"qty\":\"1\",\"price\":100000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29731961\",\"description\":\"Rent Car\",\"status\":\"\",\"qty\":\"1\",\"price\":50000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-10-07 06:46:56'),
(20067998, '121758', '273763', '2', 'Benny,Hartono', ',08231602198', 'Bekko@gmail.com', '2020-10-08', '2020-10-09', NULL, NULL, 2, 1, 'Secepatnya', 250000, 'BAwa barang berat', '2020-09-30 14:31:26', 'direct', 'cancelled', '[{\"invoiceId\":\"29731845\",\"description\":\"Standar Thursday,  8 October, 2020 - Friday,  9 October, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":250000,\"vatRate\":\"0.00\",\"type\":\"1\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-10-07 06:46:50'),
(20187476, '122191', '274529', '1', 'Andre,Hartono', '-,08123412341', 'andrehart@gmail.com', '2020-10-12', '2020-10-13', '2020-10-14', '2020-10-14', 1, 1, '10:00', 200000, '-', '2020-10-11 05:48:42', 'Traveloka', 'completed', '[{\"invoiceId\":\"29966293\",\"description\":\"Double Bed\",\"status\":\"\",\"qty\":\"1\",\"price\":150000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29966294\",\"description\":\"Breakfast\",\"status\":\"\",\"qty\":\"1\",\"price\":50000,\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-10-14 06:45:41');

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
('agung001', 'd01393436e02c4c5078bd5d4a9808182', 'Agung Setiawan', '081234567891'),
('andreas002', 'd01393436e02c4c5078bd5d4a9808182', 'Andreas KS', '081234567899'),
('Ratna', 'd01393436e02c4c5078bd5d4a9808182', 'Ratna Sari', '082319313193913'),
('testowner', 'd01393436e02c4c5078bd5d4a9808182', 'test', '09384092384');

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
('citrarcp', 'd01393436e02c4c5078bd5d4a9808182', '122191', 'Sari', '098394839483948'),
('testrecept', 'd01393436e02c4c5078bd5d4a9808182', '119933', 'araya receptionist', '03409238049');

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20187477;

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
