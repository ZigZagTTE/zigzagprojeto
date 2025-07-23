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

    <div class="info-loja">
        <!-- Header da Loja -->
        <div class="loja-header">
            <img src="../design/images/loja-exemplo.jpg" alt="Foto da loja" class="loja-imagem">
            <div class="loja-info">
                <div class="loja-nome">
                    Nome da loja
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="rating-text">5,0</span>
                    </div>
                </div>
                <div class="loja-detalhes">Tempo e frete</div>
            </div>
            <div class="loja-status">
                <div class="status-info">Distância</div>
                <div class="status-info">Aberto/ Fechado</div>
            </div>
        </div>

        <!-- Busca de Serviços -->
        <div class="busca-servicos">
            <div class="busca-container">
                <input type="text" placeholder="Buscar serviços" class="busca-input">
                <img src="../design/svg/search.svg" alt="Buscar" class="busca-icon">
            </div>
        </div>

        <!-- Categorias de Serviços -->
        <div class="categorias-servicos">
            <div class="categoria-buttons">
                <button class="categoria-btn active">
                    <i class="fa-solid fa-scissors categoria-icon"></i>
                    Costurar minhas peças
                </button>
                <button class="categoria-btn">
                    <i class="fa-solid fa-plus categoria-icon"></i>
                    Ajustes e reformas
                </button>
            </div>
        </div>

        <!-- Botões de Ação -->
        <div class="action-buttons">
            <button class="action-btn">
                <i class="fa-solid fa-plus action-icon"></i>
                Criar novas peças
            </button>
            <button class="action-btn">
                <i class="fa-solid fa-scissors action-icon"></i>
                Costurar minhas peças
            </button>
        </div>

        <!-- Grid de Serviços -->
        <div class="servicos-grid">
            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-file-lines servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Pequenas costuras</div>
                    <div class="servico-descricao">Reparos e ajustes simples</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-shirt servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Trocas de zíper</div>
                    <div class="servico-descricao">Substituição de zíperes</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-cut servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Remendos</div>
                    <div class="servico-descricao">Reparos em tecidos danificados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-ruler servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Ajuste de barra</div>
                    <div class="servico-descricao">Ajustes de comprimento</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-file-lines servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Pequenas costuras</div>
                    <div class="servico-descricao">Reparos e ajustes simples</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-shirt servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Trocas de zíper</div>
                    <div class="servico-descricao">Substituição de zíperes</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-cut servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Remendos</div>
                    <div class="servico-descricao">Reparos em tecidos danificados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-file-lines servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Pequenas costuras</div>
                    <div class="servico-descricao">Reparos e ajustes simples</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-shirt servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Trocas de zíper</div>
                    <div class="servico-descricao">Substituição de zíperes</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-cut servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Remendos</div>
                    <div class="servico-descricao">Reparos em tecidos danificados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-ruler servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Ajuste de barra</div>
                    <div class="servico-descricao">Ajustes de comprimento</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <i class="fa-solid fa-file-lines servico-icon"></i>
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Pequenas costuras</div>
                    <div class="servico-descricao">Reparos e ajustes simples</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Funcionalidade dos botões de categoria
        document.querySelectorAll('.categoria-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.categoria-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Funcionalidade dos cards de serviço
        document.querySelectorAll('.servico-card').forEach(card => {
            card.addEventListener('click', function() {
                console.log('Serviço selecionado:', this.querySelector('.servico-nome').textContent);
                // Aqui você pode adicionar a lógica para abrir detalhes do serviço
            });
        });
    </script>
</body>

</html>