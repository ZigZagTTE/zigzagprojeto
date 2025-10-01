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

                <p class="desc_cad">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma
                    minúscula e
                    um número. </p><br>

                <p class="erro_cad" id="erroSenha"></p><br>

                <p class="txt_cad">Confirme sua senha</p><br>
                <input class="input_cad" id="txtConfirmarSenha" type="password" required placeholder="digite sua senha">
                <label class="container_mostrar_senha">mostrar a senha
                    <input id="mostrarSenha" type="checkbox">
                    <span class="checkmark"></span>
                </label>
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
            <p class="txt_cad">CNPJ</p><br>
            <input class="input_cad" id="txtCNPJ" type="text" name="txtCNPJ" pattern="^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$" placeholder="seu CNPJ aqui" />

            <div class="doisBotoes">
                <input class="btnCompostoUm" id="btnRegredir2" type="button" value="←">

                <input class="btnCompostoDois" id="btnProximo3" type="button" value="→">
            </div>
        </section>

        <section id="infoLocalizacao">
            <p class="txt_cad">Nome da rua</p><br>
            <input class="input_cad" id="txtRua" type="text" name="txtRua" placeholder="Nome da rua" required>
            <p class="txt_cad">Bairro</p><br>
            <input class="input_cad" id="txtBairro" type="text" name="txtBairro" required>
            <p class="txt_cad">Numero do local</p><br>
            <input class="input_cad" id="txtNumero" type="text" name="txtNumero" required>
            <p class="txt_cad">Complemento</p><br>
            <input class="input_cad" id="txtComplemento" type="text" name="txtComplemento" required>
            <p class="txt_cad">Cep</p><br>
            <input class="input_cad" id="txtCEP" type="text" name="txtCEP" required>

            <div class="doisBotoes">
                <input class="btnCompostoUm" id="btnRegredir3" type="button" value="←">

                <input class="btnCompostoDois" id="btnCadastrar" type="submit" value="Cadastrar">
            </div>
        </section>

        <p class="erro_cad" id="erroVazio">Todos os campos precisam ser preenchidos</p><br>
    </form>
</body>