<?php

require_once "../../conexao.php";

function bancoEntrega($conexao, $entgd_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEntrega = "SELECT *
        FROM tbl_entrega AS entrega JOIN tbl_entregador AS entregador ON entrega.entgd_id = entregador.entgd_id
        WHERE entregador.entgd_id = $entgd_id";

    $resultadoEntrega = mysqli_query($conexao, $queryEntrega);


    if ($resultadoEntrega) {
        return mysqli_fetch_all($resultadoEntrega, MYSQLI_ASSOC);
    } else {
        return false;
    }
}
