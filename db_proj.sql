-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 08:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `no` int(11) NOT NULL,
  `lat` decimal(50,0) NOT NULL,
  `lng` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(40) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`) VALUES
('kouroshtest');

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE `charity` (
  `username` char(40) NOT NULL,
  `daily_food_count` int(11) DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `address` int(150) DEFAULT NULL,
  `people_covered` int(11) DEFAULT NULL,
  `established_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `username` char(40) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `car_color` char(20) DEFAULT NULL,
  `car_tag` char(20) DEFAULT NULL,
  `national_id` char(11) NOT NULL,
  `birthday` char(100) DEFAULT NULL,
  `status` char(30) DEFAULT 'unavailable',
  `covered_zone` char(60) DEFAULT NULL,
  `lng` decimal(10,0) DEFAULT NULL,
  `lat` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`username`, `first_name`, `last_name`, `car_color`, `car_tag`, `national_id`, `birthday`, `status`, `covered_zone`, `lng`, `lat`) VALUES
('kouroshtest', 'kourosh', 'ataei', 'ghermez', 'samand', '0850160413', '1375/09/29', 'unavailable', 'rezashahr', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `driver_trace`
--

CREATE TABLE `driver_trace` (
  `id` int(11) NOT NULL,
  `driver` char(11) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_persian_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8mb4_persian_ci NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`) VALUES
(2, 'Bacon'),
(3, 'Bagel toast'),
(4, 'Baked bean'),
(5, 'Barbecue'),
(6, 'Bauru'),
(7, 'Bologna'),
(8, 'Bratwurst'),
(9, 'Breakfast'),
(10, 'Bun kebab'),
(11, 'Butterbrot'),
(12, 'Chacarero'),
(13, 'Cokodok'),
(14, 'Khanom buang'),
(15, 'Pretzel'),
(16, 'Waffle'),
(17, 'Candy');

-- --------------------------------------------------------

--
-- Table structure for table `resturant`
--

CREATE TABLE `resturant` (
  `username` char(40) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `address` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resturant_charity`
--

CREATE TABLE `resturant_charity` (
  `resturant` char(40) CHARACTER SET utf8mb4 NOT NULL,
  `charity` char(40) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resturant_has_food`
--

CREATE TABLE `resturant_has_food` (
  `resturant` char(40) CHARACTER SET utf8mb4 NOT NULL,
  `food_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `secrity_question`
--

CREATE TABLE `secrity_question` (
  `id` int(11) NOT NULL,
  `question` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secrity_question`
--

INSERT INTO `secrity_question` (`id`, `question`) VALUES
(1, 'What is the name of your first teacher?'),
(2, 'Wich city did you born?');

-- --------------------------------------------------------

--
-- Table structure for table `send_request`
--

CREATE TABLE `send_request` (
  `id` int(11) NOT NULL,
  `resturant` char(40) CHARACTER SET utf8mb4 NOT NULL,
  `charity` char(40) CHARACTER SET utf8mb4 NOT NULL,
  `driver` char(11) CHARACTER SET utf8mb4 DEFAULT NULL,
  `food` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` char(30) NOT NULL,
  `password` char(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `question_answer` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `question_id`, `question_answer`) VALUES
('kouroshtest', '$2y$10$l7shmpY9W6PT9f60ajFndewKtiFrK2/K1DUc6LXRdhlFwh/S0n0te', 'driver', 1, 'gholi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`national_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `driver_trace`
--
ALTER TABLE `driver_trace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver` (`driver`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resturant`
--
ALTER TABLE `resturant`
  ADD PRIMARY KEY (`username`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `resturant_charity`
--
ALTER TABLE `resturant_charity`
  ADD PRIMARY KEY (`resturant`,`charity`),
  ADD KEY `charity` (`charity`);

--
-- Indexes for table `resturant_has_food`
--
ALTER TABLE `resturant_has_food`
  ADD KEY `food_id` (`food_id`),
  ADD KEY `resturant` (`resturant`);

--
-- Indexes for table `secrity_question`
--
ALTER TABLE `secrity_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_request`
--
ALTER TABLE `send_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charity` (`charity`),
  ADD KEY `resturant` (`resturant`),
  ADD KEY `driver` (`driver`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `driver_trace`
--
ALTER TABLE `driver_trace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `secrity_question`
--
ALTER TABLE `secrity_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `send_request`
--
ALTER TABLE `send_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`);

--
-- Constraints for table `charity`
--
ALTER TABLE `charity`
  ADD CONSTRAINT `charity_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `charity_ibfk_2` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `driver_trace`
--
ALTER TABLE `driver_trace`
  ADD CONSTRAINT `driver_trace_ibfk_1` FOREIGN KEY (`driver`) REFERENCES `driver` (`national_id`);

--
-- Constraints for table `resturant`
--
ALTER TABLE `resturant`
  ADD CONSTRAINT `resturant_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `resturant_ibfk_2` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `resturant_charity`
--
ALTER TABLE `resturant_charity`
  ADD CONSTRAINT `resturant_charity_ibfk_1` FOREIGN KEY (`charity`) REFERENCES `charity` (`username`),
  ADD CONSTRAINT `resturant_charity_ibfk_2` FOREIGN KEY (`resturant`) REFERENCES `resturant` (`username`);

--
-- Constraints for table `resturant_has_food`
--
ALTER TABLE `resturant_has_food`
  ADD CONSTRAINT `resturant_has_food_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `resturant_has_food_ibfk_2` FOREIGN KEY (`resturant`) REFERENCES `resturant` (`username`);

--
-- Constraints for table `send_request`
--
ALTER TABLE `send_request`
  ADD CONSTRAINT `send_request_ibfk_1` FOREIGN KEY (`charity`) REFERENCES `charity` (`username`),
  ADD CONSTRAINT `send_request_ibfk_2` FOREIGN KEY (`resturant`) REFERENCES `resturant` (`username`),
  ADD CONSTRAINT `send_request_ibfk_3` FOREIGN KEY (`driver`) REFERENCES `driver` (`national_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `secrity_question` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
