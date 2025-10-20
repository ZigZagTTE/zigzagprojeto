<?php

require_once '../../conexao.php';

function buscarPedidos($conexao, $id)

{

    $query = "SELECT tbl_pedido.ped_id 
    FROM tbl_pedido, tbl_item, tbl_catalogo, tbl_costureiro 
    WHERE tbl_pedido.ped_id = tbl_item.ped_id 
    AND tbl_item.cat_id = tbl_catalogo.cat_id 
    AND tbl_catalogo.cos_id = tbl_costureiro.cos_id 
    AND tbl_costureiro.cos_id = $id 
    AND ped_concluido = 0
    AND ped_viagens = 0";

    $sqlexecutar = mysqli_query($conexao, $query);

    $resultado = mysqli_fetch_all($sqlexecutar, MYSQLI_ASSOC);

    return $resultado;
};


function exibirPedidos($conexao, $ped_id)

{

    $query = "SELECT *
            FROM tbl_pedido 
                    JOIN tbl_item ON tbl_pedido.ped_id = tbl_item.ped_id 
                    JOIN tbl_catalogo ON tbl_item.cat_id = tbl_catalogo.cat_id
                    JOIN tbl_costureiro ON tbl_catalogo.cos_id = tbl_costureiro.cos_id
                    JOIN tbl_cliente ON tbl_pedido.cli_id = tbl_cliente.cli_id
                    JOIN tbl_endereco_cliente ON tbl_pedido.end_id = tbl_endereco_cliente.end_id
                    WHERE tbl_pedido.ped_id = $ped_id";

    $sqlexecutar = mysqli_query($conexao, $query);
    $resultado = mysqli_fetch_all($sqlexecutar, MYSQLI_ASSOC);
    return $resultado;
}
