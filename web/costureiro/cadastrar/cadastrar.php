<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cadastro.css">
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
    $cnpj = preg_replace('/[^0-9]/', '', $_POST['txtCNPJ']);
    $rua = $_POST['txtRua'];
    $bairro = $_POST['txtBairro'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $cep = $_POST["txtCEP"];



    $maxTamanhoImagem = 1000000 * 15;

    $tamanhoImagem = $_FILES['arquivoImagem']['size'];
    $imagemTmp = $_FILES['arquivoImagem']['tmp_name'];
    $imagemNome = $_FILES['arquivoImagem']['name'];

    $queryTesteEmail = "SELECT cos_email "
        . "FROM tbl_costureiro "
        . "WHERE cos_email = '$email'";

    $resultadoTeste = mysqli_query($conexao, $queryTesteEmail);

    if ($tamanhoImagem > $maxTamanhoImagem) {
        header("Location: ./?erroImagem=1");
    } else {
        if (!$imagemTmp) {
            $imagemNomeNovo = "default.png";
        } else {
            $imagemExtensao = explode('.', $imagemNome);
            $imagemExtensao = strtolower(end($imagemExtensao));

            $imagemNomeNovo = date('Y-m-d-His') . str_replace(' ', '', $nome) . "." . $imagemExtensao;

            $uploadDir = '../../assets/uploads/profilepictures/';
            $uploadDestino = $uploadDir . $imagemNomeNovo;
            move_uploaded_file($imagemTmp, $uploadDestino);
        }

        if (mysqli_num_rows($resultadoTeste) != 0) {
            header("Location: ./?erroEmail=1");
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO tbl_costureiro(cos_email, cos_senhaHash, cos_nome, cos_perfil, cos_cnpj, cos_rua, cos_bairro, cos_numero, cos_complemento, cos_cep)"
                . "VALUES('$email', '$senha', '$nome', '$imagemNomeNovo', '$cnpj', '$rua', '$bairro', '$numero', '$complemento', '$cep')";
            mysqli_query($conexao, $sql);

            $queryID = "SELECT cos_id "
                . "FROM tbl_costureiro "
                . "WHERE cos_email = '$email'";
            $resultadoID = mysqli_query($conexao, $queryID);

            if (mysqli_num_rows($resultadoID) == 0) {
                echo "Erro ao encontrar o ID específico.";
            } else {
                $registro = mysqli_fetch_row($resultadoID);

                session_start();
                $_SESSION["cos_id"] = $registro[0];
                $_SESSION["cos_email"] = $email;
                $_SESSION["cos_nome"] = $nome;
                $_SESSION["cos_cpf"] = $cpf;
                $_SESSION["cos_cnpj"] = $cnpj;
                $_SESSION["cos_perfil"] = $imagemNomeNovo;
                $_SESSION["cos_rua"] = $rua;
                $_SESSION["cos_bairro"] = $bairro;
                $_SESSION["cos_numero"] = $numero;
                $_SESSION["cos_complemento"] = $complemento;
                $_SESSION["cos_cep"] = $cep;

                header("Location: ../");
            }
        }
    }
    mysqli_close($conexao);
    ?>
</head>