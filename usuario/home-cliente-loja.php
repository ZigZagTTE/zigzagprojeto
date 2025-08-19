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
            <img src="https://media.istockphoto.com/id/520137102/pt/foto/desenhar-e-do-conselho.jpg?s=612x612&w=0&k=20&c=eqVmb2JzXO-Y-Rf6NUyhPucFZvT67NcW6qBFxpV-X84=" alt="Foto da loja" class="loja-imagem">
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
                <button id="botao1" onclick="mostrarConteudoUm()" class="categoria-btn">
                    <i class="fa-solid fa-scissors categoria-icon"></i>
                    Ajustes e reformas
                </button>
                <button id="botao2" onclick="mostrarConteudoDois()" class="categoria-btn">
                    <i class="fa-solid fa-plus categoria-icon"></i>
                    Costurar minhas peças
                </button>
            </div>
        </div>




        <!-- Grid de Serviços -->
        <div id="conteudo1" class="servicos_grid active">
            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/agulha.png" alt="Pequenas costuras">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Pequenas costuras</div>
                    <div class="servico-descricao">Reparos e ajustes simples</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/ziper.png" alt="Zíper comum">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Trocas de zíper comum</div>
                    <div class="servico-descricao">Substituição de zíperes fáceis</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/ziper.png" alt="Zíper invisivel">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Trocas de zíper invisível</div>
                    <div class="servico-descricao">Substituição de zíperes complicados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/calca.png" alt="Barras">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Ajuste de barra</div>
                    <div class="servico-descricao">Ajustes de comprimento</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/calça.png" alt="Sob medida">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Sob Medida</div>
                    <div class="servico-descricao">Ajuste de comprimento personalizado</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/vestido.png" alt="Roupas ornamentadas">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Roupas ornamentadas</div>
                    <div class="servico-descricao">Peças complicadas de costura</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/tecido.png" alt="Remendos">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Remendos</div>
                    <div class="servico-descricao">Reparos em tecidos danificados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/bordar.png" alt="Bordados">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Bordados</div>
                    <div class="servico-descricao">Decoração de pecas</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/confeccao.png" alt="Confecção">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Confecção</div>
                    <div class="servico-descricao">Costuras em larga escala</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/patchwork.png" alt="Patchwork">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Patchwork</div>
                    <div class="servico-descricao">Cria padrões atravéz de tecidos variados</div>
                </div>
            </div>

            <div class="servico-card">
                <div class="servico-icon-container">
                    <img class="servico-icon" src="../design/images/usu_img/personalizado.png" alt="Personalizados">
                </div>
                <div class="servico-info">
                    <div class="servico-nome">Personalizado</div>
                    <div class="servico-descricao">Ajustes personalizados de acordo com as ordens do cliente.</div>
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
        <div id="conteudo2" class="personalizado_grid" style="display: none;">

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
        // Função para mostrar o conteúdo baseado no botão clicado
        function mostrarConteudoUm() {
            let conteudoUm = document.querySelector('#conteudo1');
            let conteudoUmPropriedadeDisplay = window.getComputedStyle(conteudoUm).display;

            if (conteudoUmPropriedadeDisplay == "none") {
                document.getElementById("conteudo1").style.display = "grid";
                document.getElementById("conteudo2").style.display = "none";
            }
        }

        function mostrarConteudoDois() {
            let conteudoDois = document.querySelector('#conteudo2');
            let conteudoDoisPropriedadeDisplay = window.getComputedStyle(conteudoDois).display;

            if (conteudoDoisPropriedadeDisplay == "none") {
                document.getElementById("conteudo2").style.display = "grid";
                document.getElementById("conteudo1").style.display = "none";
            }
        }
    </script>
</body>

</html>