-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `name_type` varchar(255) DEFAULT NULL,
  `id_type_child` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `supplier_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `short_name`, `name_type`, `id_type_child`, `note`, `del_flag`, `updated_time`, `updated_user`, `created_time`, `created_user`) VALUES
(1, 'config 1', 'cf1', 'position', 1, 'nothing', 0, '2021-12-24 02:31:12', NULL, '2021-12-24 02:31:12', '1'),
(2, 'config 2', 'cf2', 'department', 1, 'nothing too', 0, NULL, NULL, '2022-01-19 15:23:43', '1'),
(3, 'config 3', 'cf3', 'position', 2, 'nothing', 0, NULL, NULL, '2022-01-19 16:00:21', '1'),
(4, 'department 2', 'dp2', 'department', 2, 'nothing too', 0, NULL, NULL, '2022-01-19 16:01:25', '1'),
(5, 'config 1', 'demo', 'position', 3, 'nothing', 0, NULL, NULL, '2022-01-20 15:44:48', '1'),
(6, 'config 1', 'cf3', 'position', 4, 'nothing too', 0, NULL, NULL, '2022-01-20 15:45:42', '1'),
(7, 'config 1', '', 'position', 5, '', 0, NULL, NULL, '2022-01-20 16:52:49', '1'),
(8, 'department =U9', 'cf3', 'position', 6, 'nothing', 0, NULL, NULL, '2022-01-20 16:53:55', '1'),
(9, 'depart', 'ss', 'department', 3, 'nothing too', 0, NULL, NULL, '2022-01-20 16:54:21', '1'),
(10, 'user demo', 'demo', 'user', 1, 'demo', 0, NULL, NULL, '2022-01-20 16:55:22', '1'),
(11, 'type1', 'type', 'new type', 1, 'none', 0, NULL, NULL, '2022-01-21 08:13:55', '1'),
(12, 'config 1', 'cf2', 'position', 7, 'nothing too', 0, NULL, NULL, '2022-01-21 09:00:27', '1'),
(13, 'config 1', 'cf2', 'type12', 1, 'nothing too', 0, NULL, NULL, '2022-01-21 09:01:12', '1'),
(14, 'demo', 'dqemo', 'position', 8, 'demo', 0, NULL, NULL, '2022-01-21 09:01:42', '1'),
(15, 'config 1', '', 'new config', 1, '', 0, NULL, NULL, '2022-01-24 09:23:27', '1'),
(16, 'cin2', '', 'new config', 2, '', 0, NULL, NULL, '2022-01-24 09:23:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `time` time DEFAULT NULL,
  `weekdays` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `course_type`, `time`, `weekdays`, `start_date`, `end_date`, `note`, `del_flag`, `updated_time`, `updated_user`, `created_time`, `created_user`) VALUES
(24, 'course 1', 'Sự kiện', NULL, NULL, '2021-12-03', '2022-01-06', 'nothing', 0, NULL, NULL, NULL, NULL),
(25, 'course 2', 'type 1', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(26, 'course 3', 'type 1', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(27, 'course 4', 'type 1', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(28, 'course 5', 'type 1', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(29, 'course 6', 'type 2', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(30, 'course 7', 'type 2', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(31, 'course 8', 'type 2', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(32, 'course 9', 'type 2', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(33, 'course 10', 'type 2', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(34, 'course 11', 'type 3', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(35, 'course 12', 'type 3', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(36, 'course 13', 'type 3', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(37, 'course 14', 'type 3', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL),
(38, 'course 15', 'type 3', NULL, '2', '2021-12-28', '2022-01-28', 'nothing', 0, '2021-12-28 10:33:24', NULL, '2021-12-28 10:33:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `profile_id` varchar(15) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `short_name`, `note`, `del_flag`, `updated_time`, `updated_user`, `created_time`, `created_user`) VALUES
(1, 'department 1', 'dp1', 'nothing else', 0, NULL, NULL, '2010-01-22 00:00:00', '1'),
(2, 'department 2', 'dp2', 'demo', 1, NULL, NULL, '2010-01-22 00:00:00', '1'),
(3, 'department 2', 'dp2', 'nothing else', 0, '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00', '1'),
(4, 'department 3', 'dp3', 'demo', 0, NULL, NULL, '0000-00-00 00:00:00', '1'),
(5, 'department 4', 'dp4', 'nothing', 0, NULL, NULL, '0000-00-00 00:00:00', '1'),
(6, 'position demo', 'ps16', 'nothing', 0, NULL, NULL, '0000-00-00 00:00:00', '1'),
(7, 'department 4', 'ps16', 'nothing', 1, '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00', '1'),
(8, 'position demo', 'ps16', '', 0, NULL, NULL, '0000-00-00 00:00:00', '1'),
(9, 'department 4', 'ps16', 'nothing', 0, NULL, NULL, '0000-00-00 00:00:00', '1'),
(10, 'department 2', 'ps16', 'ffs', 0, NULL, NULL, '2022-01-11 10:17:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `equipment_id` varchar(255) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `warranty_period` datetime NOT NULL,
  `series` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `img` blob DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_user` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `equipment_id`, `profile_id`, `type_id`, `name`, `manufacture_id`, `purchase_date`, `warranty_period`, `series`, `position`, `note`, `img`, `del_flag`, `created_user`, `created_time`, `updated_user`, `updated_time`, `status`) VALUES
