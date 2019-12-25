-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 12:13 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`user_id`, `s_name`, `locality`, `city`, `country`, `a_id`) VALUES
(1, 'MG ROAD', 'Kankurgachi', 'Kolkata', 'India', 1),
(1, 'SN Banerjee Road', 'Sovavbazar', 'Kolkata', 'India', 2),
(5, '10 Downing Street', 'SDF', 'Kolkata', 'India', 8),
(6, '10, Station Road', 'Mitra Para', 'Kolkata', 'India', 10);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `r_id`, `menu_name`, `menu_price`, `menu_type`) VALUES
(1, 2, 'Chicken Tikka Burger', 200, 'Non-Veg'),
(2, 2, 'Veg Burger', 160, 'Veg'),
(3, 2, 'Cold Coffee', 150, 'Veg'),
(4, 3, 'Chicken Nuggets', 200, 'Non-Veg'),
(5, 3, 'Crushers', 100, 'Veg'),
(6, 4, 'Chicken Salami Burger', 250, 'Non-Veg'),
(7, 5, 'Chicken Pizza', 200, 'Non-Veg'),
(8, 5, 'Veg Burger', 180, 'Veg'),
(9, 3, 'Mingles Bucket', 284, 'Non-Veg'),
(10, 6, 'Almond Rose', 275, 'Non_veg'),
(11, 6, 'Strawberry Shake', 170, 'Veg'),
(12, 6, 'Rasmalai', 215, 'Non-Veg'),
(13, 4, 'Mexican Patty', 160, 'Veg'),
(14, 4, 'Veg Shammi', 165, 'Veg'),
(15, 7, 'Pan Fried Chicken Momo', 150, 'Non-Veg'),
(16, 7, 'Schezwan Chicken Momo', 140, 'Non-Veg'),
(17, 7, 'Veggie Momo', 99, 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `r_id` int(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `name`, `r_id`, `menu_id`, `r_name`, `m_name`, `m_price`) VALUES
(220, 'Katrina Kaif', 4, 6, 'Subway', 'Chicken Salami Burger', 250),
(221, 'Katrina Kaif', 5, 7, 'Pizza Hut', 'Chicken Pizza', 200),
(222, 'Katrina Kaif', 5, 8, 'Pizza Hut', 'Veg Burger', 180),
(223, 'Virat Kohli', 3, 4, 'KFC', 'Chicken Nuggets', 200),
(224, 'Virat Kohli', 3, 5, 'KFC', 'Crushers', 100),
(225, 'Virat Kohli', 2, 3, 'Cafe Coffee Day', 'Cold Coffee', 150),
(226, 'Salman Khan', 3, 4, 'KFC', 'Chicken Nuggets', 200),
(227, 'Salman Khan', 3, 5, 'KFC', 'Crushers', 100),
(228, 'Salman Khan', 2, 1, 'Cafe Coffee Day', 'Chicken Tikka Burger', 200),
(230, 'Salman Khan', 2, 3, 'Cafe Coffee Day', 'Cold Coffee', 150),
(245, 'Salman Khan', 5, 7, 'Pizza Hut', 'Chicken Pizza', 200),
(248, 'Salman Khan', 7, 15, 'Wow Momo', 'Pan Fried Chicken Momo', 150),
(250, 'Salman Khan', 7, 17, 'Wow Momo', 'Veggie Momo', 99);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_rating` decimal(10,1) NOT NULL,
  `r_cusine` varchar(255) NOT NULL,
  `r_bg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `r_name`, `r_rating`, `r_cusine`, `r_bg`) VALUES
(2, 'Cafe Coffee Day', '4.0', 'Snacks', 'ccd.jpg'),
(3, 'KFC', '4.1', 'Snacks', 'KFC.png'),
(4, 'Subway', '4.3', 'Salad,Health Food', 'subway.jpg'),
(5, 'Pizza Hut', '3.9', 'Italian', 'pz.png'),
(6, 'Keventers', '4.5', 'Shakes', 'keventer.png'),
(7, 'Wow Momo', '4.2', 'Chinese,Tibetan', 'wow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`a_id`, `u_id`, `r_name`, `s_name`, `locality`, `city`, `country`, `review`) VALUES
(2, 1, 'Barbecue Nation', '1st Floor, Park Center,Park Street', 'Park Street', 'Kolkata', 'India', 'Delicious Food!!\r\nVery nice Ambiance'),
(3, 5, 'Haka', 'Mani Square Mall, 206, Maniktala Main Rd', 'Phoolbagan', 'Kolkata', 'India', 'Very Delicious Food'),
(4, 6, 'Flame N Grill', 'Mani Square Mall, 206, Maniktala Main Rd', 'Phoolbagan', 'Kolkata', 'India', 'Very Nice food and service');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Salman Khan', 'bhai@gmail.com', 'katrina', '9999999998'),
(5, 'Katrina Kaif', 'katrina@gmail.com', 'ranbir', '6666666666'),
(6, 'Virat Kohli', 'virat@gmail.com', '12345', '4444444444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
