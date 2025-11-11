<?php

require_once "../../conexao.php";
session_start();


if (array_key_exists('excluirItens', $_POST)) {

    foreach ($_POST['checkIndicesParaApagar'] as $indiceChecado) {
        unset($_SESSION['sacola']['itens'][$indiceChecado]);
    }

    if (empty($_SESSION['sacola']['itens'])) {
        unset($_SESSION['sacola']);
    }
    header('Location: ./');

} else if (array_key_exists('fazerPedido', $_POST)) {
    // $pedData = date('Y-m-d');
    // $pedHora = date('H:i:s');
    // $idCliente = $_SESSION['cli_id'];
    // $descricao = $_POST['txtDescricao'];

    // $sql = "SELECT end_id FROM tbl_endereco_cliente WHERE cli_id = $ped_cliente";
    // $result = $conexao->query($sql);
    // $end_id = $result->fetch_assoc()['end_id'];



    // if ($conexao->query($query) === TRUE) {
    //     header("Location: pedido/");
    // } else {
    //     echo "Erro ao criar o pedido: " . $conexao->error;
    // }
    if (empty($_SESSION['sacola'])) {
        header('Location: ./');
    } else {
        if (empty($_POST['idEndereco'])) {
            header('Location: ../endereco/adicionar/?mensagem=sacola');
        } else { //Todos testes dão certo
            date_default_timezone_set("America/Sao_Paulo");
            $pedData = date('Y-m-d');
            $pedHora = date('H:i:s');
            $idCliente = $_SESSION['cli_id'];
            $idEndereco = $_POST['idEndereco'];
            $pedDescricao = $_POST['txtDescricao'];

            $queryInserirPedido = mysqli_prepare(
                $conexao,
                'INSERT INTO tbl_pedido (ped_data, ped_horario, ped_descricao, cli_id, end_id)
                        VALUES(?, ?, ?, ?, ?)'
            );
            mysqli_stmt_bind_param($queryInserirPedido, "sssii", $pedData, $pedHora, $pedDescricao, $idCliente, $idEndereco);
            mysqli_stmt_execute($queryInserirPedido);

            $idPedido = mysqli_insert_id($conexao);
            $itemDescricao = '';
            $itemIdCatalogo = 0;

            $queryInserirItem = mysqli_prepare(
                $conexao,
                'INSERT INTO tbl_item (ite_descricao, cat_id, ped_id)
                            VALUES(?, ?, ?)'
            );
            mysqli_stmt_bind_param($queryInserirItem, "sii", $itemDescricao, $itemIdCatalogo, $idPedido);

            foreach ($_SESSION['sacola']['itens'] as $item) {

                $itemDescricao = $item['descricao'];
                $itemIdCatalogo = $item['catalogo'];

                mysqli_stmt_execute($queryInserirItem);
            }
            unset($_SESSION['sacola']);
            header('Location: ../pedidos');
        }

    }

} else if (array_key_exists('excluirSacola', $_POST)) {
    unset($_SESSION['sacola']);
    header('Location: ./');
}



?>