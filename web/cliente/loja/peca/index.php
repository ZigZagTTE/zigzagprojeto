<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="peca.css">
    <link rel="icon" href="../../../assets/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
    <?php
    session_start();

    require_once "../../../conexao.php";
    require_once "../../bancoCliente.php";

    $idCostureira = $_GET['cos'];
    $idServico = $_GET['ser'];

    $infoCostureira = buscarCostureira($conexao, $idCostureira);
    $listaDeCatalogosDoServico = buscarCatalgosDaCostureiraPorServico($conexao, $idCostureira, $idServico);
    ?>
</head>

<body>

    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../../"><img class="logo_header" src="../../../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="cli_text" src="../../../assets\images\usu_img\ZigZag.png" alt="costureiro">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../../"><i class="fa-solid fa-house fa-2x"></i>
        </a>
        <!--casa-->
        <a class="icon" href="../../carrinho/"><i class="fa-solid fa-cart-shopping fa-2x"></i>
        </a>
        <!--carrinho-->
        <a class="icon" href="index.php"><img class="icon_img_perfil"
                src="../../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>"
                alt="Foto de perfil" />
        </a>
        <!--user-->
    </header>

    <div class="info-loja">
        <!-- Header da Loja -->
        <div class="loja-header">
            <img src="../../../assets/uploads/profilepictures/<?php echo $infoCostureira['cos_perfil']; ?>"
                alt="Foto da loja" class="loja-imagem">
            <div class="loja-nome">
                <?php echo $infoCostureira['cos_nome']; ?>
            </div>
            <button class="servico-btn">
                <?php
                $listaDeServicos = ['Pequenas costuras', 'Troca de zíper comum', 'Troca de zíper invisível', 'Ajuste de barra', 'Sob medida', 'Roupas ornamentadas', 'Remendos', 'Bordados', 'Patchwork'];
                echo $listaDeServicos[$idServico - 1];
                ?>
            </button>
        </div>

        <!-- Grid de Serviços -->
        <div class="pecas_grid">
            <?php
            foreach ($listaDeCatalogosDoServico as $catalogo) {
                $imagem = ['camisa.png', 'camiseta.png', 'casaco.png', 'macacao-feminino.png', 'calcas.png', 'shorts.png', 'bermudas.png', 'vestido.png']
                    ?>
                <a class="peca-card" href="./confirmacao?<?php echo 'cat=' . $catalogo['cat_id']; ?>">
                    <div class="peca-icon-container">
                        <img class="peca-icon"
                            src="../../../assets/images/usu_img/pecas/<?php echo $imagem[$catalogo['pec_id'] - 1]; ?>"
                            alt="Imagem">
                    </div>
                    <div class="peca-info">
                        <p class="nome"><?php echo $catalogo['pec_nome']; ?></p>
                        <br>
                        <p class="descricao"><?php echo $catalogo['cat_descricao']; ?></p>
                    </div>
                    <div class="peca-valor">R$ <?php echo $catalogo['cat_valor']; ?></div>
                </a>
            <?php } ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img src="../../../assets/svg/logo.svg" alt="ZigZag Logo" class="footer-logo" />
                    <p>Conectando talentos e necessidades na arte da costura.</p>
                </div>
                <div class="footer-section">
                    <h3>Links Úteis</h3>
                    <ul>
                        <li><a href="../../#sobre">Sobre Nós</a></li>
                        <li><a href="../../#contato">Contato</a></li>
                        <li><a href="../../">Termos de Uso</a></li>
                        <li><a href="../../">Política de Privacidade</a></li>
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
                        <a href="#"><img src="../../../assets/svg/facebook.svg" alt="Facebook" /></a>
                        <a href="https://www.instagram.com/zigzag_ltda"><img src="../../../assets/svg/instagram.svg"
                                alt="Instagram" /></a>
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