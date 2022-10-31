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
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL COMMENT '主鍵',
  `productno` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '產品編號',
  `name` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `ename` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '產品英文名稱',
  `maker` char(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '製造者',
  `price` float NOT NULL COMMENT '價格',
  `unit` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '單位代碼',
  `weight` int NOT NULL COMMENT '重量',
  `package` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '包裝代碼',
  `ps` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci COMMENT '備註',
  `systemtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `productno`, `name`, `ename`, `maker`, `price`, `unit`, `weight`, `package`, `ps`, `systemtime`) VALUES
(1, 'APPLE01', '蘋果手機', 'IPHONE 12', '蘋果公司', 20000, '01', 300, '01', '', '2022-06-15 05:20:35'),
(2, 'aa', '22', '33', '44', 55, '', 66, '', '', '2022-06-15 05:42:45'),
(3, 'aa', 'sds', 'aa', 'aa', 0, '', 0, '', '', '2022-06-15 05:44:26'),
(4, 'aa', 'dd', 'f', 'ff', 0, '02', 0, '02', '', '2022-06-15 05:45:30'),
(5, '', '', '', '', 0, '', 0, '', '', '2022-06-15 05:46:33'),
(6, 'aaa', 'bbb', 'ccc', 'ddd', 0, '02', 0, '02', '', '2022-06-15 05:47:03'),
(7, '', '', '', '', 0, '', 0, '', NULL, '2022-06-15 06:34:00'),
(8, '1', '1', '11', '1', 1, '02', 1, '02', '', '2022-06-15 06:34:49'),
(9, 'aaaaa', 'bbb', '', 'ccc', 2000, '02', 0, '02', '', '2022-06-15 06:43:07'),
(10, 'aaa', 'aaaa', 'aaa', 'aaaaa', 3452, '02', 3452, '02', '', '2022-06-15 06:48:19'),
(11, '123', '123', '123', '123', 123, '02', 123, '02', '', '2022-06-15 07:23:38'),
(12, '123', '123', '123', '123', 123, '02', 123, '02', '', '2022-06-15 07:23:58');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
