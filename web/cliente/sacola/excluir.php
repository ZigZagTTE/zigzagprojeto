<?php

session_start();

foreach ($_SESSION['sacola']['itens'] as $indice => $item) {
    if ($item['catalogo'] == $_POST['catalogo']) {
        unset($_SESSION['sacola']['itens'][$indice]);
        $_SESSION['sacola']['itens'] = array_values($_SESSION['sacola']['itens']);
        break;
    }
}