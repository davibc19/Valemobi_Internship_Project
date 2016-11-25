<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

$idAvaliacao = $_GET['id'];
$idTurma = $_GET['idTurma'];
?>

<section id="infoQuestao" class="container">
    <div class="bs-component">
        <ul class="breadcrumb">
            <li> <a class="link-breadcrumb" href="../index/indexProfessor.php">Home</a></li>
            <li> <a class="link-breadcrumb" href="../avaliacao/infoAvaliacao.php?id=<?php echo $idTurma ?>">Avaliação</a></li>
            <li class="active">Questão</li>
        </ul>
    </div>
    <div class="container">
        <h2 class="sub-header">Questões</h2>
        <div class="table-responsive">
            <table id="listarQuestoes" class="table table-striped">
                <thead>
                    <tr>
                        <th>Enunciado</th>
                        <th>Alternativa A</th>
                        <th>Alternativa B</th>
                        <th>Alternativa C</th>
                        <th>Alternativa D</th>
                        <th>Alternativa Correta</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryQuestoes = consultarQuestoesPorAvaliacao($idAvaliacao);
                    while ($dadosQuestoes = mysql_fetch_array($queryQuestoes))
                    {
                        ?>  
                        <tr>
                            <td><?php echo $dadosQuestoes['enunciado'] ?></td>
                            <td><?php echo $dadosQuestoes['a'] ?></td>
                            <td><?php echo $dadosQuestoes['b'] ?></td>
                            <td><?php echo $dadosQuestoes['c'] ?></td>
                            <td><?php echo $dadosQuestoes['d'] ?></td>
                            <td><?php echo $dadosQuestoes['resposta'] ?></td>
                            <td>
                                <a href="alterarQuestao.php?idQuestao=<?php echo $dadosQuestoes['id'] ?>&idAvaliacao=<?php echo $idAvaliacao ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                                <hr/>
                                <a href="deletarQuestao.php?idQuestao=<?php echo $dadosQuestoes['id'] ?>&idAvaliacao=<?php echo $idAvaliacao ?>"><span class="glyphicon glyphicon-minus"></span>Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br/><br/>
        <hr/>
        <h4>Painel Administrativo</h4>
        <a href="cadastrarQuestao.php?id=<?php echo $idAvaliacao ?>"><button class="btn-success">Adicionar Nova Questão</button></a>
    </div>
</section>

<?php include '../template/footer.php'; ?>

