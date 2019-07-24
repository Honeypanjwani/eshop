-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 07:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flipkart`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `number` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` int(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `number`, `address`, `pincode`, `city`, `state`, `Country`, `email`) VALUES
(11, '+91193125049', 'F98/2 gali no-7 laxmi park Nangloi Delhi 41', 110041, 'Delhi', 'Delhi', 'India', 'pandatveer123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) UNSIGNED NOT NULL,
  `biiling_addr_type` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `home` text NOT NULL,
  `locality` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(150) NOT NULL,
  `landmark` varchar(200) DEFAULT NULL,
  `pincode` varchar(6) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `biiling_addr_type`, `name`, `home`, `locality`, `city`, `district`, `landmark`, `pincode`, `phone_no`, `customer_id`) VALUES
(1, 1, '', 'Rz-G-111,street No.3\r\n', 'Vijay Encalve', 'delhi', '', NULL, '110045', '', 1),
(2, 1, '', 'Rz-G-110\r\nStreet No.5', 'Uttam Nagar', 'delhi', '', NULL, '110059', '', 2),
(4, 1, '', 'Rz-G-111\r\nVijay Encalve`', 'Vijay Encalve', 'delhi', '', NULL, '110045', '', 3),
(5, 1, '', 'f-98/2 laxmi park nangloi delhi 41', 'f-98/2 laxmi park nangloi delhi 41', 'delhi', '', NULL, '110041', '', 4),
(6, 1, '', 'new delhi', 'Delhi', 'delhi', '', NULL, '110042', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub_cat_id` smallint(5) UNSIGNED NOT NULL,
  `cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `sub_cat_id`, `cat_id`) VALUES
