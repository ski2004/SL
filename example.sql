-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-07 12:15:56
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `example`
--
CREATE DATABASE IF NOT EXISTS `example` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `example`;

-- --------------------------------------------------------

--
-- 資料表結構 `control`
--

DROP TABLE IF EXISTS `control`;
CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `content` tinytext NOT NULL,
  `note` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `control`
--

INSERT INTO `control` (`id`, `name`, `content`, `note`) VALUES
(1, 'identity_repeat', '0', '1=開 ;0=關');

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(12) NOT NULL,
  `name` char(100) NOT NULL,
  `identity` char(10) NOT NULL,
  `birth` char(10) DEFAULT NULL,
  `tel` char(12) DEFAULT NULL,
  `post_code` char(10) DEFAULT NULL,
  `address` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`id`, `name`, `identity`, `birth`, `tel`, `post_code`, `address`) VALUES
(1, 'ABC', 'L123940927', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT '0',
  `name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `items`
--

INSERT INTO `items` (`id`, `store_id`, `name`) VALUES
(7, 1, '誠實豆沙包'),
(8, 1, '閃電霹靂車'),
(9, 1, '鋼彈G8'),
(10, 1, '阿拉丁神燈'),
(11, 1, '哭哭鰻頭');

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `token` char(255) DEFAULT NULL,
  `login_time` timestamp NOT NULL   ,
  `last_time` timestamp NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 資料表的匯出資料 `login`
--

INSERT INTO `login` (`id`, `token`, `login_time`, `last_time`) VALUES
(1, '53d30fe532c1926d7813bdee99c9153e', '2018-05-07 09:54:20', '2018-05-07 09:54:20'),
(2, 'be1c3cd138b095b58e47f3e2c12e8ffd', '2018-05-07 10:05:54', '2018-05-07 10:05:54'),
(3, 'e927f1a36150d3f364dcf0db866572ff', '2018-05-07 10:06:06', '2018-05-07 10:06:06'),
(4, 'f0059fa0d8966b203f9ad01fde049819', '2018-05-07 10:13:53', '2018-05-07 10:13:53'),
(5, 'd9f0ae7377f8ecd135f41e1d4426493c', '2018-05-07 10:14:10', '2018-05-07 10:14:10'),
(6, 'ea12e5c2661ae5ca6059c60ee8805a0b', '2018-05-07 10:14:28', '2018-05-07 10:14:28'),
(7, 'd56ff145c474cc1fce6891074ee765a7', '2018-05-07 10:14:35', '2018-05-07 10:14:35');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT '0',
  `name` char(30) NOT NULL,
  `c_id` int(11) NOT NULL DEFAULT '0',
  `status` int(4) NOT NULL DEFAULT '1',
  `create_time` timestamp NOT NULL ,
  `update_time` timestamp NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`id`, `p_id`, `name`, `c_id`, `status`, `create_time`, `update_time`) VALUES
(1, 1, '', 1, 1, '2018-05-07 07:35:04', '2018-05-07 07:35:04'),
(2, 1, '', 1, 1, '2018-05-07 08:50:49', '2018-05-07 08:50:49');

-- --------------------------------------------------------

--
-- 資料表結構 `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(12) NOT NULL,
  `name` char(100) NOT NULL,
  `account` char(20) DEFAULT NULL,
  `password` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `sales`
--

INSERT INTO `sales` (`id`, `name`, `account`, `password`) VALUES
(1, '業務A', 'testA', 'AAAAAA'),
(2, '業務B', 'testB', 'BBBBBB'),
(3, '業務C', 'testC', 'CCCCCC');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `top_id` int(11) NOT NULL,
  `account` char(30) NOT NULL COMMENT '帳號',
  `name` char(30) NOT NULL,
  `password` char(30) NOT NULL COMMENT '密碼',
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '啟停用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`id`, `top_id`, `account`, `name`, `password`, `enable`) VALUES
(1, 1, 'sadddd', '店家A', 'asd', 1),
(2, 1, '123123', '店家B', '123123', 1),
(3, 2, 'dsadas', '店家C', 'sadasd', 1),
(4, 0, 'sdadas', 'das', '', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
