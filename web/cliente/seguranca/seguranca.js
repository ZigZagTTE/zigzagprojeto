const txtSenhaNova = document.querySelector("#txtSenhaNova");
const txtConfirmaSenhaNova = document.querySelector("#txtConfirmaSenhaNova");

const btnAlterar = document.querySelector("#btnAlterar");
const btnExcluir = document.querySelector("#btnExcluir");
const btnCancelar = document.querySelector("#btnCancelar");
const btnCancelarSenha = document.querySelector("#btnCancelarSenha");
const btnSalvarSenha = document.querySelector(".btn-salvar");

const chkMostrarSenha = document.querySelectorAll("#mostrarSenha");

const erroSenha = document.querySelector(".erro_aviso");

btnAlterar.addEventListener("click", function () {mostrarAlterarSenha(1)})
btnExcluir.addEventListener("click", function () {mostrarPopupDeConfirmacao(1)});
btnCancelar.addEventListener("click", function () {mostrarPopupDeConfirmacao(0)});
btnCancelarSenha.addEventListener("click", function () {mostrarAlterarSenha(0)});

chkMostrarSenha[0].addEventListener("click", function () {mostrarSenha(0)});
chkMostrarSenha[1].addEventListener("click", function () {mostrarSenhaNova()});
chkMostrarSenha[2].addEventListener("click", function () {mostrarSenha(1)});

txtSenhaNova.addEventListener("input", function () {testeSenhas()});
txtConfirmaSenhaNova.addEventListener("input", function () {testeSenhas()});
btnSalvarSenha.addEventListener("click", function () {testeSenhas()});

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroSenha") !== null){
    erroSenha.style.display = "inline";
    erroSenha.innerHTML = "Você errou sua senha, você tem mais " + (3-parseInt(listaDeParametros.get("erroSenha"))).toString() + " tentativa(s).";
}

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
