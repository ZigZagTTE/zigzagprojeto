const btnCancelar = document.getElementById("btnCancelar");

btnCancelar.addEventListener("click", cancelarEntrada)

function cancelarEntrada() {
    window.location.href = "./entrar.php?cancelarEntrada=1";
}

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroSenha") === "2") {
    cancelarEntrada();
}