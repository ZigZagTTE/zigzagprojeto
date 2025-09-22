// ## Código Javascript que formata automaticamente as informações de telefone e CPF

txtTelefone.addEventListener("keyup", formatarTelefone);
txtCPF.addEventListener("keyup", formatarCPF);

function formatarTelefone(evento) {
  const input = evento.target;

  // Remove todos os caracteres não numéricos
  var telefone = input.value.replace(/\D/g, "");

  // Insere os parênteses, espaço e traço nos lugares corretos
  telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1)$2-$3");

  // Atualiza o valor do campo de entrada com o telefone formatado
  input.value = telefone;
}

function formatarCPF(evento) {
  const input = evento.target;

  // Remove todos os caracteres não numéricos
  var cpf = input.value.replace(/\D/g, "");

  // Insere os parênteses, espaço e traço nos lugares corretos
  cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");

  // Atualiza o valor do campo de entrada com o telefone formatado
  input.value = cpf;
}
