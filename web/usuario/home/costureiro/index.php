<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZigZag</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../design/images/MiniLogo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="top">
        <a href="../index.html"><img class="logo_header" src="../design/svg/logo.svg" width="90" height="90"
                alt="Logo ZigZag"></a>
        <p class="zigzag_txt">igzag</p>
        <nav class="nav_header">
            <div class="buttons_home">
                <div class="search-container">
                    <div class="search-box">
                        <img src="../design/svg/search.svg" alt="Buscar" class="search-icon">
                        <input type="text" placeholder="Busque costureiras e faça seu orçamento!" class="search-input">
                    </div>
                </div>
            </div>
        </nav>
        <a class="icon" href="../index.html"><i class="fa-solid fa-house fa-2x  "></i></a> <!--casa-->
        <a class="icon" href="home-costureira.php"><i class="fa-solid fa-cart-shopping fa-2x"></i></a> <!--carrinho-->
        <a class="icon" href="index.html"><i class="fa-solid fa-circle-user fa-2x"></i></a> <!--user-->
    </header>

    <p class="title">Faça já seu pedido em costureiras próximas!</p>

    <div class="container_opções_home">
        <!--========================================================================== 
        Primeira linha - Costurar peças
        ==============================================================================-->
        <div class="category-card-costurar">
            <div class="category-icon">
                <img class="category-icon" src="../design/images/usu_img/maquina.png">
            </div>
            <div class="category-text">
                Costurar minhas<br>peças
            </div>
        </div>
        <div class="carousel-warp-costurar">
            <div class="carousel-section" id="carousel1">
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura Express</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Ateliê Elegância</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Mãos de Ouro</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura Premium</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Ateliê Moda & Estilo</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura Rápida</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
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
                <img class="category-icon" src="../design/images/usu_img/cabide.png">
            </div>
            <div class="category-text">
                Criar novas<br>peças
            </div>
        </div>
        <div class="carousel-warp-criar">
            <div class="carousel-section" id="carousel2">
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Ateliê da Ana</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura & Criação</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Ateliê Perfeição</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura Artesanal</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Ateliê Fashion</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
                    </div>
                </a>
                <a href="home-cliente-loja.php" class="store-card">
                    <img class="store-image" src="">
                    <div class="store-info">
                        <p class="store-name">Costura Profissional</p>
                        <div class="store-rating">
                            <span class="star">★</span>
                            <span class="rating-text">5,0 • 2.5km</span>
                            <p class="store-details">
                                Entrega rápida<br>
                                Aberto • Fecha 18h
                            </p>
                        </div>
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


    <script>
        // Função para inicializar o carousel
        function initCarousel(carouselId) {
            const carousel = document.getElementById(carouselId);
            const cards = carousel.querySelectorAll('.store-card');
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