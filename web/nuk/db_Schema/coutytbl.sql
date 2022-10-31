-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2022 年 05 月 18 日 10:24
-- 伺服器版本: 5.5.57-MariaDB
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ncnuiot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coutytbl`
--

CREATE TABLE `coutytbl` (
  `cid` varchar(14) CHARACTER SET ascii NOT NULL COMMENT '縣市ID',
  `cname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '	縣市名稱'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coutytbl`
--

INSERT INTO `coutytbl` (`cid`, `cname`) VALUES
('01', '臺北市'),
('02', '臺中市'),
('03', '基隆市'),
('04', '臺南市'),
('05', '高雄市'),
('06', '新北市'),
('07', '宜蘭縣'),
('08', '桃園市'),
('09', '嘉義市'),
('10', '新竹縣'),
('11', '苗栗縣'),
('13', '南投縣'),
('14', '彰化縣'),
('15', '新竹市'),
('16', '雲林縣'),
('17', '嘉義縣'),
('20', '屏東縣'),
('21', '花蓮縣'),
('22', '臺東縣'),
('23', '澎湖縣'),
('99', '金門縣');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `coutytbl`
--
ALTER TABLE `coutytbl`
  ADD PRIMARY KEY (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
