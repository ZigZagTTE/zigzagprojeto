// ## Código Javascript que rege a lógica do cadastro

// Avisos
const erroImagem = document.getElementById("erroImagem");
const erroEmail = document.getElementById("erroEmail");
const erroSenha = document.getElementById("erroSenha");
const erroVazio = document.getElementById("erroVazio");
const avisoImg = document.getElementById("avisoImg");

// Inputs 
const txtEmail = document.getElementById("txtEmail");
const txtSenha = document.getElementById("txtSenha");
const txtConfirmarSenha = document.getElementById("txtConfirmarSenha");
const txtNome = document.getElementById("txtNome");
const inputImagem = document.getElementById("inputImagem");
const txtCPF = document.getElementById("txtCPF");
const txtNascimento = document.getElementById("txtNascimento");
const txtTelefone = document.getElementById("txtTelefone");
const chkMostrarSenha = document.getElementById("mostrarSenha");

//Buttons
const btnCadastrar = document.getElementById("btnCadastrar");
const btnProximo1 = document.getElementById("btnProximo1");
const btnProximo2 = document.getElementById("btnProximo2");
const btnRegredir1 = document.getElementById("btnRegredir1");
const btnRegredir2 = document.getElementById("btnRegredir2");

// Preview para imagem
const imagemDePreview = document.getElementById("preview_img");

// Variáveis de lógica
var passoDaProgessao = 0;
var isSenhasIguais = -1;

//Eventos

txtEmail.addEventListener('input', testeEmail);

txtSenha.addEventListener('input', testeSenhas);
txtConfirmarSenha.addEventListener('input', testeSenhas);

txtNome.addEventListener('input', testeVazio);
txtCPF.addEventListener('input', testeVazio);
txtNascimento.addEventListener('input', testeVazio);
txtTelefone.addEventListener('input', testeVazio);


inputImagem.addEventListener("change", mudancaDaImagem);

txtCPF.addEventListener("input", function (evento) {
    evento.target.value = formatarCPF(evento.target.value);
});

txtTelefone.addEventListener("input", function (evento) {
    evento.target.value = formatarTelefone(evento.target.value);
});

chkMostrarSenha.addEventListener("click", mostrarSenha);

btnCadastrar.addEventListener("click", testeVazioGeral);
btnProximo1.addEventListener("click", progredirCadastro);
btnProximo2.addEventListener("click", progredirCadastro);
btnRegredir1.addEventListener("click", regredirCadastro);
btnRegredir2.addEventListener("click", regredirCadastro);

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

function testeVazio(evento) {
    elemento = evento.target;

    if (elemento.value !== "") {
        elemento.style.borderColor = "#b450f5";
    }
}

function testeVazioGeral() {
    const inputs = document.querySelectorAll(".input_cad");
    let inputsVazios = 0;

    inputs.forEach(function (input) {
        if (input.value === "") {
            input.style.borderColor = "#f73151";
            inputsVazios += 1;
        }
        else {
            input.style.borderColor = "#b450f5";
        }
    });

    if (inputsVazios > 0) {
        erroVazio.style.display = "block";
    }
    else {
        erroVazio.style.display = "none";
    }
}

function testeEmail(evento) {
    let pattern = /^[\w\-\.]+@([\w-]+\.)+[\w-]{2,}$/;
    if (!(pattern.test(txtEmail.value))) {
        erroEmail.style.display = "block";
        erroEmail.innerHTML = "Insira um email válido.";
    }
    else {
        erroEmail.style.display = "none";
    }

    testeVazio(evento);
}

function testeSenhas(evento) {
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

    testeVazio(evento);
}

function mostrarSenha() {

    switch (txtSenha.type){
        case "text":
            txtSenha.type = "password";
            break;
        case "password":
            txtSenha.type = "text";
            break;
    }

    switch (txtConfirmarSenha.type){
        case "text":
            txtConfirmarSenha.type = "password";
            break;
        case "password":
            txtConfirmarSenha.type = "text";
            break;
    }
}

function progredirCadastro() {
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
        passoDaProgessao++;
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

    if (evento.target.files[0].size > 1048576 * 15) {
        avisoImg.style.color = "#f73151";
        avisoImg.innerHTML = "A imagem escolhida é muito grande";
        avisoImg.style.display = "block";
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