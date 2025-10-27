<?php
    require_once "../../../../conexao.php"; 
    $ped_id = $_POST["pedido_id"];
    $sql = "UPDATE tbl_pedido SET ped_viagens = 2 WHERE ped_id = $ped_id AND ped_concluido = 1;";
    $conexao->query($sql);

    header("Location: ../../../entregas/");
?>