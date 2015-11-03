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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,NULL,NULL,NULL),(2,9,'wwwawawwaaw','2015-10-27 00:15:27'),(3,9,'wwwawawwaaw','2015-10-27 00:17:46'),(4,9,'wwwawawwaaw','2015-10-27 00:18:18'),(5,9,'21321321','2015-10-27 00:18:25'),(6,9,'21321321','2015-10-27 00:18:30'),(7,9,'21321321','2015-10-27 00:18:37'),(8,9,'21321321','2015-10-27 00:18:46'),(9,9,'21321321','2015-10-27 00:18:54'),(10,9,'21321321','2015-10-27 00:20:03'),(11,9,'21321321','2015-10-27 00:20:56'),(12,9,'21321321','2015-10-27 00:21:07'),(13,9,'shreya','2015-10-27 00:22:59'),(14,9,'asd as as d','2015-10-27 00:23:02'),(15,9,'asd as asd sa das asd ','2015-10-27 00:23:05'),(16,9,'asd as sasa sad ','2015-10-27 00:23:09'),(17,9,'asd ','2015-10-27 00:26:21'),(18,9,' asd asd ','2015-10-27 00:26:23'),(19,9,'s dsa asd ','2015-10-27 00:26:24'),(20,9,'sa dasd as ','2015-10-27 00:26:26'),(21,9,'s das das s','2015-10-27 00:26:27'),(22,9,'asdasd','2015-10-27 00:26:49'),(23,9,'asdsad','2015-10-27 00:26:51'),(24,9,'asdasd','2015-10-27 00:26:52'),(25,9,'asd','2015-10-27 00:27:17'),(26,9,'as as d','2015-10-27 00:27:18'),(27,9,'as das das ','2015-10-27 00:27:20'),(28,9,'sad as asd ','2015-10-27 00:27:21'),(29,9,'sad sa das ','2015-10-27 00:27:23'),(30,9,'sad as d','2015-10-27 00:28:48'),(31,9,'sa dsa ','2015-10-27 00:28:50'),(32,9,'as das ','2015-10-27 00:28:51'),(33,9,'as das ','2015-10-27 00:28:53'),(34,9,'asd as sa sad ','2015-10-27 00:28:55'),(35,9,'Model implements the following commonly used features:\n\nattribute declaration: by default, every public class member is considered as a model attribute\nattribute labels: each attribute may be associated with a label for display purpose\nmassive attribute assignment\nscenario-based validation\nModel also raises the following events when performing data validation:','2015-10-27 00:29:11'),(36,9,'Model implements the following commonly used features:\n\nattribute declaration: by default, every public class member is considered as a model attribute\nattribute labels: each attribute may be associated with a label for display purpose\nmassive attribute assignment\nscenario-based validation\nModel also raises the following events when performing data validation:','2015-10-27 00:29:48'),(37,9,'Model implements the following commonly used features:\n\nattribute declaration: by default, every public class member is considered as a model attribute\nattribute labels: each attribute may be associated with a label for display purpose\nmassive attribute assignment\nscenario-based validation\nModel also raises the following events when performing data validation:','2015-10-27 00:29:49'),(38,9,'Model implements the following commonly used features:\n\nattribute declaration: by default, every public class member is considered as a model attribute\nattribute labels: each attribute may be associated with a label for display purpose\nmassive attribute assignment\nscenario-based validation\nModel also raises the following events when performing data validation:','2015-10-27 00:29:51'),(39,9,'hello shreya','2015-10-27 00:39:50'),(40,9,'adsasdds\nasdasd\nsadsadsad\nsdfd\nfdsf\nsdf\nsdf','2015-10-27 01:32:41'),(41,9,'Job Location : Shivajinagar \n\nWalkin Date : 28 October 2015 - 29 October 2015 \n\nWalkin Time : 11:00 a.m - 03:00 p.m \n\nJob Description : \n\nJob Profile:\nFacilitators (Trainers) - Roles & Responsibilities\n\n1. TRAINING: Training and facilitating the learning process of the candidates by delivering the course curriculum and helping them to acquire necessary employability skills\n\n2. MOBILISATION: Actively participate in the road shows to mobilize deserving aspirants for the LABS program. You will counsel and admit them in the training program as per laid procedures.\n\n3. PLACEMENTS: Network by inviting representatives from the prospective employers to the centers and taking the aspirants for industry exposure visits for better understanding about the industry. After training the aspirants and ensuring they are job-ready, you will work to secure good employment opportunities for them with prospective employers. \n\nWalkin Venue : \n\nDr.reddys Foundation, \nAbove Manapuram Gold, \nNear Dandu Maramma temple, \nChik Bazar Street, Shivajunagara Bus Stop, \nBengalure-560051\n','2015-10-27 01:33:49'),(42,9,'gghhjjj','2015-10-27 01:41:00'),(43,9,'dasadsadas','2015-10-27 01:44:58'),(44,9,'Hello yuri','2015-11-03 02:20:51'),(45,9,'hello standy','2015-11-03 02:20:59'),(46,9,'qweqweqwe','2015-11-03 02:32:23'),(47,9,'POst now asdasdasd','2015-11-03 02:32:28');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'123','123','123@qq.com','202cb962ac59075b964b07152d234b70',NULL,3333),(8,'yuri','yuri','yuri@gmail.com','9491876179d7a80bb5c86f15dbe31422',NULL,122),(9,'Client1','Client2','zzz@qq.com','f3abb86bd34cf4d52698f14c0da1dc60','http://www.blogcdn.com/massively.joystiq.com/media/2012/08/lol-tristanach.jpg',1222);
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

-- Dump completed on 2015-11-02 20:40:49
