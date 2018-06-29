-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: symfony
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `2FlULjTwcP`
--

DROP TABLE IF EXISTS `2FlULjTwcP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `2FlULjTwcP` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `temperature` int(11) NOT NULL,
  `oxygen` int(11) NOT NULL,
  `energy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4FDF1951C54C8C93` (`type_id`),
  KEY `IDX_4FDF1951A76ED395` (`user_id`),
  CONSTRAINT `FK_4FDF1951A76ED395` FOREIGN KEY (`user_id`) REFERENCES `HlgdEoz7Sd` (`id`),
  CONSTRAINT `FK_4FDF1951C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `xfHQzAsCeM` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2FlULjTwcP`
--

LOCK TABLES `2FlULjTwcP` WRITE;
/*!40000 ALTER TABLE `2FlULjTwcP` DISABLE KEYS */;
INSERT INTO `2FlULjTwcP` VALUES (4,1,NULL,19,98,'100 %','2018-06-28 23:40:15'),(5,2,NULL,19,98,'100 %','2018-06-28 23:40:20'),(6,2,NULL,19,98,'100 %','2018-06-28 23:40:31');
/*!40000 ALTER TABLE `2FlULjTwcP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CHITRoylZI`
--

DROP TABLE IF EXISTS `CHITRoylZI`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CHITRoylZI` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_508FB970A76ED395` (`user_id`),
  CONSTRAINT `FK_508FB970A76ED395` FOREIGN KEY (`user_id`) REFERENCES `HlgdEoz7Sd` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CHITRoylZI`
--

LOCK TABLES `CHITRoylZI` WRITE;
/*!40000 ALTER TABLE `CHITRoylZI` DISABLE KEYS */;
INSERT INTO `CHITRoylZI` VALUES (1,3,'665e8e1b8f13957c9ac4551a696ae450.jpeg','Sauvons la Terre !','2018-06-28 09:22:21','La Terre a besoin de vous ! Grâce à Stellar, continuez de sauvegarder notre planète bleue en choisissant vous-même vos moments sur la terre ferme. De nombreux emplois ou missions bénévoles sont disponibles. N\'hésitez plus à contacter le xxx-xxx-xxx. Le changement, c\'est maintenant !'),(2,3,'d350bf16380d3a1b778f43fbd2fe2b62.jpeg','Découvrez le module ASTRA 102','2018-06-28 16:35:42','De nouveaux modules sont disponibles, avec encore plus de confort. Profitez de votre couchette personnelle avec cuisine, salle à manger et bureau ! Chez Stellar, le confort compte aussi.'),(3,3,'b76484736e4f2eaaf56c2975168fdd7b.png','Prenez le temps de vous ressourcer','2018-06-28 16:37:00','Retrouvez une nouvelle promenade agréable sur le côté est de la station mère. Plus de 1500 km de verdure et d\'espaces de détente à votre disposition. De nombreuses boutiques arriveront très bientôt pour égayer vos journée !'),(4,3,'2ebc339f9093fdfacc9a8d8b2e6789f8.jpeg','Respirez pour moins cher !','2018-06-28 16:38:54','Nous sommes heureux de vous annoncer que le prix de l\'oxygène a baisser de 3 unités ce mois-ci car nous avons développé une installation plus performante pour votre confort !');
/*!40000 ALTER TABLE `CHITRoylZI` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HlgdEoz7Sd`
--

DROP TABLE IF EXISTS `HlgdEoz7Sd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HlgdEoz7Sd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CB7FFFBEE7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HlgdEoz7Sd`
--

LOCK TABLES `HlgdEoz7Sd` WRITE;
/*!40000 ALTER TABLE `HlgdEoz7Sd` DISABLE KEYS */;
INSERT INTO `HlgdEoz7Sd` VALUES (3,'John Admin','admin@stellar.com','$2y$13$jYlZ7o6CSIhKuUwOnW2OCeG8qVj0hc/y4.Hto6Q/FmQA9dLJUGsGe','[\"ROLE_ADMIN\"]'),(4,'John User','user@stellar.com','$2y$13$07eqaOA4sb022tt1VyILR.MndTfnHT89PsYG.mvTM9NztLUCMzlla','[\"ROLE_USER\"]');
/*!40000 ALTER TABLE `HlgdEoz7Sd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gKVbpxsYPE`
--

DROP TABLE IF EXISTS `gKVbpxsYPE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gKVbpxsYPE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_677C19E1A76ED395` (`user_id`),
  KEY `IDX_677C19E1AFC2B591` (`module_id`),
  CONSTRAINT `FK_677C19E1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `HlgdEoz7Sd` (`id`),
  CONSTRAINT `FK_677C19E1AFC2B591` FOREIGN KEY (`module_id`) REFERENCES `2FlULjTwcP` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gKVbpxsYPE`
--

LOCK TABLES `gKVbpxsYPE` WRITE;
/*!40000 ALTER TABLE `gKVbpxsYPE` DISABLE KEYS */;
/*!40000 ALTER TABLE `gKVbpxsYPE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q1gY5nmyVd`
--

DROP TABLE IF EXISTS `q1gY5nmyVd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q1gY5nmyVd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `object` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E9CF2B27A76ED395` (`user_id`),
  CONSTRAINT `FK_E9CF2B27A76ED395` FOREIGN KEY (`user_id`) REFERENCES `HlgdEoz7Sd` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q1gY5nmyVd`
--

LOCK TABLES `q1gY5nmyVd` WRITE;
/*!40000 ALTER TABLE `q1gY5nmyVd` DISABLE KEYS */;
INSERT INTO `q1gY5nmyVd` VALUES (3,3,'Problème avec l\'application','Comment ça marche???!!!',1),(4,4,'Problème avec mon module','CA BRULEdzda',1);
/*!40000 ALTER TABLE `q1gY5nmyVd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xfHQzAsCeM`
--

DROP TABLE IF EXISTS `xfHQzAsCeM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xfHQzAsCeM` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xfHQzAsCeM`
--

LOCK TABLES `xfHQzAsCeM` WRITE;
/*!40000 ALTER TABLE `xfHQzAsCeM` DISABLE KEYS */;
INSERT INTO `xfHQzAsCeM` VALUES (1,'Astra 204, Module SoloQ','5555bd953ac2a9ac9179244f24299a4e.png'),(2,'Astra 106, Module Familial','3e1489f0cce58153585de97ed5e66ff1.png');
/*!40000 ALTER TABLE `xfHQzAsCeM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yAvL3mMr9U`
--

DROP TABLE IF EXISTS `yAvL3mMr9U`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yAvL3mMr9U` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yAvL3mMr9U`
--

LOCK TABLES `yAvL3mMr9U` WRITE;
/*!40000 ALTER TABLE `yAvL3mMr9U` DISABLE KEYS */;
INSERT INTO `yAvL3mMr9U` VALUES (19,'oui','2018-06-28 23:33:10','John Admin'),(20,'haha','2018-06-28 23:33:19','John Admin');
/*!40000 ALTER TABLE `yAvL3mMr9U` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-29 10:21:54
