const btnCancelar = document.getElementById("btnCancelar");

btnCancelar.addEventListener("click", cancelarEntrada)

if (document.getElementById("mostrarSenha")){
    const chkMostrarSenha = document.getElementById("mostrarSenha");

    chkMostrarSenha.addEventListener("click", mostrarSenha);
}

function cancelarEntrada() {
    window.location.href = "./entrar.php?cancelarEntrada=1";
}

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroSenha") === "2") {
    cancelarEntrada();
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