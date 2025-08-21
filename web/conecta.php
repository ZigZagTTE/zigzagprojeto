<?php

$servidor = "localhost";
$bd = "bd_zigzag";
$usuario = "root";
$senha = "";

$conexao = mysqli_connect($servidor,$usuario,$senha) or die ("ERRO NA CONEXÃO");
$db = mysqli_select_db($conexao,$bd) or die ("Erro na seleção do banco");
?>