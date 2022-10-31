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
-- 檢視表結構 `Vorder`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `Vorder`  AS SELECT `a`.`id` AS `id`, `a`.`orderdate` AS `orderdate`, `a`.`cusid` AS `cusid`, `a`.`rname` AS `rname`, `a`.`rphone` AS `rphone`, `a`.`raddress` AS `raddress`, `a`.`pay` AS `pay`, `a`.`state` AS `state`, `a`.`total` AS `total`, `a`.`tax` AS `tax`, `a`.`crtdatetime` AS `crtdatetime`, `b`.`cid` AS `cid`, `b`.`mid` AS `mid`, `b`.`sn` AS `sn`, `b`.`itemid` AS `itemid`, `b`.`price` AS `price`, `b`.`qty` AS `qty`, `b`.`subtotal` AS `subtotal`, `b`.`itemname` AS `itemname`, `b`.`typeid` AS `typeid`, `b`.`tname` AS `tname`, `b`.`iteminfo` AS `iteminfo`, `b`.`itempic` AS `itempic`, `b`.`stdprice` AS `stdprice`, `b`.`stock` AS `stock` FROM (`Vorderlist` `b` left join `orders` `a` on((`a`.`id` = `b`.`mid`)))  ;

--
-- VIEW `Vorder`
-- 資料： 無
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
