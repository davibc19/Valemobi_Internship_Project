<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();
?>

<section id="profMainPage" class="container">
    <div class="container">
        <h2 class="sub-header">Turmas</h2>
        <div class="table-responsive">
            <table id="listarTurmas" class="table table-striped">
                <thead>
                    <tr>
                        <th>Código da Disciplina</th>
                        <th>Identificador da Turma</th>
                        <th>Quantidade de Alunos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryTurmas = consultarTurmasPorProfessor($_SESSION['cpf']);
                    while ($dadosTurmas = mysql_fetch_array(($queryTurmas)))
                    {
                        $idTurma = $dadosTurmas['id'];
                        $dadosDisciplinas = mysql_fetch_array(consultarDisciplinaPorId($dadosTurmas['idDisciplina']));
                    ?>  
                    <tr>
                        <td><?php echo $dadosDisciplinas['codigo'] ?></td>
                        <td><?php echo $dadosTurmas['id'] ?></td>
                        <td><?php echo $dadosTurmas['qtdAlunos'] ?></td>
                        <td><a href="../avaliacao/infoAvaliacao.php?id=<?php echo $idTurma ?>"><span class="glyphicon glyphicon-search"></span> Visualizar Avaliações</a>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../template/footer.php'; ?>

