
const txtPreco = document.getElementById("txtPreco");

txtPreco.addEventListener("input", function (evento) {
    evento.target.value = formatarPreco(evento.target.value);
});

function formatarPreco(valor) {
    let formatoPreco = "";
    let digitos = valor.replace(/^0+|\D+/g, "");
    digitos = digitos.padStart(3, '0');
    let centavos = digitos.substring(digitos.length - 2);
    let reais = digitos.substring(0, digitos.length - 2);
    formatoPreco = '${ reais }.${ centavos }';
    return formatoPreco;
};