-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-25 04:25:34
-- 服务器版本： 5.7.21-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liquid`
--

-- --------------------------------------------------------

--
-- 表的结构 `game`
--

CREATE TABLE `game` (
  `gamename` varchar(255) NOT NULL,
  `gameprice` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `game`
--

INSERT INTO `game` (`gamename`, `gameprice`) VALUES
('American Truck Simulator', 99.00),
('ARK:Survival Evolved', 196.00),
('CS：GO', 0.00),
('DOTA2', 0.00),
('FALLOUT4', 99.00),
('FIFA Online 3', 0.00),
('Grand Theft Auto V', 198.00),
('No Man\'s Sky', 158.00),
('Stardew Valley', 48.00),
('Subnautica', 80.00),
('Team Fortress 2', 0.00),
('Warframe', 0.00),
('XCOM2', 100.00),
('城市：天际线', 88.00),
('堡垒之夜', 0.00),
('巫师', 127.00),
('彩虹六号：围攻', 68.00),
('文明VI', 199.00),
('神之浩劫', 0.00),
('绝地求生：大逃杀', 98.00),
('艾兰岛', 0.00),
('英雄联盟', 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `shoppinglist`
--

CREATE TABLE `shoppinglist` (
  `username` varchar(255) NOT NULL,
  `gamename` varchar(255) NOT NULL,
  `gameprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shoppinglist`
--

INSERT INTO `shoppinglist` (`username`, `gamename`, `gameprice`) VALUES
('fly', 'American Truck Simulator', '99.00'),
('fly', 'ARK:Survival Evolved', '196.00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `money` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`username`, `pwd`, `money`) VALUES
('root', '123', '8887870'),
('fly', '123', '0');

-- --------------------------------------------------------

--
-- 表的结构 `usergame`
--

CREATE TABLE `usergame` (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gamename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gamename`,`gameprice`),
  ADD KEY `gamename` (`gamename`);

--
-- Indexes for table `shoppinglist`
--
ALTER TABLE `shoppinglist`
  ADD PRIMARY KEY (`gamename`,`username`);

--
-- Indexes for table `usergame`
--
ALTER TABLE `usergame`
  ADD PRIMARY KEY (`gamename`,`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
