-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 05 月 18 日 02:57
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
-- 資料表結構 `diplomatype`
--

CREATE TABLE `diplomatype` (
  `id` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '學歷代碼',
  `degree` char(30) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '學歷名稱',
  `degreeename` char(40) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '學歷英文名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `diplomatype`
--

INSERT INTO `diplomatype` (`id`, `degree`, `degreeename`) VALUES
('01', '不識字', ''),
('02', '國小', ''),
('03', '國中', ''),
('04', '高中', ''),
('05', '高職', ''),
('06', '五專', ''),
('07', '三專', ''),
('08', '二專', ''),
('21', '大學', ''),
('22', '夜間部大學(進修推廣部)', ''),
('23', '國立大學', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `diplomatype`
--
ALTER TABLE `diplomatype`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
