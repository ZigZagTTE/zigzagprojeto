<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="loja.css">
    <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
    <script defer src="loja.js"></script>
    <?php
    session_start();

    require_once "../bancoCliente.php";
    require_once "../../conexao.php";

    $costureiraInfo = buscarCostureira($conexao, $_GET['cos']);

    $listaDeCatalogos = buscarServicosDaCostureira($conexao, $_GET['cos']);

    $listaCostureirasCriadoras = buscarListaDeCostureirasCriadoras($conexao);

    $isCriadora = false;
    foreach ($listaCostureirasCriadoras as $costureira) {
        if ($costureira['cos_id'] == $_GET['cos']) {
            $isCriadora = true;
        }
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
                <img class="cost_text" src="../../assets\images\usu_img\ZigZag.png" alt="costureiro">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../"><i class="fa-solid fa-house fa-2x"></i>
        </a>
        <!--casa-->
        <a class="icon" href="../carrinho/"><i class="fa-solid fa-cart-shopping fa-2x"></i>
        </a>
        <!--carrinho-->
        <a class="icon" href="index.php"><img class="icon_img_perfil"
                src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>"
                alt="Foto de perfil" />
        </a>
        <!--user-->
    </header>

    <div class="info-loja">
        <!-- Header da Loja -->
        <div class="loja-header">
            <img src="../../assets/uploads/profilepictures/<?php echo $costureiraInfo['cos_perfil']; ?>"
                alt="Foto da loja" class="loja-imagem">
            <div class="loja-info">
                <div class="loja-nome">
                    <?php echo $costureiraInfo['cos_nome']; ?>
                </div>
            </div>
        </div>



        <!-- Busca de Serviços -->

        <div class="busca-servicos">
            <div class="busca-container">
                <input type="text" placeholder="Buscar serviços" class="busca-input">
                <img src="../../assets/svg/search.svg" alt="Buscar" class="busca-icon">
            </div>
        </div>

        <!-- Categorias de Serviços -->
        <div class="categorias-servicos">
            <div class="categoria-buttons">
                <button id="botao1" onclick="mostrarConteudoUm()" class="categoria-btn active">
                    <i class="fa-solid fa-scissors categoria-icon"></i>
                    Ajustes e reformas
                </button>
                <?php if ($isCriadora) { ?>
                    <button id="botao2" onclick="mostrarConteudoDois()" class="categoria-btn">
                        <i class="fa-solid fa-plus categoria-icon"></i>
                        Costurar minhas peças
                    </button>
                <?php } ?>
            </div>
        </div>




        <!-- Grid de Serviços -->
        <div id="conteudo1" class="servicos_grid active">
            <?php
            foreach ($listaDeCatalogos as $catalogo) {
                switch ($catalogo['ser_id']) {
                    case '1':
                        $imagem = "agulha.png";
                        $descricao = "Reparos e ajustes simples";
                        break;
                    case '2':
                        $imagem = "ziper.png";
                        $descricao = "Substituição de zíperes fáceis";
                        break;
                    case '3':
                        $imagem = "ziper.png";
                        $descricao = "Substituição de zíperes complicados";
                        break;
                    case '4':
                        $imagem = "calca.png";
                        $descricao = "Ajustes de comprimento";
                        break;
                    case '5':
                        $imagem = "calça.png";
                        $descricao = "Ajuste de comprimento personalizado";
                        break;
                    case '6':
                        $imagem = "vestido.png";
                        $descricao = "Peças complicadas de costura";
                        break;
                    case '7':
                        $imagem = "tecido.png";
                        $descricao = "Reparos em tecidos danificados";
                        break;
                    case '8':
                        $imagem = "bordar.png";
                        $descricao = "Decoração de peças";
                        break;
                    case '9':
                        $imagem = "patchwork.png";
                        $descricao = "Cria padrões atravéz de tecidos variados";
                        break;
                }
                ?>
                <a class="servico-card" href="peca/<?php echo "?ser=" . $catalogo['ser_id'] . "&cos=" . $_GET['cos']; ?>">
                    <div class="servico-icon-container">
                        <img class="servico-icon" src="../../assets/images/usu_img/<?php echo $imagem; ?>"
                            alt="<?php echo $catalogo['ser_nome']; ?>" />
                    </div>
                    <div class="servico-info">
                        <div class="servico-nome"><?php echo $catalogo['ser_nome']; ?></div>
                        <div class="servico-descricao">
                            <?php echo $descricao; ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php if ($isCriadora) { ?>
            <form method="POST" action="confirmacao/index.php" id="conteudo2" class="personalizado_grid" style="display: none;">
                <h1>Escolha a peça para criar.</h1>
                <select name="peca" class="input">
                    <?php

                    $listaDePecasCriacao = buscarPecasDoServicoDaCostureira($conexao, $_GET['cos'], 10);

                    foreach ($listaDePecasCriacao AS $peca) {

                        echo "<option value=\"$peca[pec_id]\"";

                        echo ">$peca[pec_nome]</option>\n";
                    }
                    ?>
                </select>

                <h1>Digite a maneira como você quer que sua criação seja feita.</h1>
                <textarea name="txtDescricao" id="descricao" cols="30" rows="10"
                    placeholder="Descreva aqui o seu projeto..."></textarea>
                <input hidden value="10" name="servico">
                <input hidden value="<?php echo $_GET['cos'];?>" name="costureira">

                <button type="submit">Inserir item no carrinho</button>
            </form>
        <?php } ?>
    </div>

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