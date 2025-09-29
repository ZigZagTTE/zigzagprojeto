<?php
session_start();

echo $_SESSION["entgd_id"];
echo "<br>";
echo $_SESSION["entgd_email"];
echo "<br>";
echo $_SESSION["entgd_nome"];
echo "<br>";
echo $_SESSION["entgd_perfil"];
echo "<br>";

unset($_SESSION["entgd_id"]);
unset($_SESSION["entgd_email"]);
unset($_SESSION["entgd_nome"]);
unset($_SESSION["entgd_perfil"]);
unset($_SESSION["entgd_cpf"]);
unset($_SESSION["entgd_telefone"]);
unset($_SESSION["entgd_cnh"]);

echo $_SESSION["entgd_id"];
echo "<br>";
echo $_SESSION["entgd_email"];
echo "<br>";
echo $_SESSION["entgd_nome"];
echo "<br>";
echo $_SESSION["entgd_perfil"];

?>