-- # Pedidos e Itens

-- ## PEDIDOS
INSERT INTO tbl_pedido (ped_data, ped_horario, ped_descricao, ped_viagens, ped_concluido, cli_id, end_id)
-- CLIENTE A
VALUES  ('2025-10-09', '20:03', 'Pedido do cliente A para Costureira A com 2 itens diferentes e na Rua A e não concluído estando com o cliente', 0, 0, 1, 1),
        ('2025-10-09', '20:05', 'Pedido do cliente A para Costureira A com 2 itens iguais e na Rua AA e não concluído estando com a costureira', 1, 0, 1, 2),
        ('2025-10-09', '20:06', 'Pedido do cliente A para Costureira B com 2 itens diferentes e na Rua A e concluído estando com a costureira', 1, 1, 1, 1),
        ('2025-10-09', '20:09', 'Pedido do cliente A para Costureira B com 2 itens iguais e na Rua AA e concluído estando com o cliente (finalizado)', 2, 1, 1, 2),
-- CLIENTE B
        ('2025-10-09', '20:10', 'Pedido do cliente B para Costureira A com 2 itens diferentes e na Rua B e não concluído estando com o cliente', 0, 0, 2, 3),
        ('2025-10-09', '20:05', 'Pedido do cliente B para Costureira A com 2 itens iguais e na Rua BB e não concluído estando com a costureira', 1, 0, 2, 4),
        ('2025-10-09', '20:06', 'Pedido do cliente B para Costureira B com 2 itens diferentes e na Rua B e concluído estando com a costureira', 1, 1, 2, 3),
        ('2025-10-09', '20:09', 'Pedido do cliente B para Costureira B com 2 itens iguais e na Rua BB e concluído estando com o cliente (finalizado)', 2, 1, 2, 4);

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