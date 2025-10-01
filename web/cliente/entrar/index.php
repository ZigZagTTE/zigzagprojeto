<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>ZigZag</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="entrar.css" />
  <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
  <script type="text/javascript" src="entrar.js" defer></script>
  <?php
  session_start();
  if (isset($_SESSION["cli_id"])) {
    header("Location: ../");
  }
  ?>
</head>

<body>
  <form class="popup" method="POST" action="entrar.php">
    <div class="logo">
      <img class="img_logo" src="..\..\assets\svg\logo-invertida.svg">
      igZag
    </div>
    <?php
    if (!isset($_SESSION["cli_nometemp"]) and !isset($_SESSION["cli_emailtemp"]) and !isset($_SESSION["cli_perfiltemp"])) {
      ?>
      <section id="insercao_email">
        <div class="tit_log">
          Entre na sua Conta
        </div>
        <div class="insc_log">
          <p class="txt_log">Email</p> <br>
          <input class="input_log" type="email" name="txtEmail" placeholder="exemplo@email.com">
        </div>
        <?php
        if (isset($_GET["erroEmail"])) {
          ?>
          <p class="erro_log">Email não encontrado</p><br>
          <?php
        }
        ?>

        <input class="btnSeta" type="submit" name="procuraEmail" value="Entrar"><br>
        <a class="cadastro" href="../cadastrar/">Não tenho conta</a><br><br>
      </section>
      <?php
    } else {
      ?>

      <section id="insercao_senha">
        <img id="preview_img" class="img_pfp"
          src="../../assets/uploads/profilepictures/<?php echo $_SESSION['cli_perfiltemp']; ?>">

        <br>
        <p class="desc_log">
          <?php echo $_SESSION['cli_nometemp']; ?>
        </p>
        <p class="desc_log">
          <?php echo $_SESSION['cli_emailtemp']; ?>
        </p>
        <br>


        <p class="txt_log">Senha</p><br>
        <input class="input_log" type="password" name="txtSenha" required>

        <label class="container_mostrar_senha">mostrar a senha
          <input id="mostrarSenha" type="checkbox">
          <span class="checkmark"></span>
        </label>

          <br><p class="erro_log" style="display:none;"></p><br><br>

        <div class="doisBotoes">
          <input class="btnCompostoUm" id="btnCancelar" type="button" value="Cancelar">
          <input class="btnCompostoDois" type="submit" value="Entrar">
        </div>

      </section>
      <?php
    }
    ?>
  </form>
</body>

</html>