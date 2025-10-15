<?php 
    require_once "../../conexao.php";

/*************  ✨ Windsurf Command ⭐  *************/
/**
 * Fun o para buscar as informa es de um pedido
 * com base no seu id.
 *
 * @param object $conexao Conex o com o banco de dados.
 * @param string $_GET["id"] Id do pedido a ser buscado.
 *
 * @return array Informa es do pedido.
 */
/*******  5c9c86a3-b4fa-40ee-b144-fc1dedb91c4f  *******/
    function pedidoInfo($conexao, $_GET["id"]){
        $sql = "SELECT * 
        FROM tbl_pedido 
        WHERE ped_id = $id";
        $resultado = mysqli_query($conexao, $sql);
        return mysqli_fetch_assoc($resultado);
    }