(1, 'equip1', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(2, 'equip2', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2015-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(3, 'equip3', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2015-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'damaged'),
(4, 'equip4', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2015-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(5, 'equip5', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2015-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(6, 'equip6', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2016-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(7, 'equip7', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2016-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'damaged'),
(8, 'equip8', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2016-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(9, 'equip9', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2016-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(10, 'equip10', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(11, 'equip11', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(12, 'equip12', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(13, 'equip13', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(14, 'equip10', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(15, 'equip11', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(16, 'equip12', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(17, 'equip13', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2017-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(18, 'equip10', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2018-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(19, 'equip11', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2018-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(20, 'equip12', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2018-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'damaged'),
(21, 'equip13', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'apple', NULL, NULL, NULL, 0, NULL, '2019-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(22, 'equip10', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'apple', NULL, NULL, NULL, 0, NULL, '2019-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(23, 'equip11', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'asus', NULL, NULL, NULL, 0, NULL, '2019-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(24, 'equip12', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'dell', NULL, NULL, NULL, 0, NULL, '2019-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(25, 'equip13', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2019-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(26, 'equip10', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2020-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(27, 'equip11', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2020-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(28, 'equip12', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2020-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(29, 'equip13', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(30, 'equip10', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'apple', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(31, 'equip11', NULL, 0, 'pc', 0, '2015', '2021-12-24 08:55:11', 'apple', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(32, 'equip12', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'asus', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(33, 'equip13', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'asus', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(34, 'equip10', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'asus', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(35, 'equip11', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'asus', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(36, 'equip12', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'hp', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(37, 'equip13', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'lg', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(38, 'equip10', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'lg', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(39, 'equip11', NULL, 0, 'monitor', 0, '2015', '2021-12-24 08:55:11', 'lg', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'repaired'),
(40, 'equip12', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'samsung', NULL, NULL, NULL, 0, NULL, '2021-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using'),
(41, 'equip13', NULL, 0, 'laptop', 0, '2015', '2021-12-24 08:55:11', 'samsung', NULL, NULL, NULL, 0, NULL, '2022-12-24 08:55:11', NULL, '2021-12-24 08:55:11', 'using');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `leave_reason_id` int(11) DEFAULT NULL,
  `note` text NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `created_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_reason`
--

CREATE TABLE `leave_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `short_name`, `note`, `del_flag`, `updated_time`, `updated_user`, `created_time`, `created_user`) VALUES
(1, 'position1', 'ps1', 'nothing else', 1, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(2, 'position 1', 'ps1', 'nothing', 1, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(3, 'position 2', 'ps2', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(4, 'position 3', 'ps3', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(5, 'position 4', 'ps4', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(6, 'position 5', 'ps5', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(7, 'position 6', 'ps6', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(8, 'position 7', 'ps7', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(9, 'position 8', 'ps8', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(10, 'position 9', 'ps9', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(11, 'position 10', 'ps10', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(12, 'position 11', 'ps11', 'nothing else', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(13, 'position 12', 'ps12', 'nothing', 0, '2021-12-26 09:05:42', NULL, '2021-12-26 09:05:42', NULL),
(14, 'position13', 'ps13', 'nothing', 0, '2021-12-28 08:34:37', NULL, '2021-12-28 08:34:37', NULL),
(15, 'position14', 'ps14', 'nothing', 0, '2021-12-28 08:34:37', NULL, '2021-12-28 08:34:37', NULL),
(16, 'position15', 'ps15', 'nothing', 0, '2021-12-28 08:34:37', NULL, '2021-12-28 08:34:37', NULL),
(17, 'position16', 'ps16', 'nothing', 0, NULL, NULL, NULL, NULL),
(18, 'position16', 'psdemo', 'ffs', 0, NULL, NULL, NULL, NULL),
(19, '', 'ps16', '', 1, NULL, NULL, NULL, NULL),
(20, '', '', '', 1, NULL, NULL, NULL, NULL),
(21, '', '', '', 1, NULL, NULL, NULL, NULL),
(22, '', NULL, NULL, 1, NULL, NULL, NULL, NULL),
(23, '', '', '', 1, NULL, NULL, NULL, NULL),
(24, '', '', '', 1, NULL, NULL, NULL, NULL),
(25, 'demo', 'demo', 'demno', 1, NULL, NULL, NULL, NULL),
(26, 'demo', 'demo', 'demo', 1, NULL, NULL, NULL, NULL),
(27, 'demo', 'demo', 'demo', 0, NULL, NULL, NULL, NULL),
(28, 'position16', 'ps16', 'nothing', 0, NULL, NULL, '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `official_date` date DEFAULT NULL,
  `probation_date` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `image` blob DEFAULT NULL,
  `del_flag` tinyint(1) DEFAULT 0,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `employee_id`, `name`, `email`, `birthday`, `position_id`, `department_id`, `status`, `address`, `telephone`, `mobile`, `official_date`, `probation_date`, `gender`, `image`, `del_flag`, `created_time`, `created_user`, `updated_time`, `updated_user`) VALUES
(1, '1', 'Nguoi dung 1', 'email@example.com', '2000-10-16 16:55:24', 1, 1, NULL, 'unknow', 'unknow', 'unknow', '2021-12-16', '2021-12-30', 0, 0xffd8ffe000104a46494600010101000000000000ffe1002e4578696600004d4d002a00000008000240000003000000010073000040010001000000010000000000000000ffdb0043000a07070907060a0908090b0b0a0c0f19100f0e0e0f1e161712192420262523202322282d3930282a362b2223324432363b3d4040402630464b453e4a393f403dffdb0043010b0b0b0f0d0f1d10101d3d2923293d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3dffc0001108010a01da03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f19a5a4a5a00292968a0028a28a0038c7bd145140051451400514514005145140051451400514514005145140051451400514678c514005145140051451400514514005145140051d68a2800a28a2800a28a2800a28a2800a28a5620e36820639c9a004a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a28012969296800a28a2800a28a2800ff39a09268e68a0028a28a0028f7ed451f4a0028a28a0028a28a0028a0fa678a2800a28a2800a294e38e3b7af5a4a0028a28a0029c76e06d041039c9ebfe78a6d14005142f5145001451471c7ad00145145001451450014514500145193d68a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a004a28a280168a4a5a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a3d79145001451450014514500145145001451450014514500145141a0028a28a0028a28e38c5001451450014514500145145300a28a2800a28a2800a28a290051451400514514005145140051451400514514005252e3827d292800a5a28a004a5a28f4ed400514514005145140051451c75f7e94005145140051451400514514005145140051451400514514005145140051451400514609ec69c2273d14fe5400da2a5fb2c9e9f9d3c5a37765a2e174573455a166bddff2a5fb345dd89a2e80a9455d11423d4d1b221fc1f9d174052c52e0fa55dcc63a22d1e628e8abf952b88a5b1bd0d3bca73fc27f2ab5e71f6fc293ce6f534ee1a95fc890ff0009a5fb34bfdda9fcd63dcfe749bdbd4d2bb1ea466d241c707e8693ecb27b7e752ef6f5a4f9bd69ea033ec8feabf9d1f656f55fce9ff37ad1f37ad1a8ac37ecadfde5fce93eca7fbcbf9d2fcdeb473ea68d403ec87fbcbf9d1f653fdf14bf89a33ee68d406fd94ff79693ecc7fbcb4fcfb9a33ef46a033eccdeab47d99bd453f79f5fce9bb8d1a8c6fd99bd47e747d99fda9dbcfb52f9868d4447f676a4f25bd2a5f30d1e61a35021f29bd28f29bd0d4de61a3cc3406a56a5a28a06252d145001413939c01ec28a2800a28a2800a28a2800a28a2800a28a3eb4002e32323233d3341c64e38145140074a3a75a28e4fad001453c4121e8a69e2d8ff1301f8d017443455910c43ab13f4a70f297a267eb4ae2b950027a035208647e8a6a7f3b1d140a43331eff0095170bb182d1fb951f534efb328fbcff009537737ad264d1a81279708f534ecc63a20fc6a2c31a708d8f6354a327d04da5d493cdc740a3e8290ccdeb4a9672bf4463f854e9a65c3ff063eb54a949f4173c515bcd6f5a4dc6b4134794f52a2a51a3a8c6e7fd29aa0fab17b45d0cadc68cb1fe55b29a65b0eac4fe34e1656c380a49fcea9515d587b47d8c5f98fad1b18f6adf164bda1207a9147d9c0fe1503e954a947b92e6fb1822263fc27f2a70b690f446fcab74463daa4ca80415e71d738c53f67140a6d9802ce53ff2ccd49f6197fb9f99ad7d8bd7346d5f434f923d85cd2ee647d825f45fce97ec327aad6b6c5f4a3ee76fd334f923d8399f732bec2ffde147d85bfbe3f2ad5c0f4a4d8c0823f9668e55d8577dcccfecf3fdefd293ec3fed7e95aa5247f5fc062a3785c1e847d4628b2ec0dbee677f67ff00b7fa52ff00671eed8fa8abe47007191ed48320e71bbd8d165d8abbee534d28bf4719a9bfb02738c739f4a94839cf3f81a3cc61c6f61ed9a96bb5869aeb72b4ba0dcc232e8c01f6a80d830ea7f4abdf6893a79adf4ce69a4b1ea73492ee90db5d2e679b26f5149f617f5157885f5cfafb534e69d97626efb948d9b8f4fce9a6d5fd055e1c75a71f2c75dd9f6a565d8a4df7337ecd27a521b77f435a05d7a0fd69847d28e55d82ed147ca7fee9a4f29fd0d5ec1f5a39f7a5ca82eccac9200e38f4145145606814514500145145001451450014514726800a29e2263dbf3a70847f130fc280ba22a0027a0a9f11a76cfd68f371d001f4a5715c62c0e7b63eb4f1028fbce3e829a6463de93268d435250225e80b1f734be6e3eeaa8fc2a1c1e2a4489dfa0354a0d89b4b710cac7b9a6ef35652c257fe1c7d78ab09a68fe371f41cd5aa2dee4f3a33b934a118f635ad1d940bd727ebc55848e243f2c60fb9ab5457564ba8fa23152da46e8a7f2ab11e9933f518faf15adbd8630b8fc29c324f233ec39ab5082e82e6932b58f87cdd4c236b9821e092d2b6d518f7f534efec98233869031ce3839cd5e1b0020c633f962a3240cf55f4031fad3ba5b21d9bdd8d8ac21e3112fb9638a9cc504401fdd839e00e6a4274f4b5ded3cd24cc3ee88f001fa93fc8567f9a64249567e30093d3ff00aded52a6d838245c7b88d381f98148f3631d3dfdea18e1697a21e3927a6297c952e0303b73c9eb8fc29b6160371bc91c8f607149e64641dca4b76ef4cfb3485ce06173c646335325b17e181c01da8ba0499189140fba3713d874a9e1bcf28e00e4f1c714b1dba44f975e31c827ad2c896fc98d02827208cf152da7a0d26b5192dfbc990ccc7d89a8448c4f7fcaa4216105b6103e9509ba6e30b819ea78a1596c1abdd92f94d80486f51cd2631d47e66a5f9ca2bf0370e87b54124aa9905b2477e94d360d21d95038a41702323a67d08cd41f6c8f91b58e3a7141958a03b4007d7b51761644fe62fb73e94c79367b5440492e16352ed9c0083ad30c6e31b9738ea4d1762b123dc2f5c8fc2a2fb53678fd69fcf00a803d314b1dbabb80a073cf27145fb859882e5bfbc7f0a76f63c9624fbd4ef6e6124332ee5e7e439fe550ec25b8ce3d4f345d6e82cf60c1eb934873ee6ac471338184638f6a536b2752840fa54f322d44ab9e9f29f7a6b8c9e38faf26a6208edc8f5a69909ce42fe54ee044028ea093f9504a9cfcbfad3b0ac724918f4a4f973c1fe94ae2b0cca8ea2999535311d38feb51381e94c04e4723f9d212d8ce38fad28247ff005e95e5de0008ab8ea477a4d8ec887824d288d8fdd5cfd29411df3576ca548ce77846c7519e6a5c9a4528a6ca5e62a70cb8fa8cd194f4ab537d9dc92307bf150ec8bdbf3a5cc371f330a969296b300a28a508c7a0a004a29e22fef3014ef917a0cfd680b910527a0352085bbe07d694c87b703da9b927bd216a3b6469d493f4a5f300fbaa0547cd2804d3516c3d471909ef4dc9a9a3b591fa29ab11e9dd37b01fad68a9b64b9a451c134f5899fa035a896d0c7d4127dea60ea061500f4356a925b93cefa19b1d84afd4607bf156e3d2900cc9228c761561dd8f5a45049c75feb54925b217337b8c16f047d173ee6a6419fb88063afb53e2b63213c607a13538b5031966c9e0e38cd55c56b954e4756e7d0734e542f80b1b673924f7ab8238d0f08723f1a94499180a42f4c74cd2e61a890c56a072c140f739a71b68c1eadf81c5287407697ebc0029c92283854661dd9b9a96ca4858ed8c9f2c10331f5c66964b5b940370080f63c55b17f2c508556656f638c554795a57f9c9627dea6ed9564910f97b0fcecb8f41cd425e2c39c8041e06339ab8519f85007be691e150392a081daa84538d15faab303dba62ae5b3c36e41f215c8e809c7f2a80b4719c609f73cd3d1f7f62aa475149ab82d352d5c5f35c1e2258d4f55150990678f4e49e29c9b40c28f98f73cd288d2472b93b80e734249206dbdc6072718cd48253110555490739233486164eb902911172429c9efcd310d9a7699cb481727b018a47bc25111b0ca9f7411d2a436e0f2700fe754e6c23ed0c73e82802e497f24c559d532a720ed151e63625b03713927151451b70769c7a9ab0e9c70bf90a06553873f3313525ae94971300cdb031fbc4671f953c4601ce29ff006a68c8d99047420e3152d37b026afa8971a54319386191c1ed9fc2a029e5a1540b827278a990993258fd706a27c0e07ebcd249f51b6ba0d050478d8c25cfde07031f4f5aaee99cf271e953f965fb81408589238c7ae6a92b0af72bbbb13972490300939a7c614fdf3db8e6a2ba1e49c0c1f5355fcc672002a73d051d03a96b1ce4118cf3cd4f14a23ed50c59d856793615195c206c9f4f61efcd440b07258e4753839a5b8f6d8d7b6d556df3b5464f4cf34cb8d5a69b2095c7a018aa0003838e7afa62964f5dd827a92739a5c8af7b0f9ddad7091da4c922abbe791cd49e611d4e7e82a3272e71c7a645513723f2dbb1c7d0d3c44c38c8a379c8e9efda9a5ce7b914068484607a62a2f331eb56657b730c7e4b4bbff8c38000fa62ab140e0f2723d054a771b56d843283da90e0e29876fad37b120f4f7aa112ba7967e60c2a2de7a64e282ec71f2918f4a1c30ee31eb4ac3b88339c0c9cd3fca7feeb7e54e89de270caaa31d011baad7dbe6feec3ff007c54ebd80e74231e829de581d4fe549bcd266b3287e54741f89a43231ffeb5369c2363d01a69362d1087d893f5a2ac4766edd78ab51d92a633c9fcaad537d44e6ba19c2327a0353a59b9ea303deaf22a8e1401f8669c119fa035a282443937b1592d107de39fa55848d13a28fc6a74b638e41cfbd38460301951cf53daaae96c4d9bdc879c77fc38a9228a495c2a0cb31c0c7152141bf6ed2c7a0e7ad5a86d19fd31dc638145ee34ac412d8b5b1c3b44cc47215f763eb8ef4476f263e55e3a138eb5a76d66dcb328c0381934b70e00dbc80bc8c753529bb6a3b2be8538ec9babaa2eee06074a9d238a172b8c9519e075a63dca801ae25c053c28ea6987574d8de5c6493d0918a2e3b16700fccc847a66a369181c05e4f4ed9aa325f49212727dd4511bdcde392149dab92a83a0f538f4a2e1a170ee8fe62caa7df9aacf74a67230d2e4f45381f9d39ec81f2c9463b97764f19ad4b1d1efaf2176b74558a21973c0c0fc7ad4b924aed8d45b7a1404381be45008191939c523cc1011f317fe100002ba0b7f096ad7302b98bf7521c873818fc7b0acfbdd29ac2631cce8eca395439c1f43eff9d66aa45bb265f234aed19fe5b94f34e46083c8c8a48e35c120b3313d318ab27cdba71e74808518059b680076140c600270bdbdead3ee4b4423cd3c02147b0cd1b48eacc4f73d2ac71d8531e32fce4e3d0555c56231b5f1ce714c990a0ca29e7b018ab315bf9641da40ef4499383c7e7d695d058ad0eee85183639e2ac2484391e574ee29bbc9e32453e32bdcfd73da8b8ec4b94913e7621bd05425d63ce14fe1526179395c7ae7150cb32460f39ef42682cc8cdc383c212bec33504b2b1276c673dce33520b80079be5b1627000ed4d4bc67728a8c9bb8e0819fce8b80f490246a1c9538e707ad594b9f340500e3d6b31ca73967dc7b93490c9247b8ef257a720d3e822eccec84e066ab9b8949c795c9e9938a8e3918ef70725464ef38fcbd6a31752971c06cf18c50162d877c10073df0738a1241862e074c29ce307fad16fe7a4e15f6c4ec08c4b8503f3aa3732364a8da0038e0e692777607a2b975e4c60820e69126ea4b630338acf12310012bcf7c53f18236386e3924703f3aa1265d8a14bcb9c493c3120048695881fa77355ca2464b2f964038e0e4d466111b905d5b8c861ce694148d0e19be6ea077a9b6b7b8eeb6b13bdc2ccbbf7af98063684c71f85425c647cc7dc818a88c8a9d323dba54d118a54633cec8ca3e401376ef6f6a76b05ee4891c3e4966329973c0c0dbff00eba0120fdd1f95451cb83d7f0153ec628181520f414b61ad4693c738cfad4523fb034ef25ce490a33d8f34c3b89116c52e4e430ebf4fa531588b7e723a52173d307f1a523920f507069d0a379cbb55589380af8c1fce9376048228d640c5a644da3201cfcdf9504c780074ea734c953cb9195828607040ed4cc93d00a56bea3bdb42c623c6428a8b27b0029fb18a02540c77f5a6ef51c673db81409b13247619fa526f6ea571ef4d69473c1fe5503c8eff004ed9a60581b9cf1d69fe4cbfdd6fcaa0499a19067ef0ea08e95a1fdaf27fd30ffbf753763b1cef9677607353476aefdaa58484392bc3715711247e802afa9a714ad7136d3d0af1d928e64356d23b748f2a72fd940cd3d2d9782c4b9a90148f39daa3b015622bec94ff00b20fe14a2df1d4163f9d4cf32a28db824f2327a53048e70ce70a78a2e2b1222281938cf419ff000ab5670add49b4dc450a0e4b48d8c7e159d24883eee4fa93444739dee506382a339a9776b4652b27aa2f5f470c339586e1645e81c8da0fd01e6abb88506e9252edfdd5aad2464618f43c8c9ce6ac5b5aacdcbcc91201f79b9cd0b45ab13d5e8858ef1b3b6189547404f35644cc9feb246663ced03a54520b6872239438c603118a823b8504eedc55b83ef549dc36dcb26f2627007cbea4f14c1f6897cc62dbc9e3ae314d374083b231d7038a68f3269089a7588753bc918fcbbd170b1179623277b296f4ce7152c64dc13f32c4a071bb27f0fad563804e3f3f5ab76d7496e432c4b2484608750c07a63de93bdb404bb93dad9ef4cb4f1aaee1f29c9cff00f5bfc6ba9d0340b3b9b36b8bbbd86d6256da492496fc3bd731657b2a5cb6218e49181c2c830a3df1d323df8a6c9aadcb7c9e760336e3818e7fcfa56538ca5a2762e2d2d59eab15af862c6104b2c9b88c4857731c8fc867af3561fc4de1cd16078e0589a46527646339e3b9f53c715e451ea7731b9659e41f2ed3f311c7a7ff00aaa7b8bc8bec76f1ac81990125444136e79fbdfc47eb5cff005777d5b66ded55b44773abfc46fb55b2416d6ef0a371233101be83b63a1ae4aff553718ddbda452416ce370fa63f539ac9477126514ee233c9cff9e2a4fb4b492091c2b9e9b5c673e95b428c62ee919b9b6ac4fe68d832d820f0b4b19672aab966638000ce6a897504966e7d07152c5310924c8e5248f0555549fc73db1c7e75ab56466b535f51b2b9d38a2dd4260debb977f048fa75f6e6abdbc8924806e08a4e324d644b7d35c12647676eb96393f99a9ad6f65b73b9768c0201740d8cfd7bd1676d771dd5fc8e8126b211b2cd2cbe6018408a0ee35952c8b9ce48cf4c8acf7b9cf23391c649ab367733b8963864f9590ee0703207d7fa734b96da8f993d0966ba8820f2d19411c92739345b5cdb9910485803c360038fa5677980b9672cc4f60714cde4118c7e355cba58952d4eead6fbc3f0c799a2bbb9981c0054228fae0ff2ae6f55bd533ca52d9628d890abcf1f9f71fe45517bf47dbb2209b4676e7201f51efdff000a8cdd6642ee3ce6639dce4f7ebf8f7a8853b3bbb972a9756248ef258b2c8a9961800a838fcfbd45e6119271cf603a54d159cd35ac93a29d918cb1240c03fa9efd3d2aabed1d1bfad68ad776337748b1148f79347185810818c9f941fa9ee6a47bc6f2c2ec5c0f418cd568a48a29119f730072420c67f3a89dcb13b15803ebcd16d457761f25c0dfc2ae2b6348d6d6cf70934db4ba527244a08c7e47a7d73d2b084792776e07d00c934f2f2c40c6432123952304d0e0a5a31a9b5a972fee5af6e9a668a28831c858860546f1a25aa398d882c4799c804fa7e1fd6abc485f3923f138a9fe6442a63c83d3a9c516b2b20bdf5644668a30c3cbdcc460303d3ffd751890171b9485cf38a93ca91f385551f4c5200a38695718c71cd327509248cc87c90c23cfcbbf96c7be3bd5f8acec5ec0c9717ae97393b6158f7647b9edcd6788c725712281c900f14d795039da985ec09ce29357d98d3b6ad0f30a9249914739c01422479dbb8e73c1271518b923908a3dc0a4121771d0027b0a1dc13573acd1741d3f5201df52862445cb178c8c7d7fc6b535ad3ac61b6fb2d85fdbac0a37e4103cccf7cfa7b7e95c4dd5c22130db337943ab72379f5c1e9f4aae2e65e06f6200c01d71eb5cdec6729733969d8e9f6b18ab245cb80c9215560caa7190739fcaaa91bb717246d1c03939a232b93bd9be61d8e2a68c02bfebb38ae85a6862f5d48bf70212de692e083b48ebf8fb544f22382700127a0e31533f963e5765009e4819c54d0e926e3cc90ca8b120c8cb8cbfd31d28d106aca9205448c8642cc324039c7ff5e9d14813240e9c81d2abb828e5769e0e38e6a41137965f70001c609c1a34b06ad9af1595b4d6525c35fc08cbd212c771fd2b2a6da3856e3d8d304aa1c1705973c80704fe3511c7e07919ef52934f71b69ad10e0ea0827e6e7953d0d34a170580381d7da81230e9b476e94a64674f9b7301c0ec05512353cb0572fc1eb819c558df6dff003ddffefdff00f5eaa973b02f1b41ce314dcff9c54d8639036318e6af477270038c374eb50076738e067b018c56843269f6f6c0cd04f34cc3a16d8a3f2e4fe945ec3dc6433485d8058db20850f9e7f2ef4d11b445b71da40e48e6a64d4dd30b07976e8c304a0e83ebd6a8cb2873f2eef5c9342bb7a83692d09024791bb7053d4fa53643182766edbdb3cd2dac22e64c3cf1429dde56c01fd49f6149308a29d96de532a29e1caedcfe155757b136d2e350b82194e083904f6a09c1e4e73c938a889cf26824f19cf4e3354224079e3d7bd48914934c2343bd89c0e719fcfb557cd0e0a12a7191d7073431139023720957c7070720d26f0492ca3a60638c533e6d838e33d40abb63a55cdff16ea19b3800903f9d4b692bb1a4dbd8aa0f521b047207ad0771e4e7e6ee7bd695e6837fa75ea5acd0869d802ab1b87ce7e9525fd85dc30c3777d34387e238c4819801e8a3a01ef8ebde973ad2cf71f23b3ba33228d9c90158b30c0c56c1f0dcf6b6c27bf9a1b456195476cc8df451cf3f8564099c3e4311818ce7a0a04a5c92c158b0c16724e3ff00af43bbd982b2dc7cdb4170a7e5071cf0cdf5a8939ce481819c1ef4a114105f3e593824119a4f99f0c1542e71e99aa4264e814a090c2e2253b5981ce4fe3d0d124a22408a8b96f98b1e4fff005be951c314f2c72ec0c635196c671f8fff005e9850b90db42ab761c74a01928bc943870edb94601f61fd2a48efa648e50afe5ac8bb5b6afdef51558207c850cc7afca338148f2c8e811998a2fdd52785a2c985da143e4fb54c1e3fba075e0f355be50dc1047ae2a58cf946394aa38ce76927f5c5364adcd11a65c0b0379f6590db83b4cbb7807d33eb55ee2f55ed62863b78936e4b483259cfbfa01e82a07bdb87554f31c2a925541200cfa0f7a80b92493cb13924d4a4fa94dae81bcf618ed934e122ec21812c7a1cf4a238a499d52346776380a83249a26592d9de36578e419565618fc3f4aabad89b3b5c424901b8db9c669d1c82305863729c8c807f9d4033d69dce39c7af5c668608943afd988080beee5b1d07ff005ffa75a8b27d7a55bb0114722cb73133c00e19471bbdb3fad25e1b5cedb4562149cc8dc6eff80f6c7d4d4a96b6b14e2ed7b9591c860738f7ab96c2d9f02491c313c81d05533bb038fa53a3210fcd9fa8e71544a3660d352ea610daa991db851bb19ab573e1b96c21596ed8c4ec70232406fae3d3deb23eda2df214b16ea3241c7e54c92fa5b875f9c96c639e7352f99b567a169c52d56a5c296c0e4ab12bfc45b1504b2db4af96462718dc589a8f0e155e707638c8c9ce47f4a4bcf223b993ecc08849c2abb6e207d475a69eb6135a09f6948f22344fd4e7f3a67db64ff64739040e9503c6c006e30c3230734e16d29b633843e529da5bd0d3d09d7a17edb5585242d7d651dd647277b21fd2a94d7092c85d614453d1573c7e75160d484448546d6e4725bfc3d29592771ddb56647e61d8465b93d01e290053d5883db8ce6a402344ddcb31e36b0fd7eb4d4192063a9a771598de3f1ab3673450c81e6b78e74507e572403f5c7350141bc83f2e0e083ce2ace9d74d65791cca8ae54e76b0041fc0d296cca8ab3d482e64f3a53205dbb8e71d71ff00eaa489d627dcc9bb03804f19f7f6a9af6e16e679255408198b05150a6d72431da31d40cd25b14f7d069977f50334170e4f1b57b01ce290e3d2a44b858e178cc11396e4310772fd31ff00d7a1f9097984370b1392d1ac8a460ab834e0497645560e4f001e9fe355727352c33342e1936920e70406fe7435d50d32e5ac82ce6592789a4643911918e47afb53351bf6bd9cc8d1c2858e4ac49b147e15a67c5b791a790ed0dc43b76f30856008fba0819005625cc8b260ab3371ce57a56714dbbb45b692d190173cf03ad2c522a480ba075072549233f952978c20d9b8315c30201c9f6f41d2a33d4e0823d477ad3733d8748e8f2128bb149e1739c5341c7ae0f5c5271c60fd7da9d246c99f9958038ca9ce690798de79201207538ce2937ffb2bf953d63c8243e33d47ad331f4a604f1bf2368390739e98ab12491ec4e9bf9ce0e7ff00d58aa59527e5c81ee7341206707201e0f4cd2b05c9de4c803000ce738c5479a6668e38e73ebed4d087e79a013db39e9c532979a007a394707ba9cd2e0b966fc4e4d47cf6e7e94e4ea0e01fad301db0f5edd6a4fb390e141562467e539ff26addbc535e21552a06790a3e639e3ea6baed0fc376ba6db4ba86b7b21884798526186249ea13b8c73ce3f1ace7554579f62e34dc8e36dec6e6e1cc51c72395058a8ed8ea69a53ca257712c38041e2ba3d4f58b5921fb26956d05b420ee695cee693ebc7e9d07eb581348c91ac7e692a5b7151d8fad106e5ab560924b6772277627e5ce3180718cff008d35c3260be3e6191cf5a7a38889c3b062304f4e0ff8d341c13c67d09157621b1ae43b92aa0293c01ce3f3adcf0e7872ef5f792dad842bb86ef32438c63fa7359370e64937ee321206588c7e9e83a53e1b8b81202b3321c601076e3f2a9926d69a31c6d7d47de5aad8dd342b224af1b152ca720fff005aab97ca0c2803393c63fc8ab172227b926d9a5915bab4a0658f7e07bfd69d6f64cf32abc3330271b51704ff00f5e9a765763b5de8541230e03100f606adcb1e9e967132b5cb5c3677a3280abe983df3f862ba3d33c3fa69f325bc91e045216359958991bdb1d40ea4f1c76ac1bcb36374f1212ee5be52a32081dfe9dea5545276457234aeca86569a48d2356dd8db8e39f61ed8f5a7dbf94fbd66c608c06ea47f850f6d6e9190d393306c150bf2803beeee4fa7eb55e491a4c2e170bc00062ab7d113b6ac7dd0b68e422d1a468f030d2000fe42a0738000cfa9c9eb4a43e0b11800e3ad34024fd3a639c552d097a9342e91c2e4a2bc8c30a49fbbef8f5a8870093f8719cd695ae9b0cb0a5d4ef247681b64b2001887c6785ef9ff001aa9711c3f7e3663924052b8c0fad2524dd90dc5a4471162ea7cc29b78ddd31f95309c393bb760f0739a95e392e660b1c3b5b00051c7f3fcea33181dc67382b9e9ff00d6a2e84d31a5f7bee6e72727b669c923445594e194e463b558b1b79ae2e556380ccc4e7cb0339fc0569c3e18d42e6446fb2b2472bed56d8402476f5a99548c746ca8d36f5466dc5fdd4b0243310634259576818cff008d542e3b77eb57ae74eb859da1f21bcc56c631cfe5f4e6ab08986328493dbd6a9356d0249df5182377f9946140cee3c0a7c770d142c8b1a6e63feb08cb0fa7a54e8669a444eca72b181855fc2848ca480f948558e5778c023fc2872e8251ea436f12bef66c00ab91938fff005d5886da1304aef3fef88c244133bb3df3d063f3a922bcd967e4fd9a0259b2243182df9d4b6f0a905be6f34118180411efef59b93d7a1a460b4287d99b0582330032703200a88800120e01e76d7606db513e1d78d612b0c530670101edc7cdd71fa7358b73a65e491c7f248a4aef0b20dbf2fb13d4714a1553ea39d16b631fa0dd91d7007ad3b05c8c1258f2540c512bb796b190a02138200079f7ef4f86f5a38e48d82bac9d491c8fa1fe95b6a63649d8b71d95bc4e5679964565c868f3f29fc473c66ac47a3caeea238926f35772e5b6ede7ebd71dbdea9dbcc4bc70c643231c905704fb715e8be123a3e8f6f1c9abc6f1b5d2968d655ca03ede87b7afbd73569b82bad59d14e0a4b5479f4d6525ac855e35c8e304e41edfe7e955c43260b6d1b41c127a57af6a5e1fd0af12ee6b2b984dc32ee3082acc0e3a0039e781c7ad70baadc69f316c5b5ce63876ac6c0260803dba75e9cd4c310e5a58a7456e99cc26d0e1645ce46300e315774db492412edba862df1b2952725b1ce303d7154e6f2422111bee27e60cd9c8fe87afad68e9971631482490ce9b083946c1c7d6b69b76d0ce295eccca71d4e4e3b64629237449033a964072ca0e323ebdab7f5afec074126993dcfce773452800afa8e9d7af3cf5ac28d10cc76ca1173c17a7195d6a9a21ab3d18c964532398c10878009c902a7b0b35966613cf15b9552c04a08ddc671c74cd6943e1c6bab2796deea19255018a004e149c75f5cf63db9cf6ac7923912428e18b03b79f6a1352ba4c1a71d5a2023927dea48c47c872cbc70c0671ff00d6a7451367ee92075f6ab77e96a8908b6924906c05f726dc1f4fa55396b6125a5cce72cee5998b13dcf39a4c63ad4e8782aa320f4e2a128c7b9207af6a771598e9a18e308d1cbbc30c90460afb5406ae456c651b46493d39e952cda3dcdb902689d188c8054f353cc968d8f964f548cfe29f1a4643190b6e03e5006734f6b4953398dbea05312de5704a2b70339028ba7b024d6e0114ff00163db1d6a4e7fe7ad36240f91b58b28c9e7152796be9401528cd0411d6814c051cd5a36ca2da3904cad239c0880391f5ed8a8843c0c67246718ad5b1d0ee6e617716b2c859711a80464fafd00cd272496ac146fd0c8c1cf34f7792520bb33606d19e702b525d06e6d90bc91168c705c7dd07d33dcfd2a68f4e861b533b3bc85464ac519207a658f039a5ceb71f233212262fc0619e84d59b7b2209f3dd6140324b8c93ec07afe94f1aacb0b87b748e2703024032df99e87dc62a296eae4dcadc8ba7965003798492ca7a753dc536dbd01248d5b6f11cda48923d399a2c91991d417ffeb0f61f9d54bdd6eeb539fccbd91ae1fa65cf359c03cce796663f31e339ff003d695e358b682e0be7e650338fc7de92846f7b6a0e6ed6e8589258a4e113cb0c4031292d9f7c9f5f4a7879a12bb2268dd46f552b83f5e7b5571145bd42c8482b966dbf74fa7ff5e84f2fcc60f2151827763766aada1370925692669243ba4639248c734e85d8cd185dacc186037ddfc73daa120003effcc78246322a6b69225c9780ca403805f681fe38a6f45a025764f71712df5cc92ce630ee727620503e807007d2ad5b9b6c046b663c60b29c1cfaf3fe7f9d45a70b7fb50f311595f8dbf31c73eddf19af4bd1f48d2aefcb161611c849cb4d741c84f6db9e4f078c8ac2a5650b268da9d272bb39dd27c1973a8db25d5be4a9eaac84301ea3d6bb4b4f06db45321672b218c069049c9e3ef73df3915d0450dbe9ae641792e48da7712cabcf61d00cfd7eb56c3db490bc8a50ae7e66030a7dfe95c73aae5d4d9452e8707e24d26296f237b9bb816ded30a200df3b2e3b91d3b93c773d6b8bf10ec9662f6aa63b470163d830ac07719c13ce464e4fd3a57ab6a7fd99169b757d09b7de015f3e40190374c67b1e4e3deb82bef106816462bad2eda47b988e23171f36df46e723031d38e4e6ae9377565714ed6d4e3cc765140d9669252e0138c00bdf193d4f1c7b76a8a67b447616f1cc1323e594824fd71d33edff00d7a96f75237d72d3dcaafcc49c200b93545e43212e76e49c6de9fe7eb5db14f767336ba0d3f3b96f9572738518c56858c515cc8a641b225014b60229c73d7b93f99aab15d2c76c62fb344d23367ce20961ec3b7bd364761210aec514fca48c7e9d8d3777a0934b53d2b48b2f0d6b5a39d3e18654b98892b3bb2a6f73fd3a0e83eb9ac7d63c3f3d8792fa8c36f6d6b180a1e1f9c37eb939eb589e1fd6e6d2ef5e749a28b729525e3de067a1dbd320e0ff004355f57d465bdbf90cd7725d00c479cdc6e1ec3b0f6ae754e6a7a3d0ddd48f2ddad4bb79a8e911e9462b58277be90e1a776c0007a0c93923e958af7b2bc2200544438daaa067ff00affe14c7f28f0b2312c7a118c5363d80e09c8efc574c60923194aecd9d1f529743b95bc8e4804aab95190dbb3dbdb1dfa7e75b32fc44d5823882e163123124039619f7ff000c572f751d8870b6d2ccca1412ce0024f7e9daaa0da5fe563c1c8cf159ba3093e66b52bda38ab22d5d5fcf7172659a56793bb16c93500b860e0a3b29072a41c63f1a65c14f942153b472c3bd22452491b4a1094538273d2b54925a19b936cb96d7d25aee9edee648ee704023d0f079f5a6fda59cf98d8dcc001b7e5c63dbdea86ffe1dd900f6a5cf3c71472adc39dec6c25ede4d662d17e68632652a141c1eec4f5ad1b2be99e7792e5a6950fcf2f1bba7427e838c9c57371cbb063f8bb1e98ad48af2e7498d44176184b832450cc7903fbc47739231dab29c2ead635854b6acf4883c6da7ea96434cb88cd9c53e23770705727ef67d7f9d71f7ba6de4705c0912ea7841fdd384dca727b93f77d71df3e9cd73cf7f34f846e42904291c8c7bf5c62b462f12ea71d847690dcee40c42c6188273ebea07bd62a8387c269ed632663dd44d13ec2141032707fcfe555aaf4b35b5c46c5e16497713b95b39f639f43ce696eb4c586ce0b986659629061981030ffddc75e3d481ed5d5195ac99cf28dddd14e1936383ce474ad9b6f125d2c71c324c861452a17cb0c541392464753eb587800f43f974a98328840552ae1b716ff3e94a718cb7571c64d753aed275ab3bcbab7fb6e97030886167493ca6e3a649f949fa8ad0d7e492eb4c898db44efb594f973879189e8481c771c8f522b8c8ef9e549229d83f998c3118da7d7a7a7153d8cda869b7e24b31fbe4180c803f07ff00d7f8573ba2af75a58de3574b772a4bba4902aa977030485e7ffaf8f5a6fd82e5e10e2de7299fbde590055f8ef6eec2ea4059a29493909f2b29f627a1edf8d347893538e331adfdcec272479879ad6f3e8919b51eacaada65edb8226b7962dc31fbc42b9fcea2fb14dfdc35d3e9be208eea18d354b55b948d88334d3b2900fe3d475e2af585d786b4ad424672faa44e3e40e36aa67d73c923a76a875a4ae9ad7c86a927aa672114734390a1958f1b8122aec52b4783208a418da411d7ff00afef5e8f6ba678375b31a5b8549a419d8252083e801ea6ae6a5e14d174b844915a5a14c61a4b82cc07e03a1fceb3fadc56e996a83dae79a69b75616b788f7706e8c312086cb81f8f040f4aa921b44bf966b499a146462aa403f37a1cf63537886d8dbdd136f6f024192aa6025d491f5e41f638ac32e643c8f9ba600eb5bc1297bddcca6dc74ec49287f3bce32a33752471fe4d5b4d4eca2b60ab6f234c09218b8da33ec4727f4f4c566988646495fa8a6ec88704b13f4c568e0990a6d6c5d8b538e12196dc3100643b1ede98e86b5ae7c6f7b71651da886dd228c602ecdd91dbafa573fbe3c6155723a92719a8cba761cf7a874a0dddab94aac96ccdf8bc637b1c2f13adbb46c385f240c1f5e3a1159526af34872c1700e4051b71f9551771da9b4d422b6427393dd9a56b756cf3402e23644561be48ce588cfa1e335d87f69f83bfe9f7ff0001e3ae0122739c2f18ce4f14b83eabf9d2704c14da16484c4402c8770cfc8c1b1562d6c5ee278e35c12fc8c738a8a320c9fb85c63e61bce4f153191907258608200e3145dec8343d1340d37c3da6d9c773773c52dc282cd920b0e39007f5f5a6eafe3b8b61874ab4519e3cc940057b600f41ef5c37db0c8e1a673c0c1da319efc9ee79a8a5795c80a0a86e43118cff00f5ab054137cd37736755dad1562cea5ab5edfcdbeeee5a460785cf03f0aa6f717260f28cd20889c94dc4293f4f6a912dd7cb32c9295936ef1c1e3ffd7c7ff5aa53f6149a402569502e72176ee3f8f4c71faf5adb45a246766f56ca09134992aa5b68c9c55c741343fbb5511c430a401dff00bcc3be73d6a2bdb9de91c4b22baa12728bb5727d3b9f4e6aaef20632d83c95ec6ab57a93a22cdccd11908b7468e25e002db8f4e79f7393f8d5772aee7cb52a98e0139a663dff00fad52988001b77ca4fcbb86091ebfd29a5613bb1e846c236e0e73bb3417e081c6ee58f5cd3e278b7e6456645fe1438c8efcf6a4bcb98ee2e5e4820582327e58c12db7db268bebb05b4b8af6f32471cb223ac4e09462386c7a7e34b1bc6e55582f03018f007d714c88b49f282c58708a06724ff002a90d9cb0dcb4775ba19172583292411db03bd17ee16ec6858f882ef4c81e2b33147b8619fcb56623a1193d07d2af59f8ab5088c856661095dad1bb640ed90077e3a7bfe35856b6ed24e84b79699c9908cedf7fc3ad3af4c22e5d2d8c92440e23790618fb903d7fad44a1093b3572d4e495d33aab0f13dcc8ed0fdb56c6194ee919977a9c7a0e4e4fa0adbd0fc4b733de132448f130748d83000fcb85dcbd001c726bcf7cc492d238bc90255624cc5c8dc3b2e3a0039e7be6a3170b1e7e76ce3a29c566e826b445aacd3d59db78b57505d3639eee18ed619a4628914c3e727bb28eb803afb8c5719221076b6172324b0e95a36fe2c9ed61d96d05b24a460dc3c41e4c7d4f4c7b0fc6b22594c8e5c3333b1c9279ad2941c159a22a4d49dd093048cfcae5fdf18a87cd033803a639e69247329048f9b1838ef4c208ed5b2462df61e252327f2a5f333c927f3a8bfa5267d471ed4c92cc93138cb6768c0e3a522b99339e8a339aae3dcfd294391d3d7340ee4991dba934f441b093d48f94fa547e6904118cf53914be73172c768e7a6302802796290942abc38e003d71d6a18a19662760e40e73c67ff00af539ba474440a073c903fcf5a7497030aa11bcc52006048271fd6802b26d8dc799fc2725477ff000a24b86932000a84e428e00a9a6b849266728bf32fcd818c9f5aa848ed40878e718ef5221538076f23009ed51c60b718e07524e2a479110feed41c1c863fe140d31f222c64632507438c6ea6bc6c9b437de619c7a533cd795cf392c7273ce6a4965523920b139231d3f1a02e201221e01191919a57762006009ce738ff003c5344adc671ed9ef43b8de4b72de9da80b860f04f7e4639a9e366b524a28f319701f382bf4fe5ce6a14b864e8064f19a3ed0dcfafad26ae52958b56d7a880acd6a9719392c490df98abcfaae9b346216d2960dc7e696199b7019f43c103d0fa75ef588f2b38009e3db8cd2073d07e952e09bb8f9ddac68dcff670ba905b7da0db8c794ce0066f5ddcf1f419a92cee1eca459ece701d7e60c84a91f5cff4cf5ac9c8ef4a642703b7602938dd5814b5b9de5c68b73e2ab66beb6dd24a240b2ef21c8cf3bb8e71fcab9c92ca1b09a4b4d46d244b859002e09c28ff0074f507af6e2ab6997d796b751bda4d224abc8642498c0fe400a94eb135fdcdc49a8ccd24728fde0ebb8fb13d3d6b150945b57d0d9c94ba6a549a192db23cc0d18621590ee56fa7ff005fd6a112903af3e944929772c8cc31c0e719f4e9df15a51dd2eb43ecf76635b80a16de5d817a7f01c763ea7a1ad1b695da2159bb22adb5f3dbcc8fb9c6d39ca1c11f4f7ad497c4b7b89adbed4de4ca368e776dcf3c7a67dbdeb16face4b0b968242a5940c95e838cfe950657d307b77a1d38cecec355251ba2edd3cd6d33a170e14e37a3654fd08eb5585cb0c61573ea46688aea6891a3495846dd541e0d44640e30ca3fde031549344369892485d8934dc8ef523dbb60346c2443c023a8fa8ed5171d0e7ebe9549a64d981a4a0d250028033cf4f6a9449145182a0b4a0e431e82a342b9cb741ed9cd3a6789f1e5aedc0c1f7a0632499e42496e58e4e38a8f3fe734e2fc8200040c71c66999a433552e9e281a38562447c0f300f9bf3eb8ed51a5b348e092141190ce719fc7f3a8c5cc62646f2be45072a0f5a64d2b48ff003c9bd8746049cfff00aab34acca6eeb53487d8e1b60fbc3cbe60c2927057bf1f5e3d6ab5ceab35cc70c6dff2c576a107181ce7f3cfe954491c75cf7cd287001ca82586013da9a4ba836f64486e257ce646208c119a7dbdb49718d884866da0f4c9f4fad4009008f5ebc55bb571e44ffb9576c0dac4e0a73d877cfe38144b45a0a2aef52feb1a3c3a48488ddc13dd6079a91b6ef2cff7723a91dcf4ec3d6b240c900024d598ad448737120b78f69219813bbd80f53d3b5384966966235899a7720b4cc788f07a281d7231c9fc2926d2b3d594d26eeb44473492470c704888a149206d00e7dc8e7f3a8339c73dba9e7153f9208c8e48e47bd3651e63a948b62e00c024e7ff00d75695896ee110746c8daa181019c7078fe7fe353457861b6923fb340ed28da1dd77320f41e9cf7a70b69a38558bb4614e4063d0fb0ec6a02926f0ab1b7270188c7ffaa8b5f70bdb6119de47321621810339c54d15c6cf9db73498c0624f03bfe7d2a9cb72c4953c6d3d00a40edd067f2a76b93768ecf4cf10e9769e1c96c6ea0f365c178194731b1ec49edc03dfad72d7170aee5d4f2c73eb558861c1201c6704d34fd473e94a30516df71ca6e4921c64638c9a01c90299466b4209b0319c8fce9082fd324fb735153b2c075c678a043c8d808279cf4a613ef41ef9ea3a1f5a6efc671c03c6280b0b9a4a324f1ef4f11b1e9927d3ad02194ef2d8004f43d297cb64c92bf81a379fba738fad0037049c0a4a5248391c7d29dbc6c501572bd4e339ff00f5500202538c75e46454865619460d91d89e94f8e41c08e3cc841f98f63ffd6aae019189ce49ea4f7a00324d2538c6c3ae073eb4efdd60f249ec2801a43040dd031c0f7a6d3cee2002ac428f978f5fe948809703193f5c50001ca038c64f7a0139cfbf5a9123842167909618c2818cfe35113963c01e8076a0071f5cf04f1de8ce79c537b67d38a5e9d6801476cd2123b52fcb83c9f61487b0078ebc8c500038ebf90a7ef24703029bdb807df9a7897611b47239c119a0a1e2dd8807a6464678a8dc28e17248eac287767c658927d4e693632751dba1a00505a3e412a5873db23ffaf4b23af971aa927032c48c727fc2a33f8e71df9cd282a9cb2e79fa54d8771472d85527d0669c52443831b29ef918a7bdc3c80b65540c0da38a87782d92cc7279cf34c0bd2235c59867b8cc910e548ce17ebdce7b5502083c67af18ad0d22fad6caf565bcb24bd84020c3212b9cfb8e8475cd56b975333c918d88cc48038c7b54ad341bd750fb14c2d9a760a88a40daec0337d17a9c5571232e307807201e68259c92c493dc9e734d3c50afd41dba0b9e73d2a749a238f3e12582fde43827dc83c1f4ed55bf977a710b82771ebc023ad0d5c13b1262239c330cf4c8a536b200ae54f96c70ae3a1fc7d6a1c9f5156bedb2c96c96e5cf92adb820e003d33f5c719a5a8f4657f2c9cfeb4c718c55cd9c0e33e869863073c668028e68c9ab62d86fcf6a7fd957d28012ce5b688b9b985a5c8c280718f7f7c0aae4e73fa534927af5a9001b0fa9f6a56b3b8ef7d01e268c296180c3239e48a6d3bcb2012dc71900f7a952d8bda9983024360ad3422344c91e9ef5af6170b0e9b3c28f99256c851c1e3bfe159586c9039dabb8e39c0a58e6500a3a60e72187045164f704dad87cc64120598b3b838c67269b0d9cf732150368048258e31562c236ba9e4919c2478c31f5abcf0ac923246a232b8c9c649a76ea065491adb128b23338eac3802a7b5d45906c2327392c0649a8ef1192e4b36724e429e6aabccef216e0163d14629dc47451c91df028c09dbced3c555d4dcdac38825e241f32d65dbcd2c409490a96e0e0d4928690079255de467078a604515ac920dffc39ea4649ab7f6ad876e01603078c9aae974c308ccc500e003d698e573b97209fc6908b12181f2cea7711d8f4aae46ffb8b803d2943f94879059d70707381fe34c490a7ddfe54c0077dd93c7ad0492492724f527bd3bed0ddc29e31d29b900838c83ce334007ae29c4ae07ccc491cf6a41b79241c76c1e94cfc6801d93cf4e7d69b4a08a2988747b72339c77a5f30a7dd623e9c5333e981c638ef4ec29e7a0039ef9a0050d9c824f3d093d29a1b1d79f6a43db07391cfb5250161734be9eb4da70041eb82281587a4ac808c0e46391d3ffaf4dcf5f53de9bce6973400e11b142dd87a9c51d4fb9e3d2a4923938fdd30e3390339a4f2581507019870280b13dc97952d86f1b845b36fd0f4fc6aa743e9eb52946f314600652063d69258c3c859581dc4920f18a006c981800eee39a494047214e40fe2c6334a01523231db8a59426f1b4f0060e4628019bf8c76ce6970301bd4f4a01ea4e318c63ae69a71c75e9400fe30428c927834ef2fe4cff1fa1e2989d81e9dbdaa7d9e6229dc723824f61401080deb41420123ae3b1e95612dd4156cef5ce1b0718a89f237704ae7827fcf5a4322191daa41230fe1e3b023a50f111b36b060c3270738a91ca91f285c631c1a006c9724e08e029cafb530c8652ccedb9d8e4934d950a1ff00ebd309c743f5a063ce403c0c1ef4dc9c9279f7f5a6e4d1400edf8e991f8f5a73cccf8ce3818e05460fb53b21893c0e3d2900b92e84f1953ebfd290606093d47d69d118c382f86c1c953c034afb0e30318f7a431b91fc271c7534ff00281e33db34d4e471c7d6a4c1e3e6009ebef4011f93df3f4e2906d4cee3c8a7b9c13820f6a88a609cf534864a6e490071b54600c628f3718cf7e9508c91b78c53fca6238e940138994f4cd49bcfb7e754ca30ce071de8cb7afe945c095ad1d203312a220db339c127af4a58ae96d72614567c70ee338fa0ff001cd325bbf3502b202776e2c4e58f6fca92da15b87705b0154b1c77a949bdca6d2d88cbb392c49c93924f7a92295a174957f84faf5a8dd360c93c6781516f26a892612b23ee5386f51c53a4712618fdef5c63350f35220cb8ce71df14012dba3bc72ed70bb472a7bfff00aaa592f65277effdeae1770ef503bb4984c61506028e3141da921412131120938ebffd7a770246b89229c172b29033cf20e69b6f0b5cce02ae01392476a8e421df2abb57a002add94a61cf19cf34f702e3dbdbdb26c8c062c70188f987ff005eb26e301c8ee0f5ce6b45e46f2c31c6e27b76ace9119c9c64927eb4302114b9a992cee082444c463278ed517438208f634804a29c91b39f9549fa0a78b673c9c0f626a84459a7c686470a1957dd8e291f68cfcc38f4a677e39a570b120c9200049278c0eb48e190904608e083da9e87cb208dbbb1d739c5365752e4aee23d49ce6988653b34de3b5266801fc63f9514da773de800a5c0db9c8ce718a4e3f1a6d003a8a38c52819fc3d4d00031dcfd3dea49b6a49842bb474c1cd30904f0290edc0c1e71cd310be63600dc401d003d29c93303f78f1d33cd47450049e663919c91834a266c8271c0c74a8f27f4c1a4cd03b121998bee38ce734a1f28c180cf5c9ed4cde4e33d053a490c982c4127a9e99a056109007d69bf5a53b481827713c8c74a6e68b858941181d4e3a6682fbf3c92c7a0f4a673807f0a7238da79008f5ef4807c7e682304ae6a491d87dec11dcfad41e682475fc290c8d9edcd031de6363a67d4f4cd468eb8e41fa83d291dd9fb9c7a5376f148649e63141d368181519a90467a773d2828a31b8f38edcd022314ec1c528dbef8c734e0718c370381c671400c03e9f43de94a1ebd8fa53e5110c14639ce08c640a68915092003d866818d09c8ce76938240cd4896ceee57705c7396e29be6b631bb0a4e7029039279248f7e69012f92d8c175c8e801ce699bd91f7020fd452a462439dc005f5ef4c700e719ebeb9a063902bef63b8606411eb4dcf9b260e557b0ce714a1ca630a30060f1d69bbf19f978a403e191619158a862a7383cd3ee2e15e76703018e401c015002a739ce69a53d0d004fe6a91d71f5e68f317fbc3f2aac4351cd0002a6b794c5306edd0fb8a4baff008fc9ff00eba37f3a60edf5a402cc4990e7d78c76a6529ea7eb494c078c73c818f6eb52465539ce783919c66a2141feb400ff00c73e94a3e73fcea3fe1352454087e07e356add07563c1aae3bd581d3f0aa0254467071f539e6a38d3ca9c10b903ad496fd4fd29b27de3f414c0d3dfbe2240ebd85549ac200e8f83c9c9cf5ab36bf70fd2a3bcedf434808ccd0c4582ed0a473ed54a6e41652a0633c9eb5524ea7eb449fea97f1a008393cfbd2a120d140a943178fafe940a4a2a842feb4b4503a8a003279a760905cb0383c8cf3ff00eaa69eb47a5310514506801c88cf800139e38e68208620f638ab5a57fc8420ff0078ff002aaf37fae7fad00479a7019193c0e9934da7bf41400ccd3875fe54da0751f5a0071e99ec69b4e3dfeb4dff000a007c71b48485c703273c62933d6913bfd292801c0f239200ee39c537f1a77f01fad345003f61c6e3dfd2984fd7352a743515002669771a6d3a8186fa0d14fec7e94802376570ca5811d08e28911864b0ebce69ff00c14d7e9f8500461cf4c9c75233c5481d0f55c7e3511a4148093e539c67fc69be593c8cd393b7d6a6ee2802b6083cf6a37f1534bdea25e9f8d2180239e073eb417c7ff5a9add4d20e868116d248fc93d77762074a6e57a1ebf4a8053fd2801e625e7907d3150b8c741f8834f3de9a9f72818d1210318a3cca1fb574b69ff1e707fd735fe54867ffd9, 0, '2021-12-28 10:55:24', NULL, '2021-12-28 10:55:24', NULL),
(2, '2', 'Nguoi dung 2', 'email@example.com', '2021-12-28 11:00:28', 0, 0, NULL, 'unknow', 'unknow', 'unknow', NULL, NULL, 0, NULL, 0, '2021-12-28 11:00:28', NULL, '2021-12-28 11:00:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `manager` int(11) NOT NULL,
  `leader` int(11) NOT NULL,
  `price` int(50) NOT NULL,
  `document` text NOT NULL,
  `repository` varchar(500) NOT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type_equiments`
--

CREATE TABLE `type_equiments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `contract_type_id` int(11) DEFAULT NULL,
  `profile_id` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `updated_time` datetime DEFAULT NULL,
  `updated_user` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_id`, `contract_type_id`, `profile_id`, `password`, `del_flag`, `updated_time`, `updated_user`, `created_time`, `created_user`) VALUES
(1, '1', NULL, '', '1', 0, '2021-12-19 10:54:34', NULL, '2021-12-19 10:54:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_type`
--
ALTER TABLE `contract_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_reason`
--
ALTER TABLE `leave_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_equiments`
--
ALTER TABLE `type_equiments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contract_type`
--
ALTER TABLE `contract_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_reason`
--
ALTER TABLE `leave_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_equiments`
--
ALTER TABLE `type_equiments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
