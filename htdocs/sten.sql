-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 08:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sten`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_name` varchar(50) NOT NULL,
  `annoucement_image` varchar(255) NOT NULL,
  `announcement_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(6) NOT NULL,
  `user_id` int(5) NOT NULL,
  `mem_status` tinyint(4) NOT NULL,
  `expire_date` date NOT NULL,
  `begin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `user_id`, `mem_status`, `expire_date`, `begin_date`) VALUES
(1, 27, 1, '2019-05-15', '2019-04-15'),
(2, 27, 1, '2019-05-15', '2019-04-15'),
(3, 27, 1, '2019-05-15', '2019-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `product_description`, `product_quantity`, `product_status`, `product_price`, `sale_price`, `product_image`) VALUES
(29, 'a', 'b', 'c', 1, 1, '1.00', '1.00', '5cb4cb8d355050.33367014.jpg'),
(30, 'b', 'b', 'b', 1, 1, '1.00', '3.00', '5cb4cbb2f3ec72.26444374.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(72) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(65) NOT NULL,
  `newsletter_status` tinyint(1) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `first_name`, `last_name`, `email`, `newsletter_status`, `type`) VALUES
(15, '123', '$2y$10$nAgZQrV8DlDGqrOOrO2PYOIOJMEnj6NMJmCeA5DGhssip1qE4lBrW', '123', '123', '123', 1, 1),
(17, 'joebob123', '$2y$10$fp7jZRUD7ym16z8qGBZwXuVssam.g/cocTLP62T1Yl72aNmwWIItu', 'Joe', 'Bob', 'joebob123@hotmail.com', 0, 0),
(19, 'admin', '$2y$10$AzFHWFnAyVvJuFF5JTob6.dzZg7n1Kq9qliryj515dQYK67O8VTHK', 'ad', 'min', 'admin@gmail.com', 1, 1),
(24, 'arrow', '$2y$10$D1jNj02Chsw9LXdhlk99SuOPX.Cp5fKQIEU95QK3On3vWTNbzlXim', 'Barry', 'Allen', 'flash@gmail.com', 1, 0),
(27, 'test', '$2y$10$IEneZiSIQVDfMtA24wE5v.JiIZc43DnHJfpCzgp1rPH0wp1oOmOjK', 'Oliver', 'Queenss', 'arrow@gmail.com', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `membership_user_id_fk` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `DeleteToken` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-04-13 16:02:01' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `membership` WHERE `expire_date` < CURRENT_TIMESTAMP()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
