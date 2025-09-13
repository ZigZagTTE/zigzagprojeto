// ## Código Javascript que rege a lógica do cadastro
const erroImagem = document.getElementById("erroImagem");
const erroEmail = document.getElementById("erroEmail");
const erroSenha = document.getElementById("erroSenha");
const erroVazio = document.getElementById("erroVazio");
const avisoImg = document.getElementById("avisoImg");
const txtSenha = document.getElementById("txtSenha");
const txtConfirmarSenha = document.getElementById("txtConfirmarSenha");
const txtEmail = document.getElementById("txtEmail");
const imagemDePreview = document.getElementById("preview_img");
var passoDaProgessao = 0;

var isSenhasIguais = -1;

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroEmail") === "1") {
    erroEmail.style.display = "block";
    erroEmail.innerHTML = "Este email já foi utilizado";
}

if (listaDeParametros.get("erroImagem") === "1") {
    erroImagem.style.display = "block";
    erroImagem.innerHTML = "Sua imagem é maior do que 15 MB";
}

function testeVazio(elemento) {
    if (elemento.value === "") {
        elemento.style.borderColor = "#f73151";
        erroVazio.style.display = "block";
    }
    else {
        elemento.style.borderColor = "#b450f5";
        erroVazio.style.display = "none";
    }
}

function testeEmail(elemento) {
    let pattern = /^[\w\-\.]+@([\w-]+\.)+[\w-]{2,}$/;
    if (!(pattern.test(txtEmail.value))) {
        erroEmail.style.display = "block";
        erroEmail.innerHTML = "Insira um email válido.";
    }
    else {
        erroEmail.style.display = "none";
    }
    testeVazio(elemento)
}

function testeSenhas(elemento) {
    let pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    if (!(pattern.test(txtSenha.value))) {
        erroSenha.style.display = "block";
        erroSenha.innerHTML = "É preciso ter ao menos 8 caracteres, uma letra maíuscula, uma minúscula e um número";
    }
    else if (!(txtSenha.value === txtConfirmarSenha.value)) {
        erroSenha.style.display = "block";
        erroSenha.innerHTML = "AS SENHAS PRECISAM SER IGUAIS";
        txtSenha.style.borderColor = "#f73151";
        txtConfirmarSenha.style.borderColor = "#f73151";
        isSenhasIguais = 0;
    }
    else {
        erroSenha.style.display = "none";
        txtSenha.style.borderColor = "#b450f5";
        txtConfirmarSenha.style.borderColor = "#b450f5";
        isSenhasIguais = 1;
    }
    testeVazio(elemento)
}

function progredirCadastro() {
    passoDaProgessao++;
    if (txtEmail.value === "") {
        erroVazio.style.display = "block";
        txtEmail.style.borderColor = "#f73151";
    }
    else if (isSenhasIguais == 0) {
        erroSenha.style.display = "block";
        erroSenha.innerHTML = "AS SENHAS PRECISAM SER IGUAIS";
        txtSenha.style.borderColor = "#f73151";
        txtConfirmarSenha.style.borderColor = "#f73151";
    }
    else if (isSenhasIguais == 1) {
        displayEtapa();
    }
}

function regredirCadastro() {
    passoDaProgessao--;
    displayEtapa();
}

function displayEtapa() {
    switch (passoDaProgessao) {
        case 0:
            document.getElementById("infoDeEntrada").style.display = "block";
            document.getElementById("infoDeApresentacao").style.display = "none";
            document.getElementById("infoPessoais").style.display = "none";
            break;
        case 1:
            document.getElementById("infoDeEntrada").style.display = "none";
            document.getElementById("infoDeApresentacao").style.display = "block";
            document.getElementById("infoPessoais").style.display = "none";
            break;
        case 2:
            document.getElementById("infoDeEntrada").style.display = "none";
            document.getElementById("infoDeApresentacao").style.display = "none";
            document.getElementById("infoPessoais").style.display = "block";
            break;
    }
}

function mudancaDaImagem(evento) {
    avisoImg.style.color = "green";
    avisoImg.innerHTML = "Imagem escolhida";
    avisoImg.style.display = "block";

    if (evento.target.files[0].size > 1048576*15) {
        avisoImg.style.color = "#f73151";
        avisoImg.innerHTML = "A imagem escolhida é muito grande";
        avisoImg.style.display = "block";
        evento.target.files[0] = "";
    }
    else{
        imagemDePreview.src = URL.createObjectURL(evento.target.files[0]);
    }

}