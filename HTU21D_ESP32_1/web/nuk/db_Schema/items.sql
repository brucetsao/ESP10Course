-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 02 日 02:28
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
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `id` int NOT NULL COMMENT '商品編號',
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `price` int NOT NULL COMMENT '商品價格',
  `type` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '商品類別',
  `info` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品資訊',
  `pic` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品圖片',
  `stock` int NOT NULL COMMENT '商品庫存'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `type`, `info`, `pic`, `stock`) VALUES
(1, '古早招牌肉圓', 70, '01', 'AAA', '01.jpg', 300),
(2, '比臉大肉圓', 120, '11', '比臉大肉圓', '03.jpg', 300);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '商品編號', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
