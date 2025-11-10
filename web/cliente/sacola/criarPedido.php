<?php

session_start();

require_once "../../conexao.php";

$ped_data = date('Y-m-d');
$ped_hora = date('H:i:s');
$ped_cliente = $_SESSION['cli_id'];
$ped_descricao = $_POST['txtArea'];

$sql = "SELECT end_id FROM tbl_endereco_cliente WHERE cli_id = $ped_cliente";
$result = $conexao->query($sql);
$end_id = $result->fetch_assoc()['end_id'];

$query = "INSERT INTO tbl_pedido (ped_data, ped_horario, ped_descricao, ped_viagens, ped_concluido, cli_id, end_id) 
            VALUES ('$ped_data', '$ped_hora', '$ped_descricao', 0, 0, '$ped_cliente', '$end_id')";

if ($conexao->query($query) === TRUE) {
    header("Location: pedido/");
} else {
    echo "Erro ao criar o pedido: " . $conexao->error;
}
