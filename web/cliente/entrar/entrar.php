<?php

require_once "../../conexao.php";

session_start();

if (isset($_GET["cancelarEntrada"])) {
    apagarDadosTemps();
    header("Location: ./");

} else if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT cli_id, cli_nome, cli_email, cli_perfil, cli_cpf, cli_telefone, cli_nascimento FROM tbl_cliente WHERE cli_email='$email'";
    $resultadoInfoConta = mysqli_query($conexao, $queryInfoConta);

    if (mysqli_num_rows($resultadoInfoConta) == 0) {
        header("Location: ./?erroEmail=1");
    } else {
        $registroInfoConta = mysqli_fetch_row($resultadoInfoConta);
        $id = $registroInfoConta[0];
        $nome = $registroInfoConta[1];
        $email = $registroInfoConta[2];
        $perfil = $registroInfoConta[3];
        $cpf = $registroInfoConta[4];
        $telefone = $registroInfoConta[5];
        $data = $registroInfoConta[6];

        $_SESSION["cli_idtemp"] = $id;
        $_SESSION["cli_nometemp"] = $nome;
        $_SESSION["cli_emailtemp"] = $email;
        $_SESSION["cli_perfiltemp"] = $perfil;
        $_SESSION["cli_cpftemp"] = $cpf;
        $_SESSION["cli_telefonetemp"] = $telefone;
        $_SESSION["cli_nascimentotemp"] = $data;

        header("Location: ./");

    }
} else if (isset($_POST["txtSenha"])) {

    $id = $_SESSION["cli_idtemp"];

    $queryTesteSenha = "SELECT cli_senhaHash FROM tbl_cliente WHERE cli_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];
    $senha = $_POST["txtSenha"];

    if (password_verify($senha, $senhaHash)) {
        $_SESSION["cli_id"] = $_SESSION["cli_idtemp"];
        $_SESSION["cli_nome"] = $_SESSION["cli_nometemp"];
        $_SESSION["cli_email"] = $_SESSION["cli_emailtemp"];
        $_SESSION["cli_perfil"] = $_SESSION["cli_perfiltemp"];
        $_SESSION["cli_cpf"] = $_SESSION["cli_cpftemp"];
        $_SESSION["cli_telefone"] = $_SESSION["cli_telefonetemp"];
        $_SESSION["cli_nascimento"] = $_SESSION["cli_nascimentotemp"];

        apagarDadosTemps();

        header("Location: ../");
    } else if ($_SESSION["senhasErradas"] > 2) {
        apagarDadosTemps();
        header("Location: ./");
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=".$_SESSION["senhasErradas"]);
    }
}
mysqli_close($conexao);

function apagarDadosTemps() {
    unset($_SESSION["cli_idtemp"]);
    unset($_SESSION["cli_nometemp"]);
    unset($_SESSION["cli_emailtemp"]);
    unset($_SESSION["cli_perfiltemp"]);
    unset($_SESSION["cli_cpftemp"]);
    unset($_SESSION["cli_telefonetemp"]);
    unset($_SESSION["cli_nascimentotemp"]);
    unset($_SESSION["senhasErradas"]);
}

?>