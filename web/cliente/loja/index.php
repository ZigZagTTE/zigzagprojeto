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

    if (isset($_GET['costureira'])) {

        $costureiraInfo = buscarCostureira($conexao, $_GET['costureira']);

        $listaDeCatalogos = buscarServicosDaCostureira($conexao, $_GET['costureira']);

        $listaCostureirasCriadoras = buscarListaDeCostureirasCriadoras($conexao);

        $isCriadora = false;
        foreach ($listaCostureirasCriadoras as $costureira) {
            if ($costureira['cos_id'] == $_GET['costureira']) {
                $isCriadora = true;
            }
        }
    } else {
        header('Location: ../');
    }
    ?>
</head>

<body>

    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="cli_text" src="../../assets/images/usu_img/ZigZag.png" alt="cliente">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="./"><i class="fa-solid fa-house fa-2x  "></i></a> <!--casa-->
        <a class="icon" href="../sacola/"><i class="fa-solid fa-bag-shopping fa-2x"></i></a> <!--carrinho-->
        <a class="icon" href="../perfil"><img class="icon_img_perfil"
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
                $imagem = [
                    "agulha.png",
                    "ziper.png",
                    "ziper.png",
                    "calca.png",
                    "calça.png",
                    "vestido.png",
                    "tecido.png",
                    "bordar.png",
                    "patchwork.png"
                ];
                $descricao = [
                    "Reparos e ajustes simples",
                    "Substituição de zíperes fáceis",
                    "Substituição de zíperes complicados",
                    "Ajustes de comprimento",
                    "Ajuste de comprimento personalizado",
                    "Peças complicadas de costura",
                    "Reparos em tecidos danificados",
                    "Decoração de peças",
                    "Cria padrões atravéz de tecidos variados"
                ];

                ?>
                <a class="servico-card"
                    href="peca/<?php echo "?servico=" . $catalogo['ser_id'] . "&costureira=" . $_GET['costureira']; ?>">
                    <div class="servico-icon-container">
                        <img class="servico-icon"
                            src="../../assets/images/usu_img/servicos/<?php echo $imagem[$catalogo['ser_id'] - 1]; ?>"
                            alt="<?php echo $catalogo['ser_nome']; ?>" />
                    </div>
                    <div class="servico-info">
                        <div class="servico-nome"><?php echo $catalogo['ser_nome']; ?></div>
                        <div class="servico-descricao">
                            <?php echo $descricao[$catalogo['ser_id'] - 1]; ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php if ($isCriadora) { ?>
            <form method="POST" action="peca/confirmacao/index.php" id="conteudo2" class="personalizado_grid"
                style="display: none;">
                <h1>Escolha a peça para criar.</h1>
                <select name="catalogo" class="input">
                    <?php

                    $listaDePecasCriacao = buscarCatalogosDaCostureiraPorServico($conexao, $_GET['costureira'], 10);

                    foreach ($listaDePecasCriacao as $peca) {

                        echo "<option value=\"$peca[cat_id]\"";

                        echo ">$peca[pec_nome]</option>\n";
                    }
                    ?>
                </select>

                <h1>Digite a maneira como você quer que sua criação seja feita.</h1>
                <textarea name="txtDescricao" id="descricao" cols="30" rows="10"
                    placeholder="Descreva aqui o seu projeto..."></textarea>
                <input hidden value="10" name="servico">

                <button type="submit">Inserir item na sacola</button>
            </form>
        <?php } ?>
    </div>

    <?php
    if (isset($_SESSION['sacola']) AND (string) $_SESSION['sacola']['idCostureira'] != $_GET['costureira']) {
        ?>
        <div class="popup">
            <p class="label">
                Você pode adicionar apenas itens da mesma costureira na sacola.
            </p>
        </div>
    <?php } ?>

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