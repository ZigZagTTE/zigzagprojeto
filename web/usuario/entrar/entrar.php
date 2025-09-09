<?php

require_once "../../conecta.php"; //conectar com o banco

$email = $_POST['txtEmail']; //definindo a variável email
$senha = $_POST['txtSenha']; // definindo a variável senha
$sql1 = "SELECT cli_id FROM tbl_cliente WHERE cli_email='$email' AND cli_senha='$senha'"; //selecionando o código da tabela usuário quando o email e senha for igual ao do banco de dados
$res = mysqli_query($conexao, $sql1); //fazendo o código no query
if (mysqli_num_rows($res) == 0) //caso não possua nenhum cadastro, não tenha cadastro ou tenha errado a informação (arrumar esta parte de erros)
{
    echo "Usuário não cadastrado, email ou senha errados";
?>
    <script>
        window.location.assign("login.html"); //voltar para o html
    </script>

<?php
} else //caso tenha o usuário, ele faça o login
{
    echo "Usuário cadastrado";
    $registro = mysqli_fetch_row($res);
    $codigo = $registro[0]; //registrar o código
?>
    <script>
        window.location.assign("../home/cliente/index.php"); //ir para o home
    </script>
<?php

}
?>