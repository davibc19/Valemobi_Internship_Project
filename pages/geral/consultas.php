<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

?>

<section id="consultas" class="container">
    <div class="container">
        <h2 class="sub-header">Alunos e Suas Turmas</h2>
        <div class="table-responsive">
            <table id="listarAlunoTurma" class="table table-striped">
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome do Aluno</th>
                        <th>Código da Turma</th>
                        <th>Nome da Disciplina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryAlunoTurma = consultarAlunosDeTurma();
                    while ($dadosAlunoTurma = mysql_fetch_array(($queryAlunoTurma)))
                    {
                    ?>  
                    <tr>
                        <td><?php echo $dadosAlunoTurma[0] ?></td>
                        <td><?php echo $dadosAlunoTurma[1] ?></td>
                        <td><?php echo $dadosAlunoTurma[2]."-T".$dadosAlunoTurma[4] ?></td>
                        <td><?php echo $dadosAlunoTurma[3] ?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <br/><br/>
        <h2 class="sub-header">Professores e Suas Turmas</h2>
        <div class="table-responsive">
            <table id="listarTurmaAluno" class="table table-striped">
                <thead>
                    <tr>
                        <th>CPF</th>
                        <th>Nome do Professor</th>
                        <th>Código da Turma</th>
                        <th>Nome da Disciplina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryProfessorTurma = consultarProfessoresDeTurma();
                    while ($dadosProfessorTurma = mysql_fetch_array(($queryProfessorTurma)))
                    {
                    ?>  
                    <tr>
                        <td><?php echo $dadosProfessorTurma[0] ?></td>
                        <td><?php echo $dadosProfessorTurma[1] ?></td>
                        <td><?php echo $dadosProfessorTurma[2]."-T".$dadosProfessorTurma[4] ?></td>
                        <td><?php echo $dadosProfessorTurma[3] ?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../template/footer.php'; ?>

