<?php

require_once "../../conexao.php";

session_start();

if (isset($_GET["cancelarEntrada"])) {
    unset($_SESSION["cos_idtemp"]);
    unset($_SESSION["cos_nometemp"]);
    unset($_SESSION["cos_emailtemp"]);
    unset($_SESSION["cos_perfiltemp"]);
    unset($_SESSION["senhasErradas"]);
    header("Location: ./");

} else if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT cos_id, cos_nome, cos_email, cos_perfil FROM tbl_costureiro WHERE cos_email='$email'";
    $resultadoInfoConta = mysqli_query($conexao, $queryInfoConta);

    if (mysqli_num_rows($resultadoInfoConta) == 0) {
        header("Location: ./?erroEmail=1");
    } else {
        $registroInfoConta = mysqli_fetch_row($resultadoInfoConta);
        $id = $registroInfoConta[0];
        $nome = $registroInfoConta[1];
        $email = $registroInfoConta[2];
        $perfil = $registroInfoConta[3];

        $_SESSION["cos_idtemp"] = $id;
        $_SESSION["cos_nometemp"] = $nome;
        $_SESSION["cos_emailtemp"] = $email;
        $_SESSION["cos_perfiltemp"] = $perfil;

        header("Location: ./");
    }
} else if (isset($_POST["txtSenha"])) {

    $id = $_SESSION["cos_idtemp"];

    $queryTesteSenha = "SELECT cos_senhaHash FROM tbl_costureiro WHERE cos_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senha = $registroTesteSenha[0];

    if ($senha == $_POST['txtSenha']) {
        $_SESSION["cos_id"] = $_SESSION["cos_idtemp"];
        $_SESSION["cos_nome"] = $_SESSION["cos_nometemp"];
        $_SESSION["cos_email"] = $_SESSION["cos_emailtemp"];
        $_SESSION["cos_perfil"] = $_SESSION["cos_perfiltemp"];

        unset($_SESSION["cos_idtemp"]);
        unset($_SESSION["cos_nometemp"]);
        unset($_SESSION["cos_emailtemp"]);
        unset($_SESSION["cos_perfiltemp"]);
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
