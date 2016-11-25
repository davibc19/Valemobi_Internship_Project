<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

$idTurma = $_GET['id'];
$dadosTurma = mysql_fetch_array(consultarTurmaPorId($_GET['id']));
?>

<section id="cadastrarAluno" class="container">
        <div class="container">

            <h2 class="sub-header">Alunos</h2>
            <h4 class="sub-header">Escolha os alunos para esta turma</h4>
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
                        $queryAluno = consultarUsuarios("Aluno");
                        while ($dadosAlunos = mysql_fetch_array(($queryAluno)))
                        {
                            $idAluno = $dadosAlunos['id'];
                            $queryAlunoCadastrado = consultarUsuarioEmTurma($idAluno, $dadosTurma['idDisciplina']);
                            if(!$dados = mysql_fetch_array($queryAlunoCadastrado))
                            {
                                ?>  
                                <tr>
                                    <td><?php echo $dadosAlunos['nome'] ?></td>
                                    <td><?php echo $dadosAlunos['cpf'] ?></td>
                                    <td><a href="../turma/matricularAluno.php?idTurma=<?php echo $idTurma ?>&idAluno=<?php echo $idAluno ?>"><span class="glyphicon glyphicon-plus"></span> Matricular Aluno</a>
                                </tr>
                            <?php
                            } else if($dados['idTurma'] == $idTurma)
                            {
                                ?>  
                                <tr>
                                    <td><?php echo $dadosAlunos['nome'] ?></td>
                                    <td><?php echo $dadosAlunos['cpf'] ?></td>
                                    <td><a href="../turma/desmatricularAluno.php?idTurma=<?php echo $idTurma ?>&idAluno=<?php echo $idAluno ?>"><span class="glyphicon glyphicon-plus"></span> Desmatricular Aluno</a>
                                </tr>
                                <?php
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td><?php echo $dadosAlunos['nome'] ?></td>
                                    <td><?php echo $dadosAlunos['cpf'] ?></td>
                                    <td>Aluno Matriculado Em Outra Turma Desta Disciplina</td>
                                </tr>
                                
                                <?php 
                            }
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
