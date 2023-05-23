-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 03:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cottage_room`
--

CREATE TABLE `cottage_room` (
  `CRid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `media_type` varchar(100) NOT NULL,
  `cottage_type` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `price` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottage_room`
--

INSERT INTO `cottage_room` (`CRid`, `category`, `photo`, `media_type`, `cottage_type`, `class`, `person`, `price`) VALUES
(1, 'room', 'slide3.jpg', 'image', 'Standard Room', 'Regular 1', '5', '5000'),
(2, 'room', 'room2.jpg', 'image', 'Deluxe Room', 'AirCondition 1', '5', '550'),
(3, 'room', 'room3.png', 'image', 'Suit', 'AirCondition 2', '4', '400'),
(4, 'cottage', 'room1.png', 'image', 'Bungalow', 'Regular 2', '75', '600'),
(5, 'cottage', 'cottage2.jpg', 'image', 'Standard Room', 'Regular 3', '6', '650'),
(6, 'cottage', 'cottage1.jpg', 'image', 'Nippa Hut', 'Regular 4', '4', '400');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `schedule` date NOT NULL,
  `size` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `max_person` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `type_of_payment` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `gcash_screenshot` varchar(100) NOT NULL,
  `confirm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `fname`, `email`, `contact_number`, `address`, `schedule`, `size`, `type`, `max_person`, `price`, `type_of_payment`, `amount`, `gcash_screenshot`, `confirm`) VALUES
(40, 'marion', 'marionjuliahgarrote@gmail.com', '09215335264', 'sta.cruz,angat', '2022-12-14', 'Family Size', 'Regular 1', 5, '5000', 'Down-payment', '2000', 'cottage1.jpg', ''),
(42, 'albert jason', 'albertjason@gmail.com', '09496573072', '1741 Pinagpala Sta. Barbara', '2022-12-12', 'Family Size', 'Regular 3', 6, '650', 'Down-payment', '-7000', 'cottage3.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `email_verified` datetime NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`, `email_verified`, `profile`) VALUES
(116, 'jv', 'marasiganjayvie14@gmail.com', '3a977785319791d84bea728245ca10d8c9531185bb4a27ee68b9c03ca6f0861f', '2022-12-14 08:45:37', '2022-12-14 15:46:22', ''),
(128, 'John Albert', 'johnalbertd00@gmail.com', 'd29d4178683d6b3ed1519b3e9dd07b68357f4640c613c900f84c623c46bbbc06', '2022-12-18 08:11:42', '2022-12-18 15:11:54', '');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `code`, `email`) VALUES
(33, 329586, 'marasiganjayvie14@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottage_room`
--
ALTER TABLE `cottage_room`
  ADD PRIMARY KEY (`CRid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottage_room`
--
ALTER TABLE `cottage_room`
  MODIFY `CRid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
