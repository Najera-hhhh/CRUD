/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ empresa /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE empresa;

DROP TABLE IF EXISTS clientes;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RFC` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS documento;
CREATE TABLE `documento` (
  `idCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `razonSocial` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RFC` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(13,3) DEFAULT NULL,
  `iva` double(13,3) DEFAULT NULL,
  `total` double(13,3) DEFAULT NULL,
  PRIMARY KEY (`idCodigo`),
  KEY `fK_documento_cliente` (`idCliente`),
  CONSTRAINT `fK_documento_cliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS documentorenglon;
CREATE TABLE `documentorenglon` (
  `idCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `idMaterial` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidadMedida` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` double(13,3) DEFAULT NULL,
  `precio1` double(13,3) DEFAULT NULL,
  PRIMARY KEY (`idCodigo`),
  KEY `fK_documentorenglon_productos` (`idMaterial`),
  CONSTRAINT `fK_documentorenglon_productos` FOREIGN KEY (`idMaterial`) REFERENCES `productos` (`idMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS productos;
CREATE TABLE `productos` (
  `idMaterial` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidadMedida` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio1` double(13,3) DEFAULT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO clientes(idCliente,razonSocial,RFC) VALUES(4,'NAJSE312AS','NAJSE312AS'),(60,'KJDSW092','KJDSW092');

INSERT INTO documento(idCodigo,idCliente,razonSocial,RFC,subtotal,iva,total) VALUES(1,NULL,NULL,NULL,NULL,NULL,NULL),(2,4,NULL,NULL,NULL,NULL,NULL),(3,4,'LDFFKS!123','NJASF21234AL',10000.000,12.000,11200.000),(4,4,'LDFFKS!123','NJASF21234AL',10000.000,12.000,11200.000),(5,4,'LDFFKS!123','NJASF21234AL',10000.000,12.000,11200.000),(6,4,'LDFFKS!123','NJASF21234AL',60000.000,12.000,67200.000),(7,60,'KJDSW092','KJDSW092',12000.000,12.000,13440.000),(8,60,'KJDSW092','KJDSW092',20000.000,12.000,22400.000);

INSERT INTO documentorenglon(idCodigo,idMaterial,unidadMedida,cantidad,precio1) VALUES(1,'0001','unidad',12.000,5000.000),(2,'0001','pieza',2.000,6000.000),(3,'0004','Kilogramos',100.000,200.000);
INSERT INTO productos(idMaterial,descripcion,unidadMedida,precio1) VALUES('0001','pc de escritorio','pieza',6000.000),('0002','electronico','unidad',12333.000),('0003','laptop','pieza',2050.000),('0004','Metal','Kilogramos',200.000);