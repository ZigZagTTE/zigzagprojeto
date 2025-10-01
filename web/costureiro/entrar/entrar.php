<?php

require_once "../../conexao.php";

session_start();

if (isset($_GET["cancelarEntrada"])) {
    apagarDadosTemps();
    header("Location: ./");
} else if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT cos_id, cos_email, cos_nome, cos_cpf, cos_cnpj, cos_perfil, cos_rua, cos_bairro, cos_numero, cos_complemento, cos_cidade, cos_estado, cos_cep FROM tbl_costureiro WHERE cos_email = '$email';
";
    $resultadoInfoConta = mysqli_query($conexao, $queryInfoConta);

    if (mysqli_num_rows($resultadoInfoConta) == 0) {
        header("Location: ./?erroEmail=1");
    } else {
        $registroInfoConta = mysqli_fetch_row($resultadoInfoConta);
        $id = $registroInfoConta[0];
        $email = $registroInfoConta[1];
        $nome = $registroInfoConta[2];
        $cpf = $registroInfoConta[3];
        $cnpj = $registroInfoConta[4];
        $perfil = $registroInfoConta[5];
        $rua = $registroInfoConta[6];
        $bairro = $registroInfoConta[7];
        $numero = $registroInfoConta[8];
        $complemento = $registroInfoConta[9];
        $cidade = $registroInfoConta[10];
        $estado = $registroInfoConta[11];
        $cep = $registroInfoConta[12];

        $_SESSION["cos_idtemp"] = $id;
        $_SESSION["cos_emailtemp"] = $email;
        $_SESSION["cos_nometemp"] = $nome;
        $_SESSION["cos_cpftemp"] = $cpf;
        $_SESSION["cos_cnpjtemp"] = $cnpj;
        $_SESSION["cos_perfiltemp"] = $perfil;
        $_SESSION["cos_ruatemp"] = $rua;
        $_SESSION["cos_bairrotemp"] = $bairro;
        $_SESSION["cos_numerotemp"] = $numero;
        $_SESSION["cos_complementotemp"] = $complemento;
        $_SESSION["cos_cidadetemp"] = $cidade;
        $_SESSION["cos_estadotemp"] = $estado;
        $_SESSION["cos_ceptemp"] = $cep;

        header("Location: ./");
    }
} else if (isset($_POST["txtSenha"])) {

    $id = $_SESSION["cos_idtemp"];

    $queryTesteSenha = "SELECT cos_senhaHash FROM tbl_costureiro WHERE cos_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];
    $senha = $_POST["txtSenha"];

    if (password_verify($senha, $senhaHash)) {
        $_SESSION["cos_id"] = $_SESSION["cos_idtemp"];
        $_SESSION["cos_email"]  = $_SESSION["cos_emailtemp"];
        $_SESSION["cos_nome"] = $_SESSION["cos_nometemp"];
        $_SESSION["cos_cpf"]  = $_SESSION["cos_cpftemp"];
        $_SESSION["cos_cnpj"] = $_SESSION["cos_cnpjtemp"];
        $_SESSION["cos_perfil"] = $_SESSION["cos_perfiltemp"];
        $_SESSION["cos_rua"] = $_SESSION["cos_ruatemp"];
        $_SESSION["cos_bairro"] = $_SESSION["cos_bairrotemp"];
        $_SESSION["cos_numero"] = $_SESSION["cos_numerotemp"];
        $_SESSION["cos_complemento"] = $_SESSION["cos_complementotemp"];
        $_SESSION["cos_cidade"] = $_SESSION["cos_cidadetemp"];
        $_SESSION["cos_estado"] = $_SESSION["cos_estadotemp"];
        $_SESSION["cos_cep"] = $_SESSION["cos_ceptemp"];

        apagarDadosTemps();

        header("Location: ../");
    } else if ($_SESSION["senhasErradas"] > 2) {
        apagarDadosTemps();
        header("Location: ./");
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=" . $_SESSION["senhasErradas"]);
    }
}
mysqli_close($conexao);

function apagarDadosTemps()
{
    unset($_SESSION["cos_idtemp"]);
    unset($_SESSION["cos_emailtemp"]);
    unset($_SESSION["cos_nometemp"]);
    unset($_SESSION["cos_cpftemp"]);
    unset($_SESSION["cos_cnpjtemp"]);
    unset($_SESSION["cos_perfiltemp"]);
    unset($_SESSION["cos_ruatemp"]);
    unset($_SESSION["cos_bairrotemp"]);
    unset($_SESSION["cos_numerotemp"]);
    unset($_SESSION["cos_complementotemp"]);
    unset($_SESSION["cos_cidadetemp"]);
    unset($_SESSION["cos_estadotemp"]);
    unset($_SESSION["cos_ceptemp"]);
}
