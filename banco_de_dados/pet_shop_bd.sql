CREATE DATABASE pet_shop_bd;
USE pet_shop_bd;

CREATE TABLE CLIENTE(
    id int PRIMARY KEY AUTO_INCREMENT,
	cpfCliente varchar (50),
    nomeCliente varchar (20),
    telefoneCliente varchar (20)
);

-- CREATE TABLE ENDERECO(
-- 	idEndereco INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     cidade VARCHAR (50),
--     bairro VARCHAR (50),
--     rua VARCHAR (50),
--     numero INT,
--     fk_cpfCliente VARCHAR (20),
--     FOREIGN KEY (fk_cpfCliente) REFERENCES CLIENTE(cpfCliente)
-- );

CREATE TABLE CLIENTEENDERECO (
    fk_cliente_cpfCliente VARCHAR (20),
    fk_endereco_idEndereco INT,
    FOREIGN KEY (fk_cliente_cpfCliente) REFERENCES Cliente (cpfCliente),
    FOREIGN KEY (fk_endereco_idEndereco) REFERENCES Endereco (idEndereco)
);


CREATE TABLE COMPRA (
	idCompra INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	dataCompra DATETIME,
    valorTotal DECIMAL,
    fk_cliente_idCliente INT,
    fk_produto_idProduto INT,
    FOREIGN KEY (fk_cliente_idCliente) REFERENCES CLIENTE (idCliente),
    FOREIGN KEY (fk_produto_idProduto) REFERENCES PRODUTO (idProduto)
);

CREATE TABLE PRODUTO(
	idProduto INT PRIMARY KEY NOT NULL,
	nomeProduto VARCHAR (20),
    codProduto INT,
    valorProduto DECIMAL,
    descricaoProduto VARCHAR (200)
);

CREATE TABLE FUNCIONARIO	(
	cpfFuncionario VARCHAR (20) PRIMARY KEY NOT NULL,
    nomeFuncionario VARCHAR(50),
    cargoFuncionario VARCHAR(50)
);

CREATE TABLE CLIENTECOMPRA (
    fk_cliente_cpfCliente varchar(20),
    fk_compra_idCompra INT,
    fk_produto_idProduto INT,
    quantidade INT,
    FOREIGN KEY (fk_cliente_cpfCliente) REFERENCES CLIENTE(cpfCliente),
    FOREIGN KEY (fk_compra_idCompra) REFERENCES COMPRA(idCompra),
    FOREIGN KEY (fk_produto_idProduto) REFERENCES PRODUTO(idProduto)
);

CREATE TABLE CLIENTEPRODUTO(
	fk_cliente_cpfCliente VARCHAR(20),
    fk_produto_idProduto INT,
    FOREIGN KEY (fk_cliente_cpfCliente) REFERENCES CLIENTE (cpfCliente),
    FOREIGN KEY (fk_produto_idProduto) REFERENCES PRODUTO (idProduto)
);

CREATE TABLE CLIENTEFUNCIONARIO (
	data_atendimento DATETIME,
    fk_cliente_cpfCliente VARCHAR(20),
    fk_funcionario_cpfFuncionario VARCHAR(20),
    FOREIGN KEY (fk_cliente_cpfCliente) REFERENCES CLIENTE (cpfCliente),
    FOREIGN KEY (fk_funcionario_cpfFuncionario) REFERENCES FUNCIONARIO (cpfFuncionario)
);




CREATE TABLE SERVICO	(
	idServico INT PRIMARY KEY AUTO_INCREMENT,
    nomeServico VARCHAR(50),
    valorServico DECIMAL
);

CREATE TABLE CLIENTESERVICO (
    fk_cliente_cpfCliente VARCHAR(20),
    fk_servico_idServico INT,
    FOREIGN KEY (fk_cliente_cpfCliente) REFERENCES CLIENTE (cpfCliente),
    FOREIGN KEY (fk_servico_idServico) REFERENCES SERVICO (idServico)
);


CREATE TABLE CLIENTEANIMAL (
    idAnimal INT PRIMARY KEY,
    nomeAnimal VARCHAR(50),
    fk_cpfCliente VARCHAR(20),
    FOREIGN KEY (fk_cpfCliente) REFERENCES CLIENTE (cpfCliente)
);

CREATE TABLE `ANIMAL` (
	`idAnimal` INT(10) NOT NULL AUTO_INCREMENT,
	`nomeAnimal` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`fk_idCliente` INT(10) NOT NULL,
	PRIMARY KEY (`idAnimal`) USING BTREE,
	INDEX `FK_idCliente_idAnimal` (`fk_idCliente`) USING BTREE,
	CONSTRAINT `FK_idCliente_idAnimal` FOREIGN KEY (`fk_idCliente`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)


CREATE TABLE USUARIO (
	idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    senha VARCHAR(20),
    email VARCHAR(50),
    cargo VARCHAR(50),
    administrador BOOLEAN DEFAULT FALSE,
    fk_cpfFuncionario VARCHAR (20),
    CONSTRAINT uc_email UNIQUE (email),
    FOREIGN KEY (fk_cpfFuncionario) REFERENCES FUNCIONARIO (cpfFuncionario)
);
