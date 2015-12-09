-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2015 年 12 月 09 日 19:33
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_majp`
--

-- --------------------------------------------------------

--
-- 表的结构 `majp_coden`
--

CREATE TABLE IF NOT EXISTS `majp_coden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `comment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `majp_coden`
--

INSERT INTO `majp_coden` (`id`, `code`, `comment`) VALUES
(1, ‘password’, '管理パスワード');

-- --------------------------------------------------------

--
-- 表的结构 `majp_grammar`
--

CREATE TABLE IF NOT EXISTS `majp_grammar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grammar` varchar(20) NOT NULL,
  `explanation` varchar(50) NOT NULL,
  `sentence_count` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `majp_grammar`
--

INSERT INTO `majp_grammar` (`id`, `grammar`, `explanation`, `sentence_count`) VALUES
(1, '～とは比べ物にはならない', '不能成为和～相比较的东西', 2),
(2, '～には敵わない', '敌不过～', 1),
(7, '～には匹敵できない', '不能与～相匹敌', 0),
(8, '～には及ばない', '不及～', 0),
(9, '～に越したことはない', '没有超过～的了', 1),
(10, '～にしくはない', '没有如～的了', 1),
(11, '～にもまして', '比～更加', 1),
(12, '～より～ましだ', '比起～，～强一点儿', 1),
(13, '～わけではない', '并不是～', 1),
(14, 'ーまい', '决不', 2),
(15, 'ーずにはいられない', '不～就不行', 1),
(16, 'ーずには済まない', '不～的话就解决不了', 1),
(17, 'ーずには置かない', '不～的话就放置不下', 1),
(18, '～べからざる', '不可以做～', 1),
(19, '～べからず', '不可以做～', 1),
(20, 'ーまじき', '决不应该~（まい的古语形式）', 1),
(21, '～ばかりか', '岂止～', 1);

-- --------------------------------------------------------

--
-- 表的结构 `majp_sentence`
--

CREATE TABLE IF NOT EXISTS `majp_sentence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grammar_id` int(11) NOT NULL,
  `sentence` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grammar_id` (`grammar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `majp_sentence`
--

INSERT INTO `majp_sentence` (`id`, `grammar_id`, `sentence`) VALUES
(7, 1, '京都の寒さは北海道とは比べ物にはならない。'),
(9, 9, '応募の締め切りは明日ですが、早めに出すに越したことはない。'),
(12, 10, '油断大敵！用心にしくはない。'),
(13, 11, '彼女は前にもまして勉強を励んでいる。'),
(15, 1, 'ニコルのN１成績は馬さんとは比べ物にはならない。'),
(16, 12, '知らないより少し知った方がましだ。'),
(17, 13, '足を怪我していますが、まったく歩けないわけではない。'),
(18, 2, 'ニコルの日本語レベルは馬さんには敵わない。'),
(19, 14, '田中さんがこのことに賛成することはあるまい。'),
(20, 14, '親に経済的な負担をかけまいと思って、学費と生活費をアルバイトで稼いでいる。'),
(21, 15, '子供は外で騒いでいるので、注意せずにはいられない。'),
(22, 16, '謝らずには済まない。'),
(23, 17, '学校側はこんな規則違反のことを制止せずには置かない。'),
(24, 18, '聞くべからざることを聞いてしまって後悔した。'),
(25, 19, '芝生に立ち入るべからず。'),
(26, 20, 'いじめは許すまじき行為だ。'),
(27, 21, '彼は聡明であるばかりか、スポーツも万能だ。');
