-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 07:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `balanses`
--

CREATE TABLE `balanses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeeexpenses`
--

CREATE TABLE `employeeexpenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebene` varchar(255) DEFAULT NULL,
  `money` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeeexpenses`
--

INSERT INTO `employeeexpenses` (`id`, `name`, `employee_id`, `subject`, `tebene`, `money`, `date`, `created_at`, `updated_at`) VALUES
(1, 'marya jabar', 1, 'something', 'v,lfmvkmfkmvkmf', 20000, '2025-05-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `borndate` date DEFAULT '1000-01-01',
  `dateofwork` date NOT NULL,
  `salary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `borndate`, `dateofwork`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'marya jabar', '07508507224', '1999-03-06', '2025-05-31', 200000, '2025-05-31 14:59:30', '2025-05-31 14:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `expenbooks`
--

CREATE TABLE `expenbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `learnings`
--

CREATE TABLE `learnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_22_140020_create_employees_table', 1),
(6, '2024_03_22_140038_create_muchdans_table', 1),
(7, '2024_04_12_222036_create_prodects_table', 1),
(8, '2024_04_15_125231_create_employeeexpenses_table', 1),
(9, '2024_04_15_230503_create_rentals_table', 1),
(10, '2024_04_16_235347_create_expenbooks_table', 1),
(11, '2024_04_17_144726_create_balanses_table', 1),
(12, '2024_04_18_094541_create_learnings_table', 1),
(13, '2024_04_18_122242_create_reklams_table', 1),
(14, '2024_04_18_145039_create_courses_table', 1),
(15, '2024_04_18_162816_create_offices_table', 1),
(16, '2024_04_18_165507_create_technologies_table', 1),
(17, '2024_04_18_181831_create_peshangas_table', 1),
(18, '2024_04_19_142914_create_pos_table', 1),
(19, '2024_04_21_153327_create_shoppingcart_table', 1),
(20, '2024_04_23_000806_create_orders_table', 1),
(21, '2024_04_23_001927_create_orderdetails_table', 1),
(22, '2024_05_23_194511_create_personals_table', 1),
(23, '2024_05_27_170042_create_money_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `muchdans`
--

CREATE TABLE `muchdans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mang` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `reward` int(11) DEFAULT 0,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `thatuser_get_salary` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `prodect_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `prodect_id`, `price`, `qty`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1000, 1, 'marya3', NULL, NULL),
(2, 2, 3, 1000, 1, 'marya3', NULL, NULL),
(3, 2, 2, 3000, 1, 'book2', NULL, NULL),
(4, 3, 3, 1000, 1, 'marya3', NULL, NULL),
(5, 4, 2, 3000, 1, 'book2', NULL, NULL),
(6, 5, 3, 1000, 1, 'marya3', NULL, NULL),
(7, 5, 2, 3000, 1, 'book2', NULL, NULL),
(8, 6, 3, 1000, 1, 'marya3', NULL, NULL),
(9, 7, 3, 1000, 1, 'marya3', NULL, NULL),
(10, 7, 2, 3000, 1, 'book2', NULL, NULL),
(11, 8, 3, 1000, 1, 'marya3', NULL, NULL),
(12, 9, 2, 3000, 1, 'book2', NULL, NULL),
(13, 9, 3, 1000, 1, 'marya3', NULL, NULL),
(14, 10, 3, 1000, 1, 'marya3', NULL, NULL),
(15, 11, 3, 1000, 1, 'marya3', NULL, NULL),
(16, 12, 3, 1000, 1, 'marya3', NULL, NULL),
(17, 13, 2, 3000, 1, 'book2', NULL, NULL),
(18, 14, 3, 1000, 1, 'marya3', NULL, NULL),
(19, 15, 3, 1000, 1, 'marya3', NULL, NULL),
(20, 15, 2, 3000, 1, 'book2', NULL, NULL),
(21, 16, 3, 1000, 1, 'marya3', NULL, NULL),
(22, 17, 3, 1000, 1, 'marya3', NULL, NULL),
(23, 18, 2, 3000, 1, 'book2', NULL, NULL),
(24, 19, 3, 1000, 1, 'marya3', NULL, NULL),
(25, 20, 2, 3000, 1, 'book2', NULL, NULL),
(26, 21, 3, 1000, 1, 'marya3', NULL, NULL),
(27, 22, 3, 1000, 1, 'marya3', NULL, NULL),
(28, 23, 3, 1000, 1, 'marya3', NULL, NULL),
(29, 24, 3, 1000, 1, 'marya3', NULL, NULL),
(30, 25, 3, 1000, 1, 'marya3', NULL, NULL),
(31, 26, 3, 1000, 1, 'marya3', NULL, NULL),
(32, 27, 3, 1000, 1, 'marya3', NULL, NULL),
(33, 28, 2, 3000, 1, 'book2', NULL, NULL),
(34, 29, 2, 3000, 1, 'book2', NULL, NULL),
(35, 30, 3, 1000, 1, 'marya3', NULL, NULL),
(36, 31, 3, 1000, 1, 'marya3', NULL, NULL),
(37, 32, 3, 1000, 1, 'marya3', NULL, NULL),
(38, 33, 3, 1000, 1, 'marya3', NULL, NULL),
(39, 34, 3, 1000, 5, 'marya3', NULL, NULL),
(40, 34, 2, 3000, 1, 'book2', NULL, NULL),
(41, 35, 3, 1000, 1, 'marya3', NULL, NULL),
(42, 35, 2, 3000, 1, 'book2', NULL, NULL),
(43, 36, 3, 1000, 1, 'marya3', NULL, NULL),
(44, 37, 3, 1000, 1, 'marya3', NULL, NULL),
(45, 37, 2, 3000, 1, 'book2', NULL, NULL),
(46, 38, 3, 1000, 4, 'marya3', NULL, NULL),
(47, 38, 2, 3000, 1, 'book2', NULL, NULL),
(48, 39, 3, 1000, 3, 'marya3', NULL, NULL),
(49, 39, 2, 3000, 1, 'book2', NULL, NULL),
(50, 40, 3, 1000, 1, 'marya3', NULL, NULL),
(51, 41, 3, 1000, 1, 'marya3', NULL, NULL),
(52, 41, 2, 3000, 1, 'book2', NULL, NULL),
(53, 42, 3, 1000, 2, 'marya3', NULL, NULL),
(54, 42, 2, 3000, 1, 'book2', NULL, NULL),
(55, 43, 3, 1000, 2, 'marya3', NULL, NULL),
(56, 44, 3, 1000, 1, 'marya3', NULL, NULL),
(57, 45, 3, 1000, 2, 'marya3', NULL, NULL),
(58, 45, 2, 3000, 1, 'book2', NULL, NULL),
(59, 46, 3, 1000, 3, 'marya3', NULL, NULL),
(60, 47, 3, 1000, 1, 'marya3', NULL, NULL),
(61, 47, 2, 3000, 1, 'book2', NULL, NULL),
(62, 48, 3, 1000, 1, 'marya3', NULL, NULL),
(63, 48, 2, 3000, 1, 'book2', NULL, NULL),
(64, 49, 3, 1000, 1, 'marya3', NULL, NULL),
(65, 49, 2, 3000, 1, 'book2', NULL, NULL),
(66, 50, 3, 1000, 1, 'marya3', NULL, NULL),
(67, 50, 2, 3000, 1, 'book2', NULL, NULL),
(68, 51, 3, 1000, 1, 'marya3', NULL, NULL),
(69, 52, 3, 1000, 1, 'marya3', NULL, NULL),
(70, 52, 2, 3000, 1, 'book2', NULL, NULL),
(71, 53, 3, 1000, 1, 'marya3', NULL, NULL),
(72, 54, 3, 1000, 1, 'marya3', NULL, NULL),
(73, 54, 2, 3000, 1, 'book2', NULL, NULL),
(74, 55, 3, 1000, 1, 'marya3', NULL, NULL),
(75, 55, 2, 3000, 1, 'book2', NULL, NULL),
(76, 56, 3, 1000, 1, 'marya3', NULL, NULL),
(77, 57, 3, 1000, 1, 'marya3', NULL, NULL),
(78, 57, 2, 3000, 1, 'book2', NULL, NULL),
(79, 58, 3, 1000, 1, 'marya3', NULL, NULL),
(80, 58, 2, 3000, 1, 'book2', NULL, NULL),
(81, 59, 3, 1000, 1, 'marya3', NULL, NULL),
(82, 60, 3, 1000, 1, 'marya3', NULL, NULL),
(83, 61, 3, 1000, 2, 'marya3', NULL, NULL),
(84, 62, 3, 1000, 1, 'marya3', NULL, NULL),
(85, 63, 3, 1000, 2, 'marya3', NULL, NULL),
(86, 63, 2, 3000, 4, 'book2', NULL, NULL),
(87, 64, 3, 1000, 1, 'marya3', NULL, NULL),
(88, 64, 2, 3000, 1, 'book2', NULL, NULL),
(89, 65, 3, 1000, 1, 'marya3', NULL, NULL),
(90, 66, 3, 1000, 1, 'marya3', NULL, NULL),
(91, 67, 3, 1000, 1, 'marya3', NULL, NULL),
(92, 68, 3, 1000, 1, 'marya3', NULL, NULL),
(93, 69, 3, 1000, 1, 'marya3', NULL, NULL),
(94, 70, 3, 1000, 1, 'marya3', NULL, NULL),
(95, 70, 2, 3000, 1, 'book2', NULL, NULL),
(96, 71, 3, 1000, 1, 'marya3', NULL, NULL),
(97, 72, 3, 1000, 1, 'marya3', NULL, NULL),
(98, 73, 3, 1000, 1, 'marya3', NULL, NULL),
(99, 74, 3, 1000, 1, 'marya3', NULL, NULL),
(100, 75, 3, 1000, 1, 'marya3', NULL, NULL),
(101, 76, 3, 1000, 1, 'marya3', NULL, NULL),
(102, 77, 3, 1000, 1, 'marya3', NULL, NULL),
(103, 78, 3, 1000, 1, 'marya3', NULL, NULL),
(104, 79, 3, 1000, 1, 'marya3', NULL, NULL),
(105, 79, 2, 3000, 1, 'book2', NULL, NULL),
(106, 80, 3, 1000, 1, 'marya3', NULL, NULL),
(107, 81, 2, 3000, 1, 'book2', NULL, NULL),
(108, 82, 2, 3000, 1, 'book2', NULL, NULL),
(109, 83, 2, 3000, 1, 'book2', NULL, NULL),
(110, 84, 2, 3000, 1, 'book2', NULL, NULL),
(111, 85, 2, 3000, 1, 'book2', NULL, NULL),
(112, 86, 2, 3000, 1, 'book2', NULL, NULL),
(113, 87, 2, 3000, 1, 'book2', NULL, NULL),
(114, 88, 3, 1000, 2, 'marya3', NULL, NULL),
(115, 89, 3, 1000, 1, 'marya3', NULL, NULL),
(116, 90, 2, 3000, 1, 'book2', NULL, NULL),
(117, 91, 3, 1000, 1, 'marya3', NULL, NULL),
(118, 92, 3, 1000, 1, 'marya3', NULL, NULL),
(119, 93, 3, 1000, 3, 'marya3', NULL, NULL),
(120, 94, 3, 1000, 1, 'marya3', NULL, NULL),
(121, 95, 3, 1000, 1, 'marya3', NULL, NULL),
(122, 96, 3, 1000, 1, 'marya3', NULL, NULL),
(123, 97, 3, 1000, 1, 'marya3', NULL, NULL),
(124, 98, 2, 3000, 1, 'book2', NULL, NULL),
(125, 99, 3, 1000, 1, 'marya3', NULL, NULL),
(126, 100, 3, 1000, 1, 'marya3', NULL, NULL),
(127, 101, 3, 1000, 1, 'marya3', NULL, NULL),
(128, 102, 3, 1000, 1, 'marya3', NULL, NULL),
(129, 103, 3, 1000, 1, 'marya3', NULL, NULL),
(130, 104, 3, 1000, 1, 'marya3', NULL, NULL),
(131, 105, 3, 1000, 1, 'marya3', NULL, NULL),
(132, 106, 3, 1000, 1, 'marya3', NULL, NULL),
(133, 107, 3, 1000, 1, 'marya3', NULL, NULL),
(134, 108, 3, 1000, 1, 'marya3', NULL, NULL),
(135, 109, 3, 1000, 2, 'marya3', NULL, NULL),
(136, 110, 3, 1000, 1, 'marya3', NULL, NULL),
(137, 111, 3, 1000, 1, 'marya3', NULL, NULL),
(138, 112, 3, 1000, 1, 'marya3', NULL, NULL),
(139, 113, 3, 1000, 1, 'marya3', NULL, NULL),
(140, 114, 3, 1000, 1, 'marya3', NULL, NULL),
(141, 115, 3, 1000, 1, 'marya3', NULL, NULL),
(142, 116, 3, 1000, 1, 'marya3', NULL, NULL),
(143, 117, 3, 1000, 1, 'marya3', NULL, NULL),
(144, 118, 3, 1000, 1, 'marya3', NULL, NULL),
(145, 119, 3, 1000, 1, 'marya3', NULL, NULL),
(146, 120, 3, 1000, 1, 'marya3', NULL, NULL),
(147, 121, 3, 1000, 1, 'marya3', NULL, NULL),
(148, 122, 3, 1000, 1, 'marya3', NULL, NULL),
(149, 123, 3, 1000, 1, 'marya3', NULL, NULL),
(150, 124, 3, 1000, 1, 'marya3', NULL, NULL),
(151, 125, 2, 3000, 1, 'book2', NULL, NULL),
(152, 126, 3, 1000, 1, 'marya3', NULL, NULL),
(153, 127, 2, 3000, 1, 'book2', NULL, NULL),
(154, 128, 3, 1000, 1, 'marya3', NULL, NULL),
(155, 129, 3, 1000, 1, 'marya3', NULL, NULL),
(156, 130, 2, 3000, 1, 'book2', NULL, NULL),
(157, 131, 2, 3000, 2, 'book2', NULL, NULL),
(158, 132, 2, 3000, 1, 'book2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `name_seller` varchar(255) NOT NULL,
  `order_sell` enum('Sell','Gift') NOT NULL DEFAULT 'Sell',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `name_seller`, `order_sell`, `created_at`, `updated_at`) VALUES
(1, '2025-05-19', 'marya', 'Sell', NULL, NULL),
(2, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(3, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(4, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(5, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(6, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(7, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(8, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(9, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(10, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(11, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(12, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(13, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(14, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(15, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(16, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(17, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(18, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(19, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(20, '2025-05-22', 'marya', 'Sell', NULL, NULL),
(21, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(22, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(23, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(24, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(25, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(26, '2025-05-30', 'marya', 'Sell', NULL, NULL),
(27, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(28, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(29, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(30, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(31, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(32, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(33, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(34, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(35, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(36, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(37, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(38, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(39, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(40, '2025-05-31', 'marya', 'Gift', NULL, NULL),
(41, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(42, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(43, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(44, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(45, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(46, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(47, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(48, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(49, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(50, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(51, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(52, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(53, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(54, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(55, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(56, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(57, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(58, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(59, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(60, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(61, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(62, '2025-05-31', 'marya', 'Gift', NULL, NULL),
(63, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(64, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(65, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(66, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(67, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(68, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(69, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(70, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(71, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(72, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(73, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(74, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(75, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(76, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(77, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(78, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(79, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(80, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(81, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(82, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(83, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(84, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(85, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(86, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(87, '2025-05-31', 'marya', 'Sell', NULL, NULL),
(88, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(89, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(90, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(91, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(92, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(93, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(94, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(95, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(96, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(97, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(98, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(99, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(100, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(101, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(102, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(103, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(104, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(105, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(106, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(107, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(108, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(109, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(110, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(111, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(112, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(113, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(114, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(115, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(116, '2025-06-01', 'marya', 'Sell', NULL, NULL),
(117, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(118, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(119, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(120, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(121, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(122, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(123, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(124, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(125, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(126, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(127, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(128, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(129, '2025-06-02', 'marya', 'Sell', NULL, NULL),
(130, '2025-06-03', 'marya', 'Sell', NULL, NULL),
(131, '2025-06-28', 'marya', 'Sell', NULL, NULL),
(132, '2025-06-30', 'marya', 'Sell', NULL, NULL);

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
-- Table structure for table `personals`
--

CREATE TABLE `personals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `peshangas`
--

CREATE TABLE `peshangas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodects`
--

CREATE TABLE `prodects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodects`
--

INSERT INTO `prodects` (`id`, `name`, `code`, `price`, `date`, `count`, `image`, `created_at`, `updated_at`) VALUES
(2, 'book2', 987, 3000, '2025-05-20', 99, 'uploads/profile/2025071120331539833077.jpg', NULL, '2025-06-30 13:00:03'),
(3, 'marya3', 89999, 1000, '2025-05-16', 90, 'uploads/profile/2025071120331818616119.jpg', NULL, '2025-06-02 20:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `reklams`
--

CREATE TABLE `reklams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `mangusal` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tebeni` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` enum('Manager','Accountant') NOT NULL DEFAULT 'Manager',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'marya', 'maryajabar63@gmail.com', NULL, '$2y$10$CyVUf7DWzRrOFgzYNwB2sukuo/F0BLv7kya90OV7rKR5L6XTqk792', 'Accountant', NULL, '2025-05-15 12:44:59', '2025-07-11 17:28:03'),
(3, 'marya', 'marya@gmail.com', NULL, '$2y$10$JyAwWIKhrdUavkpdtaBtSu95F5R5pPp8VjQUrDgW3xWS6aTvNDx/e', 'Manager', NULL, '2025-07-11 13:46:12', '2025-07-11 13:46:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balanses`
--
ALTER TABLE `balanses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeexpenses`
--
ALTER TABLE `employeeexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenbooks`
--
ALTER TABLE `expenbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `learnings`
--
ALTER TABLE `learnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muchdans`
--
ALTER TABLE `muchdans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `peshangas`
--
ALTER TABLE `peshangas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodects`
--
ALTER TABLE `prodects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodects_code_unique` (`code`);

--
-- Indexes for table `reklams`
--
ALTER TABLE `reklams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
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
-- AUTO_INCREMENT for table `balanses`
--
ALTER TABLE `balanses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeeexpenses`
--
ALTER TABLE `employeeexpenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenbooks`
--
ALTER TABLE `expenbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learnings`
--
ALTER TABLE `learnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `muchdans`
--
ALTER TABLE `muchdans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `personals`
--
ALTER TABLE `personals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peshangas`
--
ALTER TABLE `peshangas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodects`
--
ALTER TABLE `prodects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reklams`
--
ALTER TABLE `reklams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
