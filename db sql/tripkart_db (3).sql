-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripkart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `experience_no`, `experience_title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DISCOVER THE WORLD WITH OUR GUIDE', '20', 'Years of Experience', 'discover-the-world-with-our-guide', '<p style=\"text-align: justify; margin-bottom: 20px; line-height: 26px; background-color: rgb(250, 250, 250);\"><span style=\"color: rgb(103, 105, 119); font-family: Barlow, sans-serif; text-align: start; background-color: rgb(255, 255, 255);\">You can choose any country with good tourism. Agency elementum sesue the aucan vestibulum aliquam justo in sapien rutrum volutpat. Donec in quis the pellentesque velit. Donec id velit ac arcu posuere blane.</span><br></p>', 'upload/about/1773742755990479.jpg', 1, '2023-05-02 06:55:58', '2023-08-09 03:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `slug`, `image`, `designation`, `description`, `facebook_url`, `linkedin_url`, `twitter_url`, `whatsapp_url`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rakibul Islam', 'rakibul-islam', 'upload/agent/1764772535534365.jpg', 'Office Manager', '<p>Office Manager<br></p>', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.twitter.com/', 'https://www.whatsapp.com/', 1, '2023-05-02 03:04:01', '2023-05-02 03:04:01'),
(3, 'Kabir Hasan', 'kabir-hasan', 'upload/agent/1764772595067397.jpg', 'Creative Director', '<p>Creative Director<br></p>', 'https://www.facebook.com/', 'https://www.linkedin.com/', NULL, 'https://www.whatsapp.com/', 1, '2023-05-02 03:04:58', '2023-05-02 03:04:58'),
(4, 'Siyam Ahmed', 'siyam-ahmed', 'upload/agent/1764772657536731.jpg', 'Support Manager', '<p>Support Manager<br></p>', 'https://www.facebook.com/', NULL, 'https://www.twitter.com/', 'https://www.whatsapp.com/', 1, '2023-05-02 03:05:57', '2023-05-02 03:05:57'),
(5, 'Masud Rana', 'masud-rana', 'upload/agent/1764772713121907.jpg', 'CEO', '<p>CEO<br></p>', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://www.twitter.com/', 'https://www.whatsapp.com/', 1, '2023-05-02 03:06:50', '2023-05-02 03:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `aminities`
--

CREATE TABLE `aminities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aminity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer_text`, `is_correct`, `created_at`, `updated_at`) VALUES
(41, 11, 'পশ্চিম', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(42, 11, 'পূর্ব', 1, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(43, 11, 'দক্ষিণ', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(44, 11, 'উত্তর', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(45, 12, 'ঘোড়া', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(46, 12, 'হরিণ', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(47, 12, 'হরিণ', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(48, 12, 'নীল তিমি', 1, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(49, 13, 'আমাজন', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(50, 13, 'নীলনদ', 1, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(51, 13, 'মিসিসিপি', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(52, 13, 'গঙ্গা', 0, '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(53, 14, '5', 0, '2024-06-04 07:31:31', '2024-06-04 07:31:31'),
(54, 14, '2', 1, '2024-06-04 07:31:31', '2024-06-04 07:31:31'),
(55, 14, '54', 0, '2024-06-04 07:31:31', '2024-06-04 07:31:31'),
(56, 14, '7', 0, '2024-06-04 07:31:31', '2024-06-04 07:31:31'),
(57, 15, 'আফ্রিকা', 0, '2024-06-05 00:07:10', '2024-06-05 00:07:10'),
(58, 15, 'ইউরোপ', 0, '2024-06-05 00:07:10', '2024-06-05 00:07:10'),
(59, 15, 'এশিয়া', 1, '2024-06-05 00:07:10', '2024-06-05 00:07:10'),
(60, 15, 'দক্ষিণ আমেরিকা', 0, '2024-06-05 00:07:10', '2024-06-05 00:07:10'),
(61, 16, '121', 0, '2024-06-05 00:08:58', '2024-06-05 00:08:58'),
(62, 16, '454', 0, '2024-06-05 00:08:58', '2024-06-05 00:08:58'),
(63, 16, '1321', 0, '2024-06-05 00:08:58', '2024-06-05 00:08:58'),
(64, 16, '2', 1, '2024-06-05 00:08:58', '2024-06-05 00:08:58'),
(65, 17, '5', 0, '2024-06-05 03:55:57', '2024-06-05 03:55:57'),
(66, 17, '454', 0, '2024-06-05 03:55:57', '2024-06-05 03:55:57'),
(67, 17, '2', 1, '2024-06-05 03:55:57', '2024-06-05 03:55:57'),
(68, 17, '454', 0, '2024-06-05 03:55:57', '2024-06-05 03:55:57'),
(69, 18, '5', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(70, 18, '2', 1, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(71, 18, '7', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(72, 18, '3', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(73, 19, '700', 1, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(74, 19, '600', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(75, 19, '400', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(76, 19, '500', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(77, 20, '12', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(78, 20, '13', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(79, 20, '20', 0, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(80, 20, '16', 1, '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(81, 21, '3', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(82, 21, '4', 1, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(83, 21, '8', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(84, 21, '5', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(85, 22, '7', 1, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(86, 22, '787', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(87, 22, '45', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(88, 22, '454', 0, '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(89, 23, '3', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(90, 23, '4', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(91, 23, '5', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(92, 23, '2', 1, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(93, 24, '200', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(94, 24, '400', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(95, 24, '700', 1, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(96, 24, '300', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(97, 25, '19', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(98, 25, '12', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(99, 25, '13', 0, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(100, 25, '16', 1, '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(113, 29, '5', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(114, 29, '2', 1, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(115, 29, '121', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(116, 29, '4', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(117, 30, '6', 1, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(118, 30, '7', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(119, 30, '454', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(120, 30, '12', 0, '2024-06-07 01:22:38', '2024-06-07 01:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'upload/banner/1801002303611163.jpg', 1, '2024-06-05 00:40:41', '2024-06-05 00:40:41'),
(2, 18, 'upload/banner/1801002319275268.jpg', 1, '2024-06-05 00:40:55', '2024-06-05 00:40:56'),
(3, 11, 'upload/banner/1801002336121447.jpg', 1, '2024-06-05 00:41:12', '2024-06-05 00:41:12'),
(4, 17, 'upload/banner/1801002352216970.jpg', 1, '2024-06-05 00:41:27', '2024-06-05 00:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_by` tinyint(3) DEFAULT 0,
  `updated_by` tinyint(3) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `admin_id`, `view`, `seo_title`, `seo_description`, `show_homepage`, `title`, `slug`, `description`, `blog_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 9, 1, 52, 'first seo title', 'first seo title', 1, 'One Package Five Countries', 'one-package-five-countries', '<ul><li>Five Countries --&gt; Thailand - Malaysia - Singapore - Vietnam - Cambodia.</li><li>12 Days 11 Nights.</li><li>Multi-city Air Tickets.</li><li>3 Start Hotel Accommodation.&nbsp;</li><li>Visa and Travel Documents.</li><li>All kind of Transportation.</li><li>Complementary Breakfast</li></ul>', 'upload/blog/1774363709458400.jpg', 1, 2, 0, '2023-05-02 04:07:55', '2023-08-17 03:02:53'),
(4, 9, 1, 65, 'Cox\'s Bazar Luxury Tour By Air', 'Cox\'s Bazar Luxury Tour By Air', 1, 'Cox\'s Bazar Luxury Tour By Air', 'coxs-bazar-luxury-tour-by-air', '<ul><li style=\"text-align: left;\">Five Start Hotel.</li><li style=\"text-align: left;\">Dhaka to Cox\'s Bazar to Dhaka by Air.</li><li style=\"text-align: left;\">2 Nights 3 Days.</li><li style=\"text-align: left;\">For Any Information Or Booking hotline 01756-586100, 01756584111</li></ul>', 'upload/blog/1774362424142815.jpg', 1, 2, 0, '2023-05-02 04:09:19', '2023-08-16 04:29:36'),
(6, 10, 1, 58, 'Maldives Girls Group Tour', 'Maldives Girls Group Tour', 1, 'Maldives Girls Group Tour', 'maldives-girls-group-tour', '<ul><li>Multi-City Air Tickets.</li><li>3 Nights 4 Days.</li><li>Three Star Hotel Accommodation.</li><li>All kind of Transportation.</li><li>Complementary Breakfast.</li></ul>', 'upload/blog/1774299792564204.webp', 1, 2, 2, '2023-05-15 03:16:16', '2023-08-16 04:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Single Family', 'single-family', 1, '2023-05-01 23:03:59', '2023-05-01 23:03:59'),
(6, 'Multi Family', 'multi-family', 1, '2023-05-01 23:04:13', '2023-05-01 23:04:13'),
(9, 'Everyone', 'everyone', 1, '2023-08-15 06:47:08', '2023-08-15 06:47:08'),
(10, 'Only Girls', 'only-girls', 1, '2023-08-15 23:46:16', '2023-08-15 23:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no_optional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `contact_no`, `contact_no_optional`, `area_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shahzadpur Branch', '01713236712', '01713236912', 'https://www.google.com/search?q=google+translate&oq=google&gs_lcrp=EgZjaHJvbWUqDggAEEUYJxg7GIAEGIoFMg4IABBFGCcYOxiABBiKBTIYCAEQLhhDGIMBGMcBGLEDGNEDGIAEGIoFMgYIAhBFGDwyBggDEEUYQTIGCAQQRRhBMgYIBRAFGEAyBggGEEUYPDIGCAcQRRg80gEHODc0ajBqN6gCCLACAQ&sourceid=chrome&ie=UTF-8', 1, '2024-05-16 02:51:18', '2024-05-16 02:51:18'),
(2, 'বকশিবাজার', '01713236712', '01713236912', 'https://www.google.com/search?q=google+translate&oq=google&gs_lcrp=EgZjaHJvbWUqDggAEEUYJxg7GIAEGIoFMg4IABBFGCcYOxiABBiKBTIYCAEQLhhDGIMBGMcBGLEDGNEDGIAEGIoFMgYIAhBFGDwyBggDEEUYQTIGCAQQRRhBMgYIBRAFGEAyBggGEEUYPDIGCAcQRRg80gEHODc0ajBqN6gCCLACAQ&sourceid=chrome&ie=UTF-8', 1, '2024-05-24 07:29:54', '2024-05-24 07:29:54'),
(3, 'বনশ্রী', '01713236712', '01713236912', 'https://www.google.com/search?q=google+translate&oq=google&gs_lcrp=EgZjaHJvbWUqDggAEEUYJxg7GIAEGIoFMg4IABBFGCcYOxiABBiKBTIYCAEQLhhDGIMBGMcBGLEDGNEDGIAEGIoFMgYIAhBFGDwyBggDEEUYQTIGCAQQRRhBMgYIBRAFGEAyBggGEEUYPDIGCAcQRRg80gEHODc0ajBqN6gCCLACAQ&sourceid=chrome&ie=UTF-8', 1, '2024-05-24 07:30:32', '2024-05-24 07:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(14, 'upload/brand/1773732770287188.jpg', 0, '2023-08-09 00:43:07', '2023-08-09 00:43:17'),
(15, 'upload/brand/1773825079676660.png', 1, '2023-08-10 01:10:20', '2023-08-10 01:10:20'),
(16, 'upload/brand/1773825086968504.png', 1, '2023-08-10 01:10:27', '2023-08-10 01:10:27'),
(17, 'upload/brand/1773825094201806.png', 1, '2023-08-10 01:10:34', '2023-08-10 01:10:34'),
(18, 'upload/brand/1773825102558664.png', 1, '2023-08-10 01:10:42', '2023-08-10 01:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(7, 'About', 'about', 1, '2023-05-08 23:58:05', '2023-05-08 23:58:05'),
(8, 'Services', 'our-service', 1, '2023-05-08 23:58:36', '2024-05-21 00:21:57'),
(9, 'Projects', 'projects', 0, '2023-05-08 23:59:09', '2023-08-07 03:20:46'),
(11, 'Branch', 'branch', 1, '2023-05-08 23:59:36', '2024-05-21 00:02:45'),
(14, 'Our Materials', 'our-materials', 1, '2024-05-23 03:10:05', '2024-05-23 03:10:05'),
(17, 'Instructor', 'instructor', 1, '2024-05-24 07:21:44', '2024-05-24 07:21:44'),
(18, 'Contact Us', 'contact-us', 1, '2024-05-24 07:31:36', '2024-05-24 07:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_state_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_state_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Rajshahi', 'rajshahi', 1, '2023-05-08 03:51:33', '2023-05-08 03:51:33'),
(2, 2, 'Dhaka', 'dhaka', 1, '2023-05-08 04:26:33', '2023-05-16 06:33:34'),
(6, 6, 'Patuakhali', 'patuakhali', 1, '2023-05-16 06:35:14', '2023-05-16 06:35:14'),
(7, 4, 'Moulovi Bazar', 'moulovi-bazar', 1, '2023-05-16 06:37:51', '2023-05-16 06:37:51'),
(8, 4, 'Sreemongal', 'sreemongal', 1, '2023-05-16 06:38:14', '2023-05-16 06:38:14'),
(9, 3, 'Khagrachori', 'khagrachori', 1, '2023-05-16 06:38:46', '2023-05-16 06:38:46'),
(10, 3, 'Rangamati', 'rangamati', 1, '2023-05-16 06:39:03', '2023-05-16 06:39:03'),
(11, 3, 'Bandarban', 'bandarban', 1, '2023-05-16 06:39:17', '2023-05-16 06:39:17'),
(12, 3, 'Cox\'s Bazar', 'coxs-bazar', 1, '2023-05-16 06:39:38', '2023-05-16 06:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `icon`, `title`, `counter_no`, `status`, `created_at`, `updated_at`) VALUES
(3, 'front flaticon-tag', 'Ticket Booking', '100', 1, '2023-05-08 23:48:48', '2023-08-10 00:40:32'),
(4, 'front flaticon-ship', 'Cruises Booking', '100', 1, '2023-05-08 23:49:31', '2023-08-10 00:40:07'),
(5, 'font flaticon-house', 'Amazing Tour', '250', 1, '2023-05-08 23:51:01', '2023-08-10 00:39:39'),
(6, 'front flaticon-air-freight', 'Flight Booking', '300', 1, '2023-05-08 23:51:34', '2023-08-16 06:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Bangladesh', 'bangladesh', 1, '2023-05-08 02:20:02', '2023-05-08 02:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `country_states`
--

CREATE TABLE `country_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_states`
--

INSERT INTO `country_states` (`id`, `country_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Dhaka', 'dhaka', 1, '2023-05-08 02:20:53', '2023-05-08 02:22:24'),
(3, 3, 'Chittagong', 'chittagong', 1, '2023-05-08 02:21:00', '2023-05-16 06:27:14'),
(4, 3, 'Sylhet', 'sylhet', 1, '2023-05-16 06:28:09', '2023-05-16 06:28:09'),
(5, 3, 'Khulna', 'khulna', 1, '2023-05-16 06:28:23', '2023-05-16 06:28:23'),
(6, 3, 'Barisal', 'barisal', 1, '2023-05-16 06:28:36', '2023-05-16 06:28:36'),
(7, 3, 'Rajshahi', 'rajshahi', 1, '2023-05-16 06:29:41', '2023-05-16 06:29:41'),
(8, 3, 'Rangpur', 'rangpur', 1, '2023-05-16 06:29:56', '2023-05-16 06:29:56'),
(9, 3, 'Mymensingh', 'mymensingh', 1, '2023-05-16 06:30:18', '2023-05-16 06:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `date`, `duration`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A Global MBA For The Next Generation Of Business Leaders', '2024-06-02', '1:00 pm - 1:00 pm', 'upload/event/1800727023113272.jpg', 1, '2024-06-01 23:45:13', '2024-06-01 23:45:13'),
(2, 'A Global MBA For The Next Generation Of Business Leaders', '2024-06-02', '1:00 pm - 1:00 p', 'upload/event/1800727039979873.jpg', 1, '2024-06-01 23:45:28', '2024-06-01 23:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `unit`, `total_mark`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(3, 'বিশ্বের সবচেয়ে বড় মহাদেশ কোনটি?', 'সাধারণ জ্ঞান', '5', '2024-06-04 12:00:00', '2024-06-06 12:07:00', '2024-06-04 06:01:00', '2024-06-04 06:46:28'),
(4, 'Test Examination', 'GST', '2', '2024-06-05 05:45:00', '2024-06-06 17:00:00', '2024-06-04 07:31:14', '2024-06-04 23:45:46'),
(5, 'text examination', 'Gk', '1', '2024-06-05 06:06:00', '2024-06-05 06:08:00', '2024-06-05 00:06:50', '2024-06-05 00:06:50'),
(6, 'test', 'a unit', '1', '2024-06-05 06:08:00', '2024-06-05 07:15:00', '2024-06-05 00:08:44', '2024-06-05 00:09:28'),
(7, 'test', 'b', '1', '2024-06-05 09:55:00', '2024-06-06 09:55:00', '2024-06-05 03:55:29', '2024-06-05 03:55:29'),
(8, 'test', 'C Unit', '3', '2024-06-06 04:25:00', '2024-06-07 04:25:00', '2024-06-05 22:25:46', '2024-06-05 22:25:46'),
(9, 'exam', 'f', '2', '2024-06-06 04:38:00', '2024-06-07 04:38:00', '2024-06-05 22:39:04', '2024-06-05 22:39:04'),
(10, 'Test Examination', 'General Knowledge', '5', '2024-06-07 05:45:00', '2024-06-07 05:50:00', '2024-06-06 23:46:06', '2024-06-06 23:46:06'),
(11, 'test', 't', '5', '2024-06-07 06:05:00', '2024-06-07 06:08:00', '2024-06-07 00:03:06', '2024-06-07 00:03:06'),
(12, 'Test examination', 'H Unit', '5', '2024-06-07 07:25:00', '2024-06-07 07:30:00', '2024-06-07 01:21:55', '2024-06-07 01:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `course_name`, `instructor_name`, `department`, `experience`, `study`, `whatsapp_link`, `facebook_link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'addmission test', 'Aliza', 'English', 'five year', 'masters', 'https://www.facebook.com/', 'https://www.facebook.com/', 'upload/instructor/1799940077451112.jpg', 1, '2024-05-24 07:17:03', '2024-05-24 07:17:28'),
(7, 'addmission test', 'Md Kamrudzaman', 'Bangla', 'six year', 'masters', 'https://www.facebook.com/', 'https://www.facebook.com/', 'upload/instructor/1799940133483129.jpg', 1, '2024-05-24 07:17:56', '2024-05-24 07:17:56'),
(8, 'addmission test', 'Md Kamrud', 'Bangla', 'six year', 'honours', 'https://www.facebook.com/', 'https://www.facebook.com/', 'upload/instructor/1799940172548657.jpg', 1, '2024-05-24 07:18:33', '2024-05-24 07:18:33'),
(9, 'addmission test', 'Maliha', 'Bangla', 'five year', 'masters', 'http://127.0.0.1:8000/instructor/creat', 'https://www.facebook.com/', 'upload/instructor/1799940231255297.jpg', 1, '2024-05-24 07:19:29', '2024-05-24 07:19:29'),
(10, 'addmission test', 'Md Kamrudzaman', 'Bangla', 'six year', 'masters', 'https://www.facebook.com/', 'https://www.facebook.com/', 'upload/instructor/1799940133483129.jpg', 1, '2024-05-24 07:17:56', '2024-05-24 07:17:56'),
(11, 'addmission test', 'Maliha', 'Bangla', 'five year', 'masters', 'http://127.0.0.1:8000/instructor/creat', 'https://www.facebook.com/', 'upload/instructor/1799940231255297.jpg', 1, '2024-05-24 07:19:29', '2024-05-24 07:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `related_topics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `book_title`, `author`, `related_topics`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'My life journey with quran', 'Muhammad Atikullah', 'quranic life', 'upload/material/1799908135205189.png', 1, '2024-05-23 07:07:07', '2024-05-23 22:49:20'),
(2, 'Na bolun', 'Mohiuddin bin jubayer', 'quraner nisedh', 'upload/material/1799908124493940.jpg', 1, '2024-05-23 07:08:31', '2024-05-23 22:49:10'),
(3, 'Poripurno Soroyi Porda', 'Sayekh yousuf alhaz', 'Porda', 'upload/material/1799908090766478.jpg', 1, '2024-05-23 07:10:02', '2024-05-23 22:48:38'),
(4, 'Parenting', 'Faysal Ahmed Nabobi', 'Ovibabok', 'upload/material/1799908079328581.jpg', 1, '2024-05-23 07:10:58', '2024-05-23 22:48:27'),
(5, 'Mumin narir saradin', 'Mesori', 'life style of mumin', 'upload/material/1799908062205182.jpg', 1, '2024-05-23 07:11:50', '2024-05-23 22:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `meritoriouses`
--

CREATE TABLE `meritoriouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achieve_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_of_meritorious` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meritoriouses`
--

INSERT INTO `meritoriouses` (`id`, `image`, `name`, `admission_exam`, `achieve_place`, `comment_of_meritorious`, `status`, `created_at`, `updated_at`) VALUES
(6, 'upload/meritorious/1799114856736767.webp', 'মোঃ আদনান আহমেদ তামিম', ' ২০২৩-২৪', 'BUET ১ম', 'আমার প্রিপারেশন মূলত অনলাইন ওরিয়েন্টেড ছিল। আমি ক্লাসগুলো সব অনলাইনেই করতাম তবে উইকলি, মান্থলি সহ সকল এক্সাম অফলাইনে দিতাম। এরসাথে আমি পরিপূর্ণ প্রস্তুতির জন্য সবগুলো ম্যারাথন ক্লাস করেছিলাম। এছাড়া উদ্ভাসের উইকলি, মডেল টেস্টগুলো দিয়ে আমি সহজেই একুরেসি চেক করে নিতাম। আর যে ভুলগুলো হতো সেগুলো আলাদা নোট করে পরবর্তীতে পরীক্ষার আগে রিভিশন দিতাম যেন ভুল না হয়। আমার মনে হয়, ভর্তি পরীক্ষায় সফল হতে নিজের প্রস্তুতির সকল গ্যাপ পূরণ করা জরুরি আর রেগুলার চর্চার কোনো বিকল্প নেই।', 1, '2024-05-14 05:51:22', '2024-05-15 04:40:31'),
(7, 'upload/meritorious/1799114987389474.png', 'মোঃ আদনান আহমেদ তামিম', '২০২৩-২৪', 'BUET ২য়', 'আমি সবসময় প্রতিটি বিষয়ের সূত্রগুলো বুঝে পড়তাম এবং পড়তে গিয়ে কোনো প্রশ্ন তৈরি হলেই সেটা সলভ করে ফেলতাম। তবে আমি একাদশ শ্রেণি থেকেই উদ্ভাসের কনসেপ্ট বুক, প্র্যাকটিস বুকগুলো সলভ করতাম। আর এডমিশন টাইমে উদ্ভাসে নিয়মিত অফলাইন ক্লাস করতাম এবং গুরুত্বপূর্ণ বিষয়গুলো ম্যারাথন ক্লাসের পিডিএফ নোট দেখে সমাধান করতাম। এছাড়াও উদ্ভাসের পরীক্ষাগুলো আমার প্রস্তুতির মান যাচাই করতে অনেক সাহায্য করেছিল। তাই আমি মনে করি, ভর্তি পরীক্ষায় সফল হতে কলেজ লাইফের শুরু থেকেই প্রতিটি বিষয় বুঝে বুঝে পড়ে নিজের বেসিক ক্লিয়ার করা উচিত।', 1, '2024-05-15 04:42:36', '2024-05-15 04:42:36'),
(8, 'upload/meritorious/1799115041847642.png', 'প্রতীক রসুল', ' ২০২৩-২৪', 'ঢাবি ‘ক’ ১ম', 'আমি এডমিশনের শুরু থেকেই উদ্ভাসে নিয়মিত ক্লাস করতাম। কোনো টপিকে ঘাটতি থাকলে উদ্ভাসের ম্যারাথন ক্লাস দেখে সলভ করে নিতাম। আর ঢাবি ‘ক’ ভর্তি পরীক্ষায় যেহেতু ক্যালকুলেটর ব্যবহার করা যায় না, তাই ঐ সমাধানগুলো হাতে করার প্র্যাকটিস করতাম। এছাড়া উদ্ভাসের প্রশ্নব্যাংক, উইকলি এক্সাম ও মডেল টেস্টগুলোর মাধ্যমে আমি ভর্তি পরীক্ষার প্রশ্ন প্যাটার্ন ও টাইম ম্যানেজমেন্ট বা স্ট্র্যাটেজি সম্পর্কে ধারণা পেয়েছিলাম। আমার মতে, ভর্তি পরীক্ষায় নিজেকে এগিয়ে রাখতে কলেজের শুরু থেকেই প্রস্তুতি নেওয়া এবং বেশি বেশি হ্যান্ড ক্যালকুলেশন প্র্যাকটিস করা প্রয়োজন।', 1, '2024-05-15 04:43:27', '2024-06-01 23:42:58');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_15_141026_create_settings_table', 2),
(7, '2023_02_03_082606_create_pages_table', 3),
(9, '2023_02_04_081511_create_sliders_table', 5),
(10, '2023_04_28_091311_create_categories_table', 5),
(11, '2023_04_29_074624_create_properties_table', 6),
(12, '2023_04_29_075543_create_property_images_table', 6),
(13, '2023_02_04_052522_create_blogs_table', 7),
(14, '2023_04_29_095502_create_property_types_table', 7),
(15, '2023_04_29_100323_create_aminities_table', 7),
(16, '2023_04_29_100418_create_cities_table', 7),
(17, '2023_04_29_101326_create_nearest_locations_table', 7),
(18, '2023_04_29_101436_create_property_purposes_table', 7),
(19, '2023_04_29_102024_create_country_states_table', 7),
(20, '2023_04_29_102135_create_countries_table', 7),
(21, '2023_04_29_102306_create_property_aminities_table', 7),
(22, '2023_04_29_102633_create_property_nearest_locations_table', 7),
(24, '2023_04_30_050705_create_testimonials_table', 7),
(25, '2023_04_29_105442_create_services_table', 8),
(26, '2023_04_30_053006_create_agents_table', 8),
(27, '2023_04_30_073027_create_blog_categories_table', 9),
(28, '2023_05_02_065228_create_abouts_table', 10),
(29, '2023_05_03_072618_create_brands_table', 11),
(30, '2023_05_03_080531_create_counters_table', 12),
(31, '2023_05_10_063154_create_sections_table', 13),
(39, '2023_08_10_080244_create_tours_table', 14),
(40, '2023_08_10_080438_create_videos_table', 14),
(41, '2024_05_13_080121_create_branches_table', 14),
(42, '2024_05_14_040552_create_meritoriouses_table', 14),
(57, '2024_05_15_115449_create_successes_table', 15),
(58, '2024_05_16_042224_create_our_services_table', 15),
(61, '2024_05_17_041157_create_extra_facilities_table', 16),
(80, '2024_05_22_053504_create_instructors_table', 18),
(82, '2024_05_22_053017_add_study_to_instructors_table', 19),
(85, '2024_05_23_075820_create_materials_table', 21),
(94, '2024_05_17_042357_create_service_details_table', 22),
(95, '2024_05_21_113726_create_programs_table', 22),
(96, '2024_05_21_114325_create_program_offers_table', 22),
(97, '2024_05_22_040117_create_instructors_table', 22),
(98, '2024_05_22_133340_create_videos_table', 22),
(99, '2024_05_23_083432_create_materials_table', 22),
(100, '2024_05_23_105320_create_our_services_table', 23),
(105, '2024_05_24_101040_create_events_table', 24),
(106, '2024_05_25_073111_create_banners_table', 24),
(135, '2024_05_30_045658_create_exams_table', 25),
(136, '2024_05_30_045857_create_questions_table', 25),
(137, '2024_05_30_045909_create_answers_table', 25),
(138, '2024_05_30_045920_create_user_answers_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `nearest_locations`
--

CREATE TABLE `nearest_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=>Active, 0=>Inactive	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nearest_locations`
--

INSERT INTO `nearest_locations` (`id`, `location`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Rail Station', 'rail-station', 1, '2023-05-08 01:08:54', '2023-05-08 01:08:54'),
(4, 'Bus Station', 'bus-station', 1, '2023-05-08 01:09:01', '2023-05-08 01:09:01'),
(5, 'Airport', 'airport', 1, '2023-05-08 01:09:06', '2023-05-08 01:09:06'),
(6, 'Beach', 'beach', 1, '2023-05-08 01:09:11', '2023-05-08 01:09:11'),
(7, 'Metro', 'metro', 1, '2023-05-08 01:09:17', '2023-05-08 01:09:17'),
(8, 'Bank', 'bank', 1, '2023-05-08 01:09:23', '2023-05-08 01:09:23'),
(9, 'School', 'school', 1, '2023-05-08 01:09:29', '2023-05-08 01:09:29'),
(10, 'Hospital', 'hospital', 1, '2023-05-08 01:09:35', '2023-05-08 01:09:35'),
(11, 'Super Market', 'super-market', 1, '2023-05-08 01:09:41', '2023-05-08 01:09:41'),
(13, 'Kolatoli Beach', 'kolatoli-beach', 1, '2023-05-23 05:55:22', '2023-05-23 05:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `one_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `three_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `unit`, `image`, `one_facility`, `two_facility`, `three_facility`, `status`, `created_at`, `updated_at`) VALUES
(43, 1, 'upload/OurService/1799844390854915.png', 'Week Test 10', 'Model Test 5', 'Experienced and medhabi teacher class niba', 0, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(44, 2, 'upload/OurService/1799844464912506.png', 'Week Test 10', 'Model Test 5', 'Experienced and medhabi teacher class niba', 0, '2024-05-23 05:57:20', '2024-05-23 05:57:20'),
(45, 3, 'upload/OurService/1799844594226793.jpg', 'Week Test 10', 'Model Test 5', 'Experienced and medhabi teacher class niba', 0, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(46, 4, 'upload/OurService/1799844658936049.jpg', 'Week Test 10', 'Model Test 5', 'Experienced and medhabi teacher class niba', 0, '2024-05-23 06:00:24', '2024-05-23 06:00:24'),
(47, 5, 'upload/OurService/1799844707329399.png', 'Week Test 10', 'Model Test 5', 'Experienced and medhabi teacher class niba', 0, '2024-05-23 06:01:11', '2024-05-23 06:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`, `position`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'About us page', '<p><span style=\"color: rgb(52, 52, 52); font-family: Nunito, sans-serif; background-color: rgb(250, 250, 250);\">About Us Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis.</span><br></p>', '3', 'about-us', 1, '2023-05-08 23:34:39', '2023-05-08 23:34:39'),
(2, 'Contact Us', 'contact us page', '<p><span style=\"font-size: 1rem;\">Contact Us&nbsp;</span><span style=\"color: rgb(52, 52, 52); font-family: Nunito, sans-serif; background-color: rgb(250, 250, 250);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis.</span><br></p>', '3', 'contact-us', 1, '2023-05-08 23:34:52', '2023-05-08 23:34:52'),
(4, 'Services', 'Services page', '<p><span style=\"color: rgb(52, 52, 52); font-family: Nunito, sans-serif; background-color: rgb(250, 250, 250);\">Services Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis.</span><br></p>', '3', 'services', 1, '2023-05-08 23:35:32', '2023-05-08 23:35:32'),
(5, 'Career', 'Career', '<p>Career<br></p>', '3', 'career', 1, '2023-05-29 00:16:25', '2023-05-29 00:16:25'),
(6, 'Job Application', 'Job Application', '<p>Any Job Application Upload Resume</p>', '1', 'job-application', 1, '2023-07-11 07:29:20', '2023-07-11 07:29:20'),
(7, 'terms-conditions', 'Terms and Conditions', '<p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\">This website is owned and operated by jointly Udvash Academic &amp; Admission Care and Unmesh Medical &amp; Dental Admission Care. Udvash &amp; Unmesh are referred to be “Udvash Academic &amp; Admission Care” and “Unmesh Medical &amp; Dental Admission Care” in this article. Kindly read the given terms and conditions carefully as your use of the service are subject to your acceptance of and compliance with the following terms and conditions (“Terms”) as the Terms constitute a binding contract and or agreement between you and Udvash &amp; Unmesh. By accessing this Website, subscribing to or using any of its services you agree that you have read, understood and are bound by the Terms, irrespective of how you subscribe to or use the services. If you do not want to be bound by the Terms, you must not subscribe to or use our services. If you want to ask anything about the Terms or have any comments or suggestions or complaints on or about our Website, kindly email us at&nbsp;info@udvash.com&nbsp;or call us on 09666-775566<br>The terms &amp; conditions set out in this Website may be altered/amended from time to time depending on the policies of Udvash &amp; Unmesh and the prevailing market conditions. You are recommended to read and understand the terms as often as possible as it may not be possible for us to inform you on every change that occurs in the terms &amp; conditions.<br>The Terms are effective upon acceptance and govern the relationship between you and us including the provision of any of the Services on our Website. In the event the Terms conflict with any other document/policy / content on our Website, the Terms will prevail over them, for the purposes of usage of the Website. If you do not agree to be bound by the Terms and the Privacy Policy, you may not use our Website in any way and should exit.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Eligibility for Use:</span><br>Use of the Website is available only to persons who can form legally binding contracts If you are a minor i.e. under the age of 18 years, you shall not register as a User of the Website and shall not transact on or use the Website without having permission from your guardian. The site reserves the right to terminate your subscription and/or refuse to provide you the access to the Website if it is found that you are if you are not paid and not eligible.<br>You are prohibited from selling, trading, or otherwise transferring your account to any other party. The site owns no responsibility in any manner over any dispute arising out of transactions by any third party using your account/e-mail provided by you to the site or payments made by any of the payment methods by any third party. We make no representation that any products or services referred to in the materials on this website are appropriate for use, or available outside Bangladesh. Those who choose to access this Website from outside Bangladesh are responsible for compliance with local laws if and to the extent local laws are applicable.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Content Accuracy:</span><br>This site takes utmost care in the preparation of the content of this Website. It disclaims all warranties, express or implied, as to the accuracy of the information contained in any of the materials on this Website except to the extent permitted by applicable law. This site shall not be liable to any person for any loss or damage which may arise from the use of any of the information contained in any of the materials on this Website.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Electronic Communications:</span><br>When you visit Udvash &amp; Unmesh website or send email(s) to us, you are communicating with us electronically. You consent to receive communications from this site. We will communicate with you by email or SMS. You agree that all disclosures, agreements, notices, and other communications that Udvash provides to you electronically satisfy all legal requirements.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">SMS Communication:</span><br>On registering with Udvash &amp; Unmesh, you agree that this site may use your registered mobile number on the Website to send SMS to you.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Account and Registration Obligations:</span><br>In consideration of your use of this Website, you represent that you are of legal age to enter into a binding contract and are not a person barred from receiving services under the laws as applicable in Bangladesh. You also agree to provide accurate, true, current and complete information about yourself as prompted by this Website’s registration form or any information provided by you by other means of communication. If you provide any information that is false, inaccurate, not current or incomplete (or becomes untrue, inaccurate, not current or incomplete), or Udvash &amp; Unmesh has reasonable grounds to suspect that such information is false, inaccurate, not current or incomplete, Udvash &amp; Unmesh has the right to suspend or terminate your account and refuse any and all current or future use of this Website or any part thereof.<br>“Your Information” is defined as any information you provide to during the registration, buying or listing process, in the feedback area or through any email. Udvash &amp; Unmesh will protect Your Information in accordance with its Privacy Policy. If you use the Site, you are responsible for maintaining the confidentiality of Your Login ID/ Password/Registration number/Roll and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under Your Login ID or Password. Udvash &amp; Unmesh shall not be liable to any person for any loss or damage which may arise as a result of any failure by you to protect your password or account. You undertake to indemnify and keep indemnified to Udvash &amp; Unmesh for any loss, claim and damage, costs including legal and professional costs relating to your responsibility or liability or failure including those aforesaid. You agree to notify Udvash &amp; Unmesh immediately of any unauthorized use of your account or any other breach of security. Udvash &amp; Unmesh reserves the right to refuse service, terminate accounts or remove or edit content in its sole discretion.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Mobile Financial Service (MFS), Internet Banking and Debit/Credit Card Transaction:</span><br>You agree, understand and confirm that the MFS details provided by you for availing the services on this site is correct. You further agree and undertake to provide the correct and valid debit/credit card details while making payment on this website. We do not store any information related to your Debit/Credit card or Internet banking. In case we do not receive an authorization from the respective bank or the transaction gets interrupted due to any reason, the transaction will be treated as failed and no order will be processed for that transaction. In this case, if any amount has been deducted from your account, the same will be credited back. We shall not be liable in any event, for any card fraud that occurs to you. The liability for use of a card fraudulently will be on you and the onus to ‘prove otherwise’ shall be exclusively on you.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Fraudulent /Declined Transactions:</span><br>The site’s payment partners (being the Payment Gateways and facilitators and Banks) and its fraud detection team constantly monitor your account in order to avoid fraudulent accounts and transactions. We reserve the right to initiate legal proceedings against any such persons for fraudulent use of this Website and any other unlawful acts or omissions in breach of these terms and conditions. In the event of detection of any fraudulent or declined transaction, prior to initiation of legal actions, Udvash &amp; Unmesh reserves the right to immediately delete such user account(s) and or dishonour all past and pending orders without any liability. For the purpose of this clause, Udvash shall owe no liability for any refunds.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Cancellations and Refunds Policy:</span><br>User once admitted for a specific program/service, paid amount will be reflected on user account. User can avail the opportunity to migrate from admitted program/service to another program/service based on availability and his funds will be adjusted but not refunded. Due to technical error, while making payment, user paid more than agreed amount, then user has to claim the refund of paid extra amount within 3 days and then refund will be done within 7-10 working days. For payments made using Mobile Financial Service, Debit/Credit Card, Internet Banking you will receive a refund in your respective. If you don’t receive refund within this time, please write to us at&nbsp;info@udvash.com&nbsp;and we shall investigate.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\">Abuse or Misuse of the Website: The user hereby agrees that the user shall neither by itself nor be part of any kind of abuse or misuse of the Website in any manner whatsoever. By availing to the live online class sessions available on the Website, the user agrees that, apart from not sharing any kind of personal information of any kind with any other party, the user shall also ensure that he/she shall not inter-alia share, display, convey, transmit or portray abusive content of any kind in any manner whatsoever. Similarly, in case the user feels that there is any kind of abusive content or such other information shared or displayed by any other party, the user shall immediately report the case at&nbsp;info@udvash.com.<br>Likewise, the user hereby also agrees that he/she shall not inter-alia share, display or transmit any copyrighted material which he/she is not permitted to do so in the course of the facilities availed from the Website. The user shall be entitled to share only such materials which have an open source code and that they have specifically permitted the user to share. In case, the user shares any of the copyrighted materials to any other party without the prior written consent, the user shall be liable for such actions taken against it by Udvash &amp; Unmesh and any aggrieved third party for violations of the intellectual property rights of such parties.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\">You agree and confirm that you shall not use the Website for any of the following purposes:<br>Disseminating any unlawful, harassing, libelous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.<br>Transmitting material that encourages conduct that constitutes a criminal offence, results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.<br>Using, displaying, mirroring or framing the Site, or any individual element within the Site or services, its trademark, logo or other proprietary information, or the layout and design of any page or form contained on a page, without Udvash &amp; Unmesh express written consent.<br>Gaining unauthorized access to other computer systems.<br>Interfering with any other person’s use or enjoyment of the Site.<br>Interfering or disrupting networks or web sites connected to the Site.<br>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the copyright owner.<br>Collecting or storing any personally identifiable information from the Site or services from other users of the Site or services without their express permission.<br>Impersonating or misrepresenting your affiliation with any person or entity.<br>Breaching or violating any applicable laws, rules or regulations.<br>Encouraging or enabling any other individual to do any of the foregoing.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\">You also Agree and Confirm<br>That you shall use the services provided by us, for lawful purposes only and shall comply with all applicable laws and regulations while using the Website and transacting on the Website.<br>You shall provide authentic, accurate and true information in all instances where such information is required from you. We reserve the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found to be false (wholly or partly), Udvash &amp; Unmesh has the right as well as the sole discretion to reject your registration and debar you from using the service.<br>That neither you nor the tutor shall share their respective personal details including any kind of contact information with each other. In the event the user becomes aware of any such information, the user shall intimate Udvash &amp; Unmesh about the same as soon as possible.<br>That you shall access the services available on this Website and transact at your sole risk and shall use your best and prudent judgment before entering into any transaction through this Website.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Reviews, Feedback &amp; Submissions:</span><br>All reviews, comments, feedback, postcards, suggestions, ideas, and other submissions disclosed, submitted or offered on or by this Website, submitted or offered in connection with your use of its Website (collectively, the “Comments”) shall be and remain Udvash &amp; Unmesh’s property. Such disclosure, submission or offer of any Comments shall constitute an assignment to Udvash &amp; Unmesh of all worldwide rights, titles and interests in all copyrights and other intellectual properties in the Comments. Thus, Udvash &amp; Unmesh owns exclusively all such rights, titles and interests and shall not be limited in any way in its use, commercial or otherwise, of any Comments. The site will be entitled to use, reproduce, disclose, modify, adapt, create derivative works from, publish, display and distribute any Comments you submit for any purpose whatsoever, without restriction and without compensating you in any way. Udvash &amp; Unmesh is and shall be under no obligation (1) to maintain any Comments in confidence; (2) to pay you any compensation for any Comments or use of comments; or (3) to respond to any Comments. You agree that any Comments submitted by you to the Website shall not violate this policy or any right of any third party, including copyright, trademark, privacy or other personal or proprietary right(s), and shall not cause injury to any person or entity. You further agree that no Comments submitted by you to Udvash &amp; Unmesh Website will be or contain libelous or otherwise unlawful, threatening, abusive or obscene material, or contain software viruses, bugs, political campaigning, commercial solicitation, chain letters, mass mailings or any form of “spam”.<br>Udvash &amp; Unmesh reserves the right, but not the obligation, to monitor and edit or remove any Comments submitted to its Website. You grant Udvash &amp; Unmesh the right to use the name that you submit in connection with any Comments. You undertake not to use a false email address, impersonate any person or entity, or otherwise mislead as to the origin of any Comments you submit. You are and shall remain solely responsible for the content of any Comments that you make and you agree to indemnify Udvash &amp; Unmesh and its affiliates for all claims resulting from any Comments you submit. Udvash &amp; Unmesh and its affiliates take no responsibility and assume no liability for any Comments submitted by you or any third party.</p><p style=\"font-family: BalooDa2; color: rgb(0, 0, 0);\"><span style=\"font-weight: bolder;\">Modification in Terms &amp; Conditions of Service:</span><br>These Terms shall be construed in accord with the applicable laws of Bangladesh. The Courts at Dhaka shall have exclusive jurisdiction in any proceedings arising out of these Terms.<br>In case of any dispute or difference either in interpretation or otherwise, of any terms of these Terms of Use, the same shall be referred to an independent arbitrator who will be appointed by Udvash &amp; Unmesh and such arbitrator’s decision shall be final and binding on you. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 2001 as amended time to time. The arbitration shall be conducted in English language and shall be held in Dhaka.<br>Udvash &amp; Unmesh may at any time modify the Terms of its Website without any prior notification to the user. Should you wish to terminate your account due to a modification to the Terms or the Privacy Policy, you may do so by contacting us. However, if you continue to use the service you shall be deemed to have agreed to accept and abide by the modified Terms of this Website.</p>', '3', 'terms-conditions', 1, '2024-05-20 00:24:26', '2024-05-20 00:24:26');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_offers`
--

CREATE TABLE `program_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `property_type_id` int(11) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `listing_package_id` int(11) NOT NULL DEFAULT 0,
  `property_purpose_id` int(11) NOT NULL DEFAULT 0,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_unit` int(11) DEFAULT NULL,
  `urgent_property` int(11) DEFAULT NULL,
  `top_property` int(11) DEFAULT NULL,
  `number_of_room` int(11) DEFAULT NULL,
  `number_of_bedroom` int(11) DEFAULT NULL,
  `number_of_bathroom` int(11) DEFAULT NULL,
  `number_of_floor` int(11) DEFAULT NULL,
  `number_of_kitchen` int(11) DEFAULT NULL,
  `number_of_parking` int(11) DEFAULT NULL,
  `area` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `period` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>Featured, 0=>Not Featured',
  `is_running` tinyint(4) DEFAULT 0 COMMENT '1=>Running Project, 0=>>Not Running Project',
  `is_next` tinyint(4) DEFAULT 0 COMMENT '1=>Next Project, 0=>>Not Next Project',
  `is_future` tinyint(4) DEFAULT 0 COMMENT '1=>Future Project, 0=>>Not Future Project',
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_type`, `admin_id`, `user_id`, `property_type_id`, `city_id`, `listing_package_id`, `property_purpose_id`, `title`, `slug`, `views`, `address`, `phone`, `email`, `website`, `short_description`, `description`, `file`, `thumbnail_image`, `banner_image`, `number_of_unit`, `urgent_property`, `top_property`, `number_of_room`, `number_of_bedroom`, `number_of_bathroom`, `number_of_floor`, `number_of_kitchen`, `number_of_parking`, `area`, `price`, `period`, `video_link`, `is_featured`, `is_running`, `is_next`, `is_future`, `verified`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 0, 8, 12, 0, 5, 'SSB Hotel & Resort (Cox\'s Bazar)', 'ssb-hotel-resort-cox\'s-bazar', 63, 'Dhaka', '+8801618331151', 'sa01818@gmail.com', 'https://www.ssbanglagroup.com/', NULL, '<p><span style=\"font-size: 1rem;\">এসএসবি হোটেলের সম্মানিত মালিকগণ প্রত্যেকে সমাজের উচ্চ মর্যাদা সম্পন্ন বিধায় তাদের রেফারেন্সই যথেষ্ঠ হবে হোটেলটিকে সারা বছর বুকিং রাখার জন্য। তাছাড়া থাকছে আন্তর্জাতিক চেইন মার্কেটিং ও লোকাল প্রমোশনাল এক্টিভিটি ।</span></p><p>কক্সবাজারের কোন হোটেলেই একই সাথে সমুদ্র ও পাহাড়ের ভিউ পাওয়া যায় না, যার ফলে যেকোন পর্যটক একবার এই হোটেলে অবস্থান করলে পাহাড় ও সমুদ্রের মিলনবন্ধনে প্রাকৃতিক সৌন্দর্য মুগ্ধ এবং বারংবার এই হোটেলে থাকার জন্য আকৃষ্ট হবে। কারণ মানুষ সবসময় ভাল কিছুতে অভ্যস্ত হলে তার মধ্যেই অবস্থান করতে চায়।</p>', NULL, 'upload/custom-images/property-thumb-2023-06-08-12-35-29-8786.jpg', NULL, 3000, 1, 1, 300, 0, 350, 14, 3, 50, 100000, 400000, NULL, '', 1, NULL, NULL, 1, 0, 1, 'first seo title', 'seo title', '2023-05-07 03:56:46', '2023-07-19 12:51:13'),
(10, 1, 1, 0, 8, 12, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 128, 'Dhaka', '+8801701203652', 'admin@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-09-27-7352.jpg', NULL, 203, 1, 1, 124, 782, 100, 577, 102, 157, 456, 0, NULL, '', 1, NULL, 1, 1, 0, 1, 'first seo title', 'asfdsaf', '2023-05-07 04:09:27', '2023-08-06 03:51:32'),
(11, 1, 1, 0, 8, 12, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 13, 'Dhaka', '0', 'rahat@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-10-44-2719.jpg', NULL, 3, 1, 1, 2, 10, 12, 45, 18, 20, 4800, 0, NULL, '', 1, NULL, 1, 1, 0, 1, 'first seo title', 'fasfdsa', '2023-05-07 04:10:44', '2023-07-10 00:06:07'),
(12, 1, 1, 0, 8, 12, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 5, 'Dhaka', '0174115255', 'admin@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-12-19-1590.jpg', NULL, 50, 1, 1, 10, 12, 15, 19, 20, 23, 4300, 0, NULL, '', 1, NULL, NULL, 1, 0, 1, 'first seo title', 'asfdas', '2023-05-07 04:12:19', '2023-06-24 02:45:32'),
(13, 1, 1, 0, 8, 2, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 8, 'Dhaka', '0174115255', 'user@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-14-33-8708.jpg', NULL, 10, 1, 1, 20, 30, 40, 50, 60, 70, 1200, 0, NULL, '', 1, NULL, NULL, 1, 0, 1, 'saf', 'asfdsaf', '2023-05-07 04:14:33', '2023-06-21 04:19:01'),
(14, 1, 1, 0, 8, 12, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 4, 'Dhaka', '0174115255', 'user@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-06-13-05-39-48-5177.jpg', NULL, 250, 1, 1, 230, 270, 120, 1203, 121, 125, 1600, 0, NULL, '', 1, NULL, NULL, NULL, 0, 1, 'first seo titleasf', 'asdfsafdafsdf', '2023-05-07 04:15:55', '2023-07-09 23:30:12'),
(15, 1, 1, 0, 8, 2, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 9, 'Dhaka', '+8801701203652', 'pbdfreelancing@gmail.com', NULL, NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-17-07-6696.jpg', NULL, 123, 1, 1, 128, 120, 10, 20, 11, 15, 120, 0, NULL, '', 1, NULL, 1, NULL, 0, 1, 'asfa', 'dfasfdad', '2023-05-07 04:17:07', '2023-06-21 04:18:21'),
(17, 1, 1, 0, 8, 1, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 0, 'Dhaka', '0174115255', 'user@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-07-10-19-37-3176.jpg', NULL, 10, 1, 1, 150, 200, 300, 400, 500, 600, 3600, 0, NULL, '', 1, NULL, NULL, 1, 0, 1, 'fdasfd', 'asfdasfdsafd', '2023-05-07 04:19:37', '2023-06-21 04:18:05'),
(18, 1, 1, 0, 8, 1, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 24, 'Dhaka', '+8801701203652', 'admin@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-08-10-59-32-6178.jpg', NULL, 50, 1, 1, 100, 200, 300, 400, 500, 600, 400, 0, NULL, 'https://www.youtube.com/watch?v=Get7rqXYrbQ', 0, NULL, NULL, 1, 0, 1, 'first seo title', 'safdsaf', '2023-05-08 04:59:33', '2023-06-21 04:17:45'),
(19, 1, 1, 0, 10, 1, 0, 5, 'SS Bangla Hotel & Resort', 'ss-bangla-hotel-resort-', 72, 'Dhaka', '+8801701203652', 'user@gmail.com', 'https://supremesafecost.com/', NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-05-08-11-05-58-4814.jpg', NULL, 10, 1, 1, 20, 30, 40, 50, 60, 70, 4200, 0, NULL, 'https://www.youtube.com/watch?v=Get7rqXYrbQ', 1, NULL, NULL, 1, 1, 1, 'first seo title', 'asdsafasf', '2023-05-08 05:05:58', '2023-08-01 01:27:53'),
(26, 1, 1, 0, 9, 12, 0, 5, 'SS Bangla Hotel And Resort', 'ss-bangla-hotel-and-resort', 24, 'Libero explicabo Po', '01618331151', 'sa01818@gmail.com', 'https://www.ssbanglagroup.com/', NULL, '<p>Our Running Project. we are try our level best for best service.</p>', NULL, 'upload/custom-images/property-thumb-2023-06-13-05-35-47-5010.JPG', NULL, 57, 1, 0, 57, 27, 10, 95, 38, 37, 22, 400000, NULL, 'https://www.youtube.com/watch?v=eJHmGcGH9MA', 1, 1, NULL, NULL, 0, 1, 'Autem nulla voluptat', 'Ipsa nobis consequa', '2023-05-29 13:45:30', '2023-06-21 04:16:57'),
(27, 1, 1, 0, 8, 1, 0, 5, 'SS Bangla Hotel And Resorts', 'ss-bangla-hotel-and-resorts', 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-07-09-12-45-14-7908.jpg', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 1, NULL, NULL, 0, 1, 'SS Bangla Hotel And Resorts', 'SS Bangla Hotel And Resorts', '2023-07-09 06:45:14', '2023-08-05 19:59:33'),
(28, 1, 1, 0, 8, 2, 0, 5, 'SS Bangla Hotel And Resorts', 'ss-bangla-hotel-and-resorts', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/custom-images/property-thumb-2023-07-09-12-53-35-6840.jpg', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 1, NULL, NULL, 0, 1, 'SS Bangla Hotel And Resorts', 'SS Bangla Hotel And Resorts', '2023-07-09 06:48:54', '2023-07-09 06:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `property_aminities`
--

CREATE TABLE `property_aminities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `aminity_id` int(11) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(42, 18, 'upload/custom-images/property-slide-2023-05-08-10-59-33-6835.jpg', '2023-05-08 04:59:33', '2023-05-08 04:59:33'),
(43, 18, 'upload/custom-images/property-slide-2023-05-08-10-59-33-4629.jpg', '2023-05-08 04:59:33', '2023-05-08 04:59:33'),
(44, 18, 'upload/custom-images/property-slide-2023-05-08-10-59-33-6334.jpg', '2023-05-08 04:59:33', '2023-05-08 04:59:33'),
(45, 19, 'upload/custom-images/property-slide-2023-05-08-11-05-58-2569.jpg', '2023-05-08 05:05:58', '2023-05-08 05:05:58'),
(46, 19, 'upload/custom-images/property-slide-2023-05-08-11-05-58-2169.jpg', '2023-05-08 05:05:58', '2023-05-08 05:05:58'),
(47, 19, 'upload/custom-images/property-slide-2023-05-08-11-05-58-9079.jpg', '2023-05-08 05:05:58', '2023-05-08 05:05:58'),
(48, 19, 'upload/custom-images/property-slide-2023-05-08-11-05-58-2598.jpg', '2023-05-08 05:05:58', '2023-05-08 05:05:58'),
(57, 27, 'upload/custom-images/property-slide-2023-07-09-12-45-14-4802.jpg', '2023-07-09 06:45:14', '2023-07-09 06:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `property_nearest_locations`
--

CREATE TABLE `property_nearest_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `nearest_location_id` int(11) DEFAULT NULL,
  `nearest_place_id` int(11) DEFAULT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_nearest_locations`
--

INSERT INTO `property_nearest_locations` (`id`, `property_id`, `nearest_location_id`, `nearest_place_id`, `distance`, `status`, `created_at`, `updated_at`) VALUES
(10, 10, 1, NULL, '100', 1, '2023-05-07 04:09:27', '2023-05-07 04:09:27'),
(11, 11, 2, NULL, '100', 1, '2023-05-07 04:10:44', '2023-05-07 04:10:44'),
(12, 12, 2, NULL, '100', 1, '2023-05-07 04:12:19', '2023-05-07 04:12:19'),
(20, 17, 2, NULL, '100', 1, '2023-05-07 04:19:37', '2023-05-07 04:19:37'),
(146, 9, 5, NULL, '2', 1, '2023-06-12 23:54:06', '2023-06-12 23:54:06'),
(147, 9, 6, NULL, '.2', 1, '2023-06-12 23:54:06', '2023-06-12 23:54:06'),
(155, 18, 5, NULL, '100', 1, '2023-06-21 04:17:45', '2023-06-21 04:17:45'),
(156, 15, 13, NULL, '1', 1, '2023-06-21 04:18:22', '2023-06-21 04:18:22'),
(157, 15, 5, NULL, '2', 1, '2023-06-21 04:18:22', '2023-06-21 04:18:22'),
(159, 13, 4, NULL, '100', 1, '2023-06-21 04:19:01', '2023-06-21 04:19:01'),
(160, 26, 5, NULL, '5', 1, '2023-07-08 08:20:44', '2023-07-08 08:20:44'),
(161, 14, 7, NULL, '100', 1, '2023-07-09 23:30:12', '2023-07-09 23:30:12'),
(162, 19, 3, NULL, '100', 1, '2023-07-09 23:30:57', '2023-07-09 23:30:57'),
(163, 19, 10, NULL, '100', 1, '2023-07-09 23:30:57', '2023-07-09 23:30:57'),
(164, 19, 8, NULL, '100', 1, '2023-07-09 23:30:57', '2023-07-09 23:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `property_purposes`
--

CREATE TABLE `property_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_purposes`
--

INSERT INTO `property_purposes` (`id`, `purpose`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 'For Sale', 'for-sale', 1, '2023-06-08 07:55:53', '2023-06-08 07:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:07:35', '2023-05-13 08:08:17'),
(9, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:07:43', '2023-05-23 06:26:35'),
(10, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:07:50', '2023-05-23 06:26:45'),
(11, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:07:59', '2023-05-23 06:26:54'),
(12, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:08:07', '2023-05-23 06:27:05'),
(13, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:08:13', '2023-05-23 06:27:16'),
(14, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:08:24', '2023-05-23 06:27:26'),
(15, 'Hotel & Resort', 'hotel--resort', 1, '2023-05-08 01:08:31', '2023-05-23 06:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question_text`, `created_at`, `updated_at`) VALUES
(11, 3, 'সূর্য আমাদের কোন দিক থেকে উদিত হয়?', '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(12, 3, 'বিশ্বের সবচেয়ে বড় প্রাণী কোনটি?', '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(13, 3, 'পৃথিবীর সবচেয়ে লম্বা নদী কোনটি?', '2024-06-04 06:12:03', '2024-06-04 06:12:03'),
(14, 4, '1+1 ?', '2024-06-04 07:31:31', '2024-06-04 07:31:31'),
(15, 5, 'বিশ্বের সবচেয়ে বড় মহাদেশ কোনটি?', '2024-06-05 00:07:10', '2024-06-05 00:07:10'),
(16, 6, '1+1 ?', '2024-06-05 00:08:58', '2024-06-05 00:08:58'),
(17, 7, '1+1 ?', '2024-06-05 03:55:57', '2024-06-05 03:55:57'),
(18, 8, '1+1 ?', '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(19, 8, '100+600?', '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(20, 8, '9+7', '2024-06-05 22:26:37', '2024-06-05 22:26:37'),
(21, 9, '3+1', '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(22, 9, '5+2', '2024-06-05 22:40:00', '2024-06-05 22:40:00'),
(23, 10, '1+1 ?', '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(24, 10, '100+600?', '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(25, 10, '9+7', '2024-06-06 23:48:07', '2024-06-06 23:48:07'),
(29, 12, '1+1 ?', '2024-06-07 01:22:38', '2024-06-07 01:22:38'),
(30, 12, '1+5?', '2024-06-07 01:22:38', '2024-06-07 01:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'CHOOSE YOUR PLACE', 'POPULAR TOURS', 'popular-tours', 1, '2023-08-12 02:42:55', '2023-08-12 02:42:55'),
(10, 'TOP DESTINATION', 'POPULAR DESTINATION', 'popular-destination', 1, '2023-08-12 02:43:24', '2023-08-12 02:43:24'),
(11, 'MOST POPULAR', 'TOUR COUNTRIES', 'tour-countries', 1, '2023-08-12 02:44:39', '2023-08-12 02:46:13'),
(12, 'TOUR  BLOG', 'TOUR  EXPERIENCE', 'tour--experience', 1, '2023-08-12 02:45:27', '2024-05-11 22:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'fa-solid fa-dumpster-fire', 'Commercial', 'commercial', '<p><font color=\"#343434\" face=\"Nunito, sans-serif\"><span style=\"background-color: rgb(250, 250, 250);\">আমাদের সার্ভিস এখানে লেখা হবে।</span></font></p>', 1, '2023-05-02 02:43:45', '2023-05-28 06:36:13'),
(6, 'SS BANGLA HOTEL & RESORT Car Services', 'SS BANGLA HOTEL & RESORT Car Services', 'ss-bangla-hotel--resort-car-services', '<p>Coming Soon.....</p>', 1, '2023-05-29 03:24:47', '2023-05-29 03:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `service_details`
--

CREATE TABLE `service_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_service_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_class` int(11) DEFAULT NULL,
  `exam_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_details`
--

INSERT INTO `service_details` (`id`, `our_service_id`, `subject`, `total_class`, `exam_test`, `count`, `created_at`, `updated_at`) VALUES
(3, 43, 'Physics', 25, 'Brain Test', 25, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(4, 43, 'Chemistry', 30, 'Brain Test', 30, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(5, 43, 'Highter Math', 25, 'Brain Test', 30, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(6, 43, 'Biology', 20, 'Brain Test', 20, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(7, 43, 'English', 20, 'Brain Test', 20, '2024-05-23 05:56:09', '2024-05-23 05:56:09'),
(8, 44, 'Bangla', 25, 'Brain Test', 25, '2024-05-23 05:57:20', '2024-05-23 05:57:20'),
(9, 44, 'English', 30, 'Brain Test', 30, '2024-05-23 05:57:20', '2024-05-23 05:57:20'),
(10, 44, 'GK', 25, 'Brain Test', 30, '2024-05-23 05:57:20', '2024-05-23 05:57:20'),
(11, 44, 'ICT', 20, 'Brain Test', 20, '2024-05-23 05:57:20', '2024-05-23 05:57:20'),
(12, 45, 'Accounting', 25, 'Brain Test', 25, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(13, 45, 'Management', 30, 'Brain Test', 30, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(14, 45, 'Finance', 25, 'Brain Test', 30, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(15, 45, 'Marketing', 20, 'Brain Test', 20, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(16, 45, 'English', 20, 'Brain Test', 20, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(17, 45, 'Bangla', 20, 'Brain Test', 20, '2024-05-23 05:59:23', '2024-05-23 05:59:23'),
(18, 46, 'GK', 25, 'Brain Test', 25, '2024-05-23 06:00:25', '2024-05-23 06:00:25'),
(19, 46, 'English', 20, 'Brain Test', 30, '2024-05-23 06:00:25', '2024-05-23 06:00:25'),
(20, 47, 'Physics', 25, 'Brain Test', 25, '2024-05-23 06:01:11', '2024-05-23 06:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Tripkart', '2022-08-22 02:57:04', '2023-08-07 03:34:42'),
(2, 'site_logo', 'upload/setting/logo/1716279106speakup.png', '2022-08-03 12:46:20', '2024-05-21 02:11:46'),
(3, 'site_favicon', 'upload/setting/favicon/1716279106speakup.png', '2022-08-04 12:46:20', '2024-05-21 02:11:46'),
(4, 'site_footer_logo', 'upload/setting/logo/1716279106speakup.png', '2022-08-03 12:46:20', '2024-05-21 02:11:46'),
(5, 'phone', '+8801756-586100', '2022-08-04 12:47:27', '2023-08-16 00:06:06'),
(6, 'email', 'tripkart.info@gmail.com', '2022-08-12 12:47:52', '2023-08-07 03:34:42'),
(7, 'business_name', 'Tripkart', '2022-08-08 12:48:27', '2023-08-07 03:34:42'),
(8, 'business_address', 'Shahali Plaza 10th Floor,Mirpur 10', '2022-08-04 12:48:53', '2023-08-07 03:39:41'),
(9, 'business_hours', '09:00 - 8:00, Sa - Thu', '2022-08-01 12:49:29', '2023-02-19 06:21:25'),
(10, 'copy_right', 'tripkart.info@gmail.com', '2022-08-05 12:49:58', '2023-08-07 03:39:41'),
(11, 'developed_by', 'Tripkart', '2022-08-14 12:50:24', NULL),
(12, 'developer_link', 'https://www.tripkart.com/', '2022-08-13 12:50:56', NULL),
(13, 'facebook_url', 'https://www.facebook.com', '2022-08-18 12:51:19', '2024-05-11 22:53:50'),
(14, 'twitter_url', 'https://www.facebook.com', '2022-08-17 12:51:45', '2024-05-19 23:55:57'),
(15, 'linkedin_url', 'https://www.facebook.com', '2022-08-12 12:52:12', '2024-05-19 23:55:57'),
(16, 'youtube_url', 'https://www.facebook.com', '2022-08-04 12:52:42', '2024-05-19 23:55:57'),
(17, 'instagram_url', 'https://www.facebook.com', '2022-08-11 12:53:11', '2024-05-19 23:55:57'),
(18, 'pinterest_url', 'https://www.facebook.com', '2022-08-05 12:53:45', '2024-05-19 23:55:57'),
(22, 'meta_title', 'Tripkart', NULL, '2023-08-07 03:34:42'),
(23, 'meta_keyword', 'Tripkart', NULL, '2023-08-07 03:34:42'),
(24, 'meta_description', 'Tripkart', NULL, '2023-08-07 03:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(6, 'upload/slider/1799640012922305.jpg', 'Explore Your Creativity & Talent With Unicare', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec', 'explore-your-creativity--talent-with-unicare', 1, '2024-06-01 23:43:39', '2024-06-01 23:43:39'),
(7, 'upload/slider/1799640001531443.jpg', 'Explore Your Creativity & Talent With Unicare', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec', 'explore-your-creativity--talent-with-unicare', 1, '2024-05-20 23:47:28', '2024-05-20 23:47:28'),
(8, 'upload/slider/1799639977090027.jpg', 'Explore Your Creativity & Talent With Unicare', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Ut elit tellus luctus nec ullamcorper mattis pulvinar dapibus dolor sit amet consec', 'explore-your-creativity--talent-with-unicare', 1, '2024-05-20 23:47:05', '2024-05-20 23:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `successes`
--

CREATE TABLE `successes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chance_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `successes`
--

INSERT INTO `successes` (`id`, `image`, `total_student`, `chance_student`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/success/1799387701427850.png', '1590', '২০২৩ BUET ভর্তি পরীক্ষায় মেধা তালিকায় প্রথম ৫০ এ ৫০ জনসহ ১৩০৯টি আসনের মধ্যে উদ্ভাস থেকে চান্স পেয়েছে সর্বমোট ১২৯০+ শিক্ষার্থী।', 1, '2024-05-18 04:57:16', '2024-06-01 23:42:20'),
(2, 'upload/success/1799546981626793.png', '1590', '২০২৩ BUET ভর্তি পরীক্ষায় মেধা তালিকায় প্রথম ৫০ এ ৫০ জনসহ ১৩০৯টি আসনের মধ্যে উদ্ভাস থেকে চান্স পেয়েছে সর্বমোট ১২৯০+ শিক্ষার্থী।', 1, '2024-05-19 23:08:58', '2024-05-19 23:08:58'),
(3, 'upload/success/1799547014534464.png', '1590', '২০২৩ BUET ভর্তি পরীক্ষায় মেধা তালিকায় প্রথম ৫০ এ ৫০ জনসহ ১৩০৯টি আসনের মধ্যে উদ্ভাস থেকে চান্স পেয়েছে সর্বমোট ১২৯০+ শিক্ষার্থী।', 1, '2024-05-19 23:09:29', '2024-05-19 23:09:29'),
(4, 'upload/success/1799547173410924.png', '1590', '২০২৩ BUET ভর্তি পরীক্ষায় মেধা তালিকায় প্রথম ৫০ এ ৫০ জনসহ ১৩০৯টি আসনের মধ্যে উদ্ভাস থেকে চান্স পেয়েছে সর্বমোট ১২৯০+ শিক্ষার্থী।', 1, '2024-05-19 23:12:00', '2024-06-02 04:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=>Active, 0=>Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `designation`, `description`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Saiful Islam Opu', 'upload/testimonial/1774379220509953.jpg', 'Managing Director', '<p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">I am honored to stand before you today as the Managing Director of our <b>Tripkart Travel Company</b>. As you all know, the real estate industry is constantly evolving, and the past year has been no exception.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">The COVID-19 pandemic has presented numerous challenges for our industry, but we have adapted and continued to provide exceptional service to our clients. Our team has worked tirelessly to ensure that our properties remain safe, clean, and accessible for our tenants.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">Despite the pandemic, our company has continued to thrive. We have expanded our portfolio, acquired new properties, and grown our team. This success would not have been possible without the hard work and dedication of each and every member of our team.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">As we move forward, we must continue to innovate and adapt to the changing landscape of the real estate industry. We must remain vigilant in our efforts to provide safe and comfortable spaces for our tenants, while also remaining financially responsible and profitable.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">I am confident that our team is up to this challenge. We have the talent, expertise, and passion necessary to continue to excel in this industry. Together, we will continue to build upon our successes and overcome any obstacles that may come our way.</p><p style=\"text-align: justify; border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px 0px; color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; white-space: pre-wrap; background-color: rgb(247, 247, 248);\">Thank you for your continued support and dedication to our company. Let us continue to work together towards a bright and successful future.</p>', NULL, 1, '2023-05-02 03:57:17', '2023-08-16 04:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dress_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_includes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_excludes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` double(8,2) DEFAULT NULL,
  `discount_price` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_popular` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_join` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_short_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `institute`, `address`, `vendor_join`, `vendor_short_info`, `role`, `status`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$lIyLzidohdarNEOaN581Tu66vnO7lLnCJVvCDzpNp9kcVcPsGweaq', 'profile_images/1716959501.jpg', '01768603251', NULL, 'Shahzadpur Sirajganj, Shahzadpur Sirajganj Bangladesh', NULL, NULL, 'admin', 'active', '2024-06-07 05:23:18', NULL, NULL, '2024-06-06 23:23:18'),
(20, 'Vendor', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$VH0CbCehMJoBew5qk7Iq5.UsPlkZHhyWljy0NV3ETfaBeprFRN6Eu', NULL, NULL, NULL, NULL, NULL, NULL, 'vendor', 'active', '2024-05-26 09:19:32', NULL, NULL, '2024-05-26 03:19:32'),
(21, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$zUN8FdkqKJwaVqSp0VpRRuzkcQ5IukOjAHeeMgVEvglmMwwhtCgKy', 'profile_images/1716962262.jpg', '017xxxxxxx', NULL, 'Shahzadpur Sirajganj, Shahzadpur Sirajganj Bangladesh', NULL, NULL, 'user', 'active', '2024-06-01 06:13:07', NULL, NULL, '2024-06-01 00:13:07'),
(22, 'Md Asraful Islam', 'a', 'asraful9355@gmail.com', NULL, '$2y$10$SEa7VKVdKCxw6yW6NWoAFOJ2wV4y2b3xOkoylfw.vUKnf.xPv0PCG', 'upload/user_images/1800371489245883.jpg', '01768603251', NULL, 'Shahzadpur Sirajganj', NULL, NULL, 'user', 'active', NULL, NULL, '2024-05-29 01:34:09', '2024-05-29 01:34:09'),
(29, 'Md sojib', 'sojib', 'sojib@gmail.com', NULL, '$2y$10$2RfkAM1h0IwZpRq3NN.XJO/Hij8RaWiSTKGcaNznZBuvY/KzJgU2y', 'upload/user_images/1800726641688665.png', '017xxxxxxx', NULL, 'sdfsdsd', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-01 23:39:09', '2024-06-01 23:39:09'),
(37, 'student', 'student', 'student@gmail.com', NULL, '$2y$10$oidl7dTNfzH7PTaXWKCdguyj3L1Xed8o4Ky4z7xT8ret4z5PLVOIC', 'upload/user_images/1800933365570178.jpg', '017xxxxxxx', 'Dhaka University Of Bangladesh', 'Mirpur,Dhaka', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-04 06:24:56', '2024-06-04 06:24:56'),
(38, 'rajib', 'rajib', 'rajib@gmail.com', NULL, '$2y$10$MS0lBxfX.GYw.LH.Xi75YuqyYBi00FWq1Qguj/2zsMK.Ld25o5XE.', 'upload/user_images/1801017690331965.jpg', '017xxxxxx', 'Pabna Polytechnic Institute', 'Shahzadpur Sirajganj', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 04:45:14', '2024-06-05 04:45:14'),
(39, 'rejaul', 'reajaul', 'reajaul@gmail.com', NULL, '$2y$10$YO8wOFgZkajxlDmS89BNOeFSifeqIKlJL2ipOIzYiAxM2H0yZkZne', 'upload/user_images/1801018517380861.jpg', '017xxxxx', 'Dhaka University Of Bangladesh', 'Sreefaltala,Shahzadpur,Sirajganj Bangladesh', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 04:58:23', '2024-06-05 04:58:23'),
(40, 'robin', 'robin', 'robin@gmail.com', NULL, '$2y$10$zpQ0VkBWnbe1CMcqJ5fNgu0v6SINdC89elRMcGWlYvuR..xGrEHGy', 'upload/user_images/1801018799217602.jpg', '017xxxxx', 'Pabna Polytechnic Institute', 'Sreefaltala,Shahzadpur,Sirajganj Bangladesh', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 05:02:52', '2024-06-05 05:02:52'),
(41, 'abc', 'abc', 'abc@gmail.com', NULL, '$2y$10$9/o9EXO/R5prnV.hI4Hoz.6tV4dMhxGz6WSP8vn9twDlZQ2DPN8Q2', 'upload/user_images/1801018926181303.jpg', '017xxxx', 'Dhaka University Of Bangladesh', 'Sreefaltala,Shahzadpur,Sirajganj Bangladesh', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 05:04:53', '2024-06-05 05:04:53'),
(42, 'a', 'a', 'a@gmail.com', NULL, '$2y$10$mDDNnEBMe07PPl2Sxuj8i.iR0wpUbePl0e9W5jlK4xN1GgfgH4sZu', 'upload/user_images/1801084681585332.png', '017xxxx', 'abc', 'abc', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 22:30:02', '2024-06-05 22:30:02'),
(43, 'bc', 'bc', 'b@gmail.com', NULL, '$2y$10$mDDNnEBMe07PPl2Sxuj8i.iR0wpUbePl0e9W5jlK4xN1GgfgH4sZu', 'upload/user_images/1801084683573946.png', '017', 'bca', 'bca', NULL, NULL, 'user', 'active', NULL, NULL, '2024-06-05 22:30:04', '2024-06-05 22:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `user_id`, `exam_id`, `question_id`, `answer_id`, `created_at`, `updated_at`) VALUES
(7, 37, 3, 11, 42, '2024-06-04 06:46:56', '2024-06-04 06:46:56'),
(8, 37, 3, 12, 47, '2024-06-04 06:46:56', '2024-06-04 06:46:56'),
(9, 37, 3, 13, 50, '2024-06-04 06:46:56', '2024-06-04 06:46:56'),
(10, 37, 4, 14, 54, '2024-06-04 23:46:30', '2024-06-04 23:46:30'),
(11, 37, 5, 15, 59, '2024-06-05 00:07:35', '2024-06-05 00:07:35'),
(12, 37, 7, 17, 67, '2024-06-05 03:57:54', '2024-06-05 03:57:54'),
(15, 38, 3, 11, 42, '2024-06-05 04:46:42', '2024-06-05 04:46:42'),
(16, 38, 3, 12, 48, '2024-06-05 04:46:42', '2024-06-05 04:46:42'),
(17, 38, 3, 13, 50, '2024-06-05 04:46:42', '2024-06-05 04:46:42'),
(20, 39, 3, 11, 41, '2024-06-05 04:59:39', '2024-06-05 04:59:39'),
(21, 39, 3, 12, 48, '2024-06-05 04:59:39', '2024-06-05 04:59:39'),
(22, 39, 3, 13, 50, '2024-06-05 04:59:39', '2024-06-05 04:59:39'),
(25, 40, 3, 11, 42, '2024-06-05 05:03:40', '2024-06-05 05:03:40'),
(26, 40, 3, 12, 48, '2024-06-05 05:03:40', '2024-06-05 05:03:40'),
(27, 40, 3, 13, 50, '2024-06-05 05:03:40', '2024-06-05 05:03:40'),
(30, 41, 3, 11, 44, '2024-06-05 05:05:59', '2024-06-05 05:05:59'),
(31, 41, 3, 12, 46, '2024-06-05 05:05:59', '2024-06-05 05:05:59'),
(32, 41, 3, 13, 49, '2024-06-05 05:05:59', '2024-06-05 05:05:59'),
(33, 42, 8, 18, 70, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(34, 42, 8, 19, 73, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(35, 42, 8, 20, 80, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(36, 43, 8, 18, 70, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(37, 43, 8, 19, 73, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(38, 43, 8, 20, 80, '2024-06-05 22:34:21', '2024-06-05 22:34:21'),
(39, 43, 9, 21, 82, '2024-06-05 22:41:56', '2024-06-05 22:41:56'),
(40, 43, 9, 22, 85, '2024-06-05 22:41:56', '2024-06-05 22:41:56'),
(41, 42, 9, 21, 82, '2024-06-05 22:42:00', '2024-06-05 22:42:00'),
(42, 42, 9, 22, 85, '2024-06-05 22:42:00', '2024-06-05 22:42:00'),
(43, 19, 10, 23, 92, '2024-06-06 23:51:07', '2024-06-06 23:51:07'),
(44, 19, 10, 24, 95, '2024-06-06 23:51:07', '2024-06-06 23:51:07'),
(45, 19, 10, 25, 98, '2024-06-06 23:51:07', '2024-06-06 23:51:07'),
(52, 37, 12, 29, 114, '2024-06-07 01:25:15', '2024-06-07 01:25:15'),
(53, 37, 12, 30, 120, '2024-06-07 01:25:15', '2024-06-07 01:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_url`, `teacher_qualification`, `about_class`, `publish_date`, `status`, `created_at`, `updated_at`) VALUES
(7, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8Bzofw4n09M?si=7vvYSc_ywCbpA_HE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Raihan Sir BBA(Hons), MBA (IBA), RU', 'Learn English, Change Your Life', '2024-05-25', 1, '2024-05-25 05:52:19', '2024-05-25 05:52:46'),
(8, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Im1AtzTFRkg?si=0H1iaqCAA3tFYT08\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Raihan Sir BBA(Hons), MBA (IBA), RU', 'Tense', '2024-05-25', 1, '2024-05-25 05:53:17', '2024-05-25 05:53:17'),
(10, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MJ7eKWjGFDs?si=TjzqVhvFOC_9BUho\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'After SSC Vs Ayman', 'convertion', '2024-05-25', 1, '2024-05-25 06:01:20', '2024-05-25 06:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `your_table_name_here`
--

CREATE TABLE `your_table_name_here` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `our_service_id` bigint(20) UNSIGNED NOT NULL,
  `one_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `three_facility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aminities`
--
ALTER TABLE `aminities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_states`
--
ALTER TABLE `country_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meritoriouses`
--
ALTER TABLE `meritoriouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nearest_locations`
--
ALTER TABLE `nearest_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_offers`
--
ALTER TABLE `program_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_aminities`
--
ALTER TABLE `property_aminities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_nearest_locations`
--
ALTER TABLE `property_nearest_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_purposes`
--
ALTER TABLE `property_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_details`
--
ALTER TABLE `service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `value` (`value`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `successes`
--
ALTER TABLE `successes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_answers_user_id_foreign` (`user_id`),
  ADD KEY `user_answers_exam_id_foreign` (`exam_id`),
  ADD KEY `user_answers_question_id_foreign` (`question_id`),
  ADD KEY `user_answers_answer_id_foreign` (`answer_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `your_table_name_here`
--
ALTER TABLE `your_table_name_here`
  ADD PRIMARY KEY (`id`),
  ADD KEY `your_table_name_here_our_service_id_foreign` (`our_service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aminities`
--
ALTER TABLE `aminities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country_states`
--
ALTER TABLE `country_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meritoriouses`
--
ALTER TABLE `meritoriouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `nearest_locations`
--
ALTER TABLE `nearest_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_offers`
--
ALTER TABLE `program_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `property_aminities`
--
ALTER TABLE `property_aminities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `property_nearest_locations`
--
ALTER TABLE `property_nearest_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `property_purposes`
--
ALTER TABLE `property_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_details`
--
ALTER TABLE `service_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `successes`
--
ALTER TABLE `successes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `your_table_name_here`
--
ALTER TABLE `your_table_name_here`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
  ADD CONSTRAINT `user_answers_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `user_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `user_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `your_table_name_here`
--
ALTER TABLE `your_table_name_here`
  ADD CONSTRAINT `your_table_name_here_our_service_id_foreign` FOREIGN KEY (`our_service_id`) REFERENCES `our_services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
