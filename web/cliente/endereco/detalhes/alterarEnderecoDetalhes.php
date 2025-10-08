<?php

require_once("../../../conexao.php");

if (array_key_exists('excluir', $_POST)) {
    $queryExcluirEndereco = "DELETE FROM tbl_endereco_cliente 
    WHERE end_id = $_POST[txtID]";

    mysqli_query($conexao, $queryExcluirEndereco);
    header("Location: ../");
} else if (array_key_exists('salvar', $_POST)) {
    $endID = $_POST['txtID'];
    $rua = $_POST['txtRua'];
    $bairro = $_POST['txtBairro'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $cidade = $_POST['txtCidade'];
    $estado = $_POST['txtEstado'];
    $cep = preg_replace('/[^0-9]/', '', $_POST['txtCEP']);

    $queryUpdate = "UPDATE tbl_endereco_cliente"
        . " SET end_rua = '$rua', end_bairro = '$bairro', end_numero = '$numero', end_complemento = '$complemento', end_cidade = '$cidade', end_estado = '$estado', end_cep = $cep"
        . " WHERE end_id = $endID";
    mysqli_query($conexao, $queryUpdate);

    if (mysqli_affected_rows($conexao) != 1) {
        header("Location: ./?id=$endID&erro=1");
    } else {
        header("Location: ./?id=$endID");
    }


}
mysqli_close($conexao);

?>