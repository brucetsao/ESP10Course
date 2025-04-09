-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:55
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
-- 檢視表結構 `VLedsite`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VLedsite`  AS SELECT `a`.`id` AS `id`, `a`.`ledname` AS `ledname`, `a`.`ledtype` AS `ledtype`, `a`.`godtype` AS `godtype`, `a`.`level` AS `level`, `a`.`amount` AS `amount`, `a`.`crtdatetime` AS `crtdatetime`, `b`.`name` AS `lname`, `b`.`price` AS `price`, `b`.`content` AS `content`, `b`.`locname` AS `locname`, `c`.`name` AS `gname`, `c`.`Glocname` AS `glocname` FROM ((`Ledsite` `a` left join `VLedtype` `b` on((`a`.`ledtype` = `b`.`id`))) left join `VGods` `c` on((`a`.`godtype` = `c`.`id`)))  ;

--
-- VIEW `VLedsite`
-- 資料： 無
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
