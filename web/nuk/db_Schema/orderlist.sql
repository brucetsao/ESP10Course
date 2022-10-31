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
-- 資料表結構 `orderlist`
--

CREATE TABLE `orderlist` (
  `cid` int NOT NULL COMMENT '主鍵',
  `mid` int NOT NULL COMMENT '訂單主檔id',
  `sn` int NOT NULL COMMENT '明細序號',
  `itemid` int NOT NULL COMMENT '產品料號(itemID)',
  `price` int NOT NULL COMMENT '產品售價',
  `qty` int NOT NULL COMMENT '產品數量',
  `subtotal` int NOT NULL COMMENT '金額'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `orderlist`
--

INSERT INTO `orderlist` (`cid`, `mid`, `sn`, `itemid`, `price`, `qty`, `subtotal`) VALUES
(1, 1, 1, 1, 400, 5, 200),
(2, 2, 1, 1, 70, 5, 350),
(3, 2, 2, 2, 120, 8, 960),
(4, 3, 1, 1, 70, 5, 350),
(5, 3, 2, 2, 120, 8, 960),
(6, 4, 1, 1, 70, 4, 280),
(7, 4, 2, 2, 120, 5, 600),
(8, 4, 3, 1, 70, 5, 350);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `ck` (`mid`,`sn`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
