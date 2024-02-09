-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hishab`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `remarks` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrow_money_information`
--

CREATE TABLE `borrow_money_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `borrower_id` bigint(20) UNSIGNED NOT NULL,
  `borrow_date` varchar(255) NOT NULL,
  `possible_return_date` varchar(255) DEFAULT NULL,
  `actual_return_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(43, NULL, 'Food', 'food', '2024-01-09 04:18:04', '2024-01-09 04:18:04'),
(44, NULL, 'Transport', 'transport', '2024-01-09 04:18:17', '2024-01-09 04:18:17'),
(45, NULL, 'Bills', 'bills', '2024-01-09 04:18:23', '2024-01-09 04:18:23'),
(46, '43', 'Outdoor Food', 'outdoor-food', '2024-01-09 04:18:47', '2024-01-09 04:18:47'),
(47, '56', 'Vegetables', 'vegetables', '2024-01-09 04:19:03', '2024-01-21 21:56:29'),
(48, '44', 'By Road', 'by-road', '2024-01-09 04:19:11', '2024-01-09 04:19:11'),
(49, '44', 'By Water', 'by-water', '2024-01-09 04:19:24', '2024-01-09 04:19:24'),
(50, '44', 'By Air', 'by-air', '2024-01-09 04:19:34', '2024-01-09 04:19:34'),
(51, '48', 'Bus', 'bus', '2024-01-09 04:19:49', '2024-01-09 04:19:49'),
(52, '48', 'Auto Rickshaw', 'auto-rickshaw', '2024-01-09 04:20:18', '2024-01-09 04:20:18'),
(53, '48', 'Rickshaw', 'rickshaw', '2024-01-09 04:21:04', '2024-01-09 04:21:04'),
(55, '48', 'Leguna', 'leguna', '2024-01-11 02:04:22', '2024-01-11 02:04:22'),
(56, '43', 'Grocery', 'grocery', '2024-01-21 21:56:03', '2024-01-21 21:56:03'),
(57, '56', 'Egg', 'egg', '2024-01-21 21:56:49', '2024-01-21 21:56:49'),
(58, '47', 'Cabbage', 'cabbage', '2024-01-21 21:59:47', '2024-01-21 21:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `category_parent_trees`
--

CREATE TABLE `category_parent_trees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `parents` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_parent_trees`
--

INSERT INTO `category_parent_trees` (`id`, `category_id`, `parents`, `created_at`, `updated_at`) VALUES
(4, 46, '43', '2024-01-09 04:18:47', '2024-01-09 04:18:47'),
(5, 47, '43,56', '2024-01-09 04:19:03', '2024-01-21 21:56:29'),
(6, 48, '44', '2024-01-09 04:19:11', '2024-01-09 04:19:11'),
(7, 49, '44', '2024-01-09 04:19:24', '2024-01-09 04:19:24'),
(8, 50, '44', '2024-01-09 04:19:34', '2024-01-09 04:19:34'),
(9, 51, '44,48', '2024-01-09 04:19:49', '2024-01-09 04:19:49'),
(10, 52, '44,48', '2024-01-09 04:20:18', '2024-01-09 04:20:18'),
(11, 53, '44,48', '2024-01-09 04:21:04', '2024-01-09 04:21:04'),
(13, 55, '44,48', '2024-01-11 02:04:22', '2024-01-11 02:04:22'),
(14, 56, '43', '2024-01-21 21:56:03', '2024-01-21 21:56:03'),
(15, 57, '43,56', '2024-01-21 21:56:49', '2024-01-21 21:56:49'),
(16, 58, '43,56,47', '2024-01-21 21:59:47', '2024-01-21 21:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) NOT NULL DEFAULT '0',
  `quantity` varchar(255) DEFAULT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `expense_date` varchar(255) NOT NULL,
  `remarks` tinytext DEFAULT NULL,
  `payment_method_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category_id`, `amount`, `quantity`, `unit_id`, `expense_date`, `remarks`, `payment_method_id`, `created_at`, `updated_at`) VALUES
(2, 51, '20', NULL, NULL, '2024-01-22', 'no', '1', '2024-01-21 21:41:10', '2024-01-21 21:41:10'),
(3, 53, '100', NULL, NULL, '2024-01-20', 'no', '1', '2024-01-21 21:51:16', '2024-01-21 21:51:16'),
(4, 57, '140', '12', '3', '2024-01-20', 'no', '1', '2024-01-21 22:00:47', '2024-01-21 22:00:47'),
(5, 58, '100', '2', '3', '2024-01-20', 'no', '1', '2024-01-21 22:03:37', '2024-01-21 22:03:37'),
(7, 51, '40', NULL, NULL, '2024-01-20', 'no', '1', '2024-01-21 22:05:31', '2024-01-21 22:05:31'),
(8, 51, '20', NULL, NULL, '2024-01-22', 'no', '1', '2024-01-21 21:41:10', '2024-01-21 21:41:10'),
(9, 53, '100', NULL, NULL, '2024-01-20', 'no', '1', '2024-01-21 21:51:16', '2024-01-21 21:51:16'),
(10, 57, '140', '12', '3', '2024-01-20', 'no', '1', '2024-01-21 22:00:47', '2024-01-21 22:00:47'),
(11, 58, '100', '2', '3', '2024-01-20', 'no', '1', '2024-01-21 22:03:37', '2024-01-21 22:03:37'),
(12, 51, '40', NULL, NULL, '2024-01-20', 'no', '1', '2024-01-21 22:05:31', '2024-01-21 22:05:31'),
(13, 57, '140', '12', '3', '2024-01-20', 'no', '1', '2024-01-21 22:00:47', '2024-01-21 22:00:47'),
(14, 58, '100', '2', '3', '2024-01-20', 'no', '1', '2024-01-21 22:03:37', '2024-01-21 22:03:37'),
(15, 51, '40', NULL, NULL, '2024-01-20', 'no', '1', '2024-01-21 22:05:31', '2024-01-21 22:05:31');

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_source_id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `work_duration_in_days` varchar(255) NOT NULL DEFAULT '0',
  `income_date` varchar(255) DEFAULT NULL,
  `remarks` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_sources`
--

CREATE TABLE `income_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lenders`
--

CREATE TABLE `lenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `remarks` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lend_money_information`
--

CREATE TABLE `lend_money_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lender_id` bigint(20) UNSIGNED NOT NULL,
  `lend_date` varchar(255) NOT NULL,
  `possible_return_date` varchar(255) DEFAULT NULL,
  `actual_return_date` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_11_123119_create_visitor_infos_table', 1),
(14, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(15, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(16, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(17, '2016_06_01_000004_create_oauth_clients_table', 2),
(18, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(23, '2023_12_28_100813_create_categories_table', 3),
(24, '2023_12_28_100833_create_sub_categories_table', 3),
(27, '2024_01_05_033812_create_category_parent_trees_table', 4),
(38, '2024_01_12_054545_create_payment_methods_table', 5),
(39, '2024_01_12_055555_create_payment_methods_infos_table', 5),
(40, '2024_01_12_061342_create_lenders_table', 5),
(41, '2024_01_12_061343_create_lend_money_information_table', 5),
(42, '2024_01_12_062124_create_borrowers_table', 5),
(43, '2024_01_12_062209_create_borrow_money_information_table', 5),
(44, '2024_01_12_063351_create_incomes_table', 5),
(45, '2024_01_12_063357_create_income_sources_table', 5),
(47, '2024_01_12_054504_create_expenses_table', 6),
(49, '2024_01_12_054550_add_status_to_payment_methods_table', 7),
(51, '2024_01_18_102411_create_units_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
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
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method`, `slug`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Cash', 'cash', '2024-01-15 04:48:40', '2024-02-01 22:31:39', '1'),
(2, 'bKash', 'bkash', '2024-01-15 04:53:53', '2024-02-01 22:31:28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods_infos`
--

CREATE TABLE `payment_methods_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `cvc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods_infos`
--

INSERT INTO `payment_methods_infos` (`id`, `payment_method_id`, `account_name`, `account_number`, `bank_name`, `expire_date`, `cvc`, `created_at`, `updated_at`) VALUES
(1, 2, 'Md. Mahadi Islam', '01623421591', NULL, NULL, NULL, '2024-01-16 22:55:55', '2024-01-18 21:19:32'),
(2, 1, 'Mahadi', NULL, NULL, NULL, NULL, '2024-01-18 21:12:13', '2024-01-18 21:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '261deefe0d7ce10ebf3776d543640d7688fc739cafcd49d07285a172cc773485', '[\"*\"]', NULL, NULL, '2023-12-20 00:56:56', '2023-12-20 00:56:56'),
(2, 'App\\Models\\User', 1, 'authToken', '0a58ef3085d8fc6c04876db85c33025b306ecce30e78261a13ad93e5c9e9332b', '[\"*\"]', NULL, NULL, '2023-12-20 00:56:57', '2023-12-20 00:56:57'),
(3, 'App\\Models\\User', 1, 'authToken', '975f06ce1be8e6032a659a9cdb83ac93dc39ec11c75504a8bc3fdb48b248d2bc', '[\"*\"]', NULL, NULL, '2023-12-20 00:57:43', '2023-12-20 00:57:43'),
(4, 'App\\Models\\User', 1, 'authToken', 'affec0d7d19882a1c4eb19acf5cff26d10b346e0005ebd8cdb61e8f63ee7070b', '[\"*\"]', NULL, NULL, '2023-12-20 01:31:43', '2023-12-20 01:31:43'),
(5, 'App\\Models\\User', 1, 'MyAppToken', '34984b383e51f29cfd6f939bb32c5eb50dbf809b579bd4c23ad81df8c0089323', '[\"*\"]', NULL, NULL, '2023-12-20 01:33:17', '2023-12-20 01:33:17'),
(6, 'App\\Models\\User', 1, 'MyAppToken', 'ae454226ace13192b3e04732cf35a68be81409645401ef917624aebe7dd112e2', '[\"*\"]', NULL, NULL, '2023-12-20 01:44:31', '2023-12-20 01:44:31'),
(7, 'App\\Models\\User', 1, 'MyAppToken', 'aadc1515e2b619d98f07fae7e4f9bb26adae5dc2afbc2ea21767b80390ffc219', '[\"*\"]', NULL, NULL, '2023-12-20 01:44:51', '2023-12-20 01:44:51'),
(8, 'App\\Models\\User', 1, 'LaravelAuthApp', '7c7ef78c7cbd01c446f5018f038b89c290be028c6e1c1c012d45abde54f8f948', '[\"*\"]', NULL, NULL, '2023-12-20 03:31:54', '2023-12-20 03:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kilogram (kg)', '0', 'kilogram-kg', '2024-01-19 03:25:24', '2024-01-29 22:17:26'),
(2, 'Gram (gm)', '0', 'gram-gm', '2024-01-21 20:09:47', '2024-01-21 20:19:29'),
(3, 'Number', '1', 'number', '2024-01-21 22:02:18', '2024-01-21 22:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$Jcr4Wp0AcXKBFa2wQ8xrMuiegXOHIQ9RjTdavLo3SDoLmDHF.ojiK', '', NULL, '2023-09-03 22:44:04', '2023-09-03 22:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_infos`
--

CREATE TABLE `visitor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `countryName` varchar(255) DEFAULT NULL,
  `countryCode` varchar(255) DEFAULT NULL,
  `regionName` varchar(255) DEFAULT NULL,
  `regionCode` varchar(255) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `zipCode` varchar(255) DEFAULT NULL,
  `isoCode` varchar(255) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `metroCode` varchar(255) DEFAULT NULL,
  `areaCode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_money_information`
--
ALTER TABLE `borrow_money_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrow_money_information_borrower_id_foreign` (`borrower_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_parent_trees`
--
ALTER TABLE `category_parent_trees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_parent_trees_category_id_unique` (`category_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_sources`
--
ALTER TABLE `income_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lenders`
--
ALTER TABLE `lenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend_money_information`
--
ALTER TABLE `lend_money_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lend_money_information_lender_id_foreign` (`lender_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_slug_unique` (`slug`);

--
-- Indexes for table `payment_methods_infos`
--
ALTER TABLE `payment_methods_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_infos_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_subcategory_name_unique` (`subcategory_name`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrow_money_information`
--
ALTER TABLE `borrow_money_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `category_parent_trees`
--
ALTER TABLE `category_parent_trees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_sources`
--
ALTER TABLE `income_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lenders`
--
ALTER TABLE `lenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lend_money_information`
--
ALTER TABLE `lend_money_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods_infos`
--
ALTER TABLE `payment_methods_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow_money_information`
--
ALTER TABLE `borrow_money_information`
  ADD CONSTRAINT `borrow_money_information_borrower_id_foreign` FOREIGN KEY (`borrower_id`) REFERENCES `borrowers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_parent_trees`
--
ALTER TABLE `category_parent_trees`
  ADD CONSTRAINT `category_parent_trees_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lend_money_information`
--
ALTER TABLE `lend_money_information`
  ADD CONSTRAINT `lend_money_information_lender_id_foreign` FOREIGN KEY (`lender_id`) REFERENCES `lenders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_methods_infos`
--
ALTER TABLE `payment_methods_infos`
  ADD CONSTRAINT `payment_methods_infos_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
