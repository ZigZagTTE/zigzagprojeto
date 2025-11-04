<?php 

    require_once "../../conexao.php";

    function infoCostureira($conexao, $ped_id) {
        $sql = "SELECT * FROM tbl_costureiro, tbl_pedido 
        WHERE tbl_costureiro.cost_id = tbl_pedido.cost_id
        WHERE ped_id = $ped_id";
    }