<?php
session_start();

echo $_SESSION["cos_id"];
echo "<br>";
echo $_SESSION["cos_email"];
echo "<br>";
echo $_SESSION["cos_nome"];
echo "<br>";
echo $_SESSION["cos_perfil"];
echo "<br>";

unset($_SESSION["cos_id"]);
unset($_SESSION["cos_email"]);
unset($_SESSION["cos_nome"]);
unset($_SESSION["cos_perfil"]);

echo $_SESSION["cos_id"];
echo "<br>";
echo $_SESSION["cos_email"];
echo "<br>";
echo $_SESSION["cos_nome"];
echo "<br>";
echo $_SESSION["cos_perfil"];

?>