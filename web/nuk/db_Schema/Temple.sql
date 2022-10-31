-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 07 月 27 日 01:52
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
-- 資料庫: `LC`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Temple`
--

CREATE TABLE `Temple` (
  `id` char(2) NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '宮殿名稱',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `Temple`
--

INSERT INTO `Temple` (`id`, `name`, `crdtime`) VALUES
('01', '一樓正殿媽祖殿', '2022-07-15 06:07:21'),
('02', '一樓後殿聖父母殿', '2022-07-15 06:18:32'),
('03', '一樓後殿玄天上帝龍爿廳', '2022-07-15 06:21:03'),
('04', '一樓後殿關聖帝君虎爿廳', '2022-07-15 06:21:14'),
('05', '一樓太歲殿虎爿護龍廳', '2022-07-15 06:22:15'),
('06', '龍爿二樓護龍第一殿文昌殿', '2022-07-15 06:22:46'),
('07', '龍爿二樓護龍第二殿財神殿', '2022-07-15 06:23:12'),
('08', '龍爿二樓護龍第三殿月老殿', '2022-07-15 06:23:32'),
('09', '龍爿二樓護龍第四殿華陀殿', '2022-07-15 06:24:28'),
('10', '二樓主殿玉皇上帝及三官大帝殿', '2022-07-15 06:26:03'),
('11', '二樓觀音菩薩龍爿廳', '2022-07-15 06:25:24'),
('12', '二樓註生娘娘虎爿廳', '2022-07-15 06:26:24');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Temple`
--
ALTER TABLE `Temple`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
