// Inicializa o mapa com uma visualização mais ampla
var map = L.map('map', {
    zoomControl: true,
    attributionControl: false // Remove atribuições para visual mais limpo
}).setView([-23.027706, -45.562871], 13);

// Camada de mapa mais minimalista
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// Ícone personalizado roxo para marcadores
var iconeRoxo = L.divIcon({
    className: 'custom-marker',
    html: `<div style="
        background-color: #8B5CF6;
        width: 30px;
        height: 30px;
        border-radius: 50% 50% 50% 0;
        transform: rotate(-45deg);
        border: 3px solid #fff;
        box-shadow: 0 3px 10px rgba(139, 92, 246, 0.5);
    ">
        <div style="
            width: 10px;
            height: 10px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        "></div>
    </div>`,
    iconSize: [30, 30],
    iconAnchor: [15, 30],
    popupAnchor: [0, -30]
});

// Ícone para o local pesquisado (destaque)
var iconeDestaque = L.divIcon({
    className: 'custom-marker-destaque',
    html: `<div style="
        background-color: #6D28D9;
        width: 40px;
        height: 40px;
        border-radius: 50% 50% 50% 0;
        transform: rotate(-45deg);
        border: 4px solid #fff;
        box-shadow: 0 5px 15px rgba(109, 40, 217, 0.6);
        animation: pulse 2s infinite;
    ">
        <div style="
            width: 14px;
            height: 14px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        "></div>
    </div>`,
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -40]
});

// Adiciona estilo de animação ao documento
var style = document.createElement('style');
style.textContent = `
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    .leaflet-popup-content-wrapper {
        background-color: #8B5CF6;
        color: white;
        border-radius: 12px;
        padding: 8px;
        font-family: 'Iansui', sans-serif;
    }
    .leaflet-popup-tip {
        background-color: #8B5CF6;
    }
    .leaflet-popup-close-button {
        color: white !important;
        font-size: 20px !important;
    }
`;
document.head.appendChild(style);

// Array para armazenar todos os marcadores
var marcadores = [];

// Marcador inicial
var markerInicial = L.marker([-23.027706, -45.562871], { icon: iconeDestaque }).addTo(map);
markerInicial.bindPopup('<b>📍 Localização Inicial</b><br>São José dos Campos').openPopup();
marcadores.push(markerInicial);

// Simula costureiras próximas (em produção, isso viria do banco de dados)
function gerarCostureirasProximas(lat, lon, raio = 0.02) {
    const costureiras = [
        { nome: 'Maria Silva', avaliacao: 4.8, especialidade: 'Ajustes e Reformas' },
        { nome: 'Ana Santos', avaliacao: 4.9, especialidade: 'Costura sob Medida' },
        { nome: 'Carla Oliveira', avaliacao: 4.7, especialidade: 'Consertos Rápidos' },
        { nome: 'Júlia Costa', avaliacao: 5.0, especialidade: 'Roupas Personalizadas' },
        { nome: 'Beatriz Lima', avaliacao: 4.6, especialidade: 'Bordados e Ajustes' }
    ];

    return costureiras.map((costureira, index) => {
        // Gera coordenadas aleatórias próximas ao ponto pesquisado
        const latOffset = (Math.random() - 0.5) * raio;
        const lonOffset = (Math.random() - 0.5) * raio;

        return {
            ...costureira,
            lat: lat + latOffset,
            lon: lon + lonOffset
        };
    });
}

// Função para adicionar marcadores de costureiras
function adicionarCostureiras(lat, lon) {
    const costureiras = gerarCostureirasProximas(lat, lon);

    costureiras.forEach(costureira => {
        const marker = L.marker([costureira.lat, costureira.lon], { icon: iconeRoxo }).addTo(map);

        const popupContent = `
            <div style="text-align: center; padding: 5px;">
                <b>✂️ ${costureira.nome}</b><br>
                <small>${costureira.especialidade}</small><br>
                <span style="color: #FCD34D;">⭐ ${costureira.avaliacao}</span><br>
                <button style="
                    background-color: white;
                    color: #8B5CF6;
                    border: none;
                    padding: 6px 12px;
                    border-radius: 6px;
                    margin-top: 8px;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 12px;
                " onclick="alert('Redirecionando para perfil...')">Ver Perfil</button>
            </div>
        `;

        marker.bindPopup(popupContent);
        marcadores.push(marker);
    });
}

// Adiciona costureiras iniciais
adicionarCostureiras(-23.027706, -45.562871);

// Função para buscar endereço
function buscarEndereco(endereco) {
    // Remove todos os marcadores anteriores
    marcadores.forEach(marker => map.removeLayer(marker));
    marcadores = [];

    // Mostra feedback visual
    const searchInput = document.querySelector('.search-input');
    searchInput.style.opacity = '0.6';
    searchInput.disabled = true;

    // Faz a requisição para a API de geocodificação
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}&limit=1`)
        .then(response => response.json())
        .then(data => {
            searchInput.style.opacity = '1';
            searchInput.disabled = false;

            if (data.length > 0) {
                const lat = parseFloat(data[0].lat);
                const lon = parseFloat(data[0].lon);

                // Atualiza o mapa com as novas coordenadas
                map.setView([lat, lon], 14);

                // Adiciona marcador do local pesquisado
                const markerPrincipal = L.marker([lat, lon], { icon: iconeDestaque }).addTo(map);
                const nomeLocal = data[0].display_name.split(',').slice(0, 2).join(',');
                markerPrincipal.bindPopup(`<b>📍 ${nomeLocal}</b>`).openPopup();
                marcadores.push(markerPrincipal);

                // Adiciona costureiras próximas ao local pesquisado
                setTimeout(() => {
                    adicionarCostureiras(lat, lon);
                }, 300);

            } else {
                alert('❌ Local não encontrado. Tente: "Avenida Paulista, São Paulo" ou "Centro, Rio de Janeiro"');
            }
        })
        .catch(error => {
            searchInput.style.opacity = '1';
            searchInput.disabled = false;
            console.error('Erro ao buscar endereço:', error);
            alert('⚠️ Erro ao buscar local. Verifique sua conexão e tente novamente.');
        });
}

// Adiciona evento de busca ao input
const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        const endereco = this.value;
        if (endereco.trim() !== '') {
            buscarEndereco(endereco);
        } else {
            alert('⚠️ Por favor, digite um endereço ou local para buscar.');
        }
    }
});

// Adiciona evento ao clicar no ícone de busca
document.querySelector('.search-icon').addEventListener('click', function () {
    const endereco = searchInput.value;
    if (endereco.trim() !== '') {
        buscarEndereco(endereco);
    } else {
        searchInput.focus();
    }
});

// Adiciona controles de zoom customizados mais discretos
document.querySelector('.leaflet-control-zoom').style.cssText = `
    border: none !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15) !important;
`;

// Mensagem inicial no console
console.log('🧵 ZigZag Maps carregado com sucesso!');