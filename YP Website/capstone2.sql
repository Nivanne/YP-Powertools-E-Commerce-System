-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 10:41 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `RegisteredDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `email`, `password`, `profile_pic`, `RegisteredDate`) VALUES
(1, 'Randy', 'randyteraytay@gmail.com', '$2y$10$RQbwtHGNOR9tKylvko2o9u/pND49UKS2lVsDM9ivYgMGJUPb4Dbmu', 'admin.png', '2018-04-12 23:14:59'),
(2, 'Mike', 'mikecapillas@gmail.com', '$2y$10$SouI9cJJwvlo6xYq0eIolOmECH.f/IamdCdWjr5hcrF84oXSw.bhW', 'admin.png', '2018-04-12 23:32:32'),
(3, 'Sidney', 'sidneysantos@gmail.com', '$2y$10$ohLHN86WYXI.je4xX5082O2AkB6jy/u5XJA5incg0B8LoY2AMiK6q', 'admin.png', '2018-04-13 00:43:59'),
(4, 'Matthew', 'Skydeloverges@gmail.com', '$2y$10$uAX7lnDVnLdmcAWFOlApNuMc.6eIoU/HPnERMoQ2wb/O04pTU08Bu', 'admin.png', '2018-04-13 00:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `admintimelog`
--

CREATE TABLE `admintimelog` (
  `LoginID` int(11) NOT NULL,
  `Admin_name` varchar(256) NOT NULL,
  `Admin_email` varchar(256) NOT NULL,
  `LoginDay` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintimelog`
--

