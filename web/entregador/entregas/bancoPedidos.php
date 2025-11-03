<?php

require_once "../../conexao.php";

function bancoEntrega($conexao, $entgd_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEntrega = "SELECT *
        FROM tbl_entrega 
        INNER JOIN tbl_entregador ON tbl_entrega.entgd_id = tbl_entregador.entgd_id
        INNER JOIN tbl_pedido ON tbl_entrega.ped_id = tbl_pedido.ped_id
        WHERE tbl_entregador.entgd_id = $entgd_id
        AND tbl_pedido.ped_viagens = 2
        AND tbl_pedido.ped_concluido = 1;";

    $resultadoEntrega = mysqli_query($conexao, $queryEntrega);


    if ($resultadoEntrega) {
        return mysqli_fetch_all($resultadoEntrega, MYSQLI_ASSOC);
    } else {
        return false;
    }
}
