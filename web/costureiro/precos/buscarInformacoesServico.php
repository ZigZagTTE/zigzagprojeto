    <?php

    require_once "../../conexao.php";

    

    function buscarInformacoesDoServico($conexao, $ser_id)
    {
        $query = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_servico AS ser
                        where ser_id = ?");

        mysqli_stmt_bind_param($query, "i", $ser_id);

        mysqli_stmt_execute($query);

        $resultado = mysqli_stmt_get_result($query);
        $resultado = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($query);

        return $resultado;
    }