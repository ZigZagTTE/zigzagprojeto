// =============================================================================
// CONFIGURAÇÃO INICIAL DO MAPA
// =============================================================================

// Inicializa o mapa com visualização centrada em São José dos Campos
const map = L.map('map', {
    zoomControl: true,
    attributionControl: true,
    minZoom: 10,
    maxZoom: 18
}).setView([-23.027706, -45.562871], 13);

// Adiciona camada do mapa com estilo moderno
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap',
    maxZoom: 19
}).addTo(map);

// =============================================================================
// ESTILOS PERSONALIZADOS
// =============================================================================

const estilo = document.createElement('style');
estilo.textContent = `
    /* Animação de pulso para marcador principal */
    @keyframes pulse {
        0%, 100% { 
            transform: scale(1);
            opacity: 1;
        }
        50% { 
            transform: scale(1.1);
            opacity: 0.8;
        }
    }
    
    /* Estilo dos popups */
    .leaflet-popup-content-wrapper {
        background: linear-gradient(135deg, #b450f5 0%, #d89ffd 100%);
        color: white;
        border-radius: 15px;
        padding: 12px;
        font-family: 'Iansui', sans-serif;
        box-shadow: 0 4px 15px rgba(180, 80, 245, 0.4);
    }
    
    .leaflet-popup-tip {
        background: linear-gradient(135deg, #b450f5 0%, #d89ffd 100%);
    }
    
    .leaflet-popup-close-button {
        color: white !important;
        font-size: 22px !important;
        font-weight: bold;
    }
    
    .leaflet-popup-close-button:hover {
        color: #f5e9db !important;
    }
    
    /* Estilo do controle de zoom */
    .leaflet-control-zoom {
        border: none !important;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2) !important;
        border-radius: 8px !important;
        overflow: hidden;
    }
    
    .leaflet-control-zoom a {
        background-color: #b450f5 !important;
        color: white !important;
        border: none !important;
        font-size: 18px !important;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
    .leaflet-control-zoom a:hover {
        background-color: #d89ffd !important;
        transform: scale(1.05);
    }
    
    /* Estilo para botão no popup */
    .btn-perfil {
        background-color: white;
        color: #b450f5;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: bold;
        font-size: 13px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }
    
    .btn-perfil:hover {
        background-color: #f5e9db;
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    
    /* Label de local pesquisado */
    .label-local {
        background-color: #303030;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0,0,0,0.3);
        border: 2px solid #b450f5;
        text-align: center;
        white-space: nowrap;
        max-width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
`;
document.head.appendChild(estilo);

// =============================================================================
// ÍCONES PERSONALIZADOS
// =============================================================================

// Ícone para costureiras (marcador roxo padrão)
const iconeCostureira = L.divIcon({
    className: 'marcador-costureira',
    html: `
        <div style="
            background-color: #b450f5;
            width: 32px;
            height: 32px;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            border: 3px solid white;
            box-shadow: 0 4px 12px rgba(180, 80, 245, 0.5);
            position: relative;
        ">
            <div style="
                width: 12px;
                height: 12px;
                background-color: white;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            "></div>
        </div>
    `,
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32]
});

// Ícone para local pesquisado (marcador com animação)
const iconeLocalPesquisado = L.divIcon({
    className: 'marcador-destaque',
    html: `
        <div style="
            background-color: #edbd44;
            width: 40px;
            height: 40px;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            border: 4px solid white;
            box-shadow: 0 6px 18px rgba(237, 189, 68, 0.6);
            animation: pulse 2s infinite;
            position: relative;
        ">
            <div style="
                width: 16px;
                height: 16px;
                background-color: white;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            "></div>
        </div>
    `,
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -40]
});

// =============================================================================
// GERENCIAMENTO DE MARCADORES
// =============================================================================

let marcadores = [];
let markerLocalPesquisado = null;
let labelLocal = null;

// Função para limpar todos os marcadores
function limparMarcadores() {
    marcadores.forEach(marker => map.removeLayer(marker));
    marcadores = [];

    if (markerLocalPesquisado) {
        map.removeLayer(markerLocalPesquisado);
        markerLocalPesquisado = null;
    }

    if (labelLocal) {
        map.removeLayer(labelLocal);
        labelLocal = null;
    }
}

// =============================================================================
// DADOS DE COSTUREIRAS (SIMULAÇÃO)
// =============================================================================

