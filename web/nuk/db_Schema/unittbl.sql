-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 06 月 15 日 03:20
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
-- 資料表結構 `unittbl`
--

CREATE TABLE `unittbl` (
  `unitid` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '單位代碼',
  `unitname` char(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '單位名稱',
  `sysdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `unittbl`
--

INSERT INTO `unittbl` (`unitid`, `unitname`, `sysdatetime`) VALUES
('01', '個', '2022-06-15 03:15:54'),
('02', '件', '2022-06-15 03:16:14'),
('11', '雙個包', '2022-06-15 03:16:43'),
('12', '半打裝', '2022-06-15 03:17:04'),
('16', '打', '2022-06-15 03:19:04');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `unittbl`
--
ALTER TABLE `unittbl`
  ADD PRIMARY KEY (`unitid`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
