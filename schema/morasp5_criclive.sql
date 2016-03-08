-- MySQL dump 10.13  Distrib 5.6.28, for Linux (x86_64)
--
-- Host: localhost    Database: morasp5_criclive
-- ------------------------------------------------------
-- Server version	5.6.28-log

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
-- Table structure for table `batsman`
--

DROP TABLE IF EXISTS `batsman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batsman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matchid` int(11) NOT NULL,
  `inning` varchar(255) NOT NULL,
  `batsman` varchar(255) NOT NULL,
  `jersey` int(11) NOT NULL,
  `score` text,
  `howout` varchar(255) DEFAULT NULL,
  `catchby` varchar(255) DEFAULT NULL,
  `bowler` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batsman`
--

LOCK TABLES `batsman` WRITE;
/*!40000 ALTER TABLE `batsman` DISABLE KEYS */;
INSERT INTO `batsman` (`id`, `matchid`, `inning`, `batsman`, `jersey`, `score`, `howout`, `catchby`, `bowler`, `status`) VALUES (11,2,'cmb','Extra',0,NULL,NULL,NULL,NULL,0),(12,2,'cmb','MM Ali',75,'2 3 |  0 1 1 |  1 |  0 1 4 6 6','wicket','','SL Malinga#99',0),(13,2,'cmb','IR Bell',62,'0 1 4 6 |  2 3 1 |  0 0','catch','TM Dilshan#52','HMRKB Herath#50',0),(15,2,'cmb','GS Ballance',42,'0 1 |  2 3 |  0 1 |  0 6 2 3 |  1 |  1 |  0 0 1 |  0 0 0 0 0 0 |  0 1 |  2 0 6 0 1 |  |  2 3 |  1 6 1','lbw','','NLTC Perera#1',0),(16,2,'cmb','JE Root',39,' |  2','lbw','','HMRKB Herath#50',0),(17,2,'cmb','EJG Morgan',84,'6 4 |  4 6 |  0 0','runout','','HMRKB Herath#50',0),(18,2,'cmb','JWA Taylor',24,'0 1 |  6 1 0 0 6 |  0 0 |  |  1 2 3 |  1 |  |  0 1 4 6 |  1 1 2 |  0 1','wicket','','SL Malinga#99',0),(19,2,'cmb','JC Buttler',53,' |  1 |  0 1 | ','lbw','','SL Malinga#99',0),(20,2,'cmb','CR Woakes',17,NULL,'wicket','','SL Malinga#99',0),(21,2,'cmb','SCJ Broad',26,NULL,'catch','TM Dilshan#52','SL Malinga#99',0),(22,2,'cmb','ST Finn',95,' |  2','lbw','','HMRKB Herath#50',0),(23,2,'cmb','JM Anderson',12,'0 1 |  0 0 0 1 |  0',NULL,NULL,NULL,2),(36,2,'mora','Extra',0,'wd wd wd nb nb nb 2nb',NULL,NULL,NULL,0),(37,2,'mora','HDRL Thirimanne',65,'0 6 1 6 1 |  6 1 1 |  0 2 |  6 2 3 |  2 3 |  2 3 |  1 |  1 |  1 0 0 |  0 |  |  1 |  0','','','',1),(38,2,'mora','TM Dilshan',52,'1 |  6 1 1 |  6 6 4 1 |  0 1 1 |  1 6 0 0 |  0 0 4 6 |  4 2 6 0 0 |  0 0 0 0 0 |  4 0 1 | ','wicket','','ST Finn#95',0),(40,2,'mora','KC Sangakkara',25,'0 6 1 6 1 |  6 1 1 |  0 2 |  6 2 3 |  2 3 |  2 3 |  1 |  1 |  1 0 0 |  0 |  |  1 |  0 |  1 1 |  1',NULL,NULL,NULL,2),(50,3,'jpura','Extra',0,'0wd nb 1ex 0wd 0nb 0wd 0nb 0wd 1ex 1ex 1ex 0wd',NULL,NULL,NULL,0),(51,3,'jpura','S.N.Wedisinghege',5,'0 0 0 0 4 0 |   0 5 |  0 0 1 0 0 0 |  2 0 2 0 |  |  1 4 |  |  |  1 |  0 |  0 0 4 0 1 |  0 0 1 |  0 0 0 0 0 4 |  0 0','wicket','','B.D.Dananjaya#1',0),(52,3,'jpura','H.M.S.S.Herath',2,'0 0 1 2 |  1 |  4 1 |  0','catch','R.A.D.Sujith#5','G.D.M.Senarathna#2',0),(53,3,'jpura','S.A.R.Sandekelum',8,'0 0 0 0 |  0 0 0 1 |  4 0 0 0 0 1 |  0 0 0 0 0 0 |  0 0 4 0 0 |  0 0 0 0 |  0 |  0 2 0 |  |  1 |  1 0 1 0 |  2 |  1 1 4 0 | ','wicket','','B.D.Dananjaya#1',0),(54,3,'jpura','J.D.Y.Lakshitha',9,'0 0 |  1 1 |  0 0 0 1 |  1 1 |  0 1 |  2','wicket','','V.K.Kottawasinghe#7',0),(55,3,'jpura','J.D.Karunarathna',11,'4 0 1 |  1 |  1 0 1 |  1 |  1 0 1 |  0 1 |  1 1 | ','catch','G.A.T.Wijesekara#10','G.A.T.Wijesekara#10',0),(56,3,'jpura','B.M.C.N.Niroshana',7,'1','catch','P.V.G.Samkalpa#4','V.K.Kottawasinghe#7',0),(57,3,'jpura','S.A.D.S.N.Senadeera',1,' |  1 1 1 | ','lbw','','V.K.Kottawasinghe#7',0),(58,3,'jpura','D.S.R.D.I.Gunarathne',4,NULL,'wicket','','V.K.Kottawasinghe#7',0),(59,3,'jpura','P.H.P.Chathuranga',10,'1 0 0 |  1 0 1 |  2 0 4 | ','catch','N.L.W.Wijewantha#3','N.L.W.Wijewantha#3',0),(60,3,'jpura','W.R.C.Fernanso',6,'1 1 |  0 2 2 1','catch','V.K.Kottawasinghe#7','G.A.T.Wijesekara#10',0),(61,3,'jpura','P.L.D.K.Madhusanka',3,NULL,NULL,NULL,NULL,2),(62,3,'mora','Extra',0,'0wd 0wd 0wd 0wd 0wd 0nb 0wd',NULL,NULL,NULL,0),(63,3,'mora','D.M.O.R.Mahadiwulwela',8,NULL,'catch','S.N.Wedisinghege#5','W.R.C.Fernanso#6',0),(64,3,'mora','N.L.W.Wijewantha',3,' | 0 0 1 |  |  0 4 0 0 0','catch','J.D.Karunarathna#11','J.D.Karunarathna#11',0),(65,3,'mora','T.B.A.D.P.Saranathissa',9,'0 0 0 0 0 |  0 0 0 1 |  0 0','lbw','','W.R.C.Fernanso#6',0),(66,3,'mora','B.D.Dananjaya',1,'0 0 4 |  |  0 0 0 0 0 0 |  0 |  1 0 |  0 1 1 |  1 1 |  0 0 0 4 1 |  0 0 |  0 0 |  ',NULL,NULL,NULL,1),(67,3,'mora','G.D.M.Senarathna',2,' |  |  0 0 0 0 1 |  1 0 0 1 |  0 0 1 0 |  0 1 0 0 |  1 |  0 0 0 1 |  0 1 |  0','catch','P.H.P.Chathuranga#10','P.L.D.K.Madhusanka#3',0),(68,3,'mora','P.V.G.Samkalpa',4,'1 |  0 0 0 0 1 |  |  |  0 0 0 0 1 |  0 0 4 0 2 |  1 |  6 1 |  1 1 1 |  0 0 4 1 |  6 4 0 1 |  0 0 1 |  4 6 6 6 4 0','catch','W.R.C.Fernanso#6','P.L.D.K.Madhusanka#3',0),(69,3,'mora','V.K.Kottawasinghe',7,'0 |  0 |  |  |  4 | ','runout','','S.A.D.S.N.Senadeera#1',0),(70,3,'mora','T.M.T.S.D.B. Thennakoon',6,' |  0 0 0 1 1 |  4 0 2 1 |  1 0 1 |  0 0 |  0 1 |  0 4 1 | ',NULL,NULL,NULL,2),(71,4,'mora','Extra',0,'0wd 4wd 0wd 0wd 0wd 1ex 0wd 1ex 1ex 0wd 1ex 1ex 4wd 0wd 0wd 0wd 0wd 1ex',NULL,NULL,NULL,0),(72,4,'mora','M.O.R.Mahadiulwewa',9,'4 1 0 0 1 |  1 4 0 0 0 |  |  0 0 0 0 0 0 |  0 0 0 0 |  0 0 0 4 0 |  0 0 |  0 0 0 0 |  2 0 0 0 |  0 |  0 1 |  0 4 4 0 4 1 |  1 4 1 |  0 4 1 |  0 4 4 0 0 1 |  1 |  0 0 0 0 0 0 |  |  |  0 0 0 1 |  1 0 1 |  2 0 0 0 0 0 | ','wicket',NULL,'S.Maudshan#5',0),(73,4,'mora','N.L.W.Wijewantha',3,'1 |  1 |  0 0 0 0 0 0 |  |  0 3 |  1 |  0 0 0 |  0 0 |  2 1 |  0 2 0 0 0 |  0 0 0 1 |  |  1','catch','W.A.R.K.Ranaweera#10','S.Madushan#5',0),(74,4,'mora','B.D.Dananjaya',1,'0 |  0 0 2 |  |  0 6 0 2 6 |  | ','lbw','','A.B.B.R.Priyadarshana#3',0),(75,4,'mora','V.K.Kottawasinghe',8,'0 0 0 0 1 |  0 0 0 0 0 0 |  2 0 |  0 0 0 |  |  |  0 0 4 1 |  4 0 0 0 0 |  4 0 4 |  0 0 0 |  0 1 |  0 0 1 0 0 |  0 0 0 2 |  0 0 1 |  0 1 |  0 0 0 0 0 0 |  |  0 0 4 0 0 2 |  1 1 |  0 1 1 0 |  6 1 |  1 0 0 0 0 |  |  0 4 1 |  1 0 |  |  1 1','catch','T.Priyalaxsan#7','M.S.N.Silva#6',0),(76,4,'mora','G.D.M.Senarathne',2,'0 0 0 0 0 |  0 1 |  1 |  0 0 1 |  0 0 1 |  0 0 1','catch','S.Maudshan#5','M.S.N.Silva#6',0),(77,4,'mora','P.V.G.Sankalpa',5,' |  1 |  4 1 |  1 6 0 |  0 4 0 0 |  |  0 0 0 0 0 2 |  |  1 0 1 0 |  1 1 |  1 0 0 0 | ','catch','D.M.S.S.Fernando#1','J.K.R.S.Kumarasinghe#4',0),(78,4,'mora','T.M.T.S.D.B.Thennakoon',6,' |  0 0 0 0 0 0 |  0 0 0 |  0 0 0 1 |  0 0','catch','G.D.D.Prabath#11','J.K.R.S.Kumarasinghe#4',0),(79,4,'mora','T.B.A.D.P.Saranathissa',7,'0 0 0 |  1 0 1 |  |  1 1 1 |  |  1 1 |  |  2 4 2 1',NULL,NULL,NULL,2),(80,4,'mora','H.P.T.Hettiarachchi',11,' |  0 0 0 0 0 0 |  1 1 1 |  2 0 0 0 0 4 |  1 2','runout','','T.Priyalaxsan#7',0),(81,4,'mora','G.A.T.Wijesekara',10,'0 |  0 0 0','catch','M.S.N.Silva#6','S.Maudshan#5',0),(82,4,'mora','R.A.D.Sujith',4,'0 0 |  1 0',NULL,NULL,NULL,1),(83,4,'susl','Extra',0,'0nb 0wd 0wd 0wd 4wd 1ex 2ex 0wd 0wd 1ex',NULL,NULL,NULL,0),(84,4,'susl','W.M.G.U.Abesekara',2,'0 0 0 1 0 1 |  0 0 0 0 0 0 |  0 1 |  1 1 |  0 0 0 0 1 |  0 0 4 0 0 0 |  |  0 0 0 0 4 4 |  |  0 0 0 0 0','catch','T.M.T.S.D.B.Thennakoon#6','V.K.Kottawasinghe#8',0),(85,4,'susl','G.D.D.Prabath',11,'','runout',NULL,'R.A.D.Sujith#4',0),(86,4,'susl','S.Maudshan',5,'0 4 |  0 0 1 |  |  0 0 1 0 |  0 0 0 1 |  0 |  |  0 0 0 6 0 0 |  |  0 0','catch','H.P.T.Hettiarachchi#11','G.D.M.Senarathne#2',0),(87,4,'susl','J.K.R.S.Kumarasinghe',4,'0 0 0 |  |  0 0 0 0 0 4 |  0 0 |  |  0 0 0 0 0 0 |  0 0 |  0 0 0 |  |  0 0 0 4 4 0 |  0 0 |  1 0 1 |  0 0 0 1 |  0 0 4 0','lbw','','B.D.Dananjaya#1',0),(88,4,'susl','W.A.R.K.Ranaweera',10,' |  |  0 0 0 1 |  0 0 0 0 0 0 |  |  0 0 0 1 |  0 0 1 |  4 1 0 0 0 0 |  |  0 0 2 1 |  1 1 0 |  0 0 |  | ','wicket','','G.A.T.Wijesekara#10',0),(89,4,'susl','M.A.S.Thusira',9,'0 |  4 0 |  |  1 0 0 |  1 |  0 0 1 0 1 |  0','catch','T.M.T.S.D.B.Thennakoon#6','B.D.Dananjaya#1',0),(90,4,'susl','D.M.S.S.Fernando',1,'0 0 1 |  0 0 0 0 0 0 |  0 0 1 |  1 0 0 0 0 |  1 |  0 0 |  0 |  |  0 1 |  1 0 |  0 0 0 |  1 0 |  0 0 |  1 |  0 0 2 0 0 0 |  |  6 1 |  4 0 0 0 |  |  0 0 1 |  2','catch','T.M.T.S.D.B.Thennakoon#6','R.A.D.Sujith#4',0),(91,4,'susl','A.B.B.R.Priyadarshana',3,'0 1 |  0 0 0 0 1 |  0 0 0 0 0 1 |  0','catch','H.P.T.Hettiarachchi#11','G.A.T.Wijesekara#10',0),(92,4,'susl','T.Priyalaxsan',7,'0 6 |  0 4 0 1 |  0 0 1 |  0 0 1 1 | ','catch','P.V.G.Sankalpa#5','G.A.T.Wijesekara#10',0),(93,4,'susl','M.S.N.Silva',6,'0 0 1 |  0 1 0 0 0 |  |  0 0 0','catch','T.B.A.D.P.Saranathissa#7','V.K.Kottawasinghe#8',0),(94,4,'susl','T.M.N.Krishantha',8,'0 0 |  0 0 0 1 |  0 1 |  0 4 0 0 0 0 |  0 0 0 | ',NULL,NULL,NULL,2),(95,4,'susl','end2',0,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `batsman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bowler`
--

DROP TABLE IF EXISTS `bowler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bowler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matchid` int(11) NOT NULL,
  `inning` varchar(255) NOT NULL,
  `bowler` varchar(255) NOT NULL,
  `jersey` int(11) NOT NULL,
  `score` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bowler`
