<?php

require_once "../../../conexao.php";
session_start();
require_once "buscarInformacoes.php";

$cos_id = $_SESSION['cos_id'];
$ser_id = $_POST['ser_id'];
$pec_id = $_POST['pec_id'];
$valor_novo = $_POST['txtPrecoNovo'];
$descricao_novo = $_POST['txtDescricaoNovo'];

$buscarInformacoesPeca = buscarInformacoesDaPeca($conexao, $pec_id);
$buscarValorAtual = buscarInformacoesDoCatalogo($conexao, $pec_id, $cos_id);


$query_verificar_categoria = mysqli_prepare($conexao, "SELECT * from tbl_catalogo where cos_id = ? and pec_id = ?");
mysqli_stmt_bind_param($query_verificar_categoria, 'ii', $cos_id, $pec_id);
mysqli_stmt_execute($query_verificar_categoria);
$resultado_query = mysqli_stmt_get_result($query_verificar_categoria);

$resultado_query = mysqli_num_rows($resultado_query);

if ($resultado_query > 0) {

    $query = mysqli_prepare($conexao, "UPDATE tbl_catalogo SET cat_valor = ?, cat_descricao = ? WHERE cos_id = ? and pec_id = ?");
    mysqli_stmt_bind_param($query, 'dsii', $valor_novo, $descricao_novo, $cos_id, $pec_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conexao);
} else {
    $query = mysqli_prepare($conexao, "INSERT INTO tbl_catalogo (cat_valor, cat_descricao, cos_id, pec_id) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($query, 'dsii', $valor_novo, $descricao_novo, $cos_id, $pec_id);
    mysqli_stmt_execute($query);
    mysqli_stmt_close($query);
    mysqli_close($conexao);
}

$valor_novo = 0;
$descricao_novo = "";

header('Location: ./?pec_id=' . $pec_id . '&ser_id=' . $ser_id);
