const btnCancelar = document.getElementById("btnCancelar");
const erroSenha = document.querySelector(".erro_log");

btnCancelar.addEventListener("click", cancelarEntrada);

if (document.getElementById("mostrarSenha")){
    const chkMostrarSenha = document.getElementById("mostrarSenha");

    chkMostrarSenha.addEventListener("click", mostrarSenha);
}



endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroSenha") !== null) {
    erroSenha.innerHTML = "Você errou sua senha,<br> você tem mais " + (3-parseInt(listaDeParametros.get("erroSenha"))).toString() + " tentativa(s).";
    erroSenha.style.display = "inline";
}

function cancelarEntrada() {
    window.location.href = "./entrar.php?cancelarEntrada=1";
}

function mostrarSenha() {
    const txtSenha = document.querySelector(".input_log");

    switch (txtSenha.type){
        case "text":
            txtSenha.type = "password";
            break;
        case "password":
            txtSenha.type = "text";
            break;
    }

}