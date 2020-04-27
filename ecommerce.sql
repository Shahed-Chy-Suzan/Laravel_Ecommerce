-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 11:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `category`, `coupon`, `product`, `blog`, `order`, `other`, `report`, `role`, `return`, `contact`, `comment`, `setting`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '01711212121', 'admin@gmail.com', NULL, '$2y$10$nQ.J0QlWLynYZOTtZdtePOWSUycOzU1riUXXTBcwUUAXyphSjK5F2', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '2020-02-21 04:49:25', '2020-02-22 13:30:13'),
(4, 'Shahed Chy', '0189999999', 'shahedchy@gmail.com', NULL, '$2y$10$7oEUYZeEIfcvtdP.ER6ymejOMQoka3k3s0hQQPm7oXzfg5oDolcae', NULL, '1', NULL, '1', '1', NULL, '1', NULL, NULL, '1', NULL, NULL, '1', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Glozzom', 'public/media/brand/Gfavicon1582574592.png', NULL, NULL),
(3, 'HP', 'public/media/brand/pc1582574666.jpeg', NULL, NULL),
(8, 'Samsung', 'public/media/brand/12_10_19_481582992705.png', NULL, NULL),
(9, 'Mixuse', 'public/media/brand/mlogo1582609223.png', NULL, NULL),
(10, 'Huawei', 'public/media/brand/121019_16_29_061582992408.jpg', NULL, NULL),
(11, 'Rado', 'public/media/brand/171019_14_37_171582992437.png', NULL, NULL),
(12, 'Lenovo', 'public/media/brand/231019_15_14_361582992479.jpg', NULL, NULL),
(13, 'Assus', 'public/media/brand/231019_15_25_361582992524.png', NULL, NULL),
(14, 'Canon', 'public/media/brand/231019_15_42_361582992569.png', NULL, NULL),
(15, 'Cats Eye', 'public/media/brand/231019_15_55_361582992604.png', NULL, NULL),
(16, 'Dell', 'public/media/brand/231019_15_10_371582992634.png', NULL, NULL),
(17, 'Sony', 'public/media/brand/121019_15_06_561582992742.jpg', NULL, NULL),
(18, 'Xiaomi', 'public/media/brand/231019_15_09_391582992782.png', NULL, NULL),
(19, 'Walton', 'public/media/brand/231019_15_16_381582992839.png', NULL, NULL),
(20, 'Men\'s World', 'public/media/brand/231019_15_40_371582992874.png', NULL, NULL),
(21, 'Plus Point', 'public/media/brand/231019_15_29_371582992910.jpg', NULL, NULL),
(22, 'Jamuna', 'public/media/brand/231019_15_51_371582992941.jpg', NULL, NULL),
(23, 'Apple', 'public/media/brand/231019_15_52_391582992968.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', '2020-02-24 11:24:41', NULL),
(2, 'Women\'s Fashion', '2020-02-24 05:26:08', '2020-02-24 05:26:08'),
(8, 'Child\'s Fashion', '2020-02-24 07:06:29', '2020-02-24 07:06:29'),
(9, 'Watch', '2020-02-27 10:06:53', '2020-02-27 10:06:53'),
(10, 'Furniture', '2020-02-29 08:13:08', '2020-02-29 08:13:08'),
(11, 'Electronics', '2020-02-29 08:13:33', '2020-02-29 08:13:33'),
(12, 'Health', '2020-02-29 08:13:56', '2020-02-29 08:13:56'),
(13, 'Beauty', '2020-02-29 14:15:02', NULL),
(14, 'Sports & Outdoor', '2020-02-29 14:15:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'learnHunter10', '10', NULL, NULL),
(2, 'LernHunter5', '5', NULL, NULL),
(3, 'CodersFoundation15', '15', NULL, NULL),
(4, 'SSB128', '7', NULL, NULL),
(5, 'iiuc', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_06_075920_create_admins_table', 1),
(5, '2020_02_22_194920_create_categories_table', 2),
(6, '2020_02_22_195135_create_subcategories_table', 2),
(7, '2020_02_22_195215_create_brands_table', 2),
(8, '2020_02_24_195015_create_brands_table', 3),
(9, '2020_02_24_195753_create_brands_table', 4),
(10, '2020_02_25_160219_create_coupons_table', 5),
(11, '2020_02_25_203447_create_newsletters_table', 6),
(12, '2020_02_26_111148_create_products_table', 7),
(13, '2020_02_28_132957_create_post_category_table', 8),
(14, '2020_02_28_133104_create_posts_table', 8),
(15, '2020_02_28_144335_create_post_category_table', 9),
(16, '2020_02_28_144352_create_posts_table', 9),
(17, '2020_03_05_182725_create_wishlists_table', 10),
(18, '2020_03_10_213028_create_settings_table', 11),
(19, '2016_06_01_000001_create_oauth_auth_codes_table', 12),
(20, '2016_06_01_000002_create_oauth_access_tokens_table', 12),
(21, '2016_06_01_000003_create_oauth_refresh_tokens_table', 12),
(22, '2016_06_01_000004_create_oauth_clients_table', 12),
(23, '2016_06_01_000005_create_oauth_personal_access_clients_table', 12),
(24, '2020_03_13_181939_create_orders_table', 13),
(25, '2020_03_13_182052_create_order_details_table', 13),
(26, '2020_03_13_182122_create_shipping_table', 13),
(27, '2020_03_17_160511_create_subscribers_table', 14),
(28, '2020_03_17_161233_create_seo_table', 15),
(29, '2020_03_23_143810_create_sitesetting_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'shahedchysuzan@gmail.com', '2020-02-25 21:10:24', NULL),
(2, 'Codersfoundation@gmail.com', '2020-02-23 21:43:56', NULL),
(3, 'LearnHunter@gmail.com', '2020-02-26 02:21:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '1wWgbEHONmTDIbFrdLu7JBswIUO7ffPNyRLQwH82', 'http://localhost', 1, 0, 0, '2020-03-12 04:11:43', '2020-03-12 04:11:43'),
(2, NULL, 'Laravel Password Grant Client', 'Km8sh1GyRIbatnkRmWbOFu6DSPGg8iMFgayoTmhe', 'http://localhost', 0, 1, 0, '2020-03-12 04:11:43', '2020-03-12 04:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-12 04:11:43', '2020-03-12 04:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(198) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `paying_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `payment_type`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(1, '1', 'card_1GMeqPFOBam2v3LthykqJ01O', '999', 'txn_1GMeqRFOBam2v3LtkWM0nuR7', '5e6d24257150e', '800.00', '7', '0', '800.00', 'stripe', '4', '0', 'March', '14-03-20', '2020', '522525', NULL, NULL),
(2, '1', 'card_1GMexDFOBam2v3Ltci4Vazr5', '999', 'txn_1GMexEFOBam2v3LtA6TyPhr7', '5e6d25cad4f4d', '800.00', '7', '0', '800.00', 'stripe', '0', '0', 'March', '14-03-20', '2020', '2563', NULL, NULL),
(3, '2', 'card_1GMf3AFOBam2v3LtVgqf1aIf', '999', 'txn_1GMf3BFOBam2v3LtCRJSptcO', '5e6d273c232a6', '350.00', '7', '0', '350.00', 'stripe', '1', '0', 'March', '21-03-20', '2020', '2521', NULL, NULL),
(4, '1', 'card_1GNc6SFOBam2v3LtNcSI43cO', '999', 'txn_1GNc6WFOBam2v3Lt3ZHVntFM', '5e709df394863', '887.00', '7', '0', '887.00', 'stripe', '3', '2', 'March', '17-03-20', '2020', '45578', NULL, NULL),
(5, '2', 'card_1GNcHAFOBam2v3LtQqbtwwhw', '999', 'txn_1GNcHEFOBam2v3Lt4sofdLGF', '5e70a08a36ec1', '944.00', '7', '0', '944.00', 'stripe', '0', '0', 'March', '17-03-20', '2020', '343274', NULL, NULL),
(6, '2', 'card_1GNcJKFOBam2v3LtPpCRnpfP', '999', 'txn_1GNcJOFOBam2v3LtgrN4SsyX', '5e70a11005328', '247.00', '7', '0', '247.00', 'stripe', '0', '0', 'March', '17-03-20', '2020', '34663', NULL, NULL),
(7, '2', 'card_1GNcL4FOBam2v3Lt3g59qS08', '999', 'txn_1GNcL6FOBam2v3LtOrx31LzE', '5e70a17c636aa', '27.00', '7', '0', '27.00', 'stripe', '0', '0', 'March', '17-03-20', '2020', '968547', NULL, NULL),
(8, '1', 'card_1GNxqoFOBam2v3LtV2OWeayv', '999', 'txn_1GNxqrFOBam2v3LtbFYjGWae', '5e71e48366699', '33.00', '7', '0', '33.00', 'stripe', '3', '2', 'March', '21-03-20', '2020', '164715', NULL, NULL),
(9, '1', 'card_1GOeVlFOBam2v3LtDIB7tKQZ', '999', 'txn_1GOeVnFOBam2v3LtAbb1pMTH', '5e746514adb8c', '444.00', '7', '0', '444.00', 'stripe', '3', '0', 'March', '20-03-20', '2020', '184036', NULL, NULL),
(10, '1', 'card_1GPjnYFOBam2v3Lto0ogMAqH', '999', 'txn_1GPjncFOBam2v3LtumlR2wjM', '5e7857708a5cb', '100.00', '7', '0', '100.00', 'stripe', '0', '0', 'March', '23-03-20', '2020', '344132', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(240) DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 2, '17', 'I Phone 11', 'white', 'm', '1', '300', '300', NULL, NULL),
(2, 2, '13', 'Lenovo Ideapad', 'white', '17inch', '1', '500', '500', NULL, NULL),
(3, 3, '17', 'I Phone 11', 'white', 'm', '1', '300', '300', NULL, NULL),
(4, 3, '14', 'Rado Watch', 'black', 'Small', '1', '50', '50', NULL, NULL),
(5, 4, '19', 'Mac Book', 'White', 'medium', '1', '787', '787', NULL, NULL),
(6, 4, '14', 'Rado Watch', 'black', 'Medium', '2', '50', '100', NULL, NULL),
(7, 5, '13', 'Lenovo Ideapad', 'white', '17inch', '1', '500', '500', NULL, NULL),
(8, 5, '9', 'iPhone Xr', 'red', '7.2inch', '1', '444', '444', NULL, NULL),
(9, 6, '16', 'Headphone', 'gray', 'l', '1', '27', '27', NULL, NULL),
(10, 6, '18', 'HP Notebook', 'black', NULL, '1', '220', '220', NULL, NULL),
(11, 7, '16', 'Headphone', 'gray', 'l', '1', '27', '27', NULL, NULL),
(12, 8, '10', 'T-Shirt', 'black', 'xl', '1', '33', '33', NULL, NULL),
(13, 9, '8', 'Huawei Mate 20 Pro', 'blue', 'long', '1', '444', '444', NULL, NULL),
(14, 10, '1', 'Hand Watch', 'black', '40mm', '2', '50', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_bn`, `post_image`, `details_en`, `details_bn`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hello Developers!', 'হ্যালো ডেভেলপার গণ!', 'public/media/post/1.6597956488964E+15.JPG', 'Welcome to the Laravel Framework, Have a good day to all.<br>', 'লারাভেল ফ্রেমওয়ার্কে আপনাদের স্বাগতম, সকলের দিন ভাল কাটুক।<br>', NULL, NULL),
(2, 1, 'Hello Programmers!', 'হ্যালো  প্রোগ্রামারস!', 'public/media/post/1.6597974460577E+15.jpeg', '<p>\r\n                   Welcome to the Computer Science, Have a good day to all.</p>', '<p>&nbsp; কম্পিউটার বিজ্ঞানে আপনাদের স্বাগতম, সকলের দিন ভাল কাটুক।</p>', NULL, NULL),
(3, 2, 'Good Morning! Learners', 'শুভ সকাল! বন্ধুগণ', 'public/media/post/1660941847566777.jpeg', 'Hope that all of you are fine, Have a nice day to all.Good wishes for you.', 'আশা করি সকলেই ভাল আছেন,সকলের দিনটি ভাল কাটুক। সকলের জন্য শুভ কামনা রইল।', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'service', 'সার্ভিস', NULL, NULL),
(2, 'Event', 'ইভেন্ট', NULL, NULL),
(3, 'Coupon', 'কুপন', NULL, NULL),
(4, 'Discount Offer !!', 'মূল্য ছাড় !!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `buyone_getone` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buyone_getone`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 9, 'Hand Watch', 'w-154', '20', 'GPS Over 30% larger display Electrical and optical heart sensors ECG app Digital Crown with haptic feedback 50% louder speaker S4 SiP with faster ...<br>Images may be subject to copyright.', 'black,blue', '40mm,35mm', '50', NULL, 'www.facebook.com', NULL, 1, 1, NULL, 1, 1, 1, 'public/media/product/1.6597895606799E+15.jpg', 'public/media/product/1.659711557189E+15.jpg', 'public/media/product/1.6597115576776E+15.jpg', 1, NULL, NULL),
(2, 2, 4, 15, 'Ladies Shoe', 'ws-43', '43', '<p>\r\n                 Show your flirty side with this pretty little ruffle ballet flat. The Charlene features a faux suede upper with layers of ruffles on the rounded toe, ...<br>* Check website for latest pricing and availability. Images may be subject to copyright. Learn More<br>Related images<br><br></p>', 'black,red', 'sm', '30', '25', 'www.youtube.com', NULL, 1, 1, NULL, NULL, 1, 1, 'public/media/product/1.6597773321166E+15.jpg', 'public/media/product/1.6597772370071E+15.jpg', 'public/media/product/1.6597773835914E+15.jpg', 1, NULL, NULL),
(3, 1, 3, 20, 'Men\'s Shoe', 'MS-78', '41', '<p>\r\n                 Show your flirty side with this pretty little ruffle ballet flat. The Charlene features a faux suede upper with layers of ruffles on the rounded toe</p><p>m34 - Medium</p><p>l-36 - Long<br></p>', 'white,blue-white', 'm34,l-36', '34', NULL, 'www.mensshow/youtube.com', NULL, 1, NULL, NULL, 1, NULL, 1, 'public/media/product/1.6597138179016E+15.jpg', 'public/media/product/1.6597138184252E+15.jpg', 'public/media/product/1570984353-structure22-1570984337.jpg1582826442.jpg', 1, NULL, NULL),
(4, 2, 1, 1, 'Ladies Bag', 'LB-12', '44', '<p>\r\n                 This Laundry Bag is made by the women in Bangladesh. These highly entrepreneurial women are trying to be economically empowered.</p><p>Check website for latest pricing and availability. Images may be subject to copyright. Learn More<br>Related images<br></p>', 'black,red,purple', 'm12,xl-11', '28', NULL, 'www.bagReview/video/youtube.com', NULL, 1, 1, NULL, NULL, NULL, 1, 'public/media/product/1.6597143356703E+15.jpeg', 'public/media/product/1.6597143359903E+15.jpg', 'public/media/product/1582826935.png', 1, NULL, NULL),
(5, 9, 12, 11, 'Men\'s stylish watch', 'w-932', '32', '<p>\r\n                 </p><ul><li>Round watch featuring unidirectional bezel and blue dial with date window at 4 o’clock and luminous hands/hour markers</li><li>Eco-Drive technology is fueled by light and never needs a battery</li><li>48 mm stainless steel case with mineral dial window</li><li>Japanese quartz movement with analog display</li><li>Molded polyurethane band with buckle closure</li><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'Black, Brown', 'Medium,Big', '35', '30', 'https://www.bagdoom.com/men/watches/citizen-men-s-eco-drive-promaster-diver.html', NULL, 1, 1, 1, NULL, 1, NULL, 'public/media/product/1.6598962864853E+15.png', 'public/media/product/1.6598876769862E+15.png', 'public/media/product/1.6598876773618E+15.png', 1, NULL, NULL),
(6, 11, 15, 8, 'Samsung Galaxy S9', 'samsung-102', '19', '<p><br></p><ul><li>Round watch featuring unidirectional bezel and blue dial with date window at 4 o’clock and luminous hands/hour markers</li><li>Eco-Drive technology is fueled by light and never needs a battery</li><li>48 mm stainless steel case with mineral dial window</li><li>Japanese quartz movement with analog display</li><li>Molded polyurethane band with buckle closure</li><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p>\r\n                 </p>', 'Navyblue,Black', '6 inch,6.3inch', '599', '400', 'www.youtube.com', NULL, NULL, 1, NULL, 1, NULL, NULL, 'public/media/product/1.6598995360244E+15.jpg', 'public/media/product/1.6598981210615E+15.png', 'public/media/product/1.6598981213151E+15.png', 1, NULL, NULL),
(7, 11, 15, 18, 'Xiaomi Redmi Note 7S', 'Xiaomi-111', '37', '<p>\r\n                 </p><ul><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'Red,Blue', 'mediul,small', '555', NULL, 'www.xiaomiReview/video/youtube.com', NULL, 1, 1, 1, 1, 1, NULL, 'public/media/product/1.6598985152504E+15.jpg', 'public/media/product/1.659898515482E+15.jpg', 'public/media/product/1.659898515657E+15.jpg', 1, NULL, NULL),
(8, 11, 15, 10, 'Huawei Mate 20 Pro', 'Huawei-21x', '5', '<p>\r\n                 </p><ul><li>Round watch featuring unidirectional bezel and blue dial with date window at 4 o’clock and luminous hands/hour markers</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'blue,black', 'long', '444', NULL, 'www.youtube.com', NULL, NULL, 1, NULL, NULL, NULL, 1, 'public/media/product/1.6598986487543E+15.jpg', 'public/media/product/1.6598986489413E+15.jpg', 'public/media/product/1.6598986490313E+15.jpg', 1, NULL, NULL),
(9, 11, 15, 23, 'iPhone Xr', 'iPhone-1xx', '21', '<p>\r\n                 </p><ul><li>Round watch featuring unidirectional bezel and blue dial with date window at 4 o’clock and luminous hands/hour markers</li><li>Eco-Drive technology is fueled by light and never needs a battery</li><li>48 mm stainless steel case with mineral dial window</li><li>Japanese quartz movement with analog display</li><li>Molded polyurethane band with buckle closure</li><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li></ul>', 'red,gray', '7.2inch', '599', '444', 'www.iphone/youtube.com', 1, NULL, NULL, NULL, NULL, 1, NULL, 'public/media/product/1.6598988130225E+15.png', 'public/media/product/1.6598988133411E+15.png', 'public/media/product/1.6598988135311E+15.png', 1, NULL, NULL),
(10, 1, 8, 15, 'T-Shirt', 'Ts-232', '79', '<p>\r\n                 </p><ul><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'black', 'xl,L', '45', '33', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'public/media/product/1.6598989452824E+15.jpg', 'public/media/product/1.659898945486E+15.jpg', 'public/media/product/1.659898945631E+15.jpg', 1, NULL, NULL),
(11, 1, 8, 21, 'Men\'s Slive T-shirt', 'MS-46', '75', '<p>\r\n                 </p><ul><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'gray', 'long,xxl', '39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'public/media/product/1.6598990707698E+15.jpg', 'public/media/product/1.6598990709198E+15.jpg', 'public/media/product/1.6598990710198E+15.jpg', 1, NULL, NULL),
(12, 9, 12, 11, 'Men\'s Black Watch', 'Mw-23', '44', '<p>\r\n                 </p><ul><li>Japanese quartz movement with analog display</li><li>Molded polyurethane band with buckle closure</li><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'gray', 'medium', '22', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'public/media/product/1.6598991713802E+15.png', 'public/media/product/1.6598991716752E+15.png', 'public/media/product/1.6598991719388E+15.png', 1, NULL, NULL),
(13, 11, 16, 12, 'Lenovo Ideapad', 'L-432', '24', '<p>\r\n                 </p><ul><li>Round watch featuring unidirectional bezel and blue dial with date window at 4 o’clock and luminous hands/hour markers</li><li>Eco-Drive technology is fueled by light and never needs a battery</li><li>Water resistant: WR200/20Bar/666ft [Swimming, Showering &amp; Snorkeling]</li><li>Blue Polyurethane Strap</li><li>Strap Buckle</li><li>Anti-Reflective Mineral Crystal</li><li>Japanese Quartz</li><li>Features: ISO Compliant Diver, Aluminum Ring on Bezel, One-Way \r\nRotating Elapsed-Time Bezel, Screw-Back Case and Screw Down Crown. \r\nAnti-Reflective Crystal</li><li>One-Way Rotating Bezel</li><li>Case Size: 48mm</li><li>Screw-Back Case &amp; Screw-Down</li><li>Blue Dial</li><li>Water Resistant: 200M</li><li>Manufacturer’s Five Year Limited Warranty</li><li>Style #: BN0151-09L</li></ul><p><br></p>', 'white', '17inch,16inch', '555', '500', NULL, NULL, 1, 1, 1, NULL, 1, 1, 'public/media/product/1.6600861513599E+15.png', 'public/media/product/1.6598993014739E+15.png', 'public/media/product/1.6598993016839E+15.png', 1, NULL, NULL),
(14, 9, 12, 11, 'Rado Watch', 'w-4t543', '67', '<p>                   	 New Trending Mens Watch</p><p>Water Resistant</p><p>Smart Multiple Color</p><p>Leather Belt</p><p>Long lasting battery.</p><p><br></p><p>\r\n                   </p>', 'black,blue,navyblue,gray', 'Small,Medium,ex-small,long', '100', '50', 'www.mensWatch/youtube.com', NULL, NULL, NULL, NULL, 1, 1, 1, 'public/media/product/1660490409866451.png', 'public/media/product/1660490410596845.png', 'public/media/product/1660490410665121.png', 1, NULL, NULL),
(15, 11, 16, 16, 'Dell Laptop', 'd-344', '5', 'New Laptop with modern configuration', 'black,white', 'l,m-3', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/media/product/1660491067015005.png', 'public/media/product/1660491067079207.png', 'public/media/product/1660491067100092.png', 1, NULL, NULL),
(16, 11, 18, 18, 'Headphone', 'H-221', '6', 'M-3 supuer sound headphone', 'gray', 'l,m', '27', NULL, 'www.headphone/youtube.com', NULL, NULL, 1, NULL, NULL, NULL, 1, 'public/media/product/1660494330568168.png', 'public/media/product/1660494330597116.png', 'public/media/product/1660494330628758.png', 1, NULL, NULL),
(17, 11, 15, 23, 'I Phone 11', 'h-211', '3', 'I phone 11, with suprerb resoulation', 'white', 'm', '300', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, 'public/media/product/1660494454264949.png', 'public/media/product/1660494454313493.png', 'public/media/product/1660494454334294.png', 1, NULL, NULL),
(18, 11, 16, 3, 'HP Notebook', 'HP-223', '6', 'Super HP Laptop', 'black', NULL, '220', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'public/media/product/1660494571380616.png', 'public/media/product/1660494571411729.png', 'public/media/product/1660494571489900.png', 1, NULL, NULL),
(19, 11, 16, 23, 'Mac Book', 'MB-32', '23', '<p>                   	 New stylish Mac book,Heavy configuration with superb graphics, </p><p>Easy to carry,</p><p>Smart looking Metlic Body,</p><p>Long lasting power supply</p><p>&nbsp;</p>', 'White,Gray,Light-white', 'medium,large,small,ex-sm', '787', NULL, 'www.applePc/youtube.com', NULL, 1, 1, NULL, 1, NULL, 1, 'public/media/product/1660505788123947.jpg', 'public/media/product/1660635793618601.jpeg', 'public/media/product/1660505788379607.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Ecommerce with Laravel', 'Learn Hunter', 'Ecommerce,Online Store', 'Here it is the complete project of Ecommerce site,Which is build with Laravel framework.', 'gl6p5g434f73h6', '3yg568gvw36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '3', '7', 'Echovel', 'Echovel@gmail.com', '018xxxxxxxx', 'Kadalpur,Raozan,Chittagong.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'shahed', '22333455325', 'admin@gmail.com', 'chittagong', 'Town', NULL, NULL),
(2, '2', 'shahed chy', '01826262626', 'shahedchy@gmail.com', 'Chittagong,102.A.D', 'Chittagong', NULL, NULL),
(3, '3', 'Adam Gilchrist', '8975934254', 'adam@gmail.com', 'street 23,B.D, Australia', 'Cikago', NULL, NULL),
(4, '4', 'Eden Hazard', '438958934583', 'Hazard@gmail.com', 'Real Madrid,Span', 'Barnabu', NULL, NULL),
(5, '5', 'Ricardo Kaka', '4637272323', 'kaka@gmail.com', 'Braselia, Brazil', 'Reo di zeniro', NULL, NULL),
(6, '6', 'Mesut Ozil', '45635768658', 'Ozil@gmail.com', 'Kairo,Egypt', 'Kairo', NULL, NULL),
(7, '7', 'Salah', '656587346', 'ms@gmail.com', 'Liverpool,England', 'Anfield', NULL, NULL),
(8, '8', 'Sadio Mane', '00345944366', 'sadio@gmail.com', 'Liverpool,England', 'Anfield', NULL, NULL),
(9, '9', 'Kane Williamson', '7239853456', 'kane@gmail.com', 'Newzilland', 'Nw,45 N A', NULL, NULL),
(10, '10', 'Koutinho', '34563465435', 'koutinho@gmail.com', 'Bayarn Meunich,Germany', 'Meunich', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '01821212121', '01723232323', 'Onetech@gmail.com', 'OneTech', 'Raozan,Chittagong,Bangladesh', 'www.facebook.com/onetech', 'www.youtube.com/onetech', 'www.instagram.com/onetech', 'www.twitter.com/onetech', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hijab & Scraf', NULL, NULL),
(2, 1, 'Panjabi & Pajama', NULL, NULL),
(3, 1, 'Shoe', NULL, NULL),
(4, 2, 'Shoe', NULL, NULL),
(5, 8, 'Baby Shoe', NULL, NULL),
(7, 1, 'Pants', NULL, NULL),
(8, 1, 'Shirt', NULL, NULL),
(9, 11, 'Refregerator', NULL, NULL),
(10, 2, 'Three Piece', NULL, NULL),
(11, 2, 'Kurtis', NULL, NULL),
(12, 9, 'Men\'s Watch', NULL, NULL),
(13, 9, 'Women\'s Watch', NULL, NULL),
(14, 9, 'Child Watch', NULL, NULL),
(15, 11, 'Mobile & Tablet', NULL, NULL),
(16, 11, 'Laptop', NULL, NULL),
(17, 11, 'Desktop', NULL, NULL),
(18, 11, 'Camera', NULL, NULL),
(19, 11, 'Television', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(198) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(189) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `provider`, `provider_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'user', 'user@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$6z7VivOYjAXZ5vRcdtKxEekycMe4LuXQKqIhOlqbr95iuP0Z2DIla', NULL, '2020-03-04 10:34:36', '2020-03-04 10:34:36', '0181111112'),
(2, 'shahed', 'shahed@gmail.com', NULL, NULL, NULL, '2020-03-04 13:10:23', '$2y$10$2HleI46qnKS9Xje5XiHUq.zpsqqED8ZMoAxKl6nUnMuxLT/owc1z6', NULL, '2020-03-04 13:04:16', '2020-03-04 15:32:57', '22333455325'),
(4, 'Sujan Ctg', 'sujanctg15@gmail.com', NULL, 'google', NULL, NULL, NULL, NULL, '2020-03-08 03:32:51', '2020-03-08 03:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, NULL, NULL),
(2, 1, 6, NULL, NULL),
(4, 1, 11, NULL, NULL),
(5, 1, 1, NULL, NULL),
(6, 1, 8, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 16, NULL, NULL),
(9, 1, 19, NULL, NULL),
(10, 1, 18, NULL, NULL),
(20, 1, 15, NULL, NULL),
(23, 4, 15, NULL, NULL),
(24, 2, 19, NULL, NULL),
(25, 2, 17, NULL, NULL),
(26, 2, 15, NULL, NULL),
(27, 1, 17, NULL, NULL),
(28, 1, 14, NULL, NULL),
(29, 1, 5, NULL, NULL),
(30, 1, 12, NULL, NULL),
(31, 2, 7, NULL, NULL),
(32, 1, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
