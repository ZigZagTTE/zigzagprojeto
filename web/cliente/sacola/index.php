<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="carrinho.css" />
  <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
  <?php

  require_once "../../conexao.php";
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
      <a href="../../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
          alt="Logo ZigZag">
        <p class="zigzag_txt">igzag</p>
        <img class="cli_text" src="../../assets/images/usu_img/ZigZag.png" alt="cliente">
      </a>
    </div>
    <nav class="nav_header">
      <div class="buttons_home"></div>
    </nav>
    <a class="icon" href="../index.php"><i class="fa-solid fa-house fa-2x"></i></a>
    <!--casa-->
    <a class="icon" href="../sacola/"><i class="fa-solid fa-bag-shopping fa-2x"></i>
    </a>
    <!--carrinho-->
    <a class="icon" href="../perfil/"><img class="icon_img_perfil"
        src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>" alt="Foto de perfil" />
    </a>
    <!--user-->
  </header>

  <!-- INFORMACOES -->

  <section class="secoes">

    <div class="subtitulo_secoes">
      <img src="../../assets/images/usu_img/costureira.png" alt="Costureira" class="img_costureira">
      <p class="costureira">Costureira</p>
      <p class="endereco">Endereço</p>

    </div>
    <div class="carrinho">
      <div class="peca">
        <input type="checkbox" class="checkbox_peca">
        <img src="../../assets/images/usu_img/peca.png" alt="Peça" class="img_peca">
        <p class="txt_peca">Peça</p>
        <p class="txt_desc">Descrição da peça</p>

      </div>

      <div class="descricao">
        <input class="desc" name="txtArea" type="textarea" placeholder="Deixe um recado para o entregador">
        
        <div class="info">
          <p>Soma:</p>
          <p>Taxa de entrega (15%):</p>
          <p>Custo total:</p>
        </div>

        <div class="valores">
          <p>R$00,00</p>
          <p>R$00,00</p>
          <p>R$00,00</p>
        </div>
      </div>

      <a href="pedido/" class="excluir_pedido">
        Cancelar sacola
      </a>
      <a href="pedido/" class="excluir_item">
        Excluir itens
      </a>
      <a href="pedido/" class="pedido">
        Fazer pedido
      </a>
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
            <li>WhatsApp: (12) 99656-5618</li>
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