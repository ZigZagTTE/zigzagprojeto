<?php

    require_once "../conexao.php";

    function pedidosSelecionados($conexao) {
        $query = "SELECT *, tbl_costureiro.cos_nome, tbl_costureiro.cos_rua, tbl_costureiro.cos_numero, tbl_cliente.cli_nome, tbl_endereco_cliente.end_rua, tbl_endereco_cliente.end_numero, tbl_item.ped_id 
                FROM tbl_pedido, tbl_costureiro, tbl_cliente, tbl_endereco_cliente, tbl_item, tbl_catalogo
                WHERE tbl_pedido.ped_concluido = 0 
                AND tbl_pedido.ped_id = tbl_item.ped_id 
                AND tbl_item.cat_id = tbl_catalogo.cat_id
                AND tbl_catalogo.cos_id = tbl_costureiro.cos_id
                AND tbl_pedido.cli_id = tbl_cliente.cli_id 
                AND tbl_pedido.end_id = tbl_endereco_cliente.end_id";
        $result = mysqli_query($conexao, $query);
        $pedidos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $pedidos;
    }
?>