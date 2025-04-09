-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 27 日 01:51
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
-- 資料表結構 `Gods`
--

CREATE TABLE `Gods` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '神明尊稱',
  `location` char(2) NOT NULL COMMENT '所在神殿ID',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `Gods`
--

INSERT INTO `Gods` (`id`, `name`, `location`, `crdtime`) VALUES
(1, '媽祖', '01', '2022-07-14 08:26:09'),
(2, '聖父母', '02', '2022-07-15 07:09:49'),
(3, '玄天上帝', '03', '2022-07-15 07:10:05'),
(4, '關聖帝君', '04', '2022-07-15 07:10:56'),
(5, '福德正神', '02', '2022-07-15 07:11:07'),
(6, '太歲星君', '05', '2022-07-15 07:13:28');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Gods`
--
ALTER TABLE `Gods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`location`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Gods`
--
ALTER TABLE `Gods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
