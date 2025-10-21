-- # Pedidos e Itens

-- ## PEDIDOS
INSERT INTO tbl_pedido (ped_data, ped_horario, ped_descricao, ped_viagens, ped_concluido, cli_id, end_id)

VALUES  ('2025-10-09', '20:03', 'Pedido do cliente José Dias Martins para Costureira Beatrice Dias Pinto com 2 itens diferentes e na Rua Pica-pau e não concluído estando com o cliente', 0, 0, 1, 1),
        ('2025-10-09', '20:05', 'Pedido do cliente Gabriela Araujo Cardoso para Costureira Beatrice Dias Pinto com 2 itens iguais e na Rua Coronel Panfilo e não concluído estando com a costureira', 1, 0, 2, 2),
        ('2025-10-09', '20:06', 'Pedido do cliente José Dias Martins para Costureira Luis Cunha Dias com 2 itens diferentes e na Rua do Grupo Escolar e concluído estando com a costureira', 1, 1, 1, 1),
        ('2025-10-09', '20:09', 'Pedido do cliente José Dias Martins para Costureira Luis Cunha Dias com 2 itens iguais e na Rua Pica-pau e concluído estando com o cliente (finalizado)', 2, 1, 2, 3),
        ('2025-10-09', '20:10', 'Pedido do cliente Gabriela Araujo Cardoso para Costureira Beatrice Dias Pinto com 2 itens diferentes e na Rua Coronel Panfilo e não concluído estando com o cliente', 0, 0, 2, 3),
        ('2025-10-09', '20:05', 'Pedido do cliente Leonor Cavalcanti Alves para Costureira Beatrice Dias Pinto com 2 itens iguais e na Travessa Oito e não concluído estando com a costureira', 1, 0, 3, 4),
        ('2025-10-09', '20:06', 'Pedido do cliente Gabriela Araujo Cardoso para Costureira Luis Cunha Dias com 2 itens diferentes e na Rua José Couto e concluído estando com a costureira', 1, 1, 2, 3),
        ('2025-10-09', '20:09', 'Pedido do cliente Isabella Ferreira Alves para Costureira Luis Cunha Dias com 2 itens iguais e na Rua 1 e concluído estando com o cliente (finalizado)', 2, 1, 4, 5);

-- ## ITENS
INSERT INTO tbl_item (ped_id, cat_id)
-- PEDIDO 1A
VALUES  (1, 1),
        (1, 2),
-- PEDIDO 2A
        (2, 1),
        (2, 1),
-- PEDIDO 3A
        (3, 3),
        (3, 4),
-- PEDIDO 4A
        (4, 3),
        (4, 3),
-- PEDIDO 1B
        (5, 1),
        (5, 2),
-- PEDIDO 2B
        (6, 1),
        (6, 1),
-- PEDIDO 3B
        (7, 3),
        (7, 4),
-- PEDIDO 4B
        (8, 3),
        (8, 3);