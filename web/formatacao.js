// ## Código Javascript que formata automaticamente as informações de telefone e CPF

function formatarTelefone(valor) {
  let formatoTelefone = ``;
  valor = valor.replace(/\D/g, "");
  valor = valor.substring(0, 11);
  if (valor.length > 7) {
    formatoTelefone = `(${valor.substring(0, 2)})${valor.substring(2, 7)}-${valor.substring(7, 11)}`;
  }
  else if (valor.length > 2){
    formatoTelefone = `(${valor.substring(0, 2)})${valor.substring(2, 7)}`;
  }
  else if (valor.length > 0){
    formatoTelefone = `(${valor.substring(0, 2)}`;
  }
  return formatoTelefone;
}

function formatarCPF(valor) {
  let formatoCPF = "";
  valor = valor.replace(/\D/g, "");
  valor = valor.substring(0, 11);
  if (valor.length > 9) {
    formatoCPF = `${valor.substring(0, 3)}.${valor.substring(3, 6)}.${valor.substring(6, 9)}-${valor.substring(9, 11)}`;
  }
  else if (valor.length > 6) {
    formatoCPF = `${valor.substring(0, 3)}.${valor.substring(3, 6)}.${valor.substring(6, 9)}`;
  }
  else if (valor.length > 3) {
    formatoCPF = `${valor.substring(0, 3)}.${valor.substring(3, 6)}`;
  }
  else if (valor.length > 0) {
    formatoCPF = `${valor.substring(0, 3)}`;
  }

  return formatoCPF;
};