const dadosCostureiras = [
    {
        nome: 'Maria Silva',
        avaliacao: 4.8,
        especialidade: 'Ajustes e Reformas',
        experiencia: '15 anos',
        preco: 'R$ 30-80'
    },
    {
        nome: 'Ana Santos',
        avaliacao: 4.9,
        especialidade: 'Costura sob Medida',
        experiencia: '20 anos',
        preco: 'R$ 50-150'
    },
    {
        nome: 'Carla Oliveira',
        avaliacao: 4.7,
        especialidade: 'Consertos Rápidos',
        experiencia: '10 anos',
        preco: 'R$ 25-60'
    },
    {
        nome: 'Júlia Costa',
        avaliacao: 5.0,
        especialidade: 'Roupas Personalizadas',
        experiencia: '18 anos',
        preco: 'R$ 80-200'
    },
    {
        nome: 'Beatriz Lima',
        avaliacao: 4.6,
        especialidade: 'Bordados e Ajustes',
        experiencia: '12 anos',
        preco: 'R$ 35-90'
    },
    {
        nome: 'Fernanda Rocha',
        avaliacao: 4.9,
        especialidade: 'Alta Costura',
        experiencia: '25 anos',
        preco: 'R$ 100-300'
    },
    {
        nome: 'Patricia Mendes',
        avaliacao: 4.5,
        especialidade: 'Consertos Gerais',
        experiencia: '8 anos',
        preco: 'R$ 20-50'
    }
];

// =============================================================================
// FUNÇÕES DE GERAÇÃO DE COSTUREIRAS
// =============================================================================

function gerarCostureirasProximas(lat, lon, quantidade = 5, raio = 0.02) {
    // Embaralha e seleciona costureiras aleatórias
    const costureirasAleatorias = [...dadosCostureiras]
        .sort(() => Math.random() - 0.5)
        .slice(0, quantidade);

    return costureirasAleatorias.map(costureira => {
        // Gera coordenadas próximas ao ponto pesquisado
        const angulo = Math.random() * 2 * Math.PI;
        const distancia = Math.random() * raio;
        const latOffset = distancia * Math.cos(angulo);
        const lonOffset = distancia * Math.sin(angulo);

        return {
            ...costureira,
            lat: lat + latOffset,
            lon: lon + lonOffset
        };
    });
}

function adicionarMarcadoresCostureiras(lat, lon) {
    const costureiras = gerarCostureirasProximas(lat, lon, 7);

    costureiras.forEach((costureira, index) => {
        // Pequeno delay para animação suave
        setTimeout(() => {
            const marker = L.marker(
                [costureira.lat, costureira.lon],
                { icon: iconeCostureira }
            ).addTo(map);

            const estrelas = '⭐'.repeat(Math.floor(costureira.avaliacao));

            const popupContent = `
                <div style="text-align: center; padding: 8px; min-width: 200px;">
                    <div style="font-size: 24px; margin-bottom: 8px;">✂️</div>
                    <div style="font-size: 16px; font-weight: bold; margin-bottom: 5px;">
                        ${costureira.nome}
                    </div>
                    <div style="font-size: 12px; margin-bottom: 8px; opacity: 0.9;">
                        ${costureira.especialidade}
                    </div>
                    <div style="background-color: rgba(255,255,255,0.2); padding: 8px; border-radius: 8px; margin-bottom: 8px;">
                        <div style="font-size: 11px; margin-bottom: 3px;">
                            ${estrelas} ${costureira.avaliacao}
                        </div>
                        <div style="font-size: 11px; margin-bottom: 3px;">
                            📅 ${costureira.experiencia}
                        </div>
                        <div style="font-size: 11px;">
                            💰 ${costureira.preco}
                        </div>
                    </div>
                    <button class="btn-perfil" onclick="verPerfilCostureira('${costureira.nome}')">
                        Ver Perfil Completo
                    </button>
                </div>
            `;

            marker.bindPopup(popupContent, {
                maxWidth: 250,
                className: 'popup-costureira'
            });

            marcadores.push(marker);
        }, index * 100);
    });
}

// =============================================================================
// FUNÇÕES DE BUSCA E NAVEGAÇÃO
// =============================================================================

