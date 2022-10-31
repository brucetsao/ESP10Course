-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:59
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
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `book_no` char(12) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL DEFAULT '',
  `book_name` char(120) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `price` int NOT NULL DEFAULT '0',
  `stock` int NOT NULL COMMENT '庫存'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`book_no`, `book_name`, `price`, `stock`) VALUES
('EE0018', '最新計算機概論', 560, 20),
('EE0069', '網路概論', 550, 30),
('EL0063', 'ASP.NET網頁程式設計', 580, 40),
('EN0010', 'HTML5網頁程式設計', 500, 10),
('P766', 'PHP&MySQL網站開發', 580, 33),
('P816', 'Python程式設計', 500, 22),
('P818', 'Visual C#程式設計', 500, 46);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`book_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
