-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: DocPC
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `Articulo`
--

DROP TABLE IF EXISTS `Articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articulo` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `claveArticulo` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`idArticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articulo`
--

LOCK TABLES `Articulo` WRITE;
/*!40000 ALTER TABLE `Articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `Persona_idPersona` int(11) NOT NULL,
  `fechaPrimerCompra` date DEFAULT NULL,
  PRIMARY KEY (`Persona_idPersona`),
  KEY `fk_Cliente_Persona1_idx` (`Persona_idPersona`),
  CONSTRAINT `fk_Cliente_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Empleado`
--

DROP TABLE IF EXISTS `Empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empleado` (
  `Persona_idPersona` int(11) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  PRIMARY KEY (`Persona_idPersona`),
  KEY `fk_Empleado_Persona_idx` (`Persona_idPersona`),
  CONSTRAINT `fk_Empleado_Persona` FOREIGN KEY (`Persona_idPersona`) REFERENCES `Persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empleado`
--

LOCK TABLES `Empleado` WRITE;
/*!40000 ALTER TABLE `Empleado` DISABLE KEYS */;
INSERT INTO `Empleado` VALUES (1,'c51bdca26a4e81a2e31db1991a5cee3c','2012-02-20');
/*!40000 ALTER TABLE `Empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Persona`
--

DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombresPersona` varchar(45) DEFAULT NULL,
  `aPaterno` varchar(45) DEFAULT NULL,
  `aMaterno` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Persona`
--

LOCK TABLES `Persona` WRITE;
/*!40000 ALTER TABLE `Persona` DISABLE KEYS */;
INSERT INTO `Persona` VALUES (1,'Saúl','Gómez','Navarrete','Santa Maria Endare,Jocotitlan','7121675322','minsau2@gmail.com');
/*!40000 ALTER TABLE `Persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio`
--

DROP TABLE IF EXISTS `Servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `claveServicio` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio`
--

LOCK TABLES `Servicio` WRITE;
/*!40000 ALTER TABLE `Servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `Servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio_has_Venta`
--

DROP TABLE IF EXISTS `Servicio_has_Venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicio_has_Venta` (
  `Servicio_idServicio` int(11) NOT NULL,
  `Venta_idVenta` int(11) NOT NULL,
  PRIMARY KEY (`Servicio_idServicio`,`Venta_idVenta`),
  KEY `fk_Servicio_has_Venta_Venta1_idx` (`Venta_idVenta`),
  KEY `fk_Servicio_has_Venta_Servicio1_idx` (`Servicio_idServicio`),
  CONSTRAINT `fk_Servicio_has_Venta_Servicio1` FOREIGN KEY (`Servicio_idServicio`) REFERENCES `Servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicio_has_Venta_Venta1` FOREIGN KEY (`Venta_idVenta`) REFERENCES `Venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio_has_Venta`
--

LOCK TABLES `Servicio_has_Venta` WRITE;
/*!40000 ALTER TABLE `Servicio_has_Venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Servicio_has_Venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Venta`
--

DROP TABLE IF EXISTS `Venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `Empleado_Persona_idPersona` int(11) NOT NULL,
  `Cliente_Persona_idPersona` int(11) NOT NULL,
  `costoTotal` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idVenta`,`Empleado_Persona_idPersona`,`Cliente_Persona_idPersona`),
  KEY `fk_Venta_Empleado1_idx` (`Empleado_Persona_idPersona`),
  KEY `fk_Venta_Cliente1_idx` (`Cliente_Persona_idPersona`),
  CONSTRAINT `fk_Venta_Cliente1` FOREIGN KEY (`Cliente_Persona_idPersona`) REFERENCES `Cliente` (`Persona_idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Empleado1` FOREIGN KEY (`Empleado_Persona_idPersona`) REFERENCES `Empleado` (`Persona_idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Venta`
--

LOCK TABLES `Venta` WRITE;
/*!40000 ALTER TABLE `Venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `Venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Venta_has_Articulo`
--

DROP TABLE IF EXISTS `Venta_has_Articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Venta_has_Articulo` (
  `Venta_idVenta` int(11) NOT NULL,
  `Articulo_idArticulo` int(11) NOT NULL,
  PRIMARY KEY (`Venta_idVenta`,`Articulo_idArticulo`),
  KEY `fk_Venta_has_Articulo_Articulo1_idx` (`Articulo_idArticulo`),
  KEY `fk_Venta_has_Articulo_Venta1_idx` (`Venta_idVenta`),
  CONSTRAINT `fk_Venta_has_Articulo_Articulo1` FOREIGN KEY (`Articulo_idArticulo`) REFERENCES `Articulo` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_has_Articulo_Venta1` FOREIGN KEY (`Venta_idVenta`) REFERENCES `Venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Venta_has_Articulo`
--

LOCK TABLES `Venta_has_Articulo` WRITE;
/*!40000 ALTER TABLE `Venta_has_Articulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Venta_has_Articulo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-03 11:45:36
