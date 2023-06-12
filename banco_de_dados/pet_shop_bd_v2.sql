#CREATE DATABASE pet_shop_bd;
USE pet_shop_bd;

CREATE TABLE cliente(
	idCliente INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cpfCliente varchar (50),
	nomeCliente VARCHAR (50),
	telefoneCliente varchar (20)
);

CREATE TABLE ENDERECO(
	idEndereco INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cidade VARCHAR (50),
	bairro VARCHAR (50),
	rua VARCHAR (50),
	numero INT,
	fk_idCliente INT,
	FOREIGN KEY (fk_idCliente) REFERENCES CLIENTE(idCliente)
);



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
	FOREIGN KEY (fk_cliente_idCliente) REFERENCES CLIENTE (idCliente)
);

CREATE TABLE PRODUTO(
	idProduto INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nomeProduto VARCHAR (20),
	codProduto INT,
	valorProduto DECIMAL,
	descricaoProduto VARCHAR (200)
);

CREATE TABLE FUNCIONARIO (
	idFuncionario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cpfFuncionario VARCHAR (20),
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
	fk_cliente_idCliente INT,
	fk_servico_idServico INT,
	FOREIGN KEY (fk_cliente_idCliente) REFERENCES CLIENTE (idCliente),
	FOREIGN KEY (fk_servico_idServico) REFERENCES SERVICO (idServico)
);


CREATE TABLE CLIENTEANIMAL (
    idAnimal INT PRIMARY KEY,
    nomeAnimal VARCHAR(50),
    fk_cpfCliente VARCHAR(20),
    FOREIGN KEY (fk_cpfCliente) REFERENCES CLIENTE (cpfCliente)
);



