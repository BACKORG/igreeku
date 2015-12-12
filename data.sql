-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: igreeku
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1=Fraternities, 2=Sororities',
  PRIMARY KEY (`id`),
  KEY `fk_chapter_school_id_idx` (`school_id`),
  CONSTRAINT `fk_chapter_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
INSERT INTO `chapter` VALUES (1,1,'Gamma Phi Beta',1),(2,1,'Alpha Phi',1),(3,1,'Phi Sigma Sigma',1),(4,1,'Alpha Epsilon Pi',2),(5,1,'Alpha Gamma Pi',2),(6,1,'Alpha Sigma Phi',2),(7,2,'Chi Phi',1),(8,2,'Delta Tau Delta',1),(9,2,'Kappa Sigma',1),(10,2,'Alpha Delta Pi',2),(11,2,'Alpha Epsilon Phi',2),(12,2,'Delta Delta Delta',2),(13,3,'Alpha Delta Phi',1),(14,3,'Alpha Epsilon Pi',1),(15,3,'Alpha Kappa Sigma',1),(16,3,'Alpha Epsilon Phi',2),(17,3,'Delta Phi Epsilon',2),(18,3,'Delta Zeta',2),(19,4,'Pi Kappa Phi',1),(20,4,'Delta Tau Delta',1),(21,4,'Sigma Phi Epsilon',1),(22,4,'Chi Omega',2),(23,4,'Phi Sigma Sigma',2),(24,4,'Pi Beta Phi',2),(25,5,'Pi Kappa Phi',1),(26,5,'Delta Tau Delta',1),(27,5,'Sigma Phi Epsilon',1),(28,5,'Chi Omega',2),(29,5,'Phi Sigma Sigma',2),(30,5,'Pi Beta Phi',2),(31,6,'Pi Kappa Phi',1),(32,6,'Delta Tau Delta',1),(33,6,'Sigma Phi Epsilon',1),(34,6,'Chi Omega',2),(35,6,'Phi Sigma Sigma',2),(36,6,'Pi Beta Phi',2);
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,10,'This is a job post 1','This is a job post 1','2015-11-01 00:00:00','2015-11-20 00:00:00'),(2,10,'This is a new job lol','This is a new job lol','2015-11-01 00:00:00','2015-11-20 00:00:00');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` text,
  `posttime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user_id_idx` (`user_id`),
  CONSTRAINT `post_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,10,'LOL This is my first post','2015-11-10 00:36:41'),(2,10,'LOL This is my second post','2015-11-10 00:36:51'),(3,10,'This is my third post','2015-11-09 18:38:24'),(7,13,'HSHA','2015-12-12 00:09:37');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(45) DEFAULT NULL,
  `fullname` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'ben','Bentley University'),(2,'bos','Boston University'),(3,'noru','Northeastern University'),(4,'uma','University of Maine'),(5,'nhu','University of New Hampshire'),(6,'riu','University of Rhode Island');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `type` tinyint(3) DEFAULT '0' COMMENT '0 = basic user,\n1 = alumni user,\n2 = admin,\n3 = super admin',
  `state` varchar(45) DEFAULT NULL,
  `school` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `why` text,
  `chapter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'123','123','123@qq.com','202cb962ac59075b964b07152d234b70',NULL,3333,0,NULL,NULL,NULL,NULL,NULL),(8,'yuri','yuri','yuri@gmail.com','9491876179d7a80bb5c86f15dbe31422',NULL,122,0,NULL,'1','2015-12-12','asd',NULL),(10,'alumni','test123','alumni@gmail.com','9855f5cdff0306ae33a49f89e087ccbc','http://files.enjin.com.s3.amazonaws.com/59227/modules/forum/attachments/fatty+baby_1337765638.jpg',12,1,NULL,'1','2015-12-12','',NULL),(13,'admin','admin','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','IMG_2332.jpg',NULL,3,'ct','yu','2015-12-12','Becaue',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-12  1:17:36
