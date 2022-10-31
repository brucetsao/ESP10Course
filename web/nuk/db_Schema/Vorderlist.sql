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
-- 檢視表結構 `Vorderlist`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `Vorderlist`  AS SELECT `a`.`cid` AS `cid`, `a`.`mid` AS `mid`, `a`.`sn` AS `sn`, `a`.`itemid` AS `itemid`, `a`.`price` AS `price`, `a`.`qty` AS `qty`, `a`.`subtotal` AS `subtotal`, `b`.`name` AS `itemname`, `b`.`type` AS `typeid`, `b`.`tname` AS `tname`, `b`.`info` AS `iteminfo`, `b`.`pic` AS `itempic`, `b`.`price` AS `stdprice`, `b`.`stock` AS `stock` FROM (`orderlist` `a` left join `Vitems` `b` on((`a`.`itemid` = `b`.`id`)))  ;

--
-- VIEW `Vorderlist`
-- 資料： 無
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
