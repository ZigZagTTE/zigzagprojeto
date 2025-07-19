<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="icon" href="design/images/MiniLogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">

    <?php

    require_once("../conecta.php");

    if (isset($_POST['cadastroStatus']))     // Obtem a variável $_POST 'cadastroStatus' caso ela não seja nula
    {                                       // e define $cadStatus com seu valor.    
        $cadStatus = $_POST['cadastroStatus'];
    } else                // Define a variável $_POST 'cadastroStatus' como cadastro_0
    {                   // caso ela seja nula.
        $cadStatus = "cadastro_0";
    }

    if ($cadStatus !== "cadastro_2") {
        header("Location: cadastro.php");
    } else {    //# Etapa 2 => caso $cadStatus = "cadastro_2"

        session_start();
        $codigo = $_SESSION["id"];  // Obtem o código armazenado na variável $_POST.

        $nome = $_POST['txtNome'];
        $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCpf']);
        $data = preg_replace('/[^0-9]/', '', $_POST['txtData']);    // Obtêm as informações a serem atualizadas.
        $tel = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']); // A função preg_replace substitue caracteres
        // não numéricos por nada (remove-os).

        $sql = "UPDATE tbl_usuario "    // Criação do comando UPDATE para atualizar a tabela.
            . "SET usu_nome = '$nome', usu_cpf = $cpf, usu_nascimento = $data, usu_telefone = $tel "
            . "WHERE usu_codigo = $codigo ;";

        $res = mysqli_query($conexao, $sql);    // Execução do comando SQL.

        $_SESSION["nome"] = $nome;
        header("Location: home-cliente.php");
    }

    mysqli_close($conexao); // Encerramento da conexão
    ?>
</head>