-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: tdah
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
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `contato_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  PRIMARY KEY (`contato_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato_profissional`
--

DROP TABLE IF EXISTS `contato_profissional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_profissional` (
  `contato_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `profissional_id` int(11) NOT NULL,
  PRIMARY KEY (`contato_id`),
  KEY `contato_profissional_profissional_fk` (`profissional_id`),
  CONSTRAINT `contato_profissional_profissional_fk` FOREIGN KEY (`profissional_id`) REFERENCES `profissional` (`profissional_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_profissional`
--

LOCK TABLES `contato_profissional` WRITE;
/*!40000 ALTER TABLE `contato_profissional` DISABLE KEYS */;
INSERT INTO `contato_profissional` VALUES (1,'telefone','(23) 2323-23232',72),(2,'celular2','(11) 9992-21212',72),(3,'telefone','(23) 2323-23232',73),(4,'celular2','(11) 9992-21212',73),(5,'telefone','(23) 2323-23232',74),(6,'celular2','(11) 9992-21212',74),(7,'telefone','(23) 2323-23232',75),(8,'celular2','(11) 9992-21212',75),(9,'telefone','(23) 2323-23232',76),(10,'celular2','(11) 9992-21212',76);
/*!40000 ALTER TABLE `contato_profissional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_registro` date NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `registro_id` int(11) NOT NULL,
  PRIMARY KEY (`empresa_id`),
  KEY `empresa_endereco_fk` (`endereco_id`),
  KEY `empresa_registro_fk` (`registro_id`),
  CONSTRAINT `empresa_endereco_fk` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empresa_registro_fk` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'JS Masters','2016-02-17',1,1);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `endereco_id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `complemento` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `uf` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `bairro` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`endereco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Rua Noemia Roberto da Silva','08280440','SÃ£o Paulo','ass','SE','asas',102),(158,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(159,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(160,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(161,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(162,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(163,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(164,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(165,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(166,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(167,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',454),(168,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',122),(169,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','','SP','Cidade LÃ­der',121),(170,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','21121212','SP','Cidade LÃ­der',12),(171,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(172,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(173,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(174,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(175,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(176,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(177,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','','SP','',0);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `permissao` varchar(255) NOT NULL,
  `chave` varchar(255) NOT NULL,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `login_login_idx` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin123');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissional`
--

DROP TABLE IF EXISTS `profissional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profissional` (
  `profissional_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco_id` int(11) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`profissional_id`),
  KEY `usuario_endereco_fk` (`endereco_id`),
  KEY `profissional_login_fk` (`login_id`),
  KEY `profissional_registro_fk` (`registro_id`),
  CONSTRAINT `profissional_registro_fk` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`registro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_endereco_fk` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional`
--

LOCK TABLES `profissional` WRITE;
/*!40000 ALTER TABLE `profissional` DISABLE KEYS */;
INSERT INTO `profissional` VALUES (1,'Admin',NULL,1,1,'teste@teste.com','',NULL),(70,'Leandro de Oliveira Morales',158,NULL,183,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(71,'Leandro de Oliveira Morales',159,NULL,184,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(72,'Leandro de Oliveira Morales',160,NULL,185,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(73,'Leandro de Oliveira Morales',161,NULL,186,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(74,'Leandro de Oliveira Morales',162,NULL,187,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(75,'Leandro de Oliveira Morales',163,NULL,188,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(76,'Leandro de Oliveira Morales',164,NULL,189,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(77,'Leandro de Oliveira Morales',165,NULL,190,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(78,'Leandro de Oliveira Morales',166,NULL,191,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(79,'Leandro de Oliveira Morales',167,NULL,192,'dev@hotelww.com.br','','1978-03-23'),(80,'Leandro de Oliveira Morales',168,NULL,193,'dev@hotelww.com.br','456.635.048-77','1978-03-23'),(81,'Leandro de Oliveira Morales',169,NULL,194,'dev@hotelww.com.br','','1978-03-23'),(82,'CRP',170,NULL,195,'leuzinhon@gmail.com','456.635.048-77','2017-02-19'),(83,'CRP',171,NULL,196,'leuzinhon@gmail.com','456.635.048-77','2017-02-19'),(84,'CRP',172,NULL,197,'leuzinhon@gmail.com','456.635.048-77','2017-02-06'),(85,'CRP',173,NULL,198,'leuzinhon@gmail.com','456.635.048-77','2017-02-06'),(86,'Iguer Morais',174,NULL,199,'js@masters.io','456.635.048-77','2017-02-19'),(87,'Iguer Morais',175,NULL,200,'js@masters.io','','2017-02-19'),(88,'Shiroma',176,NULL,201,'','456.635.048-77','2017-02-19'),(89,'Shiroma',177,NULL,202,'','','2017-02-19');
/*!40000 ALTER TABLE `profissional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `registro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,'CRP','12101323'),(2,'CNPJ','2343434'),(3,'CNPJ','gfgfg23232'),(4,'CNPJ','23232'),(5,'CNPJ','5655454343'),(6,'CNPJ','4346787878'),(7,'CNPJ','sdsdsdrwewrewrwe'),(8,'CNPJ','765654454'),(9,'CNPJ','878665545454'),(10,'CNPJ','878665545454'),(11,'CNPJ','878665545454'),(12,'CNPJ','878665545454'),(13,'CNPJ','4454578765'),(14,'CNPJ','64543433343'),(15,'CNPJ','23232323'),(16,'CNPJ','34ererere68'),(17,'CNPJ','3443243'),(18,'CNPJ','bvbvcbv'),(19,'CNPJ','dsdwewertr44212'),(20,'CNPJ','32323211212'),(21,'CNPJ','34555656456'),(22,'CNPJ','sw32423232'),(23,'CNPJ','ghghrttr422323'),(24,'CNPJ','233234'),(25,'CNPJ','sdsds'),(26,'CNPJ','asxzx'),(27,'CNPJ','3432332EXC'),(28,'CNPJ','3432332EXC'),(29,'CNPJ','sdw2323254'),(30,'CNPJ','dsdseweewew23232'),(31,'CNPJ','sddsdasdsad'),(32,'CNPJ','gk,,nm, m;m;.'),(33,'CNPJ','12.123.123/213'),(34,'CNPJ','12.123.123/213'),(35,'CNPJ','12.123.123/213'),(36,'CNPJ','17.504.684/0001-61'),(37,'CNPJ','17.504.684/0001-61'),(38,'CNPJ','62.511.530/0001-51'),(39,'CNPJ','62.511.530/0001-51'),(40,'CNPJ','62.504.862/0001-09'),(41,'CNPJ','62.504.862/0001-09'),(42,'CNPJ','58.164.377/0001-6'),(43,'CNPJ','58.164.377/0001-6'),(44,'CNPJ','58.164.377/0001-6'),(45,'CNPJ','58.164.377/0001-6'),(46,'CNPJ','58.164.377/0001-6'),(47,'CNPJ','58.164.377/0001-6'),(48,'CNPJ','71.553.788/0001-01'),(49,'CNPJ','29.853.523/0001-62'),(50,'CNPJ','29.853.523/0001-62'),(51,'CNPJ','29.853.523/0001-62'),(52,'CNPJ','25.265.860/0001-88'),(53,'CNPJ','25.265.860/0001-88'),(54,'CNPJ','25.265.860/0001-88'),(55,'CNPJ','25.265.860/0001-88'),(56,'CNPJ','51.684.772/0001-20'),(57,'CNPJ','51.684.772/0001-20'),(58,'CNPJ','51.684.772/0001-20'),(59,'CNPJ','51.684.772/0001-20'),(60,'CNPJ','51.684.772/0001-20'),(61,'CNPJ','51.684.772/0001-20'),(62,'CNPJ','51.684.772/0001-20'),(63,'CNPJ','51.684.772/0001-20'),(64,'CNPJ','51.684.772/0001-20'),(65,'CNPJ','51.684.772/0001-20'),(66,'CNPJ','51.684.772/0001-20'),(67,'CNPJ','51.684.772/0001-20'),(68,'CNPJ','51.684.772/0001-20'),(69,'CNPJ','51.684.772/0001-20'),(70,'CNPJ','51.684.772/0001-20'),(71,'CNPJ','51.684.772/0001-20'),(72,'CNPJ','51.684.772/0001-20'),(73,'CNPJ','51.684.772/0001-20'),(74,'CNPJ','51.684.772/0001-20'),(75,'CNPJ','51.684.772/0001-20'),(76,'CNPJ','51.684.772/0001-20'),(77,'CNPJ','51.684.772/0001-20'),(78,'CNPJ','51.684.772/0001-20'),(79,'CNPJ','51.684.772/0001-20'),(80,'CNPJ','18.162.235/0001-45'),(81,'CNPJ','18.162.235/0001-45'),(82,'CNPJ','18.162.235/0001-45'),(83,'CNPJ','18.162.235/0001-45'),(84,'CNPJ','18.162.235/0001-45'),(85,'CNPJ','18.162.235/0001-45'),(86,'CNPJ','55.252.314/0001-73'),(87,'CNPJ','55.252.314/0001-73'),(88,'CNPJ','55.252.314/0001-73'),(89,'CNPJ','29.771.216/0001-32'),(90,'CNPJ','33.350.684/0001-00'),(91,'CNPJ','44.832.589/0001-60'),(92,'CRP','223232'),(93,'CRP','223232'),(94,'CRP','223232'),(95,'CRP','223232'),(96,'CRP','223232'),(97,'CRP','223232'),(98,'CRP','223232'),(99,'CRP','223232'),(100,'CRP','223232'),(101,'CRP','223232'),(102,'CRP','223232'),(103,'CRP','223232'),(104,'CRP','223232'),(105,'CRP','223232'),(106,'CRP','223232'),(107,'CRP','223232'),(108,'CRP','223232'),(109,'CRP','223232'),(110,'CRP','223232'),(111,'CRP','223232'),(112,'CRP','223232'),(113,'CRP','223232'),(114,'CRP','223232'),(115,'CRP','223232'),(116,'CRP','223232'),(117,'CRP','223232'),(118,'CRP','223232'),(119,'CRP','223232'),(120,'CRP','223232'),(121,'CRP','223232'),(122,'CRP','223232'),(123,'CRP','23223'),(124,'CRP','23223'),(125,'CRP','123'),(126,'CRP','123'),(127,'CRP','123'),(128,'CRP','123'),(129,'CRP','123'),(130,'CRP','124343'),(131,'CRP','124343'),(132,'CRP','124343'),(133,'CRP','124343'),(134,'CRP','124343'),(135,'CRP','124343'),(136,'CRP','124343'),(137,'CRP','124343'),(138,'CRP','124343'),(139,'CRP','2323232'),(140,'CRP','2323232'),(141,'CRP','2323232'),(142,'CRP','2323232'),(143,'CRP','2323232'),(144,'CRP','2323232'),(145,'CRP','2323232'),(146,'CRP','2323232'),(147,'CRP','2323232'),(148,'CRP','2323232'),(149,'CRP','2323232'),(150,'CRP','2323232'),(151,'CRP','2323232'),(152,'CRP','2323232'),(153,'CRP','2323232'),(154,'CRP','2323232'),(155,'CRP','2323232'),(156,'CRP','2323232'),(157,'CRP','2323232'),(158,'CRP','2323232'),(159,'CRP','2323232'),(160,'CRP','2323232'),(161,'CRP','2323232'),(162,'CRP','2323232'),(163,'CRP','2323232'),(164,'CRP','2323232'),(165,'CRP','2323232'),(166,'CRP','2323232'),(167,'CRP','2323232'),(168,'CRP','2323232'),(169,'CRP','2323232'),(170,'CRP','2323232'),(171,'CRP','2323232'),(172,'CRP','2323232'),(173,'CRP','2323232'),(174,'CRP','2323232'),(175,'CRP','2323232'),(176,'CRP','2323232'),(177,'CRP','2323232'),(178,'CRP','2323232'),(179,'CRP','2323232'),(180,'CRP','2323232'),(181,'CRP','2323232'),(182,'CRP','r3443'),(183,'CRP','r3443'),(184,'CRP','r3443'),(185,'CRP','r3443'),(186,'CRP','r3443'),(187,'CRP','r3443'),(188,'CRP','r3443'),(189,'CRP','r3443'),(190,'CRP','r3443'),(191,'CRP','r3443'),(192,'CRP','r3443'),(193,'CRP','r3443'),(194,'CRP','r3443'),(195,'CRP','CRP'),(196,'CRP','CRP'),(197,'CRP','CRP'),(198,'CRP','CRP'),(199,'CRP','999000'),(200,'CRP','999000'),(201,'CRP','CRP'),(202,'CRP','CRP');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tdah'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-19 23:08:01
