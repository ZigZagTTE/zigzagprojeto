-- # EXECUTE NO *SQLYOG* OU *PHPMYADMIN* PARA A ACENTUAÇÃO CORRETA

-- USE DATABASE

USE bd_zigzag_main;


-- # Clientes de exemplo

INSERT INTO tbl_cliente (cli_email, cli_senhaHash, cli_cpf, cli_nome, cli_nascimento, cli_telefone, cli_perfil)
VALUES  ('JoseDiasMartins@armyspy.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 66594714805, 'José Dias Martins', '1949-05-30', 4525388331, 'homem4.jpg'),
        ('GabrielaAraujoCardoso@armyspy.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 81146305079, 'Gabriela Araujo Cardoso', '1980-01-03', 3136406097, 'mulher2.jpg'),
        ('LeonorCavalcantiAlves@teleworm.us', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 77624981920, 'Leonor Cavalcanti Alves', '1940-02-24', 1861207476, 'mulher3.jpg'),
        ('IsabellaFerreiraAlves@teleworm.us', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 26481390281, 'Isabella Ferreira Alves', '2000-03-31', 5168076766, 'mulher4.jpg');


-- # Endereços de Clientes

INSERT INTO tbl_endereco_cliente (end_rua, end_bairro, end_numero, end_cidade, end_estado, end_cep, cli_id)
VALUES  ('Rua Pica-pau', 'Bonfim', 1084, 'Taubaté', 'SP', 85859630, 1),
        ('Rua Miguel Couto', 'Independência', 1180, 'Taubaté', 'SP', 54786340, 2),
        ('Rua José Couto', 'Quiririm', 201, 'Taubaté', 'SP', 45298413, 2),
        ('Travessa Oito', 'Gurilândia', 1312, 'Taubaté', 'SP', 19100168, 3),
        ('Rua 1', 'Quiririm', 201, 'Taubaté', 'SP', 60877060, 4);


-- # Entregadores

INSERT INTO tbl_entregador (entgd_email, entgd_senhaHash, entgd_nome, entgd_cnh, entgd_cpf, entgd_telefone, entgd_perfil)
VALUES  ('cenolar962@datoinf.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Rodrigo Gomes Costa', 12123456790, 60249059711, 12981475233, 'homem.jpg'),
        ('BrunoBarrosAraujo@jourrapide.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Bruno Barros Araujo', 12987654322, 80822817667, 8560355057, 'homem2.jpg'),
        ('MiguelPereiraAlves@armyspy.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Miguel Pereira Alves', 12987654322, 67898799518, 8124028442, 'homem3.jpg'),
        ('AnaAzevedoRibeiro@armyspy.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Ana Azevedo Ribeiro', 12987654322, 44173081871, 4127664443, 'mulher1.jpg');
        


-- # Costureiros

INSERT INTO tbl_costureiro (cos_email, cos_senhaHash, cos_nome, cos_cpf, cos_cnpj, cos_perfil, cos_rua, cos_bairro, cos_numero, cos_cidade, cos_estado, cos_cep)
VALUES  ('JulietaSousaDias@jourrapide.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Beatrice Dias Pinto', 84826365292, 12345678000190, 'costureira1.jpg',
-- Endereço do Costureiro A
        'Rua Coronel Panfilo', 'Araucárias', 661, 'Taubaté', 'SP', 03908050),
        ('LuisCunhaDias@dayrep.com', '$2a$12$nr6zhPzXRyWxPZiZGLSWjOOT252uuHLuhtbLBPodOneDiytB1GdRG', 'Luis Cunha Dias', 62508605840, 23456789000291, 'costureira2.jpg',
-- Endereço do Costureiro B
        'Rua do Grupo Escolar', 'Vista alegre', 75, 'Taubaté', 'SP', 08440480);


-- # Catálogos

INSERT INTO tbl_catalogo (cat_descricao, cat_valor, cos_id, pec_id, ser_id)
-- Costureira A
VALUES  ('pequenas costuras de blusas', 50.99, 1, 1, 1), 
        ('sob medida de camisa', 60.99, 1, 2, 5),
-- Costureira B
        ('pequenas costuras de blusas', 70.99, 2, 1, 1), 
        ('sob medida de camisa', 80.99, 2, 2, 5);

