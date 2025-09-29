<?php

require_once("../../conexao.php");
session_start();

$id = $_SESSION['cli_id'];


if (array_key_exists('excluir', $_POST)) {
    $senha = $_POST['txtConfirmaSenha'];

    $queryTesteSenha = "SELECT cli_senhaHash FROM tbl_cliente WHERE cli_id='$id'";
    $resultadoTesteSenha = mysqli_query($conexao, $queryTesteSenha);

    $registroTesteSenha = mysqli_fetch_row($resultadoTesteSenha);
    $senhaHash = $registroTesteSenha[0];

    if (password_verify($senha, $senhaHash)) {
        
        $queryApagarConta = "DELETE FROM tbl_cliente "
                        ."WHERE cli_id='$id'";
        mysqli_query($conexao, $queryApagarConta);

        apagarSessao();

        header("Location: ./");
    }
    else {
        header("Location: ./?erroPerfil=2");
    }
} else{}
mysqli_close($conexao);
function apagarSessao() {
    unset($_SESSION["cli_id"]);
    unset($_SESSION["cli_email"]);
    unset($_SESSION["cli_nome"]);
    unset($_SESSION["cli_perfil"]);
    unset($_SESSION["cli_cpf"]);
    unset($_SESSION["cli_telefone"]);
    unset($_SESSION["cli_nascimento"]);
}
?>