<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="icon" href="../../design/images/MiniLogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">

    <?php

    require_once("../../conexao.php");

    $email = $_POST["txtEmail"];
    $senha = $_POST["txtSenha"];
    $nome = $_POST['txtNome'];
    $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCpf']);
    $data = $_POST['txtData'];
    $telefone = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']);


    $queryTesteEmail = "SELECT cli_email "
        . "FROM tbl_cliente "
        . "WHERE cli_email = '$email'";

    $resTeste = mysqli_query($conexao, $queryTesteEmail);

    if (mysqli_num_rows($resTeste) != 0) {
        header("Location: ./?erroEmail=1");
    } else {
        $sql = "INSERT INTO tbl_cliente(cli_email, cli_senha, cli_nome, cli_cpf, cli_nascimento, cli_telefone)"
            . "VALUES('$email', '$senha', '$nome', $cpf, '$data', $telefone)";
        $res = mysqli_query($conexao, $sql);

        $getID = "SELECT cli_id "
            . "FROM tbl_cliente "
            . "WHERE cli_email = '$email' AND cli_senha = '$senha'";
        $resID = mysqli_query($conexao, $getID);

        if (mysqli_num_rows($resID) == 0) {
            echo "Erro ao encontrar o ID específico.";
        } else {
            $registro = mysqli_fetch_row($resID);

            session_start();
            $_SESSION["cli_id"] = $registro[0];
            $_SESSION["cli_nome"] = $nome;
            header("Location: ../home");
        }
    }
    mysqli_close($conexao);
    ?>
</head>