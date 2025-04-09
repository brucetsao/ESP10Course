-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-03-07 02:41:45
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
-- 資料庫: `fcu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `stock`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `datatime` char(8) CHARACTER SET ascii NOT NULL COMMENT '資料日期',
  `storedstock` int(11) NOT NULL COMMENT '集保總張數',
  `stockholder` int(11) NOT NULL COMMENT '總股東人數',
  `personavg` double NOT NULL COMMENT '總股東人數',
  `overfour` int(11) NOT NULL COMMENT '>400張大股東持有張數',
  `overfourpercent` double NOT NULL COMMENT '>400張大股東持有張數',
  `overfourstockholder` int(11) NOT NULL COMMENT '>400張大股東持有張數',
  `fourfive` int(11) NOT NULL COMMENT '400~600張人數',
  `sixeight` int(11) NOT NULL COMMENT '400~600張人數',
  `eightten` int(11) NOT NULL COMMENT '800~1000張人數',
  `overthousand` int(11) NOT NULL COMMENT '800~1000張人數',
  `overthousandstockholderp` double NOT NULL COMMENT '>1000張大股東持有百分比',
  `closingprice` double NOT NULL COMMENT '收盤價'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `stock`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `stock`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
