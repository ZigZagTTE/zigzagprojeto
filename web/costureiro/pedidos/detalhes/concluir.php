<?php

require_once '../../../conexao.php';

session_start();
if (!isset($_SESSION["cos_id"])) {
    header("Location: ../cadastrar");
}

$id = $_SESSION["cos_id"];

$ped_id = $_POST['ped_id'];

$query = "UPDATE tbl_pedido, tbl_entrega SET ped_concluido = 1, entrg_confirmacao_cos = 1 WHERE tbl_pedido.ped_id = $ped_id AND tbl_entrega.ped_id = $ped_id";
$resultado = mysqli_query($conexao, $query);

if ($resultado) {
    header("Location: ../");
    exit();
} else {
    header("Location: ../&erro=1");
    exit();
}
