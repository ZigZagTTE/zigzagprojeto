<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ZigZag</title>
  <link rel="stylesheet" href="sacola.css" />
  <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
  <script src="sacola.js" defer></script>
  <?php

  require_once "../../conexao.php";
  require_once "../bancoCliente.php";

  session_start();
  if (!isset($_SESSION['cli_id'])) {
    header("Location: ../entrar");
    exit();
  }

  if (empty($_SESSION['sacola'])) {
    $sacolaVazia = true;
  } else {
    $sacolaVazia = false;
    $cost = buscarInformacoesCatalogo($conexao, $_SESSION['sacola']['idCostureira']);
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
      <?php if ($sacolaVazia) { ?>
        <p class="avisoVazia">Sua sacola está vazia.</p>
      <?php } else { ?>
        <img src="../../assets/uploads/profilepictures/<?php echo $cost['cos_perfil']; ?>" alt="Costureira"
          class="img_costureira">
        <p class="costureira"><?php echo $cost['cos_nome'] ?></p>
        <p class="endereco"><?php echo $cost['cos_rua'] . ", " . $cost['cos_numero']; ?></p>
      <?php } ?>
    </div>
    <form action="processarPedido.php" method="POST" class="carrinho">

      <label class="titulos">Itens</label>
      <?php

      $imagem = ['camisa.png', 'camiseta.png', 'casaco.png', 'macacao-feminino.png', 'calcas.png', 'shorts.png', 'bermudas.png', 'vestido.png'];

      $preco = 0;

      if (empty($_SESSION['sacola'])) {

        ?>
        <div class="peca">
          <div>
            <img src="../../assets/images/usu_img/pecas/camisa.png" alt="Peça" class="img_peca">
          </div>
          <div>
            <p name="txtPeca" class="txt_peca">Que tal fazer alguns pedidos?</p>
            <p name="txtDesc" class="txt_desc">Vá a uma página de costureira e escolha algum catálogo!</p>
          </div>

          <span class="valor">R$ ...</span>
        </div>
        <?php

      } else
        foreach ($_SESSION['sacola']['itens'] as $indice => $item) {

          $info = buscarInformacoesCatalogo($conexao, $item['catalogo']);
          $preco += $info['cat_valor'];
          ?>

          <div class="peca">
            <div>
              <label class="container_mostrar_check">
                <input name="checkIndicesParaApagar[]" type="checkbox" value="<?php echo $indice; ?>">
                <span class="checkmark">
                  <img src="https://uxwing.com/wp-content/themes/uxwing/download/checkmark-cross/cross-white-icon.png">
                </span>
              </label>
              <img src="../../assets/images/usu_img/pecas/<?php echo $imagem[$info['cat_id'] - 1]; ?>" alt="Peça"
                class="img_peca">
            </div>
            <div>
              <p class="txt_peca"><?php echo $info['ser_nome']; ?> de <u><?php echo $info['pec_nome']; ?></u></p>
              <p class="txt_desc"><?php echo $item['descricao']; ?></p>
            </div>

            <span class="valor"><?php echo 'R$ ' . $info['cat_valor']; ?></span>
          </div>


          <?php

        }

      ?>


      <input type="submit" name="excluirItens" value="Excluir itens" class="excluir_item">
      <div class="titulos_desc_valor">
        <label class="titulos">Descrição para entrega</label>
        <label class="titulos">Valores</label>
      </div>
      <div class="descricao">
        <textarea class="desc" name="txtDescricao" placeholder="Deixe um recado para o entregador"></textarea>

        <div class="info">
          <p>Soma:</p>
          <p>Taxa de entrega (15%):</p>
          <p style="font-weight: bold;">Custo total:</p>
        </div>

        <div class="valores">
          <p><?php echo 'R$ ' . $preco; ?></p>
          <p><?php echo 'R$ ' . $taxa = floor(($preco * 0.15) * 100) / 100; ?></p>
          <p style="font-weight: bold;"><?php echo 'R$ ' . $preco + $taxa; ?></p>
        </div>
      </div>

      <label class="titulos">Endereço</label>
      <select name="idEndereco" class="enderecos">
        <?php

        $listaEnderecos = buscarEnderecosDoCliente($conexao, $_SESSION['cli_id']);

        if (empty($listaEnderecos)) {
          echo "<option value=''> Não há endereços para escolher.</option>";
        } else {
          foreach ($listaEnderecos as $endereco) {

            echo "<option value='" . $endereco['end_id'] . "'>";

            echo $endereco['end_rua'] . ", " . $endereco['end_numero'] . ", " . $endereco['end_bairro'] . ", " . $endereco['end_cidade'] . " - " . $endereco['end_estado'] . "</option>\n";
          }
        }


        ?>
      </select>

      <div class="botoes">
        <input type="button" id="btnExcluir" class="excluir_pedido" value="Cancelar sacola">

        <input type="submit" name="fazerPedido" class="pedido" value="Fazer pedido"  <?php echo $sacolaVazia ? "disabled" : "";?>>
      </div>

      <div class="popup" style="display: none;">
        <p class="label">Você realmente deseja cancelar sua sacola?</p>
        <br>
        <div>
          <input id="btnCancelar" type="button" class="btn" value="Cancelar">
          <input type="submit" name="excluirSacola" class="btn-excluir" value="Excluir Sacola">
        </div>
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