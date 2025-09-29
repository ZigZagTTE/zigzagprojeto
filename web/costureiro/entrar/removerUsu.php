<?php
session_start();

echo $_SESSION["cli_id"];
echo "<br>";
echo $_SESSION["cli_email"];
echo "<br>";
echo $_SESSION["cli_nome"];
echo "<br>";
echo $_SESSION["cli_perfil"];
echo "<br>";

unset($_SESSION["cli_id"]);
unset($_SESSION["cli_email"]);
unset($_SESSION["cli_nome"]);
unset($_SESSION["cli_perfil"]);
unset($_SESSION["cli_cpf"]);
unset($_SESSION["cli_telefone"]);
unset($_SESSION["cli_nascimento"]);

echo $_SESSION["cli_id"];
echo "<br>";
echo $_SESSION["cli_email"];
echo "<br>";
echo $_SESSION["cli_nome"];
echo "<br>";
echo $_SESSION["cli_perfil"];

?>