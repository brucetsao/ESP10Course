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
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `orderdate` date NOT NULL COMMENT '訂單日期',
  `cusid` int NOT NULL COMMENT '客戶id',
  `rname` char(120) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '收貨人名稱',
  `rphone` char(20) DEFAULT NULL COMMENT '收貨人電話',
  `raddress` char(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '收貨人地址',
  `pay` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '付款方式(代碼表)',
  `state` int NOT NULL COMMENT '狀態',
  `total` int NOT NULL COMMENT '未稅金額',
  `tax` int NOT NULL COMMENT '稅金',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '資料產生時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`id`, `orderdate`, `cusid`, `rname`, `rphone`, `raddress`, `pay`, `state`, `total`, `tax`, `crtdatetime`) VALUES
(1, '2022-08-01', 1, '曹永忠', '11111111', '407臺中市西屯區文華路100號', '01', 1, 880, 44, '2022-08-01 05:35:54'),
(2, '2022-08-01', 1, '曹永忠', '11111111', '407臺中市西屯區文華路100號', '01', 1, 1310, 66, '2022-08-01 06:00:23'),
(3, '2022-08-01', 1, '曹永忠', '11111111', '407臺中市西屯區文華路100號', '01', 1, 1310, 66, '2022-08-01 06:03:40'),
(4, '2022-08-01', 1, '曹永忠', '11111111', '407臺中市西屯區文華路100號', '01', 1, 1230, 62, '2022-08-01 06:15:58');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
