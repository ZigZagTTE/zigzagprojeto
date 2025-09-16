const btnCancelar = document.getElementById("btnCancelar");

btnCancelar.addEventListener("click", cancelarEntrada)

function cancelarEntrada(){
    window.location.href = "./entrar.php?cancelarEntrada=1";
}