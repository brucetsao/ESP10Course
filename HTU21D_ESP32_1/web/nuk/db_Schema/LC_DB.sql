-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： extedu-mysql
-- 產生時間： 2022 年 08 月 19 日 04:02
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
-- 資料表結構 `Booking`
--

CREATE TABLE `Booking` (
  `id` int NOT NULL COMMENT '主鍵',
  `servicetype` char(2) NOT NULL COMMENT '申請服務類型',
  `name` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '申請人姓名',
  `sex` char(2) NOT NULL COMMENT '申請人性別',
  `phone` char(20) NOT NULL COMMENT '申請人電話',
  `brithday` date NOT NULL COMMENT '申請人誕辰',
  `booktime` date NOT NULL COMMENT '預約日期',
  `timerange` time NOT NULL COMMENT '預約時段',
  `ps` char(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '備註',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Booking`
--

INSERT INTO `Booking` (`id`, `servicetype`, `name`, `sex`, `phone`, `brithday`, `booktime`, `timerange`, `ps`, `updtime`) VALUES
(1, '01', 'TOM', '男', '09555', '2022-07-26', '2022-07-26', '00:00:04', 'ssss', '2022-07-26 03:30:46');

-- --------------------------------------------------------

--
-- 資料表結構 `Boxes`
--

CREATE TABLE `Boxes` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(100) NOT NULL COMMENT '香油箱代稱',
  `location` char(2) NOT NULL COMMENT '宮殿位址代號',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Boxes`
--

INSERT INTO `Boxes` (`id`, `name`, `location`, `crdtime`) VALUES
(1, '正殿東四', '01', '2022-07-14 06:04:49');

-- --------------------------------------------------------

--
-- 資料表結構 `Calendar`
--

CREATE TABLE `Calendar` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(30) NOT NULL COMMENT '事件名稱',
  `timerange` char(30) NOT NULL COMMENT '開始時間',
  `deadrange` char(30) NOT NULL COMMENT '結束時間',
  `ps` text NOT NULL COMMENT '事件說明',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Calendar`
--

INSERT INTO `Calendar` (`id`, `name`, `timerange`, `deadrange`, `ps`, `crdtime`) VALUES
(4, '是我啦', '07', '20', 'qqq', '2022-07-15 02:36:20');

-- --------------------------------------------------------

--
-- 資料表結構 `Comefrom`
--

CREATE TABLE `Comefrom` (
  `id` char(3) NOT NULL COMMENT '主鍵',
  `name` char(10) NOT NULL COMMENT '來源名稱',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Comefrom`
--

INSERT INTO `Comefrom` (`id`, `name`, `crdtime`) VALUES
('01', '香油箱收集', '2022-07-14 07:23:47');

-- --------------------------------------------------------

--
-- 資料表結構 `Donate`
--

CREATE TABLE `Donate` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '捐款人姓名',
  `phone` char(15) NOT NULL COMMENT '捐款人電話',
  `money` int NOT NULL COMMENT '金額',
  `ps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT '備註',
  `comefrom` char(2) NOT NULL COMMENT '來源(線上線下)',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Donate`
--

INSERT INTO `Donate` (`id`, `name`, `phone`, `money`, `ps`, `comefrom`, `updtime`) VALUES
(1, 'james', '09555', 2, '000', '01', '2022-07-14 07:38:06');

-- --------------------------------------------------------

--
-- 資料表結構 `Draws`
--

CREATE TABLE `Draws` (
  `id` int NOT NULL COMMENT '主鍵',
  `phone` char(20) NOT NULL COMMENT '電話/查詢鍵',
  `drawtype` char(10) NOT NULL COMMENT '抽取籤種',
  `number` int NOT NULL COMMENT '抽出號碼',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Draws`
--

INSERT INTO `Draws` (`id`, `phone`, `drawtype`, `number`, `crdtime`) VALUES
(1, '09555', '月', 2, '2022-07-26 06:18:24'),
(2, '09555', '龍', 3, '2022-07-26 06:18:24'),
(3, '09556', '老', 7, '2022-07-26 06:18:24');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `godAll`
-- (請參考以下實際畫面)
--
CREATE TABLE `godAll` (
`id` int
,`name` char(20)
,`location` char(2)
,`crdtime` timestamp
,`local` char(20)
);

-- --------------------------------------------------------

--
-- 資料表結構 `Gods`
--

CREATE TABLE `Gods` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '神明尊稱',
  `pic` char(25) DEFAULT NULL COMMENT '神像照片',
  `location` char(2) NOT NULL COMMENT '所在神殿ID',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Gods`
--

INSERT INTO `Gods` (`id`, `name`, `pic`, `location`, `crdtime`) VALUES
(1, '媽祖', NULL, '01', '2022-07-14 08:26:09'),
(2, '聖父母', NULL, '02', '2022-07-15 07:09:49'),
(3, '玄天上帝', NULL, '03', '2022-07-15 07:10:05'),
(4, '關聖帝君', NULL, '04', '2022-07-15 07:10:56'),
(5, '福德正神', NULL, '02', '2022-07-15 07:11:07'),
(6, '太歲星君', NULL, '05', '2022-07-15 07:13:28'),
(7, '斗姥天尊', NULL, '05', '2022-07-27 16:39:13'),
(8, '玉皇上帝', NULL, '10', '2022-07-27 16:39:13'),
(9, '三官上帝', NULL, '10', '2022-07-27 16:39:13'),
(10, '月老星君', NULL, '08', '2022-07-27 16:39:13'),
(11, '華陀仙師', NULL, '09', '2022-07-27 16:39:13'),
(12, '觀音佛祖', NULL, '11', '2022-07-27 16:39:13'),
(13, '註生娘娘', NULL, '12', '2022-07-27 16:39:13'),
(14, '文昌帝君', NULL, '06', '2022-07-27 16:39:13'),
(15, '五路財神', NULL, '07', '2022-07-27 16:39:13');

-- --------------------------------------------------------

--
-- 資料表結構 `Income`
--

CREATE TABLE `Income` (
  `id` int NOT NULL COMMENT '主鍵',
  `fromid` char(3) NOT NULL COMMENT '來源代碼',
  `total` int NOT NULL COMMENT '總金額',
  `staffid` int NOT NULL COMMENT '負責工作人員id',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `Ledsite`
--

CREATE TABLE `Ledsite` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(10) NOT NULL COMMENT '燈座名稱',
  `typeid` char(2) NOT NULL COMMENT '所屬燈種代號',
  `amount` int NOT NULL COMMENT '總燈數',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Ledsite`
--

INSERT INTO `Ledsite` (`id`, `name`, `typeid`, `amount`, `crdtime`) VALUES
(1, '1-1柱', '01', 20, '2022-07-28 07:00:29'),
(2, '9-4柱', '01', 10, '2022-07-28 07:00:52'),
(11, '6-6柱', '03', 5, '2022-07-28 04:29:29');

-- --------------------------------------------------------

--
-- 資料表結構 `Ledsitelist`
--

CREATE TABLE `Ledsitelist` (
  `id` int NOT NULL COMMENT '主鍵',
  `siteid` int NOT NULL COMMENT '燈座ID',
  `no` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '燈泡編號',
  `donater` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '點燈施主',
  `dbirthday` date DEFAULT NULL COMMENT '點燈施主生日',
  `dphone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '電話號碼',
  `dueday` date DEFAULT NULL COMMENT '點燈到期日',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Ledsitelist`
--

INSERT INTO `Ledsitelist` (`id`, `siteid`, `no`, `donater`, `dbirthday`, `dphone`, `dueday`, `updtime`) VALUES
(223, 1, '1', '逢魔時王', '2022-07-06', '09705553331', '2023-07-28', '2022-07-28 07:08:27'),
(224, 1, '2', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(225, 1, '3', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(226, 1, '4', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(227, 1, '5', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(228, 1, '6', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(229, 1, '7', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(230, 1, '8', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(231, 1, '9', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(232, 1, '10', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(233, 1, '11', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(234, 1, '12', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(235, 1, '13', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(236, 1, '14', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(237, 1, '15', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(238, 1, '16', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(239, 1, '17', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(240, 1, '18', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(241, 1, '19', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(242, 1, '20', NULL, NULL, NULL, NULL, '2022-07-28 07:01:27'),
(243, 2, '1', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(244, 2, '2', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(245, 2, '3', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(246, 2, '4', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(247, 2, '5', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(248, 2, '6', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(249, 2, '7', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(250, 2, '8', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(251, 2, '9', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(252, 2, '10', NULL, NULL, NULL, NULL, '2022-07-28 07:01:28'),
(253, 11, '1', NULL, NULL, NULL, NULL, '2022-07-28 07:01:29'),
(254, 11, '2', NULL, NULL, NULL, NULL, '2022-07-28 07:01:29'),
(255, 11, '3', NULL, NULL, NULL, NULL, '2022-07-28 07:01:29'),
(256, 11, '4', NULL, NULL, NULL, NULL, '2022-07-28 07:01:29'),
(257, 11, '5', NULL, NULL, NULL, NULL, '2022-07-28 07:01:29');

-- --------------------------------------------------------

--
-- 資料表結構 `Ledtype`
--

CREATE TABLE `Ledtype` (
  `id` char(2) NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '燈種名稱',
  `price` int NOT NULL COMMENT '燈種價格',
  `content` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '燈種說明',
  `location` char(2) NOT NULL COMMENT '所在位址代號',
  `godid` int NOT NULL COMMENT '供奉神明代號',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Ledtype`
--

INSERT INTO `Ledtype` (`id`, `name`, `price`, `content`, `location`, `godid`, `updtime`) VALUES
('01', '光明燈A', 300, '元辰光彩.前途光明', '01', 1, '2022-07-27 18:28:29'),
('02', '太歲燈A', 200, '消災解厄.平安吉祥，此項無點燈', '05', 6, '2022-07-27 16:36:00'),
('03', '文昌燈', 500, '學業精進.仕途順遂', '06', 14, '2022-07-27 16:39:29'),
('04', '財神燈', 500, '財利廣進.迎祥納福', '07', 15, '2022-07-27 16:39:33'),
('05', '華陀燈', 500, '護佑身心.永保安康', '09', 11, '2022-07-27 16:39:38'),
('06', '姻緣燈', 500, '天賜良緣.生活美滿', '08', 10, '2022-07-27 16:39:40'),
('11', '光明燈B', 500, '元辰光彩.前途光明', '01', 1, '2022-07-27 16:39:43'),
('12', '太歲燈B', 300, '消災解厄.平安吉祥', '05', 6, '2022-07-27 16:39:58'),
('21', '光明燈C', 1000, '元辰光彩.前途光明', '01', 1, '2022-07-27 16:39:48'),
('22', '太歲燈C', 500, '消災解厄.平安吉祥', '05', 6, '2022-07-27 16:40:03'),
('93', '文昌斗', 3600, '學業精進.仕途順遂', '06', 14, '2022-07-27 16:40:07'),
('94', '財神斗', 3600, '財利廣進.迎祥納福，安斗為同戶10人內安奉', '07', 15, '2022-07-27 16:40:09'),
('95', '華陀斗', 3600, '護佑身心.永保安康，安斗為同戶10人內安奉', '09', 11, '2022-07-27 16:40:13');

-- --------------------------------------------------------

--
-- 資料表結構 `Leveltype`
--

CREATE TABLE `Leveltype` (
  `id` int NOT NULL COMMENT '主鍵/層級代碼',
  `name` char(20) NOT NULL COMMENT '層級名稱',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Leveltype`
--

INSERT INTO `Leveltype` (`id`, `name`, `crdtime`) VALUES
(1, '董事長', '2022-07-12 03:20:21'),
(2, '常務董事', '2022-08-03 03:04:17'),
(3, '董事', '2022-08-03 03:20:50'),
(4, '常務監事', '2022-08-03 03:23:37'),
(5, '監事', '2022-08-03 03:23:46'),
(6, '總幹事', '2022-08-03 03:23:52'),
(7, '秘書', '2022-08-03 03:24:24'),
(8, '資訊組', '2022-08-03 03:24:30'),
(9, '祭典組', '2022-08-03 03:24:35'),
(10, '總務組', '2022-08-03 03:24:48'),
(11, '財務組', '2022-08-03 03:24:53'),
(12, '合唱志工', '2022-08-03 03:25:03'),
(13, '膳食環保志工', '2022-08-03 03:25:11'),
(14, '哨角志工', '2022-08-03 03:25:18'),
(15, '炊事志工', '2022-08-03 03:25:25'),
(16, '南管樂團志工', '2022-08-03 03:25:34'),
(17, '佛經志工', '2022-08-03 03:25:42'),
(18, '交通志工', '2022-08-03 03:25:50'),
(19, '導覽解說志工', '2022-08-03 03:25:59'),
(20, '接待志工', '2022-08-03 03:26:05'),
(21, '國樂志工', '2022-08-03 03:26:12'),
(22, '道經志工', '2022-08-03 03:26:26'),
(23, '神轎志工', '2022-08-03 03:26:36'),
(24, '宗教活動志工', '2022-08-03 03:26:49');

-- --------------------------------------------------------

--
-- 資料表結構 `Lightup`
--

CREATE TABLE `Lightup` (
  `id` int NOT NULL COMMENT '主鍵',
  `ledtype` char(2) NOT NULL COMMENT '燈種代碼',
  `name` char(20) NOT NULL COMMENT '點燈人姓名',
  `sex` char(2) NOT NULL COMMENT '點燈人性別',
  `phone` char(15) NOT NULL COMMENT '點燈人電話',
  `brithday` date NOT NULL COMMENT '點燈人誕辰',
  `total` int NOT NULL COMMENT '點燈數',
  `bookingname` char(20) NOT NULL COMMENT '付款人姓名',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '資料上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Lightup`
--

INSERT INTO `Lightup` (`id`, `ledtype`, `name`, `sex`, `phone`, `brithday`, `total`, `bookingname`, `updtime`) VALUES
(2, '03', '香油箱收集', '02', '09705553331', '2022-07-04', 0, 'as', '2022-07-15 03:47:05');

-- --------------------------------------------------------

--
-- 資料表結構 `News`
--

CREATE TABLE `News` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(30) NOT NULL COMMENT '消息標題',
  `content` text NOT NULL COMMENT '消息內容',
  `writer` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '本篇作者/小編',
  `photo` text NOT NULL COMMENT '照片連結',
  `updtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `News`
--

INSERT INTO `News` (`id`, `name`, `content`, `writer`, `photo`, `updtime`) VALUES
(1, '55', '444', '005', '0', '2022-07-14 15:04:55'),
(2, '0', '005', '005', '0', '2022-07-14 14:54:24'),
(3, '0', 'dddd', 'd', 'ddd', '2022-07-14 14:54:35'),
(100, '第三分局東區分駐所反詐騙宣導', '111年第1季解除分期付款詐騙高風險賣場前五名：\n\n1.東森購物。\n2.誠品書局。\n3.遠傳friDay購物。\n4.蝦皮購物。\n5.金石堂。\n（所公布之疑似個資外洩電商均已有實施相關反詐騙宣導）\n詐騙集團來電假冒賣場/電商業者，稱民眾於日前進行消費，因系統或員工設定錯誤導致民眾重複下單遭重複扣款，須解除相關設定，並於對話中以「核對資料」之名義詢問民眾相關金融帳戶資料或金融卡客服電話，再假冒金融機構客服人員來電稱要協助民眾解除設定，要求民眾前往操作ATM、操作網路銀行轉帳或購買遊戲點數。\n如接獲來電顯示開頭帶「+」號、「+2」、「+886」等號碼，電話中如聽到關鍵字「解除分期付款設定」、「重複扣款」及「升級VIP」等關鍵字，請立即掛斷，撥打165反詐騙諮詢專線查證。', '', 'https://www.lecheng.org.tw/UserFiles/S__484974600.jpg', '2022-07-29 02:15:18');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `serviceForm`
-- (請參考以下實際畫面)
--
CREATE TABLE `serviceForm` (
`id` int
,`name` char(20)
,`tname` char(10)
,`sex` char(2)
,`phone` char(20)
,`brithday` date
,`booktime` date
,`timerange` time
,`ps` char(200)
,`item` char(200)
,`price` char(100)
,`content` char(150)
);

-- --------------------------------------------------------

--
-- 資料表結構 `Servicetype`
--

CREATE TABLE `Servicetype` (
  `id` char(2) NOT NULL COMMENT '主鍵/服務代號',
  `tname` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '服務名稱',
  `item` char(200) NOT NULL COMMENT '服務需準備項目',
  `price` char(100) NOT NULL COMMENT '服務價格',
  `timerange` char(30) NOT NULL COMMENT '執行時間(起)',
  `deadrange` char(30) NOT NULL COMMENT '執行時間(訖)',
  `content` char(150) NOT NULL COMMENT '說明',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Servicetype`
--

INSERT INTO `Servicetype` (`id`, `tname`, `item`, `price`, `timerange`, `deadrange`, `content`, `crdtime`) VALUES
('01', '收驚', '收驚人衣物一件', '媽祖金100元', '20', '09', '10000', '2022-07-14 15:47:09');

-- --------------------------------------------------------

--
-- 資料表結構 `Staff`
--

CREATE TABLE `Staff` (
  `id` int NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '工作人員姓名',
  `leveltype` char(2) NOT NULL COMMENT '工作人員層級',
  `phone` char(15) NOT NULL COMMENT '工作人員電話',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '資料創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Staff`
--

INSERT INTO `Staff` (`id`, `name`, `leveltype`, `phone`, `crdtime`) VALUES
(3, '郭松益', '01', '', '2022-08-03 03:01:02');

-- --------------------------------------------------------

--
-- 資料表結構 `Temple`
--

CREATE TABLE `Temple` (
  `id` char(2) NOT NULL COMMENT '主鍵',
  `name` char(20) NOT NULL COMMENT '宮殿名稱',
  `crdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '系統創建時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `VGods`
-- (請參考以下實際畫面)
--
CREATE TABLE `VGods` (
`id` int
,`name` char(20)
,`location` char(2)
,`crdtime` timestamp
,`Glocname` char(20)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `Vledsite`
-- (請參考以下實際畫面)
--
CREATE TABLE `Vledsite` (
`id` int
,`name` char(10)
,`typename` char(20)
,`godsname` char(20)
,`price` int
,`local` char(20)
,`content` char(100)
,`amount` int
,`crdtime` timestamp
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `VLedtype`
-- (請參考以下實際畫面)
--
CREATE TABLE `VLedtype` (
`id` char(2)
,`name` char(20)
,`godsname` char(20)
,`price` int
,`local` char(20)
,`content` char(100)
,`updtime` timestamp
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `VsiteDetail`
-- (請參考以下實際畫面)
--
CREATE TABLE `VsiteDetail` (
`id` int
,`siteid` int
,`typeid` char(2)
,`donater` char(20)
,`dbirthday` date
,`dphone` char(20)
,`dueday` date
,`updtime` timestamp
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `VsiteDisplay`
-- (請參考以下實際畫面)
--
CREATE TABLE `VsiteDisplay` (
`Ledid` int
,`typename` char(20)
,`name` char(10)
,`local` char(20)
,`donater` char(20)
,`dbirthday` date
,`dphone` char(20)
,`updtime` timestamp
,`dueday` date
);

-- --------------------------------------------------------

--
-- 檢視表結構 `godAll`
--
DROP TABLE IF EXISTS `godAll`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `godAll`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `a`.`location` AS `location`, `a`.`crdtime` AS `crdtime`, `b`.`name` AS `local` FROM (`Gods` `a` left join `Temple` `b` on((`a`.`location` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `serviceForm`
--
DROP TABLE IF EXISTS `serviceForm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `serviceForm`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `b`.`tname` AS `tname`, `a`.`sex` AS `sex`, `a`.`phone` AS `phone`, `a`.`brithday` AS `brithday`, `a`.`booktime` AS `booktime`, `a`.`timerange` AS `timerange`, `a`.`ps` AS `ps`, `b`.`item` AS `item`, `b`.`price` AS `price`, `b`.`content` AS `content` FROM (`Booking` `a` left join `Servicetype` `b` on((`a`.`servicetype` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `VGods`
--
DROP TABLE IF EXISTS `VGods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VGods`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `a`.`location` AS `location`, `a`.`crdtime` AS `crdtime`, `b`.`name` AS `Glocname` FROM (`Gods` `a` left join `Temple` `b` on((`a`.`location` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `Vledsite`
--
DROP TABLE IF EXISTS `Vledsite`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `Vledsite`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `b`.`name` AS `typename`, `b`.`godsname` AS `godsname`, `b`.`price` AS `price`, `b`.`local` AS `local`, `b`.`content` AS `content`, `a`.`amount` AS `amount`, `a`.`crdtime` AS `crdtime` FROM (`Ledsite` `a` left join `VLedtype` `b` on((`a`.`typeid` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `VLedtype`
--
DROP TABLE IF EXISTS `VLedtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VLedtype`  AS SELECT `a`.`id` AS `id`, `a`.`name` AS `name`, `b`.`name` AS `godsname`, `a`.`price` AS `price`, `b`.`local` AS `local`, `a`.`content` AS `content`, `a`.`updtime` AS `updtime` FROM (`Ledtype` `a` left join `godAll` `b` on((`a`.`godid` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `VsiteDetail`
--
DROP TABLE IF EXISTS `VsiteDetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VsiteDetail`  AS SELECT `a`.`id` AS `id`, `a`.`siteid` AS `siteid`, `b`.`typeid` AS `typeid`, `a`.`donater` AS `donater`, `a`.`dbirthday` AS `dbirthday`, `a`.`dphone` AS `dphone`, `a`.`dueday` AS `dueday`, `a`.`updtime` AS `updtime` FROM (`Ledsitelist` `a` left join `Ledsite` `b` on((`a`.`siteid` = `b`.`id`)))  ;

-- --------------------------------------------------------

--
-- 檢視表結構 `VsiteDisplay`
--
DROP TABLE IF EXISTS `VsiteDisplay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `VsiteDisplay`  AS SELECT `a`.`id` AS `Ledid`, `b`.`typename` AS `typename`, `b`.`name` AS `name`, `b`.`local` AS `local`, `a`.`donater` AS `donater`, `a`.`dbirthday` AS `dbirthday`, `a`.`dphone` AS `dphone`, `a`.`updtime` AS `updtime`, `a`.`dueday` AS `dueday` FROM (`Ledsitelist` `a` left join `Vledsite` `b` on((`a`.`siteid` = `b`.`id`)))  ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`servicetype`);

--
-- 資料表索引 `Boxes`
--
ALTER TABLE `Boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`location`) USING BTREE;

--
-- 資料表索引 `Calendar`
--
ALTER TABLE `Calendar`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Comefrom`
--
ALTER TABLE `Comefrom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Donate`
--
ALTER TABLE `Donate`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Draws`
--
ALTER TABLE `Draws`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Gods`
--
ALTER TABLE `Gods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`location`);

--
-- 資料表索引 `Income`
--
ALTER TABLE `Income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from` (`fromid`),
  ADD KEY `staff` (`staffid`);

--
-- 資料表索引 `Ledsite`
--
ALTER TABLE `Ledsite`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Ledsitelist`
--
ALTER TABLE `Ledsitelist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no` (`siteid`,`no`),
  ADD UNIQUE KEY `phone` (`dphone`);

--
-- 資料表索引 `Ledtype`
--
ALTER TABLE `Ledtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local` (`location`);

--
-- 資料表索引 `Leveltype`
--
ALTER TABLE `Leveltype`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Lightup`
--
ALTER TABLE `Lightup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`ledtype`);

--
-- 資料表索引 `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Servicetype`
--
ALTER TABLE `Servicetype`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lv` (`leveltype`);

--
-- 資料表索引 `Temple`
--
ALTER TABLE `Temple`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Booking`
--
ALTER TABLE `Booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Boxes`
--
ALTER TABLE `Boxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Calendar`
--
ALTER TABLE `Calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Donate`
--
ALTER TABLE `Donate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Draws`
--
ALTER TABLE `Draws`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Gods`
--
ALTER TABLE `Gods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Income`
--
ALTER TABLE `Income`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Ledsite`
--
ALTER TABLE `Ledsite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Ledsitelist`
--
ALTER TABLE `Ledsitelist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=258;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Leveltype`
--
ALTER TABLE `Leveltype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵/層級代碼', AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Lightup`
--
ALTER TABLE `Lightup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `News`
--
ALTER TABLE `News`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=101;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Staff`
--
ALTER TABLE `Staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '主鍵', AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `Boxes`
--
ALTER TABLE `Boxes`
  ADD CONSTRAINT `Boxes_ibfk_1` FOREIGN KEY (`location`) REFERENCES `Temple` (`id`);

--
-- 資料表的限制式 `Ledtype`
--
ALTER TABLE `Ledtype`
  ADD CONSTRAINT `Ledtype_ibfk_1` FOREIGN KEY (`location`) REFERENCES `Temple` (`id`);

--
-- 資料表的限制式 `Lightup`
--
ALTER TABLE `Lightup`
  ADD CONSTRAINT `Lightup_ibfk_1` FOREIGN KEY (`ledtype`) REFERENCES `Ledtype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
