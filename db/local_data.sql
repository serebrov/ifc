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
-- Dumping data for table `ifc_bearing`
--

LOCK TABLES `ifc_bearing` WRITE;
/*!40000 ALTER TABLE `ifc_bearing` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifc_bearing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ifc_gear`
--

LOCK TABLES `ifc_gear` WRITE;
/*!40000 ALTER TABLE `ifc_gear` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifc_gear` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ifc_machine`
--

LOCK TABLES `ifc_machine` WRITE;
/*!40000 ALTER TABLE `ifc_machine` DISABLE KEYS */;
INSERT INTO `ifc_machine` (`id`, `note`, `tree_id`) VALUES (5,'A note',2),(6,'',3);
/*!40000 ALTER TABLE `ifc_machine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ifc_machine_node`
--

LOCK TABLES `ifc_machine_node` WRITE;
/*!40000 ALTER TABLE `ifc_machine_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `ifc_machine_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ifc_tree`
--

LOCK TABLES `ifc_tree` WRITE;
/*!40000 ALTER TABLE `ifc_tree` DISABLE KEYS */;
INSERT INTO `ifc_tree` (`id`, `root`, `lft`, `rgt`, `level`, `type`, `name`) VALUES (1,1,1,6,1,0,'root'),(2,1,2,3,2,1,'Machine 1'),(3,1,4,5,2,1,'Test');
/*!40000 ALTER TABLE `ifc_tree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbl_migration`
--

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES ('m000000_000000_base',1301858988),('m110403_180307_create_tree_table',1301860258),('m110403_190645_create_machine_table',1301860258),('m110403_190658_create_machine_node_table',1301860258),('m110403_190724_create_bearing_table',1301860259),('m110403_190738_create_gear_table',1301860259);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-22 18:13:55
