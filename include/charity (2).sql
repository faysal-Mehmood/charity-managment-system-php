-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 08:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_slogan` varchar(100) NOT NULL,
  `site_description` varchar(500) NOT NULL,
  `site_keywords` varchar(500) NOT NULL,
  `site_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `site_url`, `site_title`, `site_slogan`, `site_description`, `site_keywords`, `site_time`) VALUES
(1, 'http://localhost/charity', 'Charity', 'Charity', 'Charity', 'Charity', '');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `persion_name` varchar(100) NOT NULL,
  `persion_email` varchar(100) NOT NULL,
  `persion_adrs` varchar(100) NOT NULL,
  `persion_cnic` varchar(100) NOT NULL,
  `persion_phone` varchar(100) NOT NULL,
  `persion_dob` varchar(100) NOT NULL,
  `join_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donate_fund`
--

CREATE TABLE `donate_fund` (
  `id` int(11) NOT NULL,
  `donate_id` varchar(100) DEFAULT NULL,
  `donate_cnic` varchar(100) DEFAULT NULL,
  `donate_balance` varchar(200) DEFAULT NULL,
  `donor_id` varchar(100) DEFAULT NULL,
  `donate_transaction_invoice` varchar(200) DEFAULT NULL,
  `transaction_process` varchar(200) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `donor_key` varchar(100) NOT NULL DEFAULT '0',
  `donor_adrs` varchar(100) NOT NULL,
  `donor_cnic` varchar(100) NOT NULL,
  `donor_phone` varchar(100) NOT NULL,
  `donor_balance` varchar(100) NOT NULL DEFAULT '0',
  `donor_dob` varchar(100) NOT NULL,
  `join_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fund_transaction`
--

CREATE TABLE `fund_transaction` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_cnic` varchar(100) NOT NULL,
  `amount_in` varchar(200) NOT NULL,
  `amount_out` varchar(200) NOT NULL,
  `transaction_invoice` varchar(200) NOT NULL,
  `transaction_process` varchar(100) NOT NULL,
  `date_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_cnic` varchar(100) NOT NULL,
  `inventory_list` varchar(100) NOT NULL,
  `transaction_invoice` varchar(100) NOT NULL,
  `transaction_process` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_cnic` varchar(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_adrs` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_dob` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_cnic`, `user_name`, `user_email`, `user_pass`, `user_adrs`, `user_phone`, `user_dob`, `user_role`) VALUES
(1, '31303-6225623-3', 'charity', 'charity@gmail.com', '71112dcbe9a8ff9c204efb09d30a1f40', 'gujrat', '03005489888', '2000-02-22', 'admin'),
(2, '46497-9779797-9', 'safina', 'safina@gmail.com', '202cb962ac59075b964b07152d234b70', 'vill singla, PO sarsal,teh kharian,district gujrat', '03406018013', '2020-08-31', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate_fund`
--
ALTER TABLE `donate_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_transaction`
--
ALTER TABLE `fund_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donate_fund`
--
ALTER TABLE `donate_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fund_transaction`
--
ALTER TABLE `fund_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
