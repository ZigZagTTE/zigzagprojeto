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


    <script async>
        // ## Código Javascript que formata automaticamente as informações de telefone e CPF

        function formatarTelefone(input) 
        {
        // Remove todos os caracteres não numéricos
        var telefone = input.value.replace(/\D/g, '');

        // Insere os parênteses, espaço e traço nos lugares corretos
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');

        // Atualiza o valor do campo de entrada com o telefone formatado
        input.value = telefone;
        }

        function formatarCPF(input) 
        {
        // Remove todos os caracteres não numéricos
        var telefone = input.value.replace(/\D/g, '');

        // Insere os parênteses, espaço e traço nos lugares corretos
        telefone = telefone.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

        // Atualiza o valor do campo de entrada com o telefone formatado
        input.value = telefone;
        }
    </script>

    <div class="top">
    </div>
</head>

<body>
    <?php

        require_once("conecta.php");

        if (!isset($_GET['erro']))
        {
            $_GET['erro'] = "0";
        }
        if(isset($_POST['txtPagStatus']))
        {
            $pagStatus = $_POST['txtPagStatus'];
        }
        else
        {
            $pagStatus = "cadastro_0";
        }

        if ($pagStatus == "cadastro_0")
        {

    ?>
    <form class="popup" method="POST" action="cadastro.php">

        <div class="tit_log">Crie sua conta</div> <!-- ## Formulário das informações de Login -->
        <div class="insc_cad">

            <br>
            <p class="txt_log">Email</p><br>
            <input class="input_cad" type="email" name="txtEmail" required placeholder="exemplo@email.com">
            
            <p class="txt_log">Senha</p><br>
            <input class="input_cad" type="text" name="txtSenha" required placeholder="crie sua senha*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            
            <p class="desc_log">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma minúscula e um número. </p><br>
            <?php 
                if ($_GET['erro'] == "!senha")
                {
            ?> 
            <p class="desc_log">AS SENHAS PRECISAM SER IGUAIS</p><br>
            <?php        
                }
            ?>

            <p class="txt_log">Confirme sua senha</p><br>
            <input class="input_cad" type="text" name="txtCSenha" required placeholder="digite sua senha">
        </div>

        <br>

        <input class="btnSeta" type="submit" name="btnSeta" value="➜"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>

        <input hidden name="txtPagStatus" value="cadastro_1">
    </form>

    <?php
        }
        

        
        elseif ($pagStatus == 'cadastro_1'){

            $email=$_POST['txtEmail'];
            $senha=$_POST['txtSenha'];
            $confirmsenha=$_POST['txtCSenha'];

            if($senha == $confirmsenha)
            {
                $sql = "INSERT into tbl_usuario"
                ."(usu_email, usu_senha)"
                ."VALUES ('$email', '$senha')";

                getStatusCadastro($conexao, $sql, $pagStatus);

                $sql2 = "SELECT usu_codigo "
                    ."FROM tbl_usuario "
                    ."WHERE usu_email = '$email' AND usu_senha = '$senha';";

                $res = mysqli_query($conexao, $sql2);

                if(mysqli_num_rows($res)==0)
                {
                    echo "Usuário não encontrado"; //MUDAR ESSA E OUTRAS MENSAGENS DE ERRO AINDA
                }
                else
                {
                    $registro = mysqli_fetch_row($res);
                    $codigo = $registro[0];
                }
    ?>

    <form class="popup" method="POST" action="cadastro.php"> <!-- ## Formulário das informações pessoais -->
        <div class="tit_log">Crie sua conta</div>
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
        <input class="btnSeta"  type="submit" name="btnSeta" value="Cadastrar"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>

        <input hidden name="txtPagStatus" value="cadastro_2">
        <input hidden name="txtCodigo" value="<?php echo "$codigo"; ?>">
    </form>

    <?php
            }
            else 
            {
    ?>
    <script>
        window.location.assign("cadastro.php?erro=!senha");
    </script>
    <?php
            }
        }  

        elseif ($pagStatus == "cadastro_2"){

            $codigo = $_POST['txtCodigo'];

            $nome = $_POST['txtNome'];
            $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCpf']);
            $data = preg_replace('/[^0-9]/', '', $_POST['txtData']);
            $tel = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']);

            $sql = "UPDATE tbl_usuario "
                ."SET usu_nome = '$nome', usu_cpf = $cpf, usu_nascimento = '20081211', usu_telefone = $tel "
                ."WHERE usu_codigo = $codigo ;";

            getStatusCadastro($conexao, $sql, $pagStatus)

    ?>
    <script>
         window.location.assign("index.html");
    </script>
    <?php
        }
        

        function getStatusCadastro($conexao, $sql, $pagStatus)
        {

            $res = mysqli_query($conexao, $sql);

            /*if($res)
            {
            echo "<p align='center'>Usuário cadastrado com sucesso!</p>";
            }

            else
            {
            $erro = mysqli_error();

            echo "<p align='center>Erro: $erro </p>";
            }*/
        }

        mysqli_close($conexao);
    ?>
</body>