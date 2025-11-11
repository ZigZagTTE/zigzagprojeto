<?php

function buscarListaDeCostureiras($conexao)
{
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
    $queryCostureira =   mysqli_prepare($conexao,"SELECT * 
                        FROM tbl_costureiro 
                        WHERE cos_id = ?;");

    mysqli_stmt_bind_param($queryCostureira, "i", $cos_id);

    mysqli_stmt_execute($queryCostureira);

    $resultadoCostureira = mysqli_stmt_get_result( $queryCostureira);

    if ($resultadoCostureira) {
        return mysqli_fetch_assoc($resultadoCostureira);
    } else {
        return false;
    }
}

function buscarServicosDaCostureira($conexao, $cos_id)
{
    // Preparar consulta para evitar SQL injection
    $queryServicos = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_servico
                        WHERE ser_id = ANY 
                        (
                        SELECT ser_id
                        FROM tbl_costureiro AS cos JOIN tbl_catalogo AS cat ON cos.cos_id = cat.cos_id
                        WHERE cos.cos_id = ?
                        AND ser_id != 10
                        );");

    mysqli_stmt_bind_param($queryServicos, "i", $cos_id);

    mysqli_stmt_execute($queryServicos);

    $resultadoServicos = mysqli_stmt_get_result( $queryServicos);


    if ($resultadoServicos) {
        return mysqli_fetch_all($resultadoServicos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarCatalogosDaCostureiraPorServico($conexao, $cos_id, $ser_id)
{

    $queryCatalogos = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_costureiro AS cos 
                        JOIN tbl_catalogo AS cat ON cos.cos_id = cat.cos_id
                        JOIN tbl_peca as pec ON pec.pec_id = cat.pec_id
                        JOIN tbl_servico as ser ON ser.ser_id = cat.ser_id
                        WHERE cos.cos_id = ? 
                        AND cat.ser_id = ?");

    mysqli_stmt_bind_param($queryCatalogos, "ii", $cos_id, $ser_id);

    mysqli_stmt_execute($queryCatalogos);

    $resultadoCatalogos = mysqli_stmt_get_result($queryCatalogos);


    if ($resultadoCatalogos) {
        return mysqli_fetch_all($resultadoCatalogos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarInformacoesCatalogo($conexao, $cat_id)
{

    $queryInfoCatalogo = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_costureiro AS cos 
                        JOIN tbl_catalogo AS cat ON cos.cos_id = cat.cos_id
                        JOIN tbl_peca as pec ON pec.pec_id = cat.pec_id
                        JOIN tbl_servico as ser ON ser.ser_id = cat.ser_id
                        WHERE cat_id = ?");

    mysqli_stmt_bind_param($queryInfoCatalogo, "i", $cat_id);

    mysqli_stmt_execute($queryInfoCatalogo);

    $resultadoInfoCatalogo = mysqli_stmt_get_result( $queryInfoCatalogo);


    if ($resultadoInfoCatalogo) {
        return mysqli_fetch_assoc($resultadoInfoCatalogo);
    } else {
        return false;
    }
}

function buscarEnderecosDoCliente($conexao, $cli_id){
    $queryEnderecos = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_cliente AS cli 
                        JOIN tbl_endereco_cliente AS endereco ON cli.cli_id = endereco.cli_id
                        WHERE cli.cli_id = ?");

    mysqli_stmt_bind_param($queryEnderecos, "i", $cli_id);

    mysqli_stmt_execute($queryEnderecos);

    $resultadoEnderecos = mysqli_stmt_get_result( $queryEnderecos);


    if ($resultadoEnderecos) {
        return mysqli_fetch_all($resultadoEnderecos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

?>