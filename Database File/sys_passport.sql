-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 09:44 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sys_passport`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `aid` int(10) NOT NULL,
  `a_type` char(1) NOT NULL,
  `a_given_name` varchar(20) NOT NULL,
  `a_last_name` varchar(10) NOT NULL,
  `a_sex` varchar(10) NOT NULL,
  `a_dob` date NOT NULL,
  `a_pob` varchar(30) NOT NULL,
  `a_guardian` varchar(30) DEFAULT NULL,
  `a_spouse` varchar(30) DEFAULT NULL,
  `a_address` text NOT NULL,
  `a_aadhar` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_info`
--

CREATE TABLE `app_info` (
  `i_aid` int(10) NOT NULL,
  `a_stage` int(2) NOT NULL,
  `app_sc_count` int(11) NOT NULL DEFAULT '0',
  `pay_amt` int(4) NOT NULL,
  `pay_mode` varchar(10) NOT NULL,
  `app_mobile` char(10) NOT NULL,
  `app_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_stage`
--

CREATE TABLE `app_stage` (
  `s_aid` int(10) NOT NULL,
  `p1_eid` varchar(10) NOT NULL,
  `p1_s_dt` datetime NOT NULL,
  `p1_e_dt` datetime DEFAULT NULL,
  `p2_eid` varchar(10) DEFAULT NULL,
  `p2_s_dt` datetime DEFAULT NULL,
  `p2_e_dt` datetime DEFAULT NULL,
  `p2_comm` text,
  `p3_eid` varchar(10) DEFAULT NULL,
  `p4_dt` datetime DEFAULT NULL,
  `p4_eid` varchar(10) DEFAULT NULL,
  `p4_s_time` time DEFAULT NULL,
  `p4_e_time` time DEFAULT NULL,
  `p4_comm` text,
  `p5_e_dt` datetime DEFAULT NULL,
  `p5_comm` text,
  `p6_eid` varchar(10) DEFAULT NULL,
  `p6_s_dt` datetime DEFAULT NULL,
  `p6_e_dt` datetime DEFAULT NULL,
  `p7_e_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dum_aadhar`
--

CREATE TABLE `dum_aadhar` (
  `ano` char(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dum_passport`
--

CREATE TABLE `dum_passport` (
  `pno` int(10) NOT NULL,
  `p_given_name` varchar(20) NOT NULL,
  `p_last_name` varchar(10) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `p_dob` date NOT NULL,
  `p_pob` varchar(30) NOT NULL,
  `p_guardian` varchar(30) DEFAULT NULL,
  `p_spouse` varchar(30) DEFAULT NULL,
  `p_address` text NOT NULL,
  `p_aadhar` char(12) NOT NULL,
  `p_issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(10) NOT NULL,
  `e_name` varchar(30) NOT NULL,
  `e_pwd` varchar(10) NOT NULL,
  `e_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `a_aadhar` (`a_aadhar`);

--
-- Indexes for table `app_info`
--
ALTER TABLE `app_info`
  ADD PRIMARY KEY (`i_aid`);

--
-- Indexes for table `app_stage`
--
ALTER TABLE `app_stage`
  ADD PRIMARY KEY (`s_aid`),
  ADD KEY `fk_stg1` (`p1_eid`),
  ADD KEY `fk_stg2` (`p2_eid`),
  ADD KEY `fk_stg3` (`p3_eid`),
  ADD KEY `fk_stg4` (`p4_eid`),
  ADD KEY `fk_stg6` (`p6_eid`);

--
-- Indexes for table `dum_aadhar`
--
ALTER TABLE `dum_aadhar`
  ADD PRIMARY KEY (`ano`);

--
-- Indexes for table `dum_passport`
--
ALTER TABLE `dum_passport`
  ADD PRIMARY KEY (`pno`),
  ADD KEY `p_aadhar` (`p_aadhar`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_app_adhr` FOREIGN KEY (`a_aadhar`) REFERENCES `dum_aadhar` (`ano`);

--
-- Constraints for table `app_info`
--
ALTER TABLE `app_info`
  ADD CONSTRAINT `fk_info_app` FOREIGN KEY (`i_aid`) REFERENCES `application` (`aid`);

--
-- Constraints for table `app_stage`
--
ALTER TABLE `app_stage`
  ADD CONSTRAINT `fk_stg1` FOREIGN KEY (`p1_eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `fk_stg2` FOREIGN KEY (`p2_eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `fk_stg3` FOREIGN KEY (`p3_eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `fk_stg4` FOREIGN KEY (`p4_eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `fk_stg6` FOREIGN KEY (`p6_eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `fk_stge_app` FOREIGN KEY (`s_aid`) REFERENCES `application` (`aid`);

--
-- Constraints for table `dum_passport`
--
ALTER TABLE `dum_passport`
  ADD CONSTRAINT `fk_psprt_adhr` FOREIGN KEY (`p_aadhar`) REFERENCES `dum_aadhar` (`ano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
