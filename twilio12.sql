-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2019 at 08:12 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twilio`
--

-- --------------------------------------------------------

--
-- Table structure for table `last_message_to_user`
--

CREATE TABLE `last_message_to_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `last_message` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_message_to_user`
--

INSERT INTO `last_message_to_user` (`id`, `user_id`, `sms_id`, `last_message`, `created_at`, `updated_at`) VALUES
(1, 9, 3, 1, NULL, NULL),
(2, 11, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_23_115218_add_columns_in_user_table', 2),
(4, '2019_07_24_053124_create_sms_verifications_table', 2),
(5, '2019_07_24_104712_add_columns_in_user_table', 3),
(6, '2019_07_24_125858_add_columns_to_users_table', 4),
(7, '2019_07_25_112649_sms', 5),
(8, '2019_07_25_113232_add_colum_to_sms_table', 6),
(9, '2019_07_26_064551_add_column_to_sms_table', 7),
(10, '2019_07_26_131638_add_column_to_sms_table', 8),
(11, '2019_07_26_132301_add_column_to_sms_table', 9),
(12, '2019_08_01_062619_add_column_to_sms_table', 10),
(13, '2019_08_02_102725_create_sms_table', 11),
(14, '2019_08_02_112139_add_column_to_sms_table', 12),
(15, '2019_08_02_124210_create_table_last_message_to_user', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sms_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `title`, `message`, `status`, `created_at`, `updated_at`, `sms_status`) VALUES
(3, 'Third Day', 'Third Day Content', 1, '2019-08-02 05:02:41', '2019-08-02 05:02:41', 0),
(4, 'Fourth Day', 'Fourth Day Content', 1, '2019-08-02 05:02:55', '2019-08-02 05:02:55', 0),
(5, 'Fifth Day', 'Fourth Day Content', 1, '2019-08-02 05:03:09', '2019-08-02 07:33:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_map`
--

