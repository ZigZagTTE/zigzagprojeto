<?php

require_once("../../../conexao.php");

if (array_key_exists('excluir', $_POST)) {
    $queryExcluirEndereco = "DELETE FROM tbl_endereco_cliente 
    WHERE end_id = $_POST[txtID]";

    mysqli_query($conexao, $queryExcluirEndereco);
    header("Location: ../");
}

?>