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
        <a href="../index.html"><img class="logo_header" src="../design/svg/logo.svg" width="90" height="90" alt="Logo ZigZag"></a>
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
        <a class="icon" href="index.html"><i class="fa-solid fa-cart-shopping fa-2x"></i></a> <!--carrinho-->
        <a class="icon" href="index.html"><i class="fa-solid fa-circle-user fa-2x"></i></a> <!--user-->
    </header>

    <p class="title">Faça já seu pedido em costureiras próximas!</p>

    <!-- Primeira linha - Costurar peças -->
     <div class="container_opções_home">
    <div class="carousel-section">
        <div class="carousel-row">
            <div class="category-card">
                <div class="category-icon">
                    <img class="category-icon" src="../design/images/usu_img/maquina.png">
                </div>
                <div class="category-text">
                    Costurar minhas<br>peças
                </div>
            </div>


            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Costura Criativa</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">4,8 • 1.2km</span>
                        <p class="store-details">
                            Especialista em ajustes<br>
                            Aberto • Fecha 19h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="linha">
        <span class="ponto"></span>
        <hr class="linha_hr">
    </div>
    <!-- Segunda linha - Criar peças -->
    <div class="carousel-section">
        <div class="carousel-row">
            <div class="category-card">
                <div class="category-icon">
                    <img class="category-icon" src="../design/images/usu_img/maquina.png">
                </div>
                <div class="category-text">
                    Criar minhas<br>peças
                </div>
            </div>


            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Costura Criativa</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">4,8 • 1.2km</span>
                        <p class="store-details">
                            Especialista em ajustes<br>
                            Aberto • Fecha 19h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>

            <div class="store-card">
                <img class="store-image" url:"">
                <div class="store-info">
                    <p class="store-name">Ateliê da Maria</p>
                    <div class="store-rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0 • 2.5km</span>
                        <p class="store-details">
                            Entrega rápida<br>
                            Aberto • Fecha 18h
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    </div>
</body>

</html>