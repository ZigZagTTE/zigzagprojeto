// ## Código Javascript que rege a lógica do cadastro

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erroEmail") === "1") {
    document.getElementById("emailRepetido").style.display = "block";
}

if (listaDeParametros.get("erroSenha") === "1") {
    document.getElementById("senhasIguais").style.display = "block";
}

console.log(listaDeParametros.get(erroEmail));

function progredirCadastro() {
    document.getElementById("infoDeEntrada").style.display = "none";
    document.getElementById("infoPessoais").style.display = "block";
}

function regredirCadastro() {
    document.getElementById("infoDeEntrada").style.display = "block";
    document.getElementById("infoPessoais").style.display = "none";
}
