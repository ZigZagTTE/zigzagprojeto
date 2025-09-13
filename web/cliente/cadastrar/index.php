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
    <script type="text/javascript" src="cadastrar.js" defer></script>
</head>

<body>
    <form class="popup" method="POST" action="cadastrar.php" enctype="multipart/form-data">

        <div class="tit_cad">Crie sua conta</div>

        <section id="infoDeEntrada">
            <div class="insc_cad">
                <p class="erro_cad" id="erroImagem"></p><br>
                <br>
                <p class="txt_cad">Email</p><br>
                <input class="input_cad" type="email" name="txtEmail" required placeholder="exemplo@email.com"
                    id="txtEmail" onkeyup="testeEmail(this);" onclick="testeEmail(this);">

                <p class="erro_cad" id="erroEmail"></p><br>

                <p class="txt_cad">Senha</p><br>
                <input class="input_cad" type="password" name="txtSenha" required placeholder="crie sua senha*"
                    id="txtSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="testeSenhas(this);"
                    onclick="testeSenhas(this);">

                <p class="desc_cad">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma
                    minúscula e
                    um número. </p><br>

                <p class="erro_cad" id="erroSenha"></p><br>

                <p class="txt_cad">Confirme sua senha</p><br>

                <input class="input_cad" type="password" required placeholder="digite sua senha" id="txtConfirmarSenha"
                    onkeyup="testeSenhas(this);" onclick="testeSenhas(this);">
            </div>
            <br>

            <input class="btnProximo" type="button" onclick="progredirCadastro()" value="→"><br>
            <a class="redireciona_entrar" href="../entrar">Já tenho conta</a>
        </section>

        <section id="infoDeApresentacao">
            <div class="insc_cad">
                <div class="cad_img">
                    <div class="box_img">
                        <img id="preview_img" class="img_pfp"
                            src="../../assets/uploads/profilepictures/default.png" />
                        <div class="input_img">
                            <input type="file" name="arquivoImagem" accept="image/*" id="inputImg"
                                onchange="mudancaDaImagem(event);">
                            <img src="../../assets/images/camera.png" />
                        </div>
                    </div>
                    <p class="desc_cad" id="avisoImg"></p>
                </div>


                <p class="txt_cad">Nome de usuário</p><br>
                <input class="input_cad" type="text" name="txtNome" placeholder="seu nome de usuário aqui" required
                    onkeyup="testeVazio(this);" onclick="testeVazio(this);">

            </div>
            <div class="doisBotoes">
                <input class="btnCompostoUm" type="button" onclick="regredirCadastro()" value="←">

                <input class="btnCompostoDois" type="button" onclick="progredirCadastro()" value="→">
            </div>
        </section>

        <section id="infoPessoais">
            <p class="txt_cad">CPF</p><br>
            <input class="input_cad" type="text" name="txtCpf" pattern="([0-9]{3}).([0-9]{3}).([0-9]{3})-([0-9]{2})$"
                placeholder="seu CPF aqui" required onkeyup="formatarCPF(this);testeVazio(this);"
                onclick="testeVazio(this);">
            <p class="txt_cad">Data de nascimento</p><br>
            <input class="input_cad" type="date" name="txtData" required onkeyup="testeVazio(this);"
                onclick="testeVazio(this);">
            <p class="txt_cad">Telefone</p><br>
            <input class="input_cad" type="tel" name="txtTelefone" pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})$"
                placeholder="(12) 34567-8901" required onkeyup="formatarTelefone(this);testeVazio(this);"
                onclick="testeVazio(this);">

            <div class="doisBotoes">
                <input class="btnCompostoUm" type="button" onclick="regredirCadastro()" value="←">
                <input class="btnCompostoDois" type="submit" name="btnSeta" value="Cadastrar"><br>
            </div>
        </section>
        <p class="erro_cad" id="erroVazio">Todos os campos precisam ser preenchidos</p><br>
    </form>
</body>