

const btnExcluir = document.querySelector("#btnExcluir");
const btnCancelar = document.querySelector("#btnCancelar");

btnExcluir.addEventListener("click", function () {mostrarPopupDeConfirmacao(1)});
btnCancelar.addEventListener("click", function () {mostrarPopupDeConfirmacao(0)});


function mostrarPopupDeConfirmacao(mostrar) {
    const popup = document.querySelector(".popup");

    switch (mostrar) {
        case 0:
            popup.style.display = "none";
            break;
        case 1:
            popup.style.display = "flex";
            break;
    }
}