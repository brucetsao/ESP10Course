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
-- 資料表結構 `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int NOT NULL COMMENT '主鍵',
  `memberid` int NOT NULL COMMENT '會員編號',
  `num` char(18) NOT NULL COMMENT '信用卡卡號',
  `expiry_date` char(6) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '信用卡到期日',
  `security_code` char(3) DEFAULT NULL COMMENT '信用卡安全碼',
  `default` int DEFAULT '0' COMMENT '預設卡號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `memberid`, `num`, `expiry_date`, `security_code`, `default`) VALUES
(1, 1, '1111111111111111', '202301', NULL, 1),
(2, 1, '222222222222222', '202305', '123', 0),
(3, 1, '3333333333333333', '202305', '234', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ck` (`memberid`,`num`) USING BTREE;

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
