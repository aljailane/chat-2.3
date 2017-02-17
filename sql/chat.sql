-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- المزود: sql105.byetcluster.com
-- أنشئ في: 07 فبراير 2017 الساعة 15:32
-- إصدارة المزود: 5.6.34-79.1
-- PHP إصدارة: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `4lju_19446367_wap`
--

-- --------------------------------------------------------

--
-- بنية الجدول `b_chat`
--

CREATE TABLE IF NOT EXISTS `b_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `chatter` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `time` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_chat`
--

INSERT INTO `b_chat` (`id`, `roomid`, `chatter`, `message`, `time`) VALUES
(1, 1, 'Ù…Ø­Ù…Ø¯ Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ', 'Ø§Ù‡Ù„Ø§ ÙˆØ³Ù‡Ù„Ø§', 1484714330),
(2, 5, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø¨', 1484729860),
(3, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø§Ù„Ø³Ù€Ù€Ù€Ù€ Ø¹Ù„ÙŠÙƒÙ… Ù€Ù€Ù„Ø§Ù…', 1484729957),
(4, 5, 'admin', 'Ù…Ø¨Ø±ÙˆÙˆÙˆÙˆÙƒ Ø§Ù„Ø±ÙˆÙ… ÙŠØ§Ø­Ù„ÙˆÙ‡', 1484734418),
(5, 5, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'ÙŠØ³Ù„Ù…Ùˆ Ø§Ù„Ø§ÙŠØ§Ø¯ÙŠ ÙŠØ§Ø°ÙˆÙ‚ ÙˆØ±Ø¯Ø© Ù†Ø±Ø¯Ù‡Ø§Ù„Ùƒ ÙÙŠ Ø§Ù„Ø§ÙØ±Ø§Ø­ ', 1484746445),
(6, 6, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ù…Ø¨Ø±ÙˆÙƒ Ø§Ù„Ø±ÙˆÙ… ÙŠØ§Ø­Ù„Ùˆ', 1484746527),
(7, 6, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ù…Ø¨Ø±ÙˆÙƒ Ø§Ù„Ø±ÙˆÙ… ÙŠØ§Ø­Ù„Ùˆ', 1484746527),
(8, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'ÙŠÙ€Ù€Ù€Ù€ Ø±Ø¨ Ù€Ù€Ù€Ù€Ø§', 1484765414),
(9, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'ÙŠÙ€Ù€Ù€Ù€ Ø±Ø¨ Ù€Ù€Ù€Ù€Ø§', 1484765442),
(10, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ù‡Ù†Ø§ÙƒÚ© Ù‚Ù„ÙˆØ¨ Ø¬Ù“Ù…ÙŠÙ„Ù‡Û ØŒ Ù†ØªØ­Ø¯Ø« ïº‚Ù„ÙŠÙ‡Ø¢Ø£ Ù…Ø±Ú¾ ÙˆÙ†ÙºØ¹Ù„Ù‚ Ø¨Ù‡Ø¢Ø£. Ù„Ù„Ø£Ø¨Ø¯ â™¡!', 1484766970),
(11, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', '.', 1484785562),
(12, 1, 'Ù„Ø¤ÙŠ Ø§Ù„Ø±Ù‚Ø§ÙˆÙŠ', 'Ø¨Ø§Ùƒ', 1484833407),
(13, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ù†Ù€Ù’ÙØ§Ø¥Ø£Ø¥Ø£Ø¥ÙŠÙ‘Û’Ø³ Ø¨Ø§Ùƒ Ù„Ø¤ÙŠ ', 1484843937),
(14, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', '..î›º ', 1484843995),
(15, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø¬ Ù€Ù€Ù…Ø¹Ù€Ù€Ø©Ø© Ù… Ù€Ù€Ø¨Ø§Ø±Ú°Ù‡ ', 1484865759),
(16, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'ÙˆÙŠØ­Ø¯ÙØ« Ø¢Ù† ØªØ²Ø¢Ù„ ØªØ¤Ù…Ù† Ø¨Ø£Ù† Ø¢Ù„Ù…ÙˆØªÙ‰ Ø³ÙŠØ¹ÙˆØ¯ÙˆÙ† Ù„Ù„Ø­ÙŠØ§Ø© ØŒ ÙˆÙ„Ù† ØªÙƒØªÙÙŠ Ø¨Ø°Ù„Ùƒ .. Ø¨Ù„ Ø¹Ù†Ø¯Ùƒ ÙŠÙ‚ÙŠÙ† Ø¢Ù†ÙƒÙ… Ø³ØªØ¬Ù„Ø³ÙˆÙ† Ø¹Ù„Ù‰ Ø°Ø¢Øª Ø¢Ù„Ø·Ø§ÙˆÙ„Ù‡ Ù„Ù€ ØªØ­ÙƒÙŠ Ù„Ù‡Ù… Ù…Ø±Ø¢Ø±Ø© Ø±Ø­ÙŠÙ„Ù‡Ù… .. !', 1484920845),
(17, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø³ÙŠÙ† ÙˆØ§Ø­Ø¯', 1485179372),
(18, 1, 'Ù†Ù‡Ø§Ù„', 'Ù‡Ø§ÙŠ', 1485422399),
(19, 1, 'admin', 'Ø§Ù‡Ù„ÙŠÙ† ÙˆØ³Ù‡Ù„ÙŠÙ† Ù†Ù‡Ø§Ù„', 1485434500),
(20, 1, 'Ù†Ù‡Ø§Ù„', 'Ù‡Ù„Ø§ ÙÙŠÙƒ Ø­Ù…ÙˆØ¯', 1485444410),
(21, 1, 't-web', 'Ø³Ù„Ø§Ù…Ø§Øª', 1485585394),
(22, 1, 't-web', 'Ø¨ÙˆØ³Ù‡', 1485585442),
(23, 1, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ…', 1485909077),
(24, 1, 'admin', 'Ø¨ÙˆØ³Ø©', 1486465269),
(25, 1, 'Ù„Ø­Ø¸Ø© ØªÙØ§Ù‡Ù…', 'Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ…', 1486480712);

-- --------------------------------------------------------

--
-- بنية الجدول `b_chatonline`
--

CREATE TABLE IF NOT EXISTS `b_chatonline` (
  `roomid` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `chatter` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `b_chatonline`
--

INSERT INTO `b_chatonline` (`roomid`, `time`, `chatter`) VALUES
('1', '1486480723', 'Ù„Ø­Ø¸Ø© ØªÙØ§Ù‡Ù…');

-- --------------------------------------------------------

--
-- بنية الجدول `b_chatroom`
--

CREATE TABLE IF NOT EXISTS `b_chatroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_chatroom`
--

INSERT INTO `b_chatroom` (`id`, `name`) VALUES
(1, 'Ø§Ù„ØºØ±ÙØ© Ø§Ù„Ø¹Ø§Ù…Ø©'),
(2, 'ØºØ±ÙØ© Ø§Ù„Ø§ØµØ¯Ù‚Ø§Ø¡'),
(3, 'Ø§Ù„ØºØ±ÙØ© Ø§Ù„Ø±ÙˆÙ…Ù†Ø³ÙŠØ©'),
(4, 'Ø§Ù„ØºØ±ÙØ© Ø§Ù„Ø§Ø¯Ø§Ø±ÙŠØ©'),
(5, 'ØºØ±ÙØ© Ù„ÙˆØ±Ø§'),
(6, 'ØºØ±ÙØ© Ø­Ù…ÙˆØ¯ÙŠ');

-- --------------------------------------------------------

--
-- بنية الجدول `b_cvv`
--

CREATE TABLE IF NOT EXISTS `b_cvv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text COLLATE latin1_general_ci NOT NULL,
  `lname` tinytext COLLATE latin1_general_ci NOT NULL,
  `aname` text COLLATE latin1_general_ci NOT NULL,
  `ano` text COLLATE latin1_general_ci NOT NULL,
  `hadd` text COLLATE latin1_general_ci NOT NULL,
  `mno` text COLLATE latin1_general_ci NOT NULL,
  `mail` text COLLATE latin1_general_ci NOT NULL,
  `pw` text COLLATE latin1_general_ci NOT NULL,
  `uid` text COLLATE latin1_general_ci NOT NULL,
  `pass` text COLLATE latin1_general_ci NOT NULL,
  `s1` text COLLATE latin1_general_ci NOT NULL,
  `s2` text COLLATE latin1_general_ci NOT NULL,
  `s3` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_cvv`
--

INSERT INTO `b_cvv` (`id`, `fname`, `lname`, `aname`, `ano`, `hadd`, `mno`, `mail`, `pw`, `uid`, `pass`, `s1`, `s2`, `s3`) VALUES
(1, 'ajjjjjjjj', 'jjjjjjjjjjjj', 'uuuuuuuuuuu', 'uiiiiiiiiiiiii', 'iiiiiiii', 'eeeeeeeeee', 'wwwwwwwwwww', '', 'rrrrrrrrrrrr', 'gggggggggg', 'oooooooo', 'oppppppppp', 'pppppppppppp');

-- --------------------------------------------------------

--
-- بنية الجدول `b_film`
--

CREATE TABLE IF NOT EXISTS `b_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_filmcat`
--

CREATE TABLE IF NOT EXISTS `b_filmcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_forums`
--

CREATE TABLE IF NOT EXISTS `b_forums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_general`
--

CREATE TABLE IF NOT EXISTS `b_general` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_general`
--

INSERT INTO `b_general` (`id`, `name`, `img`, `lastpostdate`, `topics`, `replies`) VALUES
(3, 'Business', '', 0, 0, 0),
(2, 'Sports', '', 0, 0, 0),
(4, 'Jokes', '', 0, 0, 0),
(5, 'Entertainment', '', 0, 0, 0),
(6, 'News', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `b_greplies`
--

CREATE TABLE IF NOT EXISTS `b_greplies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_mobiles`
--

CREATE TABLE IF NOT EXISTS `b_mobiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_mobiles`
--

INSERT INTO `b_mobiles` (`id`, `name`, `img`, `lastpostdate`, `topics`, `replies`) VALUES
(1, 'Pc | Laptop Internet', '', 0, 0, 0),
(2, 'Mobile Internet', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `b_movies`
--

CREATE TABLE IF NOT EXISTS `b_movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `comment` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_moviescat`
--

CREATE TABLE IF NOT EXISTS `b_moviescat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_mreplies`
--

CREATE TABLE IF NOT EXISTS `b_mreplies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_mtopics`
--

CREATE TABLE IF NOT EXISTS `b_mtopics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(11) NOT NULL,
  `lastposter` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `replies` int(11) unsigned NOT NULL,
  `hints` int(11) NOT NULL DEFAULT '1',
  `locked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_music`
--

CREATE TABLE IF NOT EXISTS `b_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `comment` text COLLATE latin1_general_ci NOT NULL,
  `time` bigint(50) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_music`
--

INSERT INTO `b_music` (`id`, `title`, `by`, `format`, `views`, `downloads`, `link`, `img`, `comment`, `time`, `catid`) VALUES
(1, 'International Rmx', 'Harkorede', '', 11, 1, 'http://localhost/mystyle.mp3', 'http://localhost/logo.png', 'Nice hit', 1345559845, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `b_musiccat`
--

CREATE TABLE IF NOT EXISTS `b_musiccat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_musiccat`
--

INSERT INTO `b_musiccat` (`id`, `name`, `img`) VALUES
(1, 'Apala', 'request.png');

-- --------------------------------------------------------

--
-- بنية الجدول `b_pms`
--

CREATE TABLE IF NOT EXISTS `b_pms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `hasread` int(11) NOT NULL DEFAULT '0',
  `date` bigint(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_pms`
--

INSERT INTO `b_pms` (`id`, `reciever`, `sender`, `subject`, `message`, `hasread`, `date`) VALUES
(1, 'Ù…Ø­Ù…Ø¯ Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ', 'Ù„Ù€Ù€ÙˆØ±Ø§', '..', 'Ù…Ø±Ø­Ø¨Ø§ Ù…Ø­Ù…Ø¯ ØµØ¨Ø§Ø­ Ø§Ù„Ø®ÙŠØ± ÙƒÙŠÙÙƒ Ù„ÙŠØ´ Ù†ÙƒÙŠ Ø§Ù„Ù‚Ø¯ÙŠÙ… Ù…Ø§ÙŠØ¯Ø´ Ù…Ø¹Ø§ÙŠ ÙŠÙ‚ÙˆÙ„ÙŠ ØªÙ… Ø­Ø°Ù Ø¹Ø¶ÙˆÙŠØªÙƒ', 1, 1484729926),
(2, 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ù…Ø­Ù…Ø¯ Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ', 'Ø±Ø¯:..', 'Ø­Ø°ÙØª Ù‚Ø§Ø¹Ø¯Ø© Ø§Ù„Ø¨ÙŠØ§Ù†Ø§Øª Ø¨Ø§Ù„ØºÙ„Ø· Ø§Ù…Ø³ Ø¹Ø´Ø§Ù† ÙƒØ°Ø§', 1, 1484732220),
(3, 'Ù…Ø­Ù…Ø¯ Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ', 'Ù„Ù€Ù€ÙˆØ±Ø§', 'Ø±Ø¯:Ø±Ø¯:..', 'Ø§ÙŠÙˆÙ‡ ØªÙ…Ø§Ø§Ù… ÙØ¯Ø§Ùƒ ', 1, 1484737895);

-- --------------------------------------------------------

--
-- بنية الجدول `b_replies`
--

CREATE TABLE IF NOT EXISTS `b_replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_replies`
--

INSERT INTO `b_replies` (`id`, `topicid`, `message`, `subject`, `poster`, `date`) VALUES
(1, 1, 'Ok oo mr.man i say i don hear', '', 'Harkorede', 1345306439),
(2, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474556),
(3, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474694),
(4, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474707),
(5, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474763),
(6, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474792);

-- --------------------------------------------------------

--
-- بنية الجدول `b_settings`
--

CREATE TABLE IF NOT EXISTS `b_settings` (
  `shout` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `b_templates`
--

CREATE TABLE IF NOT EXISTS `b_templates` (
  `templateid` bigint(20) NOT NULL AUTO_INCREMENT,
  `templatepath` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`templateid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_topics`
--

CREATE TABLE IF NOT EXISTS `b_topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(11) NOT NULL,
  `lastposter` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `replies` int(11) unsigned NOT NULL,
  `hints` int(11) NOT NULL DEFAULT '1',
  `locked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_topics`
--

INSERT INTO `b_topics` (`id`, `forumid`, `message`, `subject`, `poster`, `date`, `lastposter`, `lastpostdate`, `replies`, `hints`, `locked`) VALUES
(1, 1, 'test tsets tsrsebjfmk', 'hehehehehehe', 'Harkorede', 1345306363, 'Harkorede', 1345306439, 0, 67, 0),
(2, 1, 'laff lAFF\r\n', 'Hey Hey eh', 'Harkorede', 1345474516, 'Harkorede', 1345474792, 0, 91, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `b_tutorialcat`
--

CREATE TABLE IF NOT EXISTS `b_tutorialcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_tutorialcat`
--

INSERT INTO `b_tutorialcat` (`id`, `name`, `img`) VALUES
(2, 'NEWEWEWE', '');

-- --------------------------------------------------------

--
-- بنية الجدول `b_tutorialreplies`
--

CREATE TABLE IF NOT EXISTS `b_tutorialreplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topicid` bigint(255) NOT NULL,
  `date` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_tutorialreplies`
--

INSERT INTO `b_tutorialreplies` (`id`, `topicid`, `date`, `poster`, `message`) VALUES
(1, 1, '1344944142', 'Harkorede', 'Nice'),
(2, 2, '1345471419', 'Harkorede', 'hohohohohoh'),
(3, 2, '1345471424', 'Harkorede', 'hohohohohoh'),
(4, 2, '1345471425', 'Harkorede', 'hohohohohoh'),
(5, 2, '1345471425', 'Harkorede', 'hohohohohoh');

-- --------------------------------------------------------

--
-- بنية الجدول `b_tutorialtopics`
--

CREATE TABLE IF NOT EXISTS `b_tutorialtopics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `subject` longtext COLLATE latin1_general_ci NOT NULL,
  `date` bigint(50) NOT NULL,
  `catid` int(11) NOT NULL,
  `locked` int(255) NOT NULL DEFAULT '0',
  `views` bigint(255) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_tutorialtopics`
--

INSERT INTO `b_tutorialtopics` (`id`, `title`, `subject`, `date`, `catid`, `locked`, `views`) VALUES
(1, 'Testing here', 'Welc0me', 1344944101, 1, 0, 20),
(2, 'HEHErerere', 'kikikikikikiki', 1345464673, 2, 0, 86);

-- --------------------------------------------------------

--
-- بنية الجدول `b_updates`
--

CREATE TABLE IF NOT EXISTS `b_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` text COLLATE latin1_general_ci NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_updates`
--

INSERT INTO `b_updates` (`id`, `prefix`, `title`, `url`) VALUES
(3, '<script type="text/javascript">\r\nvar bcads_vars = {\r\n    partnerid : 157999,\r\n    get : ''rich'',\r\n    sync : 1\r\n};\r\n</script>\r\n<script type="text/javascript" src="http://js.buzzcity.net/bcads.js"></script>\r\n<noscript>\r\n<a href="http://click.buzzcity.net/click.php?partnerid=157999">\r\n    <img src="http://show.buzzcity.net/show.php?partnerid=157999&get=image" />\r\n</a>\r\n</noscript>', '<script type="text/javascript">\r\nvar bcads_vars = {\r\n    partnerid : 157999,\r\n    get : ''rich'',\r\n    sync : 1\r\n};\r\n</script>\r\n<script type="text/javascript" src="http://js.buzzcity.net/bcads.js"></script>\r\n<noscript>\r\n<a href="http://click.buzzcity.net/cl', 'http://3srup.ga');

-- --------------------------------------------------------

--
-- بنية الجدول `b_upload`
--

CREATE TABLE IF NOT EXISTS `b_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` bigint(100) NOT NULL,
  `by` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `size` bigint(100) NOT NULL,
  `extension` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `downloads` bigint(50) NOT NULL,
  `views` bigint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_upload`
--

INSERT INTO `b_upload` (`id`, `name`, `catid`, `description`, `date`, `by`, `size`, `extension`, `type`, `downloads`, `views`) VALUES
(1, 'Opera4.2labs.jar', 1, 'it works free on mtn sim', 1345484765, 'Harkorede', 221364, '.jar', 'application/java', 10, 22);

-- --------------------------------------------------------

--
-- بنية الجدول `b_uploadcat`
--

CREATE TABLE IF NOT EXISTS `b_uploadcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_uploadcat`
--

INSERT INTO `b_uploadcat` (`id`, `name`, `img`) VALUES
(1, 'JAVA APPS', 'java.png');

-- --------------------------------------------------------

--
-- بنية الجدول `b_users`
--

CREATE TABLE IF NOT EXISTS `b_users` (
  `userID` bigint(21) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `bday` text NOT NULL,
  `sex` char(7) NOT NULL,
  `school` text NOT NULL,
  `position` text NOT NULL,
  `validated` int(11) NOT NULL DEFAULT '0',
  `keynode` bigint(21) NOT NULL DEFAULT '0',
  `sig` tinytext NOT NULL,
  `usepm` int(11) NOT NULL DEFAULT '1',
  `tsgone` bigint(20) NOT NULL DEFAULT '0',
  `oldtime` bigint(20) NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `rating` bigint(255) NOT NULL DEFAULT '0',
  `lasttime` bigint(20) NOT NULL DEFAULT '0',
  `number` tinytext NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `regtime` bigint(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `onchat` int(11) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `tweakcount` int(255) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- إرجاع أو استيراد بيانات الجدول `b_users`
--

INSERT INTO `b_users` (`userID`, `username`, `password`, `status`, `email`, `bday`, `sex`, `school`, `position`, `validated`, `keynode`, `sig`, `usepm`, `tsgone`, `oldtime`, `avatar`, `photo`, `rating`, `lasttime`, `number`, `country`, `state`, `level`, `regtime`, `name`, `note`, `city`, `gender`, `onchat`, `banned`, `tweakcount`, `ip`) VALUES
(2, 'admin', 'c5165eabd6c757f653ce843cc8eb81c9', '', 'darhost56@gmail.com', '', '', '', '', 1, 0, '', 1, 1486480528, 0, '', 'Ø§Ù„ÙƒÙˆÙ†Øª  (8)_320x230.jpg', 0, 1486465362, '558019313', '', '', 2, 1484714039, '', '', '', '', 0, 0, 0, '108.162.229.79'),
(3, 'Ù…Ø­Ù…Ø¯ Ø§Ù„Ø¬ÙŠÙ„Ø§Ù†ÙŠ', 'c5165eabd6c757f653ce843cc8eb81c9', '', 'diis772@gmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1662467, '', 1, 1486480528, 0, '', '1598.jpg', 0, 0, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '162.158.88.131'),
(4, 'Ù„Ù€Ù€ÙˆØ±Ø§', '9497c4fb634129a18a64948cc9e80360', '', 'leenomer2011@hotmail.com', '', 'Ø§Ù†Ø«Ù', '', '', 1, 1332887, '', 1, 1486480528, 0, '', 'pr291156_lpf413a9c984e4dc.jpg', 0, 1486249985, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '141.101.104.170'),
(5, 'Ù„Ø¤ÙŠ Ø§Ù„Ø±Ù‚Ø§ÙˆÙŠ', 'c20ad4d76fe97759aa27a0c99bff6710', 'Ø­Ø§Ù„ØªÙŠ Ø­Ø§Ù„Ù‡ Ù‡Ù‡Ù‡Ù‡', 'brahm6677@gmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1023016, '', 1, 1486480528, 0, '', '', 0, 1485260492, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '162.158.22.115'),
(6, 'Ø£Ù…ÙŠØ± ÙÙ„Ø³Ø·ÙŠÙ†', '467b617fec4d9fcb63505734ee224851', '', 'ahamad-2010@hotmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1672289, '', 1, 1486480528, 0, '', '', 0, 1485240268, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '172.68.51.163'),
(7, 'Ù†Ù‡Ø§Ù„', 'fa60438ac1719d11eb95899af86e27c6', 'Ù‡Ø§Ø§ÙŠ', 'hggbj12@gmail.com', '', 'Ø§Ù†Ø«Ù', '', '', 1, 1658593, '', 1, 1486480528, 0, '', '', 0, 1485571502, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '141.101.107.231'),
(8, 't-web', 'cc077e4074d58b5b3afe96921b220364', '', 'eglion682@gmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1774005, '', 1, 1486480528, 0, '', '', 0, 1485585428, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '141.101.105.45'),
(9, 'ÙƒØ§ÙŠØ¯', '0a8005f5594bd67041f88c6196192646', '', 'master-king_orlando@hotmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1680527, '', 1, 1486480528, 0, '', '', 0, 0, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, ''),
(10, 'Ù„Ø­Ø¸Ø© ØªÙØ§Ù‡Ù…', 'd50f22791ebd05de23564e551e9070d6', '', 'emadko7@gmail.com', '', 'Ø°ÙƒØ±', '', '', 1, 1345970, '', 1, 1486480528, 0, '', '', 0, 1486480601, '', '', '', 0, 0, '', '', '', '', 0, 0, 0, '141.101.99.14');

-- --------------------------------------------------------

--
-- بنية الجدول `b_video`
--

CREATE TABLE IF NOT EXISTS `b_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `by` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `url` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- بنية الجدول `b_videocat`
--

CREATE TABLE IF NOT EXISTS `b_videocat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
