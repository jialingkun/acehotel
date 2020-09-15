-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2020 at 03:22 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `id_log` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `error_log`
--

INSERT INTO `error_log` (`id_log`, `value`) VALUES
('2020-09-08 16:21:25', 'test'),
('2020-09-08 16:21:39', 'test2'),
('2020-09-08 16:21:39', 'test3');

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
('119933', NULL, 'Hotel Araya dummy', '', NULL),
('120003', NULL, 'Hotel Candi Agung', '', NULL);

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
('270301', '120003', 'Standar Room', 2);

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
(1, '270301', '201'),
(2, '270169', '102'),
(2, '270301', '202'),
(3, '270169', '101F'),
(3, '270301', '111'),
(4, '270169', '4');

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
  `comments` text,
  `tanggal_order` datetime DEFAULT NULL,
  `sumber_order` varchar(255) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL,
  `invoice` text,
  `tanggal_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_hotel`, `id_kamar`, `no_kamar`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `tanggal_check_in`, `tanggal_check_out`, `tanggal_check_in_real`, `tanggal_check_out_real`, `jumlah_guest`, `jumlah_room`, `request_jam_tiba`, `total_harga`, `comments`, `tanggal_order`, `sumber_order`, `status_order`, `invoice`, `tanggal_modified`) VALUES
(19815071, '119933', '270169', '3', 'Yoko Yoko', '029832093 082323892389', 'bekkostudio@gmail.com', '2020-09-14', '2020-09-15', '2020-09-12', '2020-09-12', 2, 1, 'tengah malam', 100000, 'bawa anjing', '2020-09-11 12:06:02', 'direct', 'completed', '[{\"invoiceId\":\"29362336\",\"description\":\"Double Bed Monday, 14 September, 2020 - Tuesday, 15 September, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":\"100000.00\",\"vatRate\":\"0.00\",\"type\":\"1\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-12 12:35:19'),
(19815072, '119933', '270169', '2', 'Yoko Yoko', '029832093 082323892389', 'bekkostudio@gmail.com', '2020-09-14', '2020-09-15', '2020-09-12', NULL, 1, 1, 'tengah malam', 210000, '', '2020-09-11 12:06:02', 'direct', 'inhouse', '[{\"invoiceId\":\"29362337\",\"description\":\"Double Bed Monday, 14 September, 2020 - Tuesday, 15 September, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":\"100000.00\",\"vatRate\":\"0.00\",\"type\":\"1\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29362338\",\"description\":\"Request Breakfast Rp50,000.00 per person daily\",\"status\":\"\",\"qty\":\"1\",\"price\":\"50000.00\",\"vatRate\":\"0.00\",\"type\":\"4\",\"type2\":\"1\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29362339\",\"description\":\"Rent Car Rp60,000.00\",\"status\":\"\",\"qty\":\"1\",\"price\":\"60000.00\",\"vatRate\":\"0.00\",\"type\":\"4\",\"type2\":\"2\",\"invoiceeId\":\"\"}]', '2020-09-12 12:33:20'),
(19815156, '119933', '270169', NULL, 'Yoko Yoko', '029832093 082323892389', 'bekkostudio@gmail.com', '2020-09-14', '2020-09-15', NULL, NULL, 1, 1, '', 100000, '', '2020-09-11 12:11:01', 'direct', 'upcoming', '[{\"invoiceId\":\"29362426\",\"description\":\"Double Bed Monday, 14 September, 2020 - Tuesday, 15 September, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":\"100000.00\",\"vatRate\":\"0.00\",\"type\":\"1\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-11 12:11:01'),
(19815157, '119933', '270169', NULL, 'Yoko Yoko', '029832093 082323892389', 'bekkostudio@gmail.com', '2020-09-14', '2020-09-15', NULL, NULL, 1, 1, '', 100000, '', '2020-09-11 12:11:01', 'direct', 'upcoming', '[{\"invoiceId\":\"29362427\",\"description\":\"Double Bed Monday, 14 September, 2020 - Tuesday, 15 September, 2020\",\"status\":\"\",\"qty\":\"1\",\"price\":\"100000.00\",\"vatRate\":\"0.00\",\"type\":\"1\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-11 12:11:01'),
(19851516, '119933', '270169', '1', 'Joe Smith', '09 87654321 +123456789', 'joe@example.com', '2020-09-17', '2020-09-19', NULL, NULL, 2, 1, 'late, very late', 100, 'Non smoking please', '2020-09-14 12:42:28', 'online', 'cancelled', '[{\"invoiceId\":\"29416087\",\"description\":\"lodging\",\"status\":\"\",\"qty\":\"1\",\"price\":\"123.45\",\"vatRate\":\"10.00\",\"type\":\"0\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-14 13:11:50'),
(19851869, '119933', '270169', NULL, 'Joe Smith', '09 87654321 +123456789', 'joe@example.com', '2020-09-17', '2020-09-19', NULL, NULL, 2, 1, 'late, very late', 100, 'Non smoking please', '2020-09-14 13:11:37', 'receptionist', 'upcoming', '[{\"invoiceId\":\"29416713\",\"description\":\"lodging\",\"status\":\"\",\"qty\":\"1\",\"price\":\"123.45\",\"vatRate\":\"10.00\",\"type\":\"0\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-14 13:11:37'),
(19852965, '119933', '270169', NULL, 'Joe Smith', '09 87654321 +123456789', 'joe@example.com', '2020-09-16', '2020-09-18', NULL, NULL, 2, 1, 'late, very late', 5000, 'Non smoking please', '2020-09-14 14:09:17', 'receptionist', 'upcoming', '[{\"invoiceId\":\"29418021\",\"description\":\"lodging\",\"status\":\"\",\"qty\":\"1\",\"price\":\"5000.00\",\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-14 14:09:17'),
(19853436, '119933', '270169', '2', 'Postman update The second', '439584053 03984203', 'joe@example.com', '2020-09-15', '2020-09-16', '2020-09-15', '2020-09-15', 2, 1, 'Telat', 370000, 'Yang bersih ya', '2020-09-14 14:30:21', 'Postman', 'completed', '[{\"invoiceId\":\"29430416\",\"description\":\"Booking\",\"status\":\"\",\"qty\":\"1\",\"price\":\"170000.00\",\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29430417\",\"description\":\"Rent Car\",\"status\":\"\",\"qty\":\"1\",\"price\":\"200000.00\",\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-15 08:25:59'),
(19853494, '119933', '270169', '2', 'Postman The man', '439584053 03984203', 'joe@example.com', '2020-09-15', '2020-09-16', '2020-09-15', NULL, 2, 1, 'Telat', 299999, 'Yang bersih ya', '2020-09-14 14:32:51', 'Postman', 'inhouse', '[{\"invoiceId\":\"29418794\",\"description\":\"Booking\",\"status\":\"\",\"qty\":\"1\",\"price\":\"199999.00\",\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"},{\"invoiceId\":\"29418795\",\"description\":\"Breakfast 2 orang\",\"status\":\"\",\"qty\":\"1\",\"price\":\"100000.00\",\"vatRate\":\"0.00\",\"type\":\"7\",\"type2\":\"0\",\"invoiceeId\":\"\"}]', '2020-09-15 08:28:22');

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19853495;

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
