<?php

function buscarListaDeCostureiras($conexao)
{
    // Preparar consulta para evitar SQL injection
    $queryCostureiras = "SELECT *
                        FROM tbl_costureiro;";

    $resultadoCostureiras = mysqli_query($conexao, $queryCostureiras);


    if ($resultadoCostureiras) {
        return mysqli_fetch_all($resultadoCostureiras, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarListaDeCostureirasCriadoras($conexao)
{
    // Preparar consulta para evitar SQL injection
    $queryCostureiras = "SELECT * 
                        FROM tbl_costureiro
                        WHERE cos_id = ANY
                        (
                            SELECT cos_id
                            FROM tbl_catalogo
                            WHERE ser_id = 10
                        );";

    $resultadoCostureiras = mysqli_query($conexao, $queryCostureiras);


    if ($resultadoCostureiras) {
        return mysqli_fetch_all($resultadoCostureiras, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarCostureira($conexao, $cos_id)
{
    $queryCatalogos =   "SELECT * 
                        FROM tbl_costureiro 
                        WHERE cos_id = $cos_id;";

    $resultadoCatalogos = mysqli_query($conexao, $queryCatalogos);


    if ($resultadoCatalogos) {
        return mysqli_fetch_assoc($resultadoCatalogos);
    } else {
        return false;
    }
}

function buscarServicosDaCostureira($conexao, $cos_id)
{
    // Preparar consulta para evitar SQL injection
    $queryCatalogos = "SELECT *
                        FROM tbl_servico
                        WHERE ser_id = ANY 
                        (
                        SELECT ser_id
                        FROM tbl_costureiro AS cos JOIN tbl_catalogo AS cat ON cos.cos_id = cat.cos_id
                        WHERE cos.cos_id = $cos_id 
                        AND ser_id != 10
                        );";

    $resultadoCatalogos = mysqli_query($conexao, $queryCatalogos);


    if ($resultadoCatalogos) {
        return mysqli_fetch_all($resultadoCatalogos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarPecasDoServicoDaCostureira($conexao, $cos_id, $ser_id)
{
    // Preparar consulta para evitar SQL injection
    $queryCatalogos = "SELECT *
                        FROM tbl_peca
                        WHERE pec_id = ANY 
                        (
                        SELECT pec_id
                        FROM tbl_costureiro AS cos JOIN tbl_catalogo AS cat ON cos.cos_id = cat.cos_id
                        WHERE cos.cos_id = $cos_id 
                        AND ser_id = $ser_id
                        );";

    $resultadoCatalogos = mysqli_query($conexao, $queryCatalogos);


    if ($resultadoCatalogos) {
        return mysqli_fetch_all($resultadoCatalogos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}



?>