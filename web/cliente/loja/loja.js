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
                document.getElementById("conteudo2").style.display = "flex";
                document.getElementById("conteudo1").style.display = "none";
            }
        }