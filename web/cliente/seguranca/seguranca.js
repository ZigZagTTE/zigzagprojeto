txtTelefone = document.getElementById('txtTelefone');

txtTelefone.value = formatarTelefone(txtTelefone.value);

txtTelefone.addEventListener("input", function (evento) {
    evento.target.value = formatarTelefone(evento.target.value);
});

function alterarSenha() {
    var inputSenha = document.querySelector('.input');
    inputSenha.forEach((input) => {
        input.disable = !input.disabled;
    });
    var novaSenha = prompt("Digite sua nova senha:");
    if (novaSenha) {
        // Aqui você pode adicionar a lógica para atualizar a senha no servidor
        alert("Senha alterada com sucesso!");
    }
}