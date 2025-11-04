<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZigZag</title>
    <link rel="stylesheet" href="home.css" />
    <link rel="icon" href="../assets/images/MiniLogo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>

    <script src="../../formatacao.js" defer></script>
    <script src="./perfil.js" defer></script>

    <?php session_start();
    if (!isset($_SESSION["cos_id"])) {
        header("Location: ./cadastrar");
    }
    ?>
</head>

<body>
    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../"><img class="logo_header" src="../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="cost_text" src="../assets\images\cost_img\ZigZag.png" alt="cliente">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../"><i class="fa-solid fa-house fa-2x"></i></a>
        <!--casa-->
        <a class="icon" href="pedidos/"><i class="fa-duotone fa-solid fa-clipboard-list fa-2xl" style="--fa-primary-color: #b450f5; --fa-secondary-color: #f5e9db;"></i></a>
        <!--lista de pedidos-->
        <a class="icon" href="perfil/"><img
                class="icon_img_perfil"
                src="../assets/uploads/profilepictures/<?php echo $_SESSION["cos_perfil"]; ?>"
                alt="Foto de perfil" />
        </a>
        <!--user-->
    </header>

    <p class="title">Faça já sua tabela de preços!</p>

    <div class="container_opções_home">
        <!--========================================================================== 
        Primeira linha - Costurar peças
        ==============================================================================-->
        <div class="category-card-costurar">
            <div class="category-icon">
                <img class="category-icon" src="../assets/images/usu_img/maquina.png">
            </div>
            <div class="category-text">
                Costurar minhas<br>peças
            </div>
        </div>
        <div class="carousel-warp-costurar">
            <div class="carousel-section" id="carousel1">
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/agulha.png" alt="Pequenas costuras">
                    <div class="service-info">
                        <p class="service-name">Pequenas costuras</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/ziper.png" alt="Troca de zíper comum">
                    <div class="service-info">
                        <p class="service-name">Troca de zíper comum</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/tecido.png" alt="Troca de zíper invisível">
                    <div class="service-info">
                        <p class="service-name">Troca de zíper invisível</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/camisa.png" alt="Ajuste de barra">
                    <div class="service-info">
                        <p class="service-name">Ajuste de barra</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/calcas.png" alt="Sob medida">
                    <div class="service-info">
                        <p class="service-name">Sob medida</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/vestido.png" alt="Roupas ornamentadas">
                    <div class="service-info">
                        <p class="service-name">Roupas ornamentadas</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/tecido.png" alt="Remendos">
                    <div class="service-info">
                        <p class="service-name">Remendos</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/bordar.png" alt="Bordados">
                    <div class="service-info">
                        <p class="service-name">Bordados</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/patchwork.png" alt="Patchwork">
                    <div class="service-info">
                        <p class="service-name">Patchwork</p>
                    </div>
                </a>
                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/servicos/cabide.png" alt="Criação">
                    <div class="service-info">
                        <p class="service-name">Criação</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="carousel-controls-costurar">
            <button class="carousel-btn left" data-carousel="carousel1" disabled>&lt;</button>
            <button class="carousel-btn right" data-carousel="carousel1">&gt;</button>
        </div>
        <div class="linha">
            <span class="ponto"></span>
            <hr class="linha_hr">
        </div>
        <!--========================================================================== 
        Segunda linha - Criar peças
        ==============================================================================-->
        <div class="category-card-criar">
            <div class="category-icon">
                <img class="category-icon" src="../assets/images/usu_img/cabide.png">
            </div>
            <div class="category-text">
                Criar novas<br>peças
            </div>
        </div>
        <div class="carousel-warp-criar">
            <div class="carousel-section" id="carousel2">

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/camisa.png" alt="Camisa (com botão)">
                    <div class="service-info">
                        <p class="service-name">Camisa (com botão)</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/camiseta.png" alt="Camiseta (sem botão)">
                    <div class="service-info">
                        <p class="service-name">Camiseta (sem botão)</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/casaco.png" alt="Casaco">
                    <div class="service-info">
                        <p class="service-name">Casaco</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/macacao-feminino.png" alt="Macacão">
                    <div class="service-info">
                        <p class="service-name">Macacão</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/calcas.png" alt="Calças">
                    <div class="service-info">
                        <p class="service-name">Calças</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/shorts.png" alt="Shorts">
                    <div class="service-info">
                        <p class="service-name">Shorts</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/bermuda.png" alt="Bermuda">
                    <div class="service-info">
                        <p class="service-name">Bermuda</p>
                    </div>

                </a>

                <a href="precos/" class="service-card">
                    <img class="service-image" src="../assets/images/usu_img/pecas/vestido.png" alt="Vestido">
                    <div class="service-info">
                        <p class="service-name">Vestido</p>
                    </div>

                </a>

            </div>
        </div>
        <div class="carousel-controls-criar">
            <button class="carousel-btn left" data-carousel="carousel2" disabled>&lt;</button>
            <button class="carousel-btn right" data-carousel="carousel2">&gt;</button>
        </div>
    </div>
    </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img
                        src="../assets/svg/logo.svg"
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
                        <a href="#"><img src="../assets/svg/facebook.svg" alt="Facebook" /></a>
                        <a href="https://www.instagram.com/zigzag_ltda"><img src="../assets/svg/instagram.svg" alt="Instagram" /></a>
                        <a href="#"><img src="../assets/svg/whatsapp.svg" alt="WhatsApp" /></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 ZigZag. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Função para inicializar o carousel
        function initCarousel(carouselId) {
            const carousel = document.getElementById(carouselId);
            const cards = carousel.querySelectorAll('.service-card');
            const leftBtn = document.querySelector(`[data-carousel="${carouselId}"].left`);
            const rightBtn = document.querySelector(`[data-carousel="${carouselId}"].right`);

            let currentIndex = 0;

            // Função para calcular a largura total de um card (incluindo gap)
            function getCardWidth() {
                if (cards.length === 0) return 0;
                const card = cards[0];
                const cardStyle = window.getComputedStyle(card);
                const cardWidth = card.offsetWidth;
                const gap = parseInt(window.getComputedStyle(carousel).gap) || 20;
                return cardWidth + gap;
            }

            // Função para atualizar a posição do carousel
            function updateCarousel() {
                const cardWidth = getCardWidth();
                carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;

                // Atualizar estado dos botões
                leftBtn.disabled = currentIndex === 0;
                rightBtn.disabled = currentIndex >= cards.length - 1;
            }

            // Event listener para botão esquerdo
            leftBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            // Event listener para botão direito
            rightBtn.addEventListener('click', () => {
                if (currentIndex < cards.length - 1) {
                    currentIndex++;
                    updateCarousel();
                }
            });

            // Recalcular quando a janela for redimensionada
            window.addEventListener('resize', () => {
                updateCarousel();
            });

            // Inicializar estado dos botões
            updateCarousel();
        }

        // Inicializar todos os carousels quando a página carregar
        document.addEventListener('DOMContentLoaded', () => {
            // Aguardar um pouco para garantir que todos os elementos estejam renderizados
            setTimeout(() => {
                initCarousel('carousel1');
                initCarousel('carousel2');
            }, 100);
        });
    </script>

</body>

</html>