function buscarEndereco(endereco) {
    if (!endereco || endereco.trim() === '') {
        alert('⚠️ Por favor, digite um endereço para buscar.');
        return;
    }

    const searchInput = document.querySelector('.search-input');
    const searchBox = document.querySelector('.search-box');

    // Feedback visual de carregamento
    searchInput.style.opacity = '0.5';
    searchInput.disabled = true;
    searchBox.style.borderColor = '#edbd44';
    searchInput.placeholder = 'Buscando...';

    // Limpa marcadores anteriores
    limparMarcadores();

    // Busca via API Nominatim
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}&countrycodes=br&limit=1`)
        .then(response => response.json())
        .then(data => {
            // Restaura estado do input
            searchInput.style.opacity = '1';
            searchInput.disabled = false;
            searchBox.style.borderColor = 'var(--roxo-principal)';
            searchInput.placeholder = 'Buscar costureiras próximas...';

            if (data.length > 0) {
                const resultado = data[0];
                const lat = parseFloat(resultado.lat);
                const lon = parseFloat(resultado.lon);

                // Extrai nome do local de forma inteligente
                const nomeCompleto = resultado.display_name;
                const partes = nomeCompleto.split(',');
                let nomeLocal;

                if (partes.length >= 3) {
                    nomeLocal = `${partes[0].trim()}, ${partes[1].trim()}`;
                } else if (partes.length >= 2) {
                    nomeLocal = `${partes[0].trim()}, ${partes[1].trim()}`;
                } else {
                    nomeLocal = partes[0].trim();
                }

                // Adiciona marcador do local pesquisado
                markerLocalPesquisado = L.marker([lat, lon], {
                    icon: iconeLocalPesquisado
                }).addTo(map);

                markerLocalPesquisado.bindPopup(`
                    <div style="text-align: center; padding: 10px;">
                        <div style="font-size: 28px; margin-bottom: 8px;">📍</div>
                        <div style="font-size: 15px; font-weight: bold;">
                            ${nomeLocal}
                        </div>
                        <div style="font-size: 11px; margin-top: 5px; opacity: 0.9;">
                            Local pesquisado
                        </div>
                    </div>
                `).openPopup();

                // Adiciona label permanente com o nome do local
                labelLocal = L.marker([lat, lon], {
                    icon: L.divIcon({
                        className: 'label-local-container',
                        html: `<div class="label-local">${nomeLocal}</div>`,
                        iconSize: [250, 40],
                        iconAnchor: [125, -45]
                    })
                }).addTo(map);

                // Centraliza o mapa
                map.setView([lat, lon], 14, {
                    animate: true,
                    duration: 1
                });

                // Adiciona costureiras após pequeno delay
                setTimeout(() => {
                    adicionarMarcadoresCostureiras(lat, lon);
                }, 500);

                // Limpa o input
                searchInput.value = '';

                console.log(`✅ Local encontrado: ${nomeLocal}`);

            } else {
                alert('❌ Local não encontrado.\n\nTente buscar por:\n• Nome de bairro + cidade\n• Avenida/Rua + cidade\n\nExemplo: "Centro, São Paulo" ou "Avenida Paulista, São Paulo"');
            }
        })
        .catch(error => {
            searchInput.style.opacity = '1';
            searchInput.disabled = false;
            searchBox.style.borderColor = 'var(--roxo-principal)';
            searchInput.placeholder = 'Buscar costureiras próximas...';

            console.error('❌ Erro ao buscar endereço:', error);
            alert('⚠️ Erro ao buscar localização.\n\nVerifique sua conexão com a internet e tente novamente.');
        });
}

// =============================================================================
// EVENTOS DE INTERAÇÃO
// =============================================================================

// Busca ao pressionar Enter
const searchInput = document.querySelector('.search-input');
searchInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        buscarEndereco(this.value);
    }
});

// Busca ao clicar no ícone
const searchIcon = document.querySelector('.search-icon');
searchIcon.addEventListener('click', function () {
    const endereco = searchInput.value;
    if (endereco.trim() !== '') {
        buscarEndereco(endereco);
    } else {
        searchInput.focus();
        searchInput.placeholder = 'Digite um endereço...';
        setTimeout(() => {
            searchInput.placeholder = 'Buscar costureiras próximas...';
        }, 2000);
    }
});

// Foco no input ao clicar na caixa de busca
document.querySelector('.search-box').addEventListener('click', function () {
    searchInput.focus();
});

// =============================================================================
// FUNÇÃO GLOBAL PARA VER PERFIL
// =============================================================================

window.verPerfilCostureira = function (nome) {
    alert(`🔍 Abrindo perfil de ${nome}...\n\n` +
        `Em breve você poderá:\n` +
        `• Ver portfólio completo\n` +
        `• Solicitar orçamento\n` +
        `• Enviar mensagem\n` +
        `• Ver avaliações detalhadas`);
};

// =============================================================================
// INICIALIZAÇÃO - MOSTRA COSTUREIRAS PRÓXIMAS À LOCALIZAÇÃO INICIAL
// =============================================================================

// Adiciona marcador inicial
markerLocalPesquisado = L.marker([-23.027706, -45.562871], {
    icon: iconeLocalPesquisado
}).addTo(map);

markerLocalPesquisado.bindPopup(`
    <div style="text-align: center; padding: 10px;">
        <div style="font-size: 28px; margin-bottom: 8px;">📍</div>
        <div style="font-size: 15px; font-weight: bold;">
            São José dos Campos, SP
        </div>
        <div style="font-size: 11px; margin-top: 5px; opacity: 0.9;">
            Localização inicial
        </div>
    </div>
`);

// Adiciona label inicial
labelLocal = L.marker([-23.027706, -45.562871], {
    icon: L.divIcon({
        className: 'label-local-container',
        html: `<div class="label-local">São José dos Campos, SP</div>`,
        iconSize: [250, 40],
        iconAnchor: [125, -45]
    })
}).addTo(map);

// Adiciona costureiras na localização inicial
setTimeout(() => {
    adicionarMarcadoresCostureiras(-23.027706, -45.562871);
}, 800);

// Mensagem de inicialização
console.log('🧵 ZigZag Maps carregado com sucesso!');
console.log('📍 Localização inicial: São José dos Campos, SP');
console.log('✂️ Digite um endereço para encontrar costureiras próximas!');