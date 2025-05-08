<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="icon" href="desing/images/MiniLogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <div class="top">


    </div>
</head>

<body>
    <form class="popup" method="POST" action="cadastro2.php?arroz=1">
        <div class="tit_log">Crie sua conta</div>
        <div class="insc_cad">
            <br>
            <p class="txt_log">Email</p><br>
            <input class="input_cad" type="email" name="txtEmail" required placeholder="email@email.com">
            <p class="txt_log">Senha</p><br>
            <input class="input_cad" type="password" name="txtSenha" required placeholder="crie sua senha*"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            <p class="desc_log">*Crie uma senha com no mínimo 8 caracteres, havendo uma letra maíuscula, uma minúscula e
                um número. </p><br>
            <p class="txt_log">Confirme sua senha</p><br>
            <input class="input_cad" type="password" name="txtCSenha" required placeholder="digite sua senha">
        </div>
        <br>
        <input class="btnSeta" type="submit" name="btnSeta" value="➜"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>
    </form>
</body>