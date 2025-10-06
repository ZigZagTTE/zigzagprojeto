<?php

require_once("../../conexao.php");
session_start();

$id = $_SESSION['cos_id'];


if (array_key_exists('excluir', $_POST)) {
    $senha = $_POST['txtConfirmaSenha'];

    $queryTesteSenha = "SELECT cos_senhaHash FROM tbl_costureiro WHERE cos_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];

    if (password_verify($senha, $senhaHash)) {

        $queryApagarConta = "DELETE FROM tbl_costureiro "
            . "WHERE cos_id='$id'";
        mysqli_query($conexao, $queryApagarConta);

        unset($_SESSION["senhasErradas"]);
        apagarSessao();

        header("Location: ./");
    } else if ($_SESSION["senhasErradas"] > 2) {
        unset($_SESSION["senhasErradas"]);
        header("Location: ./");
        apagarSessao();
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=" . $_SESSION["senhasErradas"]);
    }
} else if (array_key_exists('salvar', $_POST)) {
    $id = $_SESSION["cos_id"];

    $queryTesteSenha = "SELECT cos_senhaHash FROM tbl_costureiro WHERE cos_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];
    $senha = $_POST["txtSenha"];

    if (password_verify($senha, $senhaHash)) {
        $senhaNova = $_POST["txtSenhaNova"];
        $senhaNovaHash = password_hash($senhaNova, PASSWORD_DEFAULT);

        $queryMudarSenha = "UPDATE tbl_costureiro SET cos_senhaHash='$senhaNovaHash' WHERE cos_id='$id'";
        mysqli_execute_query($conexao, $queryMudarSenha);
        unset($_SESSION["senhasErradas"]);

        header("Location: ./");
    } else if ($_SESSION["senhasErradas"] > 2) {
        unset($_SESSION["senhasErradas"]);
        header("Location: ./");
        apagarSessao();
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=" . $_SESSION["senhasErradas"]);
    }
}
mysqli_close($conexao);
function apagarSessao()
{
    unset($_SESSION["cos_id"]);
    unset($_SESSION["cos_nome"]);
    unset($_SESSION["cos_email"]);
    unset($_SESSION["cos_cpf"]);
    unset($_SESSION["cos_cnpj"]);
    unset($_SESSION["cos_perfil"]);
    unset($_SESSION["cos_rua"]);
    unset($_SESSION["cos_bairro"]);
    unset($_SESSION["cos_numero"]);
    unset($_SESSION["cos_complemento"]);
    unset($_SESSION["cos_cidade"]);
    unset($_SESSION["cos_estado"]);
    unset($_SESSION["cos_cep"]);
}
?>