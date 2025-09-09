<?php

//Inicializa a sessão

session_start();

//Se não tiver variáveis registradas, retorna para tela de login

echo $_SESSION["id"];
echo "<br>";
echo $_SESSION["nome"];

