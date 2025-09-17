<?php

require_once "../../conexao.php";

session_start();

if (isset($_GET["cancelarEntrada"])) {
    unset($_SESSION["cli_idtemp"]);
    unset($_SESSION["cli_nometemp"]);
    unset($_SESSION["cli_emailtemp"]);
    unset($_SESSION["cli_perfiltemp"]);
    unset($_SESSION["senhasErradas"]);
    header("Location: ./");

} else if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT cli_id, cli_nome, cli_email, cli_perfil FROM tbl_cliente WHERE cli_email='$email'";
    $resultadoInfoConta = mysqli_query($conexao, $queryInfoConta);

    if (mysqli_num_rows($resultadoInfoConta) == 0) {
        header("Location: ./?erroEmail=1");
    } else {
        $registroInfoConta = mysqli_fetch_row($resultadoInfoConta);
        $id = $registroInfoConta[0];
        $nome = $registroInfoConta[1];
        $email = $registroInfoConta[2];
        $perfil = $registroInfoConta[3];

        $_SESSION["cli_idtemp"] = $id;
        $_SESSION["cli_nometemp"] = $nome;
        $_SESSION["cli_emailtemp"] = $email;
        $_SESSION["cli_perfiltemp"] = $perfil;

        header("Location: ./");

    }
} else if (isset($_POST["txtSenha"])) {

    $id = $_SESSION["cli_idtemp"];

    $queryTesteSenha = "SELECT cli_senha FROM tbl_cliente WHERE cli_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senha = $registroTesteSenha[0];

    if ($senha == $_POST['txtSenha']) {
        $_SESSION["cli_id"] = $_SESSION["cli_idtemp"];
        $_SESSION["cli_nome"] = $_SESSION["cli_nometemp"];
        $_SESSION["cli_email"] = $_SESSION["cli_emailtemp"];
        $_SESSION["cli_perfil"] = $_SESSION["cli_perfiltemp"];

        unset($_SESSION["cli_idtemp"]);
        unset($_SESSION["cli_nometemp"]);
        unset($_SESSION["cli_emailtemp"]);
        unset($_SESSION["cli_perfiltemp"]);
        unset($_SESSION["senhasErradas"]);

        header("Location: ../");
    } else if ($_SESSION["senhasErradas"] >= 3) {
        unset($_SESSION["senhasErradas"]);
        header("Location: ./?erroSenha=2");
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=1");
    }
}
mysqli_close($conexao);

?>