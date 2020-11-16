-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-16 01:24:39
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `invoice`
--

-- --------------------------------------------------------

--
-- 資料表結構 `award_numbers`
--

CREATE TABLE `award_numbers` (
  `id` int(11) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `period` tinyint(1) NOT NULL,
  `number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `award_numbers`
--

INSERT INTO `award_numbers` (`id`, `year`, `period`, `number`, `type`) VALUES
(8, 2020, 4, '13362795', 1),
(9, 2020, 4, '27580166', 2),
(10, 2020, 4, '53227282', 3),
(11, 2020, 4, '35082085', 3),
(12, 2020, 4, '37175928', 3),
(13, 2020, 4, '987', 4),
(14, 2020, 4, '614', 4),
(15, 2020, 3, '03016191', 1),
(16, 2020, 3, '62474899', 2),
(17, 2020, 3, '33657726', 3),
(18, 2020, 3, '06142620', 3),
(19, 2020, 3, '66429962', 3),
(20, 2020, 3, '790', 4),
(21, 2020, 1, '12620024', 1),
(22, 2020, 1, '39793895', 2),
(23, 2020, 1, '67913945', 3),
(24, 2020, 1, '09954061', 3),
(25, 2020, 1, '54574947', 3),
(26, 2020, 1, '007', 4),
(27, 2020, 2, '91911374', 1),
(28, 2020, 2, '08501338', 2),
(29, 2020, 2, '57161318', 3),
(30, 2020, 2, '23570653', 3),
(31, 2020, 2, '47332279', 3),
(32, 2020, 2, '519', 4),
(40, 2021, 1, '36985478', 1),
(41, 2021, 1, '45632147', 2),
(42, 2021, 1, '45698523', 3),
(43, 2021, 1, '21478569', 3),
(44, 2021, 1, '12365478', 3),
(45, 2021, 1, '369', 4),
(46, 2021, 1, '741', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` tinyint(1) UNSIGNED NOT NULL,
  `payment` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `number`, `period`, `payment`, `date`, `create_time`) VALUES
(1, 'sf', '13698547', 3, 150, '2020-11-09', '2020-11-13 03:14:13'),
(2, 'da', '00995588', 6, 120, '2020-11-01', '2020-11-12 07:55:17'),
(4, 'th', '15462164', 3, 130, '2020-11-03', '2020-11-13 05:03:21');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `award_numbers`
--
ALTER TABLE `award_numbers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `award_numbers`
--
ALTER TABLE `award_numbers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
