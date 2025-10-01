<?php

//Inicializa a sessão

session_start();

//Se não tiver variáveis registradas, retorna para tela de login

echo $_SESSION["cos_id"];
echo "<br>";
echo $_SESSION["cos_email"];
echo "<br>";
echo $_SESSION["cos_nome"];
echo "<br>";
echo $_SESSION["cos_perfil"];
echo "<br>";
echo "<h1>Temporários</h1><br>";
echo $_SESSION["cos_idtemp"];
echo "<br>";
echo $_SESSION["cos_emailtemp"];
echo "<br>";
echo $_SESSION["cos_nometemp"];
echo "<br>";
echo $_SESSION["cos_perfiltemp"];
echo "<br>";
echo $_SESSION["senhasErradas"];
