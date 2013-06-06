-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2011 at 07:55 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `userid`, `image`) VALUES
(51, 33, 'pojarogasitel.jpg'),
(50, 34, 'i-love-codeigniter.png'),
(49, 34, 'CodeIgniter_Wallpaper_by_nucleocide.jpg'),
(48, 34, 'codeigniter_200x200.jpg'),
(47, 34, 'codeigniter2.png'),
(46, 34, 'codeigniter.png'),
(45, 33, 'avatar4e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `message` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=189 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `userid`, `message`, `data`) VALUES
(188, 34, 'Ще си сменя аватара в Gravatar.com', '2011-02-10 22:33:21'),
(187, 34, 'Let''s grab this screen with screen grab ^_^', '2011-02-10 22:32:55'),
(186, 34, 'Качих още една снимка в профила си :) Check it out...', '2011-02-10 22:32:25'),
(184, 34, 'Видя ли снимките ми @eyankulov', '2011-02-10 22:30:06'),
(185, 34, 'Поздрав за всички с E-Type - True Believer :)', '2011-02-10 22:30:42'),
(182, 34, 'Как сме в този прекрасен следобед/вечер/среднощ?', '2011-02-10 22:28:39'),
(174, 33, 'а тоя пост?', '2011-02-10 18:47:35'),
(183, 34, 'Време е за още едно кафе :) SEO is waitin'' :)', '2011-02-10 22:29:36'),
(181, 34, 'Слушам речта на Мубарак в youtube :) (live)', '2011-02-10 22:28:08'),
(179, 34, 'Добро утро! Време е за кафе :)', '2011-02-10 22:27:03'),
(178, 34, '@eyankulov стига си писал =)', '2011-02-10 22:21:01'),
(180, 34, 'Пи-пи Пилешко...', '2011-02-10 22:27:25'),
(162, 33, 'Първи пост на @eyankulov', '2011-02-09 21:50:23'),
(165, 33, 'вечерям', '2011-02-10 18:40:12'),
(163, 33, 'Пия Monster :)', '2011-02-10 18:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `password`, `email`) VALUES
(34, 'ideos', 'e10adc3949ba59abbe56e057f20f883e', 'ideos@gmail.com'),
(33, 'eyankulov', 'e10adc3949ba59abbe56e057f20f883e', 'eyankulov@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE IF NOT EXISTS `setup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `city` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`id`, `u_id`, `city`, `country`, `birth_date`) VALUES
(21, 33, 'София', 'България', '21.03.1992'),
(22, 34, 'София', 'Българи', '21.03.1992');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
