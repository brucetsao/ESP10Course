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
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int NOT NULL COMMENT '主鍵',
  `username` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '帳號名稱',
  `name` char(25) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '名字',
  `sex` tinyint NOT NULL COMMENT '性別',
  `diploma` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '學歷'
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `username`, `name`, `sex`, `diploma`) VALUES
(1, 'burce', '曹永忠', 1, '22');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
