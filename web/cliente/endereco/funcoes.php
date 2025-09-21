<?php
function buscarDadosUsuario($conexao, $cli_id) {
    // Preparar consulta para evitar SQL injection
    $stmt = $conexao->prepare("
        SELECT 
            end_id, 
            end_rua, 
            end_bairro, 
            end_complemento, 
            end_numero, 
            end_cep,
            end_cidade,
            end_estado
        FROM tbl_endereco_cliente 
        WHERE cli_id = ?
    ");
    
    if (!$stmt) {
        error_log("Erro ao preparar consulta: " . $conexao->error);
        return false;
    }
    
    // Bind do parâmetro
    $stmt->bind_param("i", $cli_id);
    
    // Executar
    $stmt->execute();
    
    // Obter resultado
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return false;
    }
}

function formatarCEP($cep) {
    if (empty($cep)) return '';
    $cep = preg_replace('/[^0-9]/', '', $cep);
    return preg_replace("/(\d{5})(\d{3})/", "$1-$2", $cep);
}

function inserirEndereco($conexao, $endereco){
        $stmt = $conexao->prepare("INSERT INTO tbl_endereco_cliente ( end_cep, end_cidade, end_bairro, end_rua, end_numero, end_complemento, end_estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            error_log("Erro ao preparar consulta: " . $conexao->error);
            return false;
        }
        
        // Bind dos parâmetros
        $stmt->bind_param(
            $endereco['end_rua'], 
            $endereco['end_bairro'], 
            $endereco['end_complemento'], 
            $endereco['end_numero'], 
            $endereco['end_cep'], 
            $endereco['end_cidade'], 
            $endereco['end_estado']
        );


        
        // Executar
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Erro ao executar consulta: " . $stmt->error);
            return false;
        }
    }
?>
