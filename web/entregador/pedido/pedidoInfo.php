<?php 
    require_once "../../conexao.php";

    function pedidoInfo($conexao, $id){
        $sql = "SELECT * 
        FROM tbl_pedido 
        WHERE ped_id = $id";
        $resultado = mysqli_query($conexao, $sql);
        return mysqli_fetch_assoc($resultado);
    }