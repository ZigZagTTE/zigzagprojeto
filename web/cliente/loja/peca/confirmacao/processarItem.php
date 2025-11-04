<?php
session_start();

if (isset($_SESSION['sacola']['idCostureira']) and (string) $_SESSION['sacola']['idCostureira'] != $_POST['cos_id']) {
    
} else {
    $_SESSION['sacola']['idCostureira'] = $_POST['cos_id'];

    $_SESSION['sacola']['itens'][] = 
    [
        'catalogo' => $_POST['cat_id'],
        'descricao' => $_POST['txtDescricao'],
    ];
}

header('Location: ../../../');

?>