INSERT INTO `admintimelog` (`LoginID`, `Admin_name`, `Admin_email`, `LoginDay`) VALUES
(1, 'Admin', 'sampleadmin@gmail.com', '2018-03-26 01:04:55'),
(2, 'sampleadmin', 'admin@gmail.com', '2018-03-26 01:05:41'),
(3, 'Admin', 'sampleadmin@gmail.com', '2018-03-26 01:10:30'),
(4, 'sampleadmin', 'admin@gmail.com', '2018-03-26 07:54:52'),
(5, 'Admin', 'sampleadmin@gmail.com', '2018-03-26 08:12:26'),
(6, 'Admin', 'sampleadmin@gmail.com', '2018-03-26 09:03:53'),
(7, 'Admin', 'sampleadmin@gmail.com', '2018-04-01 13:09:17'),
(8, 'Admin', 'sampleadmin@gmail.com', '2018-04-04 08:02:42'),
(9, 'Admin', 'sampleadmin@gmail.com', '2018-04-04 08:03:58'),
(10, 'Admin', 'sampleadmin@gmail.com', '2018-04-06 02:49:33'),
(11, 'Admin', 'sampleadmin@gmail.com', '2018-04-09 13:35:02'),
(12, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-09 14:27:12'),
(13, 'Matthew', 'Skydeloverges@gmail.com', '2018-04-13 00:47:05'),
(14, 'Matthew', 'Skydeloverges@gmail.com', '2018-04-13 00:47:11'),
(15, 'Sidney', 'sidneysantos@gmail.com', '2018-04-13 00:47:24'),
(16, 'Matthew', 'Skydeloverges@gmail.com', '2018-04-13 04:39:29'),
(17, 'Sidney', 'sidneysantos@gmail.com', '2018-04-10 12:46:02'),
(18, 'Sidney', 'sidneysantos@gmail.com', '2018-04-13 13:15:59'),
(19, 'Matthew', 'Skydeloverges@gmail.com', '2018-04-13 20:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `Total` int(11) NOT NULL,
  `checkout_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_name`, `Total`, `checkout_date`) VALUES
(16, 'Seth', 9800, '2018-04-13 20:36:51'),
(17, 'Airam', 18000, '2018-04-13 20:43:24'),
(18, 'Aaries', 11600, '2018-04-13 21:08:29'),
(19, 'Lance', 16850, '2018-04-13 21:31:05'),
(20, 'Lance', 9285, '2018-04-13 23:23:01'),
(21, 'Lance', 1800, '2018-04-13 23:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'SuperAdmin', 'superadmin@gmail.com', '$2y$10$vfoEzN1lDaObOmoS5/IWoeHLg5hsYpU5x84tp8tkuuRGp3Xz0olNe', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `product_name`, `product_type`, `product_description`, `product_price`, `product_image`, `availability`) VALUES
(1, 'Angle Grinder', 'none', 'Angle Grinder Stand', 1800, 'ProductImages/AngleGrinder.jpg', 'Available'),
(2, 'Asaki - Table Vice', 'Welding Machines', 'Description', 2950, 'ProductImages/TableVice.jpg', 'Available'),
(3, 'Finish Sander HT-FS 18702', 'Air Compressors', 'Finish Sander Description', 2100, 'ProductImages/FinishSander.jpg', 'Available'),
(4, 'Fujima- Air Die Grinder XQ-TO2', 'Grinders, Planers, Polishers and Routers', 'Fujima Description	', 900, 'ProductImages/AirDieGrinder.jpg', 'Available '),
(5, 'Hoyoma Japan- Electric Blower HTEB-600', 'none', 'Electric Blower', 1450, 'ProductImages/ElectricBlower.jpg', 'Available '),
(6, 'Hoyoma Japan - Heat Gun HTHG - 2000', 'Air Compressors', 'Heat Gun', 8000, 'ProductImages/HeatGun.jpg', 'Available'),
(7, 'Hoyoma Japan - Impact Drill HT -ID650', 'Welding Machines', 'Impact Drill Description', 1400, 'ProductImages/ImpactDrill.jpg', 'Available'),
(8, 'Hoyoma Japan - Jigsaw HT - JS650', 'Welding Machines', 'Jisaw Description', 1985, 'ProductImages/Jigsaw.jpg', 'Available'),
(9, 'Makute - Router Bit Set', 'none', 'Router Bit Set Description', 2250, 'ProductImages/RouterBitSet.jpg', 'Available'),
(10, 'Makute - Trimmer TR001', 'Grinders, Planers, Polishers and Routers', 'Trimmer Description', 3000, 'ProductImages/Trimmer.jpg', 'Available'),
(11, 'Grinder Chainsaw Adaptor 11.5\" Silver', 'Grinders, Planers, Polishers and Routers', 'Can be connected to most Grinders', 1600, 'ProductImages/3.png', 'Available'),
(12, 'TOTAL Industrial Circular Saw 1400W 7 1/4in (Blue Green)', 'Power Saws', 'Adjustable Cutting depth.', 3700, 'ProductImages/5.png', 'Available'),
(13, 'Fujihama Pressure Washer 100 Bar Purple', 'Power Saws', 'Pressure Washer', 4200, 'ProductImages/9.png', 'Available'),
(14, 'HOYOMA MINI SAW MNS 600 (GREEN)', 'Power Saws', 'Voltage/Frequency : 230V~50Hz', 4000, 'ProductImages/6.png', 'Available'),
(15, 'Kawasaki Pressure Washer', 'Air Compressors', 'Pressure Washer', 4300, 'ProductImages/10.png', 'Available'),
(16, 'Extreme 5 speed Drill press', 'Drills', 'Drill', 5000, 'ProductImages/4.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_type` varchar(256) NOT NULL,
  `product_description` varchar(256) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`productID`, `product_name`, `product_type`, `product_description`, `product_price`, `product_image`) VALUES
(1, 'Angle Grinder', 'none', 'Angle Grinder Stand', 1800, 'ProductImages/AngleGrinder.jpg'),
(2, 'Asaki - Table Vice', 'Welding Machines', 'Description', 2950, 'ProductImages/TableVice.jpg'),
(3, 'Finish Sander HT-FS 18702', 'Air Compressors', 'Finish Sander Description', 2100, 'ProductImages/FinishSander.jpg'),
(4, 'Fujima-AirDieGrinder XQ-TO2', 'Grinders, Planers, Polishers', 'Fujima Description	', 900, 'ProductImages/AirDieGrinder.jpg'),
(5, 'Hoyoma Japan- Electric Blower HTEB-600', 'none', 'Electric Blower', 1450, 'ProductImages/ElectricBlower.jpg'),
(6, 'Hoyoma Japan - Heat Gun HTHG - 2000', 'Air Compressors', 'Heat Gun', 8000, 'ProductImages/HeatGun.jpg'),
(7, 'Hoyoma Japan - Impact Drill HT -ID650', 'Welding Machines', 'Impact Drill Description', 1400, 'ProductImages/ImpactDrill.jpg'),
(8, 'Hoyoma Japan - Jigsaw HT - JS650', 'Welding Machines', 'Jisaw Description', 1985, 'ProductImages/Jigsaw.jpg'),
(9, 'Makute - Router Bit Set', 'none', 'Router Bit Set Description', 2250, 'ProductImages/RouterBitSet.jpg'),
(10, 'Makute - Trimmer TR001', 'Grinders, Planers, Polishers ', 'Trimmer Description', 3000, 'ProductImages/Trimmer.jpg'),
(19, 'Grinder Chainsaw Adaptor ', 'Grinders, Planers, Polishers ', 'Can be connected to most Grinders', 1600, 'ProductImages/3.png'),
(20, 'TOTAL Industrial Circular Saw', 'Power Saws', ' 1400W 7 1/4in (Blue Green)', 3700, 'ProductImages/5.png'),
(22, 'Fujihama Pressure Washer ', 'Power Saws', '100 Bar Purple', 4200, 'ProductImages/9.png'),
(23, 'HOYOMA MINI SAW ', 'Power Saws', 'Voltage/Frequency : 230V~50Hz', 4000, 'ProductImages/6.png'),
(24, 'Kawasaki Pressure Washer', 'Air Compressors', 'Pressure Washer', 4300, 'ProductImages/10.png'),
(25, 'Extreme 5 speed Drill press', 'Drills', 'Drill', 5000, 'ProductImages/4.png');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `superadminlogin`
--

CREATE TABLE `superadminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadminlogin`
--

INSERT INTO `superadminlogin` (`id`, `name`, `email`, `password`, `role`, `profile_pic`) VALUES
(1, 'SuperAdmin', 'superadmin@gmail.com', '$2y$10$vfoEzN1lDaObOmoS5/IWoeHLg5hsYpU5x84tp8tkuuRGp3Xz0olNe', 'SuperAdmin', 'superadmin.png');

-- --------------------------------------------------------

--
-- Table structure for table `timelog`
--

CREATE TABLE `timelog` (
  `LoginID` int(11) NOT NULL,
  `User_name` varchar(256) NOT NULL,
  `User_email` varchar(256) NOT NULL,
  `LoginDay` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timelog`
--

INSERT INTO `timelog` (`LoginID`, `User_name`, `User_email`, `LoginDay`) VALUES
(1, 'Aaries', 'a@gmail.com', '2018-03-25 16:37:01'),
(2, 'NivanneCabael', 'nivanne_cabael@gmail.com', '2018-03-25 17:20:55'),
(3, 'NivanneCabael', 'nivanne_cabael@gmail.com', '2018-03-25 20:28:45'),
(4, 'Airam', 'Airam@gmail.com', '2018-03-26 00:57:42'),
(5, 'Sampleuser', 'sampleuser@gmail.com', '2018-03-26 01:00:44'),
(6, 'Aaries', 'a@gmail.com', '2018-03-26 01:01:05'),
(7, 'Aaries', 'a@gmail.com', '2018-03-26 08:07:37'),
(8, 'Aaries', 'a@gmail.com', '2018-03-26 08:30:00'),
(9, 'Aaries', 'a@gmail.com', '2018-04-01 23:03:07'),
(10, 'Aaries', 'a@gmail.com', '2018-04-02 11:57:00'),
(11, 'Aaries', 'a@gmail.com', '2018-04-02 12:16:39'),
(12, 'Aaries', 'a@gmail.com', '2018-04-04 08:04:30'),
(13, 'Aaries', 'a@gmail.com', '2018-04-04 15:58:47'),
(14, 'Sampleuser', 'sampleuser@gmail.com', '2018-04-08 23:31:09'),
(15, 'Aaries', 'a@gmail.com', '2018-04-08 23:45:46'),
(16, 'Aaries', 'a@gmail.com', '2018-04-10 15:11:03'),
(17, 'Lance', 'lancedavis@gmail.com', '2018-04-10 23:54:53'),
(18, 'Lance', 'lancedavis@gmail.com', '2018-04-11 08:22:04'),
(19, 'Lance', 'lancedavis@gmail.com', '2018-04-11 08:36:15'),
(20, 'Lance', 'lancedavis@gmail.com', '2018-04-11 08:37:15'),
(21, 'Lance', 'lancedavis@gmail.com', '2018-04-11 15:43:17'),
(22, 'Airam', 'Airam@gmail.com', '2018-04-11 15:56:42'),
(23, 'Lance', 'lancedavis@gmail.com', '2018-04-11 15:59:40'),
(24, 'Seth', 'sethhugo@gmail.com', '2018-04-11 16:06:22'),
(25, 'Lance', 'lancedavis@gmail.com', '2018-04-12 10:10:27'),
(26, 'Lance', 'lancedavis@gmail.com', '2018-04-12 10:22:21'),
(27, 'Airam', 'Airam@gmail.com', '2018-04-12 17:29:55'),
(28, 'Lance', 'lancedavis@gmail.com', '2018-04-12 17:59:04'),
(29, 'Sidney', 'sidneysantos@gmail.com', '2018-04-12 19:18:24'),
(30, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-12 21:26:11'),
(31, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-12 21:41:29'),
(32, 'Aaries', 'a@gmail.com', '2018-04-13 00:52:28'),
(33, 'Lance', 'lancedavis@gmail.com', '2018-04-13 02:18:28'),
(34, 'Aaries', 'a@gmail.com', '2018-04-13 04:38:44'),
(35, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-13 13:17:32'),
(36, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-13 14:40:43'),
(37, 'Lance', 'lancedavis@gmail.com', '2018-04-13 15:27:03'),
(38, 'Airam', 'Airam@gmail.com', '2018-04-13 15:28:08'),
(39, 'Aaries', 'a@gmail.com', '2018-04-13 15:53:22'),
(40, 'Seth', 'sethhugo@gmail.com', '2018-04-13 18:12:02'),
(41, 'Seth', 'sethhugo@gmail.com', '2018-04-13 19:23:03'),
(42, 'Seth', 'sethhugo@gmail.com', '2018-04-13 20:07:53'),
(43, 'Airam', 'Airam@gmail.com', '2018-04-13 20:42:42'),
(44, 'Aaries', 'a@gmail.com', '2018-04-13 21:02:10'),
(45, 'Aaries', 'a@gmail.com', '2018-04-13 21:08:21'),
(46, 'Aaries', 'a@gmail.com', '2018-04-13 21:20:31'),
(47, 'Lance', 'lancedavis@gmail.com', '2018-04-13 21:24:36'),
(48, 'Lance', 'lancedavis@gmail.com', '2018-04-13 23:19:35'),
(49, 'Lance', 'lancedavis@gmail.com', '2018-04-14 04:09:48'),
(50, 'Nivanne', 'nivannecabael@gmail.com', '2018-04-14 04:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `checkout_id`, `user_name`, `product_name`, `product_price`, `product_qty`) VALUES
(6, 16, 'Seth', 'Angle Grinder', 1800, 1),
(7, 16, 'Seth', 'Hoyoma Japan - Heat Gun HTHG - 2000', 8000, 1),
(8, 17, 'Airam', 'Angle Grinder', 1800, 1),
(9, 17, 'Airam', 'Fujihama Pressure Washer ', 4200, 1),
(10, 17, 'Airam', 'HOYOMA MINI SAW ', 4000, 3),
(11, 18, 'Aaries', 'Angle Grinder', 1800, 1),
(12, 18, 'Aaries', 'Angle Grinder', 1800, 1),
(13, 18, 'Aaries', 'Hoyoma Japan - Heat Gun HTHG - 2000', 8000, 1),
(14, 19, 'Lance', 'Asaki - Table Vice', 2950, 5),
(15, 19, 'Lance', 'Finish Sander HT-FS 18702', 2100, 1),
(16, 20, 'Lance', 'Asaki - Table Vice', 2950, 1),
(17, 20, 'Lance', 'Finish Sander HT-FS 18702', 2100, 1),
(18, 20, 'Lance', 'Hoyoma Japan - Jigsaw HT - JS650', 1985, 1),
(19, 20, 'Lance', 'Makute - Router Bit Set', 2250, 1),
(20, 21, 'Lance', 'Angle Grinder', 1800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userslogin`
--

CREATE TABLE `userslogin` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_image` varchar(256) NOT NULL,
  `RegisteredDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userslogin`
--

INSERT INTO `userslogin` (`id`, `name`, `email`, `password`, `user_image`, `RegisteredDate`) VALUES
(1, 'Aaries', 'a@gmail.com', '$2y$10$YfE5rsVytFknaQXFOQ/ddepGf9daMqo9P7x.oTBJ3wzc2r9EPMNES', 'sample.png', '2018-04-10 14:57:41'),
(2, 'Airam', 'Airam@gmail.com', '$2y$10$hGb1PU/z9t23WQcRkkyuv.s8cWvgoVN6WkAtVsy.IftBlggZk8oOW', 'sample.png', '2018-04-10 14:58:18'),
(3, 'Nivanne', 'nivannecabael@gmail.com', '$2y$10$fjrcByPqpM7vAe6Hp8flKOPC6Kfc.nAgaPYCHeh.twen54AQQpcrK', 'sample.png', '2018-04-10 14:58:44'),
(4, 'Lance', 'lancedavis@gmail.com', '$2y$10$2LD98m49vufFRA80JtRbjOrC0CB/G9n6mKzW3fPKLVpcQBqfoMrBK', 'sample.png', '2018-04-10 14:59:12'),
(6, 'Seth', 'sethhugo@gmail.com', '$2y$10$Lhn2t4pEKwo8fZohd5k7nesW8GPEDJRzx95cOvOokpOduJ4u3dCpu', 'sample.png', '2018-04-11 16:05:48'),
(7, 'Sidney', 'sidneysantos@gmail.com', '$2y$10$yZOhc7s6ZsTKpiYteHuSGOnmZjsLaMJLxN/JxRlJrKKUDBTTYl96G', 'sample.png', '2018-04-12 19:18:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admintimelog`
--
ALTER TABLE `admintimelog`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `superadminlogin`
--
ALTER TABLE `superadminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelog`
--
ALTER TABLE `timelog`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `userslogin`
--
ALTER TABLE `userslogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admintimelog`
--
ALTER TABLE `admintimelog`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadminlogin`
--
ALTER TABLE `superadminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timelog`
--
ALTER TABLE `timelog`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userslogin`
--
ALTER TABLE `userslogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
