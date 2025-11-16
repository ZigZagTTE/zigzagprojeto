<?php

require_once("../../../conexao.php");

if (array_key_exists('excluir', $_POST)) {
    $queryExcluirEndereco = "DELETE FROM tbl_costureiro
    WHERE cos_id = $_POST[txtID]";

    mysqli_query($conexao, $queryExcluirEndereco);
    header("Location: ../");
} else if (array_key_exists('salvar', $_POST)) {
    $rua = $_POST['txtRua'];
    $bairro = $_POST['txtBairro'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $cidade = $_POST['txtCidade'];
    $estado = $_POST['txtEstado'];
    $cep = preg_replace('/[^0-9]/', '', $_POST['txtCEP']);
    $ID = $_POST['txtID'];

    $queryUpdate = "UPDATE tbl_costureiro"
        . " SET cos_rua = '$rua', cos_bairro = '$bairro', cos_numero = '$numero', cos_complemento = '$complemento', cos_cidade = '$cidade', cos_estado = '$estado', cos_cep = $cep"
        . " WHERE cos_id = $ID";
    mysqli_query($conexao, $queryUpdate);

    if (mysqli_affected_rows($conexao) != 1) {
        header("Location: ./?id=$endID&erro=1");
    } else {
        header("Location: ./?id=$endID");
    }
}
mysqli_close($conexao);
?>