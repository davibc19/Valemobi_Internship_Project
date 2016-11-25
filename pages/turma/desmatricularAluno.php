<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

$dadosTurma = mysql_fetch_array(consultarTurmaPorId($_GET['idTurma']));

$idAluno = $_GET['idAluno'];
$idDisciplina = $dadosTurma['idDisciplina'];
$idTurma = $_GET['idTurma'];



desmatricularAluno($idAluno, $idDisciplina, $idTurma, $dadosTurma['qtdAlunos']);
?>