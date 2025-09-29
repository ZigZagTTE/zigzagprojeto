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
    $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCPF']);
    $data = $_POST['txtData'];
    $telefone = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']);

    $maxTamanhoImagem = 1000000 * 15;

    $tamanhoImagem = $_FILES['arquivoImagem']['size'];
    $imagemTmp = $_FILES['arquivoImagem']['tmp_name'];
    $imagemNome = $_FILES['arquivoImagem']['name'];

    $queryTesteEmail = "SELECT cli_email "
        . "FROM tbl_cliente "
        . "WHERE cli_email = '$email'";

    $resultadoTeste = mysqli_query($conexao, $queryTesteEmail);

    if ($tamanhoImagem > $maxTamanhoImagem) {
        header("Location: ./?erroImagem=1");
    } else {
        if (!$imagemTmp) {
            $imagemNomeNovo = "default.png";
        } else {
            $imagemExtensao = explode('.', $imagemNome);
            $imagemExtensao = strtolower(end($imagemExtensao));

            $imagemNomeNovo = date('Y-m-d-His') . str_replace(' ','',$nome) . "." . $imagemExtensao;

            $uploadDir = '../../assets/uploads/profilepictures/';
            $uploadDestino = $uploadDir . $imagemNomeNovo;
            move_uploaded_file($imagemTmp, $uploadDestino);
        }

        if (mysqli_num_rows($resultadoTeste) != 0) {
            header("Location: ./?erroEmail=1");
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tbl_cliente(cli_email, cli_senhaHash, cli_nome, cli_perfil, cli_cpf, cli_nascimento, cli_telefone)"
                . "VALUES('$email', '$senha', '$nome', '$imagemNomeNovo', $cpf, '$data', $telefone)";
            mysqli_query($conexao, $sql);

            $queryID = "SELECT cli_id "
                . "FROM tbl_cliente "
                . "WHERE cli_email = '$email'";
            $resultadoID = mysqli_query($conexao, $queryID);

            if (mysqli_num_rows($resultadoID) == 0) {
                echo "Erro ao encontrar o ID específico.";
            } else {
                $registro = mysqli_fetch_row($resultadoID);

                session_start();
                $_SESSION["cli_id"] = $registro[0];
                $_SESSION["cli_nome"] = $nome;
                $_SESSION["cli_email"] = $email;
                $_SESSION["cli_perfil"] = $imagemNomeNovo;
                $_SESSION["cli_cpf"] = $cpf;
                $_SESSION["cli_telefone"] = $telefone;
                $_SESSION["cli_nascimento"] = $data;

                header("Location: ../");
            }
        }
    }
    mysqli_close($conexao);
    ?>
</head>