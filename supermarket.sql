-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2018 at 02:23 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT '1',
  `cat_created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`, `cat_created_At`) VALUES
(1, 'Electronics', 1, '2018-07-31 18:30:00'),
(6, 'Clothes', 1, '2018-09-01 04:47:21'),
(7, 'Toys', 1, '2018-09-03 19:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `cus_phone` varchar(30) NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cus_phone`, `cus_address`, `users_id`) VALUES
(1, '9633845820', 'pullumattathil,vadakkemala', 1),
(2, '9633845821', 'sdfghsadfgsdfghsdfg', 1),
(3, '9633845825', 'sdfghsadfgsdfghsdfg', 1),
(4, '9633845826', 'sdfghsadfgsdfghsdfg', 1),
(5, '9933845820', 'reagdfhgjkl', 1),
(6, '9933845828', 'reagdfhgjkl', 1),
(7, '5478965214', 'dafsgasfdghfh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`staff_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `phone`, `address`, `gender`, `dob`, `designation`, `salary`, `pic`, `user_id`) VALUES
(1, '9633845820', 'pullumattathil', '', '2005-06-15', 'Manager', '50000', '', 3),
(2, '9633845820', 'pullumattathil', '', '2005-06-15', 'Manager', '50000', '', 4),
(3, '9633845820', 'pullumattathil', 'male', '2005-06-15', 'Manager', '50000', '', 5),
(5, '3456789012', 'kottayam mundakkayam', 'Female', '2018-09-13', 'Casher', '14000', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`, `cat_id`, `status`) VALUES
(1, 'Mobile', 1, 1),
(2, 'cars', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`users_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `last_login` date NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `email`, `password`, `is_active`, `first_name`, `last_name`, `role`, `last_login`, `createdAt`) VALUES
(1, 'sobinmathew988@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 1, 'Sobin', 'Mathew', 1, '2018-08-31', '2018-08-27'),
(2, 'admin@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 1, 'Admin', 'Admin', 8, '2018-09-03', '2018-08-27'),
(3, 'stany@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 0, 'Sobin', 'Mathew', 7, '0000-00-00', '2018-08-27'),
(4, 'stany123@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 0, 'Sobin', 'Mathew', 7, '0000-00-00', '2018-08-27'),
(5, 'stany12@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 0, 'Sobin', 'Mathew', 7, '0000-00-00', '2018-08-27'),
(6, 'monisha@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 0, 'asdfg', 'asdfg', 7, '0000-00-00', '2018-09-01'),
(7, 'sabu@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 1, 'Sabu', 'Johna', 1, '0000-00-00', '2018-09-01'),
(8, 'ashikshaji4u@gmail.com', 'd53dbc14e39abb5a63bc2f2428070cfc989ece48', 0, 'sdrtfgg', 'wert', 7, '0000-00-00', '2018-09-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
 ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`users_id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
