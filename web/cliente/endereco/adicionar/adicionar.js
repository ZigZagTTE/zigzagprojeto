const erroAviso = document.querySelector(".erro_aviso");

const btnSalvar = document.querySelector(".btn-salvar");

const txtCEP = document.querySelector("#cep");
const inputs = document.querySelectorAll(".input");

btnSalvar.addEventListener("click", testeVazioGeral);
txtCEP.addEventListener("input", function(){ txtCEP.value = formatarCEP(txtCEP.value)});

inputs.forEach(function (input) {
    if (input.tagName === "TEXTAREA") {
        void 0;
    }
    else {
        input.addEventListener("input", function(evento) {testeVazioEspecifico(evento.target)});
    }
});


function testeVazioEspecifico(alvoDoEvento) {

    if (alvoDoEvento.value !== "") {
        alvoDoEvento.style.borderColor = "#b450f5";
    }

}

function testeVazioGeral() {
    let inputsVazios = 0;

    inputs.forEach(function (input) {
        console.log(input.tagName);
        if (input.tagName === "TEXTAREA") {
            void 0;
        }
        else if (input.value === "") {
            input.style.borderColor = "#f73151";
            inputsVazios += 1;
        }
        else {
            input.style.borderColor = "#b450f5";
        }
    });

    if (inputsVazios > 0) {
        erroAviso.style.display = "block";
        erroAviso.innerHTML = "Preencha todos os campos obrigatórios."
        btnSalvar.type = "button";
    }
    else {
        erroAviso.style.display = "none";
        btnSalvar.type = "submit";
    }
}