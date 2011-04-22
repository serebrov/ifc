-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: ifc
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10

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
-- Table structure for table `ifc_bearing`
--

DROP TABLE IF EXISTS `ifc_bearing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ifc_bearing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dre` int(11) NOT NULL COMMENT 'Diameter of rolling element',
  `nre` int(11) NOT NULL COMMENT 'Number of rolling elements',
  `beta` int(11) NOT NULL COMMENT 'Contact angle',
  `dout` int(11) NOT NULL COMMENT 'Outer diameter',
  `din` int(11) NOT NULL COMMENT 'Inner diameter',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ifc_bearing_ifc_tree` (`tree_id`),
  CONSTRAINT `fk_ifc_bearing_ifc_tree` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ifc_gear`
--

DROP TABLE IF EXISTS `ifc_gear`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ifc_gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nteeth` int(11) NOT NULL COMMENT 'number of teeth',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ifc_gear_ifc_tree` (`tree_id`),
  CONSTRAINT `fk_ifc_gear_ifc_tree` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ifc_machine`
--

DROP TABLE IF EXISTS `ifc_machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ifc_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(1024) DEFAULT NULL,
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_machine_ifc_tree` (`tree_id`),
  CONSTRAINT `fk_machine_ifc_tree` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ifc_machine_node`
--

DROP TABLE IF EXISTS `ifc_machine_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ifc_machine_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Machine node',
  `rotation_freq` int(11) NOT NULL COMMENT 'Rotation frequency, rpm (rotation per minute)',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ifc_machine_node_ifc_tree` (`tree_id`),
  CONSTRAINT `fk_ifc_machine_node_ifc_tree` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ifc_tree`
--

DROP TABLE IF EXISTS `ifc_tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ifc_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) DEFAULT NULL COMMENT 'nested set - root',
  `lft` int(11) NOT NULL COMMENT 'nested set - left node',
  `rgt` int(11) NOT NULL COMMENT 'nested set - right node',
  `level` int(11) NOT NULL COMMENT 'newsted set - level',
  `type` int(11) NOT NULL COMMENT 'node model type',
  `name` varchar(1024) NOT NULL COMMENT 'node name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-22 18:13:55
