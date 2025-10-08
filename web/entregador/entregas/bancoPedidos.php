<?php

require_once "../../conexao.php";
function bancoPedidoUnico($conexao, $ped_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEndereco = "SELECT ped_id, ped_data, ped_horario, ped_descricao, ped_viagens, end_rua, end_numero, cos_numero
        FROM tbl_pedido, tbl_endereco_cliente, tbl_costureiro
        WHERE ped_id = $ped_id";

    $resultadoEndereco = mysqli_query($conexao, $queryEndereco);


    if ($resultadoEndereco) {
        return mysqli_fetch_all($resultadoEndereco, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function bancoEntrega($conexao, $entgd_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEnderecos = "SELECT entrg_id, entrg_data, entrg_horario, entrg_inicio, entrg_fim, entrg_confirmacao_cli, entrg-confirmacao_cos, ped_id, entgd_id
        FROM tbl_entrega
        WHERE entgd_id = $entgd_id";

    $resultadoEnderecos = mysqli_query($conexao, $queryEnderecos);


    if ($resultadoEnderecos) {
        return mysqli_fetch_all($resultadoEnderecos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}


