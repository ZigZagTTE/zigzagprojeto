<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="perfil.css" />
  <link rel="stylesheet" href="../home.css" />
  <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
  <script src="../../formatacao.js" defer></script>
  <script src="./perfil.js" defer></script>

  <?php
  session_start();
  require_once "../../conexao.php";
  ?>
</head>

<body>
  <!-- HEADER -->
  <header class="top">
    <div class="header_logo">
      <a href="../../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
          alt="Logo ZigZag">
        <p class="zigzag_txt">igzag</p>
        <img class="cost_text" src="../../assets\images\usu_img\ZigZag.png" alt="costureiro">
      </a>
    </div>
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
        <a href="" class="choice">
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

    <div class="informacoes">

      <form class="dados">

        <div>
          <p class="title">Informações pessoais</p>

          <div class="box_img">
            <img class="icon_img_perfil"
              src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>" alt="Foto de perfil" />
            <div class="input_img">
              <input id="inputImagem" type="file" name="arquivoImagem" accept="image/*" id="inputImg">
              <img src="../../assets/images/camera.png" />
            </div>
          </div>

          <button class="btn-editar">
            Alterar Informações
          </button>

        </div>

        <p class="label">Nome</p>
        <input disabled id="txtNome" type="text" class="input" value="<?php echo $_SESSION["cli_nome"]; ?>" />

        <p class="label">CPF</p>
        <input disabled id="txtCPF" type="text" class="input" value="<?php echo $_SESSION["cli_cpf"]; ?>" />

        <p class="label">Email</p>
        <input disabled id="txtEmail" type="email" class="input" value="<?php echo $_SESSION["cli_email"]; ?>" />

        <p class="label">Telefone</p>
        <input disabled id="txtTelefone" type="tel" class="input" value="<?php echo $_SESSION["cli_telefone"]; ?>" />

        <p class="label">Data de nascimento</p>
        <input disabled id="txtEmail" type="date" class="input" value="<?php echo $_SESSION["cli_nascimento"]; ?>" />

        <input type="submit" name="salvar" class="btn-salvar" style="display: none;" value="Salvar alterações">

        <input type="submit" name="excluir" class="btn-excluir" value="Excluir Conta">
      </form>
    </div>
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