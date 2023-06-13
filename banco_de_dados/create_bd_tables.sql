-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pet_shop_bd
CREATE DATABASE IF NOT EXISTS `pet_shop_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pet_shop_bd`;

-- Dumping structure for table pet_shop_bd.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `cpfCliente` varchar(50) DEFAULT NULL,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.cliente: ~0 rows (approximately)
INSERT INTO `cliente` (`idCliente`, `cpfCliente`, `nomeCliente`, `telefoneCliente`) VALUES
	(1, '15138358300', 'Caruso', '31987354853'),
	(2, '34543835221', 'Karen', '11989596533'),
	(3, '35435484352', 'Felipe', '51943584350'),
	(4, '38438487976', 'Lucas', '11986846659'),
	(5, '48137487849', 'Ester', '51975465586'),
	(6, '54003664657', 'Gabriel', '19974552288'),
	(7, '66876435475', 'Bruna', '27976843822'),
	(8, '68431541065', 'Miguel', '11986043207'),
	(9, '68651543560', 'Joao', '19998562340'),
	(10, '96876656533', 'Marcela', '31989868850');

-- Dumping structure for table pet_shop_bd.clienteservico
CREATE TABLE IF NOT EXISTS `clienteservico` (
  `fk_cliente_idCliente` int DEFAULT NULL,
  `fk_servico_idServico` int DEFAULT NULL,
  KEY `fk_cliente_idCliente` (`fk_cliente_idCliente`),
  KEY `fk_servico_idServico` (`fk_servico_idServico`),
  CONSTRAINT `clienteservico_ibfk_1` FOREIGN KEY (`fk_cliente_idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `clienteservico_ibfk_2` FOREIGN KEY (`fk_servico_idServico`) REFERENCES `servico` (`idServico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.clienteservico: ~0 rows (approximately)
INSERT INTO `clienteservico` (`fk_cliente_idCliente`, `fk_servico_idServico`) VALUES
	(1, 1),
	(2, 3),
	(3, 3),
	(4, 3),
	(5, 2),
	(6, 2),
	(7, 7),
	(8, 5),
	(9, 6),
	(10, 4),
	(11, 6),
	(12, 2);

-- Dumping structure for table pet_shop_bd.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `idCompra` int NOT NULL AUTO_INCREMENT,
  `dataCompra` datetime DEFAULT NULL,
  `valorTotal` decimal(10,0) DEFAULT NULL,
  `fk_cliente_idCliente` int DEFAULT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_cliente_idCliente` (`fk_cliente_idCliente`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_cliente_idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.compra: ~0 rows (approximately)
INSERT INTO `compra` (`idCompra`, `dataCompra`, `valorTotal`, `fk_cliente_idCliente`) VALUES
	(1, '2023-06-12 10:00:00', 1000, 1),
	(2, '2023-06-11 14:30:00', 500, 2),
	(3, '2023-06-10 18:15:00', 750, 3),
	(4, '2023-06-09 09:45:00', 1200, 1),
	(5, '2023-06-08 16:20:00', 800, 4);

-- Dumping structure for table pet_shop_bd.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int NOT NULL AUTO_INCREMENT,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `fk_idCliente` int DEFAULT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `fk_idCliente` (`fk_idCliente`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`fk_idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.endereco: ~0 rows (approximately)

-- Dumping structure for table pet_shop_bd.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int NOT NULL AUTO_INCREMENT,
  `cpfFuncionario` varchar(20) DEFAULT NULL,
  `nomeFuncionario` varchar(50) DEFAULT NULL,
  `cargoFuncionario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.funcionario: ~0 rows (approximately)
INSERT INTO `funcionario` (`idFuncionario`, `cpfFuncionario`, `nomeFuncionario`, `cargoFuncionario`) VALUES
	(1, '12345678900', 'João Silva', 'administrador'),
	(2, '98765432100', 'Maria Santos', 'vendedor'),
	(3, '45678912300', 'Pedro Oliveira', 'gerente'),
	(4, '78912345600', 'Ana Rodrigues', 'vendedor'),
	(5, '65432198700', 'Carlos Souza', 'administrador'),
	(6, '32165498700', 'Laura Pereira', 'administrador');

-- Dumping structure for table pet_shop_bd.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(20) DEFAULT NULL,
  `codProduto` int DEFAULT NULL,
  `valorProduto` decimal(10,0) DEFAULT NULL,
  `descricaoProduto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.produto: ~0 rows (approximately)
INSERT INTO `produto` (`idProduto`, `nomeProduto`, `codProduto`, `valorProduto`, `descricaoProduto`) VALUES
	(1, 'Ração para cães', 1001, 50, 'Ração balanceada para cães de todas as raças e idades'),
	(2, 'Shampoo para gatos', 2001, 25, 'Shampoo suave para higiene e limpeza de gatos'),
	(3, 'Brinquedo interativo', 3001, 15, 'Brinquedo para entretenimento e estimulação mental de pets'),
	(4, 'Coleira anti-pulgas', 4001, 30, 'Coleira ajustável com proteção contra pulgas e carrapatos'),
	(5, 'Caminha para cães', 5001, 60, 'Caminha confortável e resistente para cães de porte médio');

-- Dumping structure for table pet_shop_bd.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `idServico` int NOT NULL AUTO_INCREMENT,
  `nomeServico` varchar(50) DEFAULT NULL,
  `valorServico` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idServico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.servico: ~0 rows (approximately)
INSERT INTO `servico` (`idServico`, `nomeServico`, `valorServico`) VALUES
	(1, 'Banho e tosa', 60),
	(2, 'Consulta veterinária', 120),
	(3, 'Vacinação', 40),
	(4, 'Hospedagem', 80),
	(5, 'Tratamento contra pulgas e carrapatos', 50);

-- Dumping structure for table pet_shop_bd.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(50) DEFAULT NULL,
  `senhaUsuario` varchar(20) DEFAULT NULL,
  `emailUsuario` varchar(50) DEFAULT NULL,
  `administrador` tinyint(1) DEFAULT '0',
  `fk_idFuncionario` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `uc_email` (`emailUsuario`),
  KEY `fk_idFuncionario` (`fk_idFuncionario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.usuario: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
