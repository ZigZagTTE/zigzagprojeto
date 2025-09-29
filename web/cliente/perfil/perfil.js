//Inputs
const btnAlterar = document.querySelector("#btnAlterar");
const btnExcluir = document.querySelector("#btnExcluir");
const btnCancelar = document.querySelector("#btnCancelar");

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
inputImagem.addEventListener("change", mudancaDaImagem);
txtCPF.addEventListener("input", function (evento) {
    evento.target.value = formatarCPF(evento.target.value);
});
txtTelefone.addEventListener("input", function (evento) {
    evento.target.value = formatarTelefone(evento.target.value);
});

var isSalvarNone = 1;


function ativarInput() {
    const inputs = document.querySelectorAll(".input");
    const btnSalvar = document.querySelector(".btn-salvar");

    inputs.forEach((input) => {
        input.disabled = !input.disabled;
    });
    inputImagem.disabled = !inputImagem.disabled;

    switch (isSalvarNone) {
        case 0:
            btnSalvar.style.display = "none";
            isSalvarNone = 1;
            break;
        case 1:
            btnSalvar.style.display = "block";
            isSalvarNone = 0;
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
