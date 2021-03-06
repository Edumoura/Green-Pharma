CREATE DATABASE  IF NOT EXISTS `greenpharma` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `greenpharma`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: greenpharma
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dadosarquivo`
--

DROP TABLE IF EXISTS `dadosarquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `dadosarquivo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CodigodoProduto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EAN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricao` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fornecedor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_11` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_12` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_13` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_14` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_15` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_16` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_17` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_18` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_19` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_20` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_21` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_22` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_23` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_24` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regiao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_arquivo` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dadosarquivo`
--

LOCK TABLES `dadosarquivo` WRITE;
/*!40000 ALTER TABLE `dadosarquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `dadosarquivo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-20 20:06:08
