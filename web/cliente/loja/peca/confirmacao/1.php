<?php
session_start();

echo json_encode($_SESSION['sacola']);

unset($_SESSION['sacola']);

?>