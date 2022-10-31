-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 06 月 14 日 03:09
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
-- 資料表結構 `logtype`
--

CREATE TABLE `logtype` (
  `typeid` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '主鍵與類別',
  `typename` char(100) NOT NULL COMMENT '登錄型態內容',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'crtdatetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `logtype`
--

INSERT INTO `logtype` (`typeid`, `typename`, `crtdatetime`) VALUES
('00', '不知名登錄失敗', '2022-06-01 07:21:55'),
('01', '登入系統成功', '2022-06-01 07:23:20'),
('09', '登出系統', '2022-06-01 07:23:26');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `logtype`
--
ALTER TABLE `logtype`
  ADD PRIMARY KEY (`typeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
