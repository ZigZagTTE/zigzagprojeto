<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZigZag</title>
    <link rel="stylesheet" href="../endereco.css" />
    <link rel="icon" href="../../../assets/images/MiniLogo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://kit.fontawesome.com/a1d8234c07.js" crossorigin="anonymous"></script>
    <script src="../../../formatacao.js" defer></script>
    <script src="adicionar.js" defer></script>
</head>

<?php
session_start();
if (!isset($_SESSION['cli_id'])) {
    header("Location: ../../login.php");
    exit();
}

?>

<body>
    <!-- HEADER -->
    <header class="top">
        <div class="header_logo">
            <a href="../../index.php">
                <img class="logo_header" src="../../../assets/svg/logo.svg" width="90" height="90" alt="Logo ZigZag" />
                <p class="zigzag_txt">igzag</p>
                <img class="cli_text" src="../../../assets/images/usu_img/ZigZag.png" alt="cliente">
            </a>
        </div>
        <nav class="nav_header">
            <div class="buttons_home"></div>
        </nav>
        <a class="icon" href="../../"><i class="fa-solid fa-house fa-2x"></i></a>
        <!--casa-->
        <a class="icon" href="../../sacola/"><i class="fa-solid fa-bag-shopping fa-2x"></i>
            <!--carrinho-->
            <a class="icon" href="../../perfil/">
                <img class="icon_img_perfil"
                    src="../../../assets/uploads/profilepictures/<?php echo $_SESSION["cli_perfil"]; ?>"
                    alt="Foto de perfil" />
            </a>
            <!--user-->
    </header>

    <!-- INFORMACOES -->

    <?php if (!empty($_GET['mensagem']) && $_GET['mensagem'] == 'sacola') { ?>
        <p class="aviso_sacola">Adicione um endereço e então volte para a sacola</p>
    <?php } ?>
    <div class="secoes">
        <div class="paginas">
            <ul>
                <a href="../../perfil/" class="choice">
                    <li><i class="fa-regular fa-user fa-lg" style="color: #fdf2e6"></i>Meus dados</li>
                </a>
                <a href="../../seguranca/" class="choice">
                    <li><i class="fa-solid fa-shield-halved fa-lg" style="color: #fdf2e6;"></i>Segurança</li>
                </a>
                <a href="../" class="choice">
                    <li><i class="fa-regular fa-compass fa-lg" style="color: #fdf2e6"></i>Endereço</li>
                </a>
            </ul>
        </div>

        <form class="informacoes" method="POST" action="adicionarEndereco.php">
            <p class="title">Endereço Novo</p>
            <div class="endereco_grid">
                <div class="info_endereco">
                    <div class="dado_endereco">
                        <p class="label">Rua</p>
                        <input name="txtRua" type="text" id="rua" class="input" />
                    </div>
                    <div class="dado_endereco">
                        <p class="label">Número</p>
                        <input name="txtNumero" type="text" id="numero" class="input" placeholder="123" />
                    </div>
                    <p class="label">Bairro</p>
                    <input name="txtBairro" type="text" id="bairro" class="input" />
                    <p class="label">Complemento</p>
                    <textarea name="txtComplemento" id="complemento" class="input" rows="4"
                        placeholder="Escreva no máximo 255 caracteres"></textarea>
                </div>

                <div class="info_endereco_dois">
                    <div class="dado_endereco">
                        <p class="label">Cidade</p>
                        <input type="text" name="txtCidade" id="cidade" class="input" />
                    </div>
                    <div class="dado_endereco">
                        <p class="label">Estado</p>
                        <select name="txtEstado" id="estado" class="input">
                            <?php
                            $listaDosEstados = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];

                            for ($i = 0; $i < 27; $i++) {
                                $codigoCategoria = $listaDosEstados[$i];

                                echo "<option value=\"$listaDosEstados[$i]\"";

                                echo ">$listaDosEstados[$i]</option>\n";
                            }
                            ?>
                        </select>
                    </div>
                    <p class="label">CEP</p>
                    <input type="text" name="txtCEP" id="cep" class="input" placeholder="00000-000"
                        pattern="[0-9]{5}-[0-9]{3}" />
                </div>
            </div>
            <p class="erro_aviso"></p>
            <div class="box_botoes">

                <input id="btnSalvar" class="btn-salvar" type="button" name="salvar" value="Salvar endereço">

                <a href="../"><input id="btnExcluir" type="button" class="btn" value="Cancelar"></a>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <img src="../../../assets/svg/logo.svg" alt="ZigZag Logo" class="footer-logo" />
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
                        <a href="#"><img src="../../../assets/svg/facebook.svg" alt="Facebook" /></a>
                        <a href="https://www.instagram.com/zigzag_ltda"><img src="../../../assets/svg/instagram.svg"
                                alt="Instagram" /></a>
                        <a href="#"><img src="../../../assets/svg/whatsapp.svg" alt="WhatsApp" /></a>
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