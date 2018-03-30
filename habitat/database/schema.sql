-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: moneydata
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allotted`
--

DROP TABLE IF EXISTS `allotted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allotted` (
  `key` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user Id and cookie',
  `user_id` bigint(20) NOT NULL COMMENT 'user Id',
  `startdate` datetime NOT NULL COMMENT 'date time in line',
  `enddate` datetime NOT NULL COMMENT 'date time in line',
  `billtype_key` int(11) NOT NULL COMMENT 'Foreign Key for billtype',
  `amount` double NOT NULL COMMENT 'The amount allotted',
  PRIMARY KEY (`key`),
  KEY `allotted_FI_1` (`billtype_key`),
  KEY `allotted_FI_2` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='a user to the system';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `billtype`
--

DROP TABLE IF EXISTS `billtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billtype` (
  `key` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user Id and cookie',
  `user_id` bigint(20) NOT NULL COMMENT 'user Id',
  `name` varchar(100) DEFAULT NULL COMMENT 'name',
  `description` longtext COMMENT 'Description of the bill type',
  PRIMARY KEY (`key`),
  KEY `billtype_FI_1` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='user''s itinerary';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `key` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user Id and cookie',
  `user_id` bigint(20) NOT NULL COMMENT 'user Id',
  `store` varchar(100) DEFAULT NULL COMMENT 'name',
  `cost` double NOT NULL,
  `date` datetime NOT NULL COMMENT 'date time in line',
  `notes` longtext COMMENT 'Description of the ride',
  `billtype_key` int(11) NOT NULL COMMENT 'Foreign Key for billtype',
  PRIMARY KEY (`key`),
  KEY `purchase_FI_1` (`billtype_key`),
  KEY `purchase_FI_2` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14718 DEFAULT CHARSET=latin1 COMMENT='A ride on a itinerary';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL COMMENT 'facebook id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='a user to the system';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-27  3:08:28
