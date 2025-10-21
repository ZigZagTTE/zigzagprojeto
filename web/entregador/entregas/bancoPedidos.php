<?php

require_once "../../conexao.php";

function bancoEntrega($conexao, $entgd_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEntrega = "SELECT entrg_id, entrg_data, entrg_inicio, entrg_fim, entrg_confirmacao_cli, entrg_confirmacao_cos, entgd_id, ped_id
        FROM tbl_entrega, tbl_entregador
        WHERE tbl_entregador.entgd_id = $entgd_id";

    $resultadoEntrega = mysqli_query($conexao, $queryEntrega);


    if ($resultadoEntrega) {
        return mysqli_fetch_all($resultadoEntrega, MYSQLI_ASSOC);
    } else {
        return false;
    }
}


