-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 01:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(432, 'Xiaomi', 'xiaomi', '2.jpg', '2024-04-10 12:12:45', '2024-04-18 01:15:46'),
(433, 'Nokia', 'nokia', '1714946451.PNG', '2024-04-10 12:12:45', '2024-05-05 12:00:51'),
(434, 'Oppo', 'oppo', '1715360330.png', '2024-04-10 12:12:45', '2024-05-10 06:58:50'),
(435, 'Huawei', 'huawei', '1714952912.PNG', '2024-04-10 12:12:45', '2024-05-05 13:48:32'),
(436, 'Apple', 'apple-2', '1714946018.PNG', '2024-04-10 12:12:45', '2024-05-05 11:53:38'),
(437, 'Sony', 'sony', '1714946469.PNG', '2024-04-10 12:12:45', '2024-05-05 12:01:09'),
(441, 'Motorola', 'motorola', '1715343926.png', '2024-04-19 18:07:30', '2024-05-10 02:25:26'),
(461, 'Samsung', 'samsung', '1714949543.PNG', '2024-04-28 06:02:18', '2024-05-05 12:52:23'),
(463, 'Google', 'google', '1714950623.png', '2024-04-28 06:17:28', '2024-05-05 13:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin.mobilestore@gmail.com|127.0.0.1', 'i:2;', 1713277880),
('admin.mobilestore@gmail.com|127.0.0.1:timer', 'i:1713277880;', 1713277880),
('admin@mobilestore.com|127.0.0.1', 'i:1;', 1721817254),
('admin@mobilestore.com|127.0.0.1:timer', 'i:1721817254;', 1721817254),
('admin@mobilestore|127.0.0.1', 'i:1;', 1713670317),
('admin@mobilestore|127.0.0.1:timer', 'i:1713670317;', 1713670317),
('admin@mobilestore.com|127.0.0.1', 'i:1;', 1714986464),
('admin1@mobilestore.com|127.0.0.1', 'i:1;', 1714962114),
('admin1@mobilestore.com|127.0.0.1:timer', 'i:1714962114;', 1714962114),
('admin2@mobilestore.com|127.0.0.1', 'i:1;', 1714982818),
('admin2@mobilestore.com|127.0.0.1:timer', 'i:1714982818;', 1714982818),
('customer@mobilestore.com|127.0.0.1', 'i:1;', 1721746882),
('customer@mobilestore.com|127.0.0.1:timer', 'i:1721746882;', 1721746882),
('manger@mobilestore.com|127.0.0.1:timer', 'i:1714986685;', 1714986685);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(455, 'Ios', 'ios', '2024-04-18 06:39:55', '2024-05-06 02:37:50'),
(457, 'Affordable Phones', 'affordable-phones', '2024-04-20 01:37:46', '2024-05-05 08:24:58'),
(461, 'Android', 'android', '2024-04-28 06:07:48', '2024-05-05 08:25:29'),
(465, 'Expensive Phones', 'expensive-phones', '2024-05-05 08:11:37', '2024-05-05 08:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `changelogs`
--

CREATE TABLE `changelogs` (
  `changelog_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_last_modified` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `changelogs`
--

INSERT INTO `changelogs` (`changelog_id`, `date_created`, `date_last_modified`, `user_id`, `product_id`, `message`) VALUES
(17, '2024-05-04 03:39:00', '2024-05-04 03:39:00', 4, 712, 'Scot Craig updated product \'Iphone-133\' (name: Iphone-13 => Iphone-133, slug: iphone-13 => iphone-133, updated_at: 2024-05-04 03:38:01 => 2024-05-04 03:39:00)'),
(18, '2024-05-04 03:39:49', '2024-05-04 03:39:49', 4, 712, 'Scot Craig updated product \'Iphone-13\' (name: Iphone-133 => Iphone-13, slug: iphone-133 => iphone-13, updated_at: 2024-05-04 03:39:00 => 2024-05-04 03:39:49)'),
(19, '2024-05-04 12:58:31', '2024-05-04 12:58:31', 4, 743, 'Scot Craig updated product \'Iphone 14\' (regular_price: 1200.00 => 1200, sale_price: 1177.00 => 1177, image: pexels-element-digital-1194760.jpg_040524125701.jpg => pexels-element-digital-1194760.jpg_040524125831.jpg, updated_at: 2024-05-04 12:57:01 => 2024-05-04 12:58:31)'),
(20, '2024-05-05 22:38:33', '2024-05-05 22:38:33', 4, 744, 'Scot Craig updated product \'Sony Xperia 1 V\' (name: Lets => Sony Xperia 1 V, slug: try1 => sony-xperia-1v, product_model: YourProductModelValue => XQDQ62, manufacturer: YourManufacturerValue => Sony Corporation, short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 123.00 => 899, sale_price: 0.00 => 900, image: Capture3.PNG_250424165021.PNG => sony-xperia-1v.jpg_050524223833.jpg, images: a:2:{i:0;s:29:\"capture2.PNG_010524124312.PNG\";i:1;s:29:\"Capture1.PNG_010524124312.PNG\";} => a:1:{i:0;s:29:\"sony-xperia-1v.jpg_050524.jpg\";}, category_id: 444 => 457, brand_id: 436 => 437, updated_at: 2024-04-25 16:50:21 => 2024-05-05 22:38:33)'),
(21, '2024-05-05 22:47:15', '2024-05-05 22:47:15', 4, 745, 'Scot Craig updated product \'Iphone 6\' (name: Different => Iphone 6, slug: name-2-1 => iphone-6, product_model: YourProductModelValue => A1549, manufacturer: YourManufacturerValue => Apple Inc., short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 123.00 => 349, image: Capture1.PNG_250424165057.PNG => iphone-6.jpg_050524224715.jpg, images: a:1:{i:0;s:32:\"left-arrow_271220.png_270424.png\";} => a:1:{i:0;s:23:\"iphone-6.jpg_050524.jpg\";}, category_id: 444 => 455, brand_id: 441 => 436, feature_id: 1310 => 1317, updated_at: 2024-04-29 12:36:47 => 2024-05-05 22:47:15)'),
(24, '2024-05-05 23:00:29', '2024-05-05 23:00:29', 4, 764, 'Scot Craig updated product \'Samsung Galaxy S24\' (name: THis Is New => Samsung Galaxy S24, slug: this-is-new => samsung-galaxy-s24, product_model: YourProductModelValue => SM-S921U1, manufacturer: YourManufacturerValue => Samsung, short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 987.00 => 1100, sale_price: 0.00 => 1069.85, image: Capture.PNG_010524051001.PNG => samsung-s24.jpg_050524230029.jpg, images: a:3:{i:0;s:29:\"Capture3.PNG_010524051001.PNG\";i:1;s:29:\"capture2.PNG_010524051001.PNG\";i:2;s:29:\"Capture1.PNG_010524051001.PNG\";} => a:1:{i:0;s:26:\"samsung-s24.jpg_050524.jpg\";}, brand_id: 463 => 461, updated_at: 2024-05-01 05:10:01 => 2024-05-05 23:00:29)'),
(25, '2024-05-05 23:04:17', '2024-05-05 23:04:17', 4, 765, 'Scot Craig updated product \'Nokia Lumia 520\' (name: Apple => Nokia Lumia 520, slug: apple => nokia-lumia-520, product_model: YourProductModelValue => Nokia520, manufacturer: YourManufacturerValue => Sony Corporation, short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 4444.00 => 1400, sale_price: 0.00 => 1234, image: Capture3.PNG_010524074417.PNG => nokia-Lumia-520.jpg_050524230417.jpg, images: a:2:{i:0;s:29:\"Capture3.PNG_010524074417.PNG\";i:1;s:29:\"capture2.PNG_010524074417.PNG\";} => a:1:{i:0;s:30:\"nokia-Lumia-520.jpg_050524.jpg\";}, category_id: 445 => 461, brand_id: 432 => 437, updated_at: 2024-05-01 07:44:17 => 2024-05-05 23:04:17)'),
(26, '2024-05-05 23:12:18', '2024-05-05 23:12:18', 4, 766, 'Scot Craig updated product \'Google Pixel 8\' (name: Another => Google Pixel 8, slug: anotherproduct-1-1 => google-pixel-8, product_model: YourProductModelValue => GZPFO, manufacturer: YourManufacturerValue => Foxconn, short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 3333.00 => 1000, sale_price: 0.00 => 797, image: Capture.PNG_010524074634.PNG => google-pixel-8.PNG_050524231218.PNG, images: a:3:{i:0;s:29:\"Capture3.PNG_010524074634.PNG\";i:1;s:29:\"capture2.PNG_010524074634.PNG\";i:2;s:29:\"Capture1.PNG_010524074634.PNG\";} => a:1:{i:0;s:29:\"google-pixel-8.PNG_050524.PNG\";}, updated_at: 2024-05-01 08:34:02 => 2024-05-05 23:12:18)'),
(30, '2024-05-05 23:40:43', '2024-05-05 23:40:43', 4, 769, 'Scot Craig updated product \'Iphone 15\' (name: Newsss? => Iphone 15, slug: product-slug-name => iphone-15, product_model: ProductModel => A3089, manufacturer: Manufacturer => Apple Inc., short_description: Product short description ... => N/A, description: Product description ... => N/A, regular_price: 123.00 => 2000, sale_price: 0.00 => 1497, image: Capture3.PNG_010524132313.PNG => iphone-15.png_050524234043.png, images: a:2:{i:0;s:29:\"Capture1.PNG_010524132313.PNG\";i:1;s:28:\"Capture.PNG_010524132313.PNG\";} => a:1:{i:0;s:24:\"iphone-15.png_050524.png\";}, category_id: 444 => 455, brand_id: 432 => 436, updated_at: 2024-05-01 13:23:13 => 2024-05-05 23:40:43)'),
(75, '2024-05-09 12:19:03', '2024-05-09 12:19:03', 4, 772, 'Scot Craig deleted product \'Changelogproduct\''),
(77, '2024-05-10 07:41:23', '2024-05-10 07:41:23', 4, 776, 'Scot Craig updated product \'Contact\' (name: Contact Uss => Contact, slug: contact-us => contact, product_model: contact-uss => contact, manufacturer: contactuss => contact, short_description: N/As => N/A, description: N/As => N/A, regular_price: 600.00 => 555, feature_id: 1310 => 1315, updated_at: 2024-05-10 07:38:04 => 2024-05-10 07:41:23)'),
(78, '2024-05-10 07:42:18', '2024-05-10 07:42:18', 4, 776, 'Scot Craig updated product \'Contact\' (slug: contact => contactt, feature_id: 1315 => 1320, updated_at: 2024-05-10 07:41:23 => 2024-05-10 07:42:18)'),
(79, '2024-05-10 09:57:07', '2024-05-10 09:57:07', 4, 770, 'Scot Craig updated product \'Huawei Pura 70\' (feature_id: 1316 => 1295, updated_at: 2024-05-05 23:46:14 => 2024-05-10 09:57:07)'),
(80, '2024-05-10 11:56:53', '2024-05-10 11:56:53', 4, 769, 'Scot Craig updated product \'Iphone 15\' (feature_id: 1295 => 1296, updated_at: 2024-05-09 09:45:47 => 2024-05-10 11:56:53)'),
(81, '2024-05-10 12:16:56', '2024-05-10 12:16:56', 4, 712, 'Scot Craig updated product \'Iphone 13\' (regular_price: 1300.00 => 1300, sale_price: 1096.00 => 1096, image: iphone-15.png_100524121553.png => iphone-15.png_100524121656.png, updated_at: 2024-05-10 12:15:53 => 2024-05-10 12:16:56)'),
(82, '2024-05-10 12:17:36', '2024-05-10 12:17:36', 4, 712, 'Scot Craig updated product \'Iphone 13\' (image: iphone-15.png_100524121656.png => iphone-13.jpg_100524121736.jpg, updated_at: 2024-05-10 12:16:56 => 2024-05-10 12:17:36)'),
(84, '2024-05-10 12:28:24', '2024-05-10 12:28:24', 4, 766, 'Scot Craig updated product \'Google Pixel 8\' (category_id: 457 => 461, feature_id: 1360 => 1299, updated_at: 2024-05-05 23:12:59 => 2024-05-10 12:28:24)'),
(85, '2024-05-10 12:33:06', '2024-05-10 12:33:06', 4, 765, 'Scot Craig updated product \'Nokia Lumia 520\' (manufacturer: Sony Corporation => Nokia Corporation, category_id: 461 => 457, brand_id: 437 => 433, feature_id: 1360 => 1300, updated_at: 2024-05-05 23:04:17 => 2024-05-10 12:33:06)'),
(86, '2024-05-10 12:47:30', '2024-05-10 12:47:30', 4, 764, 'Scot Craig updated product \'Samsung Galaxy S24\' (manufacturer: Samsung => Samsung Electronics, feature_id: 1364 => 1301, updated_at: 2024-05-05 23:00:29 => 2024-05-10 12:47:30)'),
(87, '2024-05-10 12:54:06', '2024-05-10 12:54:06', 4, 764, 'Scot Craig updated product \'Samsung Galaxy S24\' (images: a:1:{i:0;s:26:\"samsung-s24.jpg_050524.jpg\";} => a:2:{i:0;s:26:\"samsung-s24.jpg_100524.jpg\";i:1;s:31:\"samsung-s24-back.jpg_100524.jpg\";}, updated_at: 2024-05-10 12:47:30 => 2024-05-10 12:54:06)'),
(88, '2024-05-10 12:54:46', '2024-05-10 12:54:46', 4, 764, 'Scot Craig updated product \'Samsung Galaxy S24\' (images: a:2:{i:0;s:26:\"samsung-s24.jpg_100524.jpg\";i:1;s:31:\"samsung-s24-back.jpg_100524.jpg\";} => a:3:{i:0;s:27:\"samsung-s-23.jpg_100524.jpg\";i:1;s:26:\"samsung-s24.jpg_100524.jpg\";i:2;s:31:\"samsung-s24-back.jpg_100524.jpg\";}, updated_at: 2024-05-10 12:54:06 => 2024-05-10 12:54:46)'),
(89, '2024-05-10 12:58:16', '2024-05-10 12:58:16', 4, 762, 'Scot Craig updated product \'Samsung S23\' (brand_id: 453 => 461, feature_id: 1295 => 1303, updated_at: 2024-05-05 22:52:47 => 2024-05-10 12:58:16)'),
(91, '2024-05-10 13:53:05', '2024-05-10 13:53:05', 4, 776, 'Scot Craig updated product \'Iphone 8\' (name: Contact => Iphone 8, slug: contactt => iphone-8, manufacturer: contact => Apple Inc., regular_price: 555.00 => 600, stock_on_hand: 10 => 50, image: search-icon.png_100524071705.png => iphone-8.jpeg_100524135305.jpeg, images: a:1:{i:0;s:23:\"Capture3.PNG_100524.PNG\";} => a:1:{i:0;s:25:\"iphone-8.jpeg_100524.jpeg\";}, brand_id: 432 => 436, feature_id: 1320 => 1316, updated_at: 2024-05-10 07:42:18 => 2024-05-10 13:53:05)'),
(92, '2024-05-10 13:57:06', '2024-05-10 13:57:06', 4, 777, 'Scot Craig created product \'Huawei Y9\''),
(93, '2024-05-10 13:59:57', '2024-05-10 13:59:57', 4, 778, 'Scot Craig created product \'Google Pixel 3\''),
(94, '2024-05-10 14:05:10', '2024-05-10 14:05:10', 4, 779, 'Scot Craig created product \'Samsung Galaxy Z Flip\''),
(96, '2024-05-10 14:12:12', '2024-05-10 14:12:12', 4, 745, 'Scot Craig updated product \'Iphone 6\' (sale_price: 0.00 => 349, stock_on_hand: 10 => 18, images: a:1:{i:0;s:23:\"iphone-6.jpg_050524.jpg\";} => a:2:{i:0;s:23:\"iphone-6.jpg_100524.jpg\";i:1;s:29:\"iphone-6-front.jpg_100524.jpg\";}, feature_id: 1317 => 1304, updated_at: 2024-05-05 22:47:15 => 2024-05-10 14:12:12)'),
(97, '2024-05-10 14:14:02', '2024-05-10 14:14:02', 4, 744, 'Scot Craig updated product \'Sony Xperia 1 V\' (stock_on_hand: 10 => 80, images: a:1:{i:0;s:29:\"sony-xperia-1v.jpg_050524.jpg\";} => a:1:{i:0;s:29:\"sony-xperia-1v.jpg_100524.jpg\";}, category_id: 457 => 461, feature_id: 1310 => 1309, updated_at: 2024-05-05 22:38:33 => 2024-05-10 14:14:02)'),
(98, '2024-05-10 14:21:39', '2024-05-10 14:21:39', 4, 743, 'Scot Craig updated product \'Iphone 14\' (product_model: iphone14 => A2884, category_id: 444 => 455, brand_id: 449 => 436, updated_at: 2024-05-04 12:58:31 => 2024-05-10 14:21:39)');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `cust_phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstname`, `lastname`, `cust_phone`, `email`, `address`, `postcode`, `city`, `state`) VALUES
(215, 'Wilmer', 'Kovacek', '+1-225-702-3179', 'dayton14@example.net', '732 Lauriane Centers\nSophiaville, MS 18755-5765', '93009-3029', 'Port Ryann', 'Oregon'),
(216, 'Braulio', 'Kulas', '(717) 251-8529', 'lia.gusikowski@example.com', '5658 Casimir Park Apt. 164\nLake Lisette, OR 97381', '91722', 'Stephonville', 'Maine'),
(217, 'Dejah', 'Pollich', '435-895-2418', 'austen47@example.org', '8186 Wilkinson Shoals Suite 020\nNew Jade, OR 77571', '87545-3684', 'Feeneyfort', 'California'),
(218, 'Blair', 'Strosin', '+12489923564', 'rocio.walter@example.org', '653 Hessel Villages\nEast Ryleyberg, KS 58954', '77255-5019', 'New Evalyn', 'Mississippi'),
(219, 'Laurie', 'Champlin', '651-256-0674', 'aglae83@example.org', '27840 Griffin Mountains\nFrancistown, IL 85625', '84398', 'New Mertiechester', 'Massachusetts'),
(220, 'Brooks', 'Walsh', '+1-954-752-0682', 'davin.christiansen@example.org', '1888 Mohammad Camp Apt. 052\nNew Parisshire, NM 42563-7680', '04579', 'Wolffberg', 'New Jersey'),
(221, 'Sandy', 'Koelpin', '1-615-470-7884', 'mitchell.meaghan@example.org', '93425 Nienow Cove Apt. 873\nNorth Rhiannonmouth, PA 00524-1831', '78007-1096', 'Port Christy', 'Idaho'),
(222, 'Nikki', 'Kuhic', '(385) 888-6052', 'sage.sanford@example.com', '13060 Sibyl Orchard Suite 847\nLake Vincenza, AZ 33603', '15087-0713', 'East Cali', 'Wisconsin'),
(223, 'Tiana', 'Brakus', '713-794-1201', 'suzanne.sanford@example.com', '4001 Fidel Terrace Apt. 618\nSouth Stewartshire, NE 86654', '75924', 'New Laurel', 'Oklahoma'),
(224, 'Jabari', 'Welch', '(520) 741-8815', 'cummings.mike@example.com', '77222 Kobe Lodge\nSouth Ellsworthfort, WI 72951-0022', '43208-8931', 'Juniorstad', 'Oklahoma'),
(225, 'Wellington', 'Pacocha', '941.822.8785', 'braeden90@example.com', '1561 Jeromy Neck\nSouth Madalinetown, NY 26956-9967', '44814-3141', 'New Thea', 'District of Columbia'),
(226, 'Prince', 'D\'Amore', '1-762-463-8834', 'stokes.elissa@example.com', '197 Bertrand Path Suite 273\nBergstromborough, NC 37966-0413', '72435', 'Port Donavonbury', 'Connecticut'),
(227, 'Emelie', 'Kassulke', '+1.915.636.9340', 'dkulas@example.net', '609 Rosemary Point Apt. 817\nNorth Leonard, WV 50602-9221', '14711-7108', 'Lake Lyda', 'Oregon'),
(228, 'Orval', 'Rodriguez', '409.469.7459', 'jwelch@example.net', '40617 Gottlieb Camp Suite 346\nJuliaview, DC 87549-1674', '63550', 'Hillsside', 'Maryland'),
(229, 'Kyleigh', 'Rath', '318-779-6290', 'sporer.cornell@example.org', '4871 Kuvalis Skyway Suite 759\nGracieberg, LA 13501-9310', '90554-2862', 'West Modesta', 'Alabama'),
(230, 'Kasey', 'McKenzie', '586-398-7412', 'rachel.batz@example.com', '5975 Green Glen\nPort Darianahaven, OH 28592', '81337-6714', 'Zulaufstad', 'Nebraska'),
(231, 'Roscoe', 'Dibbert', '628-878-8535', 'cary.ritchie@example.net', '88943 Reichel Vista Apt. 365\nDickimouth, IN 74783', '72016-1607', 'Lake Quintenmouth', 'Minnesota'),
(232, 'Dixie', 'Swift', '1-701-897-7106', 'carlos.strosin@example.net', '252 Shemar Ridge\nMarielleside, ID 64298-9605', '99380-9657', 'Derekville', 'Arkansas'),
(233, 'Norris', 'Stark', '520.346.2788', 'elinore.bosco@example.net', '196 Ricardo Greens\nLangstad, MA 28454', '69491', 'Port Flavietown', 'Nevada'),
(234, 'Ebba', 'Rutherford', '+1-424-715-1169', 'dan87@example.com', '2089 Odie Lodge\nEast Laverne, RI 71036-3363', '80223-0106', 'New Glenda', 'Arkansas');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `screensize` decimal(10,2) NOT NULL,
  `resolution` varchar(255) NOT NULL,
  `CPU` varchar(255) NOT NULL,
  `RAM` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `battery` int(11) NOT NULL,
  `rear_camera` varchar(255) NOT NULL,
  `front_camera` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`feature_id`, `weight`, `dimensions`, `OS`, `screensize`, `resolution`, `CPU`, `RAM`, `storage`, `battery`, `rear_camera`, `front_camera`) VALUES
