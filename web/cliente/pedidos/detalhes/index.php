<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="pedido.css" />
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

  require_once "../../../conexao.php";
  require_once "../pedidoInfo.php";
  session_start();
  if (!isset($_SESSION['cli_id'])) {
    header("Location: ../entrar");
    exit();
  }

  $dados_pedido = pedidoInfo($conexao, $_GET["id"]);

  ?>
</head>

<body>
  <!-- HEADER -->
  <header class="top">
    <div class="header_logo">
      <a href="../"><img class="logo_header" src="../../../assets/svg/logo.svg" width="90" height="90"
          alt="Logo ZigZag">
        <p class="zigzag_txt">igzag</p>
        <img class="cli_text" src="../../../assets/images/usu_img/ZigZag.png" alt="cliente">
      </a>
    </div>
    <nav class="nav_header">
      <div class="buttons_home"></div>
    </nav>
    <a class="icon" href="../../index.php"><i class="fa-solid fa-house fa-2x"></i></a>
    <!--casa-->
    <a class="icon" href="../../sacola"><i class="fa-solid fa-bag-shopping"></i></i>
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

  <p class="title">Pedido #<?php echo $_GET["id"]; ?></p>

    <form action="confirmar.php <?php echo "?id=" . $_GET["id"]; ?>" method="POST" class="pedidos">
        <div class="pedido">
            <div class="pedido-info">
                <p class="costureira"><?php echo $dados_pedido[0]["cos_nome"]; ?></p>
                <p class="endereco"><?php echo $dados_pedido[0]["cos_rua"] . ", " . $dados_pedido[0]["cos_numero"]; ?></p>
                
                <?php 
                $total = 0;
                foreach($dados_pedido as $item){
                    $total += $item["cat_valor"];
                }
            ?>
                <p class="endereco">R$<?php echo $total; ?></p>
            </div>
        </div>

        
        <div class="pedido">
            <div class="pedido-info">
                <p class="costureira"><?php echo $dados_pedido[0]["cli_nome"]; ?></p>
                <p class="endereco"><?php echo $dados_pedido[0]["end_rua"] . ", " . $dados_pedido[0]["end_numero"]; ?></p>
                <span class="status"><?php echo $dados_pedido[0]["ped_horario"]; ?></span>
            </div>
        </div>

        <input type="submit" value="Confirmar entrega" class="btn-aceitar">

    </form>

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