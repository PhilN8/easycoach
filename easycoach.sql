-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 07:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycoach`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `purchase_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `id_number` int(11) NOT NULL,
  `tel_no` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `route_id` int(11) NOT NULL,
  `number_of_seats` int(3) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`purchase_id`, `first_name`, `last_name`, `id_number`, `tel_no`, `departure_date`, `route_id`, `number_of_seats`, `total_cost`, `role`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Tarik', 'Ahmed', 24015266, 715869923, '2022-06-29', 5, 4, 5600, 3, '2022-06-29 20:02:30', '2022-06-29 20:04:30', 0),
(2, 'Rotich', 'Paul', 16511263, 45696132, '2022-06-29', 16, 4, 6000, 3, '2022-06-29 20:47:53', '2022-06-29 20:47:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'non_user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routes`
--

CREATE TABLE `tbl_routes` (
  `route_id` int(11) NOT NULL,
  `departure` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `cost` int(5) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_routes`
--

INSERT INTO `tbl_routes` (`route_id`, `departure`, `destination`, `cost`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Nairobi', 'Kisumu', 2500, '2022-06-24 02:17:22', '2022-06-29 14:53:02', 0),
(2, 'Nairobi', 'Mombasa', 1500, '2022-06-24 02:17:22', '2022-06-24 02:17:22', 0),
(3, 'Nairobi', 'Nakuru', 2500, '2022-06-24 02:17:22', '2022-06-27 01:18:34', 0),
(4, 'Nairobi', 'Marsabit', 1400, '2022-06-24 02:17:22', '2022-06-24 02:17:22', 0),
(5, 'Nairobi', 'Kitale', 1400, '2022-06-24 02:17:22', '2022-06-24 02:17:22', 0),
(11, 'Nairobi', 'Eldoret', 1200, '2022-06-26 13:23:38', '2022-06-26 13:23:38', 0),
(12, 'Nairobi', 'Mandera', 1700, '2022-06-26 14:31:57', '2022-06-26 14:31:57', 0),
(13, 'Nairobi', 'Kilifi', 2000, '2022-06-26 20:01:42', '2022-06-26 20:01:42', 0),
(14, 'Nairobi', 'Busia', 1500, '2022-06-26 20:04:46', '2022-06-28 20:29:59', 0),
(15, 'Nairobi', 'Kisii', 1200, '2022-06-28 20:29:46', '2022-06-28 20:29:46', 0),
(16, 'Nairobi', 'Kerugoya', 1500, '2022-06-28 21:05:28', '2022-06-28 21:05:52', 0),
(17, 'Nairobi', 'Homa Bay', 2200, '2022-06-29 14:53:40', '2022-06-29 14:53:40', 0),
(18, 'Mombasa', 'Nairobi', 1500, '2022-06-29 14:57:28', '2022-06-29 14:57:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket`
--

CREATE TABLE `tbl_ticket` (
  `ticket_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `seat_number` int(2) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`ticket_id`, `purchase_id`, `seat_number`, `departure_date`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 5, '2022-06-29', '2022-06-29 20:02:30', '2022-06-29 20:02:30', 0),
(2, 1, 6, '2022-06-29', '2022-06-29 20:02:30', '2022-06-29 20:02:30', 0),
(3, 1, 9, '2022-06-29', '2022-06-29 20:02:30', '2022-06-29 20:02:30', 0),
(4, 1, 10, '2022-06-29', '2022-06-29 20:02:30', '2022-06-29 20:02:30', 0),
(5, 2, 7, '2022-06-29', '2022-06-29 20:47:53', '2022-06-29 20:47:53', 0),
(6, 2, 8, '2022-06-29', '2022-06-29 20:47:53', '2022-06-29 20:47:53', 0),
(7, 2, 11, '2022-06-29', '2022-06-29 20:47:53', '2022-06-29 20:47:53', 0),
(8, 2, 12, '2022-06-29', '2022-06-29 20:47:53', '2022-06-29 20:47:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `role` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `user_name`, `password`, `gender`, `role`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Phil', 'Nyaga', 'p_nyaga', '5d41402abc4b2a76b9719d911017c592', 'male', 1, '2022-05-28 12:14:09', '2022-05-28 12:14:09', 0),
(2, 'Moise', 'Kean', 'keano_29', 'e6f06702c43d31c81cb42967420c0b31', 'female', 1, '2022-05-28 12:14:09', '2022-06-29 02:45:41', 0),
(3, 'Moses', 'Mwangi', 'mwangi_k', '5d41402abc4b2a76b9719d911017c592', 'male', 1, '2022-05-28 12:14:09', '2022-06-27 22:39:29', 0),
(4, 'Mr', '1950', 'rgnt', '7d4e6b66b4d15185ff15858e524730c8', 'male', 1, '2022-05-28 12:14:09', '2022-06-29 02:48:13', 0),
(5, 'Tai', 'Kirwa', 'tai_k', '5d41402abc4b2a76b9719d911017c592', 'female', 1, '2022-06-10 09:48:53', '2022-06-29 01:32:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_routes`
--
ALTER TABLE `tbl_routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `purchase_id` (`purchase_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_routes`
--
ALTER TABLE `tbl_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD CONSTRAINT `tbl_purchases_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `tbl_routes` (`route_id`);

--
-- Constraints for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
  ADD CONSTRAINT `tbl_ticket_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchases` (`purchase_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