(1295, 207.00, '157.6 x 74.3 x 8', 'EMUI 14.2', 6.60, '1256 x 2760', 'Octa-core (1x2.3 GHz Taishan Big & 3x2.18 GHz Taishan Mid & 4x1.55 GHz Cortex-A510)', '12', '256GB/512GB/1TB', 4900, '50 MP, f/1.4-4.0, 25mm (wide), 1/1.3\", PDAF, Laser AF, OIS 12 MP, f/3.4, 125mm (periscope telephoto), PDAF, OIS, 5x optical zoom 13 MP, f/2.2, 13mm (ultrawide)', '13 MP, f/2.4, (ultrawide)'),
(1296, 171.00, '147.6 x 71.6 x 7.8', 'iOS 17, upgradable to iOS 17.4', 6.10, '1179 x 2556', 'Hexa-core (2x3.46 GHz Everest + 4x2.02 GHz Sawtooth)', '6GB', '128GB/256GB/512GB', 3349, '48 MP, f/1.6, 26mm (wide), 1/1.56\", 1.0µm, dual pixel PDAF, sensor-shift OIS 12 MP, f/2.4, 13mm, 120˚ (ultrawide)', '12 MP, f/1.9, 23mm (wide), 1/3.6\", PDAF'),
(1297, 174.00, '146.7 x 71.5 x 7.7', 'iOS 15, upgradable to iOS 17.4', 6.10, '1170 x 2532', 'Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)', '4', '128GB/256GB/512GB', 3240, '12 MP, f/1.6, 26mm (wide), 1/1.9\", 1.7µm, dual pixel PDAF, sensor-shift OIS 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.4\", 1.0µm', '12 MP, f/2.2, 23mm (wide), 1/3.6\"'),
(1298, 155.00, '153 x 76.6 x 9.8', 'Android 6.0.1 (Marshmallow), upgradable to 7.0 (Nougat)', 5.50, '1080 x 1920', 'Octa-core (4x1.5 GHz Cortex-A53 & 4x1.2 GHz Cortex-A53)', '2', '16GB/32GB', 3000, '13 MP, f/2.0, AF', '5 MP, f/2.2'),
(1299, 187.00, '150.5 x 70.8 x 8.9', 'Android 14', 6.20, '1080 x 2400', 'Nona-core (1x3.0 GHz Cortex-X3 & 4x2.45 GHz Cortex-A715 & 4x2.15 GHz Cortex-A510)', '8GB', '128GB/256GB', 4575, '50 MP, f/1.7, 25mm (wide), 1/1.31\", 1.2µm, dual pixel PDAF, Laser AF, OIS 12 MP, f/2.2, 126˚ (ultrawide), 1/2.9\", 1.25µm, AF', '10.5 MP, f/2.2, 20mm (ultrawide), 1/3.1\", 1.22µm'),
(1300, 124.00, '119.9 x 64 x 9.9', 'Microsoft Windows Phone 8, upgradable to 8.1', 4.00, '480 x 800', 'Dual-core 1.0 GHz', '1GB', '8GB', 1430, '5 MP, f/2.4, 28mm (wide), 1/4.0\", AF', '0'),
(1301, 167.00, '147 x 70.6 x 7.6', 'Android 14, One UI 6.1', 6.20, '1080 x 2340', '8-core (1x3.39GHz Cortex-X4 & 3x3.1GHz Cortex-A720 & 2x2.9GHz Cortex-A720 & 2x2.2GHz Cortex-A520)', '8GB/12GB', '128GB/256GB/512GB', 4000, '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, dual pixel PDAF, OIS 10 MP, f/2.4, 67mm (telephoto), 1/3.94\", 1.0µm, PDAF, OIS, 3x optical zoom 12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '12 MP, f/2.2, 26mm (wide), dual pixel PDAF'),
(1302, 183.00, 'Unfolded: 167.3 x 73.6 x 7.2 mm Folded: 87.4 x 73.6 x 17.3 mm', 'Android 10, upgradable to Android 12, One UI 4.1.1', 6.70, '1080 x 2636', 'Octa-core (1x2.95 GHz Kryo 485 & 3x2.41 GHz Kryo 485 & 4x1.78 GHz Kryo 485)', '8GB', '256GB', 3300, '12 MP, f/1.8, 27mm (wide), 1/2.55\", 1.4µm, dual pixel PDAF, OIS 12 MP, f/2.2, 123˚ (ultrawide), 1.12µm', '10 MP, f/2.4, 26mm (wide), 1.22µm'),
(1303, 168.00, '146.3 x 70.9 x 7.6', 'Android 13, upgradable to Android 14, One UI 6.1', 6.10, '1080 x 2340', 'Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)', '8GB', '128GB/256GB/512GB', 3900, '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, dual pixel PDAF, OIS 10 MP, f/2.4, 70mm (telephoto), 1/3.94\", 1.0µm, PDAF, OIS, 3x optical zoom 12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '12 MP, f/2.2, 26mm (wide), dual pixel PDAF'),
(1304, 129.00, '138.1 x 67 x 6.9', 'iOS 8, upgradable to iOS 12.5.6', 4.70, '750 x 1334', 'Dual-core 1.4 GHz Typhoon (ARM v8-based)', '1GB', '16GB/32GB/128GB', 1810, '8 MP, f/2.2, 29mm (standard), 1/3.0\", 1.5µm, PDAF', '1.2 MP, f/2.2, 31mm (standard)'),
(1309, 187.00, '165 x 71 x 8.3', 'Android 13, upgradable to Android 14', 6.50, '1644 x 3840', 'Octa-core (1x3.2 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)', '12GB', '256GB/512GB', 5000, '48 MP, f/1.9, 24mm (wide), 1/1.35\", 1.12µm, dual pixel PDAF, OIS 12 MP, f/2.3, 85mm (telephoto), f/2.8, 125mm (telephoto), 1/3.5\", dual pixel PDAF, 3.5x-5.2x continuous optical zoom, OIS 12 MP, f/2.2, 16mm (ultrawide), 1/2.5\", dual pixel PDAF', 'laborum12 MP, f/2.0, 24mm (wide), 1/2.9\", 1.25µm'),
(1310, 172.00, '146.7 x 71.5 x 7.8', 'iOS 16, upgradable to iOS 17.4', 6.10, '1170 x 2532', 'Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard)', '6GB', '128GB/256GB/512GB', 3279, '12 MP, f/1.5, 26mm (wide), 1/1.7\", 1.9µm, dual pixel PDAF, sensor-shift OIS 12 MP, f/2.4, 13mm, 120˚ (ultrawide)', '12 MP, f/1.9, 23mm (wide), 1/3.6\", PDAF'),
(1311, 148.00, '145.6 x 68.2 x 7.9', 'Android 9.0 (Pie), upgradable to Android 12', 5.50, '1080 x 2160', 'Octa-core (4x2.5 GHz Kryo 385 Gold & 4x1.6 GHz Kryo 385 Silver)', '64GB 4GB RAM, 128GB 4GB RAM', '64GB/128GB', 2915, '12.2 MP, f/1.8, 28mm (wide), 1/2.55\", 1.4µm, dual pixel PDAF, OIS', '8 MP, f/1.8, 28mm (wide), PDAF 8 MP, f/2.2, 19mm (ultrawide), no AF'),
(1312, 173.00, '162.4 x 77.1 x 8.1', 'Android 8.1 (Oreo), EMUI 8.2', 6.50, '1080 x 2340', 'Octa-core (4x2.2 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)', '64GB 3GB RAM, 64GB 4GB RAM, 128GB 4GB RAM, 128GB 6GB RAM', '64GB/128GB', 4000, '13 MP, f/1.8, PDAF 2 MP, f/2.4, (depth)', '16 MP, f/2.0 2 MP, f/2.4, depth sensor'),
(1315, 138.00, '138.3 x 67.1 x 7.1', 'iOS 10.0.1, upgradable to iOS 15.8.1', 4.70, '750 x 1334', 'Quad-core 2.34 GHz (2x Hurricane + 2x Zephyr)', '2GB', '32GB/128GB/256GB', 1960, '12 MP, f/1.8, 28mm (wide), 1/3.0\", PDAF, OIS', '7 MP, f/2.2, 32mm (standard)'),
(1316, 148.00, '138.4 x 67.3 x 7.3', 'iOS 11, up to iOS 16.7.5', 4.70, '750 x 1334', 'Hexa-core (2x Monsoon + 4x Mistral)', '2GB', '64GB/128GB/256GB', 1821, '12 MP, f/1.8, 28mm (wide), PDAF, OIS', '7 MP, f/2.2'),
(1317, 215.26, '163.26', 'unde', 6.35, 'eaque', 'quae', 'et', 'iure', 3936, 'culpa', 'consequatur'),
(1318, 234.38, '145.61', 'voluptas', 6.27, 'est', 'laudantium', 'commodi', 'porro', 4840, 'iure', 'quia'),
(1319, 198.47, '133.71', 'nisi', 5.71, 'incidunt', 'error', 'eum', 'fugiat', 4393, 'illo', 'ratione'),
(1320, 163.87, '150.79', 'magni', 4.57, 'est', 'aut', 'tempore', 'sapiente', 2488, 'culpa', 'praesentium'),
(1321, 232.59, '115.03', 'aut', 4.69, 'nihil', 'ea', 'dignissimos', 'ut', 4480, 'natus', 'minima'),
(1322, 237.37, '124.84', 'dicta', 5.56, 'error', 'quibusdam', 'quia', 'facilis', 3398, 'sed', 'quod'),
(1323, 238.73, '148.81', 'amet', 6.42, 'rerum', 'enim', 'et', 'est', 2835, 'aut', 'sint'),
(1324, 122.74, '184.57', 'aperiam', 6.15, 'accusamus', 'id', 'esse', 'neque', 3394, 'deleniti', 'voluptas'),
(1325, 246.43, '109.36', 'a', 6.45, 'illo', 'repudiandae', 'dolore', 'sint', 4721, 'est', 'debitis'),
(1326, 231.59, '192.95', 'rerum', 6.66, 'enim', 'sit', 'sunt', 'quod', 2535, 'et', 'quasi'),
(1327, 211.62, '186.31', 'reiciendis', 4.55, 'sunt', 'veniam', 'et', 'harum', 4687, 'animi', 'aut'),
(1328, 180.04, '176.63', 'aut', 5.37, 'velit', 'maxime', 'corporis', 'officiis', 4841, 'quasi', 'dolores'),
(1329, 154.80, '161.78', 'fugit', 5.79, 'aspernatur', 'dolores', 'molestiae', 'expedita', 2282, 'quam', 'distinctio'),
(1330, 192.96, '126.74', 'dolor', 5.87, 'iusto', 'magnam', 'illum', 'id', 2945, 'aut', 'voluptas'),
(1331, 203.25, '126.62', 'officia', 4.02, 'perferendis', 'est', 'delectus', 'id', 2500, 'aut', 'voluptatem'),
(1332, 117.70, '166.57', 'occaecati', 4.75, 'deserunt', 'rem', 'omnis', 'earum', 3582, 'laboriosam', 'praesentium'),
(1333, 245.74, '170.51', 'unde', 5.05, 'explicabo', 'deserunt', 'cupiditate', 'ut', 2708, 'sunt', 'eveniet'),
(1334, 153.98, '167.95', 'fugit', 4.10, 'qui', 'quisquam', 'eum', 'dignissimos', 3037, 'aut', 'eius'),
(1335, 219.68, '132.06', 'autem', 4.61, 'odio', 'eum', 'dolorem', 'earum', 2779, 'labore', 'perferendis'),
(1336, 219.45, '182.28', 'et', 4.65, 'enim', 'et', 'odit', 'aliquid', 3686, 'inventore', 'ea'),
(1337, 135.04, '100.18', 'laudantium', 6.09, 'quia', 'similique', 'placeat', 'neque', 4732, 'officia', 'omnis'),
(1338, 138.04, '135.27', 'sit', 4.74, 'nisi', 'qui', 'quibusdam', 'voluptate', 2314, 'beatae', 'esse'),
(1339, 229.06, '162.60', 'laborum', 4.05, 'et', 'doloremque', 'ipsa', 'quia', 3710, 'provident', 'doloremque'),
(1340, 117.87, '179.77', 'labore', 4.83, 'sit', 'nihil', 'hic', 'quaerat', 4484, 'aut', 'aut'),
(1341, 114.74, '105.43', 'ad', 5.33, 'occaecati', 'sed', 'eos', 'itaque', 3517, 'magnam', 'doloribus'),
(1342, 182.21, '169.93', 'eligendi', 4.58, 'tempora', 'vel', 'nostrum', 'sunt', 2010, 'at', 'accusamus'),
(1343, 181.19, '131.43', 'nisi', 4.03, 'delectus', 'qui', 'quia', 'voluptatem', 2031, 'in', 'ipsa'),
(1344, 138.26, '137.05', 'nesciunt', 4.71, 'doloremque', 'quia', 'illum', 'alias', 2291, 'odio', 'error'),
(1345, 200.50, '115.99', 'quia', 6.81, 'soluta', 'consequuntur', 'nihil', 'autem', 4228, 'sequi', 'ullam'),
(1346, 244.41, '127.18', 'eum', 4.45, 'voluptas', 'qui', 'qui', 'provident', 3076, 'placeat', 'exercitationem'),
(1347, 148.10, '154.10', 'sint', 5.75, 'deserunt', 'reiciendis', 'commodi', 'possimus', 4402, 'qui', 'reiciendis'),
(1348, 215.03, '163.23', 'nam', 4.07, 'deserunt', 'repellat', 'quia', 'reiciendis', 2147, 'adipisci', 'enim'),
(1349, 154.93, '125.34', 'tempora', 6.14, 'et', 'veritatis', 'autem', 'minima', 4933, 'nulla', 'distinctio'),
(1350, 213.28, '140.13', 'eveniet', 4.10, 'eveniet', 'dicta', 'rem', 'laborum', 3156, 'officiis', 'sit'),
(1351, 138.45, '175.95', 'hic', 4.32, 'dolores', 'debitis', 'exercitationem', 'est', 4683, 'et', 'voluptatibus'),
(1352, 198.83, '105.36', 'unde', 5.29, 'aperiam', 'assumenda', 'quod', 'recusandae', 4997, 'est', 'et'),
(1353, 216.60, '180.33', 'id', 4.03, 'voluptatem', 'deserunt', 'incidunt', 'dolore', 3200, 'quia', 'illum'),
(1354, 101.69, '106.34', 'non', 4.95, 'natus', 'iste', 'repudiandae', 'ad', 4719, 'facilis', 'optio'),
(1355, 164.70, '150.91', 'occaecati', 4.02, 'adipisci', 'occaecati', 'perferendis', 'aspernatur', 2206, 'aut', 'impedit'),
(1356, 246.65, '146.56', 'maiores', 4.70, 'voluptate', 'animi', 'odit', 'non', 2938, 'aut', 'porro'),
(1357, 145.51, '183.67', 'et', 4.87, 'totam', 'vel', 'nihil', 'corporis', 2177, 'et', 'sunt'),
(1358, 216.97, '192.59', 'modi', 6.70, 'omnis', 'illo', 'impedit', 'rerum', 2071, 'possimus', 'sint'),
(1359, 132.60, '193.93', 'debitis', 6.75, 'sit', 'sed', 'reprehenderit', 'molestiae', 3078, 'odit', 'tenetur'),
(1360, 179.77, '181.81', 'atque', 4.59, 'temporibus', 'est', 'quibusdam', 'illum', 2405, 'fugit', 'minima'),
(1361, 206.38, '195.47', 'et', 5.62, 'harum', 'tenetur', 'cum', 'ea', 2264, 'sit', 'aut'),
(1363, 197.76, '150.46', 'quos', 5.12, 'autem', 'saepe', 'consequatur', 'mollitia', 3989, 'pariatur', 'et'),
(1364, 115.44, '182.59', 'voluptatem', 5.75, 'totam', 'dolore', 'a', 'qui', 3264, 'odit', 'esse'),
(1365, 166.06, '148.43', 'ut', 5.03, 'voluptas', 'omnis', 'quisquam', 'cum', 3541, 'in', 'dicta'),
(1366, 171.00, '147.6 x 71.6 x 7.8', 'iOs 17', 6.10, '1179 x 255', 'Hexa-core (2x3.46 GHz Everest + 4x2.02 GHz Sawtooth)', '8 GB RAM', '128/256/512', 3349, '48 MP / 12 MP', '12 MP');

-- --------------------------------------------------------

--
-- Table structure for table `feature_product`
--

CREATE TABLE `feature_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_product`
--

INSERT INTO `feature_product` (`product_id`, `feature_id`) VALUES
(712, 1297),
(714, 1298),
(716, 1315),
(743, 1310),
(744, 1309),
(745, 1304),
(762, 1303),
(764, 1301),
(765, 1300),
(766, 1299),
(769, 1296),
(770, 1295),
(776, 1316),
(777, 1312),
(778, 1311),
(779, 1302);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '0001_01_01_000000_create_users_table', 1),
(14, '0001_01_01_000001_create_cache_table', 1),
(15, '0001_01_01_000002_create_jobs_table', 1),
(16, '2024_04_02_150916_create_brands_table', 1),
(17, '2024_04_02_151029_create_categories_table', 1),
(18, '2024_04_07_092837_create_features_table', 2),
(19, '2024_04_02_151109_create_products_table', 3),
(20, '2024_04_07_085525_create_customers_table', 4),
(37, '2024_04_07_085442_create_orders_table', 5),
(38, '2024_04_07_085509_create_order_details_table', 5),
(39, '2024_04_07_105359_create_changelogs_table', 5),
(40, '2024_04_08_103853_create_feature_product_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_number` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `order_delivery_date` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_sold` decimal(10,2) NOT NULL,
  `order_number` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_model` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `stock_on_hand` int(10) UNSIGNED NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `images` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `slug`, `product_model`, `manufacturer`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `stock_on_hand`, `featured`, `image`, `images`, `category_id`, `brand_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(712, 'Iphone 13', 'iphone-13', 'A2631', 'Apple Inc.', 'N/A', 'N/A', 1300.00, 1096.00, 'SMD258', 'instock', 155, 0, 'iphone-13.jpg_100524121736.jpg', 'a:2:{i:0;s:24:\"iphone-13.jpg_100524.jpg\";i:1;s:30:\"iphone-13-front.jpg_100524.jpg\";}', 455, 436, 1297, '2024-04-10 12:12:45', '2024-05-10 02:17:36'),
(714, 'Moto G4', 'moto-g4', 'XT1622', 'Motorola', 'N/A', 'N/A', 300.00, 258.00, 'SMD300', 'instock', 189, 0, 'moto-g4.jpg_100524122427.jpg', 'a:1:{i:0;s:22:\"moto-g4.jpg_100524.jpg\";}', 457, 441, 1298, '2024-04-10 12:12:45', '2024-05-10 02:24:27'),
(716, 'Iphone 7', 'iphone-7', 'A1853', 'Apple Inc.', 'N/A', 'N/A', 500.00, 245.00, 'SMD149', 'instock', 100, 0, 'iphone-7.jpg_100524135104.jpg', 'a:1:{i:0;s:23:\"iphone-7.jpg_100524.jpg\";}', 455, 436, 1315, '2024-04-10 12:12:45', '2024-05-10 03:51:04'),
(743, 'Iphone 14', 'iphone-14', 'A2884', 'Apple', 'N/A', 'N/A', 1200.00, 1177.00, 'IKK606', 'instock', 10, 0, 'iphone-14.png_100524142318.png', 'a:1:{i:0;s:24:\"iphone-14.png_100524.png\";}', 455, 436, 1310, '2024-04-25 06:38:52', '2024-05-10 04:23:18'),
(744, 'Sony Xperia 1 V', 'sony-xperia-1v', 'XQDQ62', 'Sony Corporation', 'N/A', 'N/A', 899.00, 900.00, 'DWR503', 'instock', 80, 0, 'sony-xperia-1v.jpg_050524223833.jpg', 'a:1:{i:0;s:29:\"sony-xperia-1v.jpg_100524.jpg\";}', 461, 437, 1309, '2024-04-25 06:50:21', '2024-05-10 04:14:02'),
(745, 'Iphone 6', 'iphone-6', 'A1549', 'Apple Inc.', 'N/A', 'N/A', 349.00, 349.00, 'TUV239', 'instock', 18, 0, 'iphone-6.jpg_050524224715.jpg', 'a:2:{i:0;s:23:\"iphone-6.jpg_100524.jpg\";i:1;s:29:\"iphone-6-front.jpg_100524.jpg\";}', 455, 436, 1304, '2024-04-25 06:50:57', '2024-05-10 04:12:12'),
(762, 'Samsung S23', 'samsung-s23', 'SM-S911W', 'Samsung Electronics Co., Ltd.', 'N/A', 'N/A', 1300.00, 1250.00, 'GM2831', 'instock', 200, 0, 'samsung-s-23.jpg_050524225247.jpg', 'a:1:{i:0;s:27:\"samsung-s-23.jpg_050524.jpg\";}', 461, 461, 1303, '2024-04-30 00:44:04', '2024-05-10 04:09:54'),
(764, 'Samsung Galaxy S24', 'samsung-galaxy-s24', 'SM-S921U1', 'Samsung Electronics', 'N/A', 'N/A', 1100.00, 1069.85, 'OOF942', 'instock', 10, 0, 'samsung-s24.jpg_050524230029.jpg', 'a:3:{i:0;s:27:\"samsung-s-23.jpg_100524.jpg\";i:1;s:26:\"samsung-s24.jpg_100524.jpg\";i:2;s:31:\"samsung-s24-back.jpg_100524.jpg\";}', 461, 461, 1301, '2024-04-30 19:10:01', '2024-05-10 02:54:46'),
(765, 'Nokia Lumia 520', 'nokia-lumia-520', 'Nokia520', 'Nokia Corporation', 'N/A', 'N/A', 1400.00, 1234.00, 'DLU625', 'instock', 10, 0, 'nokia-Lumia-520.jpg_050524230417.jpg', 'a:1:{i:0;s:30:\"nokia-Lumia-520.jpg_050524.jpg\";}', 457, 433, 1300, '2024-04-30 21:44:17', '2024-05-10 02:33:06'),
(766, 'Google Pixel 8', 'google-pixel-8', 'GZPFO', 'Foxconn', 'N/A', 'N/A', 1000.00, 797.00, '1GQ124', 'instock', 10, 0, 'google-pixel-8.PNG_050524231218.PNG', 'a:1:{i:0;s:29:\"google-pixel-8.PNG_050524.PNG\";}', 461, 463, 1299, '2024-04-30 21:46:34', '2024-05-10 02:28:24'),
(769, 'Iphone 15', 'iphone-15', 'A3089', 'Apple Inc.', 'N/A', 'N/A', 2000.00, 1497.00, '7E0685', 'instock', 10, 0, 'iphone-15.png_050524234043.png', 'a:1:{i:0;s:24:\"iphone-15.png_050524.png\";}', 455, 436, 1296, '2024-05-01 03:23:13', '2024-05-10 01:56:53'),
(770, 'Huawei Pura 70', 'huawei-pura-70', 'ADY-AL00', 'Huawei Technologies Co.', 'N/A', 'N/A', 1012.00, 999.00, 'AIO108', 'instock', 10, 0, 'huawei-pura-70.jpg_050524234614.jpg', 'a:1:{i:0;s:29:\"huawei-pura-70.jpg_050524.jpg\";}', 461, 435, 1295, '2024-05-01 04:55:26', '2024-05-09 23:57:07'),
(776, 'Iphone 8', 'iphone-8', 'contact', 'Apple Inc.', 'N/A', 'N/A', 600.00, 555.00, 'CJN689', 'instock', 50, 0, 'iphone-8.jpeg_100524135305.jpeg', 'a:1:{i:0;s:25:\"iphone-8.jpeg_100524.jpeg\";}', 455, 436, 1316, '2024-05-09 21:17:05', '2024-05-10 03:53:05'),
(777, 'Huawei Y9', 'huawei-y9', 'JKM-AL00', 'Huawei Technologies Co.', 'N/A', 'N/A', 500.00, 499.99, 'ASE554', 'instock', 10, 0, 'huawei-y9.jpg_100524135706.jpg', 'a:1:{i:0;s:24:\"huawei-y9.jpg_100524.jpg\";}', 457, 435, 1312, '2024-05-10 03:57:06', '2024-05-10 03:57:06'),
(778, 'Google Pixel 3', 'google-pixel-3', 'G013A', 'Foxconn', 'N/A', 'N/A', 400.00, 400.00, 'GMN845', 'instock', 10, 0, 'google-pixel-3.png_100524135957.png', 'a:1:{i:0;s:29:\"google-pixel-3.png_100524.png\";}', 457, 463, 1311, '2024-05-10 03:59:57', '2024-05-10 03:59:57'),
(779, 'Samsung Galaxy Z Flip', 'samsung-galaxy-z-flip', 'SM-F700U/DS', 'Samsung Electronics Co., Ltd.', 'N/A', 'N/A', 355.00, 355.00, 'AJP906', 'instock', 10, 0, 'samsung-galaxy-z-flip.jpg_100524140510.jpg', 'a:1:{i:0;s:36:\"samsung-galaxy-z-flip.jpg_100524.jpg\";}', 457, 461, 1302, '2024-05-10 04:05:10', '2024-05-10 04:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0j1cndVZtmTPqUF5UrgBFb6SHHpqEfUliMItbZ5d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVZvWEtYOUcwajF1RlhHWGkyZ3MxNTc3Q1k2NXJUV1FtWGl3aHNhbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1721817487),
('efF2y2h7W2lmU28y45VK7hXPWy4t3kPCKfrCEX5F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGFkWEROTjh1Uk44Z1hKRTg1eDRVSVk0OXZCa056M3YyTVdLZGVjdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1721817866),
('npOY10lPf4oo3my5jklUcaqv9swjT3L7hP0erXB5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia01OQnVFalpFOWlsUmRROWFrSWF5dWc0ck81RDltM25hYk9MYW9vNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721779903);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Manager', 'manager@mobilestore.com', NULL, '$2y$12$hR1S.i4UvGQMId7qvSSTd.VJHIdEn3yn8GbKig4Gr9ysa2Su2bwT6', 'MGR', NULL, '2024-04-12 02:35:39', '2024-04-12 02:35:39'),
(4, 'Randolph Landry', 'admin@mobilestore.com', NULL, '$2y$12$F8cJPnGbM0x0aQfEZozZj.cyYmmT0aLdAcmVF.Oav2aRt7b.Gda9K', 'ADM', NULL, '2024-04-12 02:47:29', '2024-04-16 05:29:47'),
(5, 'Brock Tolmer\r\n', 'customer@mobilestore.com', NULL, '$2y$12$6H/QVNn4kb8XOLfSlrbjKuCvbBeMrlGMuRx9RWrllu4dK9vOpg2Kq', 'USR', NULL, '2024-04-12 12:00:23', '2024-04-12 12:00:23'),
(6, 'Leo Mackinnon', 'Leo2@mobilestore.com', NULL, '$2y$12$PtS1XJ6oEJBruWKAfwB/jOtQqaFQ6oGdQMH7BW4DTJcmaZqlPk7bi', 'ADM', NULL, '2024-04-15 03:39:56', '2024-07-23 04:54:53'),
(19, 'Alexandria Logan', 'admin5@mobilestore.com', NULL, '$2y$12$d/o8D49qdN5pFxFIE0wKOuQji/Fd1riw9Pbaaoe6v7fA3bmoRJU.S', 'ADM', NULL, '2024-04-16 06:40:21', '2024-07-23 04:56:31'),
(23, 'admin3', 'admin3@mobilestore.com', NULL, '$2y$12$oM0MgYZcsXQPHMXtHfsa1eVLVqp3rQxMaNrKoI4Rms3UrW0C/Af72', 'ADM', NULL, '2024-04-16 23:39:17', '2024-07-23 04:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `changelogs`
--
ALTER TABLE `changelogs`
  ADD PRIMARY KEY (`changelog_id`),
  ADD KEY `changelogs_user_id_foreign` (`user_id`),
  ADD KEY `changelogs_product_id_foreign` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `feature_product`
--
ALTER TABLE `feature_product`
  ADD PRIMARY KEY (`product_id`,`feature_id`),
  ADD KEY `feature_product_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_details_order_number_foreign` (`order_number`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `changelog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `feature_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1369;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feature_product`
--
ALTER TABLE `feature_product`
  ADD CONSTRAINT `feature_product_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`feature_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feature_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
