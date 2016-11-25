<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();
?>

<section id="adminMainPage" class="container">
    <div class="container">

        <h2 class="sub-header">Disciplinas</h2>
        <div class="table-responsive">
            <table id="listarDisciplinas" class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryDisciplina = consultarDisciplinas();
                    while ($dadosDisciplinas = mysql_fetch_array(($queryDisciplina)))
                    {
                        $id = $dadosDisciplinas['id'];
                    ?>  
                    <tr>
                        <td><?php echo $dadosDisciplinas['codigo'] ?></td>
                        <td><?php echo $dadosDisciplinas['nome'] ?></td>
                        <td><a href="../turma/cadastrarTurma.php?idDisciplina=<?php echo $id ?>"><span class="glyphicon glyphicon-plus"></span> Nova Turma</a>
                            | <a href="../disciplina/alterarDisciplina.php?id=<?php echo $id ?>"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                            | <a href="../disciplina/deletarDisciplina.php?id=<?php echo $id ?>"><span class="glyphicon glyphicon-minus"></span> Excluir</a></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <br/><br/>
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
                    $queryTurmas = consultarTurmas();
                    while ($dadosTurmas = mysql_fetch_array(($queryTurmas)))
                    {
                        $idTurma = $dadosTurmas['id'];
                        $dadosDisciplinas = mysql_fetch_array(consultarDisciplinaPorId($dadosTurmas['idDisciplina']));
                    ?>  
                    <tr>
                        <td><?php echo $dadosDisciplinas['codigo'] ?></td>
                        <td><?php echo $dadosTurmas['id'] ?></td>
                        <td><?php echo $dadosTurmas['qtdAlunos'] ?></td>
                        <td><a href="../turma/cadastrarAluno.php?id=<?php echo $idTurma ?>"><span class="glyphicon glyphicon-plus"></span> Gerenciar Alunos</a>
                            | <a href="../turma/deletarTurma.php?id=<?php echo $idTurma ?>"><span class="glyphicon glyphicon-minus"></span> Excluir</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../template/footer.php'; ?>

