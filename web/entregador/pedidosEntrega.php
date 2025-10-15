<?php

require_once "../conexao.php";

function pedidosId($conexao)
{
    $query = "SELECT ped_id
                FROM tbl_pedido
                WHERE (tbl_pedido.ped_concluido = 0 AND tbl_pedido.ped_viagens = 0)
                OR (tbl_pedido.ped_concluido = 1 AND tbl_pedido.ped_viagens = 1)";
    $result = mysqli_query($conexao, $query);
    $pedidos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pedidos;
}

function pedidoSelecionado($conexao, $ped_id)
{
    $query = "SELECT *
                    FROM tbl_pedido 
                    JOIN tbl_item ON tbl_pedido.ped_id = tbl_item.ped_id 
                    JOIN tbl_catalogo ON tbl_item.cat_id = tbl_catalogo.cat_id
                    JOIN tbl_costureiro ON tbl_catalogo.cos_id = tbl_costureiro.cos_id
                    JOIN tbl_cliente ON tbl_pedido.cli_id = tbl_cliente.cli_id
                    JOIN tbl_endereco_cliente ON tbl_cliente.cli_id = tbl_endereco_cliente.cli_id
                    WHERE tbl_pedido.ped_id = $ped_id";
    $result = mysqli_query($conexao, $query);
    $pedido = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $pedido;
}
