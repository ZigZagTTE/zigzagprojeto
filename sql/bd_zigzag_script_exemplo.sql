-- # EXECUTE NO *SQLYOG* OU *PHPMYADMIN* PARA A ACENTUAÇÃO CORRETA

-- USE DATABASE

USE bd_zigzag_main;


-- Clientes de exemplo

INSERT INTO tbl_cliente (cli_email, cli_senha, cli_cpf, cli_nome, cli_nascimento, cli_telefone, cli_perfil)
VALUES  ('clienteA@exemplo.com', '1234abcD', 12345678901, 'Cliente A', '2001-01-01', 12123456789, 'default.png'),
        ('clienteB@exemplo.com', 'ABCd1234', 98765432110, 'Cliente B', '2002-02-02', 12987654321, 'default.png');


-- Endereços de Clientes

INSERT INTO tbl_endereco_cliente (end_rua, end_bairro, end_numero, end_cidade, end_estado, end_cep, cli_id)
VALUES  ('Rua A', 'Bairro A', 100, 'Taubaté', 'SP', 12345123, 1),
        ('Rua AA', 'Bairro A', 101, 'Taubaté', 'SP', 12345456, 1),
        ('Rua B', 'Bairro B', 200, 'Taubaté', 'SP', 54321123, 2),
        ('Rua BB', 'Bairro B', 201, 'Taubaté', 'SP', 54321456, 2);


-- Entregadores

INSERT INTO tbl_entregador (entgd_email, entgd_senha, entgd_nome, entgd_cnh, entgd_cpf, entgd_telefone, entgd_perfil)
VALUES  ('entregadorA@exemplo.com', '1234abcD', 'Entregador A', 000123456789, 12345678902, 12123456790, 'default.png'),
        ('entregadorB@exemplo.com', 'ABCd1234', 'Entregador B', 000123456790, 98765432111, 12987654322, 'default.png');


-- Costureiros

INSERT INTO tbl_costureiro (cos_email, cos_senha, cos_nome, cos_cpf, cos_cnpj, cos_perfil,
            cos_rua, cos_bairro, cos_numero, cos_cidade, cos_estado, cos_cep)
VALUES  ('costureiroA@exemplo.com', '1234abcD', 'Costureiro A', 12345678903, 12345678000190, 'default.png',
-- Endereço do Costureiro A
        'Rua A', 'Bairro A', 110, 'Taubaté', 'SP', 12345123),
        ('costureiroB@exemplo.com', 'ABCd1234',  'Costureiro B',98765432113, 23456789000291, 'default.png',
-- Endereço do Costureiro B
        'Rua B', 'Bairro B', 210, 'Taubaté', 'SP', 54321123);


-- Catálogos

INSERT INTO tbl_catalogo (cat_descricao, cat_valor, cos_id, pec_id, ser_id)
VALUES  ('pequenas costuras de blusas', 50.99, 1, 1, 1),
        ('sob medida de camisa', 60.99, 1, 2, 5),
        ('pequenas costuras de blusas', 70.99, 2, 1, 1),
        ('sob medida de camisa', 80.99, 2, 2, 5);
