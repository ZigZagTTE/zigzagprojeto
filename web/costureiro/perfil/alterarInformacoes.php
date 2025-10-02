<?php

require_once("../../conexao.php");
session_start();

$id = $_SESSION['cos_id'];


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
            $imagemNomeNovo = $_SESSION['cos_perfil'];
        } else {
            $imagemNome = $_FILES['arquivoImagem']['name'];

            $imagemExtensao = explode('.', $imagemNome);
            $imagemExtensao = strtolower(end($imagemExtensao));

            $imagemNomeNovo = date('Y-m-d-His') . str_replace(' ', '', $nome) . "." . $imagemExtensao;

            $uploadDir = '../../assets/uploads/profilepictures/';
            $uploadDestino = $uploadDir . $imagemNomeNovo;
            move_uploaded_file($imagemTmp, $uploadDestino);
        }

        $queryTesteEmail = "SELECT cos_email "
            . "FROM tbl_costureiro "
            . "WHERE cos_email = '$email'";

        $resultadoTesteEmail = mysqli_query($conexao, $queryTesteEmail);
        $registroTesteEmail = mysqli_fetch_assoc($resultadoTesteEmail);

        if (mysqli_num_rows($resultadoTesteEmail) != 1 and $registroTesteEmail[0] != $email) {
            header("Location: ./?erroEmail=1");
        } else {

            $queryUpdate = "UPDATE tbl_costureiro "
                . " SET cos_email = '$email', cos_nome = '$nome', cos_perfil = '$imagemNomeNovo', cos_cpf = $cpf, cos_nascimento = '$data', cos_telefone = $telefone"
                . " WHERE cos_id = $id";
            mysqli_query($conexao, $queryUpdate);

            if (mysqli_affected_rows($conexao) != 1) {
                header("Location: ./?erro=1");
            } else {

                $_SESSION["cos_nome"] = $nome;
                $_SESSION["cos_email"] = $email;
                $_SESSION["cos_cpf"] = $cpf;
                $_SESSION["cos_cnpj"] = $cnpj;
                $_SESSION["cos_perfil"] = $imagemNomeNovo;
                $_SESSION["cos_rua"] = $rua;
                $_SESSION["cos_bairro"] = $bairro;
                $_SESSION["cos_numero"] = $numero;
                $_SESSION["cos_complemento"] = $complemento;
                $_SESSION["cos_cidade"] = $cidade;
                $_SESSION["cos_estado"] = $estado;
                $_SESSION["cos_cep"] = $cep;


                header("Location: ./");
            }
        }
    }
}
mysqli_close($conexao);

function apagarSessao()
{
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
