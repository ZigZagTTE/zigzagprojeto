<?php

require_once "../../../conexao.php";

function bancoEntrega($conexao, $entgd_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEntrega = "SELECT entrg_id, entrg_data, entrg_inicio, entrg_fim, entrg_confirmacao_cli, entrg_confirmacao_cos, entgd_id, ped_id
        FROM tbl_entrega
        WHERE entgd_id = $entgd_id";

    $resultadoEntrega = mysqli_query($conexao, $queryEntrega);


    if ($resultadoEntrega) {
        return mysqli_fetch_all($resultadoEntrega, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function bancoPedidoUnico($conexao, $ped_id)
{
    // Preparar consulta para evitar SQL injection
    $queryPedido = "SELECT tbl_pedido.ped_id, ped_data, ped_horario, ped_descricao, ped_viagens, end_rua, end_numero, cos_rua, cos_numero
        FROM tbl_pedido, tbl_endereco_cliente, tbl_costureiro, tbl_item, tbl_catalogo
        WHERE tbl_pedido.ped_id = $ped_id
        AND tbl_pedido.end_id = tbl_endereco_cliente.end_id
        AND tbl_catalogo.cos_id = tbl_costureiro.cos_id
        AND tbl_item.cat_id = tbl_catalogo.cat_id
        AND tbl_pedido.ped_id = tbl_item.ped_id";

    $resultadoPedido = mysqli_query($conexao, $queryPedido);


    if ($resultadoPedido) {
        return mysqli_fetch_assoc($resultadoPedido);
    } else {
        return false;
    }
}
