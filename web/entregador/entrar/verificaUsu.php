<?php

//Inicializa a sessão

session_start();

//Se não tiver variáveis registradas, retorna para tela de login

echo $_SESSION["entgd_id"];
echo "<br>";
echo $_SESSION["entgd_email"];
echo "<br>";
echo $_SESSION["entgd_nome"];
echo "<br>";
echo $_SESSION["entgd_perfil"];
echo "<br>";
echo "<h1>Temporários</h1><br>";
echo $_SESSION["entgd_idtemp"];
echo "<br>";
echo $_SESSION["entgd_emailtemp"];
echo "<br>";
echo $_SESSION["entgd_nometemp"];
echo "<br>";
echo $_SESSION["entgd_perfiltemp"];
echo "<br>";
echo $_SESSION["senhasErradas"];
