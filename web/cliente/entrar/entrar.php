<?php

require_once "../../conexao.php";

if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT cli_id, cli_nome, cli_email, cli_perfil FROM tbl_cliente WHERE cli_email='$email'";
    $resultadoInfoConta = mysqli_query($conexao, $queryInfoConta);
}

session_start();
if (isset($_GET["cancelarEntrada"])) {
    $_SESSION["cli_idtemp"] = null;
    $_SESSION["cli_nometemp"] = null;
    $_SESSION["cli_emailtemp"] = null;
    $_SESSION["cli_perfiltemp"] = null;
    header("Location: ./");
} else if (mysqli_num_rows($resultadoInfoConta) == 0) {
    header("Location: ./?erroEmail=1");
} else {
    $registro = mysqli_fetch_row($resultadoInfoConta);
    $id = $registro[0];
    $nome = $registro[1];
    $email = $registro[2];
    $perfil = $registro[3];

    $_SESSION["cli_idtemp"] = $id;
    $_SESSION["cli_nometemp"] = $nome;
    $_SESSION["cli_emailtemp"] = $email;
    $_SESSION["cli_perfiltemp"] = $perfil;

    header("Location: ./");

}
?>