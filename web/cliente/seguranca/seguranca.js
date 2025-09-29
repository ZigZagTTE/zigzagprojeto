const btnAlterar = document.querySelector("#btnAlterar");
const btnExcluir = document.querySelector("#btnExcluir");
const btnCancelar = document.querySelector("#btnCancelar");
const btnCancelarSenha = document.querySelector("#btnCancelarSenha");
const chkMostrarSenha = document.querySelectorAll("#mostrarSenha");

btnAlterar.addEventListener("click", function () {mostrarAlterarSenha(1)})
btnExcluir.addEventListener("click", function () {mostrarPopupDeConfirmacao(1)});
btnCancelar.addEventListener("click", function () {mostrarPopupDeConfirmacao(0)});
btnCancelarSenha.addEventListener("click", function () {mostrarAlterarSenha(0)});

chkMostrarSenha[0].addEventListener("click", function () {mostrarSenha(0)});
chkMostrarSenha[1].addEventListener("click", function () {mostrarSenhaNova()});
chkMostrarSenha[2].addEventListener("click", function () {mostrarSenha(1)});

function mostrarAlterarSenha(mostrar) {
    const formulario = document.querySelector(".form_alterar_senha");

    switch (mostrar) {
        case 0:
            formulario.style.display = "none";
            btnAlterar.style.display = "block";
            btnExcluir.style.display = "block";
            break;
        case 1:
            formulario.style.display = "block";
            btnAlterar.style.display = "none";
            btnExcluir.style.display = "none";
            break;
    }
}

function mostrarPopupDeConfirmacao(mostrar) {
    const popup = document.querySelector(".popup");

    switch (mostrar) {
        case 0:
            popup.style.display = "none";
            break;
        case 1:
            popup.style.display = "block";
            break;
    }
}

function mostrarSenha(numero) {
    let txtConfirmaSenha = document.querySelectorAll("#txtConfirmaSenha");

    switch (txtConfirmaSenha[numero].type){
        case "text":
            txtConfirmaSenha[numero].type = "password";
            break;
        case "password":
            txtConfirmaSenha[numero].type = "text";
            break;
    }
}

function mostrarSenhaNova() {
    let txtSenhaNova = document.querySelector("#txtSenhaNova");
    let txtConfirmaSenhaNova = document.querySelector("#txtConfirmaSenhaNova");

    switch (txtSenhaNova.type){
        case "text":
            txtSenhaNova.type = "password";
            txtConfirmaSenhaNova.type = "password";
            break;
        case "password":
            txtSenhaNova.type = "text";
            txtConfirmaSenhaNova.type = "text";
            break;
    }
}
