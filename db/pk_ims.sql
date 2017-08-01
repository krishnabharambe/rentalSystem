-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 06:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pk_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `b_id` int(11) NOT NULL,
  `b_inv_id` int(5) NOT NULL,
  `b_tech_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `b_tquantity` int(10) NOT NULL,
  `b_return_status` varchar(20) NOT NULL,
  `b_return_quantity` int(10) NOT NULL,
  `b_timestamp` varchar(25) NOT NULL,
  `b_rec_id` int(10) NOT NULL,
  `r_date` date NOT NULL,
  `r_timestamp` varchar(20) NOT NULL,
  `b_status` varchar(32) NOT NULL,
  `total_cost` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`b_id`, `b_inv_id`, `b_tech_id`, `date`, `b_tquantity`, `b_return_status`, `b_return_quantity`, `b_timestamp`, `b_rec_id`, `r_date`, `r_timestamp`, `b_status`, `total_cost`) VALUES
(1, 1, 2, '2017-06-27', 10, 'Pending', 10, '2017-06-27 23:42:47', 1, '2017-06-27', '2017-06-27 23:43:00', 'ARCHIVED', 2500),
(2, 2, 2, '2017-06-27', 10, 'Pending', 5, '2017-06-27 23:42:47', 1, '2017-06-27', '2017-06-27 23:43:33', 'ACTIVE', 4520),
(3, 1, 3, '2017-06-29', 2, 'Pending', 2, '2017-06-29 07:57:16', 2, '2017-06-29', '2017-06-29 08:07:39', 'ACTIVE', 500),
(4, 2, 3, '2017-06-29', 3, 'Pending', 2, '2017-06-29 08:07:11', 3, '2017-06-29', '2017-06-29 08:07:27', 'ACTIVE', 1356);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_title` varchar(32) NOT NULL,
  `inv_dealer` varchar(32) NOT NULL,
  `inv_model` varchar(32) NOT NULL,
  `inv_tquantity` int(5) NOT NULL,
  `inv_lquantity` int(5) NOT NULL,
  `inv_cost` int(10) NOT NULL,
  `inv_status` varchar(64) NOT NULL,
  `timestamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_title`, `inv_dealer`, `inv_model`, `inv_tquantity`, `inv_lquantity`, `inv_cost`, `inv_status`, `timestamp`) VALUES
(1, 'keyboard', 'sony', 'H12', 12, 0, 250, 'ARCHIVED', '2017-06-23 20:20:52'),
(2, 'mouse', 'matrix', 'M11', 54, 0, 452, 'ACTIVE', '2017-06-23 20:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `rec_id` int(11) NOT NULL,
  `r_timestamp` varchar(20) NOT NULL,
  `added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`rec_id`, `r_timestamp`, `added`) VALUES
(1, '', 'Added'),
(2, '', 'Added'),
(3, '', 'Added');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `tech_id` int(11) NOT NULL,
  `tech_name` varchar(64) NOT NULL,
  `tech_address` varchar(250) NOT NULL,
  `tech_contact` varchar(10) NOT NULL,
  `tech_acontact` varchar(10) NOT NULL,
  `tech_status` varchar(20) NOT NULL,
  `tech_uid` varchar(250) NOT NULL,
  `timestamp` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`tech_id`, `tech_name`, `tech_address`, `tech_contact`, `tech_acontact`, `tech_status`, `tech_uid`, `timestamp`) VALUES
(1, 'Krishna Bharambe', 'BULDANA 443001', '9011365788', '9850364846', 'ACTIVE', '123', '2017-06-23 02:39:33'),
(2, 'Atul Patil', 'Sunderkhed buldana', '9657055120', '8899663322', 'Archived', '986532', '2017-06-23 13:17:39'),
(3, 'pratik', 'buldanan', '9850364846', '9865231470', 'ACTIVE', '123456879', '2017-06-29 07:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `temp_inv_id` int(8) NOT NULL,
  `temp_borrower_tech_id` int(5) NOT NULL,
  `temp_issueing_quantity` int(10) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(32) NOT NULL,
  `admin_lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`admin_id`, `admin_firstname`, `admin_lastname`, `username`, `password`) VALUES
(1, 'krishna', 'bharambe', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
