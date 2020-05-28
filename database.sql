-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2020 at 03:50 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `t2`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allows_edit` tinyint(1) NOT NULL DEFAULT '0',
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_builder_json` text COLLATE utf8mb4_unicode_ci,
  `custom_submit_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forms_identifier_unique` (`identifier`),
  KEY `forms_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `name`, `visibility`, `allows_edit`, `identifier`, `form_builder_json`, `custom_submit_url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Covid-19', 'PUBLIC', 0, '1-D27JA19L8D657M6JAG9J', '[{\"type\":\"header\",\"subtype\":\"h1\",\"label\":\"Survey Healthy\",\"className\":\"p-2\"},{\"type\":\"paragraph\",\"subtype\":\"p\",\"label\":\"#Corona Virus&nbsp; or #Covid-19\"},{\"type\":\"text\",\"required\":true,\"label\":\"What is your name?\",\"className\":\"form-control\",\"name\":\"text-1585058282140\",\"subtype\":\"text\"},{\"type\":\"radio-group\",\"required\":true,\"label\":\"What is your gender?\",\"inline\":true,\"name\":\"radio-group-1585059065998\",\"values\":[{\"label\":\"Male\",\"value\":\"male\"},{\"label\":\"Felmale\",\"value\":\"female\"},{\"label\":\"Other\",\"value\":\"other\"}]},{\"type\":\"text\",\"subtype\":\"tel\",\"label\":\"what is your phone number?\",\"className\":\"form-control\",\"name\":\"text-1585058934670\"},{\"type\":\"number\",\"required\":true,\"label\":\"How old are you?\",\"className\":\"form-control\",\"name\":\"number-1585058564720\"},{\"type\":\"text\",\"subtype\":\"color\",\"label\":\"What is your favorite color?\",\"className\":\"form-control\",\"name\":\"text-1585058894261\"}]', NULL, NULL, '2020-03-24 07:17:30', '2020-03-24 07:17:30'),
(2, 1, 'Healthy Check', 'PUBLIC', 0, '1-LA68ELA613KJLFJ13CJ4', '[{\"type\":\"header\",\"subtype\":\"h1\",\"label\":\"Check Healty\"},{\"type\":\"text\",\"label\":\"What is your name?\",\"className\":\"form-control\",\"name\":\"text-1586937338655\",\"subtype\":\"text\"},{\"type\":\"number\",\"label\":\"how old are you?\",\"className\":\"form-control\",\"name\":\"number-1586937358345\"}]', NULL, NULL, '2020-04-15 00:56:48', '2020-04-15 00:56:48'),
(3, 1, 'ជំរឿនសុខភា', 'PUBLIC', 0, '1-4LK9LDE3DHD56EB8H1B4', '[{\"type\":\"header\",\"subtype\":\"h1\",\"label\":\"ជំរឿនសុខភាព\"},{\"type\":\"text\",\"required\":true,\"label\":\"តើអ្នកឈ្មោះអី?\",\"className\":\"form-control\",\"name\":\"text-1586937674933\",\"subtype\":\"text\"},{\"type\":\"number\",\"required\":true,\"label\":\"តើអ្នកអាយុប៉ុន្មាន?\",\"className\":\"form-control\",\"name\":\"number-1586937739365\"},{\"type\":\"checkbox-group\",\"label\":\"តើអ្នកធ្វើការនៅខេត្តក្រុងណា?\",\"name\":\"checkbox-group-1586937776426\",\"values\":[{\"label\":\"តាកែវ\",\"value\":\"តាកែវ\"},{\"label\":\"កំពត\",\"value\":\"កំពត\"},{\"label\":\"ភ្នំពេញ\",\"value\":\"ភ្នំពេញ\"},{\"label\":\"សៀមរាប\",\"value\":\"សៀមរាប\"}]}]', NULL, NULL, '2020-04-15 01:06:54', '2020-04-15 01:06:54'),
(5, 4, 'Check Healty', 'PUBLIC', 0, '4-4KJ2B715BAG5LFD1F8JF', '[{\"type\":\"header\",\"subtype\":\"h1\",\"label\":\"CHECK HEALTY\"},{\"type\":\"text\",\"label\":\"What is your name?\",\"className\":\"form-control\",\"name\":\"text-1587131030573\",\"subtype\":\"text\"},{\"type\":\"number\",\"label\":\"How old are you?\",\"className\":\"form-control\",\"name\":\"number-1587131037887\"},{\"type\":\"radio-group\",\"label\":\"Where do you live ?\",\"name\":\"radio-group-1587131056249\",\"values\":[{\"label\":\"Phnom Penh\",\"value\":\"phnom penh\"},{\"label\":\"Takeo\",\"value\":\"takeo\"},{\"label\":\"Kampot\",\"value\":\"kampot\"}]}]', NULL, NULL, '2020-04-17 06:48:41', '2020-04-17 06:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

DROP TABLE IF EXISTS `form_submissions`;
CREATE TABLE IF NOT EXISTS `form_submissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_submissions_form_id_foreign` (`form_id`),
  KEY `form_submissions_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `form_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '{\"text-1585058282140\":\"Thaisan UN\",\"radio-group-1585059065998\":\"male\",\"text-1585058934670\":\"0967362510\",\"number-1585058564720\":\"22\",\"text-1585058894261\":\"#ffff80\"}', '2020-03-24 07:24:41', '2020-03-24 07:24:41'),
(2, 3, 1, '{\"text-1586937674933\":\"Bela\",\"number-1586937739365\":\"23\",\"checkbox-group-1586937776426\":[\"\\u178f\\u17b6\\u1780\\u17c2\\u179c\"]}', '2020-04-15 01:09:33', '2020-04-15 01:09:33'),
(4, 5, 4, '{\"text-1587131030573\":\"Thara\",\"number-1587131037887\":\"22\",\"radio-group-1587131056249\":\"phnom penh\"}', '2020-04-17 06:50:19', '2020-04-17 06:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_09_30_110932_create_forms_table', 1),
(9, '2018_09_30_142113_create_form_submissions_table', 1),
(10, '2018_10_16_000926_add_custom_submit_url_column_to_the_forms_table', 1),
(11, '2020_02_17_033633_create_permissions_table', 1),
(12, '2020_02_17_033651_create_roles_table', 1),
(13, '2020_02_24_023425_create_surveys_table', 1),
(14, '2020_02_24_023504_create_survey_reports_table', 1),
(15, '2020_02_24_023542_create_questions_table', 1),
(16, '2020_02_24_023609_create_answers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desctiption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('check','free') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'check',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

DROP TABLE IF EXISTS `surveys`;
CREATE TABLE IF NOT EXISTS `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survey_reports`
--

DROP TABLE IF EXISTS `survey_reports`;
CREATE TABLE IF NOT EXISTS `survey_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `survey_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `request_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thaisan', 'UN', 'thaisanun', 'thaisan@gmail.com', '$2y$10$lhk0ZSixcSeRGTJ/oiYXxel3apd52oQW7Am.oCZGQoqckzJasMjH2', 1, '5WsSkmDrPbP0u56EKSQn6RaoiOPcFMTu4xS3iHja3bQ4k8iFD4trEhte6FDv', '2020-03-24 06:51:38', '2020-03-24 06:51:38'),
(2, 'Thara', 'Ha', 'tharaha', 'thara@gmail.com', '$2y$10$37OVOGsLwVBdngCUsoQYa./mQ/wLJxEPjyoWvcLYzxu9.h9QYR.ua', 1, NULL, '2020-04-16 19:51:41', '2020-04-16 19:51:41'),
(3, 'Hata', 'Ou', 'hataou', 'hata@gamail.com', '$2y$10$HfDbRZB16sCC1Prp.9EHJu3Xgr6W/2Af6MRocwWsxn2vmqXak.MnK', 2, NULL, '2020-04-17 06:38:32', '2020-04-17 06:38:32'),
(4, 'Nana', 'Ra', 'nanara', 'nana@gmail.com', '$2y$10$er/9ZiYIrmOqrmsMJHb0Lu9a/Pw0vQ/kK0WGcbbDnzx8Xg05SpB/a', 2, NULL, '2020-04-17 06:42:14', '2020-04-17 06:42:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
