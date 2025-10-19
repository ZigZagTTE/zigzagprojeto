<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="../../home.css" />
  <link
    rel="icon"
    href="../../../assets/images/MiniLogo.png"
    type="image/x-icon" />
  <link
    href="https://fonts.googleapis.com/css2?family=Iansui&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script
    src="https://kit.fontawesome.com/a1d8234c07.js"
    crossorigin="anonymous"></script>
  <?php
  session_start();
  if (!isset($_SESSION['cli_id'])) {
    header("Location: ../entrar");
    exit();
  }

  ?>
</head>

<body>
  <!-- HEADER -->
  <header class="top">
    <div class="header_logo">
      <a href="../../"><img class="logo_header" src="../../../assets/svg/logo.svg" width="90" height="90"
          alt="Logo ZigZag">
        <p class="zigzag_txt">igzag</p>
        <img class="ent_text" src="../../../assets/images/usu_img/ZigZag.png" alt="cliente">
      </a>
    </div>
    <nav class="nav_header">
      <div class="buttons_home"></div>
    </nav>
    <a class="icon" href="../../index.php"><i class="fa-solid fa-house fa-2x"></i></a>
    <!--casa-->
    <a class="icon" href="../../carrinho/"><i class="fa-solid fa-cart-shopping fa-2x"></i>
    </a>
    <!--carrinho-->
    <a class="icon" href="../../perfil/"><img
        class="icon_img_perfil"
        src="../../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>"
        alt="Foto de perfil" />
    </a>
    <!--user-->
  </header>

  <!-- INFORMACOES -->

  <p class="title">Pedido #</p>

    <section class="pedidos">
        <div class="pedido">
            <div class="pedido-info">
                <p class="costureira">Costureira</p>
                <p class="endereco">Endereço</p>
                <p class="endereco">Valor</p>
                <span class="status">Horário</span>
            </div>
        </div>

        <div class="etapa">
            <div class="etapa-info">
                <p class="costureira">Etapa</p>
                <span class="costureira">0</span>
            </div>
        </div>
        
        <div class="pedido">
            <div class="pedido-info">
                <p class="costureira">Cliente</p>
                <p class="endereco">Endereço</p>
                <span class="status">Horário</span>
            </div>
        </div>

        <a href="pedido/" class="btn-aceitar">Confirmação de entrega</a>

    </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <img
            src="../../../assets/svg/logo.svg"
            alt="ZigZag Logo"
            class="footer-logo" />
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
            <li>WhatsApp: (12) 99656-5618</li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Redes Sociais</h3>
          <div class="social-links">
            <a href="#"><img src="../../../assets/svg/facebook.svg" alt="Facebook" /></a>
            <a href="https://www.instagram.com/zigzag_ltda"><img src="../../../assets/svg/instagram.svg" alt="Instagram" /></a>
            <a href="#"><img src="../../../assets/svg/whatsapp.svg" alt="WhatsApp" /></a>
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