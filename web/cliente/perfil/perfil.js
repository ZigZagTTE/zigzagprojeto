const btnEditar = document.querySelector(".btn-editar");
const txtCPF = document.getElementById("txtCPF");
const txtTelefone = document.getElementById("txtTelefone");

txtCPF.value = formatarCPF(txtCPF.value);
txtTelefone.value = formatarTelefone(txtTelefone.value);


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

function onScrollFadeIn() {
    const elements = document.querySelectorAll(".fade-in");
    const windowBottom = window.innerHeight + window.scrollY;

    elements.forEach((el) => {
        const elementTop = el.getBoundingClientRect().top + window.scrollY;
        if (windowBottom > elementTop + 100) {
            // 100px antes de aparecer totalmente
            el.classList.add("visible");
        }
    });
}

window.addEventListener("scroll", onScrollFadeIn);
window.addEventListener("DOMContentLoaded", onScrollFadeIn);

window.addEventListener("DOMContentLoaded", function () {
    document.body.classList.add("loaded");
});