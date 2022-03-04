-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 08:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Name`, `Email`, `Phone`) VALUES
(1, 'Ashar', 'ashar@gmail.com', 2147483647),
(2, 'Ahmed', 'ahmed@gmail.com', 123456789),
(3, 'Sameer Bhai', 'sameer@gmail.com', 292451568),
(4, 'Ali', 'ali@gmail.com', 124578963);

-- --------------------------------------------------------

--
-- Table structure for table `invodb`
--

CREATE TABLE `invodb` (
  `id` int(11) NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invodb`
--

INSERT INTO `invodb` (`id`, `itemcode`, `Name`, `price`) VALUES
(1, '99889988', 'jeans', '200'),
(2, '2344046', 'Iphone 13 PRO Max', '5000'),
(3, '21', 'jeans', '12'),
(4, '99889988', 'oil', '500');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `itemcode` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(255) NOT NULL,
  `msid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`itemcode`, `Name`, `price`, `id`, `msid`) VALUES
(21, 'jeans', 12, 2, 0),
(0, 'jeans', 12, 4, 0),
(0, 'jeans', 12, 5, 3),
(0, 'Iphone 13 PRO Max', 5000, 6, 2),
(0, 'oil', 500, 7, 0),
(0, 'Iphone 13 PRO Max', 5000, 25, 2),
(0, 'Iphone 13 PRO Max', 5000, 26, 2),
(0, 'Iphone 13 PRO Max', 5000, 27, 2),
(0, 'Iphone 13 PRO Max', 5000, 28, 2),
(0, 'Iphone 13 PRO Max', 5000, 29, 2),
(0, 'oil', 500, 30, 4),
(0, 'jeans', 12, 31, 3),
(0, 'jeans', 200, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoicecusdb`
--

CREATE TABLE `invoicecusdb` (
  `id` int(11) NOT NULL,
  `Cusname` varchar(255) NOT NULL,
  `Cusphone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicecusdb`
--

INSERT INTO `invoicecusdb` (`id`, `Cusname`, `Cusphone`) VALUES
(1, 'jeans', '2147483647'),
(2, 'Iphone 13 PRO Max', '123456789'),
(3, '', '292451568'),
(4, 'oil', '124578963');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemcode` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `itmid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemcode`, `Name`, `price`, `id`, `imgName`, `itmid`) VALUES
(99889988, 'jeans', 200, 1, '', 0),
(2344046, 'Iphone 13 PRO Max', 5000, 2, '', 0),
(21, 'jeans', 12, 3, '', 0),
(99889988, 'oil', 500, 4, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invodb`
--
ALTER TABLE `invodb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicecusdb`
--
ALTER TABLE `invoicecusdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invodb`
--
ALTER TABLE `invodb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `invoicecusdb`
--
ALTER TABLE `invoicecusdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
