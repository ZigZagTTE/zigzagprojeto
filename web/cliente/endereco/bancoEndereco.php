<?php
function buscarEnderecosUsuario($conexao, $cli_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEnderecos = "SELECT end_id, end_rua, end_bairro, end_numero, end_complemento, end_cidade, end_estado, end_cep 
        FROM tbl_endereco_cliente 
        WHERE cli_id = $cli_id";

    $resultadoEnderecos = mysqli_query($conexao, $queryEnderecos);


    if ($resultadoEnderecos) {
        return mysqli_fetch_all($resultadoEnderecos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function buscarEnderecoUnico($conexao, $end_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEnderecos = "SELECT end_id, end_rua, end_bairro, end_numero, end_complemento, end_cidade, end_estado, end_cep, cli_id  
        FROM tbl_endereco_cliente 
        WHERE end_id = $end_id";

    $resultadoEnderecos = mysqli_query($conexao, $queryEnderecos);


    if ($resultadoEnderecos) {
        return mysqli_fetch_array($resultadoEnderecos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

function inserirEndereco($conexao, $end_cep, $end_cidade, $end_bairro, $end_rua, $end_numero, $end_complemento, $end_estado, $cli_id)
{
    $stmt = $conexao->prepare("INSERT INTO tbl_endereco_cliente ( end_cep, end_cidade, end_bairro, end_rua, end_numero, end_complemento, end_estado, cli_id) VALUES ($end_cep, $end_cidade, $end_bairro, $end_rua, $end_numero, $end_complemento, $end_estado, $cli_id)");
    if (!$stmt) {
        error_log("Erro ao preparar consulta: " . $conexao->error);
        return false;
    }


    // Executar
    if ($stmt->execute()) {
        return true;
    } else {
        error_log("Erro ao executar consulta: " . $stmt->error);
        return false;
    }
}
