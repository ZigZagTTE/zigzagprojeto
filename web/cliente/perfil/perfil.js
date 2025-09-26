//Inputs
const btnAlterar = document.querySelector("#btnAlterar");
const btnExcluir = document.querySelector("#btnExcluir");
const btnCancelar = document.querySelector("#btnCancelar");

const chkMostrarSenha = document.getElementById("mostrarSenha");
const txtCPF = document.getElementById("txtCPF");
const txtTelefone = document.getElementById("txtTelefone");
const inputImagem = document.getElementById("inputImagem");

//Preview da Imagem
const imagemDePreview = document.getElementById("imagemPreview");

//Erros
const erroPerfil = document.getElementById("erroPerfil");
const erroEmail = document.getElementById("erroEmail");
const erro = document.getElementById("erro");


txtCPF.value = formatarCPF(txtCPF.value);
txtTelefone.value = formatarTelefone(txtTelefone.value);


endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroPerfil") === "1") {
    erroPerfil.style.display = "inline";
    erroPerfil.innerHTML = "Sua imagem é maior do que 15 MB";
} else if (listaDeParametros.get("erroPerfil") === "2") {
    erroPerfil.style.display = "inline";
    erroPerfil.innerHTML = "A senha está incorreta";
}
if (listaDeParametros.get("erroEmail") === "1") {
    erroEmail.style.display = "inline";
    erroEmail.innerHTML = "&emsp;Este email está sendo utilizado";
}
if (listaDeParametros.get("erro") === "1") {
    erro.style.display = "inline";
    erro.innerHTML = "&emsp;Algo deu errado.";
}

btnAlterar.addEventListener("click", ativarInput);
chkMostrarSenha.addEventListener("click", mostrarSenha);
btnExcluir.addEventListener("click", function () {mostrarPopupDeConfirmacao(1)});
btnCancelar.addEventListener("click", function () {mostrarPopupDeConfirmacao(0)});
inputImagem.addEventListener("change", mudancaDaImagem);
txtCPF.addEventListener("input", function (evento) {
    evento.target.value = formatarCPF(evento.target.value);
});
txtTelefone.addEventListener("input", function (evento) {
    evento.target.value = formatarTelefone(evento.target.value);
});

var isExcluirNone = 0;

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

function ativarInput() {
    const inputs = document.querySelectorAll(".input");
    const btnSalvar = document.querySelector(".btn-salvar");
    const btnExcluir = document.querySelector(".btn-excluir");

    inputs.forEach((input) => {
        input.disabled = !input.disabled;
    });
    inputImagem.disabled = !inputImagem.disabled;

    switch (isExcluirNone) {
        case 0:
            btnExcluir.style.display = "none";
            btnSalvar.style.display = "block";
            isExcluirNone = 1;
            break;
        case 1:
            btnExcluir.style.display = "block";
            btnSalvar.style.display = "none";
            isExcluirNone = 0;
            break;
    }
}

function mostrarSenha() {
    const txtConfirmaSenha = document.querySelector("#txtConfirmaSenha");

    switch (txtConfirmaSenha.type){
        case "text":
            txtConfirmaSenha.type = "password";
            break;
        case "password":
            txtConfirmaSenha.type = "text";
            break;
    }
}


function mudancaDaImagem(evento) {
    erroPerfil.style.color = "green";
    erroPerfil.innerHTML = "Imagem escolhida";
    erroPerfil.style.display = "inline";

    if (evento.target.files[0].size > 1048576 * 15) {
        erroPerfil.style.color = "#f73151";
        erroPerfil.innerHTML = "A imagem escolhida é muito grande (máximo: 15 MB)";
        erroPerfil.style.display = "inline";
        evento.target.value = "";
    }
    else {
        const objetoURL = URL.createObjectURL(evento.target.files[0]);
        imagemDePreview.src = objetoURL;
        imagemDePreview.onload = function () {
            URL.revokeObjectURL(objetoURL);
        }
    }

}
