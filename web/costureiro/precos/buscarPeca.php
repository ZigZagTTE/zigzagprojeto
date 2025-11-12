<?php

require_once "../../conexao.php";

function buscarPeca($conexao, $pecaId, $costureiraId)
{
    $query = "SELECT pec_id FROM tbl_peca WHERE pec_id = $pecaId AND cos_id = $costureiraId";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
