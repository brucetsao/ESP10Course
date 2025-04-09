-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 03:57
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
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `mid` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '電影ID',
  `schedule` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '檔期',
  `director` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '導演',
  `duration` int NOT NULL COMMENT '時長',
  `actor` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '演員',
  `lang` int DEFAULT NULL,
  `mName` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '電影名稱',
  `movietype` int DEFAULT NULL COMMENT '電影類型',
  `introduction` text CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL COMMENT '介紹',
  `playstartdate` date NOT NULL COMMENT '放映日期',
  `grading` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '電影分級'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`mid`, `schedule`, `director`, `duration`, `actor`, `lang`, `mName`, `movietype`, `introduction`, `playstartdate`, `grading`) VALUES
('0001', '02', '山姆萊米', 150, '班奈狄克·康柏拜區', 1, '奇異博士2 瘋狂多元宇宙', 1, '好看', '2022-05-01', '01'),
('004', '02', '卡普空', 90, '自取其辱', 1, '魔物獵人崛起', 1, 'ㄏ勝', '2022-07-15', '01'),
('006', '02', '塔伊加·維迪提', 90, '克里斯·漢斯沃', 1, '雷神索爾：愛與雷霆', 1, '好看', '2022-07-15', '01'),
('aaaab', '02', 'bbbbb', 100, 'eeee', 1, 'rrrr', 1, 'gggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\ngggggggggggggg\r\n', '2022-07-01', '01');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
