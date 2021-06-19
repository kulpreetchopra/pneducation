-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 12:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pneducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `icon`, `image`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Who We Are', 'fa fa-file-text-o', 'image1620632411.jpg', 'PN INFOSYS provides the best service possible to its customers because for us, our client’s happiness is important. Whatever we choose to do, we do it an exorbitant manner. PN INFOSYS Company provides a full range of maintenance and compliance services for Government and Commercial facilities.', '2021-03-30 05:10:44', '2021-05-10 02:15:18'),
(2, 'Our Education', 'fa fa-university', 'image1620632468.jpg', 'We have capability to train even novice students, students who don’t have any experience with coding can work efficiently in our training sessions. You will have the experience to work on Live Projects, which will ameliorate your portfolio. Basically through these training sessions, we want to help students to grow.', '2021-03-30 05:26:20', '2021-05-10 02:18:08'),
(3, 'Our Story', 'fa fa-umbrella', 'image1620632514.jpg', 'PN INFOSYS is a leading global business consulting and IT service company. We provides a full range of maintenance and compliance services for Government and Commercial facilities both large and small. Whether you need to run your business more efficiently or accelerate revenue growth, PN INFOSYS can get you there.', '2021-03-30 05:28:19', '2021-05-10 02:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `start_date`, `start_time`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Python summer internship starts on', '2021-05-22', '04:00:00', '2021-07-04', '2021-03-30 03:47:57', '2021-05-20 23:29:01'),
(2, 'Web designing new batch starts on', '2021-04-10', '17:30:00', '2021-05-07', '2021-04-02 03:28:18', '2021-05-10 01:19:07'),
(3, 'Laravel summer internship starts on', '2021-07-15', '15:56:00', '2021-08-01', '2021-04-30 04:56:52', '2021-06-14 10:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `discription`, `bgimage`, `created_at`, `updated_at`) VALUES
(1, 'Python Programming Language', 'Project Based Learning', 'bgimage1620455885.jpg', '2021-02-25 09:42:27', '2021-05-08 01:08:05'),
(3, 'Machine Learning', 'Project Based Learning', 'bgimage1620456142.jpg', '2021-02-25 22:31:08', '2021-05-08 01:12:22'),
(4, 'Web designing', 'Project Based Learning', 'bgimage1620456289.jpg', '2021-03-04 08:36:42', '2021-05-08 01:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Web Developement', '1', 'image1620457328.jpg', '2021-02-24 22:47:31', '2021-05-08 01:32:08'),
(2, 'Web Designing', '1', 'image1620457374.png', '2021-02-24 22:47:38', '2021-05-08 01:32:54'),
(3, 'Machine Learning', '1', 'image1614837969.jpg', '2021-02-24 22:47:44', '2021-03-04 00:36:09'),
(5, 'Data Analytics', '1', 'image1614837888.jpg', '2021-03-02 11:15:37', '2021-03-04 00:34:48'),
(6, 'Mathametics', '1', 'image1614838080.jpg', '2021-03-03 23:29:25', '2021-05-30 11:06:32'),
(7, 'Management', '0', 'image1614838170.jpg', '2021-03-04 00:10:59', '2021-05-08 00:24:18'),
(8, 'Amptitude And Reasoning', '1', 'image1614838244.png', '2021-03-04 00:18:52', '2021-03-04 00:40:44'),
(10, 'Programming Languages', '1', 'image1620455332.jpg', '2021-05-07 11:17:16', '2021-05-08 00:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupan_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupans`
--

INSERT INTO `coupans` (`id`, `coupan_code`, `discount`, `status`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, '1001', '30', '1', '2021-12-31', '2021-03-24 23:28:22', '2021-06-02 04:37:55'),
(2, '1002', '20', '1', '2021-03-31', '2021-03-24 23:38:13', '2021-06-02 04:03:58'),
(3, '1003', '70', '0', '2021-05-27', '2021-05-18 02:43:57', '2021-06-19 04:03:28'),
(4, '1004', '40', '1', '2021-05-31', '2021-05-19 04:25:44', '2021-05-19 04:25:44'),
(5, '1005', '60', '1', '2021-08-11', '2021-06-01 23:44:57', '2021-06-01 23:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `courseorders`
--

CREATE TABLE `courseorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_methode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupan_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupan_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_include` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_containt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `c_name`, `c_discription`, `c_price`, `c_details`, `c_include`, `c_containt`, `c_image`, `c_category`, `c_teacher`, `created_at`, `updated_at`) VALUES
(1, 'Python', 'Improve your productivity, get things done, and find more time for what’s most important with Time Management Tips. This weekly series provides actionable time management techniques to help people better manage their time and ultimately become more productive. Time management expert Dave Crenshaw provides a new tip every Monday, touching on a wide variety of topics. Tune in to learn about everything from managing emails and calendars to setting priorities, collaborating with coworkers, reducing interruptions, crafting a “productivity mindset,” and creating a more comfortable and effective work environment.', '400', 'Improve your productivity, get things done, and find more time for what’s most important with Time Management Tips. This weekly series provides actionable time management techniques to help people better manage their time and ultimately become more productive. Time management expert Dave Crenshaw provides a new tip every Monday, touching on a wide variety of topics. Tune in to learn about everything from managing emails and calendars to setting priorities, collaborating with coworkers, reducing interruptions, crafting a “productivity mindset,” and creating a more comfortable and effective work environment.', 'Improve your productivity, get things done, and find more time for what’s most important with Time Management Tips. This weekly series provides actionable time management techniques to help people better manage their time and ultimately become more productive. Time management expert Dave Crenshaw provides a new tip every Monday, touching on a wide variety of topics. Tune in to learn about everything from managing emails and calendars to setting priorities, collaborating with coworkers, reducing interruptions, crafting a “productivity mindset,” and creating a more comfortable and effective work environment.', 'Improve your productivity, get things done, and find more time for what’s most important with Time Management Tips. This weekly series provides actionable time 1.management techniques to help people better manage their time and ultimately become more productive. Time management expert Dave Crenshaw provides a new tip \r\n2. every Monday, touching on a wide variety of topics. Tune in to learn about everything from managing emails and calendars to setting priorities, collaborating with \r\n3. coworkers, reducing interruptions, crafting a “productivity mindset,” and creating a more comfortable and effective work environment.', 'c_image1614838508.jpg', 'Programming Languages', 'Vikas Jain', '2021-02-24 22:48:20', '2021-06-14 10:53:49'),
(2, 'Html Css Js', 'NaN', '1000', 'NaN', 'NaN', 'NaN', 'c_image1620453060.png', 'Web Designing', 'Gunjan Gupta', '2021-03-03 01:32:50', '2021-06-14 10:54:25'),
(3, 'React Js', 'NaN', '1600', 'NaN', 'NaN', 'NaN', 'c_image1620452190.jpg', 'Web Designing', 'Vikas Jain', '2021-03-04 23:17:29', '2021-05-30 23:36:50'),
(4, 'Node Js', 'NAN', '1700', 'NAN', 'NAN', 'NAN', 'c_image1620452845.png', 'Web Designing', 'Vikas Jain', '2021-04-26 09:22:26', '2021-05-08 00:17:25'),
(5, 'Core Php', 'NAN', '1300', 'NAN', 'NAN', 'NAN', 'c_image1620452424.png', 'Web Developement', 'Vikas Jain', '2021-05-07 11:21:33', '2021-05-30 23:38:03'),
(6, 'Laravel', 'NAN', '900', 'NAN', 'NAN', 'NAN', 'c_image1620452299.png', 'Web Developement', 'Vikas Jain', '2021-05-07 11:23:13', '2021-06-14 10:54:04'),
(7, 'Python Django', 'NAN', '1800', 'NAN', 'NAN', 'NAN', 'c_image1620457567.png', 'Web Developement', 'Vikas Jain', '2021-05-08 00:48:51', '2021-05-08 01:36:07'),
(8, 'Mysql', 'NAN', '1200', 'NAN', 'NAN', 'NAN', 'c_image1620454890.png', 'Programming Languages', 'Gunjan Gupta', '2021-05-08 00:51:30', '2021-05-30 23:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `course_order_products`
--

CREATE TABLE `course_order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interns`
--

CREATE TABLE `interns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interns`
--

INSERT INTO `interns` (`id`, `name`, `image`, `company`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Kulpreet Chopra', 'image1620459314.jpg', 'PN-Infosys', 'Web Developer', '2021-03-15 09:11:25', '2021-05-08 02:05:44'),
(3, 'Gunjan Gupta', 'image1620459416.jpg', 'PN-Infosys', 'Web Developer', '2021-05-08 02:06:56', '2021-05-08 02:06:56');

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
(4, '2021_02_22_143212_create_admins_table', 1),
(5, '2021_02_22_153114_create_categories_table', 1),
(6, '2021_02_23_035502_create_courses_table', 1),
(7, '2021_02_24_103810_create_frontends_table', 1),
(8, '2021_02_25_143443_create_banners_table', 2),
(9, '2021_03_04_145118_create_navbars_table', 3),
(10, '2021_03_08_035017_create_signups_table', 4),
(11, '2021_03_10_034847_create_carts_table', 5),
(12, '2021_03_14_135910_create_teams_table', 6),
(13, '2021_03_15_142038_create_interns_table', 7),
(14, '2021_03_15_142144_create_placements_table', 7),
(15, '2021_03_15_162154_create_contacts_table', 8),
(16, '2021_03_16_042836_create_subscribes_table', 9),
(17, '2021_03_22_151538_create_specials_table', 10),
(18, '2021_03_24_162242_create_alerts_table', 11),
(19, '2021_03_24_165118_create_workshops_table', 12),
(20, '2021_03_25_034500_create_coupans_table', 13),
(21, '2021_03_25_061202_create_checkouts_table', 14),
(22, '2021_03_26_092022_create_abouts_table', 15),
(23, '2021_03_30_101455_create_portfolios_table', 16),
(24, '2021_04_02_144324_create_ratings_table', 17),
(25, '2021_04_07_035550_create_courseorders_table', 18),
(26, '2021_04_07_040417_create_course_order_products_table', 18),
(27, '2021_05_06_042658_google_id_column', 19),
(28, '2021_05_23_064411_create_checkouts_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timing` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `contact`, `email`, `logo`, `about`, `address`, `timing`, `map`, `facebook`, `twitter`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, '7000846823', 'support@pninfosys.com', 'logo1615719373.png', 'PN INFOSYS is a leading global business consulting and IT service company. Whether you need to run your business more efficiently or accelerate revenue growth, PN INFOSYS can get you there.', 'MIG-332 Darpan Colony,Thatipur, Gwalior,Madhya Pradesh', 'Mon to Fri from 9 AM to 5 PM', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.628921433357!2d78.2069601149828!3d26.20874688343578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976c3a3faabd5e3%3A0x88d563b9d79500ed!2sPN%20INFOSYS!5e0!3m2!1sen!2sin!4v1620628173635!5m2!1sen!2sin', 'https://www.facebook.com/pninfosys/', 'https://mobile.twitter.com', 'https://www.instagram.com', 'https://www.linkedin.com/company/pninfosys/mycompany/', '2021-03-04 09:53:07', '2021-05-10 01:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gunjan@gmail.com', '$2y$10$2uEqgH9qie1A2EtgZKr/YuFW6lbsm0V4qz0s2eAXHPOQL9Zqyzuqe', '2021-05-15 03:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`id`, `name`, `image`, `company`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Kulpreet Chopra', 'image1620457962.jpg', 'PN-Infosys', 'Laravel Developer', '2021-03-15 09:31:24', '2021-05-08 01:48:46'),
(3, 'Gunjan Gupta', 'image1620458052.jpg', 'Lealmart  India', 'Developer', '2021-03-30 23:34:13', '2021-05-08 01:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'PN-Infosys', 'image1620631448.png', 'http://pninfosys.com', '2021-03-30 05:58:20', '2021-05-10 01:54:08'),
(2, 'Internship Registration', 'image1620631554.png', 'https://internship2021.pninfosys.com/', '2021-03-30 06:01:23', '2021-05-10 01:55:54'),
(3, 'VEE Academy', 'image1620631822.png', 'https://vikasedugwl.com/', '2021-03-30 06:01:43', '2021-05-10 02:00:22'),
(4, 'IDTR', 'image1620631655.png', 'http://idtrgwl.com/', '2021-03-30 06:06:21', '2021-05-10 01:57:35'),
(7, 'ICAR', 'image1620631972.jpg', '#', '2021-05-10 02:02:52', '2021-05-10 02:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `title`, `icon`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Online Learn Courses Management', 'fa fa-umbrella', 'Analyzing negative materials about your brand and addressing them with sentiment analysis and press.', '2021-03-24 03:07:39', '2021-03-24 03:11:56'),
(2, 'Learn from the masters of the field online', 'fa fa-id-card-o', 'Analyzing negative materials about your brand and addressing them with sentiment analysis and press.', '2021-03-24 03:25:06', '2021-03-24 03:25:06'),
(3, 'An Introduction-Skills For Learners', 'fa fa-handshake-o', 'Analyzing negative materials about your brand and addressing them with sentiment analysis and press.', '2021-03-24 03:25:46', '2021-03-24 03:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `about`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Kulpreet Chopra', 'image1620459699.jpg', 'Web Developer', 'Design-driven, customized and reliable solution for your token development and management system to automate sales processes.', '2021-03-14 09:29:24', '2021-05-08 02:11:39'),
(2, 'Gunjan Gupta', 'image1620459715.jpg', 'Web Designer', 'Design-driven, customized and reliable solution for your token development and management system to automate sales processes.', '2021-03-14 09:39:53', '2021-05-08 02:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `phone`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`) VALUES
(1, 'Kulpreet Chopra', NULL, 'choprakulpreet@gmail.com', NULL, NULL, 'eyJpdiI6IktMU09sZ2U1T085SWVHRGJzM2tnQVE9PSIsInZhbHVlIjoiY2RoTUNGU21vTE9xNjY2WnMwU3JsbWcyblFlUkg3NFV1T2VHTzRxdmF1TT0iLCJtYWMiOiIxMzg5NzQwMGNmNjZkNmNkZTc1YTliNjliYzIyZjU3NTE0NDZlMGM2MjBlNWE3OWU1ZjVhMzFhZjk3YzFkYzllIn0=', 0, 0, NULL, '2021-06-18 11:53:31', '2021-06-18 11:53:31', '117272328578037220656', NULL),
(2, 'Kulpreet', 'Chopra', 'kulpreetsingh0128@gmail.com', '2021-06-18 11:54:54', '6266060879', '$2y$10$Z/SGu.wSGTYBgp9DT5UQ6OHPPHSL2GZIIHAeLYunJ1Z56yePlo.6i', 1, 0, NULL, '2021-06-18 11:54:38', '2021-06-18 11:54:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mpct College', 'image1616656559.jpg', '2021-03-24 12:00:59', '2021-03-25 01:45:59'),
(3, 'Xiaomi MI Company', 'image1616656517.jpg', '2021-03-24 12:24:12', '2021-03-25 01:45:17'),
(4, 'BentChair Company', 'image1616656529.jpg', '2021-03-24 12:24:21', '2021-03-25 01:45:29'),
(5, 'Rjit College', 'image1616656455.jpg', '2021-03-25 01:44:15', '2021-03-25 01:44:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseorders`
--
ALTER TABLE `courseorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_order_products`
--
ALTER TABLE `course_order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courseorders`
--
ALTER TABLE `courseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_order_products`
--
ALTER TABLE `course_order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interns`
--
ALTER TABLE `interns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
