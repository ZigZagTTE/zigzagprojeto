<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="precos.css">
    <link rel="icon" href="../../assets/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../../"><img class="logo_header" src="../../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="cost_text" src="../../assets\images\cost_img\ZigZag.png" alt="costureiro">
            </a>
        </div>
        <div class="icon_header">
            <a class="icon" href="../../"><i class="fa-solid fa-house fa-2x  "></i></a> <!--casa-->
            <a class="icon" href="../../costureiro"><i class="fa-solid fa-cart-shopping fa-2x"></i></a> <!--carrinho-->
            <a class="icon" href="../../cliente/cadastrar/"><i class="fa-solid fa-circle-user fa-2x"></i></a> <!--user-->
        </div>
    </header>

    <p class="title">Faça já seu pedido em costureiras próximas!</p>

    <div class="category-card-costurar-atribut">
        <div class="category-icon">
            <img class="category-icon" src="../../assets/images/usu_img/maquina.png">
        </div>
        <div class="category-text">
            Costurar minhas peças
        </div>
    </div>


    <div class="list-precos">
        <ul>
            <li>
                <img src="../../assets/images/usu_img/calca.png" alt="calça">
                <p>Calça</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/vestido.png" alt="calça">
                <p>vestido</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/camisa.png" alt="calça">
                <p>camisa</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/calca.png" alt="calça">
                <p>Calça</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/bone.png" alt="calça">
                <p>bone</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/patchwork.png" alt="calça">
                <p>remendo</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/saia.png" alt="calça">
                <p>saia</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/camisa.png" alt="calça">
                <p>camisa</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/calça.png" alt="calça">
                <p>Calça</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
            <li>
                <img src="../../assets/images/usu_img/bone.png" alt="calça">
                <p>bone</p>
                <div class="valor_list">
                    <p>Valor:</p>
                    <input type="text" placeholder="R$ 00,00">
                </div>
            </li>
        </ul>
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