-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 25, 2008 at 04:51 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `rsa_beta`
-- 
CREATE DATABASE `rsa_beta` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `rsa_beta`;

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_admin`
-- 

CREATE TABLE `rsa_admin` (
  `AdminID` int(11) NOT NULL auto_increment,
  `AdminUser` varchar(30) collate latin1_general_ci default NULL,
  `AdminPassword` varchar(30) collate latin1_general_ci default NULL,
  `AdminLevel` int(4) default '0',
  PRIMARY KEY  (`AdminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `rsa_admin`
-- 

INSERT INTO `rsa_admin` (`AdminID`, `AdminUser`, `AdminPassword`, `AdminLevel`) VALUES 
(1, 'admin', 'admin', -1);

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_contacts`
-- 

CREATE TABLE `rsa_contacts` (
  `ContactID` int(11) NOT NULL auto_increment,
  `ContactName` varchar(30) collate latin1_general_ci default NULL,
  `ContactEmail` varchar(50) collate latin1_general_ci default NULL,
  `ContactSubject` varchar(50) collate latin1_general_ci default NULL,
  `ContactMessage` text collate latin1_general_ci,
  `ContactTime` datetime default NULL,
  PRIMARY KEY  (`ContactID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `rsa_contacts`
-- 

INSERT INTO `rsa_contacts` (`ContactID`, `ContactName`, `ContactEmail`, `ContactSubject`, `ContactMessage`, `ContactTime`) VALUES 
(4, 'asd', 'asd@yahoo.com', 'asd', 'asd', '0000-00-00 00:00:00'),
(3, 'asd', 'asd@yaho.com', 'asd', 'asd', '0000-00-00 00:00:00'),
(5, 'zxc', 'zxc@ua.com', 'asd', 'asd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_galleries`
-- 

CREATE TABLE `rsa_galleries` (
  `GalleryID` int(11) NOT NULL auto_increment,
  `PageID` int(11) default '0',
  `GalleryTitle` varchar(50) collate latin1_general_ci default NULL,
  `GalleryBrief` text collate latin1_general_ci,
  `GalleryThumb` tinytext collate latin1_general_ci,
  `GalleryImage` tinytext collate latin1_general_ci,
  `GalleryOrder` int(11) default '0',
  `GalleryActive` enum('Y','N') collate latin1_general_ci default 'N',
  `GalleryTime` datetime default NULL,
  PRIMARY KEY  (`GalleryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `rsa_galleries`
-- 

INSERT INTO `rsa_galleries` (`GalleryID`, `PageID`, `GalleryTitle`, `GalleryBrief`, `GalleryThumb`, `GalleryImage`, `GalleryOrder`, `GalleryActive`, `GalleryTime`) VALUES 
(1, 9, 'test gallery', 'test gallery sdv sdvdsv sdvsdvsv', NULL, '1.jpg', 1, 'Y', '2009-09-07 23:02:40'),
(2, 9, 'test gallery', 'test gallery sdv sdvdsv sdvsdvsv', NULL, '1.jpg', 1, 'Y', '2009-09-07 23:02:40'),
(3, 1, 'test gallery', 'test gallery', NULL, 'dirty_hippie_by_insomnolepsy.jpg', 1, 'Y', '2010-04-07 15:30:18'),
(4, 9, 'test gallery', 'test gallery sdv sdvdsv sdvsdvsv', NULL, '1.jpg', 1, 'Y', '2009-09-07 23:02:40'),
(5, 9, 'test gallery', 'test gallery sdv sdvdsv sdvsdvsv', NULL, '1.jpg', 1, 'Y', '2009-09-07 23:02:40'),
(6, 1, 'test gallery', 'test gallery', NULL, 'dirty_hippie_by_insomnolepsy.jpg', 1, 'Y', '2010-04-07 15:30:18');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_menus`
-- 

CREATE TABLE `rsa_menus` (
  `MenuID` int(11) NOT NULL auto_increment,
  `MenuSubID` int(11) NOT NULL default '0',
  `MenuType` varchar(30) collate latin1_general_ci default NULL,
  `MenuTitle` varchar(50) collate latin1_general_ci default NULL,
  `MenuBrief` text collate latin1_general_ci,
  `MenuThumb` tinytext collate latin1_general_ci,
  `MenuImage` tinytext collate latin1_general_ci,
  `MenuOrder` int(11) default NULL,
  `MenuActive` enum('Y','N') collate latin1_general_ci default 'N',
  `MenuTime` datetime default NULL,
  PRIMARY KEY  (`MenuID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `rsa_menus`
-- 

INSERT INTO `rsa_menus` (`MenuID`, `MenuSubID`, `MenuType`, `MenuTitle`, `MenuBrief`, `MenuThumb`, `MenuImage`, `MenuOrder`, `MenuActive`, `MenuTime`) VALUES 
(3, 0, 'content', 'expertise', 'o support our clients'' market and service needs, Gensler is organized into practices, each charged with sharing innovation and expertise through an integrated cross-office, cross-practice exchange. This dynamic network ensures that new insights inform the firm''s collective knowledge, creating value for all our clients, industry leaders and start-ups alike.\r\n\r\nOur ability to create environments that enhance organizational performance and achieve measurable business goals is one reason Gensler is a multiple winner of the Business Week/Architectural Record Awards, the U.S. benchmark for business design innovation.', NULL, '6.jpg', 1, 'Y', '2008-10-07 17:34:43'),
(4, 3, 'content', 'Market', 'asd asd as dasd Market', NULL, NULL, 0, 'Y', '2008-10-07 19:22:16'),
(5, 3, 'content', 'services', 'services services services services services', NULL, NULL, 2, 'Y', '2008-10-07 20:37:46'),
(10, 0, 'teams', 'teams', 'wow this a team members', NULL, '12.jpg', 7, 'Y', '2010-04-07 10:34:42'),
(6, 0, 'news', 'news 1', 'o support our clients'' market and service needs, Gensler is organized into practices, each charged with sharing innovation and expertise through an integrated cross-office, cross-practice exchange. This dynamic network ensures that new insights inform the firm''s collective knowledge, creating value for all our clients, industry leaders and start-ups alike.\r\n\r\nOur ability to create environments that enhance organizational performance and achieve measurable business goals is one reason Gensler is a multiple winner of the Business Week/Architectural Record Awards, the U.S. benchmark for business design innovation.', NULL, NULL, 3, 'Y', '2009-04-07 16:35:46'),
(7, 0, 'portfolio', 'projects 1', 'test for projects 1', NULL, NULL, 4, 'Y', '2009-04-07 16:36:37'),
(8, 0, 'contacts', 'contact us', NULL, NULL, NULL, 5, 'Y', '2009-04-07 16:37:44'),
(9, 0, 'content', 'content 7af', 'content 7af', NULL, NULL, 6, 'Y', '2009-09-07 19:01:38'),
(11, 0, 'files', 'pdfs', 'this what you want man? upload files', NULL, '8.jpg', 8, 'Y', '2010-04-07 10:36:15');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_pages`
-- 

CREATE TABLE `rsa_pages` (
  `PageID` int(11) NOT NULL auto_increment,
  `MenuID` int(11) default '0',
  `PageType` varchar(30) collate latin1_general_ci default NULL,
  `PageTitle` varchar(50) collate latin1_general_ci default NULL,
  `PageBrief` text collate latin1_general_ci,
  `PageDescription` text collate latin1_general_ci,
  `PageThumb` tinytext collate latin1_general_ci,
  `PageImage` tinytext collate latin1_general_ci,
  `PageOrder` int(11) default '0',
  `PageFeatured` enum('Y','N') collate latin1_general_ci default 'N',
  `PageActive` enum('Y','N') collate latin1_general_ci default 'N',
  `PageTime` datetime default NULL,
  PRIMARY KEY  (`PageID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `rsa_pages`
-- 

INSERT INTO `rsa_pages` (`PageID`, `MenuID`, `PageType`, `PageTitle`, `PageBrief`, `PageDescription`, `PageThumb`, `PageImage`, `PageOrder`, `PageFeatured`, `PageActive`, `PageTime`) VALUES 
(1, 1, 'portfolio', 'featured', '<h2>hello</h2>as asdasd asd asu ak asjkdh hb ddbkdhb asjk hasdhkb  dbjkh dashdb kasdabh kkdb ak ajksdbak jb sdf shdfsdgf sdg shdg shdg sdgljkal asldjba lsdyu  lahsdb lasda lsdjab lasdb saldwbl anlahsbdl asdasnd balsdb l asdasd asd asu ak asjkdh hb ddbkdhb asjk hasdhkb dbjkh dashdb kasdabh kkdb ak ajksdbak jb sdf shdfsdgf sdg shdg shdg sdgljkal asldjba lsdyu lahsdb lasda lsdjab lasdb saldwbl anlahsbdl asdasnd balsdb l as asdasd asd asu ak asjkdh hb ddbkdhb asjk hasdhkb dbjkh dashdb kasdabh kkdb ak ajksdbak jb sdf shdfsdgf sdg shdg shdg sdgljkal asldjba lsdyu lahsdb lasda lsdjab lasdb saldwbl anlahsbdl asdasnd balsdb l\r\n\r\n', 'featured  Description', NULL, '1.jpg', 1, 'Y', 'Y', '2008-09-07 18:37:58'),
(2, 1, 'portfolio', 'featured 2', 'featured 2 brief', 'featured 2 description', NULL, '2.jpg', 2, 'Y', 'Y', '2008-11-07 12:48:21'),
(3, 1, 'portfolio', 'featured 4', 'featured 4 brief', 'featured 4 description', NULL, '3.jpg', 3, 'Y', 'Y', '2008-11-07 12:50:04'),
(4, 1, 'portfolio', 'featured 3', 'featured 3 brief', 'featured 3 description', NULL, '4.jpg', 4, 'Y', 'Y', '2008-11-07 12:50:34'),
(5, 4, 'content', 'hello world', 'hello world brief', 'hello world description', 'adobe1.jpg', NULL, 1, 'N', 'Y', '2009-06-07 16:58:47'),
(7, 6, 'news', 'CSI Honors Arthur Gensler with Its 2008 Michelange', 'asda sdjkasdas dja news', 'ad asd ad as news', 'adobe1.jpg', '315728344_4997ebcef4.jpg', 1, 'Y', 'Y', '2009-09-07 17:02:24'),
(8, 6, 'news', 'news 2', 'ne wlas das das dn news', 'asd,.as das asd as  news', 'adobe26.jpg', '2519722875_b1c7fcd271.jpg', 2, 'Y', 'Y', '2009-09-07 17:03:34'),
(11, 4, 'content', 'page 1 cool', 'cool 1 page brief ', 'cool 1 page description', 'adobe1.jpg', NULL, 0, 'N', 'Y', '2009-05-07 14:49:51'),
(9, 9, 'content', 'content page', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '11.jpg', 0, 'N', 'Y', '2009-09-07 19:24:03'),
(10, 6, 'news', 'article test man', 'asldj asl djaslkd las daslkd lasd ask aslkd las asld as; das;', ';sd ;fo sdo fsd;lfm d;jklncxoy zxjkn lZInli', 'adobe3.jpg', NULL, 0, 'N', 'Y', '2009-09-07 20:44:05');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_photos`
-- 

CREATE TABLE `rsa_photos` (
  `PhotoID` int(11) NOT NULL auto_increment,
  `MenuID` int(11) default NULL,
  `PhotoTitle` varchar(50) collate latin1_general_ci default NULL,
  `PhotoThumb` tinytext collate latin1_general_ci,
  `PhotoImage` tinytext collate latin1_general_ci,
  `PhotoOrder` int(11) default NULL,
  `PhotoActive` enum('Y','N') collate latin1_general_ci default 'N',
  `PhotoTime` datetime default NULL,
  PRIMARY KEY  (`PhotoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `rsa_photos`
-- 

INSERT INTO `rsa_photos` (`PhotoID`, `MenuID`, `PhotoTitle`, `PhotoThumb`, `PhotoImage`, `PhotoOrder`, `PhotoActive`, `PhotoTime`) VALUES 
(1, 9, 'test', NULL, '1.jpg', 1, 'Y', NULL),
(2, 9, 'test test', NULL, '453589_4a05_550x900.jpg', 2, 'Y', '2010-04-07 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_teams`
-- 

CREATE TABLE `rsa_teams` (
  `TeamID` int(11) NOT NULL auto_increment,
  `TeamTitle` varchar(50) collate latin1_general_ci default NULL,
  `TeamName` varchar(30) collate latin1_general_ci default NULL,
  `TeamBrief` text collate latin1_general_ci,
  `TeamThumb` tinytext collate latin1_general_ci,
  `TeamImage` tinytext collate latin1_general_ci,
  `TeamOrder` int(11) default '0',
  `TeamActive` enum('Y','N') collate latin1_general_ci default 'N',
  `TeamTime` datetime default NULL,
  PRIMARY KEY  (`TeamID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `rsa_teams`
-- 

INSERT INTO `rsa_teams` (`TeamID`, `TeamTitle`, `TeamName`, `TeamBrief`, `TeamThumb`, `TeamImage`, `TeamOrder`, `TeamActive`, `TeamTime`) VALUES 
(1, 'Team Leader', 'Abdullah', 'abdullah one of the visiosight Team Leaders', NULL, 'abdullah_radwan.jpg', 0, 'Y', '2010-04-07 11:02:31'),
(2, 'Team Leader', 'ibrahem', 'as dasd asd as d', NULL, 'cimg0501.jpg', 2, 'Y', '2010-04-07 12:21:24'),
(3, 'developer', 'dude', 'a sdasd asd asd asd asd asd a', NULL, 'abood.png', 3, 'Y', '2010-04-07 13:15:08');

-- --------------------------------------------------------

-- 
-- Table structure for table `rsa_view_points`
-- 

CREATE TABLE `rsa_view_points` (
  `PointID` int(11) NOT NULL auto_increment,
  `MenuID` int(11) default '0',
  `PointTitle` varchar(50) collate latin1_general_ci default NULL,
  `PointBrief` text collate latin1_general_ci,
  `PointThumb` tinytext collate latin1_general_ci,
  `PointFile` tinytext collate latin1_general_ci,
  `PointOrder` int(11) default '0',
  `PointActive` enum('Y','N') collate latin1_general_ci default 'N',
  `PointTime` datetime default NULL,
  PRIMARY KEY  (`PointID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `rsa_view_points`
-- 

INSERT INTO `rsa_view_points` (`PointID`, `MenuID`, `PointTitle`, `PointBrief`, `PointThumb`, `PointFile`, `PointOrder`, `PointActive`, `PointTime`) VALUES 
(1, 11, 'pdfs files', '<p>b;lals pdlas dlas dapsd alsd asld alsd asl dlasdlas dlassd</p>', 'adobe18.jpg', NULL, 1, 'Y', NULL),
(2, 11, 'another one', '<p>another one another one another one&nbsp;another one<br />\r\nanother one another one another one&nbsp;another one</p>', 'adobe23.jpg', 'adobe5.jpg', 2, 'Y', NULL);