(19, 'Honor', 19, 11),
(20, 'Samsung', 19, 11),
(21, 'Mi', 19, 11),
(22, 'Vivo', 19, 11),
(23, 'Realme', 19, 11),
(24, 'Rail gadhi', 21, 14),
(25, 'Levi', 26, 14),
(26, 'Rebook', 26, 14),
(27, 'adidass', 27, 14),
(28, 'levia', 22, 12),
(29, 'levi', 23, 12),
(30, 'levi', 24, 13),
(31, 'shri ram', 25, 13),
(32, 'hp', 20, 11),
(34, 'Gowns', 32, 13);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(11, 'ELECTRONICS'),
(14, 'KIDS'),
(12, 'MEN'),
(13, 'WOMEN');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `product_id`) VALUES
(1, 'black', 1),
(2, 'Red', 2),
(3, 'Beige', 2),
(4, 'Red', 3),
(5, 'Beige', 3),
(6, 'White', 4),
(7, 'Dynamic Black', 5),
(8, 'Onyx Black', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `path` varchar(150) NOT NULL,
  `title` varchar(80) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_no`, `email`, `password`, `date_time`) VALUES
(1, 'laxman', '8700258141', 'pandatveer567@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2019-02-08 00:42:26'),
(2, 'prikant sharma', '9312504973', 'prikant200700@gmail.com', '80a278a546540896331ef6ac2f63b08df4010deb', '2019-02-08 13:00:27'),
(10, 'laxman', '9811438905', 'pandatveer@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2019-02-08 15:29:18'),
(12, 'laxman', '9874563211', 'pandat@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2019-02-08 15:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `product_id`) VALUES
(1, '../upload/products/1557145377_0.jpeg', 1),
(2, '../upload/products/1557145377_1.jpeg', 1),
(3, '../upload/products/1557155399_0.jpeg', 2),
(4, '../upload/products/1557155399_1.jpeg', 2),
(5, '../upload/products/1557155575_0.jpeg', 3),
(6, '../upload/products/1557155575_1.jpeg', 3),
(8, '../upload/products/1557155646_1.jpeg', 4),
(9, '../upload/products/1557155646_2.jpeg', 4),
(10, '../upload/products/1557155646_3.jpeg', 4),
(11, '../upload/products/1557308684_0.jpeg', 5),
(12, '../upload/products/1557308684_1.jpeg', 5),
(13, '../upload/products/1557308684_2.jpeg', 5),
(14, '../upload/products/1557308684_3.jpeg', 5),
(15, '../upload/products/1557308684_4.jpeg', 5),
(16, '../upload/products/1557308684_5.jpeg', 5),
(18, '../upload/products/1557309655_1.jpeg', 6),
(19, '../upload/products/1557309655_2.jpeg', 6),
(20, '../upload/products/1557309655_3.jpeg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_id` smallint(5) UNSIGNED NOT NULL,
  `sub_cat_id` smallint(5) UNSIGNED NOT NULL,
  `brand_id` smallint(5) UNSIGNED NOT NULL,
  `descriptions` text NOT NULL,
  `stock` tinyint(3) UNSIGNED NOT NULL,
  `discount` tinyint(3) UNSIGNED NOT NULL,
  `sale_price` varchar(8) NOT NULL,
  `price` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `product_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `cat_id`, `sub_cat_id`, `brand_id`, `descriptions`, `stock`, `discount`, `sale_price`, `price`, `status`, `product_code`) VALUES
(2, 'Embroidered Velvet A-line Gown  (Red, Beige)', 13, 32, 34, 'Embroidered Velvet A-line Gown  (Red, Beige)', 100, 50, '988', '1185', 1, '5cd04e46ec8a3'),
(3, 'Embroidered Velvet A-line Gown  (Red, Beige)', 13, 32, 34, 'Embroidered Velvet A-line Gown  (Red, Beige)', 100, 50, '988', '1185', 1, '5cd04ef774a1c'),
(4, 'Embroidered Net and Silk Anarkali Gown  (White)', 13, 32, 34, 'Embroidered Net and Silk Anarkali Gown  (White)', 100, 62, '757', '956', 1, '5cd04f3e2a7c2'),
(5, 'Realme 3 (Dynamic Black, 64 GB)  (4 GB RAM)', 11, 19, 23, '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB\r\n15.8 cm (6.22 inch) HD+ Display\r\n13MP + 2MP | 13MP Front Camera\r\n4230 mAh Battery\r\nMediaTek Helio P70 Octa Core 2.1 GHz AI Processor\r\nTriple Slots (Dual SIM + Memory Card)\r\nFingerprint Sensor and Face Unlock', 250, 15, '10999', '12293', 1, '5cd2a50c29fc6'),
(6, 'Redmi Note 7 (Onyx Black, 64 GB)  (4 GB RAM)', 11, 19, 21, '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB\r\n16.0 cm (6.3 inch) FHD+ Display\r\n12MP + 2MP | 13MP Front Camera\r\n4000 mAh Li-polymer Battery\r\nQualcomm Snapdragon 660 AIE Processor\r\nQuick Charge 4.0 Support\r\nSplash Proof - Protected by P2i', 100, 20, '11999', '13498', 1, '5cd2a8d7a7596');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `sizes` varchar(50) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `sizes`, `product_id`, `created_at`) VALUES
(1, 'Free', '3', '2019-05-11 07:22:23'),
(2, 'xl', '4', '2019-05-11 07:22:23'),
(5, 'free', '2', '2019-05-11 07:22:23'),
(6, '3 GB', '5', '2019-05-11 07:22:23'),
(7, '4 GB', '5', '2019-05-11 07:22:23'),
(8, '3 GB', '6', '2019-05-11 07:22:23'),
(9, '4 GB', '6', '2019-05-11 07:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `path` varchar(150) NOT NULL,
  `status` int(10) NOT NULL,
  `title` varchar(60) NOT NULL,
  `title1` varchar(400) NOT NULL,
  `title2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `path`, `status`, `title`, `title1`, `title2`) VALUES
(19, '../upload/slide/1547925863_0.jpeg', 0, 'new look', 'Smart Watches For Men & Women', 'Most Popular Brand Products 20% off'),
(20, '../upload/slide/1547925981_0.jpeg', 0, 'UP TO 30% OFF', 'Get latest headphone', 'Get the top brands for headphone');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cat_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`) VALUES
(19, 'Mobile', 11),
(20, 'Laptop', 11),
(21, 'Toys', 14),
(22, 'Jeans', 12),
(23, 'Shirt', 12),
(24, 'Shirt', 13),
(25, 'kurta', 13),
(26, 'Shirt', 14),
(27, 'Jeans', 14),
(28, 'Watch', 14),
(32, 'Ethnic Wear', 13);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `path`, `phone`) VALUES
(1, 'mohan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `status`, `profile_pic`, `created_date`, `modified_date`) VALUES
(1, 'laxman', 'pandatveer567@gmail.com', '8700258141', 'admin123', 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
