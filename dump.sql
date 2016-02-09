-- MySQL dump 10.13  Distrib 5.5.41, for Win32 (x86)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.5.41-log

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
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_id_foreign` (`country_id`),
  CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Warsaw',1,NULL,NULL),(2,'Krakow',1,NULL,NULL),(3,'Lodz',1,NULL,NULL),(4,'Kyiv',2,NULL,NULL),(5,'Lviv',2,NULL,NULL),(6,'Zaporizhzhya',2,NULL,NULL),(7,'Budapest',3,NULL,NULL),(8,'Debrecen',3,NULL,NULL),(9,'Miskolc',3,NULL,NULL),(10,'Berlin',4,NULL,NULL),(11,'Hamburg',4,NULL,NULL),(12,'Munich',4,NULL,NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_language`
--

DROP TABLE IF EXISTS `city_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city_language` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_language_city_id_foreign` (`city_id`),
  KEY `city_language_language_id_foreign` (`language_id`),
  CONSTRAINT `city_language_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `city_language_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_language`
--

LOCK TABLES `city_language` WRITE;
/*!40000 ALTER TABLE `city_language` DISABLE KEYS */;
INSERT INTO `city_language` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,2,1,NULL,NULL),(4,2,2,NULL,NULL),(5,2,3,NULL,NULL),(6,3,1,NULL,NULL),(7,3,3,NULL,NULL),(8,3,4,NULL,NULL),(9,4,8,NULL,NULL),(10,4,7,NULL,NULL),(11,5,8,NULL,NULL),(12,5,1,NULL,NULL),(13,6,8,NULL,NULL),(14,6,7,NULL,NULL),(15,7,9,NULL,NULL),(16,7,10,NULL,NULL),(17,8,9,NULL,NULL),(18,8,11,NULL,NULL),(19,9,9,NULL,NULL),(20,9,10,NULL,NULL),(21,9,11,NULL,NULL),(22,10,5,NULL,NULL),(23,10,12,NULL,NULL),(24,11,5,NULL,NULL),(25,11,12,NULL,NULL),(26,11,13,NULL,NULL),(27,12,5,NULL,NULL),(28,12,13,NULL,NULL),(29,12,14,NULL,NULL);
/*!40000 ALTER TABLE `city_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_country_unique` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Poland',NULL,NULL),(2,'Ukraine',NULL,NULL),(3,'Hungary',NULL,NULL),(4,'Germany',NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_language_unique` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'Polish',NULL,NULL),(2,'Belorussian',NULL,NULL),(3,'Czech',NULL,NULL),(4,'Lithuanian',NULL,NULL),(5,'German',NULL,NULL),(6,'Slovak',NULL,NULL),(7,'Russian',NULL,NULL),(8,'Ukrainian',NULL,NULL),(9,'Hungarian',NULL,NULL),(10,'Croatian',NULL,NULL),(11,'Romanian',NULL,NULL),(12,'Danish',NULL,NULL),(13,'Turkish',NULL,NULL),(14,'Kurdish',NULL,NULL);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2016_02_04_124436_create_countries_table',1),('2016_02_04_124532_create_languages_table',1),('2016_02_04_124600_create_cities_table',1),('2016_02_04_124700_create_city_language_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-09 17:38:51
