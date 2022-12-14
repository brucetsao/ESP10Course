-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-10-19 14:14:34
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `nukiot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product01`
--

CREATE TABLE `product01` (
  `id` int(11) NOT NULL COMMENT '主鍵',
  `name` char(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `classification` char(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品分類',
  `price` int(11) NOT NULL COMMENT '販售單價',
  `cost` int(11) NOT NULL COMMENT '購入成本',
  `keyindate` date NOT NULL COMMENT '登錄日期',
  `crtdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '資料創立日期時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product01`
--
ALTER TABLE `product01`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product01`
--
ALTER TABLE `product01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主鍵';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
