<?php

include '../../functions/functionsBd.php';

$queryDisciplina = consultarDisciplinaPorId($_GET['id']);
$dadosDisciplina = mysql_fetch_array($queryDisciplina);


$queryTurma = consultarTurmaPorDisciplina($_GET['id']);

if (mysql_fetch_array($queryTurma))
    echo "<script>"
        . "alert('[ERRO] Existem turmas cadastradas para esta disciplina!');"
        . "window.location='../index/indexAdmin.php';"
    . "</script>";
else
{
    deletarDisciplina($dadosDisciplina['id']);
}

