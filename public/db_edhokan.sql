-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 04:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edhokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `provider_type` int(11) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `image`, `provider_type`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'anup9449@gmail.com', 'superadmin', NULL, '$2y$10$sNVrShAWdNYBhCeS5eqiNuFFV0Sjwn9PCUzvP6IoF.pZBUASkjdSa', NULL, NULL, NULL, NULL, '2023-05-17 11:27:38', '2023-05-17 11:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `date_of_birth`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramasundar', 'Gur', 'ramasundar@email.com', '077-25814763', '0000-00-00 00:00:00', '123456', '25/12/1994', 'Bangalore', '', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_17_163814_create_admins_table', 2),
(6, '2023_05_17_170520_create_permission_tables', 3),
(7, '2023_05_18_143024_create_customers_table', 4),
(8, '2023_05_18_174710_create_products_table', 5),
(9, '2023_05_19_065517_create_suppliers_table', 6),
(12, '2023_05_19_103050_create_supplier_invoices_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(3, 'admin.create', 'admin', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(4, 'admin.view', 'admin', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(5, 'admin.edit', 'admin', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(6, 'admin.delete', 'admin', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(7, 'dhokanowner.create', 'admin', 'dhokanowner', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(8, 'dhokanowner.view', 'admin', 'dhokanowner', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(9, 'dhokanowner.edit', 'admin', 'dhokanowner', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(10, 'dhokanowner.delete', 'admin', 'dhokanowner', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(11, 'dhokanowner.approved', 'admin', 'dhokanowner', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(12, 'dhokan_manager.create', 'admin', 'dhokan_manager', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(13, 'dhokan_manager.view', 'admin', 'dhokan_manager', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(14, 'dhokan_manager.edit', 'admin', 'dhokan_manager', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(15, 'dhokan_manager.delete', 'admin', 'dhokan_manager', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(16, 'dhokan_manager.approved', 'admin', 'dhokan_manager', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(17, 'salesman.create', 'admin', 'salesman', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(18, 'salesman.view', 'admin', 'salesman', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(19, 'salesman.edit', 'admin', 'salesman', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(20, 'salesman.delete', 'admin', 'salesman', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(21, 'salesman.approved', 'admin', 'salesman', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(22, 'product.create', 'admin', 'product', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(23, 'product.view', 'admin', 'product', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(24, 'product.edit', 'admin', 'product', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(25, 'product.delete', 'admin', 'product', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(26, 'product.approved', 'admin', 'product', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(27, 'role.create', 'admin', 'role', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(28, 'role.view', 'admin', 'role', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(29, 'role.edit', 'admin', 'role', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(30, 'role.delete', 'admin', 'role', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(31, 'role.approved', 'admin', 'role', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(32, 'customer.create', 'admin', 'customer', '2023-05-17 11:23:44', '2023-05-17 11:23:44'),
(33, 'customer.view', 'admin', 'customer', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(34, 'customer.edit', 'admin', 'customer', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(35, 'customer.delete', 'admin', 'customer', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(36, 'customer.approved', 'admin', 'customer', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(37, 'invoice.create', 'admin', 'invoice', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(38, 'invoice.view', 'admin', 'invoice', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(39, 'invoice.edit', 'admin', 'invoice', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(40, 'invoice.delete', 'admin', 'invoice', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(41, 'invoice.approved', 'admin', 'invoice', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(42, 'User.create', 'admin', 'User', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(43, 'User.view', 'admin', 'User', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(44, 'User.edit', 'admin', 'User', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(45, 'User.delete', 'admin', 'User', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(46, 'User.approved', 'admin', 'User', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(47, 'profile.view', 'admin', 'profile', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(48, 'profile.edit', 'admin', 'profile', '2023-05-17 11:23:45', '2023-05-17 11:23:45'),
(49, 'supplier.view', 'admin', 'supplier', NULL, NULL),
(50, 'supplier.edit', 'admin', 'supplier', NULL, NULL),
(51, 'supplier.create', 'admin', 'supplier', NULL, NULL),
(52, 'supplier.delete', 'admin', 'supplier', NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `distributor` varchar(255) DEFAULT NULL,
  `sell_price` varchar(255) NOT NULL DEFAULT '0',
  `buy_price` varchar(255) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL DEFAULT '0',
  `product_size` varchar(255) DEFAULT NULL,
  `product_weight` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `distributor`, `sell_price`, `buy_price`, `quantity`, `product_size`, `product_weight`, `product_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alooz Waves Hot Flavour Potato Chips', 'Potato Chips', 'Bombeye Sweets', '15', '14', '100', 'Normal', NULL, '1684434939.jpeg', '1', '2023-05-18 12:35:39', '2023-05-18 23:32:09'),
(2, 'Alooz Magic Masala Potato Chips - Dokanpat', 'Potato Chips', 'Bombeye Sweets', '15', '14', '2', 'Normal', NULL, '1684435705.jpg', '1', '2023-05-18 12:48:25', '2023-05-19 00:24:23'),
(3, 'Bombay Sweets Potato Crackers Chips', 'Potato Chips', 'Bombeye Sweets', '10', '8', '100', 'Normal', NULL, '1684472953.webp', NULL, '2023-05-18 12:49:33', '2023-05-18 23:09:13'),
(4, 'Potato Chips and Crisps', 'Potato Chips', 'Bombeye Sweets', '15', '14', '4', 'Normal', '10', '1684478416.png', NULL, '2023-05-19 00:40:16', '2023-05-19 00:40:16'),
(5, 'Lux Soap', 'Soap', 'Tuli Enterprise', '65', '62', '10', NULL, NULL, NULL, '1', NULL, NULL),
(6, 'Lifebuoy Soap', 'Soap', 'Rahim Enterprise', '40', '38', '5', NULL, NULL, NULL, '1', NULL, NULL),
(7, 'Detol Soap', 'Soap', 'Tuli Enterprise', '55', '52', '3', NULL, NULL, NULL, '1', NULL, NULL),
(8, 'Merial Soap', 'Soap', 'Uttam Enterprise', '45', '42', '2', NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(2, 'dhokanowner', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(3, 'dhokan_manager', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(4, 'salesman', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43'),
(5, 'user', 'admin', '2023-05-17 11:23:43', '2023-05-17 11:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `regi_no` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `email`, `phone`, `address`, `regi_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asa Enterprise', 'asaenterprise@gmail.com', '01714868142', '549, South Satpai', '45896878', '1', '2023-05-19 01:36:26', '2023-05-19 02:47:36'),
(2, 'Mukti Enterprise', 'muktienterprise@gmail.com', '01714868458', 'Netrakona', '87956586', '1', NULL, '2023-05-19 02:47:24'),
(3, 'Rahim Enterprise', 'rahimenterprise@gmail.com', '01758868458', 'Netrakona', '879879586', '0', NULL, NULL),
(4, 'Tuli Enterprise', 'tulienterprise@gmail.com', '01784868458', 'Netrakona', '52956586', '0', NULL, NULL),
(5, 'uttam Enterprise', 'uttamenterprise@gmail.com', '01734868458', 'Netrakona', '45956586', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_invoices`
--

CREATE TABLE `supplier_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_invoices`
--

INSERT INTO `supplier_invoices` (`id`, `supplier_id`, `product_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '10', NULL, '2023-05-19 04:48:31', '2023-05-19 04:48:31'),
(2, 3, 2, '1', NULL, '2023-05-26 11:57:33', '2023-05-26 11:57:33'),
(3, 3, 4, '2', NULL, '2023-05-26 11:57:33', '2023-05-26 11:57:33'),
(4, 4, 2, '5', NULL, '2023-05-26 11:58:58', '2023-05-26 11:58:58'),
(5, 4, 8, '5', NULL, '2023-05-26 11:58:58', '2023-05-26 11:58:58'),
(6, 4, 3, '5', NULL, '2023-05-26 11:58:58', '2023-05-26 11:58:58'),
(7, 4, 7, '3', NULL, '2023-05-26 11:58:58', '2023-05-26 11:58:58');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `supplier_invoices`
--
ALTER TABLE `supplier_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_invoices_supplier_id_foreign` (`supplier_id`),
  ADD KEY `supplier_invoices_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_invoices`
--
ALTER TABLE `supplier_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_invoices`
--
ALTER TABLE `supplier_invoices`
  ADD CONSTRAINT `supplier_invoices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_invoices_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
