<?php

//A ARRUMAR

session_start();

if (isset($_SESSION["id"]) and isset($_SESSION["nome"])) {
	header("Location: home-cliente.php");
}
