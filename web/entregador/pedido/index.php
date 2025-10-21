<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION["entgd_id"])) {
        header("Location: ./cadastrar");
    }

    $ped_id = $_GET["id"];
    require_once "../../conexao.php";
    require_once "pedidoInfo.php";
    $pedido = pedidoInfo($conexao, $ped_id);

    echo $_SESSION["entgd_id"];
    echo $ped_id;
    ?>
</head>



<body>

    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="ent_text" src="../../assets\images\ent_img\entregadores.png" alt="entregador">
            </a>
        </div>
        <div class="icons">
            <a class="icon" href="../"><i class="fa-solid fa-house fa-2x  "></i></a> <!--casa-->
            <a class="icon" href="../perfil/"><img class="icon_img_perfil" src="../../assets/uploads/profilepictures/<?php echo $_SESSION["entgd_perfil"]; ?>"></a> <!--user-->
        </div>
    </header>

    <p class="title">Pedido #<?php echo $_GET["id"] ?></p>

    <section class="pedidos">
        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira"><?php echo $pedido[0]["cos_nome"]; ?></p>
                <p class="endereco"><?php echo $pedido[0]["cos_rua"] . ", " . $pedido[0]["cos_numero"]; ?></p>
            </div>
            <span class="status">Valor</span>
        </div>

        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira"><?php echo $pedido[0]["cli_nome"]; ?></p>
                <p class="endereco"><?php echo $pedido[0]["end_rua"] . ", " . $pedido[0]["end_numero"]; ?></p>
            </div>

        </div>
        <form action="processarPedido.php" method="POST">
            <input name="ped_id" value="<?php echo $ped_id ?>" hidden>
            <input name="entgd_id" value="<?php echo $_SESSION["entgd_id"] ?>" hidden>
            <button class="btn-aceitar">Aceitar Pedido</button>
        </form>

    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img
                        src="../../assets/svg/logo.svg"
                        alt="ZigZag Logo"
                        class="footer-logo" />
                    <p>Conectando talentos e necessidades na arte da costura.</p>
                </div>
                <div class="footer-section">
                    <h3>Links Úteis</h3>
                    <ul>
                        <li><a href="../#sobre">Sobre Nós</a></li>
                        <li><a href="../#contato">Contato</a></li>
                        <li><a href="../">Termos de Uso</a></li>
                        <li><a href="../">Política de Privacidade</a></li>
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
                        <a href="https://www.instagram.com/zigzag_ltda"><img src="../../assets/svg/instagram.svg" alt="Instagram" /></a>
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