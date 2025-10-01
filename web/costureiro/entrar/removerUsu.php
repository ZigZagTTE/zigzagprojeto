<?php
session_start();

echo $_SESSION["cos_id"];
echo "<br>";
echo $_SESSION["cos_email"];
echo "<br>";
echo $_SESSION["cos_nome"];
echo "<br>";
echo $_SESSION["cos_perfil"];
echo "<br>";

unset($_SESSION["cos_id"]);
unset($_SESSION["cos_email"]);
unset($_SESSION["cos_nome"]);
unset($_SESSION["cos_cpf"]);
unset($_SESSION["cos_cnpj"]);
unset($_SESSION["cos_perfil"]);
unset($_SESSION["cos_rua"]);
unset($_SESSION["cos_bairro"]);
unset($_SESSION["cos_numero"]);
unset($_SESSION["cos_complemento"]);
unset($_SESSION["cos_cidade"]);
unset($_SESSION["cos_estado"]);
unset($_SESSION["cos_cep"]);

 
 

echo $_SESSION["cos_id"];
echo "<br>";
echo $_SESSION["cos_email"];
echo "<br>";
echo $_SESSION["cos_nome"];
echo "<br>";
echo $_SESSION["cos_perfil"];

?>