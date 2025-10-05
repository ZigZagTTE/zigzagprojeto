<?php

require_once("../../conexao.php");
session_start();

$id = $_SESSION['entgd_id'];


if (array_key_exists('excluir', $_POST)) {
    $senha = $_POST['txtConfirmaSenha'];

    $queryTesteSenha = "SELECT cli_senhaHash FROM tbl_entregador WHERE entgd_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];

    if (password_verify($senha, $senhaHash)) {

        $queryApagarConta = "DELETE FROM tbl_entregador "
            . "WHERE entgd_id='$id'";
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
        header("Location: ./?erroSenha=".$_SESSION["senhasErradas"]);
    }
} else if (array_key_exists('salvar', $_POST)) {
    $id = $_SESSION["entgd_id"];

    $queryTesteSenha = "SELECT entgd_senhaHash FROM tbl_entregador WHERE entgd_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];
    $senha = $_POST["txtSenha"];

    if (password_verify($senha, $senhaHash)) {
        $senhaNova = $_POST["txtSenhaNova"];
        $senhaNovaHash = password_hash($senhaNova, PASSWORD_DEFAULT);

        $queryMudarSenha = "UPDATE tbl_entregador SET entgd_senhaHash='$senhaNovaHash' WHERE entgd_id='$id'";
        mysqli_execute_query($conexao, $queryMudarSenha);
        unset($_SESSION["senhasErradas"]);

        header("Location: ./");
    } else if ($_SESSION["senhasErradas"] > 2) {
        unset($_SESSION["senhasErradas"]);
        header("Location: ./");
        apagarSessao();
    } else {
        $_SESSION["senhasErradas"] += 1;
        header("Location: ./?erroSenha=".$_SESSION["senhasErradas"]);
    }
}
mysqli_close($conexao);
function apagarSessao()
{
    unset($_SESSION["entgd_id"]);
    unset($_SESSION["entgd_email"]);
    unset($_SESSION["entgd_nome"]);
    unset($_SESSION["entgd_perfil"]);
    unset($_SESSION["entgd_cpf"]);
    unset($_SESSION["entgd_telefone"]);
    unset($_SESSION["entgd_cnh"]);
}
?>