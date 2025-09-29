<?php

session_start();

echo $_SESSION["cli_id"];
echo"<br>";
echo $_SESSION["cli_nome"];
echo "<br>";
echo $_SESSION["cli_perfil"];
echo "<br>";
echo $_SESSION["cli_cpf"];
echo "<br>";
echo $_SESSION["cli_telefone"];
echo "<br>";
echo $_SESSION["cli_data"];

?>