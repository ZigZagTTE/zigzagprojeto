<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZigZag</title>
    <link rel="stylesheet" href="endereco.css" />
    <link rel="stylesheet" href="../home.css" />
    <link
        rel="icon"
        href="../../assets/images/MiniLogo.png"
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
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../index.php"><i class="fa-solid fa-house fa-2x"></i></a>
        <!--casa-->
        <a class="icon" href="index.php"><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
        <!--carrinho-->
        <a class="icon" href="../perfil/"><i class="fa-solid fa-circle-user fa-2x"></i></a>
        <!--user-->
    </header>

    <!-- INFORMACOES -->

    <div class="secoes">
        <div class="paginas">
            <ul>
                <a href="../perfil/" class="choice">
                    <li><i class="fa-regular fa-user fa-lg" style="color: #fdf2e6"></i>Meus dados</li>
                </a>
                <a href="../seguranca/" class="choice">
                    <li><i class="fa-solid fa-shield-halved fa-lg" style="color: #fdf2e6;"></i>Segurança</li>
                </a>
                <a href="index.html" class="choice">
                    <li><i class="fa-regular fa-compass fa-lg" style="color: #fdf2e6"></i>Endereço</li>
                </a>
            </ul>
        </div>

        <div class="informacoes">
            <div class="info_enredeco">
                <p class="title">Novo Endereço</p>
                <p class="label">CEP</p>
                <input type="text" class="input" placeholder="xxxxxxx" />
                <p class="label">Cidade</p>
                <input type="text" class="input" placeholder="xxxxxxxx" />
                <p class="label">Bairro</p>
                <input type="text" class="input" placeholder="xxxxxxxx" />
                <p class="label">Rua</p>
                <input
                    type="text"
                    class="input"
                    placeholder="xxxxxxxx" />
            </div>

            <div class="info_endereco_dois">
                <p class="label">Número</p>
                <input type="text" class="input" placeholder="xxxxxxxx" />
                <p class="label">Complemento</p>
                <input type="text" class="input" placeholder="xxxxxxxx" />
                <p class="label">Estado</p>
                <input type="text" class="input" placeholder="xxxxxxxx" />
            </div>

            <button class="btn_salvar">Salvar Endereço</button>
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

    <script>
        function onScrollFadeIn() {
            const elements = document.querySelectorAll(".fade-in");
            const windowBottom = window.innerHeight + window.scrollY;

            elements.forEach((el) => {
                const elementTop = el.getBoundingClientRect().top + window.scrollY;
                if (windowBottom > elementTop + 100) {
                    // 100px antes de aparecer totalmente
                    el.classList.add("visible");
                }
            });
        }

        window.addEventListener("scroll", onScrollFadeIn);
        window.addEventListener("DOMContentLoaded", onScrollFadeIn);
    </script>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add("loaded");
        });
    </script>
    <script src="maps.js"></script>
    <script src="scroll-smoth.js"></script>
</body>

</html>