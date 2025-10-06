txtCEP = document.getElementById("cep");
btnAlterar = document.querySelector(".btn");
btnSalvar = document.querySelector(".btn-salvar");

txtCEP.value = formatarCEP(txtCEP.value);

btnAlterar.addEventListener("click", ativarInput);

var isSalvarNone = 1;
function ativarInput() {
    const inputs = document.querySelectorAll(".input");

    inputs.forEach((input) => {
        input.disabled = !input.disabled;
    });

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