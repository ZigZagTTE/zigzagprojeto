<?php 
    require_once "../../conexao.php";
    function pedidoInfo($conexao, $id){
        $sql = "SELECT * 
        FROM tbl_pedido
        JOIN tbl_item on tbl_pedido.ped_id = tbl_item.ped_id
        JOIN tbl_catalogo on tbl_catalogo.cat_id = tbl_item.cat_id
        JOIN tbl_costureiro on tbl_costureiro.cos_id = tbl_catalogo.cos_id
        JOIN tbl_cliente on tbl_cliente.cli_id = tbl_pedido.cli_id
        JOIN tbl_endereco_cliente on tbl_endereco_cliente.end_id = tbl_pedido.end_id
        WHERE tbl_pedido.ped_id = $id";
        $resultado = mysqli_query($conexao, $sql);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

?>