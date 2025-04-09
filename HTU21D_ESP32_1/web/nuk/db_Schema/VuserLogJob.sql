-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:56
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
-- 檢視表結構 `VuserLogJob`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VuserLogJob`  AS SELECT `a`.`id` AS `id`, `a`.`userid` AS `userid`, `b`.`account` AS `account`, `b`.`name` AS `username`, `b`.`password` AS `password`, `b`.`sex` AS `sex`, `b`.`birthday` AS `birthday`, `b`.`telephone` AS `telephone`, `b`.`cellphone` AS `cellphone`, `b`.`address` AS `address`, `b`.`email` AS `email`, `b`.`url` AS `url`, `b`.`comment` AS `comment`, `a`.`type` AS `logtypeid`, `c`.`typename` AS `logtypename`, `a`.`logindatetime` AS `logindatetime`, `a`.`fromip` AS `ip`, `a`.`op` AS `job` FROM ((`userlog` `a` left join `users` `b` on((`a`.`userid` = `b`.`id`))) join `logtype` `c`) WHERE (`a`.`type` = `c`.`typeid`)  ;

--
-- VIEW `VuserLogJob`
-- 資料： 無
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
