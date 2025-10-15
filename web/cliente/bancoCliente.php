<?php

function buscarCostureiras($conexao)
{
    // Preparar consulta para evitar SQL injection
    $queryCostureiras = "SELECT *
        FROM tbl_costureiro";

    $resultadoCostureiras = mysqli_query($conexao, $queryCostureiras);


    if ($resultadoCostureiras) {
        return mysqli_fetch_all($resultadoCostureiras, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarCostureirasCriadoras($conexao)
{
    // Preparar consulta para evitar SQL injection
    $queryCostureiras = "SELECT * 
                        FROM tbl_costureiro AS COS 
                        WHERE cos_id = ANY
                        (
                            SELECT cos_id
                            FROM tbl_catalogo
                            WHERE ser_id = 11
                        );";

    $resultadoCostureiras = mysqli_query($conexao, $queryCostureiras);


    if ($resultadoCostureiras) {
        return mysqli_fetch_all($resultadoCostureiras, MYSQLI_ASSOC);
    } else {
        return false;
    }
}





?>