CREATE TABLE `sms_map` (
  `id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `day` varchar(12) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_map`
--

INSERT INTO `sms_map` (`id`, `sms_id`, `day`, `message`, `created_at`) VALUES
(15, 3, '1', 'Testing Message 11', '2019-07-26 10:29:07'),
(16, 3, '2', 'Testing Message 21', '2019-07-26 10:29:07'),
(17, 3, '3', 'Testing Message 31', '2019-07-26 10:29:07'),
(18, 3, '4', 'Testing Message 41', '2019-07-26 10:29:07'),
(19, 3, '5', 'Testing Message 51', '2019-07-26 10:29:07'),
(20, 3, '6', 'Testing Message 61', '2019-07-26 10:29:07'),
(21, 3, '7', 'Testing Message 71', '2019-07-26 10:29:07'),
(22, 4, '1', 'Testing Message 2', '2019-07-26 10:36:00'),
(23, 4, '2', 'Testing Message 2', '2019-07-26 10:36:00'),
(24, 4, '3', 'Testing Message 2', '2019-07-26 10:36:00'),
(25, 4, '4', 'Testing Message 2', '2019-07-26 10:36:00'),
(26, 4, '5', 'Testing Message 2', '2019-07-26 10:36:00'),
(27, 4, '6', 'Testing Message 2', '2019-07-26 10:36:01'),
(28, 4, '7', 'Testing Message 2', '2019-07-26 10:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `sms_sents`
--

CREATE TABLE `sms_sents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `message_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1-- sent, 0-- Not sent',
  `message_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_sents`
--

INSERT INTO `sms_sents` (`id`, `user_id`, `sms_id`, `day`, `message_status`, `message_id`, `created_at`) VALUES
(1, 9, 3, 1, 1, NULL, '2019-08-02 14:16:46'),
(2, 11, 3, 1, 1, NULL, '2019-08-02 14:16:47'),
(3, 9, 4, 2, 1, NULL, '2019-08-02 14:16:57'),
(4, 11, 4, 2, 1, NULL, '2019-08-02 14:16:58'),
(5, 9, 5, 3, 1, NULL, '2019-08-02 14:17:08'),
(6, 11, 5, 3, 1, NULL, '2019-08-02 14:17:09'),
(13, 9, 3, 1, 1, NULL, '2019-08-02 14:27:44'),
(14, 11, 3, 1, 1, NULL, '2019-08-02 14:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `sms_verifications`
--

CREATE TABLE `sms_verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_verifications`
--

INSERT INTO `sms_verifications` (`id`, `contact_number`, `code`, `status`, `created_at`, `updated_at`) VALUES
(8, '+919501334388', '9356', 'verified', '2019-07-24 06:04:14', '2019-07-24 06:54:52'),
(10, '+918219122806', '9912', 'verified', '2019-07-24 06:13:23', '2019-07-24 06:13:38'),
(12, 'GDGDG546546+91', '5893', 'pending', '2019-07-24 06:17:28', '2019-07-24 06:17:28'),
(13, '+9144645435345345', '1381', 'pending', '2019-07-24 06:18:04', '2019-07-24 06:18:04'),
(14, '+918837799128', '5921', 'verified', '2019-07-24 06:18:31', '2019-07-24 06:18:44'),
(15, '35434354333dfgfdg+91', '7988', 'pending', '2019-07-24 06:31:04', '2019-07-24 06:31:04'),
(16, '222222222+91', '2522', 'pending', '2019-07-24 06:31:29', '2019-07-24 06:31:29'),
(17, '+91', '8156', 'pending', '2019-07-24 06:32:32', '2019-08-02 04:39:17'),
(18, '5465464+91', '3519', 'pending', '2019-07-24 06:34:49', '2019-07-24 06:37:25'),
(20, 'fdsfs54646456+91', '9110', 'pending', '2019-07-24 06:40:08', '2019-07-24 06:40:08'),
(21, '54645646uuty+91', '7348', 'pending', '2019-07-24 06:40:46', '2019-07-24 06:40:46'),
(22, 'dasdsa423423+91', '6425', 'pending', '2019-07-24 06:47:25', '2019-07-24 06:47:25'),
(23, 'fsfs+9sfsdfsdfsdf1', '5827', 'pending', '2019-07-24 06:51:12', '2019-07-24 06:51:12'),
(24, '+9165466hfhfgh', '6350', 'pending', '2019-07-24 06:56:11', '2019-07-24 06:56:11'),
(25, 'jghjjj97897897891', '3704', 'pending', '2019-07-24 06:56:40', '2019-07-24 06:56:40'),
(26, '+91897999797979797', '7194', 'pending', '2019-08-02 04:26:00', '2019-08-02 04:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1--unblock ,0--Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `contact_number`, `first_name`, `last_name`, `address`, `city`, `country`, `postal_code`, `about_me`, `status`) VALUES
(1, 'karan parihar', 'karan.parihar@kindlebit.com', NULL, '$2y$10$nnyIQQK0vh6caIsXZhHWruQVghAcwlLR6F3BQgW1UFpV1bo1RNdrW', 'ch3qRQvwib71j9tmfjrSubXy2xJjHY2MHHkJYjv3tIdv5gEnYMmC591JOOK3', '2019-07-25 04:53:58', '2019-07-25 04:53:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'karan parihar', 'karan.parihadr@kindlebit.com', NULL, '$2y$10$nnyIQQK0vh6caIsXZhHWruQVghAcwlLR6F3BQgW1UFpV1bo1RNdrW', 'NLCKTgjswQQlwwWy0eLY8JroMgw9rDvNa2ZP92PLiVVrYvOOizMzpxozzjfl', '2019-07-25 04:53:58', '2019-08-02 06:01:01', '+919817516930', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', '123123', 'Demo', 1),
(10, 'Shiv Kumar', 'karan.p1arihddar@kindlebit.com', NULL, '$2y$10$nnyIQQK0vh6caIsXZhHWruQVghAcwlLR6F3BQgW1UFpV1bo1RNdrW', 'NLCKTgjswQQlwwWy0eLY8JroMgw9rDvNa2ZP92PLiVVrYvOOizMzpxozzjfl', '2019-07-25 04:53:58', '2019-08-02 07:14:32', '+919501334388', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', '123123', 'Demo', 0),
(11, 'Shiv Kumar12', 'karan.p1arihddar123@kindlebit.com', NULL, '$2y$10$nnyIQQK0vh6caIsXZhHWruQVghAcwlLR6F3BQgW1UFpV1bo1RNdrW', 'NLCKTgjswQQlwwWy0eLY8JroMgw9rDvNa2ZP92PLiVVrYvOOizMzpxozzjfl', '2019-07-25 04:53:58', '2019-08-02 06:00:19', '+918219122806', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', '123123', 'Demo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `last_message_to_user`
--
ALTER TABLE `last_message_to_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_map`
--
ALTER TABLE `sms_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_sents`
--
ALTER TABLE `sms_sents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_verifications`
--
ALTER TABLE `sms_verifications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `last_message_to_user`
--
ALTER TABLE `last_message_to_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sms_map`
--
ALTER TABLE `sms_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sms_sents`
--
ALTER TABLE `sms_sents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sms_verifications`
--
ALTER TABLE `sms_verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
