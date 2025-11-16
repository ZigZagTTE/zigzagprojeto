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
?>
