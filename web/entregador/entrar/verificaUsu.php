<?php

//Inicializa a sessão

session_start();

//Se não tiver variáveis registradas, retorna para tela de login

echo $_SESSION["cli_id"];
echo "<br>";
echo $_SESSION["cli_email"];
echo "<br>";
echo $_SESSION["cli_nome"];
echo "<br>";
echo $_SESSION["cli_perfil"];
echo "<br>";
echo "<h1>Temporários</h1><br>";
echo $_SESSION["cli_idtemp"];
echo "<br>";
echo $_SESSION["cli_emailtemp"];
echo "<br>";
echo $_SESSION["cli_nometemp"];
echo "<br>";
echo $_SESSION["cli_perfiltemp"];
echo "<br>";
echo $_SESSION["senhasErradas"];
