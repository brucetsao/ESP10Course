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
-- 資料表結構 `item_type`
--

CREATE TABLE `item_type` (
  `item_id` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '種類名稱',
  `price` int NOT NULL COMMENT '種類定價',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `item_type`
--

INSERT INTO `item_type` (`item_id`, `name`, `price`, `crtdatetime`) VALUES
('01', '招牌肉圓', 60, '2022-07-28 06:14:20'),
('11', '豬肉肉圓', 50, '2022-07-28 06:14:59'),
('21', '牛肉肉圓', 90, '2022-07-28 06:15:24'),
('31', '蝦仁肉圓', 80, '2022-07-28 06:15:46'),
('41', '香菇肉圓', 55, '2022-07-28 06:16:14');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
