<?php

require_once "../../conexao.php";

$email = $_POST['txtEmail'];
$senha = $_POST['txtSenha'];

$sql1 = "SELECT cli_id, cli_nome FROM tbl_cliente WHERE cli_email='$email' AND cli_senha='$senha'"; 
$res = mysqli_query($conexao, $sql1);

if (mysqli_num_rows($res) == 0)
{
    echo "Usuário não cadastrado, email ou senha errados";
    header("Location: ./");
} else
{
    echo "Usuário cadastrado";
    $registro = mysqli_fetch_row($res);
    $id = $registro[0];
    $nome = $registro[1];

    session_start();

    $_SESSION["id"] = $id;
    $_SESSION["nome"] = $nome;
    header("Location: ./verificaUsu.php");
}
?>