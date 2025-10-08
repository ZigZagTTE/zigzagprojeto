<?php

require_once("../../../conexao.php");

session_start();

$rua = $_POST['txtRua'];
$bairro = $_POST['txtBairro'];
$numero = $_POST['txtNumero'];
$complemento = $_POST['txtComplemento'];
$cidade = $_POST['txtCidade'];
$estado = $_POST['txtEstado'];
$cep = preg_replace('/[^0-9]/', '', $_POST['txtCEP']);

$queryInsert = "INSERT INTO tbl_endereco_cliente(end_rua, end_bairro, end_numero, end_complemento, end_cidade, end_estado, end_cep, cli_id)"
    . " VALUES ('$rua', '$bairro', '$numero', '$complemento', '$cidade', '$estado', $cep, $_SESSION[cli_id])";
mysqli_query($conexao, $queryInsert);

if (mysqli_affected_rows($conexao) != 1) {
    header("Location: ./?erro=1");
} else {
    header("Location: ../");
}



mysqli_close($conexao);
?>