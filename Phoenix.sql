-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 12:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phoenix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item_no`, `name`, `type`, `detail`, `price`, `image`) VALUES
(5, 3, 'Fried Rice with Chicken', 'Non-Veg', 'Fried Rice is a mixture of rice, soy-sauce and vegetables and minced-meat with grilled chicken on the side.', '35', 'Fried Rice and Chicken.jpg'),
(6, 4, 'Cesar Salad', 'Veg', 'A pure salad combo made up of cabbage, salad leaves, tomatoes and onion rings.', '40', 'Salad.jpg'),
(7, 5, 'Fried Yam and Chicken', 'Non-Veg', 'Fried Yam combined with 3-piece chicken.', '60', 'Fried_yam.jpg'),
(8, 6, 'Rice and Beans Stew', 'Veg', 'Spicy rice dish prepared by cooking rice with beans with palm-nut oil.', '10', 'Rice and Beans.jpg'),
(9, 7, 'Banku and Okro-Stew with salmon', 'Non-Veg', 'Banku served with Okro Stew with fish and minced-meat.', '60', 'Banku_Okro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Id`, `orderId`, `userId`, `itemName`, `price`, `qty`, `total`, `name`, `address`, `email`) VALUES
(20, 1, 1, 'Jollof and Salad and Chicken', '15', 2, '30', 'Nii Aku', 'Ashongman-Estate GE 1229', 'nii.adjei-aku@ashesi.edu.gh'),
(21, 1, 1, 'Banku and Okro-Stew with salmon', '60', 1, '60', 'Nii Aku', 'Ashongman-Estate GE 1229', 'nii.adjei-aku@ashesi.edu.gh'),
(22, 13, 13, 'Rice and Beans Stew', '15', 1, '25', 'Madoc', 'Flat No. 100, Villagio', 'madoc.quaye@ashesi.edu.gh'),
(23, 13, 13, 'Fried Yam and Chicken', '60', 2, '120', 'Amenoracking Amenreynolds', 'Flat No. 127, the Gallery', 'amens321@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `address`, `email`, `password`, `cpassword`) VALUES
(1, 'Nii Aku', '0542490402', 'Ashongman-Estate GE 1229', 'nii.adjei-aku@ashesi.edu.gh', 'niiaku31', 'niiaku31'),
(2, 'Amenoracking Amenreynolds', '0275460908', 'Flat No. 127, the Gallery', 'amens321@gmail.com', 'amenandpray12', 'amenandpray12'),
(3, 'Madoc', '0244123789', 'Flat No. 100, Villagio', 'madoc.quaye@ashesi.edu.gh', 'madman123', 'madman123'),
(15, 'Bradley Deku', '0264438599', 'Ben 10 Ave', 'bradley.deku@ashesi.edu.gh', 'brad', 'brad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_no` (`item_no`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
