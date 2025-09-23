<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../assets/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../"><img class="logo_header" src="../assets/svg/logo.svg" width="90" height="90"
                    alt="Logo ZigZag">
                <p class="zigzag_txt">igzag</p>
                <img class="ent_text" src="../assets\images\ent_img\entregadores.png" alt="costureiro">
            </a>
        </div>

        <a class="icon" href="../"><i class="fa-solid fa-house fa-2x  "></i></a> <!--casa-->
        <a class="icon" href="../costureiro"><i class="fa-solid fa-cart-shopping fa-2x"></i></a> <!--carrinho-->
        <a class="icon" href="perfil/"><i class="fa-solid fa-circle-user fa-2x"></i></a> <!--user-->
    </header>

    <p class="title">Pedidos disponíveis para entrega</p>

    <section class="pedidos">
        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira">Costureira xxxxx</p>
                <p class="endereco">Endereço</p>

                <p class="costureira">Cliente xxxxx</p>
                <p class="endereco">Endereço</p>
            </div>
        </div>

        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira">Costureira xxxxx</p>
                <p class="endereco">Endereço</p>

                <p class="costureira">Cliente xxxxx</p>
                <p class="endereco">Endereço</p>
            </div>
        </div>

        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira">Costureira xxxxx</p>
                <p class="endereco">Endereço</p>

                <p class="costureira">Cliente xxxxx</p>
                <p class="endereco">Endereço</p>
            </div>
        </div>

        <div class="pedido">
            <img class="pedido-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmo94nluortt0jdP3BhKfb-5lkMuCoCS_olg&s" alt="informações">
            <div class="pedido-info">
                <p class="costureira">Costureira xxxxx</p>
                <p class="endereco">Endereço</p>

                <p class="costureira">Cliente xxxxx</p>
                <p class="endereco">Endereço</p>
            </div>
        </div>

    </section>

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