-- # EXECUTE NO *SQLYOG* OU *PHPMYADMIN* PARA A ACENTUAÇÃO CORRETA

-- CREATE DATABASE

CREATE DATABASE IF NOT EXISTS bd_zigzag_main;


-- USE DATABASE

USE bd_zigzag_main;


-- CREATE TABLE IF NOT EXISTS

CREATE TABLE IF NOT EXISTS tbl_cliente
(
    cli_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    cli_email varchar(320) NOT NULL,
    cli_senhaHash varchar(128) NOT NULL,

    cli_cpf bigint,
    cli_nome varchar(64),
    cli_nascimento date,
    cli_telefone bigint,

    cli_perfil varchar(255) DEFAULT 'default.png'
);

CREATE TABLE IF NOT EXISTS tbl_endereco_cliente
(
    end_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    end_rua varchar(64),
    end_bairro varchar(32),
    end_numero int,
    end_complemento tinytext,
    end_cidade varchar(32),
    end_estado varchar(2),
    end_cep int,

    cli_id integer NOT NULL,
    FOREIGN KEY (cli_id) 
    REFERENCES tbl_cliente(cli_id)
    ON DELETE CASCADE

);

CREATE TABLE IF NOT EXISTS tbl_entregador
(
    entgd_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    entgd_email varchar(320) NOT NULL,
    entgd_senhaHash varchar(128) NOT NULL,

    entgd_nome varchar(64),
    entgd_cnh bigint,
    entgd_cpf bigint,
    entgd_telefone bigint,

    entgd_perfil varchar(255) DEFAULT 'default.png',
    entgd_verificado tinyint DEFAULT 0
);

CREATE TABLE IF NOT EXISTS tbl_costureiro
(
    cos_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    cos_email varchar(320) NOT NULL,
    cos_senhaHash varchar(128) NOT NULL,

    cos_nome varchar(64),
    cos_telefone bigint,
    cos_cpf bigint,
    cos_cnpj bigint,

    cos_perfil varchar(255) DEFAULT 'default.png',
    cos_verificado tinyint DEFAULT 0,

    -- Endereço do Costureiro
    cos_rua varchar(64),
    cos_bairro varchar(32),
    cos_numero int,
    cos_complemento tinytext,
    cos_cidade varchar(32),
    cos_estado varchar(2),
    cos_cep int
);

CREATE TABLE IF NOT EXISTS tbl_peca
(
    pec_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pec_nome varchar(32)
);

-- Valores definidos para peças

INSERT INTO tbl_peca (pec_nome)
VALUES  ('blusa'),
        ('camisa (com botão)'),
        ('camiseta (sem botão)'),
        ('moletom'),
        ('casaco'),
        ('macacão'),
        ('calças'),
        ('shorts'),
        ('bermuda');

CREATE TABLE IF NOT EXISTS tbl_servico
(
    ser_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ser_nome varchar(32)
);

-- Valores definidos para serviços

INSERT INTO tbl_servico (ser_nome)
VALUES  ('pequenas costuras'),
        ('troca de zíper comum'),
        ('troca de zíper invisível'),
        ('ajuste de barra'),
        ('sob medida'),
        ('roupas ornamentadas'),
        ('remendos'),
        ('bordados'),
        ('confecção'),
        ('patchwork'),
        ('personalizado');

CREATE TABLE IF NOT EXISTS tbl_catalogo
(
    cat_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    cat_descricao text,
    cat_valor decimal(5,2),

    cos_id integer,
    FOREIGN KEY (cos_id)
    REFERENCES tbl_costureiro(cos_id)
    ON DELETE SET NULL,

    pec_id integer NOT NULL,
    FOREIGN KEY (pec_id)
    REFERENCES tbl_peca(pec_id),

    ser_id integer NOT NULL,
    FOREIGN KEY (ser_id)
    REFERENCES tbl_servico(ser_id)
);

CREATE TABLE IF NOT EXISTS tbl_pedido
(
    ped_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    ped_data date,
    ped_horario time,

    ped_descricao text,

    ped_viagens tinyint DEFAULT 0,
    ped_concluido tinyint DEFAULT 0,

    cli_id integer,
    FOREIGN KEY (cli_id)
    REFERENCES tbl_cliente(cli_id)
    ON DELETE SET NULL,

    end_id integer,
    FOREIGN KEY (end_id)
    REFERENCES tbl_endereco_cliente(end_id)
    ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS tbl_item
(
    ite_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    ite_descricao text,

    cat_id integer,
    FOREIGN KEY (cat_id) 
    REFERENCES tbl_catalogo(cat_id)
    ON DELETE SET NULL,

    ped_id integer NOT NULL,
    FOREIGN KEY (ped_id) 
    REFERENCES tbl_pedido(ped_id)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tbl_entrega
(
    entrg_id integer NOT NULL PRIMARY KEY AUTO_INCREMENT,

    entrg_data date,
    entrg_inicio time,
    entrg_fim time,

    entrg_confirmacao_cli tinyint DEFAULT 0,
    entrg_confirmacao_cos tinyint DEFAULT 0,

    ped_id integer NOT NULL,
    FOREIGN KEY (ped_id)
    REFERENCES tbl_pedido(ped_id),

    entgd_id integer NOT NULL,
    FOREIGN KEY (entgd_id)
    REFERENCES tbl_entregador(entgd_id)
);

