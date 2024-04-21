-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: mixedmessages
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adjectives`
--

DROP TABLE IF EXISTS `adjectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adjectives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col2` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adjectives_id_uindex` (`id`),
  UNIQUE KEY `adjectives_col2_uindex` (`col2`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adjectives`
--

/*!40000 ALTER TABLE `adjectives` DISABLE KEYS */;
INSERT INTO `adjectives` VALUES (1,'red'),(2,'green'),(3,'violet'),(4,'blue'),(5,'yellow'),(6,'angry'),(7,'friendly'),(8,'heavy'),(9,'lightweight'),(10,'fat'),(11,'skinny'),(12,'shitty'),(13,'amazing'),(14,'sleepy'),(15,'sexy'),(16,'drunk'),(17,'sad'),(18,'happy'),(19,'fabulous'),(20,'unimaginative'),(21,'unbelievable'),(22,'unhappy'),(23,'normal'),(24,'crazy'),(25,'bipolar'),(26,'honest'),(27,'fearless'),(28,'fantastic'),(29,'smelly'),(30,'poor'),(31,'rich'),(32,'beautiful'),(33,'ugly'),(34,'smart');
/*!40000 ALTER TABLE `adjectives` ENABLE KEYS */;

--
-- Table structure for table `nouns`
--

DROP TABLE IF EXISTS `nouns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nouns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col2` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nouns_id_uindex` (`id`),
  UNIQUE KEY `nouns_col1_uindex` (`col2`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nouns`
--

/*!40000 ALTER TABLE `nouns` DISABLE KEYS */;
INSERT INTO `nouns` VALUES (1,'car'),(2,'plane'),(3,'cat'),(4,'dog'),(5,'house'),(6,'bike'),(7,'road'),(8,'man'),(9,'woman'),(10,'child'),(11,'friend'),(12,'enemy'),(13,'student'),(14,'teacher'),(15,'politician'),(16,'gangsta'),(17,'doctor'),(18,'chemist'),(19,'developer'),(20,'wallet'),(21,'dancer'),(22,'pilot'),(23,'priest'),(24,'biker'),(25,'book'),(26,'monkey'),(27,'bird'),(28,'bullshitter'),(29,'variable'),(30,'yogi'),(31,'fan'),(32,'businessman'),(33,'soldier'),(34,'skunk'),(35,'businesswoman'),(36,'poor'),(37,'rich'),(43,'mother-in-law'),(44,'shit'),(45,'piss'),(46,'ipad'),(47,'horse'),(49,'chicken'),(50,'father-in-law'),(51,'holycow');
/*!40000 ALTER TABLE `nouns` ENABLE KEYS */;

--
-- Table structure for table `verbs`
--

DROP TABLE IF EXISTS `verbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verbs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col2` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `verbs_id_uindex` (`id`),
  UNIQUE KEY `verbs_col2_uindex` (`col2`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verbs`
--

/*!40000 ALTER TABLE `verbs` DISABLE KEYS */;
INSERT INTO `verbs` VALUES (1,'driving'),(2,'talking to'),(3,'singing to'),(4,'running away from'),(5,'loving'),(6,'jumping on'),(7,'avoiding'),(8,'walking towards'),(9,'screaming at'),(10,'digging a hole to'),(11,'apologizing to'),(12,'crawling towards'),(13,'painting on'),(14,'trying to understand'),(15,'talking about'),(16,'singing about'),(17,'eyeballing'),(18,'eating with'),(19,'bullshitting'),(20,'defining'),(21,'drinking with'),(22,'meditating on'),(23,'meditating with'),(24,'smelling'),(25,'swimming with'),(26,'playing with'),(27,'flying over'),(28,'reading'),(30,'praying'),(31,'humming');
/*!40000 ALTER TABLE `verbs` ENABLE KEYS */;

--
-- Table structure for table `who`
--

DROP TABLE IF EXISTS `who`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `who` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col2` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `who_id_uindex` (`id`),
  UNIQUE KEY `who_col2_uindex` (`col2`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `who`
--

/*!40000 ALTER TABLE `who` DISABLE KEYS */;
INSERT INTO `who` VALUES (1,'Your'),(2,'His'),(3,'Her'),(4,'Their'),(5,'Our');
/*!40000 ALTER TABLE `who` ENABLE KEYS */;

--
-- Dumping routines for database 'mixedmessages'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-21 15:14:52
