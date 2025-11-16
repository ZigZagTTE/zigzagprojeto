<?php

require_once "../../conexao.php";
$ped_id = $_POST["ped_id"];
$entgd_id = $_POST["entgd_id"];
date_default_timezone_set('america/sao_paulo');
$today = date("H:i:s");


$sql = "INSERT INTO tbl_entrega (entrg_data, entrg_inicio, entrg_confirmacao_cli, entrg_confirmacao_cos, ped_id, entgd_id)"
    . "VALUES (NOW(), '$today', 0, 0, '$ped_id', '$entgd_id')";

mysqli_query($conexao, $sql);
header("Location: ./detalhes/?id=$ped_id");
?>