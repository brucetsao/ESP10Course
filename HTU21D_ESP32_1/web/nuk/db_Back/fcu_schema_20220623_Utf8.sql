-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 06 月 23 日 03:24
-- 伺服器版本： 8.0.29
-- PHP 版本： 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `fcu`
--

-- --------------------------------------------------------

--
-- 資料表結構 `aa`
--

CREATE TABLE `aa` (
  `id` int NOT NULL COMMENT 'id',
  `name` char(30) NOT NULL COMMENT 'name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `bb`
--

CREATE TABLE `bb` (
  `id` int NOT NULL COMMENT 'id',
  `name` char(30) NOT NULL COMMENT 'name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `colortbl`
--

CREATE TABLE `colortbl` (
  `id` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '顏色代碼',
  `colorname` char(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '顏色名稱',
  `colorindex` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '色卡',
  `colorimg` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '色卡圖片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `coutytbl`
--

CREATE TABLE `coutytbl` (
  `cid` varchar(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '縣市ID',
  `cname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '	縣市名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `cwbsite`
--

CREATE TABLE `cwbsite` (
  `id` int NOT NULL DEFAULT '0' COMMENT '主鍵',
  `dataorder` varchar(14) NOT NULL COMMENT '時間維度',
  `sysdatetime` timestamp NOT NULL EFAULT CURRENT_TIMESTAMP COMMENT '資料更新時間',
  `sid` varchar(20) NOT NULL COMMENT '站台ID',
  `sname` varchar(60) DEFAULT NULL COMMENT '站台名稱',
  `sdatetime` datetime NOT NULL COMMENT '資料時間',
  `lat` double NOT NULL COMMENT '緯度',
  `lon` double NOT NULL COMMENT '經度',
  `hight` int NOT NULL COMMENT '海拔',
  `wdir` int NOT NULL COMMENT '風向',
  `wspeed` int NOT NULL COMMENT '風速',
  `temp` double NOT NULL COMMENT '溫度',
  `humid` double NOT NULL COMMENT '濕度',
  `bar` double NOT NULL COMMENT '氣壓',
  `rain` double NOT NULL COMMENT '雨量',
  `cid` varchar(14) NOT NULL COMMENT '縣市ID',
  `cname` varchar(40) DEFAULT NULL COMMENT '縣市名稱',
  `tid` varchar(14) NOT NULL COMMENT '鄉鎮ID',
  `tname` varchar(60) DEFAULT NULL COMMENT '鄉鎮名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `dhtData`
--

CREATE TABLE `dhtData` (
  `id` int NOT NULL COMMENT '主鍵',
  `MAC` char(12) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '裝置MAC值',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料輸入時間',
  `temperature` float NOT NULL COMMENT '溫度',
  `humidity` float NOT NULL COMMENT '濕度',
  `humid` char(10) DEFAULT NULL COMMENT '濕度文字',
  `systime` char(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '使用者更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `diplomatype`
--

CREATE TABLE `diplomatype` (
  `id` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '學歷代碼',
  `degree` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '學歷名稱',
  `degreeename` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '學歷英文名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `environment`
--

CREATE TABLE `environment` (
  `id` int NOT NULL COMMENT '主鍵',
  `dataorder` varchar(14) NOT NULL COMMENT '時間維度',
  `sysdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料更新時間',
  `sid` varchar(20) NOT NULL COMMENT '站台ID',
  `sname` varchar(60) DEFAULT NULL COMMENT '站台名稱',
  `sdatetime` datetime NOT NULL COMMENT '資料時間',
  `lat` double NOT NULL COMMENT '緯度',
  `lon` double NOT NULL COMMENT '經度',
  `hight` int NOT NULL COMMENT '海拔',
  `wdir` int NOT NULL COMMENT '風向',
  `wspeed` int NOT NULL COMMENT '風速',
  `temp` double NOT NULL COMMENT '溫度',
  `humid` double NOT NULL COMMENT '濕度',
  `bar` double NOT NULL COMMENT '氣壓',
  `rain` double NOT NULL COMMENT '雨量',
  `cid` varchar(14) NOT NULL COMMENT '縣市ID',
  `cname` varchar(40) DEFAULT NULL COMMENT '縣市名稱',
  `tid` varchar(14) NOT NULL COMMENT '鄉鎮ID',
  `tname` varchar(60) DEFAULT NULL COMMENT '鄉鎮名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `logtype`
--

CREATE TABLE `logtype` (
  `typeid` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '主鍵與類別',
  `typename` char(100) NOT NULL COMMENT '登錄型態內容',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'crtdatetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int NOT NULL COMMENT '主鍵',
  `username` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '帳號名稱',
  `name` char(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '名字',
  `sex` tinyint NOT NULL COMMENT '性別',
  `diploma` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '學歷'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `packagetbl`
--

CREATE TABLE `packagetbl` (
  `packageid` char(2) NOT NULL COMMENT '主鍵',
  `packagename` char(26) NOT NULL COMMENT '包裝',
  `sysdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL COMMENT '主鍵',
  `productno` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '產品編號',
  `name` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `ename` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '產品英文名稱',
  `maker` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '製造者',
  `price` float NOT NULL COMMENT '價格',
  `unit` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '單位代碼',
  `weight` int NOT NULL COMMENT '重量',
  `package` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '包裝代碼',
  `ps` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '備註',
  `systemtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `sextype`
--

CREATE TABLE `sextype` (
  `id` tinyint NOT NULL COMMENT '主鍵',
  `sextypename` char(10) NOT NULL COMMENT '中文性別',
  `sextypeename` char(20) NOT NULL COMMENT '英文性別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `stuff`
--

CREATE TABLE `stuff` (
  `id` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '內餡代碼',
  `stuff` char(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '內餡名稱',
  `meat` char(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '內餡肉種',
  `weight` double NOT NULL COMMENT '內餡標準重量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `towntbl`
--

CREATE TABLE `towntbl` (
  `tid` varchar(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '鄉鎮ID',
  `tname` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '鄉鎮名稱',
  `cid` varchar(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '縣市ID',
  `cname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '縣市名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `unittbl`
--

CREATE TABLE `unittbl` (
  `unitid` char(2) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '單位代碼',
  `unitname` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '單位名稱',
  `sysdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL COMMENT '主鍵',
  `user` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '帳號名稱',
  `username` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者名稱',
  `pwd` char(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '密碼',
  `email` char(200) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT '電子郵件',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `userlog`
--

CREATE TABLE `userlog` (
  `id` int NOT NULL COMMENT '主鍵',
  `userid` int NOT NULL COMMENT '使用者主鍵',
  `type` char(2) CHARACTER SET ascii COLLATE ascii_general_ci DEFAULT NULL COMMENT 'Login型態',
  `logindatetime` char(14) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '登錄日期時間',
  `fromip` char(16) CHARACTER SET ascii COLLATE ascii_general_ci NOT NULL COMMENT '使用者來源IP',
  `op` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '使用者動作內容',
  `crtdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '自動帶入時間戳記'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT '主鍵',
  `account` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '登錄帳號',
  `password` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '登錄密碼',
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '名字',
  `sex` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '性別',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `year` tinyint DEFAULT '0' COMMENT '生日(年)',
  `month` tinyint DEFAULT '0' COMMENT '生日(月)',
  `day` tinyint DEFAULT '0' COMMENT '生日(日)',
  `telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '電話',
  `cellphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '手機',
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '住址',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '電子郵件',
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '個人網站網址',
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '備註'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- --------------------------------------------------------

--
-- 資料表結構 `user_music`
--

CREATE TABLE `user_music` (
  `id` int NOT NULL COMMENT '主键',
  `userid` varchar(20) NOT NULL COMMENT '用戶id',
  `music_id` varchar(20) NOT NULL COMMENT '音樂id',
  `music_name` varchar(30) DEFAULT NULL COMMENT '歌曲名稱',
  `author_id` varchar(20) NOT NULL COMMENT '作者id',
  `author_name` varchar(30) DEFAULT NULL COMMENT '作者名稱',
  `album_id` varchar(20) DEFAULT NULL COMMENT '專輯id',
  `album_name` varchar(30) DEFAULT NULL COMMENT '專輯名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `Vuserlog`
-- (請參考以下實際畫面)
--
CREATE TABLE `Vuserlog` (
`id` int
,`userid` int
,`crtdatetime` timestamp
,`type` char(2)
,`typename` char(100)
,`logindatetime` char(14)
,`fromip` char(16)
,`op` char(200)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `VuserLogJob`
-- (請參考以下實際畫面)
--
CREATE TABLE `VuserLogJob` (
`id` int
,`userid` int
,`account` varchar(10)
,`username` varchar(10)
,`password` varchar(10)
,`sex` char(2)
,`birthday` date
,`telephone` varchar(20)
,`cellphone` varchar(20)
,`address` varchar(50)
,`email` varchar(50)
,`url` varchar(50)
,`comment` text
,`logtypeid` char(2)
,`logtypename` char(100)
,`logindatetime` char(14)
,`ip` char(16)
,`job` char(200)
);

-- --------------------------------------------------------

--
-- 檢視表結構 `Vuserlog`
--
DROP TABLE IF EXISTS `Vuserlog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `Vuserlog`  AS SELECT `a`.`id` AS `id`, `a`.`userid` AS `userid`, `a`.`crtdatetime` AS `crtdatetime`, `a`.`type` AS `type`, `b`.`typename` AS `typename`, `a`.`logindatetime` AS `logindatetime`, `a`.`fromip` AS `fromip`, `a`.`op` AS `op` FROM (`userlog` `a` join `logtype` `b`) WHERE (`a`.`type` = `b`.`typeid`) ORDER BY `a`.`userid` ASC, `a`.`crtdatetime` ASC  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `VuserLogJob`
--
DROP TABLE IF EXISTS `VuserLogJob`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VuserLogJob`  AS SELECT `a`.`id` AS `id`, `a`.`userid` AS `userid`, `b`.`account` AS `account`, `b`.`name` AS `username`, `b`.`password` AS `password`, `b`.`sex` AS `sex`, `b`.`birthday` AS `birthday`, `b`.`telephone` AS `telephone`, `b`.`cellphone` AS `cellphone`, `b`.`address` AS `address`, `b`.`email` AS `email`, `b`.`url` AS `url`, `b`.`comment` AS `comment`, `a`.`type` AS `logtypeid`, `c`.`typename` AS `logtypename`, `a`.`logindatetime` AS `logindatetime`, `a`.`fromip` AS `ip`, `a`.`op` AS `job` FROM ((`userlog` `a` left join `users` `b` on((`a`.`userid` = `b`.`id`))) join `logtype` `c`) WHERE (`a`.`type` = `c`.`typeid`)  ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `aa`
--
ALTER TABLE `aa`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bb`
--
ALTER TABLE `bb`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `colortbl`
--
ALTER TABLE `colortbl`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `coutytbl`
--
ALTER TABLE `coutytbl`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `cwbsite`
--
ALTER TABLE `cwbsite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- 資料表索引 `dhtData`
--
ALTER TABLE `dhtData`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `diplomatype`
--
ALTER TABLE `diplomatype`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `environment`
--
ALTER TABLE `environment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checkduplicate` (`sid`,`sdatetime`);

--
-- 資料表索引 `logtype`
--
ALTER TABLE `logtype`
  ADD PRIMARY KEY (`typeid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sex` (`sex`);

--
-- 資料表索引 `packagetbl`
--
ALTER TABLE `packagetbl`
  ADD PRIMARY KEY (`packageid`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sextype`
--
ALTER TABLE `sextype`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `towntbl`
--
ALTER TABLE `towntbl`
  ADD PRIMARY KEY (`tid`);

--
-- 資料表索引 `unittbl`
--
ALTER TABLE `unittbl`
  ADD PRIMARY KEY (`unitid`) USING BTREE;

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checkuser` (`user`);

--
-- 資料表索引 `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_music`
--
ALTER TABLE `user_music`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `aa`
--
ALTER TABLE `aa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bb`
--
ALTER TABLE `bb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dhtData`
--
ALTER TABLE `dhtData`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `environment`
--
ALTER TABLE `environment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sextype`
--
ALTER TABLE `sextype`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_music`
--
ALTER TABLE `user_music`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主键';

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`sex`) REFERENCES `sextype` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `userlog`
--
ALTER TABLE `userlog`
  ADD CONSTRAINT `userlog_ibfk_1` FOREIGN KEY (`type`) REFERENCES `logtype` (`typeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
