-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: t
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `quests`
--

DROP TABLE IF EXISTS `quests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quests` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `lvl` char(1) DEFAULT NULL,
  `qtxt` varchar(30) DEFAULT NULL,
  `a1` varchar(30) DEFAULT NULL,
  `a2` varchar(30) DEFAULT NULL,
  `a3` varchar(30) DEFAULT NULL,
  `corans` varchar(30) DEFAULT NULL,
  `qcreated` date DEFAULT NULL,
  `qamd` date DEFAULT NULL,
  `stat` char(1) DEFAULT 'a',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quests`
--

LOCK TABLES `quests` WRITE;
/*!40000 ALTER TABLE `quests` DISABLE KEYS */;
INSERT INTO `quests` VALUES (1,'b','What animal barks','Cat','Dog','Pig','Dog',NULL,NULL,'a'),(2,'b','What shines by day','Sun ','Stars','Moon','Sun',NULL,NULL,'a'),(3,'b','Which swims?','A Stone','A Biscuit','A Fish','A Fish',NULL,NULL,'a'),(17,'b','What particular','h','g','f','Never',NULL,NULL,'a'),(18,'b','Which is the best programming ','Java','C#','PHP','PHP',NULL,NULL,'a'),(19,'b','What time?','h','g','j','Oh OK',NULL,NULL,'a'),(20,'i','What time do I have my dinner?','6pm','6am','Thursday','6pm','2015-12-04',NULL,'a');
/*!40000 ALTER TABLE `quests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studs`
--

DROP TABLE IF EXISTS `studs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studs` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(15) DEFAULT NULL,
  `fname` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `regdate` date DEFAULT NULL,
  `stat` char(1) DEFAULT 'r',
  `amdate` date DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studs`
--

LOCK TABLES `studs` WRITE;
/*!40000 ALTER TABLE `studs` DISABLE KEYS */;
INSERT INTO `studs` VALUES (1,'Murphy','Joe','1997-12-25','2014-09-14','r',NULL),(2,'Farrell','Colin','1987-02-21','2014-09-14','r',NULL),(3,'OBrien','Helen','1994-03-18','2014-09-14','r',NULL),(4,'OBrien','Anne','1990-09-08','2010-09-14','r',NULL),(5,'Brosnan','Johnny','1991-11-08','2011-09-14','r',NULL),(6,'Walsh','John','1961-01-18','1974-09-14','r',NULL),(7,'Healy','Paudie','1951-01-23','1984-09-15','r',NULL);
/*!40000 ALTER TABLE `studs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `dttaken` date DEFAULT NULL,
  `tscore` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `sid` (`sid`),
  CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `studs` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tqs`
--

DROP TABLE IF EXISTS `tqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tqs` (
  `tid` int(11) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0',
  `ansgiven` varchar(30) DEFAULT NULL,
  `qscore` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`,`qid`),
  KEY `qid` (`qid`),
  CONSTRAINT `tqs_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tests` (`tid`),
  CONSTRAINT `tqs_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `quests` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tqs`
--

LOCK TABLES `tqs` WRITE;
/*!40000 ALTER TABLE `tqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tqs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-10 18:02:45
