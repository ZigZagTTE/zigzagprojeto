<?php

require_once "../../conexao.php";

session_start();

function apagarDadosTemps() {
    unset($_SESSION["entgd_idtemp"]);
    unset($_SESSION["entgd_nometemp"]);
    unset($_SESSION["entgd_emailtemp"]);
    unset($_SESSION["entgd_perfiltemp"]);
    unset($_SESSION["entgd_cpftemp"]);
    unset($_SESSION["entgd_telefonetemp"]);
    unset($_SESSION["entgd_cnhtemp"]);
    unset($_SESSION["ped_idtemp"]);
    unset($_SESSION["ped_datatemp"]);
    unset($_SESSION["senhasErradas"]);
}

if (isset($_GET["cancelarEntrada"])) {
    apagarDadosTemps();
    header("Location: ./");

} else if (isset($_POST['txtEmail'])) {
    $email = $_POST['txtEmail'];

    $queryInfoConta = "SELECT entgd_id, entgd_nome, entgd_email, entgd_perfil, entgd_cpf, entgd_telefone, entgd_cnh FROM tbl_entregador WHERE entgd_email='$email'";
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
        $cnh = $registroInfoConta[6];

        $_SESSION["entgd_idtemp"] = $id;
        $_SESSION["entgd_nometemp"] = $nome;
        $_SESSION["entgd_emailtemp"] = $email;
        $_SESSION["entgd_perfiltemp"] = $perfil;
        $_SESSION["entgd_cpftemp"] = $cpf;
        $_SESSION["entgd_telefonetemp"] = $telefone;
        $_SESSION["entgd_cnhtemp"] = $cnh;

        header("Location: ./");

    }
} else if (isset($_POST["txtSenha"])) {

    $id = $_SESSION["entgd_idtemp"];

    $queryTesteSenha = "SELECT entgd_senhaHash FROM tbl_entregador WHERE entgd_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];
    $senha = $_POST["txtSenha"];

    if (password_verify($senha, $senhaHash)) {
        $_SESSION["entgd_id"] = $_SESSION["entgd_idtemp"];
        $_SESSION["entgd_nome"] = $_SESSION["entgd_nometemp"];
        $_SESSION["entgd_email"] = $_SESSION["entgd_emailtemp"];
        $_SESSION["entgd_perfil"] = $_SESSION["entgd_perfiltemp"];
        $_SESSION["entgd_cpf"] = $_SESSION["entgd_cpftemp"];
        $_SESSION["entgd_telefone"] = $_SESSION["entgd_telefonetemp"];
        $_SESSION["entgd_cnh"] = $_SESSION["entgd_cnhtemp"];

        apagarDadosTemps();

        header("Location: ../");
    } else if ($_SESSION["senhasErradas"] >= 3) {
        unset($_SESSION["senhasErradas"]);
        header("Location: ./?erroSenha=2");
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=1&senha=$senhaHash");
    }
}
mysqli_close($conexao);

?>