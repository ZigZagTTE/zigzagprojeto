var map = L.map('map').setView([-23.027706, -45.562871], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Adiciona um marcador inicial
var marker = L.marker([-23.027706, -45.562871]).addTo(map);

// Função para buscar endereço
function buscarEndereco(endereco) {
    // Remove marcadores anteriores
    map.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
            map.removeLayer(layer);
        }
    });

    // Faz a requisição para a API de geocodificação
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const lat = parseFloat(data[0].lat);
                const lon = parseFloat(data[0].lon);

                // Atualiza o mapa com as novas coordenadas
                map.setView([lat, lon], 16);

                // Adiciona um novo marcador
                marker = L.marker([lat, lon]).addTo(map);

                // Adiciona um popup com o endereço
                marker.bindPopup(data[0].display_name).openPopup();
            } else {
                alert('Endereço não encontrado. Tente novamente.');
            }
        })
        .catch(error => {
            console.error('Erro ao buscar endereço:', error);
            alert('Erro ao buscar endereço. Tente novamente.');
        });
}

// Adiciona evento de busca ao input
document.querySelector('.search-input').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        const endereco = this.value;
        if (endereco.trim() !== '') {
            buscarEndereco(endereco);
        }
    }
});