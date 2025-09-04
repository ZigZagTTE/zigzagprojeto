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


    <script async>
        // ## Código Javascript que formata automaticamente as informações de telefone e CPF

        function formatarTelefone(input) {
            // Remove todos os caracteres não numéricos
            var telefone = input.value.replace(/\D/g, '');

            // Insere os parênteses, espaço e traço nos lugares corretos
            telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');

            // Atualiza o valor do campo de entrada com o telefone formatado
            input.value = telefone;
        }

        function formatarCPF(input) {
            // Remove todos os caracteres não numéricos
            var telefone = input.value.replace(/\D/g, '');

            // Insere os parênteses, espaço e traço nos lugares corretos
            telefone = telefone.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

            // Atualiza o valor do campo de entrada com o telefone formatado
            input.value = telefone;
        }
    </script>
    <?php

    require_once("../../conecta.php");

    if (isset($_POST['cadastroStatus']))     // Obtem a variável $_POST 'cadastroStatus' caso ela não seja nula
    {                                       // e define $cadStatus com seu valor.    
        $cadStatus = $_POST['cadastroStatus'];
    } else                // Define a variável $_POST 'cadastroStatus' como cadastro_0
    {                   // caso ela seja nula.
        $cadStatus = "cadastro_0";
    }

    if ($cadStatus !== 'cadastro_1') {
        header("Location: cadastro.php");
    }

    if ($cadStatus == 'cadastro_1') {    //# Etapa 1 => caso $cadStatus = "cadastro_1"

        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
        $confirmsenha = $_POST['txtCSenha'];  // -> Obtêm os dados a serem cadastrados + senha de confirmação.

        $testeEmail = mysqli_query($conexao, "SELECT cli_email "
            . "FROM tbl_cliente "
            . "WHERE cli_email = '$email'");

        if (mysqli_num_rows($testeEmail) != 0) {
            header("Location: cadastro.php?erro=emailUsado");
        }
        if ($senha != $confirmsenha) //## Caso as senhas sejam diferentes, redireciona o usuário à mesma página com a variável $_GET status = 'erro!senhaDif'.
        {
            header("Location: cadastro.php?erro=senhaDif");
        } else //## Executa o código caso a senha normal seja igual a sua confirmação.
        {
            $sql = "INSERT into tbl_cliente"    // Criação do comando INSERT para inserção dos dados.
                . "(cli_email, cli_senha)"
                . "VALUES ('$email', '$senha')";

            $res = mysqli_query($conexao, $sql);    // Executa o código SQL em uma função definida no final da página,
            // o código que mostra os erros está comentado, então não aparecem.

            $sql2 = "SELECT cli_id "        // Criação do comando SELECT para obter o código da conta criada.
                . "FROM tbl_cliente "
                . "WHERE cli_email = '$email' AND cli_senha = '$senha'";

            $res = mysqli_query($conexao, $sql2);

            if (mysqli_num_rows($res) == 0)    //### Caso não haja linhas com as condições, expressa-se o erro.
            {
                echo "Usuário não encontrado"; // *** MUDAR ESSA E OUTRAS MENSAGENS DE ERRO AINDA
            } else                            //### Caso contrário, define a varíavel $codigo como o primeira coluna da consulta
            {                               // (usu_codigo).
                $registro = mysqli_fetch_row($res);

                session_start();
                $_SESSION["id"] = $registro[0];
            }
    ?>
</head>

<body>
    <form class="popup" method="POST" action="cadastro2.php"> <!-- action define que a página será chamada por si mesma. -->

        <div class="tit_log">Crie sua conta</div> <!-- ## Formulário das informações pessoais -->
        <div class="insc_cad">
            <p class="txt_log">Nome de usuário</p><br>
            <input class="input_cad" type="text" name="txtNome" required placeholder="seu nome de usuário aqui">
            <p class="txt_log">CPF</p><br>
            <input class="input_cad" type="text" name="txtCpf" onkeyup="formatarCPF(this)" pattern="([0-9]{3}).([0-9]{3}).([0-9]{3})-([0-9]{2})$" required placeholder="seu CPF aqui">
            <p class="txt_log">Data de nascimento</p><br>
            <input class="input_cad" type="date" name="txtData" required>
            <p class="txt_log">Telefone</p><br>
            <input class="input_cad" type="tel" name="txtTelefone" onkeyup="formatarTelefone(this)" required pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})$" placeholder="(12) 34567-8901">

        </div>
        <input class="btnSeta" type="submit" name="btnSeta" value="Cadastrar"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>

        <input hidden name="cadastroStatus" value="cadastro_2">
        <!-- O próximo input alterará o $cadastroStatus para cadastro_2 na próxima chamada da página. -->

    </form>
</body>
<?php
        }
    }
?>