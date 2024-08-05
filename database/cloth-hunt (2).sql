-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 04:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloth-hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(2) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`id`, `productId`, `userId`, `imagePath`, `title`, `price`, `qty`, `update`) VALUES
(1, 31, 4, '66a870eccb7b94.98508988.jpg', 'Cozy Fleece Sweatpant', '1600', 1, '2024-08-05 05:50:48'),
(9, 32, 4, '66a871258cc122.76185698.jpg', 'Satin Dress', '1300', 0, '2024-08-05 07:07:56'),
(10, 30, 4, '66a86fd0583de1.50923875.jpg', 'Womens Tops', '600', 2, '2024-08-05 07:09:08'),
(11, 31, 2, '66a870eccb7b94.98508988.jpg', 'Cozy Fleece Sweatpant', '1600', 10, '2024-08-05 09:02:24'),
(12, 31, 2, '66a870eccb7b94.98508988.jpg', 'Cozy Fleece Sweatpant', '1600', 0, '2024-08-05 10:13:25'),
(13, 32, 2, '66a871258cc122.76185698.jpg', 'Satin Dress', '1300', 4, '2024-08-05 14:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `imagePath`, `tittle`, `updatedOn`) VALUES
(1, 'category-1.jpg', 'Topes', '2024-03-09 08:27:32'),
(2, 'category-2.jpg', 'Shirts', '2024-03-09 08:27:32'),
(3, 'category-3.jpg', 'Glasses', '2024-03-09 08:28:26'),
(4, 'category-4.jpg', 'Sandals', '2024-03-09 08:28:26'),
(5, 'category-5.jpg', 'Bag', '2024-03-09 08:29:02'),
(6, 'category-6.jpg', 'Shoes', '2024-03-09 08:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `caurosel`
--

CREATE TABLE `caurosel` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(50) NOT NULL,
  `trend` varchar(240) NOT NULL,
  `description` varchar(100) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caurosel`
--

INSERT INTO `caurosel` (`id`, `imagePath`, `trend`, `description`, `updatedOn`) VALUES
(1, 'banner-1.png', 'New Arrival', 'Discover the <br> Latest Collections', '2024-03-08 06:40:55'),
(2, 'banner-2.png', 'Big Sale', 'Up To 50% Off <br> Trendy Fashion', '2024-03-08 06:40:55'),
(3, 'banner-3.png', 'Fashion Women', 'Top Deals <br>Up To 50% Off', '2024-03-08 07:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `tittle` varchar(50) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagePath` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `tittle`, `updatedOn`, `imagePath`) VALUES
(1, 'Spring Collections', '2024-03-09 07:17:09', 'specialcollection-1.jpg'),
(2, '30% off all order', '2024-03-09 07:17:09', 'specialcollection-2.jpg'),
(3, 'Must-Have Style', '2024-03-09 07:17:37', 'specialcollection-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `insta`
--

CREATE TABLE `insta` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insta`
--

INSERT INTO `insta` (`id`, `imagePath`, `icon`, `updatedOn`) VALUES
(1, 'insta1.jpg', '<i class=\"fab fa-instagram\"></i>', '2024-03-14 08:31:34'),
(2, 'insta2.jpg', '<i class=\"fab fa-instagram\"></i>', '2024-03-14 08:31:34'),
(3, 'insta3.jpg', '<i class=\"fab fa-instagram\"></i>', '2024-03-14 08:32:01'),
(4, 'insta4.jpg', '<i class=\"fab fa-instagram\"></i>', '2024-03-14 08:32:01'),
(5, 'insta5.jpg', '<i class=\"fab fa-instagram\"></i>', '2024-03-14 08:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `nav-items` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `updateon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `nav-items`, `url`, `position`, `updateon`) VALUES
(1, 'Home', './index.php', 1, '2024-07-16 07:32:08'),
(2, 'About', './about.php', 2, '2024-07-16 07:32:08'),
(3, 'Products', './shop.php', 3, '2024-07-16 07:32:43'),
(4, 'Contact', './contact.php', 4, '2024-07-16 07:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `imageback` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `deletedRate` varchar(250) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `userStatus` varchar(250) NOT NULL,
  `cartStatus` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `imagePath`, `imageback`, `title`, `deletedRate`, `rate`, `userStatus`, `cartStatus`, `description`, `updatedOn`) VALUES
(1, 'sellerfront-1.jpg', 'sellerback-1.jpg', 'Pant', '690', '590', 'inactive', 'true\r\n', '', '2024-03-10 08:48:02'),
(2, 'sellerfront-2.jpg', '', 'Nike Shoeseee', '150', '148', 'inactive', 'false', '', '2024-03-10 08:48:02'),
(3, 'sellerfront-3.jpg', '', 'Top with Puff Sleeves', '160', '140', 'inactive', 'false', '', '2024-03-10 08:57:05'),
(4, 'sellerfront-4.jpg', 'sellerback-4.jpg', 'Floral Print Jacket', '170', '150', 'inactive', 'false', '', '2024-03-10 08:57:05'),
(5, 'sellerfront-5.jpg', 'sellerback-5.jpg', 'Men Collar Shirt', '180', ' 160', 'inactive', 'false', '', '2024-03-10 09:04:34'),
(6, 'sellerfront-6.jpg', 'sellerback-6.jpg', ' Collar Casual Shirt', '100', '  80', 'inactive', 'false', '', '2024-03-10 09:04:34'),
(7, 'sellerfront-7.jpg', 'sellerback-7.jpg', 'Cozy Fleece skirt', '175', '158', 'inactive', 'false', '', '2024-03-21 12:13:04'),
(8, 'sellerfront-8.jpg', 'sellerback-8.jpg', 'Cozy Fleece Mega Sweatpant', '220', '190', 'inactive', 'false', '', '2024-03-21 12:13:04'),
(9, 'sellerfront-9.jpg', 'sellerback-9.jpg', 'Band Straw Hat', '250', '220', 'inactive', 'false', '', '2024-03-21 12:13:12'),
(10, 'sellerfront-10.jpg', 'sellerback-10.jpg', 'Audience Satin Dress', '160', '148', 'inactive', 'false', '', '2024-03-21 12:13:12'),
(11, 'img.jpg', 'imgback.jpg', 'title', '', 'price', 'inactive', 'false', '', '2024-03-22 12:30:39'),
(12, 'img.jpg', 'img.jpg', 'orange', '', '250', 'inactive', 'false', '', '2024-03-22 12:33:57'),
(13, 'young-girl-student-with-school-bag-city-generative-ai_849906-6526.jpg', 'young-girl-student-with-school-bag-city-generative-ai_849906-6526.jpg', 'Orange', '', 'abcd', 'inactive', '0', '', '2024-03-22 12:35:22'),
(14, 'Asset 1@4x-100.jpg', 'seller14.jpeg', 'logo ', '', 'this is logo', 'inactive', '0', '', '2024-03-25 04:12:59'),
(15, 'Asset 1@4x-100.jpg', 'Asset 1@4x-100.jpg', 'Apple', '', '100', 'inactive', '0', '', '2024-03-25 05:16:51'),
(16, 'Behance-logo.jpg', 'Behance-logo.jpg', 'New Card', '', 'Testing', 'inactive', '0', '', '2024-03-25 05:53:20'),
(17, 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'Checking', '', 'Checking card', 'inactive', '0', '', '2024-04-04 05:36:48'),
(18, 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'checking card', '', '12345', '', '0', '', '2024-04-04 05:37:24'),
(19, 'Untitled-2.png', 'Untitled-2.png', 'asdf', '', '123', 'inactive', '0', '', '2024-04-04 05:39:54'),
(20, 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg', 'Cheking', '', '125', 'inactive', '0', '', '2024-05-16 04:55:24'),
(22, '66a372776afbc2.66842831.jpg', '66a372776b6838.80823410.jpg', ' shoes', '400', '500', 'inactive', 'false', '', '2024-07-26 09:55:03'),
(23, '66a39ffc8489c0.36314080.jpg', '66a39ffc851600.22171575.png', 'shoe', '100', '500', 'inactive', 'false', '', '2024-07-26 13:09:16'),
(24, '44.jpg', '66a48ddabd0ea1.20089432.jpg', 'Checking ', '750', '650', 'inactive', 'false', '', '2024-07-27 06:04:10'),
(25, '66a48e050b9c81.05847400.png', '66a48e050c31c5.09472864.jpg', 'Nike Air 50', '1600', '1500', 'inactive', 'false', '', '2024-07-27 06:04:53'),
(26, '66a86e18b26ab5.13364624.jpg', '66a86e18b28e24.50369218.jpg', 'Womens Pant', '300', '250', '', '', 'Premium Fabric: Made from high-quality materials that ensure a soft feel and durability. Choose from breathable cotton, luxurious silk, or cozy knits to suit your needs. Flattering Fits: Available in various cuts including straight-leg, bootcut, wide', '2024-07-30 04:37:44'),
(27, '66a86e3045cf90.85112992.jpg', '66a86e30462342.10891163.jpg', 'Womens Pant', '300', '250', '', '', 'Premium Fabric: Made from high-quality materials that ensure a soft feel and durability. Choose from breathable cotton, luxurious silk, or cozy knits to suit your needs. Flattering Fits: Available in various cuts including straight-leg, bootcut, wide', '2024-07-30 04:38:08'),
(28, '66a86e83b3ca67.56784158.jpg', '66a86e83b3eee3.81348241.jpg', 'scascasc', '300', '250', '', '', 'Premium Fabric: Made from high-quality materials that ensure a soft feel and durability. Choose from breathable cotton, luxurious silk, or cozy knits to suit your needs. Flattering Fits: Available in various cuts including straight-leg, bootcut, wide', '2024-07-30 04:39:31'),
(29, '66a86ebcce51d0.66995870.jpg', '66a86ebcce9e09.42188596.jpg', 'Womens Pant', '300', '250', 'active', 'false', '', '2024-07-30 04:40:28'),
(30, '66a86fd0583de1.50923875.jpg', '66a86fd0586318.15044210.jpg', 'Womens Tops', '600', '590', 'active', 'false', '', '2024-07-30 04:45:04'),
(31, '66a870eccb7b94.98508988.jpg', '66a870eccbac92.53014562.jpg', 'Cozy Fleece Sweatpant', '1600', '1590', 'active', 'false', '', '2024-07-30 04:49:48'),
(32, '66a871258cc122.76185698.jpg', '66a871258ceba2.36482006.jpg', 'Satin Dress', '1300', '1200', 'active', 'false', '', '2024-07-30 04:50:45'),
(33, '66a871d9b04c28.39096565.jpg', '66a871d9b06e35.30718933.jpg', 'Fashion Tops', '1650', '1599', 'active', 'false', '', '2024-07-30 04:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` bigint(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `imagePath`, `title`, `price`, `updated`) VALUES
(1, 'shop1.jpg', 'Detail Maxi Dress', 1099, '2024-07-19 06:13:03'),
(2, 'shop2.jpg', 'Polar Fleece Jacket', 1299, '2024-07-19 06:13:03'),
(3, 'shop3.jpg', 'Women\'s Croptop Jacket', 599, '2024-07-19 06:20:41'),
(4, 'shop4.jpg', 'Jacket With Logo In Brown', 999, '2024-07-19 06:20:41'),
(5, 'shop5.jpg', 'Jackets Set In White', 1499, '2024-07-19 06:30:44'),
(6, 'shop6.jpg', 'Jacket Quilted Coat', 1699, '2024-07-19 06:30:44'),
(7, 'shop7.jpg', 'Hood Jacket in White', 1199, '2024-07-19 06:56:30'),
(8, 'shop8.jpg', 'Women\'s Bodycon Mini Dress', 1599, '2024-07-19 06:56:30'),
(11, 'shop9.jpg', 'Smiley T-shirt In Light Blue\r\n', 1099, '2024-07-19 07:06:18'),
(12, 'shp10.jpg', 'Women\'s Slim Straight Jean', 699, '2024-07-19 07:06:18'),
(13, 'shop11.jpg', ' Long-Sleeve T-Shirt', 1299, '2024-07-19 07:06:49'),
(14, 'shop12.jpg', 'Polar Fleece Jacket', 1999, '2024-07-19 07:11:25'),
(15, 'shop13.jpg', 'Coat Sherpa Lined', 1599, '2024-07-19 07:11:25'),
(16, 'shop14.jpg', 'Men\'s Hoodies in Brown', 699, '2024-07-19 07:13:35'),
(17, 'shop15.jpg', 'Short-Sleeve Shirt', 899, '2024-07-19 07:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `subadminlist`
--

CREATE TABLE `subadminlist` (
  `id` int(11) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `email` varchar(240) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subadminlist`
--

INSERT INTO `subadminlist` (`id`, `userName`, `email`, `password`, `updated`) VALUES
(23, 'sathish190799', 'sathish190799@gmail.com', '$2y$10$xhDHkXWF29w6R5mpouBRkO4TPl62E5Wzr4x1e5uET8DfXIXRATYmG', '2024-07-30 09:59:21'),
(24, 'sathis190799', 'sathis190799@gmail.com', '$2y$10$YRlZ3Hmhyj6L/fJezr7yfOsTP2Fzi2LzKaXHiTL3khhYZT/9pjyna', '2024-07-30 10:01:02'),
(26, 'kutta', 'sathishkutta59@gmail.com', '$2y$10$s321.t6iuR6m1iCdagAHq.QpnvdTek9cr.FMxP2Ro7FkOaj5mH2m2', '2024-07-30 14:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `imagePath`, `description`, `Author`, `updatedOn`) VALUES
(1, 'testimonial-1.jpg', '\"Cloth Hunt has revolutionized my wardrobe! Their trendy designs and quality fabrics have elevated my style game. I can always count on them for the latest fashion trends.\"\n', 'Michael R.', '2024-03-12 11:18:55'),
(2, 'testimonial-2.jpg', 'I stumbled upon Cloth Hunt while searching for unique clothing pieces, and I\'m so glad I did! Their collection is a perfect blend of chic and comfortable.', 'Sara.L', '2024-03-12 11:18:55'),
(3, 'testimonial-3.jpg', '\"Cloth Hunt has revolutionized my wardrobe! Their trendy designs and quality fabrics have elevated my style game. I can always count on them for the latest fashion trends.\"\r\n', 'Priya jackson', '2024-03-12 12:24:54'),
(4, 'testimonial-4.jpg', '\"Cloth Hunt has revolutionized my wardrobe! Their trendy designs and quality fabrics have elevated my style game. I can always count on them for the latest fashion trends.\"\r\n', 'Trisha Raj', '2024-03-12 12:24:54'),
(5, 'testimonial-5.jpg', 'I stumbled upon Cloth Hunt while searching for unique clothing pieces, and I\'m so glad I did! Their collection is a perfect blend of chic and comfortable.', 'Sukran', '2024-03-12 12:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `userslist`
--

CREATE TABLE `userslist` (
  `id` bigint(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conformPassword` varchar(50) NOT NULL,
  `updatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userslist`
--

INSERT INTO `userslist` (`id`, `userName`, `email`, `password`, `conformPassword`, `updatedOn`) VALUES
(2, 'sathishkumar', 'user@gmail.com', 'user@123', 'user@123', '2024-03-12 13:04:19'),
(3, 'suriya', 'admin@gmail.com', 'Admin@123', 'Admin@123', '2024-03-13 04:29:02'),
(4, 'akilan', 'akilan234@gmail.com', 'akil@234', 'akil@234', '2024-06-03 15:34:56'),
(5, 'kumar', 'kumar@gmail.com', 'Kumar@123', 'Kumar@123', '2024-06-03 15:37:02'),
(6, 'sathish', 'www.sathis19799@gmail.com', 'Sathish@123', 'Sathish@123', '2024-06-03 15:48:43'),
(7, 'sathish', 'sathis190799@gmail.com', 'Skumar@123', 'Skumar@123', '2024-07-31 07:44:56'),
(8, 'sathish', 'sathish@gmail.com', 'Sathish@123', 'Sathish@123', '2024-07-31 10:43:11'),
(9, 'sathish', 'sathishvel123@gmail.com', 'sathisvel@123', 'sathisvel@123', '2024-08-01 05:49:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caurosel`
--
ALTER TABLE `caurosel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insta`
--
ALTER TABLE `insta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subadminlist`
--
ALTER TABLE `subadminlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userslist`
--
ALTER TABLE `userslist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `caurosel`
--
ALTER TABLE `caurosel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `insta`
--
ALTER TABLE `insta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subadminlist`
--
ALTER TABLE `subadminlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userslist`
--
ALTER TABLE `userslist`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
