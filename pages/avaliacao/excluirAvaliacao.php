<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

$idAvaliacao = $_GET['id'];
$dadosAvaliacoes = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));

if($dadosAvaliacoes['status'] == 'ativo')
    if($dadosAvaliacoes['qtdQuestoes'] != 0)
        echo "<script> alert('[ERRO] Existem ".$dadosAvaliacoes['qtdQuestoes']." questão(ões) cadastrada(s) nesta avaliação. Apague-a(s) primeiro!');"
            . "window.location='../avaliacao/infoAvaliacao.php?id=".$dadosAvaliacoes['idTurma']."';</script>";
    else
        deletarAvaliacao($idAvaliacao, $dadosAvaliacoes['idTurma']);
else if($dadosAvaliacoes['status'] == 'inativo')
    echo "<script> alert('[ERRO] Essa avaliação já foi respondida por um aluno, portanto não poderá mais ser excluida!');"
            . "window.location='../avaliacao/infoAvaliacao.php?id=".$dadosAvaliacoes['idTurma']."';</script>";

include("../template/footer.php")

?>
