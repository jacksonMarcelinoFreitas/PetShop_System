-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
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

-- Dumping structure for table pet_shop_bd.animal
CREATE TABLE IF NOT EXISTS `animal` (
  `idAnimal` int NOT NULL AUTO_INCREMENT,
  `nomeAnimal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fk_idCliente` int NOT NULL,
  PRIMARY KEY (`idAnimal`) USING BTREE,
  KEY `FK_idCliente_idAnimal` (`fk_idCliente`) USING BTREE,
  CONSTRAINT `FK_idCliente_idAnimal` FOREIGN KEY (`fk_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.animal: ~20 rows (approximately)
INSERT INTO `animal` (`idAnimal`, `nomeAnimal`, `fk_idCliente`) VALUES
	(1, 'Gato', 1),
	(2, 'Cachorro', 2),
	(3, 'Coelho', 3),
	(4, 'Hamster', 4),
	(5, 'Peixe', 5),
	(6, 'Gato', 6),
	(7, 'Cachorro', 7),
	(8, 'Coelho', 8),
	(9, 'Hamster', 9),
	(10, 'Peixe', 10),
	(11, 'Gato', 1),
	(12, 'Cachorro', 2),
	(13, 'Coelho', 3),
	(14, 'Hamster', 4),
	(15, 'Peixe', 5),
	(16, 'Gato', 6),
	(17, 'Cachorro', 7),
	(18, 'Coelho', 8),
	(19, 'Hamster', 9),
	(20, 'Peixe', 10);

-- Dumping structure for table pet_shop_bd.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `cpfCliente` varchar(50) DEFAULT NULL,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.cliente: ~10 rows (approximately)
INSERT INTO `cliente` (`idCliente`, `cpfCliente`, `nomeCliente`, `telefoneCliente`) VALUES
	(1, '15138358300', 'Kassio', '31987354853'),
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

-- Dumping data for table pet_shop_bd.clienteservico: ~12 rows (approximately)
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
  `fk_produto_idProduto` int DEFAULT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_cliente_idCliente` (`fk_cliente_idCliente`),
  KEY `fk_produto_idProduto` (`fk_produto_idProduto`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_cliente_idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fk_produto_idProduto`) REFERENCES `produto` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.compra: ~20 rows (approximately)
INSERT INTO `compra` (`idCompra`, `dataCompra`, `valorTotal`, `fk_cliente_idCliente`, `fk_produto_idProduto`) VALUES
	(1, '2023-01-01 10:00:00', 100, 1, 1),
	(2, '2023-01-02 11:30:00', 200, 2, 2),
	(3, '2023-01-03 12:45:00', 150, 3, 3),
	(4, '2023-01-04 14:20:00', 120, 4, 4),
	(5, '2023-01-05 16:10:00', 180, 5, 5),
	(6, '2023-01-06 09:15:00', 250, 1, 1),
	(7, '2023-01-07 11:30:00', 300, 2, 2),
	(8, '2023-01-08 13:45:00', 170, 3, 3),
	(9, '2023-01-09 15:30:00', 200, 4, 4),
	(10, '2023-01-10 17:20:00', 220, 5, 5),
	(11, '2023-01-11 09:30:00', 120, 1, 1),
	(12, '2023-01-12 11:45:00', 180, 2, 2),
	(13, '2023-01-13 13:20:00', 150, 3, 3),
	(14, '2023-01-14 15:10:00', 130, 4, 4),
	(15, '2023-01-15 17:45:00', 160, 5, 5),
	(16, '2023-01-16 10:15:00', 190, 1, 1),
	(17, '2023-01-17 12:30:00', 250, 2, 2),
	(18, '2023-01-18 14:45:00', 170, 3, 3),
	(19, '2023-01-19 16:30:00', 220, 4, 4),
	(20, '2023-01-20 18:20:00', 240, 5, 5);

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

-- Dumping data for table pet_shop_bd.funcionario: ~6 rows (approximately)
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

-- Dumping data for table pet_shop_bd.produto: ~5 rows (approximately)
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

-- Dumping data for table pet_shop_bd.servico: ~5 rows (approximately)
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
  `emailUsuario` varchar(100) DEFAULT NULL,
  `avatarUsuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT './src/imagens/imagens_usuarios\\image_default.png',
  `administrador` tinyint(1) DEFAULT '0',
  `fk_idFuncionario` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `UNIQUE_EMAIL` (`emailUsuario`),
  KEY `fk_idFuncionario` (`fk_idFuncionario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table pet_shop_bd.usuario: ~2 rows (approximately)
INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `senhaUsuario`, `emailUsuario`, `avatarUsuario`, `administrador`, `fk_idFuncionario`) VALUES
	(1, 'Jackson Marcelino de Freitas', '123', 'jacksonzitap.mc@gmail.com', 'src/imagens/imagens_usuarios/Arte capa e perfil Linkedin menor.png', 0, NULL),
	(2, 'Marineide Marcelino Ceara', '123', 'marineide@gmail.com', 'src/imagens/imagens_usuarios/Foto perfil.jpeg', 0, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
