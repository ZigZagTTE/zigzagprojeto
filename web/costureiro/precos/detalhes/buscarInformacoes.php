    <?php

    require_once "../../../conexao.php";

    function buscarInformacoesDaPeca($conexao, $pec_id)
    {

        $queryInfoImagem = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_peca AS pec
                        where pec_id = ?");

        mysqli_stmt_bind_param($queryInfoImagem, "i", $pec_id);

        mysqli_stmt_execute($queryInfoImagem);

        $resultadoInfoImagem = mysqli_stmt_get_result($queryInfoImagem);


        if ($resultadoInfoImagem) {
            return mysqli_fetch_assoc($resultadoInfoImagem);
        } else {
            return false;
        }
        mysqli_stmt_close($query);
        mysqli_close($conexao);
    }

    function buscarInformacoesDoServico($conexao, $ser_id)
    {
        $query = mysqli_prepare($conexao, "SELECT *
                        FROM tbl_servico AS ser
                        where ser_id = ?");

        mysqli_stmt_bind_param($query, "i", $ser_id);

        mysqli_stmt_execute($query);

        $resultado = mysqli_stmt_get_result($query);
        $resultado = mysqli_fetch_assoc($resultado);

        return $resultado;
        mysqli_stmt_close($query);
        mysqli_close($conexao);
    }

    function buscarInformacoesDoCatalogo($conexao, $ser_id, $pec_id, $cos_id)
    {


        $query = mysqli_prepare($conexao, "SELECT * from tbl_catalogo where cos_id = ? and pec_id = ? and ser_id = ?");
        mysqli_stmt_bind_param($query, 'iii', $cos_id, $pec_id, $ser_id);
        mysqli_stmt_execute($query);
        $resultado = mysqli_stmt_get_result($query);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return $resultado;
        }
        mysqli_stmt_close($query);
        mysqli_close($conexao);
    }
