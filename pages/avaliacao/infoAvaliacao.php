<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

$idTurma = $_GET['id'];
$dadosTurmas = mysql_fetch_array(consultarTurmaPorId($idTurma));
$dadosDisciplinas = mysql_fetch_array(consultarDisciplinaPorId($dadosTurmas['idDisciplina']));
$idDisciplina = $dadosDisciplinas['id'];
?>

<section id="infoAvaliacao" class="container">
    <div class="bs-component">
        <ul class="breadcrumb">
            <li> <a class="link-breadcrumb" href="../index/indexProfessor.php">Home</a></li>
            <li class="active">Avaliação</li>
        </ul>
    </div>
    <div class="container">
        <h2 class="sub-header">Avaliações</h2>
        <div class="table-responsive">
            <table id="listarAvaliacoes" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Código da Disciplina</th>
                        <th>Identificador da Turma</th>
                        <th>Quantidade de Questões</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryAvaliacoes = consultarAvaliacoesPorTurma($idTurma);
                    while ($dadosAvaliacoes = mysql_fetch_array($queryAvaliacoes))
                    {
                        $idAvaliacao = $dadosAvaliacoes['id'];
                        ?>  
                        <tr>
                            <td><?php echo $idAvaliacao ?></td>
                            <td><?php echo $dadosDisciplinas['codigo'] ?></td>
                            <td><?php echo $dadosTurmas['id'] ?></td>
                            <td><?php echo $dadosAvaliacoes['qtdQuestoes'] ?></td>
                            <td><a href="../questao/infoQuestao.php?id=<?php echo $idAvaliacao ?>&idTurma=<?php echo $idTurma ?>"><span class="glyphicon glyphicon-search"></span> Visualizar Questões</a>
                                | <a href="excluirAvaliacao.php?id=<?php echo $idAvaliacao ?>"><span class="glyphicon glyphicon-minus"></span> Excluir</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br/><br/>
        <hr/>
        <h4>Painel Administrativo</h4>
        <a href="cadastrarAvaliacao.php?idTurma=<?php echo $idTurma ?>&idDisciplina=<?php echo $idDisciplina ?>"><button class="btn-success">Adicionar Nova Avaliação</button></a>
    </div>
</section>

<?php include '../template/footer.php'; ?>

