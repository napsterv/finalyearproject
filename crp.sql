-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 07:23 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crp`
--

-- --------------------------------------------------------

--
-- Table structure for table `crp_admin_login`
--

CREATE TABLE `crp_admin_login` (
  `id` int(50) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_admin_login`
--

INSERT INTO `crp_admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `crp_complain`
--

CREATE TABLE `crp_complain` (
  `id` int(50) NOT NULL,
  `crime_name_id` varchar(500) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `location_name_id` varchar(500) NOT NULL,
  `sublocation_name_id` varchar(500) NOT NULL,
  `complain_description` varchar(5000) NOT NULL,
  `admin_reply` varchar(5000) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_complain`
--

INSERT INTO `crp_complain` (`id`, `crime_name_id`, `user_name`, `user_id`, `mobile`, `email`, `location_name_id`, `sublocation_name_id`, `complain_description`, `admin_reply`, `status`) VALUES
(1, '1', 'jayant', '1', '9874563210', 'jadhav00@gmail.com', '1', '1', 'kihugyfsc', 'zviyhg', 'Inprogres'),
(2, '2', 'Neel', '2', '123456789', 'neel@gmail.com', '1', '2', 'hfhfghffg', 'hugsffff', 'Inprogres'),
(3, '3', 'Neel', '2', '1234567890', 'neel@gmail.com', '1', '2', 'as', '', 'Pending'),
(4, '3', 'Neel', '2', '1234567890', 'neel@gmail.com', '1', '2', 'sasss', '', 'Pending'),
(5, '1', 'Neel', '2', '1234567890', 'neel@gmail.com', '2', '4', 'huuhh', '', 'Pending'),
(6, '1', 'Neel', '2', '1234567890', 'neel@gmail.com', '2', '4', 'frddghfch', '', 'Pending'),
(7, '2', 'Neel', '2', '1234567890', 'neel@gmail.com', '2', '3', 'ahaaa', '', 'Pending'),
(8, '2', 'Neel', '2', '1234567890', 'neel@gmail.com', '3', '5', 'huhuuuauua', '', 'Pending'),
(9, '3', 'Neel', '2', '1234567890', 'neel@gmail.com', '3', '5', 'bhagafgff', '', 'Pending'),
(10, '3', 'Neel', '2', '1234567890', 'neel@gmail.com', '3', '6', 'hhgsh', '', 'Pending'),
(11, '1', 'Neel', '2', '1234567890', 'neel@gmail.com', '4', '8', 'xaaax', '', 'Pending'),
(12, '1', 'Neel', '2', '1234567890', 'neel@gmail.com', '4', '8', 'axaxx', '', 'Pending'),
(13, '2', 'Neel', '2', '1234567890', 'neel@gmail.com', '4', '8', 'asaaaasa', 'testing', 'Inprogres');

-- --------------------------------------------------------

--
-- Table structure for table `crp_crime`
--

CREATE TABLE `crp_crime` (
  `id` int(50) NOT NULL,
  `crime_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_crime`
--

INSERT INTO `crp_crime` (`id`, `crime_name`) VALUES
(1, 'Murder'),
(2, 'Bank Robbery'),
(3, 'Vehicle theft');

-- --------------------------------------------------------

--
-- Table structure for table `crp_location`
--

CREATE TABLE `crp_location` (
  `id` int(50) NOT NULL,
  `location_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_location`
--

INSERT INTO `crp_location` (`id`, `location_name`) VALUES
(1, 'Borivali west'),
(2, 'Borivali east'),
(3, 'Kandivali'),
(4, 'Malad');

-- --------------------------------------------------------

--
-- Table structure for table `crp_sub_location`
--

CREATE TABLE `crp_sub_location` (
  `id` int(50) NOT NULL,
  `location_name_id` varchar(500) NOT NULL,
  `sub_location_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_sub_location`
--

INSERT INTO `crp_sub_location` (`id`, `location_name_id`, `sub_location_name`) VALUES
(1, '1', 'Gorai'),
(2, '1', 'MHB'),
(3, '2', 'National Park'),
(4, '2', 'Carter Road Number 1'),
(5, '3', 'Charkop market'),
(6, '3', 'Shanti Nagar'),
(7, '4', 'Atharva Road'),
(8, '4', 'Malvani nagar');

-- --------------------------------------------------------

--
-- Table structure for table `crp_user_login`
--

CREATE TABLE `crp_user_login` (
  `id` int(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crp_user_login`
--

INSERT INTO `crp_user_login` (`id`, `name`, `email`, `mobile`, `password`, `status`) VALUES
(1, 'jayant', 'jadhav00@gmail.com', '9874563210', '123', 'On'),
(2, 'Neel', 'neel@gmail.com', '1234567890', '123', 'On'),
(4, 'abc', 'abc@gmail.com', '1111111111', '111', 'Off');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crp_admin_login`
--
ALTER TABLE `crp_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_complain`
--
ALTER TABLE `crp_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_crime`
--
ALTER TABLE `crp_crime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_location`
--
ALTER TABLE `crp_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_sub_location`
--
ALTER TABLE `crp_sub_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crp_user_login`
--
ALTER TABLE `crp_user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crp_admin_login`
--
ALTER TABLE `crp_admin_login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crp_complain`
--
ALTER TABLE `crp_complain`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `crp_crime`
--
ALTER TABLE `crp_crime`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crp_location`
--
ALTER TABLE `crp_location`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crp_sub_location`
--
ALTER TABLE `crp_sub_location`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crp_user_login`
--
ALTER TABLE `crp_user_login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
