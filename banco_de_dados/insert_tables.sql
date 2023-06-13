INSERT INTO cliente (cpfCliente, nomeCliente, telefoneCliente)
VALUES 
    ('15138358300', 'Caruso', '31987354853'),
    ('34543835221', 'Karen', '11989596533'),
    ('35435484352', 'Felipe', '51943584350'),
    ('38438487976', 'Lucas', '11986846659'),
    ('48137487849', 'Ester', '51975465586'),
    ('54003664657', 'Gabriel', '19974552288'),
    ('66876435475', 'Bruna', '27976843822'),
    ('68431541065', 'Miguel', '11986043207'),
    ('68651543560', 'Joao', '19998562340'),
    ('96876656533', 'Marcela', '31989868850');

SET foreign_key_checks = 0;
INSERT INTO clienteservico (fk_cliente_idCliente, fk_servico_idServico)
VALUES 
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
SET foreign_key_checks = 1;

INSERT INTO funcionario (cpfFuncionario, nomeFuncionario, cargoFuncionario)
VALUES
    ('12345678900', 'João Silva', 'administrador'),
    ('98765432100', 'Maria Santos', 'vendedor'),
    ('45678912300', 'Pedro Oliveira', 'gerente'),
    ('78912345600', 'Ana Rodrigues', 'vendedor'),
    ('65432198700', 'Carlos Souza', 'gerente'),
    ('32165498700', 'Laura Pereira', 'administrador');
    
INSERT INTO compra (dataCompra, valorTotal, fk_cliente_idCliente)
VALUES
    ('2023-06-12 10:00:00', 1000, 1),
    ('2023-06-11 14:30:00', 500, 2),
    ('2023-06-10 18:15:00', 750, 3),
    ('2023-06-09 09:45:00', 1200, 1),
    ('2023-06-08 16:20:00', 800, 4);
    
INSERT INTO servico (nomeServico, valorServico)
VALUES
    ('Banho e tosa', 60),
    ('Consulta veterinária', 120),
    ('Vacinação', 40),
    ('Hospedagem', 80),
    ('Tratamento contra pulgas e carrapatos', 50);
    
INSERT INTO produto (nomeProduto, codProduto, valorProduto, descricaoProduto)
VALUES
    ('Ração para cães', 1001, 50, 'Ração balanceada para cães de todas as raças e idades'),
    ('Shampoo para gatos', 2001, 25, 'Shampoo suave para higiene e limpeza de gatos'),
    ('Brinquedo interativo', 3001, 15, 'Brinquedo para entretenimento e estimulação mental de pets'),
    ('Coleira anti-pulgas', 4001, 30, 'Coleira ajustável com proteção contra pulgas e carrapatos'),
    ('Caminha para cães', 5001, 60, 'Caminha confortável e resistente para cães de porte médio');







