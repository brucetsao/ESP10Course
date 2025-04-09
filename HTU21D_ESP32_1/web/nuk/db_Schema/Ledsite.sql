-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 27 日 01:51
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
-- 資料庫: `LC`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Ledsite`
--

CREATE TABLE `Ledsite` (
  `id` int NOT NULL COMMENT '主鍵',
  `ledname` char(120) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '光明燈名稱',
  `ledtype` char(2) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL COMMENT '光明燈類別',
  `godtype` int NOT NULL COMMENT '供奉神明',
  `level` int NOT NULL COMMENT '層數',
  `amount` int NOT NULL COMMENT '光明燈數量',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `Ledsite`
--

INSERT INTO `Ledsite` (`id`, `ledname`, `ledtype`, `godtype`, `level`, `amount`, `crtdatetime`) VALUES
(1, '1-1柱', '01', 1, 20, 200, '2022-07-27 01:41:05'),
(2, '7-4柱', '11', 3, 34, 500, '2022-07-27 01:41:05');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Ledsite`
--
ALTER TABLE `Ledsite`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Ledsite`
--
ALTER TABLE `Ledsite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
