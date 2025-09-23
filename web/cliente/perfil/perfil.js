//Inputs
const btnEditar = document.querySelector(".btn-editar");
const txtCPF = document.getElementById("txtCPF");
const txtTelefone = document.getElementById("txtTelefone");
const inputImagem = document.getElementById("inputImagem");

//Preview da Imagem
const imagemDePreview = document.getElementById("imagemPreview");

//Erros
const erroImagem = document.getElementById("erroImagem");
const erroEmail = document.getElementById("erroEmail");

txtCPF.value = formatarCPF(txtCPF.value);
txtTelefone.value = formatarTelefone(txtTelefone.value);
inputImagem.addEventListener("change", mudancaDaImagem);

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroImagem") === "1") {
    erroImagem.style.display = "inline";
    erroImagem.innerHTML = "Sua imagem é maior do que 15 MB";
}
if (listaDeParametros.get("erroEmail") === "1") {
    erroEmail.style.display = "inline";
    erroEmail.innerHTML = "&emsp;Este email está sendo utilizado";
}

btnEditar.addEventListener("click", ativarInput);
txtCPF.addEventListener("input", function (evento) {
    evento.target.value = formatarCPF(evento.target.value);
});
txtTelefone.addEventListener("input", function (evento) {
    evento.target.value = formatarTelefone(evento.target.value);
});

var isExcluirNone = 0;

function ativarInput() {
    const inputs = document.querySelectorAll(".input");
    const btnSalvar = document.querySelector(".btn-salvar");
    const btnExcluir = document.querySelector(".btn-excluir");

    inputs.forEach((input) => {
        input.disabled = !input.disabled;
    });
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

function mudancaDaImagem(evento) {
    erroImagem.style.color = "green";
    erroImagem.innerHTML = "Imagem escolhida";
    erroImagem.style.display = "inline";

    if (evento.target.files[0].size > 1048576 * 15) {
        erroImagem.style.color = "#f73151";
        erroImagem.innerHTML = "A imagem escolhida é muito grande (máximo: 15 MB)";
        erroImagem.style.display = "inline";
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
