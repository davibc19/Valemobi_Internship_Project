<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

$idDisciplina = $_GET['idDisciplina'];

if (!isset($_GET['idProf']))
{
    ?>
    <section id="cadastrarTurma" class="container">
        <div class="container">

            <h2 class="sub-header">Professores</h2>
            <h4 class="sub-header">Escolha um professor responsável por essa turma</h4>
            <div class="table-responsive">
                <table id="listarDisciplinas" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryProfessores = consultarUsuarios("Professor");
                        while ($dadosProfessores = mysql_fetch_array(($queryProfessores)))
                        {
                            $idProfessor = $dadosProfessores['id'];
                            ?>  
                            <tr>
                                <td><?php echo $dadosProfessores['nome'] ?></td>
                                <td><?php echo $dadosProfessores['cpf'] ?></td>
                                <td><a href="../turma/cadastrarTurma.php?idDisciplina=<?php echo $idDisciplina ?>&idProf=<?php echo $idProfessor ?>"><span class="glyphicon glyphicon-plus"></span> Selecionar Professor</a>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
} else
{
    $idProfessor = $_GET['idProf'];
    cadastrarTurma($idDisciplina, $idProfessor);
}






include '../template/footer.php'
?>