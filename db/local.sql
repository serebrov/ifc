-- MySQL dump 10.11
--
-- Host: localhost    Database: ifc
-- ------------------------------------------------------
-- Server version	5.0.75-0ubuntu10.5

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
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_bearing` (
  `id` int(11) NOT NULL,
  `dre` int(11) NOT NULL COMMENT 'Diameter of rolling element',
  `nre` int(11) NOT NULL COMMENT 'Number of rolling elements',
  `beta` int(11) NOT NULL COMMENT 'Contact angle',
  `dout` int(11) NOT NULL COMMENT 'Outer diameter',
  `din` int(11) NOT NULL COMMENT 'Inner diameter',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ifc_bearing_ifc_tree1` (`tree_id`),
  CONSTRAINT `fk_ifc_bearing_ifc_tree1` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ifc_bearing_params`
--

DROP TABLE IF EXISTS `ifc_bearing_params`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_bearing_params` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `unit` varchar(45) NOT NULL,
  `value` double NOT NULL,
  `bearing_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ifc_bearing_params_ifc_bearing1` (`bearing_id`),
  CONSTRAINT `fk_ifc_bearing_params_ifc_bearing1` FOREIGN KEY (`bearing_id`) REFERENCES `ifc_bearing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ifc_gear`
--

DROP TABLE IF EXISTS `ifc_gear`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_gear` (
  `id` int(11) NOT NULL,
  `nteeth` int(11) NOT NULL COMMENT 'number of teeth',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ifc_gear_ifc_tree1` (`tree_id`),
  CONSTRAINT `fk_ifc_gear_ifc_tree1` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ifc_machine`
--

DROP TABLE IF EXISTS `ifc_machine`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_machine` (
  `id` int(11) NOT NULL COMMENT 'ÐœÐµÑ…Ð°Ð½Ð·Ð¼',
  `note` varchar(1024) default NULL COMMENT 'ÐŸÑ€Ð¸Ð¼ÐµÑ‡Ð°Ð½Ð¸Ðµ',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_machine_ifc_tree` (`tree_id`),
  CONSTRAINT `fk_machine_ifc_tree` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ifc_machine_node`
--

DROP TABLE IF EXISTS `ifc_machine_node`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_machine_node` (
  `id` int(11) NOT NULL COMMENT 'Machine node',
  `rotation_freq` int(11) NOT NULL COMMENT 'Rotation frequency, rpm (rotation per minute)',
  `tree_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ifc_machine_node_ifc_tree1` (`tree_id`),
  CONSTRAINT `fk_ifc_machine_node_ifc_tree1` FOREIGN KEY (`tree_id`) REFERENCES `ifc_tree` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ifc_tree`
--

DROP TABLE IF EXISTS `ifc_tree`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ifc_tree` (
  `id` int(11) NOT NULL,
  `root` int(11) default NULL COMMENT 'nested set - root',
  `lft` int(11) NOT NULL COMMENT 'nested set - left node',
  `rgt` int(11) NOT NULL COMMENT 'nested set - right node',
  `level` int(11) NOT NULL COMMENT 'newsted set - level',
  `type` int(11) NOT NULL COMMENT 'node model type',
  `name` varchar(1024) NOT NULL COMMENT 'node name',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-03 15:40:30
