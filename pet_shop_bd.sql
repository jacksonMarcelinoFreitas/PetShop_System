CREATE TABLE CLIENTE(
	cpfCliente varchar (50) PRIMARY KEY NOT NULL,
    nomeCliente varchar (20),
    telefoneCliente varchar (20)
);

CREATE TABLE ENDERECO(
	idEndereco int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cidade varchar (50),
    bairro varchar (50),
    rua varchar (50),
    numero int,
    fk_cpfCliente varchar (20)
);

CREATE TABLE CLIENTEENDERECO(
	fk_cliente_cpfCliente varchar (20),
    fk_endereco_idEndereco int
);

CREATE TABLE COMPRA(
	fk_cliente_cpfCliente varchar (20),
    fk_produto_cpfProduto int
);


CREATE TABLE PRODUTO(
	nomeProduto varchar (20),
    codProduto int,
    valorProduto decimal,
    descricaoProduto varchar (200)
);

CREATE TABLE CLIENTEFUNCIONARIO(
	fk_cliente_cpfCliente varchar (20),
    fk_funcionario_cpfFuncionario varchar (20)
);