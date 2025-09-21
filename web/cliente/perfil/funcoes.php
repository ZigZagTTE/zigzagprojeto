<?php
function buscarDadosUsuario($conexao, $cli_id) {
    // Preparar consulta para evitar SQL injection
    $stmt = $conexao->prepare("
        SELECT 
            cli_id, 
            cli_nome, 
            cli_email, 
            cli_telefone, 
            cli_cpf, 
            cli_nascimento
        FROM tbl_cliente 
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

function formatarCPF($cpf) {
    if (empty($cpf)) return '';
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
}

function formatarTelefone($telefone) {
    if (empty($telefone)) return '';
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    if (strlen($telefone) == 11) {
        return preg_replace("/(\d{2})(\d{5})(\d{4})/", "($1) $2-$3", $telefone);
    } else if (strlen($telefone) == 10) {
        return preg_replace("/(\d{2})(\d{4})(\d{4})/", "($1) $2-$3", $telefone);
    }
    return $telefone;
}

function formatarData($data) {
    if (empty($data)) return '';
    return date('d/m/Y', strtotime($data));
}
?>