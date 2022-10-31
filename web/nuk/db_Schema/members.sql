-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 28 日 05:42
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
-- 資料庫: `meatball`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL COMMENT '主鍵',
  `account` char(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL COMMENT '會員帳號',
  `pwd` char(20) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL COMMENT '會員密碼',
  `name` char(30) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '會員姓名',
  `ename` char(60) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '英文名字',
  `address` char(120) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '會員地址',
  `phone` char(14) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '會員手機號碼',
  `tel` char(14) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '會員市內電話',
  `email` varchar(100) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '會員電子信箱',
  `invoice_carrie` char(12) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '電子載具'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `account`, `pwd`, `name`, `ename`, `address`, `phone`, `tel`, `email`, `invoice_carrie`) VALUES
(1, 'brucetsao', '12345678', '曹永忠', NULL, '407臺中市西屯區文華路100號', '11111111', '22222222', 'aaa.cc@fcu.edu.tw', '/AABBCCD');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
