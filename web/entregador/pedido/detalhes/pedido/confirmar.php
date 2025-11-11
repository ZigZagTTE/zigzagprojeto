<?php
    require_once "../../../../conexao.php"; 
    $ped_id = $_POST["pedido_id"];
    $sql = "UPDATE tbl_pedido SET ped_viagens = ped_viagens + 1 
            WHERE ped_id = $ped_id;";
    $conexao->query($sql);

    $query = "SELECT ped_viagens 
              FROM tbl_pedido
              WHERE ped_id = $ped_id;";
    if ($query == 2){
        $sql = "UPDATE tbl_pedido SET ped_concluido = 1 
                WHERE ped_id = $ped_id;";
        $conexao->query($sql);
    }

    header("Location: ../../../entregas/");
?>