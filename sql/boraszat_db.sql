CREATE DATABASE  IF NOT EXISTS `boraszat_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci */;
USE `boraszat_db`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: boraszat_db
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `bor`
--

DROP TABLE IF EXISTS `bor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bor` (
  `bor_id` int(11) NOT NULL AUTO_INCREMENT,
  `bor_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `bor_palackozva` int(11) DEFAULT NULL,
  `bor_tipus` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `boraszat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bor_id`),
  KEY `FK_bor_boraszat_idx` (`boraszat_id`),
  CONSTRAINT `FK_bor_boraszat` FOREIGN KEY (`boraszat_id`) REFERENCES `boraszat` (`boraszat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci COMMENT='Ebben a táblában borok kerülnek tárolásra';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bor`
--

LOCK TABLES `bor` WRITE;
/*!40000 ALTER TABLE `bor` DISABLE KEYS */;
INSERT INTO `bor` VALUES (5,'Bock Cuvee',NULL,'Vörös',1),(6,'Soproni Szürkebarát',NULL,'Fehér',2),(7,'Egri Leányka',2005,'Vörös',2),(8,'Tokai Aszú',2009,'Aszú',2),(10,'Tokaji szamorodni',2001,'Aszú',3),(11,'Tokaji furmint',NULL,'Fehér',NULL),(12,'Villányi Kékfrankos',1995,'Vörös',NULL),(13,'Badacsonyi Szürkebarát',1999,'Fehér',NULL),(14,'Soproni Kékfrankos',1998,'Rozé',3),(20,'Irsai Olivér',1998,'Fehér',2),(21,'Dankó Pista',NULL,'Vörös',3),(22,'Villányi Aszú',2000,'Aszú',2),(23,'Egri Cuvee',2017,'Vörös',NULL),(24,'Soproni Koccintós',2003,'Fehér',NULL),(25,'Új bor',2017,'Fehér',1),(26,'Legújabb bor',2002,'Aszú',NULL);
/*!40000 ALTER TABLE `bor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boraszat`
--

DROP TABLE IF EXISTS `boraszat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boraszat` (
  `boraszat_id` int(11) NOT NULL AUTO_INCREMENT,
  `boraszat_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `borvidek` varchar(40) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `alapitas_ev` date NOT NULL,
  PRIMARY KEY (`boraszat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boraszat`
--

LOCK TABLES `boraszat` WRITE;
/*!40000 ALTER TABLE `boraszat` DISABLE KEYS */;
INSERT INTO `boraszat` VALUES (1,'Villányi pincészet','Villány','1994-03-07'),(2,'Pécsi koccintós','Villány','1760-12-31'),(3,'Balatoni elázós',NULL,'1899-12-31'),(4,'Az Újhegyi fehér','Szekszárd','1995-02-26');
/*!40000 ALTER TABLE `boraszat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'boraszat_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-25 19:16:59

DROP USER IF EXISTS `boraszat_user`@`localhost`;
CREATE USER `boraszat_user`@`localhost` IDENTIFIED BY 'Boraszat_123';
GRANT SELECT, INSERT, UPDATE, DELETE ON `boraszat_db`.* TO `boraszat_user`@`localhost`;

FLUSH PRIVILEGES;