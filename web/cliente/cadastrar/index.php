<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cadastrar.css">
    <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">

    <script type="text/javascript" src="formatacao.js" defer></script>
    <script type="text/javascript" src="progressao.js" defer></script>
</head>

<body>
    <form class="popup" method="POST" action="cadastrar.php">

        <div class="tit_cad">Crie sua conta</div>

        <section id="infoDeEntrada">
            <div class="insc_cad">
                <br>
                <p class="txt_cad">Email</p><br>
                <input class="input_cad" type="email" name="txtEmail" required placeholder="exemplo@email.com" id="txtEmail" onkeyup="testeEmail(this);" onclick="testeEmail(this);">

                <p class="erro_cad" id="erroEmail"></p><br>

                <p class="txt_cad">Senha</p><br>
                <input class="input_cad" type="password" name="txtSenha" required placeholder="crie sua senha*"
                    id="txtSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="testeSenhas(this);" onclick="testeSenhas(this);">

                <p class="desc_cad">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma
                    minúscula e
                    um número. </p><br>

                <p class="erro_cad" id="erroSenha"></p><br>

                <p class="txt_cad">Confirme sua senha</p><br>

                <input class="input_cad" type="password" required
                    placeholder="digite sua senha" id="txtConfirmarSenha" onkeyup="testeSenhas(this);" onclick="testeSenhas(this);">

                <p class="erro_cad" id="erroVazioUm">Todos os campos precisam ser preenchidos</p><br>
            </div>
            <br>

            <input class="btnProximo" type="button" onclick="progredirCadastro()" value="→"><br>
            <a class="cadastro" href="../entrar">Já tenho conta</a>
        </section>

        <section id="infoPessoais">
            <div class="insc_cad">
                <p class="txt_cad">Nome de usuário</p><br>
                <input class="input_cad" type="text" name="txtNome" placeholder="seu nome de usuário aqui" required onkeyup="testeVazio(this);" onclick="testeVazio(this);">
                <p class="txt_cad">CPF</p><br>
                <input class="input_cad" type="text" name="txtCpf"
                    pattern="([0-9]{3}).([0-9]{3}).([0-9]{3})-([0-9]{2})$" placeholder="seu CPF aqui" required onkeyup="formatarCPF(this);testeVazio(this);" onclick="testeVazio(this);">
                <p class="txt_cad">Data de nascimento</p><br>
                <input class="input_cad" type="date" name="txtData" required onkeyup="testeVazio(this);" onclick="testeVazio(this);">
                <p class="txt_cad">Telefone</p><br>
                <input class="input_cad" type="tel" name="txtTelefone"
                    pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})$" placeholder="(12) 34567-8901" required onkeyup="formatarTelefone(this);testeVazio(this);" onclick="testeVazio(this);">
                
                    <p class="erro_cad" id="erroVazioDois">Todos os campos precisam ser preenchidos</p><br>
            </div>
            <input class="btnProximo" type="button" onclick="regredirCadastro()" value="←">
            <input class="btnProximo" type="submit" name="btnSeta" value="Cadastrar"><br>
        </section>
    </form>
</body>