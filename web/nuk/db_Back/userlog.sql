-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 06 月 14 日 03:09
-- 伺服器版本： 8.0.29
-- PHP 版本： 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `fcu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userlog`
--

CREATE TABLE `userlog` (
  `id` int NOT NULL COMMENT '主鍵',
  `userid` int NOT NULL COMMENT '使用者主鍵',
  `type` char(2) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT 'Login型態',
  `logindatetime` char(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '登錄日期時間',
  `fromip` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '使用者來源IP',
  `op` char(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者動作內容',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '自動帶入時間戳記'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `userlog`
--

INSERT INTO `userlog` (`id`, `userid`, `type`, `logindatetime`, `fromip`, `op`, `crtdatetime`) VALUES
(1, -1, '00', '20220531031701', '140.134.18.40', 'login web system fail', '2022-05-31 03:17:01'),
(2, -1, '00', '20220531031709', '140.134.18.40', 'login web system fail', '2022-05-31 03:17:09'),
(3, 1, '01', '20220531031749', '140.134.18.40', 'login web system successful', '2022-05-31 03:17:49'),
(4, 1, '01', '20220531032833', '140.134.18.54', 'login web system successful', '2022-05-31 03:28:33'),
(5, 1, '01', '20220531033159', '140.134.18.54', 'login web system successful', '2022-05-31 03:31:59'),
(6, 0, '09', '20220531034420', '140.134.18.54', 'login out from web system successful', '2022-05-31 03:44:20'),
(7, 0, '09', '20220531034518', '140.134.18.54', 'login out from web system successful', '2022-05-31 03:45:18'),
(8, 1, '01', '20220531035218', '140.134.18.54', 'login web system successful', '2022-05-31 03:52:18'),
(9, 0, '09', '20220531035222', '140.134.18.54', 'login out from web system successful', '2022-05-31 03:52:22'),
(10, -1, '00', '20220531140449', '219.86.8.124', 'login web system fail', '2022-05-31 14:04:49'),
(11, 0, '09', '20220531142610', '125.231.113.205', 'login out from web system successful', '2022-05-31 14:26:10'),
(12, 0, '09', '20220531142629', '125.231.113.205', 'login out from web system successful', '2022-05-31 14:26:29'),
(13, 0, '09', '20220531142704', '125.231.113.205', 'login out from web system successful', '2022-05-31 14:27:04'),
(14, 0, '09', '20220531142733', '125.231.113.205', 'login out from web system successful', '2022-05-31 14:27:33'),
(15, 1, '00', '', '10.21.12.89', 'aaaa', '2022-06-08 07:22:32');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=16;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`type`) REFERENCES `logtype` (`typeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
