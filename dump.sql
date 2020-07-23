-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: redguias
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `agreements`
--

DROP TABLE IF EXISTS `agreements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agreements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned DEFAULT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_contractor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `advertisement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comercial_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifications` text COLLATE utf8mb4_unicode_ci,
  `observations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` enum('bank_check','credit_card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'credit_card',
  `input_value` double(8,2) NOT NULL DEFAULT '0.00',
  `installments` int(10) unsigned NOT NULL DEFAULT '1',
  `installment_value` double(8,2) NOT NULL DEFAULT '0.00',
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2020',
  `signature` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agreements_employee_id_foreign` (`employee_id`),
  KEY `agreements_customer_id_foreign` (`customer_id`),
  CONSTRAINT `agreements_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `agreements_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agreements`
--

LOCK TABLES `agreements` WRITE;
/*!40000 ALTER TABLE `agreements` DISABLE KEYS */;
INSERT INTO `agreements` VALUES (1,8,1,'Mendes e Barros e Filhos','Mendes e Barros e Filhos','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','MATRIZ',NULL,NULL,'bank_check',300.00,2,300.00,'2020','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAEYklEQVR4Xu3UAQkAAAwCwdm/9HI83BLIOdw5AgQIRAQWySkmAQIEzmB5AgIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlACBB1YxAJfjJb2jAAAAAElFTkSuQmCC','2020-07-22 10:45:01','2020-07-22 10:50:43'),(2,3,2,'Franco e Burgos e Associados','Franco e Burgos e Associados','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(3,1,3,'Fonseca Comercial Ltda.','Fonseca Comercial Ltda.','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(4,5,4,'Furtado-Maia','Furtado-Maia','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(5,8,5,'Fidalgo Comercial Ltda.','Fidalgo Comercial Ltda.','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(6,2,6,'Espinoza e Caldeira e Associados','Espinoza e Caldeira e Associados','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(7,9,7,'Zamana Comercial Ltda.','Zamana Comercial Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(8,10,8,'Serrano Ltda.','Serrano Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(9,8,9,'Assunção Comercial Ltda.','Assunção Comercial Ltda.','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(10,1,10,'Vega e Filhos','Vega e Filhos','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(11,1,11,'Aragão e Madeira','Aragão e Madeira','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(12,9,12,'Leal e Rivera','Leal e Rivera','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(13,10,13,'Barros e Filhos','Barros e Filhos','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(14,5,14,'Galhardo-Salazar','Galhardo-Salazar','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(15,4,15,'Cordeiro Comercial Ltda.','Cordeiro Comercial Ltda.','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(16,8,16,'Roque e Queirós','Roque e Queirós','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(17,8,17,'Bezerra Comercial Ltda.','Bezerra Comercial Ltda.','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(18,3,18,'Mendes e Filhos','Mendes e Filhos','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(19,1,19,'Cruz-Mendes','Cruz-Mendes','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(20,10,20,'Padilha e Paes Ltda.','Padilha e Paes Ltda.','2020-07-22','faixa','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(21,3,21,'Marin e Ferraz S.A.','Marin e Ferraz S.A.','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(22,3,22,'Martines Ltda.','Martines Ltda.','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(23,2,23,'Ramos e Burgos','Ramos e Burgos','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(24,3,24,'Zambrano e Aragão e Associados','Zambrano e Aragão e Associados','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(25,5,25,'Espinoza Comercial Ltda.','Espinoza Comercial Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(26,10,26,'Matias e Prado','Matias e Prado','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(27,5,27,'Zambrano S.A.','Zambrano S.A.','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(28,1,28,'Santiago e Vega Ltda.','Santiago e Vega Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(29,6,29,'Rezende Comercial Ltda.','Rezende Comercial Ltda.','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(30,1,30,'Ortiz-Carrara','Ortiz-Carrara','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(31,9,31,'Feliciano Comercial Ltda.','Feliciano Comercial Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(32,7,32,'Colaço e Cruz','Colaço e Cruz','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(33,6,33,'Ortiz Comercial Ltda.','Ortiz Comercial Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(34,2,34,'Paes e Paes','Paes e Paes','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(35,3,35,'Fidalgo-Verdara','Fidalgo-Verdara','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(36,10,36,'Delgado Comercial Ltda.','Delgado Comercial Ltda.','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(37,7,37,'Colaço e Prado','Colaço e Prado','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(38,6,38,'Soto e Rezende S.A.','Soto e Rezende S.A.','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(39,9,39,'Mendonça-Godói','Mendonça-Godói','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(40,2,40,'Batista Comercial Ltda.','Batista Comercial Ltda.','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(41,1,41,'Pena Ltda.','Pena Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(42,7,42,'Abreu e Associados','Abreu e Associados','2020-07-22','logo','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(43,5,43,'Leal e Vasques S.A.','Leal e Vasques S.A.','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(44,9,44,'Faro e Matos e Associados','Faro e Matos e Associados','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(45,8,45,'Paes e Filhos','Paes e Filhos','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(46,5,46,'Molina-Gusmão','Molina-Gusmão','2020-07-22','cartão','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(47,8,47,'Aguiar Comercial Ltda.','Aguiar Comercial Ltda.','2020-07-22','1 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(48,6,48,'Molina Comercial Ltda.','Molina Comercial Ltda.','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(49,5,49,'Batista-de Aguiar','Batista-de Aguiar','2020-07-22','1/4 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','Endereço 1, Endereço 2',NULL,NULL,'bank_check',300.00,2,300.00,'2020',NULL,'2020-07-22 10:45:01','2020-07-22 10:45:01'),(50,2,50,'Zambrano e Meireles','Zambrano e Meireles','2020-07-22','1/2 pág','BHTE','Categoria 1, Categoria 2, Categoria 3','(00) 00000-0000, (00) 10000-2200','MATRIZ',NULL,NULL,'bank_check',300.00,2,300.00,'2020','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAEYklEQVR4Xu3UAQkAAAwCwdm/9HI83BLIOdw5AgQIRAQWySkmAQIEzmB5AgIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlAABg+UHCBDICBisTFWCEiBgsPwAAQIZAYOVqUpQAgQMlh8gQCAjYLAyVQlKgIDB8gMECGQEDFamKkEJEDBYfoAAgYyAwcpUJSgBAgbLDxAgkBEwWJmqBCVAwGD5AQIEMgIGK1OVoAQIGCw/QIBARsBgZaoSlACBB1YxAJfjJb2jAAAAAElFTkSuQmCC','2020-07-22 10:45:01','2020-07-22 10:50:33');
/*!40000 ALTER TABLE `agreements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agreement_id` int(10) unsigned NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_agreement_id_foreign` (`agreement_id`),
  CONSTRAINT `categories_agreement_id_foreign` FOREIGN KEY (`agreement_id`) REFERENCES `agreements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_number` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Mendes e Barros e Filhos','69.027.412/0001-11','50220-017, Travessa Meireles, 2545\nPaula do Norte - AC',NULL,NULL,NULL,'14710-317',NULL,'Ceará','(83) 96366-9175','(38) 93979-4893','Dr. Leonardo Assunção Sobrinho','luzia.dasilva@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(2,'Franco e Burgos e Associados','47.220.256/0001-78','17267-017, R. Sebastião da Cruz, 6\nVila Pablo - MS',NULL,NULL,NULL,'45365-785',NULL,'Espírito Santo','(32) 97466-5460','(68) 98796-3324','Miguel Mendes Pedrosa Jr.','ariadna.abreu@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(3,'Fonseca Comercial Ltda.','56.521.888/0001-62','35973-423, Rua Natália Ferraz, 04213. Bloco C\nSanta Ziraldo - AM',NULL,NULL,NULL,'86427-901',NULL,'Rio Grande do Sul','(97) 4584-4876','(55) 96649-9357','Dr. Isadora Mia Marin Jr.','gustavo57@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(4,'Furtado-Maia','77.642.884/0001-02','90422-907, Largo Natal, 2\nVila Ketlin - MG',NULL,NULL,NULL,'63079-627',NULL,'Mato Grosso','(95) 3135-8694','(54) 90926-9907','Sr. Martinho Pedro Velasques','simao.zamana@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(5,'Fidalgo Comercial Ltda.','44.911.654/0001-42','71854-810, Rua Burgos, 374. Bloco B\nCruz do Leste - MT',NULL,NULL,NULL,'77966-437',NULL,'Roraima','(19) 90353-7561','(79) 90003-5137','Santiago Benjamin Ávila Sobrinho','henrique51@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(6,'Espinoza e Caldeira e Associados','51.865.550/0001-04','12552-527, Av. David, 59986. Apto 748\nSales d\'Oeste - AP',NULL,NULL,NULL,'59875-235',NULL,'Paraíba','(46) 92391-1081','(43) 93566-0934','Luara Soares Quintana','ubranco@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(7,'Zamana Comercial Ltda.','31.717.194/0001-74','24934-783, Av. Irene Dominato, 1457\nGalhardo do Sul - TO',NULL,NULL,NULL,'31419-112',NULL,'Amapá','(94) 95818-0269','(98) 91101-3031','Dr. Simão Thiago Ferreira Jr.','helena81@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(8,'Serrano Ltda.','80.895.241/0001-85','52815-103, Av. Jácomo Chaves, 3661\nVila Emílio - PE',NULL,NULL,NULL,'05667-482',NULL,'Tocantins','(27) 93974-5029','(37) 96829-9650','Ana Nádia Flores','miranda.colaco@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(9,'Assunção Comercial Ltda.','54.964.078/0001-55','15436-662, Travessa Kevin, 28894. Bc. 60 Ap. 00\nFelipe do Sul - MA',NULL,NULL,NULL,'39508-282',NULL,'Maranhão','(74) 2576-9989','(63) 90028-8945','Sr. Máximo Assunção Filho','rpaz@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(10,'Vega e Filhos','02.189.838/0001-09','27560-397, Av. Fontes, 4\nEscobar do Leste - DF',NULL,NULL,NULL,'13049-948',NULL,'Paraíba','(12) 2367-8894','(79) 95272-7413','Srta. Antonieta Leon','mgodoi@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(11,'Aragão e Madeira','10.861.548/0001-80','79644-504, Rua Josefina Maia, 646\nSão Agostinho d\'Oeste - PE',NULL,NULL,NULL,'38970-652',NULL,'Pernambuco','(43) 95590-9590','(66) 93946-8152','Inácio Serna Salazar Sobrinho','esteves.valeria@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(12,'Leal e Rivera','95.977.532/0001-90','64659-128, Avenida Rico, 88. F\nSão Luna - DF',NULL,NULL,NULL,'71796-402',NULL,'Piauí','(16) 2041-9273','(37) 92919-7662','Sr. Cristóvão Teobaldo Casanova','erios@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(13,'Barros e Filhos','46.263.543/0001-00','81706-039, Rua Ferreira, 7702\nZiraldo do Leste - SE',NULL,NULL,NULL,'01962-044',NULL,'Minas Gerais','(84) 4924-6466','(61) 93434-2602','Sr. Estêvão Leon','rpontes@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(14,'Galhardo-Salazar','21.196.815/0001-68','84735-467, Rua Valéria Rios, 16212. 841º Andar\nVila Natal - SP',NULL,NULL,NULL,'58006-265',NULL,'Minas Gerais','(27) 3434-9694','(61) 95925-6708','Dr. Allison Beatriz Matias','constancia.lozano@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(15,'Cordeiro Comercial Ltda.','00.279.914/0001-33','50232-429, Rua Vila, 25\nSão Maitê - RR',NULL,NULL,NULL,'61193-241',NULL,'Maranhão','(12) 4311-3121','(55) 99466-0273','Sra. Carla Carmona Sobrinho','carrara.olivia@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(16,'Roque e Queirós','86.144.387/0001-75','58749-936, Rua Gusmão, 86405. Apto 506\nPorto Thalissa - RJ',NULL,NULL,NULL,'65298-015',NULL,'Mato Grosso do Sul','(55) 90158-6514','(28) 90557-4773','Dr. Manuel Cervantes','gian91@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(17,'Bezerra Comercial Ltda.','84.773.640/0001-24','70051-384, Av. Eduardo Guerra, 87632\nVila Guilherme - MS',NULL,NULL,NULL,'89052-115',NULL,'Piauí','(63) 3694-8609','(65) 98363-8455','Josefina Tábata Colaço Jr.','ioliveira@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(18,'Mendes e Filhos','31.159.692/0001-49','30534-416, Av. D\'ávila, 1557. F\nHernani d\'Oeste - MT',NULL,NULL,NULL,'58088-872',NULL,'Amazonas','(11) 4019-1498','(31) 96288-8020','Ivana Lozano','mario47@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(19,'Cruz-Mendes','68.814.310/0001-83','11134-306, Avenida Nicole, 9582\nRangel do Sul - CE',NULL,NULL,NULL,'33369-983',NULL,'Rio Grande do Sul','(54) 98513-6157','(44) 92891-5654','Dr. Allison Alessandra Tamoio Jr.','julieta.vila@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(20,'Padilha e Paes Ltda.','14.676.685/0001-03','68455-497, Rua Josefina, 566. Apto 54\nColaço do Leste - DF',NULL,NULL,NULL,'68556-808',NULL,'Roraima','(95) 95566-3872','(97) 94264-9648','Silvana Feliciano Jr.','henrique.rodrigues@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(21,'Marin e Ferraz S.A.','88.203.163/0001-12','72393-122, Rua Michele Pereira, 1713\nEscobar do Norte - RR',NULL,NULL,NULL,'84689-615',NULL,'Roraima','(15) 3152-2260','(95) 97280-7917','Dr. Estêvão Serna Jr.','marinho.natal@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(22,'Martines Ltda.','34.478.163/0001-04','75407-076, Rua Feliciano, 0\nMichele d\'Oeste - MT',NULL,NULL,NULL,'51694-724',NULL,'São Paulo','(21) 90993-5982','(91) 93782-7477','Srta. Helena Vila Queirós Jr.','everton.faria@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(23,'Ramos e Burgos','25.982.811/0001-66','19155-664, Av. Camilo Chaves, 89392. 1º Andar\nRicardo d\'Oeste - DF',NULL,NULL,NULL,'79799-985',NULL,'Ceará','(97) 4182-3606','(48) 95584-5932','Gabriel Ávila Queirós','ramires.miranda@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(24,'Zambrano e Aragão e Associados','77.533.712/0001-09','21102-459, Largo Ferreira, 68\nSão Rafael do Norte - RJ',NULL,NULL,NULL,'33457-180',NULL,'Maranhão','(49) 2872-0981','(24) 94983-0688','Suzana Bezerra','mel76@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(25,'Espinoza Comercial Ltda.','65.492.587/0001-49','79727-609, Travessa Alessandra Godói, 22623\nLozano do Leste - RN',NULL,NULL,NULL,'20610-265',NULL,'Espírito Santo','(32) 95458-5088','(41) 98458-8283','Sr. Benjamin Mascarenhas Neto','batista.everton@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(26,'Matias e Prado','11.990.124/0001-88','28630-732, R. da Silva, 61608\nPorto Gabriela do Sul - RS',NULL,NULL,NULL,'58861-792',NULL,'Mato Grosso','(14) 4708-6730','(94) 98144-7774','Dr. Hugo Esteves','fmendonca@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(27,'Zambrano S.A.','41.126.930/0001-73','91326-282, Avenida Ian Zaragoça, 4766. Bloco B\nSanta Emiliano - RN',NULL,NULL,NULL,'77525-352',NULL,'Mato Grosso do Sul','(94) 3809-3682','(44) 96821-4285','Salomé Solano Delgado','emiliano59@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(28,'Santiago e Vega Ltda.','68.631.930/0001-87','66777-667, Av. Batista, 1886. Bloco A\nVila Anderson do Norte - MT',NULL,NULL,NULL,'07320-232',NULL,'Paraná','(64) 3923-4810','(13) 92022-9625','Jerônimo Duarte Burgos','jromero@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(29,'Rezende Comercial Ltda.','54.020.674/0001-87','16582-559, Travessa Joana, 0. Bloco A\nSão Luis - PI',NULL,NULL,NULL,'58706-590',NULL,'Minas Gerais','(38) 2833-7472','(63) 94430-4871','Violeta Olívia Ferraz Sobrinho','campos.francisco@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(30,'Ortiz-Carrara','27.424.507/0001-29','37064-746, Av. Paulo, 8. 37º Andar\nJimenes d\'Oeste - AM',NULL,NULL,NULL,'50953-684',NULL,'Santa Catarina','(33) 93886-8469','(54) 94929-9824','Violeta Taís Corona','gvaldez@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(31,'Feliciano Comercial Ltda.','42.892.512/0001-50','26731-458, Travessa Salomé Quintana, 9. Fundos\nSabrina do Sul - PA',NULL,NULL,NULL,'32150-479',NULL,'Amapá','(97) 4966-0291','(11) 98689-1321','Benjamin Carrara Cordeiro Filho','bmendonca@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(32,'Colaço e Cruz','43.708.544/0001-15','74762-916, Travessa Miranda, 8525. Bloco C\nVila Giovana do Norte - PA',NULL,NULL,NULL,'92460-247',NULL,'Paraíba','(89) 99141-7480','(45) 96377-9048','Andres Agostinho Espinoza','irene.neves@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(33,'Ortiz Comercial Ltda.','86.421.581/0001-50','84428-984, R. Vila, 1. Bc. 64 Ap. 37\nFlores do Leste - AP',NULL,NULL,NULL,'93096-357',NULL,'Bahia','(92) 94515-3665','(99) 93955-4292','Srta. Michele Lovato','fernando.zambrano@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(34,'Paes e Paes','02.696.826/0001-62','27665-390, Rua Nádia, 72\nSamuel d\'Oeste - AM',NULL,NULL,NULL,'12696-136',NULL,'Rondônia','(91) 98438-1453','(95) 94693-7745','Emiliano Sebastião Sandoval','cfurtado@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(35,'Fidalgo-Verdara','32.754.759/0001-56','11233-240, Av. Rocha, 06622\nSanta Valentin do Norte - GO',NULL,NULL,NULL,'57465-137',NULL,'Mato Grosso do Sul','(91) 2914-7405','(83) 90345-1797','Thalissa Barreto Serrano Jr.','jorge.carmona@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(36,'Delgado Comercial Ltda.','49.847.974/0001-02','03958-422, Rua Carolina Aragão, 9547\nMariana d\'Oeste - MG',NULL,NULL,NULL,'19277-891',NULL,'Mato Grosso','(11) 97999-4696','(95) 92850-2021','Dr. Abril Josefina Montenegro','cordeiro.allison@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(37,'Colaço e Prado','12.033.398/0001-41','67629-214, R. Tomás Beltrão, 279. Apto 965\nSão Felipe do Leste - DF',NULL,NULL,NULL,'35572-151',NULL,'Rondônia','(97) 3797-7963','(16) 91215-8184','Dr. Norma Domingues','galindo.estevao@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(38,'Soto e Rezende S.A.','55.621.448/0001-14','98093-641, Avenida Pâmela Paes, 87449. Fundos\nPorto Jerônimo - RO',NULL,NULL,NULL,'90998-066',NULL,'Distrito Federal','(67) 95123-7915','(19) 92544-0493','Sr. Anderson Sérgio Rosa Neto','sophie42@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(39,'Mendonça-Godói','05.564.419/0001-90','85266-549, Rua Alan, 4013. Apto 011\nChristian do Sul - PB',NULL,NULL,NULL,'84727-154',NULL,'Mato Grosso','(63) 96835-2708','(53) 97087-2459','Eduardo Zaragoça Filho','inacio48@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(40,'Batista Comercial Ltda.','15.102.236/0001-06','15910-795, Largo Ian Domingues, 14\nBenites d\'Oeste - RS',NULL,NULL,NULL,'83890-619',NULL,'Mato Grosso do Sul','(37) 4286-4668','(88) 92516-4723','Paula Rios Neto','serra.amanda@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(41,'Pena Ltda.','73.648.243/0001-04','42940-520, Largo Mateus, 063. Apto 0\nPorto Leandro - PI',NULL,NULL,NULL,'18793-653',NULL,'Sergipe','(13) 90905-6347','(89) 97750-4764','Malena Hortência Rangel Sobrinho','furtado.michele@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(42,'Abreu e Associados','28.650.437/0001-90','68328-044, Travessa Catarina, 10758. 6º Andar\nAshley do Sul - ES',NULL,NULL,NULL,'40630-405',NULL,'Amapá','(32) 95788-4573','(42) 98308-1011','Dr. Carla Matos Perez','alma.fidalgo@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(43,'Leal e Vasques S.A.','48.936.963/0001-28','22259-821, Largo Mel Delatorre, 7424\nCarmona d\'Oeste - AP',NULL,NULL,NULL,'17946-384',NULL,'Rondônia','(24) 4307-9155','(68) 97351-2279','Jácomo Delatorre Barreto Sobrinho','rafael75@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(44,'Faro e Matos e Associados','21.756.974/0001-70','60132-429, Travessa Anderson, 12052. Apto 377\nVila Francisco - MA',NULL,NULL,NULL,'86844-268',NULL,'Maranhão','(81) 4034-7008','(38) 95735-2352','Sra. Norma Ferraz Sobrinho','kortiz@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(45,'Paes e Filhos','67.974.798/0001-43','10969-287, R. Salomé, 3983. Apto 3\nRosa do Sul - MA',NULL,NULL,NULL,'20083-092',NULL,'Acre','(61) 2287-1810','(73) 90447-8009','Srta. Michele Leal Lovato Jr.','estevao26@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(46,'Molina-Gusmão','85.663.895/0001-05','19799-626, Rua Ávila, 4729. F\nSanta Noelí do Leste - DF',NULL,NULL,NULL,'83760-229',NULL,'São Paulo','(77) 2123-1579','(75) 95566-1137','Dr. Benjamin Mateus Esteves','clara28@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(47,'Aguiar Comercial Ltda.','10.158.595/0001-61','81132-021, Travessa Beatriz Molina, 12177. Bc. 46 Ap. 28\nEvandro d\'Oeste - PR',NULL,NULL,NULL,'37043-772',NULL,'Sergipe','(43) 99592-3149','(17) 94556-5488','Dr. Mateus Roque','carlos.madeira@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01'),(48,'Molina Comercial Ltda.','12.189.183/0001-14','32564-307, Avenida Mariana, 0. F\nNatal d\'Oeste - RS',NULL,NULL,NULL,'06179-633',NULL,'Pará','(37) 4574-7256','(89) 90275-7911','Dr. Estêvão Carmona da Cruz Jr.','thiago68@example.net','2020-07-22 10:45:01','2020-07-22 10:45:01'),(49,'Batista-de Aguiar','08.823.813/0001-93','78126-274, Rua Ana Toledo, 7749\nCordeiro do Norte - PR',NULL,NULL,NULL,'51441-131',NULL,'Mato Grosso','(81) 95254-0114','(71) 94562-0413','Sr. Ian Francisco Pacheco','mia.sanches@example.org','2020-07-22 10:45:01','2020-07-22 10:45:01'),(50,'Zambrano e Meireles','58.103.895/0001-70','05231-134, R. Saraiva, 0\nKetlin do Sul - PI',NULL,NULL,NULL,'57954-993',NULL,'Maranhão','(38) 2603-4544','(12) 97048-4193','Sr. Leandro Estêvão Rico Sobrinho','ornela.duarte@example.com','2020-07-22 10:45:01','2020-07-22 10:45:01');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (265,'2014_10_12_000000_create_users_table',1),(266,'2014_10_12_100000_create_password_resets_table',1),(267,'2019_08_19_000000_create_failed_jobs_table',1),(268,'2020_07_04_200659_create_permission_tables',1),(269,'2020_07_04_201236_create_customers_table',1),(270,'2020_07_04_201327_create_agreements_table',1),(271,'2020_07_04_201709_create_categories_table',1),(272,'2020_07_04_201731_create_phones_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (2,'App\\Domain\\Models\\Tables\\User',1),(1,'App\\Domain\\Models\\Tables\\User',2),(1,'App\\Domain\\Models\\Tables\\User',3),(1,'App\\Domain\\Models\\Tables\\User',4),(1,'App\\Domain\\Models\\Tables\\User',5),(1,'App\\Domain\\Models\\Tables\\User',6),(1,'App\\Domain\\Models\\Tables\\User',7),(1,'App\\Domain\\Models\\Tables\\User',8),(1,'App\\Domain\\Models\\Tables\\User',9),(1,'App\\Domain\\Models\\Tables\\User',10),(1,'App\\Domain\\Models\\Tables\\User',11);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `agreement_id` int(10) unsigned NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_agreement_id_foreign` (`agreement_id`),
  CONSTRAINT `phones_agreement_id_foreign` FOREIGN KEY (`agreement_id`) REFERENCES `agreements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'employee','web','2020-07-22 10:44:59','2020-07-22 10:44:59'),(2,'admin','web','2020-07-22 10:44:59','2020-07-22 10:44:59'),(3,'customer','web','2020-07-22 10:44:59','2020-07-22 10:44:59');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Israel Dicki','admin@admin.com','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$njDYxa8GAaFVius38j.KL.NCPTf24ppkgZ0hWFsGFtbnHIftvXV46','2020-07-22 10:45:00','2020-07-22 10:45:00'),(2,'Darrick Bradtke','qrodriguez@example.org','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$IIH.oeI2tr57VTw60KN25OwWoRIz4quUcS8sz44fKPNh/l5W8ODie','2020-07-22 10:45:00','2020-07-22 10:45:00'),(3,'Zoe Hammes','lmetz@example.org','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$4PwwpUqci2Lzqe2Y9VXPmOxRce3ymaOywPM99NA3cd3nkxjOecQXa','2020-07-22 10:45:00','2020-07-22 10:45:00'),(4,'Kyra Grady I','boris02@example.net','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$w0wIJuBbzqfwU6c5HFvTre.KhE7T2g3/CDbiB.yxoE09oCCovoOfi','2020-07-22 10:45:00','2020-07-22 10:45:00'),(5,'Troy Huel','damon96@example.com','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$4F.iFxywn30B404GLgwZeOIy126kh9BxqLw3L.EwbaM0TakwyA.E6','2020-07-22 10:45:00','2020-07-22 10:45:00'),(6,'Dr. Lindsay White','heloise.rodriguez@example.org','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$Eq5/hYpbiz5xUyoeLWrrSuCT6M6uJ7ml1TZI/OOQQlAnKsVJ3bCta','2020-07-22 10:45:00','2020-07-22 10:45:00'),(7,'Krystina Halvorson','derrick.hill@example.org','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$L7LDnyvgfbLVYdqRQr3dnOicWYsfOu7sSHWoxusv0kZuKWQYu1VlC','2020-07-22 10:45:00','2020-07-22 10:45:00'),(8,'Lucile Powlowski','ubashirian@example.com','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$P.S9n2kcwaG.r3oHJQJzL.PUY.B0/GF8qMtN4p0bhMqdfKfnI3wYy','2020-07-22 10:45:00','2020-07-22 10:45:00'),(9,'Vaughn Weissnat II','carolanne.herman@example.com','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$C09fq8I6Us1aHAKDn/Fioua8pBDZZpHCLT7uZkRiT33utPCK6lx9S','2020-07-22 10:45:00','2020-07-22 10:45:00'),(10,'Bennett Keebler','abeer@example.net','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$oXDZ7zmqn7fuWADNezq0pedGhMOg9nyennkKI4mEdNFx4l/qyh3u2','2020-07-22 10:45:00','2020-07-22 10:45:00'),(11,'Clifton Torp','emitchell@example.com','2020-07-22 10:45:00','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','$2y$10$B9bb9FlLyNHpQ42QQ.B67uFIVv9tui0SMP1AfH6W3N0pMQjym4IIq','2020-07-22 10:45:00','2020-07-22 10:45:00');
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

-- Dump completed on 2020-07-22 10:56:22
