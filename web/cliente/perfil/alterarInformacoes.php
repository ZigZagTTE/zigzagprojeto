<?php

require_once("../../conexao.php");
session_start();

$id = $_SESSION['cli_id'];


if (array_key_exists('sair', $_POST)) {
    apagarSessao();
    header("Location: ./");
} else if (array_key_exists('salvar', $_POST)) {
    $nome = $_POST['txtNome'];
    $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCPF']);
    $email = $_POST['txtEmail'];
    $telefone = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']);
    $data = $_POST['txtData'];

    $maxTamanhoImagem = 1000000 * 15;

    $tamanhoImagem = $_FILES['arquivoImagem']['size'];
    $imagemTmp = $_FILES['arquivoImagem']['tmp_name'];

    if ($tamanhoImagem > $maxTamanhoImagem) {
        header("Location: ./?erroPerfil=1");
    } else {
        if (!$imagemTmp) {
            $imagemNomeNovo = $_SESSION['cli_perfil'];
        } else {
            $imagemNome = $_FILES['arquivoImagem']['name'];

            $imagemExtensao = explode('.', $imagemNome);
            $imagemExtensao = strtolower(end($imagemExtensao));

            $imagemNomeNovo = date('Y-m-d-His') . str_replace(' ', '', $nome) . "." . $imagemExtensao;

            $uploadDir = '../../assets/uploads/profilepictures/';
            $uploadDestino = $uploadDir . $imagemNomeNovo;
            move_uploaded_file($imagemTmp, $uploadDestino);
            if ($_SESSION['cli_perfil'] != 'default.png') {
                unlink('../../assets/uploads/profilepictures/' . $_SESSION['cli_perfil']);
            }
        }

        $queryTesteEmail = "SELECT cli_email "
            . "FROM tbl_cliente "
            . "WHERE cli_email = '$email'";

        $resultadoTesteEmail = mysqli_query($conexao, $queryTesteEmail);
        $registroTesteEmail = mysqli_fetch_assoc($resultadoTesteEmail);

        if (mysqli_num_rows($resultadoTesteEmail) != 1 and $registroTesteEmail[0] != $email) {
            header("Location: ./?erroEmail=1");
        } else {

            $queryUpdate = "UPDATE tbl_cliente"
                . " SET cli_email = '$email', cli_nome = '$nome', cli_perfil = '$imagemNomeNovo', cli_cpf = $cpf, cli_nascimento = '$data', cli_telefone = $telefone"
                . " WHERE cli_id = $id";
            mysqli_query($conexao, $queryUpdate);

            if (mysqli_affected_rows($conexao) != 1) {
                header("Location: ./?erro=1");
            } else {

                $_SESSION["cli_nome"] = $nome;
                $_SESSION["cli_email"] = $email;
                $_SESSION["cli_perfil"] = $imagemNomeNovo;
                $_SESSION["cli_cpf"] = $cpf;
                $_SESSION["cli_telefone"] = $telefone;
                $_SESSION["cli_nascimento"] = $data;

                header("Location: ./");
            }
        }
    }
}
mysqli_close($conexao);

function apagarSessao()
{
    unset($_SESSION["cli_id"]);
    unset($_SESSION["cli_email"]);
    unset($_SESSION["cli_nome"]);
    unset($_SESSION["cli_perfil"]);
    unset($_SESSION["cli_cpf"]);
    unset($_SESSION["cli_telefone"]);
    unset($_SESSION["cli_nascimento"]);
}
