<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZigZag</title>
    <link rel="stylesheet" href="pedidos.css" />
    <link rel="stylesheet" href="../home.css" />
    <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>

    <script src="../../formatacao.js" defer></script>
    <script src="./perfil.js" defer></script>

    <?php session_start();
    if (!isset($_SESSION["cos_id"])) {
        header("Location: ../cadastrar");
    }

    require_once '../../conexao.php';
    require_once 'bancoPedidos.php';
    $id = $_SESSION["cos_id"];
    $buscarPedidos = buscarPedidos($conexao, $id);

    ?>
</head>

<body>
    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="cost_text" src="../../assets\images\cost_img\ZigZag.png" alt="cliente">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../"><i class="fa-solid fa-house fa-2x"></i></a>
        <!--casa-->
        <a class="icon" href="../pedidos"><i class="fa-duotone fa-solid fa-clipboard-list fa-2xl" style="--fa-primary-color: #b450f5; --fa-secondary-color: #f5e9db;"></i></a>
        <!--lista de pedidos-->
        <a class="icon" href="../perfil/"><img
                class="icon_img_perfil"
                src="../../assets/uploads/profilepictures/<?php echo $_SESSION["cos_perfil"]; ?>"
                alt="Foto de perfil" />
        </a>
        <!--user-->
    </header>

    <div class="container-pedidos">

        <h1>Pedidos disponíveis</h1>

        <div class="grid-pedidos">
            <?php
            foreach ($buscarPedidos as $linha) {
                $exibirPedidos = exibirPedidos($conexao, $linha['ped_id']);
                $soma = 0;
                foreach ($exibirPedidos as $valor) {
                    $soma += $valor['cat_valor'];
                }
            ?>
                <div class="card-pedidos">
                    <div class="pedido-info">
                        <?php echo "<h2>Pedido #" . $exibirPedidos[0]["ped_id"] . "</h2>"; ?>
                        <h3>Nome do cliente:<br><?php echo $exibirPedidos[0]["cli_nome"]; ?> </h3>
                        <p>data do pedido: <br><?php echo $exibirPedidos[0]["ped_data"] . "<br>" . $exibirPedidos[0]["ped_horario"]; ?></p>
                        <p>Valor: R$ <?php echo $soma; ?></p>

                    </div>
                    <div class="pedido-detalhes">
                        <a href="detalhes/?id=<?php echo $exibirPedidos[0]["ped_id"]; ?>">Detalhes</a>
                    </div>
                </div>

            <?php
            }
            if (empty($buscarPedidos)) {
                echo "<p class='no-pedidos'>Nenhum pedido disponível no momento.</p>";
            }
            ?>
        </div>
    </div>
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