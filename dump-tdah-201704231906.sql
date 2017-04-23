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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_profissional`
--

LOCK TABLES `contato_profissional` WRITE;
/*!40000 ALTER TABLE `contato_profissional` DISABLE KEYS */;
INSERT INTO `contato_profissional` VALUES (1,'telefone','(23) 2323-23232',72),(2,'celular2','(11) 9992-21212',72),(3,'telefone','(23) 2323-23232',73),(4,'celular2','(11) 9992-21212',73),(5,'telefone','(23) 2323-23232',74),(6,'celular2','(11) 9992-21212',74),(7,'telefone','(23) 2323-23232',75),(8,'celular2','(11) 9992-21212',75),(9,'telefone','(23) 2323-23232',76),(10,'celular2','(11) 9992-21212',76),(11,'telefone','(12) 1311-2121',105),(12,'celular','(99) 9999-9999',106),(13,'telefone2','(11) 2333-3333',106),(14,'telefone','(11) 3243-32212',107),(15,'telefone','(11) 2121-2121',108),(16,'telefone','(11) 2333-4343',109),(17,'telefone','(12) 1313-21343',111),(18,'telefone','(23) 2323-23232',112),(19,'celular','(11) 9332-11111',113),(26,'telefone','(22) 2222-22222',116),(27,'celular2','(88) 8888-88888',116),(28,'telefone','(11) 1111-1111',117),(29,'celular2','(99) 9999-99999',117);
/*!40000 ALTER TABLE `contato_profissional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato_responsavel`
--

DROP TABLE IF EXISTS `contato_responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_responsavel` (
  `contato_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `responsavel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`contato_id`),
  KEY `contato_responsavel_responsavel_fk` (`responsavel_id`),
  CONSTRAINT `contato_responsavel_responsavel_fk` FOREIGN KEY (`responsavel_id`) REFERENCES `responsavel` (`responsavel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_responsavel`
--

LOCK TABLES `contato_responsavel` WRITE;
/*!40000 ALTER TABLE `contato_responsavel` DISABLE KEYS */;
INSERT INTO `contato_responsavel` VALUES (1,'telefone','(11) 0000-00000',9),(2,'telefone','(11) 1111-1111',10),(3,'celular','(22) 2222-22222',10),(4,'telefone','(44) 4444-4444',11),(5,'celular','(55) 5555-55555',11),(6,'telefone','(66) 6666-6666',12),(7,'celular','(88) 8888-88888',12),(8,'telefone','(11) 0000-00000',13),(9,'celular','(12) 1212-12121',13),(10,'telefone','(12) 1212-1212',14),(11,'celular','(11) 1111-11111',14),(12,'telefone','(00) 0000-0000',15),(13,'celular','(00) 0000-00000',15),(14,'celular','(12) 2222-22222',16),(15,'telefone','(11) 0000-00000',16),(16,'telefone','(11) 0000-00000',17),(17,'celular','(11) 0000-00000',18),(18,'telefone','(33) 3333-33333',18),(19,'celular','(11) 0000-00000',19),(20,'telefone','(55) 5555-55555',19),(21,'telefone','(11) 0000-00000',20),(22,'telefone','(11) 0000-00000',21),(23,'celular','(11) 9999-99999',22),(24,'telefone','(11) 0000-00000',23);
/*!40000 ALTER TABLE `contato_responsavel` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'JS Masters','2016-02-17',1,1),(2,'Aprendendo PHP','1998-12-30',202,227);
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
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Rua Noemia Roberto da Silva','08280440','SÃ£o Paulo','ass','SE','asas',102),(158,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(159,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(160,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(161,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(162,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(163,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(164,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(165,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(166,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','Casa 2','SP','Cidade LÃ­der',98),(167,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',454),(168,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',122),(169,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','','SP','Cidade LÃ­der',121),(170,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','21121212','SP','Cidade LÃ­der',12),(171,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(172,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(173,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(174,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(175,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(176,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(177,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','','SP','',0),(178,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',102),(179,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(180,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','2232','SP','Cidade Lider',21),(181,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(182,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(183,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(184,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(185,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(186,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(187,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(188,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',21),(189,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(190,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','b','SP','Cidade LÃ­der',121),(191,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','323','SP','Cidade LÃ­der',32),(192,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',124343),(193,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','21121212','SP','Cidade LÃ­der',232),(194,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',3),(195,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','4','SP','SÃ©',0),(196,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SP','SÃ©',0),(197,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(198,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(199,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',12),(200,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(201,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',999),(202,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SE','SÃ©',3),(203,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','','Cidade LÃ­der',0),(204,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(205,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(206,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(207,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(208,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(209,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(210,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(211,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(212,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(213,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(214,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(215,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(216,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',0),(217,'Rua Noemia Roberto da Silva','08280440','SÃ£o Paulo','','SP','',0),(218,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','A','SP','Cidade LÃ­der',200),(219,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','A','SP','Cidade LÃ­der',700),(220,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',12),(221,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','b','SP','Cidade LÃ­der',12),(222,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','2','SP','Cidade LÃ­der',2),(223,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','a','SP','Cidade LÃ­der',1),(224,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(225,'Rua Gaspar Lucena','08280-480','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(226,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','lado Ã­mpar','SP','SÃ©',0),(227,'Rua NoÃªmia Roberto da Silva','08280-440','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(228,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(229,'Rua Agostinho da Faria','02801-005','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(230,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',255),(231,'Rua Agostinho da Faria','08280-100','SÃ£o Paulo','','SP','Cidade LÃ­der',0),(232,'','','','','','',0),(233,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SP','SÃ©',0),(234,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SP','SÃ©',0),(235,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SP','SÃ©',0),(236,'PraÃ§a da SÃ©','01001-001','SÃ£o Paulo','lado par','SP','SÃ©',999),(237,'PraÃ§a da SÃ©','01001-000','SÃ£o Paulo','','SP','SÃ©',0),(238,'','','','','','',0);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiacao_paciente`
--

