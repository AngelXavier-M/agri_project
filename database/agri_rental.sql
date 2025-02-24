-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2024 at 05:20 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agri_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_admin`
--

CREATE TABLE `ar_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar_admin`
--

INSERT INTO `ar_admin` (`username`, `password`) VALUES
('admin', 'admin');



CREATE TABLE `ar_booking` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `provider` varchar(20) NOT NULL,
  `vid` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `time_type` int(11) NOT NULL,
  `req_date` varchar(20) NOT NULL,
  `stime` varchar(60) NOT NULL,
  `etime` varchar(60) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pay_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ar_fertilizer_booking` (
  `id` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `provider` varchar(60) NOT NULL,
  `pid` varchar(60) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `final` varchar(60) NOT NULL,
  `req_date` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ar_products` (
  `id` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `pname` varchar(60) NOT NULL,
  `ptype` varchar(60) NOT NULL,
  `details` varchar(200) NOT NULL,
  `quantity` varchar(60) NOT NULL,
  `price` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `create_date` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ar_product_booking` (
  `id` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `farmer` varchar(60) NOT NULL,
  `pid` varchar(60) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `final` varchar(60) NOT NULL,
  `req_date` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `ar_provider` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `lat` varchar(80) NOT NULL,
  `lon` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ar_user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rdate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ar_vehicle` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `vno` varchar(20) NOT NULL,
  `details` varchar(100) NOT NULL,
  `cost1` int(11) NOT NULL,
  `cost2` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

