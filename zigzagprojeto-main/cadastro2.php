<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>ZigZag</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="responsivo.css">
    <link rel="icon" href="desing/images/MiniLogo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iansui&display=swap" rel="stylesheet">
    <div class="top">

    </div>
</head>

<body>
    <script>

        function formatarTelefone(input) {
        // Remove todos os caracteres não numéricos
        var telefone = input.value.replace(/\D/g, '');

        // Insere os parênteses, espaço e traço nos lugares corretos
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');

        // Atualiza o valor do campo de entrada com o telefone formatado
        input.value = telefone;
        }

        function formatarCPF(input) {
        // Remove todos os caracteres não numéricos
        var telefone = input.value.replace(/\D/g, '');

        // Insere os parênteses, espaço e traço nos lugares corretos
        telefone = telefone.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

        // Atualiza o valor do campo de entrada com o telefone formatado
        input.value = telefone;
        }
    </script>
    <form class="popup" method="POST" action="cadastro2.php">
        <div class="tit_log">Crie sua conta</div>
        <div class="insc_cad">
            <p class="txt_log">Nome de usuário</p><br>
            <input class="input_cad" type="text" name="txtUsu" required placeholder="seu nome de usuário aqui">
            <p class="txt_log">CPF</p><br>
            <input class="input_cad" type="text" name="txtCpf" onkeyup="formatarCPF(this)" pattern="([0-9]{3}).([0-9]{3}).([0-9]{3})-([0-9]{2})$" required placeholder="seu CPF aqui">
            <p class="txt_log">Data de nascimento</p><br>
            <input class="input_cad" type="date" name="txtData" required placeholder="00/00/0000">
            <p class="txt_log">Telefone</p><br>
            <input class="input_cad" type="tel" name="txtTelefone" onkeyup="formatarTelefone(this)" required pattern="(\([0-9]{2}\))([0-9]{5})-([0-9]{4})$" placeholder="(12) 34567-8901">
            
        </div>
        <input class="btnSeta"  type="submit" name="btnSeta" value="Cadastrar"><br>
        <a class="cadastro" href="login.html">Já tenho conta</a>

    </form>

   


</body>

</html>