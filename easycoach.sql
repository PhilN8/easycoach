-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 10:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `easycoach`
--
-- --------------------------------------------------------
--
-- Table structure for table `tbl_packages`
--
CREATE TABLE `tbl_packages` (
  `package_id` int(11) NOT NULL,
  `receiver_first_name` varchar(30) NOT NULL,
  `receiver_last_name` varchar(30) DEFAULT NULL,
  `receiver_tel_no` int(11) NOT NULL,
  `sender_first_name` varchar(30) NOT NULL,
  `sender_last_name` varchar(30) DEFAULT NULL,
  `sender_tel_no` int(11) NOT NULL,
  `weight` int(3) NOT NULL,
  `cost` int(5) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `tbl_purchases`
--
CREATE TABLE `tbl_purchases` (
  `purchase_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `number_of_seats` int(3) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_purchases`
--
INSERT INTO `tbl_purchases` (
    `purchase_id`,
    `route_id`,
    `number_of_seats`,
    `total_cost`,
    `role`,
    `created_at`,
    `updated_at`,
    `is_deleted`
  )
VALUES (
    1,
    1,
    2,
    2800,
    2,
    '2022-06-15 02:47:25',
    '2022-06-15 02:47:25',
    0
  ),
  (
    2,
    1,
    1,
    1400,
    2,
    '2022-06-15 03:07:48',
    '2022-06-15 03:07:48',
    0
  ),
  (
    3,
    1,
    2,
    2800,
    3,
    '2022-06-24 04:19:28',
    '2022-06-24 04:19:28',
    0
  ),
  (
    4,
    5,
    2,
    2800,
    3,
    '2022-06-24 04:20:42',
    '2022-06-24 04:20:42',
    0
  ),
  (
    5,
    1,
    3,
    4200,
    3,
    '2022-06-24 04:31:46',
    '2022-06-24 04:31:46',
    0
  ),
  (
    6,
    1,
    3,
    4200,
    3,
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    7,
    1,
    3,
    4200,
    3,
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    8,
    1,
    2,
    2800,
    3,
    '2022-06-24 04:33:06',
    '2022-06-24 04:33:06',
    0
  ),
  (
    9,
    3,
    14,
    4000,
    3,
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    10,
    3,
    2,
    2000,
    3,
    '2022-06-24 11:02:29',
    '2022-06-24 11:02:29',
    0
  ),
  (
    11,
    2,
    9,
    0,
    3,
    '2022-06-24 11:17:56',
    '2022-06-24 11:17:56',
    0
  ),
  (
    12,
    5,
    2,
    2800,
    3,
    '2022-06-24 11:18:35',
    '2022-06-24 11:18:35',
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `tbl_role`
--
CREATE TABLE `tbl_role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_role`
--
INSERT INTO `tbl_role` (`role_id`, `role_name`)
VALUES (1, 'admin'),
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_routes`
--
INSERT INTO `tbl_routes` (
    `route_id`,
    `departure`,
    `destination`,
    `cost`,
    `created_at`,
    `updated_at`,
    `is_deleted`
  )
VALUES (
    1,
    'Nairobi',
    'Kisumu',
    1400,
    '2022-06-24 02:17:22',
    '2022-06-24 02:17:22',
    0
  ),
  (
    2,
    'Nairobi',
    'Mombasa',
    1500,
    '2022-06-24 02:17:22',
    '2022-06-24 02:17:22',
    0
  ),
  (
    3,
    'Nairobi',
    'Nakuru',
    1000,
    '2022-06-24 02:17:22',
    '2022-06-24 02:17:22',
    0
  ),
  (
    4,
    'Nairobi',
    'Marsabit',
    1400,
    '2022-06-24 02:17:22',
    '2022-06-24 02:17:22',
    0
  ),
  (
    5,
    'Nairobi',
    'Kitale',
    1400,
    '2022-06-24 02:17:22',
    '2022-06-24 02:17:22',
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `tbl_ticket`
--
CREATE TABLE `tbl_ticket` (
  `ticket_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `id_number` int(11) NOT NULL,
  `tel_no` int(11) NOT NULL,
  `seat_number` int(2) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_ticket`
--
INSERT INTO `tbl_ticket` (
    `ticket_id`,
    `purchase_id`,
    `first_name`,
    `last_name`,
    `id_number`,
    `tel_no`,
    `seat_number`,
    `departure_date`,
    `created_at`,
    `updated_at`,
    `is_deleted`
  )
VALUES (
    1,
    3,
    'Bersuit',
    'Vergarabat',
    12165,
    595616465,
    21,
    '2022-06-24',
    '2022-06-24 04:19:28',
    '2022-06-24 04:19:28',
    0
  ),
  (
    2,
    3,
    'Bersuit',
    'Vergarabat',
    12165,
    595616465,
    22,
    '2022-06-24',
    '2022-06-24 04:19:28',
    '2022-06-24 04:19:28',
    0
  ),
  (
    3,
    4,
    'Carol',
    'Njeri',
    489563,
    154652311,
    21,
    '2022-06-24',
    '2022-06-24 04:20:42',
    '2022-06-24 04:20:42',
    0
  ),
  (
    4,
    4,
    'Carol',
    'Njeri',
    489563,
    154652311,
    22,
    '2022-06-24',
    '2022-06-24 04:20:42',
    '2022-06-24 04:20:42',
    0
  ),
  (
    5,
    5,
    'Man',
    'Dem',
    546513,
    79485613,
    21,
    '2022-06-24',
    '2022-06-24 04:31:46',
    '2022-06-24 04:31:46',
    0
  ),
  (
    6,
    5,
    'Man',
    'Dem',
    546513,
    79485613,
    22,
    '2022-06-24',
    '2022-06-24 04:31:46',
    '2022-06-24 04:31:46',
    0
  ),
  (
    7,
    5,
    'Man',
    'Dem',
    546513,
    79485613,
    30,
    '2022-06-24',
    '2022-06-24 04:31:46',
    '2022-06-24 04:31:46',
    0
  ),
  (
    8,
    6,
    'Man',
    'Dem',
    546513,
    79485613,
    21,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    9,
    6,
    'Man',
    'Dem',
    546513,
    79485613,
    22,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    10,
    7,
    'Man',
    'Dem',
    546513,
    79485613,
    21,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    11,
    6,
    'Man',
    'Dem',
    546513,
    79485613,
    30,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    12,
    7,
    'Man',
    'Dem',
    546513,
    79485613,
    22,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    13,
    7,
    'Man',
    'Dem',
    546513,
    79485613,
    30,
    '2022-06-24',
    '2022-06-24 04:32:37',
    '2022-06-24 04:32:37',
    0
  ),
  (
    14,
    8,
    'Paul',
    'Labile',
    546513,
    79485613,
    33,
    '2022-06-24',
    '2022-06-24 04:33:06',
    '2022-06-24 04:33:06',
    0
  ),
  (
    15,
    8,
    'Paul',
    'Labile',
    546513,
    79485613,
    34,
    '2022-06-24',
    '2022-06-24 04:33:06',
    '2022-06-24 04:33:06',
    0
  ),
  (
    16,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    25,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    17,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    26,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    18,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    8,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    19,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    11,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    20,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    15,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    21,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    23,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    22,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    12,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    23,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    20,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    24,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    27,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    25,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    28,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    26,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    17,
    '2022-06-29',
    '2022-06-24 10:53:58',
    '2022-06-24 10:53:58',
    0
  ),
  (
    27,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    18,
    '2022-06-29',
    '2022-06-24 10:53:59',
    '2022-06-24 10:53:59',
    0
  ),
  (
    28,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    19,
    '2022-06-29',
    '2022-06-24 10:53:59',
    '2022-06-24 10:53:59',
    0
  ),
  (
    29,
    9,
    'Tatiana',
    'Bryant',
    653176,
    81465132,
    20,
    '2022-06-29',
    '2022-06-24 10:53:59',
    '2022-06-24 10:53:59',
    0
  ),
  (
    30,
    10,
    'Orla',
    'Garza',
    841542,
    9398465,
    27,
    '2022-06-24',
    '2022-06-24 11:02:29',
    '2022-06-24 11:02:29',
    0
  ),
  (
    31,
    10,
    'Orla',
    'Garza',
    841542,
    9398465,
    28,
    '2022-06-24',
    '2022-06-24 11:02:29',
    '2022-06-24 11:02:29',
    0
  ),
  (
    32,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    5,
    '2022-06-27',
    '2022-06-24 11:17:56',
    '2022-06-24 11:17:56',
    0
  ),
  (
    33,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    7,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    34,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    8,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    35,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    9,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    36,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    10,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    37,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    5,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    38,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    6,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    39,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    7,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    40,
    11,
    'Veronica',
    'Frazier',
    64512,
    294561,
    8,
    '2022-06-27',
    '2022-06-24 11:17:57',
    '2022-06-24 11:17:57',
    0
  ),
  (
    41,
    12,
    'Lillith',
    'Steele',
    801,
    72,
    3,
    '2022-06-24',
    '2022-06-24 11:18:35',
    '2022-06-24 11:18:35',
    0
  ),
  (
    42,
    12,
    'Lillith',
    'Steele',
    801,
    72,
    4,
    '2022-06-24',
    '2022-06-24 11:18:35',
    '2022-06-24 11:18:35',
    0
  );
-- --------------------------------------------------------
--
-- Table structure for table `tbl_ticket_users`
--
CREATE TABLE `tbl_ticket_users` (
  `ticket_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_ticket_users`
--
INSERT INTO `tbl_ticket_users` (
    `ticket_id`,
    `route_id`,
    `user_id`,
    `purchase_id`,
    `departure_date`,
    `created_at`,
    `updated_at`,
    `is_deleted`
  )
VALUES (
    1,
    1,
    2,
    1,
    '2022-06-15',
    '2022-06-15 02:47:25',
    '2022-06-15 02:47:25',
    0
  ),
  (
    2,
    1,
    2,
    1,
    '2022-06-15',
    '2022-06-15 02:47:25',
    '2022-06-15 02:47:25',
    0
  ),
  (
    3,
    1,
    2,
    2,
    '2022-06-15',
    '2022-06-15 03:07:48',
    '2022-06-15 03:07:48',
    0
  );
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
  `tel_no` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `gender` enum('male', 'female') NOT NULL DEFAULT 'male',
  `role` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `tbl_users`
--
INSERT INTO `tbl_users` (
    `user_id`,
    `first_name`,
    `last_name`,
    `user_name`,
    `password`,
    `tel_no`,
    `id_no`,
    `gender`,
    `role`,
    `created_at`,
    `updated_at`,
    `is_deleted`
  )
VALUES (
    1,
    'Philip',
    'Nyaga',
    'p_nyaga',
    '5d41402abc4b2a76b9719d911017c592',
    0,
    0,
    'male',
    1,
    '2022-05-28 12:14:09',
    '2022-05-28 12:14:09',
    0
  ),
  (
    2,
    'Moise',
    'Kean',
    'keano_29',
    'e6f06702c43d31c81cb42967420c0b31',
    5000,
    0,
    'female',
    2,
    '2022-05-28 12:14:09',
    '2022-06-09 20:53:19',
    0
  ),
  (
    3,
    'Moses',
    'Mwangi',
    'mwangi_k',
    '5d41402abc4b2a76b9719d911017c592',
    0,
    0,
    'male',
    2,
    '2022-05-28 12:14:09',
    '2022-05-28 12:14:09',
    0
  ),
  (
    4,
    'Mr',
    '1950',
    'rgnt',
    '7d4e6b66b4d15185ff15858e524730c8',
    0,
    0,
    'male',
    2,
    '2022-05-28 12:14:09',
    '2022-05-28 12:14:09',
    0
  ),
  (
    5,
    'Tai',
    'Kirwa',
    'tai_k',
    '5d41402abc4b2a76b9719d911017c592',
    452699,
    127784632,
    'female',
    2,
    '2022-06-10 09:48:53',
    '2022-06-10 09:48:53',
    0
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
ADD PRIMARY KEY (`package_id`);
--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `role` (`role`);
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
-- Indexes for table `tbl_ticket_users`
--
ALTER TABLE `tbl_ticket_users`
ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `user_id` (`user_id`),
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
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
--
-- AUTO_INCREMENT for table `tbl_routes`
--
ALTER TABLE `tbl_routes`
MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 43;
--
-- AUTO_INCREMENT for table `tbl_ticket_users`
--
ALTER TABLE `tbl_ticket_users`
MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
ADD CONSTRAINT `tbl_purchases_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `tbl_routes` (`route_id`),
  ADD CONSTRAINT `tbl_purchases_ibfk_2` FOREIGN KEY (`role`) REFERENCES `tbl_role` (`role_id`);
--
-- Constraints for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
ADD CONSTRAINT `tbl_ticket_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchases` (`purchase_id`);
--
-- Constraints for table `tbl_ticket_users`
--
ALTER TABLE `tbl_ticket_users`
ADD CONSTRAINT `tbl_ticket_users_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `tbl_routes` (`route_id`),
  ADD CONSTRAINT `tbl_ticket_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_ticket_users_ibfk_3` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_purchases` (`purchase_id`);
--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_role` (`role_id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;