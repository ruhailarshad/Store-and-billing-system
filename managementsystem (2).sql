-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 02:58 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(141, 'Samsung', '1'),
(142, 'Oppo', '1'),
(143, 'Razer', '0'),
(144, 'ShinnyToy', '1'),
(145, 'Adidas', '1'),
(146, 'Polo', '1'),
(147, 'Dawlance', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_name`, `status`) VALUES
(100, 'Electronic', '1'),
(101, 'Mobile', '1'),
(102, 'Furniture', '1'),
(103, 'Paint', '0'),
(104, 'Toys', '0'),
(105, 'Clothing', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(88, 'Ruhail Arshad', '2019-07-15', 135000, 13500, 0, 148500, 148500, 0, 'Cash'),
(89, 'Ruhail Arshad', '2019-07-15', 0, 0, 0, 0, 0, 0, 'Cash'),
(90, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(91, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(92, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(93, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(94, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(95, 'Ruhail Arshad', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(96, 'Ruhail Arshad', '2019-07-15', 90000, 9000, 0, 99000, 257000, -158000, 'Cash'),
(97, 'Ashraf Khan', '2019-07-15', 90000, 9000, 0, 99000, 257000, -158000, 'Cash'),
(98, 'Kabir Khan', '2019-07-15', 45000, 4500, 0, 49500, 50000, -500, 'Cash'),
(99, 'Ashraf Khan', '2019-07-15', 45000, 4500, 0, 49500, 50000, 49500, 'Cash'),
(100, 'Ruhail Arshad', '2019-07-19', 231000, 23100, 500, 253600, 350000, -96400, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(41, 88, 'Galaxy S9', 45000, 1),
(42, 88, 'Galaxy S9', 45000, 1),
(43, 88, 'Galaxy S9', 45000, 1),
(44, 90, 'Galaxy S9', 45000, 1),
(45, 91, 'Galaxy S9', 45000, 1),
(46, 92, 'Galaxy S10', 45000, 1),
(47, 93, 'Galaxy S10', 45000, 1),
(48, 94, 'Galaxy S10', 45000, 1),
(49, 95, 'Galaxy S9', 45000, 1),
(50, 96, 'Galaxy S9', 45000, 1),
(51, 96, 'Galaxy S10', 45000, 1),
(52, 97, 'Galaxy S9', 45000, 1),
(53, 97, 'Galaxy S10', 45000, 1),
(54, 98, 'Galaxy S9', 45000, 1),
(55, 99, 'Galaxy S9', 45000, 1),
(56, 100, 'T-shirt', 1200, 5),
(57, 100, 'Galaxy S9', 45000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(29, 105, 146, 'T-shirt', 1200, 95, '2019-07-15', '1'),
(30, 101, 141, 'Galaxy S9', 45000, 25, '2019-07-15', '1'),
(31, 100, 147, 'Refrigerator', 30000, 25, '2019-07-15', '1'),
(32, 100, 147, 'Washing Machine', 18000, 5, '2019-07-15', '1'),
(33, 102, 144, 'Wooden Sofa', 4000, 60, '2019-07-15', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `register_date` date NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL,
  `uimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `register_date`, `first_name`, `last_name`, `last_login`, `uimage`) VALUES
(16, 'ruhailarshad', 'a.rexc@yahoo.com', '5ba69b60b942fa260db9351b1105e1f3', '2019-07-10', 'Ruhail', 'Arshad', '2019-08-01 05:29:42', '55780713_2255992714439306_3490396153386631168_n.jpg'),
(18, 'muqeet123', 'muqeet123@yahoo.com', '42b9721f55fd4b4b231b724a7872ac86', '2019-07-10', 'Ruhail', 'Arshad', '2019-07-10 00:00:00', 'sdasdasdasd'),
(19, 'muzammilahsan', 'muzammil@gmail.com', 'a443909c74726d38feb137e8977463b2', '2019-07-10', 'muzammil', 'ahsan', '2019-07-10 04:58:34', 'asdasdasdad'),
(25, 'ruhailarshad123', 'a.rexc123@yahoo.com', '5ba69b60b942fa260db9351b1105e1f3', '2019-07-11', 'sadasdasd', 'sdasdasdd', '2019-07-11 00:00:00', 'sdasdasdasda'),
(26, 'uzairasif', 'uzairasif@gmail.com', '71766146a0e95ebc3c87c40c0ebd1b93', '2019-07-15', 'Uzair', 'Asif', '2019-07-15 01:55:45', '55780713_2255992714439306_3490396153386631168_n.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpro`
-- (See below for the actual view)
--
CREATE TABLE `vpro` (
`cid` int(11)
,`category_name` varchar(255)
,`bid` int(11)
,`brand_name` varchar(255)
,`pid` int(11)
,`product_name` varchar(100)
,`product_price` double
,`product_stock` int(11)
,`added_date` date
,`p_status` enum('1','0')
);

-- --------------------------------------------------------

--
-- Structure for view `vpro`
--
DROP TABLE IF EXISTS `vpro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpro`  AS  select `categories`.`cid` AS `cid`,`categories`.`category_name` AS `category_name`,`brands`.`bid` AS `bid`,`brands`.`brand_name` AS `brand_name`,`products`.`pid` AS `pid`,`products`.`product_name` AS `product_name`,`products`.`product_price` AS `product_price`,`products`.`product_stock` AS `product_stock`,`products`.`added_date` AS `added_date`,`products`.`p_status` AS `p_status` from ((`products` join `categories` on(`products`.`cid` = `categories`.`cid`)) join `brands` on(`products`.`bid` = `brands`.`bid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
