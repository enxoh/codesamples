-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 08:46 PM
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
  `announcement_message` varchar(255) NOT NULL,
  `announcement_image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_name`, `announcement_message`, `announcement_image`, `date_added`) VALUES
(17, 'April 17', 'Flyer for April 17', '5cb769ddb81f09.50670429.jpg', '2019-04-17 00:00:00'),
(23, 'April 22', 'April 22 Flyer', '5cbe1513c16101.05930620.jpg', '2019-04-22 00:00:00'),
(24, 'April 22', 'asdasd', '5cbe15f6129122.49810456.png', '2019-04-22 21:28:54'),
(25, 'asf', 'asf', '5cbe162ab5f5f3.44844982.png', '2019-04-22 21:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `category_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(2, 'Desktops', 'All desktops', '5cbe212c00a238.86668861.png'),
(8, 'Laptops', 'All laptops...', '5cbe21ff52a980.71650510.jpg'),
(10, 'Graphics Card', 'gpu', '5cbe2dd5e52f26.71602266.png');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(6) NOT NULL,
  `user_id` int(5) NOT NULL,
  `mem_status` tinyint(4) NOT NULL,
  `expire_date` date NOT NULL,
  `begin_date` date NOT NULL,
  `pay_option_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `user_id`, `mem_status`, `expire_date`, `begin_date`, `pay_option_id`) VALUES
(1, 27, 1, '2019-05-25', '2019-04-25', 25),
(3, 19, 1, '2019-05-25', '2019-04-25', 22),
(4, 28, 1, '2019-05-25', '2019-04-25', 28);

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE `payment_option` (
  `pay_option_id` int(10) NOT NULL,
  `user_id` int(6) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `card_name` varchar(80) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `exp_date` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_option`
--

INSERT INTO `payment_option` (`pay_option_id`, `user_id`, `card_type`, `card_name`, `card_number`, `exp_date`) VALUES
(22, 19, 'mastercard', 'test test', '456451354564654', '10/23'),
(25, 27, 'visa', 'ffffff ffff', '789456123456', '08/23'),
(26, 27, 'mastercard', 'aaaaa aaaa', '9999999999999', '04/23'),
(28, 28, 'visa', 'a', 'a', '02/20');

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
  `product_image` varchar(100) DEFAULT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `product_description`, `product_quantity`, `product_status`, `product_price`, `sale_price`, `product_image`, `insert_date`) VALUES
(46, 'Dell XP15', 'Laptops', 'A laptop', 31, 1, '413.99', '0.00', '5cbe13f4f15443.00208976.jpg', '2019-04-22 00:00:00'),
(47, 'ASUS ROG', 'Desktops', 'A desktop', 111, 0, '1932.99', '0.00', '5cbe145764aff8.85543561.jpg', '2019-04-22 00:00:00'),
(49, 'Dell Inpiron', 'Desktops', 'A desktop', 1, 1, '1.00', '1.00', '5cbe2740a40c94.52983332.jpg', '2019-04-22 00:00:00'),
(50, 'Dell Alienware', 'Laptops', 'Alienware', 1, 1, '0.00', '1.00', '5cbe27696f2430.57329685.jpg', '2019-04-22 00:00:00'),
(51, 'GTX 1080', 'Graphics Card', 'ads', 1, 1, '1.00', '1.00', '5cbe2df7738aa0.91302579.png', '2019-04-22 00:00:00'),
(53, 'Google Pixelbook', 'Laptops', 'asdsad', 1, 1, '3213.00', '1.00', '5cbe63dfbc0e94.30966657.png', '2019-04-23 00:00:00'),
(54, 'Macbook Pro', 'Laptops', 'Too expensive for me', 1, 1, '3133.00', '0.00', '5cbe641958b499.50106581.jpg', '2019-04-23 00:00:00');

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
(19, 'admin', '$2y$10$8Mol21rBFiGOU5ScT2f/1ukEpU7RN29wqUXryMNb3jIwyspzEY84u', 'admins', 'admin', 'admin@gmail.com', 1, 1),
(24, 'arrow', '$2y$10$D1jNj02Chsw9LXdhlk99SuOPX.Cp5fKQIEU95QK3On3vWTNbzlXim', 'Barry', 'Allen', 'flash@gmail.com', 1, 0),
(27, 'test', '$2y$10$avbLvIbEztUtHNaK58BjLuhwuu6yYOQbQ3qmNNHFIqtIHS0963Dkm', 'Oliver', 'Queen', 'arrow@gmail.com', 1, 0),
(28, 'a', '$2y$10$KD2zjC5FqI2mIiqsCL3uhOgVZL5jMu8V1CpzRQihGz2rEuI2bFTQ.', 'a', 'a', 'a', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `membership_user_id_fk` (`user_id`);

--
-- Indexes for table `payment_option`
--
ALTER TABLE `payment_option`
  ADD PRIMARY KEY (`pay_option_id`),
  ADD KEY `payment_option_user_fk` (`user_id`);

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
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_option`
--
ALTER TABLE `payment_option`
  MODIFY `pay_option_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_option`
--
ALTER TABLE `payment_option`
  ADD CONSTRAINT `payment_option_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `DeleteToken` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-04-13 16:02:01' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `membership` WHERE `expire_date` < CURRENT_TIMESTAMP()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
