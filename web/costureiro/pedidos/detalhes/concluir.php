<?php

require_once '../../../conexao.php';

session_start();
if (!isset($_SESSION["cos_id"])) {
    header("Location: ../cadastrar");
}

$id = $_SESSION["cos_id"];

$ped_id = $_POST['ped_id'];

$query = "UPDATE tbl_pedido SET ped_concluido = 1 WHERE ped_id = $ped_id";
$resultado = mysqli_query($conexao, $query);


$id = null;

$ped_id = null;

if ($resultado) {
    header("Location: ../");
    exit();
} else {
    header("Location: ../&erro=1");
    exit();
}
