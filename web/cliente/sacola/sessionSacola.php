<?php 

    require_once "../../conexao.php";

    if (isset($_SESSION['sacola']['idCostureira']) and (string) $_SESSION['sacola']['idCostureira'] != $_POST['cos_id']) {
        //código para tratar erro de costureira diferente
    }
    else{
        $_SESSION['sacola']['idCostureira'] = $_POST['cos_id'];
        $_SESSION['sacola']['idCliente'] = $_POST['cli_id'];

        $_SESSION['sacola']['itens'][] = 
        [
            'catalogo' => $_POST['cat_id'],
            'descricao' => $_POST['txtDescricao'],
        ];
    }