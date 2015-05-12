-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: housing_selection
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `ra` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (15,'spiderman','Leo Hall','2015-05-09 15:33:23'),(16,'jimmy.page','New Fulton Townhouses','2015-05-09 17:28:48');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `residence_areas`
--

DROP TABLE IF EXISTS `residence_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `residence_areas` (
  `hall` varchar(30) NOT NULL,
  `slots` int(1) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `residence_areas`
--

LOCK TABLES `residence_areas` WRITE;
/*!40000 ALTER TABLE `residence_areas` DISABLE KEYS */;
INSERT INTO `residence_areas` VALUES ('Leo Hall',4,1),('Champagnat Hall',5,2),('Marian Hall',5,3),('Sheahan Hall',5,4),('Midrise Hall',5,5),('Foy Townhouses',5,6),('Gartland Commons',5,7),('New Townhouses',5,8),('Lower West Cedar St Townhouses',5,9),('Upper West Cedar St Townhouses',5,10),('Fulton St Townhouses',5,11),('Talmadge Court',5,12),('New Fulton Townhouses',4,13);
/*!40000 ALTER TABLE `residence_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `kind` enum('student','admin') NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `CWID` varchar(8) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `class` enum('Freshman','Sophomore','Junior','Senior','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','admin','admin','','','',''),('robert.plant','student','password','Robert Plant','12345678','male','Senior'),('john.paul.jones','student','password','John Paul Jones','12345678','male','Senior'),('jimmy.page','student','password','Jimmy Page','12345678','male','Senior'),('peter.parker','student','password','Peter Parker','12345678','male','Freshman'),('kelly.clarkson','student','password','Kelly Clarkson','99887766','female','Senior'),('bruce.banner','student','password','Bruce Banner','99998888','male','Senior'),('anne.wilson','student','password','Anne Wilson','12345555','female','Senior'),('nancy.wilson','student','password','Nancy Wilson','12344321','female','Senior');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-11 22:20:36
