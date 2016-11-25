<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

$idAvaliacao = $_GET['idAvaliacao'];
$idQuestao = $_GET['idQuestao'];
$dadosAvaliacoes = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));

if($dadosAvaliacoes['status'] == 'ativo')
    deletarQuestao($idQuestao, $idAvaliacao);
else if($dadosAvaliacoes['status'] == 'inativo')
    echo "<script> alert('[ERRO] Essa avaliação já foi respondida por um aluno, portanto nenhuma questão poderá mais ser excluida!');</script>";

include("../template/footer.php")

?>