--

LOCK TABLES `bowler` WRITE;
/*!40000 ALTER TABLE `bowler` DISABLE KEYS */;
INSERT INTO `bowler` (`id`, `matchid`, `inning`, `bowler`, `jersey`, `score`, `status`) VALUES (26,2,'cmb','SL Malinga',99,'0 1 2 3 4 6',2),(27,2,'cmb','RAS Lakmal',11,'0 1 2 3 1 1',2),(28,2,'cmb','HMRKB Herath',50,'0 0 W 0 1 1',2),(29,2,'cmb','SL Malinga',99,'0 1 2 3 4 W',2),(30,2,'cmb','HMRKB Herath',50,'0 1 2 W 6 4',2),(31,2,'cmb','AD Mathews',10,'0 6 2 3 4 6',2),(32,2,'cmb','HMRKB Herath',50,'1 0 0 W 0 1',2),(33,2,'cmb','NLTC Perera',1,'6 1 1 0 0 6',2),(34,2,'cmb','HMRKB Herath',50,'0 0 1 0 0 0',2),(35,2,'cmb','SL Malinga',99,'0 0 0 0 0 0',2),(36,2,'cmb','RAS Lakmal',11,'1 0 0 1 2 3',2),(37,2,'cmb','HMRKB Herath',50,'1 2 0 6 0 1',2),(39,2,'cmb','HMRKB Herath',50,'0 1 2 3 4 6',2),(40,2,'cmb','NLTC Perera',1,'1 1 6 1 1 W',2),(41,2,'cmb','SL Malinga',99,'0 1 1 W W W',2),(42,2,'cmb','HMRKB Herath',50,'0 1 2 W 0 1',2),(43,2,'cmb','SL Malinga',99,'0 0 0 1 W',1),(46,2,'mora','JM Anderson',12,'0 6 1 1 6 1',2),(47,2,'mora','ST Finn',95,'6 1 6 1 1 1',2),(48,2,'mora','JM Anderson',12,'6 6 4 1 0 2',2),(49,2,'mora','SCJ Broad',26,'0 1 6 2 3 1',2),(50,2,'mora','JM Anderson',12,'1 2 3 6 0 0',2),(51,2,'mora','SCJ Broad',26,'2 3 0 0 4 6',2),(52,2,'mora','MM Ali',75,'1 4 2 6 0 0',2),(53,2,'mora','ST Finn',95,'1 0 0 0 0 0',2),(54,2,'mora','MM Ali',75,'1 4 0 1 0 0',2),(55,2,'mora','ST Finn',95,'W 0 0 0 1 0',2),(56,2,'mora','CR Woakes',17,'0 0 0 2 0 1',2),(57,2,'mora','ST Finn',95,'4 0 0 1 1 0',2),(71,2,'mora','JM Anderson',12,'0 6 0 1 0 0wd 0',2),(72,2,'mora','ST Finn',95,'0 1 0wd 1wd 6 1 1 0',2),(73,2,'mora','SCJ Broad',26,'0nb 1nb 4nb 6',1),(74,3,'jpura','R.A.D.Sujith',5,'0 0 0 0 4 0',2),(76,3,'jpura','N.L.W.Wijewantha',3,'0wd 0 0 1 0 5 2',2),(77,3,'jpura','R.A.D.Sujith',5,'0 0 1nb 1 0 0 0',2),(78,3,'jpura','N.L.W.Wijewantha',3,'4 1 2 0 2 0',2),(79,3,'jpura','G.D.M.Senarathna',2,'0 W 0 0 0 0',2),(80,3,'jpura','N.L.W.Wijewantha',3,'1 0 0 0 1 4',2),(81,3,'jpura','G.D.M.Senarathna',2,'4 0 0 0 0 1',2),(82,3,'jpura','V.K.Kottawasinghe',7,'0 0 0 0 0 0',2),(83,3,'jpura','G.D.M.Senarathna',2,'1 0 0 4 0 0',2),(84,3,'jpura','V.K.Kottawasinghe',7,'0 1ex 0 0 0 0',2),(85,3,'jpura','R.A.D.Sujith',5,'0 0 0wd 4 0 0nb 1 0',2),(86,3,'jpura','V.K.Kottawasinghe',7,'0 0 0wd 1 0 2 0',2),(87,3,'jpura','G.A.T.Wijesekara',10,'0 0 0 0 0 4',2),(88,3,'jpura','B.D.Dananjaya',1,'0nb 1 0 0 W 0 0',2),(89,3,'jpura','G.A.T.Wijesekara',10,'1 1 0 1 1 0',2),(90,3,'jpura','B.D.Dananjaya',1,'0 0 0 0wd 1 2 1ex',2),(91,3,'jpura','G.A.T.Wijesekara',10,'1 1 1 1 4 0',2),(92,3,'jpura','B.D.Dananjaya',1,'0 1 W 4 0 1',2),(93,3,'jpura','V.K.Kottawasinghe',7,'1ex 2 W 1 1 W',2),(94,3,'jpura','B.D.Dananjaya',1,'1 1 1 0 1 1',2),(95,3,'jpura','V.K.Kottawasinghe',7,'W W 1 1 0 0',2),(96,3,'jpura','B.D.Dananjaya',1,'1 1 0 1 0 1',2),(97,3,'jpura','G.A.T.Wijesekara',10,'2 0 4 1ex 0 1',2),(98,3,'jpura','N.L.W.Wijewantha',3,'1 W 1 1 0wd 1',2),(99,3,'jpura','G.A.T.Wijesekara',10,'0 2 2 1 W W',1),(100,3,'mora','W.R.C.Fernanso',6,'W 0 0 0 0 0',2),(101,3,'mora','J.D.Karunarathna',11,'0 1 0 0 0 1',2),(102,3,'mora','W.R.C.Fernanso',6,'0 0 0wd W 0 0 4',2),(103,3,'mora','J.D.Karunarathna',11,'0 4 0wd 0 0 0 W',2),(104,3,'mora','W.R.C.Fernanso',6,'0 0 0 0 0 0',2),(105,3,'mora','S.A.D.S.N.Senadeera',1,'0 0 0 0 1 0',2),(106,3,'mora','P.H.P.Chathuranga',10,'1 1 0 0 1 0',2),(107,3,'mora','S.A.D.S.N.Senadeera',1,'0 0 1 0 1 0',2),(108,3,'mora','P.H.P.Chathuranga',10,'0wd 1 0 1 1 0 0',2),(109,3,'mora','P.L.D.K.Madhusanka',3,'0 0 0 4 1 1',2),(110,3,'mora','P.H.P.Chathuranga',10,'0 0 0 1 0 0',2),(111,3,'mora','J.D.Karunarathna',11,'0 0 0 1 0 0',2),(112,3,'mora','P.L.D.K.Madhusanka',3,'0wd 0 W 0wd 0 0 1 1',2),(113,3,'mora','S.A.D.S.N.Senadeera',1,'0 0 0 0 1 0',2),(116,3,'mora','P.L.D.K.Madhusanka',3,'0 0 0 0 1 4',2),(117,3,'mora','S.A.D.S.N.Senadeera',1,'0 W 0 4 0 2',2),(118,3,'mora','P.L.D.K.Madhusanka',3,'0 0 0 1 1 1',2),(119,3,'mora','S.A.D.S.N.Senadeera',1,'4 0 2 1 6 1',2),(120,3,'mora','W.R.C.Fernanso',6,'1 1 1 0 1 1',2),(121,3,'mora','J.D.Karunarathna',11,'0 0 4 1 0 0',2),(122,3,'mora','P.H.P.Chathuranga',10,'6 0nb 4 0 1 0 1',2),(123,3,'mora','J.D.Karunarathna',11,'0 4 1 0 0 1',2),(124,3,'mora','P.L.D.K.Madhusanka',3,'4 0wd 6 6 6 4',1),(125,4,'mora','T.Priyalaxsan',7,'4 1 1 0 0 1',2),(126,4,'mora','T.M.N.Krishantha',8,'1 1 4 0 0 0',2),(127,4,'mora','T.Priyalaxsan',7,'0 0 0 0 0 0',2),(128,4,'mora','T.M.N.Krishantha',8,'0 0wd 0 0 0 0 0',2),(129,4,'mora','T.Priyalaxsan',7,'0 4wd 3 0wd 0 0 0 0',2),(130,4,'mora','T.M.N.Krishantha',8,'1 0wd 0 0 0 4 0',2),(131,4,'mora','T.Priyalaxsan',7,'0 0 0 0wd 1ex 0 0wd 0',2),(132,4,'mora','T.M.N.Krishantha',8,'0 0 1ex 0 0 0 0',2),(133,4,'mora','T.Priyalaxsan',7,'2 1 2 0 0 0',2),(134,4,'mora','T.M.N.Krishantha',8,'0 2 0 0 0 1ex 0',2),(135,4,'mora','T.Priyalaxsan',7,'0 0 0 1 0 0wd 1',2),(136,4,'mora','T.M.N.Krishantha',8,'0 4 4 0 4 1',2),(137,4,'mora','S.Maudshan',5,'1 1 4 1 W 0',2),(138,4,'mora','T.M.N.Krishantha',8,'0 4 1 0 0 2',2),(139,4,'mora','S.Maudshan',5,'0 4 4 0 0 1',2),(140,4,'mora','T.M.N.Krishantha',8,'1 0 6 0 2 6',2),(141,4,'mora','S.Maudshan',5,'0 0 0 0 0 0',2),(142,4,'mora','A.B.B.R.Priyadarshana',3,'W 0 0 0 0 1',2),(143,4,'mora','S.Maudshan',5,'0 0 0 0 0 0',2),(144,4,'mora','A.B.B.R.Priyadarshana',3,'0 0 0 1 2 0',2),(145,4,'mora','S.Maudshan',5,'1 0 0 1ex 0 1 0',2),(146,4,'mora','A.B.B.R.Priyadarshana',3,'2 0 1ex 0 0 0 0',2),(147,4,'mora','S.Maudshan',5,'W 0 0 0 0 0',2),(148,4,'mora','A.B.B.R.Priyadarshana',3,'0 0 4 1 0 1',2),(149,4,'mora','S.Maudshan',5,'1 4 0 0 0 0',2),(150,4,'mora','M.S.N.Silva',6,'0 0 1 4wd 4 0 4',2),(151,4,'mora','S.Maudshan',5,'0 0 1 0 0 0',2),(152,4,'mora','M.S.N.Silva',6,'0 0 1 0 1 W',2),(153,4,'mora','J.K.R.S.Kumarasinghe',4,'0 0wd 0 1 1 0 0',2),(154,4,'mora','A.B.B.R.Priyadarshana',3,'4 1 0 0 0 2',2),(155,4,'mora','J.K.R.S.Kumarasinghe',4,'1 0 0 1 6 0',2),(156,4,'mora','A.B.B.R.Priyadarshana',3,'0 1 0 4 0 0',2),(157,4,'mora','T.Priyalaxsan',7,'0 0 0 0 0 0',2),(158,4,'mora','A.B.B.R.Priyadarshana',3,'0 0 0 0 0 2',2),(159,4,'mora','J.K.R.S.Kumarasinghe',4,'0 0 4 0 0 2',2),(160,4,'mora','A.B.B.R.Priyadarshana',3,'1 1 0 1 1 0',2),(161,4,'mora','T.Priyalaxsan',7,'0 1 1 1 1 0',2),(162,4,'mora','A.B.B.R.Priyadarshana',3,'1 6 1 0 0 0',2),(163,4,'mora','J.K.R.S.Kumarasinghe',4,'1 W 0wd 0 0 0 0',2),(164,4,'mora','A.B.B.R.Priyadarshana',3,'0 0 0 0 0 0',2),(165,4,'mora','J.K.R.S.Kumarasinghe',4,'0 0wd 4 1 0 0 0',2),(166,4,'mora','M.S.N.Silva',6,'1 0 0 0 1 0',2),(167,4,'mora','J.K.R.S.Kumarasinghe',4,'0 0 W 0 0 0',2),(168,4,'mora','M.S.N.Silva',6,'1 1 1 0 1 W',2),(169,4,'mora','J.K.R.S.Kumarasinghe',4,'0 0 0 0 0 0',2),(170,4,'mora','M.S.N.Silva',6,'0wd 1 1 1 1 1 1',2),(171,4,'mora','S.Maudshan',5,'2 0 0 0 0 4',2),(172,4,'mora','T.Priyalaxsan',7,'1 1 1 2 W 0',2),(173,4,'mora','S.Maudshan',5,'0 0 0 W 0 0',2),(174,4,'mora','T.Priyalaxsan',7,'2 4 1ex 1 2 1 0',1),(175,4,'susl','R.A.D.Sujith',4,'0 0 0 0 0 0nb 4',2),(176,4,'susl','N.L.W.Wijewantha',3,'1 0 0 1 0 1',2),(177,4,'susl','R.A.D.Sujith',4,'0 0 0 0 0 0',2),(178,4,'susl','N.L.W.Wijewantha',3,'0wd 0wd 0 0 1 0 1 0',2),(179,4,'susl','R.A.D.Sujith',4,'1 0 0 0 1 1',2),(180,4,'susl','N.L.W.Wijewantha',3,'0wd 0 0 0 0 1 0',2),(181,4,'susl','R.A.D.Sujith',4,'0 0 4 0 0 0',2),(182,4,'susl','G.D.M.Senarathne',2,'0 0 0 6 0 0',2),(183,4,'susl','V.K.Kottawasinghe',8,'0 4wd 0 0 0 4 4',2),(184,4,'susl','G.D.M.Senarathne',2,'0 0 W 0 0 0',2),(185,4,'susl','V.K.Kottawasinghe',8,'0 0 0 0 0 W',2),(186,4,'susl','G.D.M.Senarathne',2,'0 0 0 0 0 4',2),(187,4,'susl','V.K.Kottawasinghe',8,'0 0 0 1 0 0',2),(188,4,'susl','G.D.M.Senarathne',2,'0 0 0 0 0 0',2),(189,4,'susl','V.K.Kottawasinghe',8,'0 0 0 0 0 0',2),(190,4,'susl','G.D.M.Senarathne',2,'0 0 0 1 0 0',2),(191,4,'susl','V.K.Kottawasinghe',8,'0 0 1 0 0 0',2),(192,4,'susl','G.A.T.Wijesekara',10,'4 1 1ex 0 0 0 0',2),(193,4,'susl','V.K.Kottawasinghe',8,'0 0 0 4 4 0',2),(194,4,'susl','G.A.T.Wijesekara',10,'0 0 2 1 0 0',2),(195,4,'susl','B.D.Dananjaya',1,'1 1 1 0 1 0',2),(196,4,'susl','G.A.T.Wijesekara',10,'0 0 0 1 0 2ex 0',2),(197,4,'susl','B.D.Dananjaya',1,'0 0 4 0 W 0',2),(198,4,'susl','G.A.T.Wijesekara',10,'W 0 0 1 4 0',2),(199,4,'susl','V.K.Kottawasinghe',8,'0 0 0 0 0 0',2),(200,4,'susl','G.A.T.Wijesekara',10,'1 0 0 1 0wd 0 0',2),(201,4,'susl','B.D.Dananjaya',1,'1 1 0 0 0 0',2),(202,4,'susl','G.A.T.Wijesekara',10,'0 0 1 1 0 1',2),(203,4,'susl','B.D.Dananjaya',1,'0 W 0wd 0 1 0 0',2),(204,4,'susl','G.A.T.Wijesekara',10,'0 0 0 0 1 0',2),(205,4,'susl','B.D.Dananjaya',1,'0 0 0 0 0 1',2),(206,4,'susl','G.A.T.Wijesekara',10,'0 W 0 1 0 6',2),(207,4,'susl','B.D.Dananjaya',1,'1 0 4 0 1 0',2),(208,4,'susl','G.A.T.Wijesekara',10,'0 0 1 0 0 0',2),(209,4,'susl','V.K.Kottawasinghe',8,'0 0 1 1 1 0',2),(210,4,'susl','G.A.T.Wijesekara',10,'W 0 0 1 0 0',2),(211,4,'susl','V.K.Kottawasinghe',8,'0 1 1 0 0 0',2),(212,4,'susl','R.A.D.Sujith',4,'0 0 2 0 0 0',2),(213,4,'susl','V.K.Kottawasinghe',8,'0 0 0 W 1ex 0 0',2),(214,4,'susl','R.A.D.Sujith',4,'6 1 0 0 0 1',2),(215,4,'susl','B.D.Dananjaya',1,'0 1 4 0 0 0',2),(216,4,'susl','R.A.D.Sujith',4,'0 4 0 0 0 0',2),(217,4,'susl','B.D.Dananjaya',1,'0 0 1 0 0 0',2),(218,4,'susl','R.A.D.Sujith',4,'2 W',1);
/*!40000 ALTER TABLE `bowler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cricketmatch`
--

DROP TABLE IF EXISTS `cricketmatch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cricketmatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `at` varchar(255) NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `umpire1` varchar(255) NOT NULL,
  `umpire2` varchar(255) NOT NULL,
  `scorer1` varchar(255) NOT NULL,
  `scorer2` varchar(255) NOT NULL,
  `targetscore` varchar(255) DEFAULT NULL,
  `targetover` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cricketmatch`
--

LOCK TABLES `cricketmatch` WRITE;
/*!40000 ALTER TABLE `cricketmatch` DISABLE KEYS */;
INSERT INTO `cricketmatch` (`id`, `date`, `type`, `at`, `team1`, `team2`, `umpire1`, `umpire2`, `scorer1`, `scorer2`, `targetscore`, `targetover`, `message`, `status`) VALUES (2,'2015-04-09','oneday','mora','mora','cmb','BNJ Oxenford','RJ Tucker','DC Boon','SD Fry',NULL,NULL,NULL,2),(3,'2015-05-06','oneday','mora','mora','jpura','Nipuna Liyanage','Susila Gunawardana','Clud deSilva','None',NULL,'25',NULL,0),(4,'2015-06-13','oneday','susl','mora','susl','Brian Wimalasena','M.U.S.Peris','Najith Dammika','Scorer',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `cricketmatch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inning`
--

DROP TABLE IF EXISTS `inning`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matchid` int(11) NOT NULL,
  `inning1` varchar(255) NOT NULL,
  `inning2` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inning`
--

LOCK TABLES `inning` WRITE;
/*!40000 ALTER TABLE `inning` DISABLE KEYS */;
INSERT INTO `inning` (`id`, `matchid`, `inning1`, `inning2`, `status`) VALUES (10,2,'cmb','mora','3'),(11,3,'jpura','mora','3'),(12,4,'mora','susl','3');
/*!40000 ALTER TABLE `inning` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matchid` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `player` varchar(255) DEFAULT NULL,
  `jersey` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` (`id`, `matchid`, `team`, `player`, `jersey`, `status`) VALUES (106,2,'mora','HDRL Thirimanne',65,1),(107,2,'mora','TM Dilshan',52,1),(108,2,'mora','KC Sangakkara',25,1),(109,2,'mora','DPMD Jayawardene',40,1),(110,2,'mora','AD Mathews',10,1),(111,2,'mora','FDM Karunaratne',20,1),(112,2,'mora','LD Chandimal',85,1),(113,2,'mora','NLTC Perera',1,1),(114,2,'mora','HMRKB Herath',50,1),(115,2,'mora','SL Malinga',99,1),(116,2,'mora','RAS Lakmal',11,1),(117,2,'mora','',0,1),(118,2,'mora','',0,1),(119,2,'mora','',0,1),(120,2,'mora','',0,1),(121,2,'cmb','MM Ali',75,1),(122,2,'cmb','IR Bell',62,1),(123,2,'cmb','GS Ballance',42,1),(124,2,'cmb','JE Root',39,1),(125,2,'cmb','EJG Morgan',84,1),(126,2,'cmb','JWA Taylor',24,1),(127,2,'cmb','JC Buttler',53,1),(128,2,'cmb','CR Woakes',17,1),(129,2,'cmb','SCJ Broad',26,1),(130,2,'cmb','ST Finn',95,1),(131,2,'cmb','JM Anderson',12,1),(132,2,'cmb','',0,1),(133,2,'cmb','',0,1),(134,2,'cmb','',0,1),(135,2,'cmb','',0,1),(136,3,'mora','B.D.Dananjaya',1,1),(137,3,'mora','G.D.M.Senarathna',2,1),(138,3,'mora','N.L.W.Wijewantha',3,1),(139,3,'mora','P.V.G.Samkalpa',4,1),(140,3,'mora','R.A.D.Sujith',5,1),(141,3,'mora','T.M.T.S.D.B. Thennakoon',6,1),(142,3,'mora','V.K.Kottawasinghe',7,1),(143,3,'mora','D.M.O.R.Mahadiwulwela',8,1),(144,3,'mora','T.B.A.D.P.Saranathissa',9,1),(145,3,'mora','G.A.T.Wijesekara',10,1),(146,3,'mora','H.P.T.Hettiarachchi',11,1),(147,3,'mora','I.M.Karunanayaka',12,1),(148,3,'mora','B.A.H.Chathuranga',13,1),(149,3,'mora','D.R.K.Dharmapriya',14,1),(150,3,'mora','H.M.S.S.Gajaweera',15,1),(151,3,'jpura','S.A.D.S.N.Senadeera',1,1),(152,3,'jpura','H.M.S.S.Herath',2,1),(153,3,'jpura','P.L.D.K.Madhusanka',3,1),(154,3,'jpura','D.S.R.D.I.Gunarathne',4,1),(155,3,'jpura','S.N.Wedisinghege',5,1),(156,3,'jpura','W.R.C.Fernanso',6,1),(157,3,'jpura','B.M.C.N.Niroshana',7,1),(158,3,'jpura','S.A.R.Sandekelum',8,1),(159,3,'jpura','J.D.Y.Lakshitha',9,1),(160,3,'jpura','P.H.P.Chathuranga',10,1),(161,3,'jpura','J.D.Karunarathna',11,1),(162,3,'jpura','',0,1),(163,3,'jpura','',0,1),(164,3,'jpura','',0,1),(165,3,'jpura','',0,1),(166,4,'mora','B.D.Dananjaya',1,1),(167,4,'mora','G.D.M.Senarathne',2,1),(168,4,'mora','N.L.W.Wijewantha',3,1),(169,4,'mora','R.A.D.Sujith',4,1),(170,4,'mora','P.V.G.Sankalpa',5,1),(171,4,'mora','T.M.T.S.D.B.Thennakoon',6,1),(172,4,'mora','T.B.A.D.P.Saranathissa',7,1),(173,4,'mora','V.K.Kottawasinghe',8,1),(174,4,'mora','M.O.R.Mahadiulwewa',9,1),(175,4,'mora','G.A.T.Wijesekara',10,1),(176,4,'mora','H.P.T.Hettiarachchi',11,1),(177,4,'mora','I.M.Karunanayake',12,1),(178,4,'mora','B.A.H.Chathuranga',13,1),(179,4,'mora','H.M.S.S.Gajaweera',14,1),(180,4,'mora','D.R.K.Dharmapriya',15,1),(181,4,'susl','D.M.S.S.Fernando',1,1),(182,4,'susl','W.M.G.U.Abesekara',2,1),(183,4,'susl','A.B.B.R.Priyadarshana',3,1),(184,4,'susl','J.K.R.S.Kumarasinghe',4,1),(185,4,'susl','S.Maudshan',5,1),(186,4,'susl','M.S.N.Silva',6,1),(187,4,'susl','T.Priyalaxsan',7,1),(188,4,'susl','T.M.N.Krishantha',8,1),(189,4,'susl','M.A.S.Thusira',9,1),(190,4,'susl','W.A.R.K.Ranaweera',10,1),(191,4,'susl','G.D.D.Prabath',11,1),(192,4,'susl','K.C.Gamage',12,1),(193,4,'susl','N.D.Wettasinghe',13,1),(194,4,'susl','N.Nishanthan',14,1),(195,4,'susl','',0,1);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'morasp5_criclive'
--

--
-- Dumping routines for database 'morasp5_criclive'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-04  0:34:36
