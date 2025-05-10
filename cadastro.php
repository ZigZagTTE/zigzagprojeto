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

        //# Resumo geral
        // Esta página é dividida em três etapas, cadastro 0, 1 e 2.
        // A variável $_POST 'cadastroStatus' define a etapa atual, essa variável é passada 
        // de etapa a etapa dentro de um input escondido (hidden) no final do formulário.
        // - A etapa 0 recolhe as informações de login da conta;
        // - a etapa 1 insere os dados na tabela e recolhe as informações pessoais;
        // - a etapa 2 atualiza a tabela com estes dados e então redireciona o usuário para index.html.

        //# A fazer:
        // - definir mensagens de erro mySQL (se forem usadas);
        // - testar a página?
        // - implementar php no login;
        // - implementar verificação e configuração de cookies no cadatro, login e possivelmente em todas páginas.

        require_once("conecta.php");

        if (!isset($_GET['status']))    // Define a variável $_GET 'status' como 0 caso ela seja nula.
        {                               // Variáveis $_GET são armazenadas como texto no link. (http://exemplo.com?variavel=exemplo)
            $_GET['status'] = "0";
        }

        if(isset($_POST['cadastroStatus']))     // Obtem a variável $_POST 'cadastroStatus' caso ela não seja nula
        {                                       // e define $cadStatus com seu valor.    
            $cadStatus = $_POST['cadastroStatus'];
        }
        else                // Define a variável $_POST 'cadastroStatus' como cadastro_0
        {                   // caso ela seja nula.
            $cadStatus = "cadastro_0";
        }

        if ($cadStatus == "cadastro_0") //# Etapa 0 => caso $cadStatus = "cadastro_0"
        {                               // - Contém apenas o primeiro formulário.

    ?>
    <form class="popup" method="POST" action="cadastro.php"> <!-- action define que a página será chamada por si mesma. -->

        <div class="tit_log">Crie sua conta</div> <!-- ## Formulário das informações de Login -->
        <div class="insc_cad">

            <br>
            <p class="txt_log">Email</p><br>
            <input class="input_cad" type="email" name="txtEmail" required placeholder="exemplo@email.com">
            
            <p class="txt_log">Senha</p><br>
            <input class="input_cad" type="password" name="txtSenha" required placeholder="crie sua senha*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            
            <p class="desc_log">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma minúscula e um número. </p><br>
            <?php 
                if ($_GET['status'] == "erro!senhaDif") // O erro aparece caso a variável $_GET 'status'
                {                                       // seja "erro!senhaDif", definida após o teste na etapa 1.
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
        

        
        elseif ($cadStatus == 'cadastro_1'){    //# Etapa 1 => caso $cadStatus = "cadastro_1"

            $email=$_POST['txtEmail'];
            $senha=$_POST['txtSenha'];          
            $confirmsenha=$_POST['txtCSenha'];  // -> Obtêm os dados a serem cadastrados + senha de confirmação. 


            if($senha != $confirmsenha) //## Caso as senhas sejam diferentes, redireciona o usuário à mesma página com a variável $_GET status = 'erro!senhaDif'.
            {
    ?>
    <script>
        window.location.assign("cadastro.php?status=erro!senhaDif");
    </script>
    <?php
            }
            else //## Executa o código caso a senha normal seja igual a sua confirmação.
            {
                $sql = "INSERT into tbl_usuario"    // Criação do comando INSERT para inserção dos dados.
                    ."(usu_email, usu_senha)"
                    ."VALUES ('$email', '$senha')";


                executarSQL($conexao, $sql, $cadStatus);    // Executa o código SQL em uma função definida no final da página,
                                                            // o código que mostra os erros está comentado, então não aparecem.

                $sql2 = "SELECT usu_codigo "        // Criação do comando SELECT para obter o código da conta criada.
                    ."FROM tbl_usuario "
                    ."WHERE usu_email = '$email' AND usu_senha = '$senha';";

                $res = mysqli_query($conexao, $sql2);

                if(mysqli_num_rows($res)==0)    //### Caso não haja linhas com as condições, expressa-se o erro.
                {
                    echo "Usuário não encontrado"; // *** MUDAR ESSA E OUTRAS MENSAGENS DE ERRO AINDA
                }
                else                            //### Caso contrário, define a varíavel $codigo como o primeira coluna da consulta
                {                               // (usu_codigo).
                    $registro = mysqli_fetch_row($res);
                    $codigo = $registro[0];
                }
    ?>

    <form class="popup" method="POST" action="cadastro.php"> <!-- action define que a página será chamada por si mesma. -->

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
        <input class="btnSeta"  type="submit" name="btnSeta" value="Cadastrar"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>

        <input hidden name="cadastroStatus" value="cadastro_2">
        <!-- O próximo input alterará o $cadastroStatus para cadastro_2 na próxima chamada da página. -->

        <input hidden name="usuCodigo" value="<?php echo "$codigo"; ?>">
        <!-- Define uma variável $_POST 'usuCodigo' como o valor do código da nova conta criada armazenado em $codigo. -->
    </form>

    <?php
            }
        }  

        elseif ($cadStatus == "cadastro_2"){    //# Etapa 2 => caso $cadStatus = "cadastro_2"

            $codigo = $_POST['usuCodigo'];  // Obtem o código armazenado na variável $_POST.

            $nome = $_POST['txtNome'];  
            $cpf = preg_replace('/[^0-9]/', '', $_POST['txtCpf']);
            $data = preg_replace('/[^0-9]/', '', $_POST['txtData']);    // Obtêm as informações a serem atualizadas.
            $tel = preg_replace('/[^0-9]/', '', $_POST['txtTelefone']); // A função preg_replace substitue caracteres
                                                                        // não numéricos por nada (remove-os).

            $sql = "UPDATE tbl_usuario "    // Criação do comando UPDATE para atualizar a tabela.
                ."SET usu_nome = '$nome', usu_cpf = $cpf, usu_nascimento = '20081211', usu_telefone = $tel "
                ."WHERE usu_codigo = $codigo ;";

            executarSQL($conexao, $sql, $cadStatus);    // Execução do comando SQL.

    ?>
    <script>
        // Código javascript para direcionar para a página index.html após execução do código php.
        window.location.assign("index.html");
    </script>
    <?php
        }
        

        function executarSQL($conexao, $sql, $cadStatus)    // Definição da função executarSQL()
        {

            $res = mysqli_query($conexao, $sql);


            // *** MUDAR ESSA E OUTRAS MENSAGENS DE ERRO AINDA
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

        mysqli_close($conexao); // Encerramento da conexão
    ?>
</body>