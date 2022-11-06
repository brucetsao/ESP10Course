-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:57
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
-- 資料表結構 `memberdiploma`
--

CREATE TABLE `memberdiploma` (
  `id` int NOT NULL COMMENT '主鍵',
  `memberid` int NOT NULL COMMENT '會員編號',
  `diplomatype` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '學歷種類',
  `name` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '學校名稱',
  `graduated` int NOT NULL DEFAULT '1' COMMENT '是否畢業',
  `national` int NOT NULL DEFAULT '1' COMMENT '國立/私立',
  `global` int NOT NULL DEFAULT '0' COMMENT '是否為國外學歷',
  `strdate` char(6) NOT NULL COMMENT '開始年月',
  `strend` char(6) NOT NULL COMMENT '結束年月',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `memberdiploma`
--
ALTER TABLE `memberdiploma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s1` (`memberid`,`diplomatype`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `memberdiploma`
--
ALTER TABLE `memberdiploma`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
