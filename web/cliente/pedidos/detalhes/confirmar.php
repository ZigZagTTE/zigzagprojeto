<?php

require_once "../../../conexao.php";
require_once "../pedidoInfo.php";
session_start();

$pedido = pedidoInfo($conexao, $_GET["id"]);

$id = $_GET["id"];

if ($pedido[0]["ped_viagens"] == 0) {
    $sql = "UPDATE tbl_pedido SET ped_viagens = ped_viagens + 1 WHERE ped_id = $id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}
else if ($pedido[0]["ped_concluido"] == 1 && $pedido[0]["ped_viagens"] == 1) {
    $sql = "UPDATE tbl_pedido, tbl_entrega SET ped_viagens = ped_viagens + 1, entrg_confirmacao_cli = 1 WHERE tbl_pedido.ped_id = $id AND tbl_entrega.ped_id = $id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
}
header("Location: ../");
?>