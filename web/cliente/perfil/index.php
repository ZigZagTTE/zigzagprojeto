<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="perfil.css" />
  <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
  <script src="../../formatacao.js" defer></script>
  <script src="./perfil.js" defer></script>

  <?php session_start();
  if (!isset($_SESSION["cli_id"])) {
    header("Location: ../cadastrar");
  }
  ?>
</head>

<body>
  <!-- HEADER -->
  <header class="top">
    <a href="../../index.php">
      <img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90" alt="Logo ZigZag" />
    </a>
    <p class="zigzag_txt">igzag</p>
    <nav class="nav_header">
      <div class="buttons_home"></div>
    </nav>
    <a class="icon" href="../index.php"><i class="fa-solid fa-house fa-2x"></i>
    </a>
    <!--casa-->
    <a class="icon" href="index.php"><i class="fa-solid fa-cart-shopping fa-2x"></i>
    </a>
    <!--carrinho-->
    <a class="icon" href="index.php"><img class="icon_img_perfil"
        src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>" alt="Foto de perfil" />
    </a>
    <!--user-->
  </header>

  <!-- INFORMACOES -->

  <section class="secoes">
    <div class="paginas">
      <ul>
        <a href="index.html" class="choice">
          <li autofocus>
            <i class="fa-regular fa-user fa-lg" style="color: #fdf2e6"></i>Meus dados
          </li>
        </a>
        <a href="../seguranca/" class="choice">
          <li>
            <i class="fa-solid fa-shield-halved fa-lg" style="color: #fdf2e6"></i>Segurança
          </li>
        </a>
        <a href="../endereco/" class="choice">
          <li>
            <i class="fa-regular fa-compass fa-lg" style="color: #fdf2e6"></i>Endereço
          </li>
        </a>
      </ul>
    </div>

      <form class="dados" method="post" action="alterarInformacoes.php" enctype="multipart/form-data">
        <div class="titulo_imagem">
          <p class="title">Informações pessoais</p>
          <br>

          <div class="box_img">
            <img class="icon_img_perfil" id="imagemPreview" src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>" alt="Foto de perfil" />
            <div class="input_img">
              <input id="inputImagem" type="file" name="arquivoImagem" accept="image/*" id="inputImg">
              <img src="../../assets/images/camera.png" />
            </div>
            <p class="erro_aviso" id="erroImagem"></p>
          </div>

          <input type="button" class="btn-editar" value="Alterar Informações">
          <input type="submit" name="excluir" class="btn-excluir" value="Excluir Conta">

        </div>
        <div>
          <p class="label">Nome</p>
          <input disabled id="txtNome" name="txtNome" type="text" class="input" value="<?php echo $_SESSION["cli_nome"]; ?>" />

          <p class="label">CPF</p>
          <input disabled id="txtCPF" name="txtCPF" type="text" class="input" value="<?php echo $_SESSION["cli_cpf"]; ?>" />

          <p class="label">Email</p>
          <input disabled id="txtEmail" name="txtEmail" type="email" class="input" value="<?php echo $_SESSION["cli_email"]; ?>" />
          <br>
          <p class="erro_aviso" id="erroEmail"></p>

          <p class="label">Telefone</p>
          <input disabled id="txtTelefone" name="txtTelefone" type="tel" class="input" value="<?php echo $_SESSION["cli_telefone"]; ?>" />

          <p class="label">Data de nascimento</p>
          <input disabled id="txtData" name="txtData" type="date" class="input" value="<?php echo $_SESSION["cli_nascimento"]; ?>" />

          <input type="submit" name="salvar" class="btn-salvar" style="display: none;" value="Salvar alterações">
        </div>
      </form>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <img src="../../assets/svg/logo.svg" alt="ZigZag Logo" class="footer-logo" />
          <p>Conectando talentos e necessidades na arte da costura.</p>
        </div>
        <div class="footer-section">
          <h3>Links Úteis</h3>
          <ul>
            <li><a href="sobre.html">Sobre Nós</a></li>
            <li><a href="contato.html">Contato</a></li>
            <li><a href="termos.html">Termos de Uso</a></li>
            <li><a href="privacidade.html">Política de Privacidade</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Contato</h3>
          <ul>
            <li>Email: contato@zigzag.com.br</li>
            <li>Telefone: (11) 99123-4567</li>
            <li>WhatsApp: (11) 99123-4567</li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Redes Sociais</h3>
          <div class="social-links">
            <a href="#"><img src="../../assets/svg/facebook.svg" alt="Facebook" /></a>
            <a href="https://www.instagram.com/zigzag_ltda"><img src="../../assets/svg/instagram.svg"
                alt="Instagram" /></a>
            <a href="#"><img src="../../assets/svg/whatsapp.svg" alt="WhatsApp" /></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 ZigZag. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

</body>

</html>