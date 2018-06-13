CREATE DATABASE  IF NOT EXISTS `locadora` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `locadora`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: locadora
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `cat_veiculo`
--

DROP TABLE IF EXISTS `cat_veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_veiculo` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_veiculo`
--

LOCK TABLES `cat_veiculo` WRITE;
/*!40000 ALTER TABLE `cat_veiculo` DISABLE KEYS */;
INSERT INTO `cat_veiculo` VALUES (1,'POPULAR'),(2,'SUV'),(3,'PICK-UP'),(4,'LUXO'),(5,'UTILITARIO'),(6,'VAN'),(7,'CAMINHÃO'),(8,'ÔNIBUS'),(9,'MOTOCICLETA');
/*!40000 ALTER TABLE `cat_veiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(120) NOT NULL,
  `cli_datanascimento` date NOT NULL,
  `cpf_cliente` varchar(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (39,'RAIMUNDO MARTINS RODRIGUES','0000-00-00','77328426349'),(40,'MARCIA ROBERTA RODRUIGUES DE MORAIS PINHEIRO','0000-00-00','75068800325'),(41,'MARIA DAS DORES SOUZA GONÇALVES','0000-00-00','62684698368'),(42,'RAIMUNDO MARCELO MESQUITA','0000-00-00','3398448763'),(43,'RAIMUNDO VIEIRA FILHO','0000-00-00','73023060363'),(44,'DANIELLY SA E SILVA','0000-00-00','7143815357'),(45,'EVERTON BRITO DOS SANTOS','0000-00-00','883945304'),(46,'JOSE OSMAR COSTA DE ARAUJO','0000-00-00','3813206343'),(47,'GEORGIO RICARDO CUNHA DA SILVA','0000-00-00','1067646329'),(48,'FRANCISCO BARROS DOS SANTOS','0000-00-00','84177403334'),(49,'FRANCISCO EDIVALDO OLIVEIRA CASTRO','0000-00-00','96986778368'),(50,'FRANCISCO CARLOS GOMES DE SOUSA','0000-00-00','92239331372'),(51,'GILVAR LIMA DOS SANTOS','0000-00-00','66549590353'),(52,'JOSE RONALDO FERREIRA SOUSA','0000-00-00','75322692304'),(53,'ANTÔNIA REGILA RIBEIRO LOPES','0000-00-00','96701552315'),(54,'ANTONIO CARLOS RODRIGUES FERREIRA','0000-00-00','54934478353'),(55,'EDILEUSA PEREIRA RODRIGUES','0000-00-00','69551944372'),(56,'MARIA ARINETE DO NASCIMENTO COSTA','0000-00-00','51388162334'),(57,'ANTONIO JUNIOR DO NASCIMENTO','0000-00-00','38898160372');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `func_nomecompleto` varchar(120) NOT NULL,
  `func_cargo` varchar(60) NOT NULL,
  `func_salario` float NOT NULL,
  PRIMARY KEY (`id_func`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES (1,'MOREIRA LOTES','AUX ADMINISTRATIVO',1500),(2,'CLAUDIA MOREIRA','DIRETORA',5500),(3,'WELDER LOPES','FATURISTA',1500),(4,'VLADIA CAMARGO','TESOURERIRAO',2500),(5,'FLAVIO CIPRIÃO','SERVIÇOS GERAIS',1200),(6,'CARLOS PEREIRA','MOTORISTA',2000);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacao`
--

DROP TABLE IF EXISTS `locacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locacao` (
  `id_locacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id_locacao`),
  KEY `pk_cliente_idx` (`id_cliente`),
  CONSTRAINT `pk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacao`
--

LOCK TABLES `locacao` WRITE;
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
INSERT INTO `locacao` VALUES (1,1,39,'2018-06-01','2018-06-07'),(2,2,44,'2018-06-11','2018-06-20');
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_func` int(11) NOT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_senha` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'MOREIRA','1234'),(2,2,'CLAUDIO','1234'),(3,6,'carlos','carlos'),(127,4,'vladia','vladia');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `veiculo_descricao` varchar(60) NOT NULL,
  `veiculo_placa` varchar(8) NOT NULL,
  `veiculo_cor` varchar(15) NOT NULL,
  `veiculo_ano` int(11) NOT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (1,1,'GOL','HYY0103','BRANCO',2016),(2,4,'COROLA','HGGS403','PRATA',2018),(3,1,'SAVEIRO','GYY3563','PRETA',2018),(4,5,'HILUX','ADY0199','PRATA',2018),(5,1,'HB20','FYY5703','BRANCO',2018),(6,1,'SANDERO','GYY1105','PRETO',2018),(7,4,'FUSION','FFR0145','AZUL',2018),(10,5,'SPIN','ABC0101','PRETA',2009);
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER trg_veiculo AFTER DELETE ON veiculo FOR EACH ROW
BEGIN
	
    CALL del_veiculo( OLD.id_veiculo );
    
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'locadora'
--

--
-- Dumping routines for database 'locadora'
--
/*!50003 DROP FUNCTION IF EXISTS `periodo_locacao` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `periodo_locacao`( idveiculo int, dataini date, datafim date ) RETURNS tinyint(1)
BEGIN
	
    DECLARE result boolean;
    SET result = (SELECT 
		COUNT(id_locacao)
    FROM 
		locacao 
    WHERE 
		id_veiculo = idveiculo
        AND (dataini BETWEEN data_inicio AND data_fim) OR (datafim BETWEEN data_inicio AND data_fim));
        
	RETURN result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `del_veiculo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `del_veiculo`( idveiculo int )
BEGIN

	DELETE FROM locacao WHERE id_veiculo = idveiculo;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-13 13:07:42
