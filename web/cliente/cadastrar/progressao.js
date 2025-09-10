// ## Código Javascript que rege a lógica do cadastro
const erroEmail = document.getElementById("erroEmail");
const erroSenha = document.getElementById("erroSenha");
const erroVazio = document.getElementById("erroVazio");
const txtSenha = document.getElementById("txtSenha");
const txtConfirmarSenha = document.getElementById("txtConfirmarSenha");
const txtEmail = document.getElementById("txtEmail");
var passoDaProgessao = 0;

var isSenhasIguais = -1;

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroEmail") === "1") {
    erroEmail.style.display = "block";
    erroEmail.innerHTML = "Este email já foi utilizado";
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
        passoDaProgessao ++;
    if (txtEmail.value === "") {
        erroVazio.style.display = "block";
        txtEmail.style.borderColor = "#f73151";
    }
    else if (isSenhasIguais == -1) {
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
    passoDaProgessao --;
    displayEtapa();
}

function displayEtapa(){
    switch(passoDaProgessao)
    {
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

function avisoImagem(){
    document.getElementById("avisoPfp").style.display = "block";
}