<?php
require_once('../../conexao.php');


$sql = "SELECT tbl_pedido.ped_id FROM tbl_pedido, tbl_item, tbl_catalogo, tbl_costureiro WHERE tbl_pedido.ped_id = tbl_item.ped_id AND tbl_item.cat_id = tbl_catalogo.cat_id AND tbl_catalogo.cos_id = tbl_costureiro.cos_id AND tbl_costureiro.cos_id = $id AND ped_concluido = '0'";

$sqlexecutar = mysqli_query($conexao, $sql);

echo  json_encode(mysqli_fetch_all($sqlexecutar, MYSQLI_ASSOC));
