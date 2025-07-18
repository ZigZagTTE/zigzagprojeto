<?php

//Inicializa a sessão

session_start();

//Se não tiver variáveis registradas, retorna para tela de login

if (isset($_SESSION["id"]) and isset($_SESSION["nome"])) {
	header("Location: home.php");
}
