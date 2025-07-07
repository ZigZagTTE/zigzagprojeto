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

        require_once("verificaUsu.php");

        if (!isset($_GET['erro']))    // Define a variável $_GET 'status' como 0 caso ela seja nula.
        {                               // Variáveis $_GET são armazenadas como texto no link. (http://exemplo.com?variavel=exemplo)
            $_GET['erro'] = null;
        }

        if (isset($_POST['cadastroStatus']))     // Obtem a variável $_POST 'cadastroStatus' caso ela não seja nula
        {                                       // e define $cadStatus com seu valor.    
            $cadStatus = $_POST['cadastroStatus'];
        } else                // Define a variável $_POST 'cadastroStatus' como cadastro_0
        {                   // caso ela seja nula.
            $cadStatus = "cadastro_0";
        }
    ?>
</head>

<body>
    <?php
    //echo $_SESSION["id"];
    //echo $_SESSION["nome"];


    if ($cadStatus == "cadastro_0") //# Etapa 0 => caso $cadStatus = "cadastro_0"
    {                               // - Contém apenas o primeiro formulário.

    ?>
        <form class="popup" method="POST" action="cadastro1.php"> <!-- action define que a página será chamada por si mesma. -->

            <div class="tit_log">Crie sua conta</div> <!-- ## Formulário das informações de Login -->
            <div class="insc_cad">

                <br>
                <p class="txt_log">Email</p><br>
                <input class="input_cad" type="email" name="txtEmail" required placeholder="exemplo@email.com">

                <?php
                if ($_GET['erro'] == "emailUsado")
                {
                ?>
                    <p class="desc_log">ESTE EMAIL JÁ FOI USADO</p><br>
                <?php
                }
                ?>

                <p class="txt_log">Senha</p><br>
                <input class="input_cad" type="password" name="txtSenha" required placeholder="crie sua senha*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                <p class="desc_log">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma minúscula e um número. </p><br>

                <?php
                if ($_GET['erro'] == "senhaDif")
                {
                ?>
                    <p class="desc_log">AS SENHAS PRECISAM SER IGUAIS</p><br>
                <?php
                }
                ?>

                <p class="txt_log">Confirme sua senha</p><br>
                <input class="input_cad" type="password" name="txtCSenha" required placeholder="digite sua senha">
            </div>

            <br>

            <input class="btnSeta" type="submit" name="btnSeta" value="➜"><br>
            <a class="cadastro" href="login.html">Já tenho conta</a>
            <!-- O próximo input alterará o $cadastroStatus para cadastro_1 na próxima chamada da página. -->
            <input hidden name="cadastroStatus" value="cadastro_1">
        </form>
        <?php
    }
        ?>
</body>