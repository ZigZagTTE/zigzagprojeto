// ## Código Javascript que rege a lógica do cadastro
const erroEmail = document.getElementById("erroEmail");
const erroSenha = document.getElementById("erroSenha");
const txtSenha = document.getElementById("txtSenha");
const txtConfirmarSenha = document.getElementById("txtConfirmarSenha");
const txtEmail = document.getElementById("txtEmail");

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroEmail") === "1") {
    erroEmail.style.display = "block";
}

if (listaDeParametros.get("erroSenha") === "1") {
    erroSenha.style.display = "block";
}

console.log(document.getElementById("txtSenha").value );

function progredirCadastro() {
    if (!(txtSenha.value === txtConfirmarSenha.value) 
    || (txtSenha.value === "" && txtConfirmarSenha.value === "")){
        erroSenha.style.display = "block";
        erroSenha.innerHTML = "AS SENHAS PRECISAM SER IGUAIS";
    }

    else {
    document.getElementById("infoDeEntrada").style.display = "none";
    document.getElementById("infoPessoais").style.display = "block";
    }
}

function regredirCadastro() {
    document.getElementById("infoDeEntrada").style.display = "block";
    document.getElementById("infoPessoais").style.display = "none";
}
