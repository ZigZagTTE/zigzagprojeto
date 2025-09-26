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

    <script type="text/javascript" src="../../formatacao.js" defer></script>
    <script type="text/javascript" src="cadastrar.js" defer></script>
</head>

<body>
    <form class="popup" method="POST" action="cadastrar.php" enctype="multipart/form-data">

        <div class="logo">
            <img class="img_logo" src="..\..\assets\svg\logo-invertida.svg">
            igZag
        </div>

        <div class="tit_cad">
            Crie sua conta
        </div>

        <section id="infoDeEntrada">
            <div class="insc_cad">
                <p class="erro_cad" id="erroImagem"></p><br>
                <br>
                <p class="txt_cad">Email</p><br>
                <input class="input_cad" id="txtEmail" type="email" name="txtEmail" required
                    placeholder="exemplo@email.com">

                <p class="erro_cad" id="erroEmail"></p><br>

                <p class="txt_cad">Senha</p><br>
                <input class="input_cad" id="txtSenha" type="password" name="txtSenha" required
                    placeholder="crie sua senha*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">

                <label class="container_mostrar_senha">mostrar a senha
                    <input id="mostrarSenha" type="checkbox">
                    <span class="checkmark"></span>
                </label>

                <p class="desc_cad">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma
                    minúscula e
                    um número. </p><br>

                <p class="erro_cad" id="erroSenha"></p><br>

                <p class="txt_cad">Confirme sua senha</p><br>
                <input class="input_cad" id="txtConfirmarSenha" type="password" required placeholder="digite sua senha">
            </div>
            <br>

            <input class="btnProximo" id="btnProximo1" type="button" value="→"><br>
            <a class="redireciona_entrar" href="../entrar">Já tenho conta</a>
        </section>

        <section id="infoDeApresentacao">
            <div class="insc_cad">
                <div class="cad_img">
                    <div class="box_img">
                        <img id="preview_img" class="img_pfp" src="../../assets/uploads/profilepictures/default.png" />
                        <div class="input_img">
                            <input id="inputImagem" type="file" name="arquivoImagem" accept="image/*" id="inputImg">
                            <img src="../../assets/images/camera.png" />
                        </div>
                    </div>
                    <p class="desc_cad" id="avisoImg"></p>
                </div>


                <p class="txt_cad">Nome de usuário</p><br>
                <input class="input_cad" id="txtNome" type="text" name="txtNome" placeholder="seu nome de usuário aqui"
                    required>

            </div>
            <div class="doisBotoes">
                <input class="btnCompostoUm" id="btnRegredir1" type="button" value="←">

                <input class="btnCompostoDois" id="btnProximo2" type="button" value="→">
            </div>
        </section>

        <section id="infoPessoais">
            <p class="txt_cad">CPF</p><br>
            <input class="input_cad" id="txtCPF" type="text" name="txtCPF"
                pattern="([0-9]{3}).([0-9]{3}).([0-9]{3})-([0-9]{2})$" placeholder="seu CPF aqui" required>
            <p class="txt_cad">Data de nascimento</p><br>
            <input class="input_cad" id="txtNascimento" type="date" name="txtData" required>
            <p class="txt_cad">Telefone</p><br>
            <input class="input_cad" id="txtTelefone" type="tel" name="txtTelefone"
                pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})$" placeholder="(12) 34567-8901" required>

            <div class="doisBotoes">
                <input class="btnCompostoUm" id="btnRegredir2" type="button" value="←">

                <input class="btnCompostoDois" id="btnCadastrar" type="submit" value="Cadastrar">
            </div>
        </section>
        <p class="erro_cad" id="erroVazio">Todos os campos precisam ser preenchidos</p><br>
    </form>
</body>