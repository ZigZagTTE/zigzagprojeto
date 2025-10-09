<?php
require_once('../../conexao.php');
function buscarPedidosDisponiveis($conexao)
{
    $pedidos = array();

    $query = "SELECT ped_id, ped_data, ped_horario, ped_descricao, ped_viagens, ped_concluido, cli_id, end_id FROM tbl_pedido";

    $resultado = mysqli_query($conexao, $query);

    while ($pedido = mysqli_fetch_assoc($resultado)) {
        array_push($pedidos, $pedido);
    }

    return $pedidos;
}
