-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:52
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
-- 檢視表結構 `Vcreditcard`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `Vcreditcard`  AS SELECT `a`.`id` AS `id`, `a`.`account` AS `account`, `a`.`pwd` AS `pwd`, `a`.`name` AS `name`, `a`.`ename` AS `ename`, `a`.`address` AS `address`, `a`.`phone` AS `phone`, `a`.`tel` AS `tel`, `a`.`email` AS `email`, `a`.`invoice_carrie` AS `invoice_carrie`, `b`.`id` AS `cid`, `b`.`num` AS `cardnumber`, `b`.`expiry_date` AS `expiry_date`, `b`.`default` AS `sel` FROM (`credit_cards` `b` left join `members` `a` on((`a`.`id` = `b`.`memberid`)))  ;

--
-- VIEW `Vcreditcard`
-- 資料： 無
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
