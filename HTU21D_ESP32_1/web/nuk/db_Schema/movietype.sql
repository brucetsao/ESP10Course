-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:58
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
-- 資料表結構 `movietype`
--

CREATE TABLE `movietype` (
  `id` int NOT NULL COMMENT '主鍵',
  `mtype` char(28) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '電影類型	',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `movietype`
--

INSERT INTO `movietype` (`id`, `mtype`, `crtdatetime`) VALUES
(1, '愛情片', '2022-07-26 03:04:25'),
(2, '文藝片', '2022-07-26 03:04:25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movietype`
--
ALTER TABLE `movietype`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movietype`
--
ALTER TABLE `movietype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
