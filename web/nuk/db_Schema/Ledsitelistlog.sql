-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 27 日 07:17
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
-- 資料表結構 `Ledsitelistlog`
--

CREATE TABLE `Ledsitelistlog` (
  `id` int NOT NULL COMMENT '主鍵',
  `year` char(4) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '年度',
  `siteid` int NOT NULL COMMENT '光明燈ID',
  `no` char(3) NOT NULL COMMENT '座號',
  `donater` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '點燈施主',
  `dbirthday` date DEFAULT NULL COMMENT '點燈施主生日',
  `dueday` date DEFAULT NULL COMMENT '點燈到期日',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Ledsitelistlog`
--
ALTER TABLE `Ledsitelistlog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no` (`year`,`siteid`,`no`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Ledsitelistlog`
--
ALTER TABLE `Ledsitelistlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
