txtCEP = document.getElementById("cep");

btnAlterar = document.querySelector("#btnAlterar");
btnSalvar = document.querySelector(".btn-salvar");
btnExcluir = document.querySelector(".btn-excluir");
btnCancelar = document.querySelector("#btnCancelar");

erroAviso = document.querySelector(".erro_aviso");

txtCEP.value = formatarCEP(txtCEP.value);

btnAlterar.addEventListener("click", ativarInput);
btnExcluir.addEventListener("click", function(){mostrarPopupDeConfirmacao(1);});
btnCancelar.addEventListener("click", function(){mostrarPopupDeConfirmacao(0);});

txtCEP.addEventListener("input", function(){txtCEP.value = formatarCEP(txtCEP.value)});

var isSalvarNone = 1;

endereco = window.location.search;
listaDeParametros = new URLSearchParams(endereco);

if (listaDeParametros.get("erro") !== null){
    erroAviso.style.display = "inline-block";
}

function ativarInput() {
    const inputs = document.querySelectorAll(".input");

    inputs.forEach((input) => {
        input.disabled = !input.disabled;
    });

    switch (isSalvarNone) {
        case 0:
            btnSalvar.style.display = "none";
            btnExcluir.style.display = "block";
            btnAlterar.value = "Alterar endereço";
            isSalvarNone = 1;
            break;
        case 1:
            btnSalvar.style.display = "block";
            btnExcluir.style.display = "none";
            btnAlterar.value = "Cancelar";
            isSalvarNone = 0;
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