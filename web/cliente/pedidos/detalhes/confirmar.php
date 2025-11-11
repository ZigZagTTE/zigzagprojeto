<?php

require_once "../../../conexao.php";
require_once "../pedidoInfo.php";
session_start();

$pedido = pedidoInfo($conexao, $_GET["id"]);

if ($pedido[0]["ped_concluido"] == 1 && $pedido[0]["ped_viagens"] < 2) {
    $sql = "UPDATE tbl_pedido SET ped_viagens = ped_viagens + 1 WHERE ped_id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $_GET["id"]);
    $stmt->execute();
}
header("Location: ../");
?>