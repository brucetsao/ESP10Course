-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 26 日 03:11
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
-- 資料庫: `abc_movie`
--

-- --------------------------------------------------------

--
-- 資料表結構 `gradetype`
--

CREATE TABLE `gradetype` (
  `gid` char(2) NOT NULL COMMENT '主鍵',
  `gname` char(30) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '電影分級',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `gradetype`
--

INSERT INTO `gradetype` (`gid`, `gname`, `crtdatetime`) VALUES
('01', '普通級', '2022-07-26 03:05:32'),
('02', '輔導級', '2022-07-26 03:05:44');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `gradetype`
--
ALTER TABLE `gradetype`
  ADD PRIMARY KEY (`gid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
