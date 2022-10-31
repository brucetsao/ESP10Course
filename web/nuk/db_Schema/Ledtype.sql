-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 27 日 01:26
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
-- 資料表結構 `Ledtype`
--

CREATE TABLE `Ledtype` (
  `id` char(2) NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '燈種名稱',
  `price` int NOT NULL COMMENT '燈種價格',
  `content` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '燈種說明',
  `location` char(2) NOT NULL COMMENT '所在位址代號',
  `working` int NOT NULL COMMENT '運行中燈數',
  `maxled` int NOT NULL COMMENT '最大燈數',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `Ledtype`
--

INSERT INTO `Ledtype` (`id`, `name`, `price`, `content`, `location`, `working`, `maxled`, `updtime`) VALUES
('01', '光明燈A', 300, '元辰光彩.前途光明', '01', 10, 500, '2022-07-15 06:45:28'),
('02', '太歲燈A', 200, '消災解厄.平安吉祥，此項無點燈', '05', 3, 600, '2022-07-15 06:57:33'),
('03', '文昌燈', 500, '學業精進.仕途順遂', '06', 1, 50, '2022-07-15 06:57:24'),
('04', '財神燈', 500, '財利廣進.迎祥納福', '07', 1, 500, '2022-07-15 06:57:18'),
('05', '華陀燈', 500, '護佑身心.永保安康', '09', 3, 66, '2022-07-15 06:57:11'),
('06', '姻緣燈', 500, '天賜良緣.生活美滿', '08', 9, 99, '2022-07-15 06:57:07'),
('11', '光明燈B', 500, '元辰光彩.前途光明', '01', 60, 900, '2022-07-15 06:51:34'),
('12', '太歲燈B', 300, '消災解厄.平安吉祥', '05', 3, 99, '2022-07-15 06:55:05'),
('21', '光明燈C', 1000, '元辰光彩.前途光明', '01', 99, 9999, '2022-07-15 06:51:56'),
('22', '太歲燈C', 500, '消災解厄.平安吉祥', '05', 1, 7, '2022-07-15 06:56:56'),
('93', '文昌斗', 3600, '學業精進.仕途順遂', '06', 20, 200, '2022-07-15 07:02:24'),
('94', '財神斗', 3600, '財利廣進.迎祥納福，安斗為同戶10人內安奉', '07', 20, 200, '2022-07-15 07:03:15'),
('95', '華陀斗', 3600, '護佑身心.永保安康，安斗為同戶10人內安奉', '09', 20, 200, '2022-07-15 07:02:16');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Ledtype`
--
ALTER TABLE `Ledtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`location`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `Ledtype`
--
ALTER TABLE `Ledtype`
  ADD CONSTRAINT `Ledtype_ibfk_1` FOREIGN KEY (`location`) REFERENCES `Temple` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
