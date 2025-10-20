<?php
function buscarEnderecosUsuario($conexao, $cos_id)
{
    // Preparar consulta para evitar SQL injection
    $queryEnderecos = "SELECT cos_rua, cos_bairro, cos_numero, cos_complemento, cos_cidade, cos_estado, cos_cep 
        FROM tbl_costureiro 
        WHERE cos_id = $cos_id";

    $resultadoEnderecos = mysqli_query($conexao, $queryEnderecos);


    if ($resultadoEnderecos) {
        return mysqli_fetch_all($resultadoEnderecos, MYSQLI_ASSOC);
    } else {
        return false;
    }
}

// function buscarEnderecoUnico($conexao, $end_id)
// {
//     // Preparar consulta para evitar SQL injection
//     $queryEnderecos = "SELECT end_id, end_rua, end_bairro, end_numero, end_complemento, end_cidade, end_estado, end_cep, cli_id  
//         FROM tbl_endereco_cliente 
//         WHERE end_id = $end_id";

//     $resultadoEnderecos = mysqli_query($conexao, $queryEnderecos);


//     if ($resultadoEnderecos) {
//         return mysqli_fetch_array($resultadoEnderecos, MYSQLI_ASSOC);
//     } else {
//         return false;
//     }
// }