DROP TABLE IF EXISTS `filiacao_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filiacao_paciente` (
  `filiacao_id` int(11) NOT NULL AUTO_INCREMENT,
  `responsavel_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`filiacao_id`),
  KEY `filiacao_paciente_paciente_fk` (`paciente_id`),
  KEY `filiacao_paciente_responsavel_fk` (`responsavel_id`),
  CONSTRAINT `filiacao_paciente_paciente_fk` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`paciente_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `filiacao_paciente_responsavel_fk` FOREIGN KEY (`responsavel_id`) REFERENCES `responsavel` (`responsavel_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiacao_paciente`
--

LOCK TABLES `filiacao_paciente` WRITE;
/*!40000 ALTER TABLE `filiacao_paciente` DISABLE KEYS */;
INSERT INTO `filiacao_paciente` VALUES (1,16,3,'pai'),(2,4,4,'mae'),(3,6,5,'mae'),(4,5,6,'outros'),(5,5,7,'outros'),(6,12,2,'mae'),(7,2,1,'pai');
/*!40000 ALTER TABLE `filiacao_paciente` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','3','admin123'),(2,'cig','d8578edf8458ce06fbc5bb76a58c5ca4','2','1111'),(3,'texug','7a090891df0fd5fad47f29fc44002ed2','3','moxum'),(4,'cly','75f009274d1d6cc47bcf72993d9d36ed','2','cly'),(7,'are','21232f297a57a5a743894a0e4a801fc3','3','12121212'),(8,'','d41d8cd98f00b204e9800998ecf8427e','',''),(9,'hander','b558c528c35de0ff2d78055a29a0908e','2','1234'),(10,'pscteste','698dc19d489c4e4db73e28a713eab07b','2','teste');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'Maurinho Estranho','2012-01-16'),(2,'Juninho Moreira','2013-05-06'),(3,'Marcinho do Voyage','2012-05-06'),(4,'Armandinho do Egito','2012-02-14'),(5,'Pracinha','2008-01-26'),(6,'Marcinho do Voyage 1','2012-05-07'),(7,'Marcinho do Voyage 2','2012-05-07');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
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
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`profissional_id`),
  KEY `usuario_endereco_fk` (`endereco_id`),
  KEY `profissional_login_fk` (`login_id`),
  KEY `profissional_registro_fk` (`registro_id`),
  KEY `profissional_empresa_fk` (`empresa_id`),
  CONSTRAINT `profissional_empresa_fk` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`empresa_id`),
  CONSTRAINT `profissional_registro_fk` FOREIGN KEY (`registro_id`) REFERENCES `registro` (`registro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_endereco_fk` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional`
--

LOCK TABLES `profissional` WRITE;
/*!40000 ALTER TABLE `profissional` DISABLE KEYS */;
INSERT INTO `profissional` VALUES (1,'Admin',NULL,1,1,'teste@teste.com','',NULL,1),(70,'Leandro de Oliveira Morales',158,NULL,183,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(71,'Leandro de Oliveira Morales',159,NULL,184,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(72,'Leandro de Oliveira Morales',160,NULL,185,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(73,'Leandro de Oliveira Morales',161,NULL,186,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(74,'Leandro de Oliveira Morales',162,NULL,187,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(75,'Leandro de Oliveira Morales',163,NULL,188,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(76,'Leandro de Oliveira Morales',164,NULL,189,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(77,'Leandro de Oliveira Morales',165,NULL,190,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(78,'Leandro de Oliveira Morales',166,NULL,191,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(79,'Leandro de Oliveira Morales',167,NULL,192,'dev@hotelww.com.br','','1978-03-23',1),(80,'Leandro de Oliveira Morales',168,NULL,193,'dev@hotelww.com.br','456.635.048-77','1978-03-23',1),(81,'Leandro de Oliveira Morales',169,NULL,194,'dev@hotelww.com.br','','1978-03-23',1),(82,'CRP',170,NULL,195,'leuzinhon@gmail.com','456.635.048-77','2017-02-19',1),(83,'CRP',171,NULL,196,'leuzinhon@gmail.com','456.635.048-77','2017-02-19',1),(84,'CRP',172,NULL,197,'leuzinhon@gmail.com','456.635.048-77','2017-02-06',1),(85,'CRP',173,NULL,198,'leuzinhon@gmail.com','456.635.048-77','2017-02-06',1),(86,'Iguer Morais',174,NULL,199,'js@masters.io','456.635.048-77','2017-02-19',1),(87,'Iguer Morais',175,NULL,200,'js@masters.io','','2017-02-19',1),(88,'Shiroma',176,NULL,201,'','456.635.048-77','2017-02-19',1),(89,'Shiroma',177,NULL,202,'','','2017-02-19',1),(90,'Antonio Tony',178,NULL,203,'tony@grau.com','456.635.048-77','2017-02-01',1),(91,'Antonio Tony',179,NULL,204,'','456.635.048-77','2017-02-01',1),(92,'Jame Vardy',180,0,205,'leuzinhon@gmail.com','132.322.212-22','1993-09-27',1),(93,'Antonio Tony',181,NULL,206,'','456.635.048-77','2017-02-01',1),(94,'Antonio Tony',182,NULL,207,'','456.635.048-77','2017-02-01',1),(95,'Antonio Tony',183,NULL,208,'','456.635.048-77','2017-02-01',1),(96,'Antonio Tony',184,NULL,209,'','456.635.048-77','2017-02-01',1),(97,'Antonio Tony',185,NULL,210,'','456.635.048-77','2017-02-01',1),(98,'Antonio Tony',186,NULL,211,'','456.635.048-77','2017-02-01',1),(99,'Antonio Tony',187,NULL,212,'','456.635.048-77','2017-02-01',1),(100,'Julian',188,NULL,213,'leuzinhon@hotmail.com','456.635.048-77','1879-12-30',1),(101,'Antonio Tony',189,NULL,214,'','456.635.048-77','2017-02-01',1),(102,'Genesio',190,NULL,215,'oliveira.dev1997@gmail.com','121.223.232-32','1998-09-12',1),(103,'Genesio',191,NULL,216,'oliveira.dev1997@gmail.com','456.635.048-77','1998-09-12',1),(104,'Julian',192,NULL,217,'','456.635.048-77','1879-12-30',1),(105,'Anselmo Selmo',193,NULL,218,'leuzinhon@teste','456.635.048-77','1996-09-27',1),(106,'Cigano Silveira',194,3,219,'cigano@shalan.com','998.654.332-23','1979-03-24',1),(107,'Edgar Luiz',195,NULL,220,'leuzinhon@gmail.com','456.635.048-77','1998-09-26',1),(108,'Armando',196,NULL,221,'oliveira.dev1997@gmail.com','456.635.048-77','1994-10-21',1),(109,'Qwerty de Morais',197,NULL,222,'lucianoemia2011@gmail.com','111.111.111-11','1965-11-13',1),(110,'Qwerty de Morais',198,0,223,'','111.111.111-11','1965-11-13',1),(111,'Clay',199,NULL,224,'leuzinhon@gmail.com','014.281.435-05','1821-12-12',1),(112,'Fry',200,10,225,'oliveira.dev1997@gmail.com','211.494.637-16','2323-03-12',1),(113,'Draxler',201,7,226,'ordir@gmail.com','570.633.321-12','1997-02-18',1),(116,'Hander Herreira 1',236,9,232,'hander@devjr.com.br','224.957.684-07','2013-02-04',2),(117,'Hander Herreira',237,NULL,233,'hander@devjr.com','806.588.200-52','2013-02-11',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,'CRP','12101323'),(2,'CNPJ','2343434'),(3,'CNPJ','gfgfg23232'),(4,'CNPJ','23232'),(5,'CNPJ','5655454343'),(6,'CNPJ','4346787878'),(7,'CNPJ','sdsdsdrwewrewrwe'),(8,'CNPJ','765654454'),(9,'CNPJ','878665545454'),(10,'CNPJ','878665545454'),(11,'CNPJ','878665545454'),(12,'CNPJ','878665545454'),(13,'CNPJ','4454578765'),(14,'CNPJ','64543433343'),(15,'CNPJ','23232323'),(16,'CNPJ','34ererere68'),(17,'CNPJ','3443243'),(18,'CNPJ','bvbvcbv'),(19,'CNPJ','dsdwewertr44212'),(20,'CNPJ','32323211212'),(21,'CNPJ','34555656456'),(22,'CNPJ','sw32423232'),(23,'CNPJ','ghghrttr422323'),(24,'CNPJ','233234'),(25,'CNPJ','sdsds'),(26,'CNPJ','asxzx'),(27,'CNPJ','3432332EXC'),(28,'CNPJ','3432332EXC'),(29,'CNPJ','sdw2323254'),(30,'CNPJ','dsdseweewew23232'),(31,'CNPJ','sddsdasdsad'),(32,'CNPJ','gk,,nm, m;m;.'),(33,'CNPJ','12.123.123/213'),(34,'CNPJ','12.123.123/213'),(35,'CNPJ','12.123.123/213'),(36,'CNPJ','17.504.684/0001-61'),(37,'CNPJ','17.504.684/0001-61'),(38,'CNPJ','62.511.530/0001-51'),(39,'CNPJ','62.511.530/0001-51'),(40,'CNPJ','62.504.862/0001-09'),(41,'CNPJ','62.504.862/0001-09'),(42,'CNPJ','58.164.377/0001-6'),(43,'CNPJ','58.164.377/0001-6'),(44,'CNPJ','58.164.377/0001-6'),(45,'CNPJ','58.164.377/0001-6'),(46,'CNPJ','58.164.377/0001-6'),(47,'CNPJ','58.164.377/0001-6'),(48,'CNPJ','71.553.788/0001-01'),(49,'CNPJ','29.853.523/0001-62'),(50,'CNPJ','29.853.523/0001-62'),(51,'CNPJ','29.853.523/0001-62'),(52,'CNPJ','25.265.860/0001-88'),(53,'CNPJ','25.265.860/0001-88'),(54,'CNPJ','25.265.860/0001-88'),(55,'CNPJ','25.265.860/0001-88'),(56,'CNPJ','51.684.772/0001-20'),(57,'CNPJ','51.684.772/0001-20'),(58,'CNPJ','51.684.772/0001-20'),(59,'CNPJ','51.684.772/0001-20'),(60,'CNPJ','51.684.772/0001-20'),(61,'CNPJ','51.684.772/0001-20'),(62,'CNPJ','51.684.772/0001-20'),(63,'CNPJ','51.684.772/0001-20'),(64,'CNPJ','51.684.772/0001-20'),(65,'CNPJ','51.684.772/0001-20'),(66,'CNPJ','51.684.772/0001-20'),(67,'CNPJ','51.684.772/0001-20'),(68,'CNPJ','51.684.772/0001-20'),(69,'CNPJ','51.684.772/0001-20'),(70,'CNPJ','51.684.772/0001-20'),(71,'CNPJ','51.684.772/0001-20'),(72,'CNPJ','51.684.772/0001-20'),(73,'CNPJ','51.684.772/0001-20'),(74,'CNPJ','51.684.772/0001-20'),(75,'CNPJ','51.684.772/0001-20'),(76,'CNPJ','51.684.772/0001-20'),(77,'CNPJ','51.684.772/0001-20'),(78,'CNPJ','51.684.772/0001-20'),(79,'CNPJ','51.684.772/0001-20'),(80,'CNPJ','18.162.235/0001-45'),(81,'CNPJ','18.162.235/0001-45'),(82,'CNPJ','18.162.235/0001-45'),(83,'CNPJ','18.162.235/0001-45'),(84,'CNPJ','18.162.235/0001-45'),(85,'CNPJ','18.162.235/0001-45'),(86,'CNPJ','55.252.314/0001-73'),(87,'CNPJ','55.252.314/0001-73'),(88,'CNPJ','55.252.314/0001-73'),(89,'CNPJ','29.771.216/0001-32'),(90,'CNPJ','33.350.684/0001-00'),(91,'CNPJ','44.832.589/0001-60'),(92,'CRP','223232'),(93,'CRP','223232'),(94,'CRP','223232'),(95,'CRP','223232'),(96,'CRP','223232'),(97,'CRP','223232'),(98,'CRP','223232'),(99,'CRP','223232'),(100,'CRP','223232'),(101,'CRP','223232'),(102,'CRP','223232'),(103,'CRP','223232'),(104,'CRP','223232'),(105,'CRP','223232'),(106,'CRP','223232'),(107,'CRP','223232'),(108,'CRP','223232'),(109,'CRP','223232'),(110,'CRP','223232'),(111,'CRP','223232'),(112,'CRP','223232'),(113,'CRP','223232'),(114,'CRP','223232'),(115,'CRP','223232'),(116,'CRP','223232'),(117,'CRP','223232'),(118,'CRP','223232'),(119,'CRP','223232'),(120,'CRP','223232'),(121,'CRP','223232'),(122,'CRP','223232'),(123,'CRP','23223'),(124,'CRP','23223'),(125,'CRP','123'),(126,'CRP','123'),(127,'CRP','123'),(128,'CRP','123'),(129,'CRP','123'),(130,'CRP','124343'),(131,'CRP','124343'),(132,'CRP','124343'),(133,'CRP','124343'),(134,'CRP','124343'),(135,'CRP','124343'),(136,'CRP','124343'),(137,'CRP','124343'),(138,'CRP','124343'),(139,'CRP','2323232'),(140,'CRP','2323232'),(141,'CRP','2323232'),(142,'CRP','2323232'),(143,'CRP','2323232'),(144,'CRP','2323232'),(145,'CRP','2323232'),(146,'CRP','2323232'),(147,'CRP','2323232'),(148,'CRP','2323232'),(149,'CRP','2323232'),(150,'CRP','2323232'),(151,'CRP','2323232'),(152,'CRP','2323232'),(153,'CRP','2323232'),(154,'CRP','2323232'),(155,'CRP','2323232'),(156,'CRP','2323232'),(157,'CRP','2323232'),(158,'CRP','2323232'),(159,'CRP','2323232'),(160,'CRP','2323232'),(161,'CRP','2323232'),(162,'CRP','2323232'),(163,'CRP','2323232'),(164,'CRP','2323232'),(165,'CRP','2323232'),(166,'CRP','2323232'),(167,'CRP','2323232'),(168,'CRP','2323232'),(169,'CRP','2323232'),(170,'CRP','2323232'),(171,'CRP','2323232'),(172,'CRP','2323232'),(173,'CRP','2323232'),(174,'CRP','2323232'),(175,'CRP','2323232'),(176,'CRP','2323232'),(177,'CRP','2323232'),(178,'CRP','2323232'),(179,'CRP','2323232'),(180,'CRP','2323232'),(181,'CRP','2323232'),(182,'CRP','r3443'),(183,'CRP','r3443'),(184,'CRP','r3443'),(185,'CRP','r3443'),(186,'CRP','r3443'),(187,'CRP','r3443'),(188,'CRP','r3443'),(189,'CRP','r3443'),(190,'CRP','r3443'),(191,'CRP','r3443'),(192,'CRP','r3443'),(193,'CRP','r3443'),(194,'CRP','r3443'),(195,'CRP','CRP'),(196,'CRP','CRP'),(197,'CRP','CRP'),(198,'CRP','CRP'),(199,'CRP','999000'),(200,'CRP','999000'),(201,'CRP','CRP'),(202,'CRP','CRP'),(203,'CRP','124343'),(204,'','124343'),(205,'CRP','55665'),(206,'','124343'),(207,'','124343'),(208,'','124343'),(209,'','124343'),(210,'','124343'),(211,'','124343'),(212,'','124343'),(213,'CRP','124343'),(214,'','124343'),(215,'CRP','13123'),(216,'CRP','13123'),(217,'CRP','124343'),(218,'CRP','124343'),(219,'CRM','7767447'),(220,'CRP','9999'),(221,'CRP','80000'),(222,'CRP','76000'),(223,'CRP','76000'),(224,'CRP','7767447'),(225,'CRP','7767447'),(226,'CRM','9949292'),(227,'CNPJ','46.678.852/0001-33'),(228,'',''),(229,'CRP','111111'),(230,'CRP','11111'),(231,'CRP','11111111'),(232,'CRM','888888888'),(233,'CRM','999999'),(234,'','');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsavel`
--

DROP TABLE IF EXISTS `responsavel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsavel` (
  `responsavel_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `endereco_id` int(11) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`responsavel_id`),
  KEY `responsavel_endereco_fk` (`endereco_id`),
  KEY `responsavel_cpf_idx` (`cpf`),
  CONSTRAINT `responsavel_endereco_fk` FOREIGN KEY (`endereco_id`) REFERENCES `endereco` (`endereco_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsavel`
--

LOCK TABLES `responsavel` WRITE;
/*!40000 ALTER TABLE `responsavel` DISABLE KEYS */;
INSERT INTO `responsavel` VALUES (1,'Carlinhos Tapioca',209,'823.443.503-57','lucianoemia2011@gmail.com','1980-07-28'),(2,'Volim Silva',210,'327.555.492-11','lucianoemia2011@gmail.com','1990-08-12'),(3,'Deschamps ',211,'320.412.756-77','lucianoemia2011@gmail.com','1988-01-20'),(4,'Poninho',212,'320.412.756-77','lucianoemia2011@gmail.com','2000-12-22'),(5,'Armando',213,'320.412.756-77','leuzinhon@hotmail.com','1111-11-11'),(6,'Carlinhos Tapioca',214,'320.412.756-77','lucianoemia2011@gmail.com','1212-02-21'),(7,'Antonio Tony 124343',215,'823.443.503-57','lucianoemia2011@gmail.com','2017-04-10'),(8,'Fry',216,'823.443.503-57','lucianoemia2011@gmail.com','0111-11-11'),(9,'CNPJ',217,'823.443.503-57','lucianoemia2011@gmail.com','0000-00-00'),(10,'Jorginho',218,'903.356.486-65','dev@hostelaria.com.br','3333-03-31'),(11,'do Niteroi',219,'447.816.818-08','leuzinhon@hotmail.com','2222-02-22'),(12,'Join',220,'487.626.188-14','lucianoemia2031@gmail.com','0000-00-00'),(13,'Sauro SandrÃ©',221,'685.462.525-48','leuzinhon@sauro.co','1212-12-12'),(14,'Ziginho Pomp',222,'870.664.113-07','lucianoemia2017@gmail.com','2017-04-03'),(15,'Adones',223,'848.462.947-30','clon@gmail.com','0121-12-12'),(16,'Janken',224,'118.713.272-10','leuzinhon@htmail.com','2017-04-02'),(17,'CRP',225,'320.412.756-77','t@teste.c','2017-04-05'),(18,'Cigano Silveira CRM 7767447',226,'123.857.353-34','lucianoemia2001@gmail.com','2017-04-02'),(19,'qwqwq',227,'252.592.814-89','lucianoemia11@gmail.com','2017-04-02'),(20,'122121',228,'320.412.756-77','lucianoemia21@gmail.com','2017-04-02'),(21,'Casemiro',229,'375.232.552-64','12@gmail.com','2017-04-02'),(22,'Shiroma CRP K5',230,'823.443.503-57','lucianoemia2011@gmail.com','2017-04-02'),(23,'qwqwqw',231,'723.078.859-51','34@gmail.com','2017-04-02');
/*!40000 ALTER TABLE `responsavel` ENABLE KEYS */;
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

-- Dump completed on 2017-04-23 19:06:07
