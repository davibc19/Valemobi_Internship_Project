<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

if (isset($_GET['idAvaliacao']) && isset($_GET['idQuestao']))
{
    $idAvaliacao = $_GET['idAvaliacao'];
    $idQuestao = $_GET['idQuestao'];
    $dadosAvaliacoes = mysql_fetch_array(consultarAvaliacoesPorId($idAvaliacao));
    $dadosQuestao = mysql_fetch_array(consultarQuestaoPorId($idQuestao));

    if (isset($_POST['enviar']) && $dadosAvaliacoes['status'] == 'ativo')
        alterarQuestao($idQuestao, $idAvaliacao, $_POST['enunciado'], $_POST['a'], $_POST['b'], $_POST['c'], $_POST['d'], $_POST['resposta']);
    else if (isset($_POST['enviar']) && $dadosAvaliacoes['status'] == 'inativo')
        echo "<script> alert('[ERRO] Essa avaliação já foi respondida por um aluno, portanto nenhuma questão poderá mais ser excluida!');</script>";
    ?>

    <section id="alterarQuestao" class="container">

        <div class="bs-component">
            <ul class="breadcrumb">
                <li> <a class="link-breadcrumb" href="../index/indexProfessor.php">Home</a></li>
                <li> <a class="link-breadcrumb" href="../avaliacao/infoAvaliacao.php?id=<?php echo $idTurma ?>">Avaliação</a></li>
                <li> <a class="link-breadcrumb" href="../questao/infoQuestao.php?id=<?php echo $idAvaliacao ?>&idTurma=<?php echo $dadosAvaliacoes['idTurma'] ?>">Questão</a></li>
                <li class="active">Alterar Questão</li>
            </ul>
        </div>
        <div class="container">
            <form action="alterarQuestao.php?idQuestao=<?php echo $_GET['idQuestao'] ?>&idAvaliacao=<?php echo $_GET['idAvaliacao'] ?>" method="post" name="AlterarQuestao">
                <!-- ENUNCIADO -->
                <div class="form-group">
                    <label for="enunciado">Enunciado:</label>
                    <input type="text" name="enunciado" required class="form-control" id="enunciado" value="<?php echo $dadosQuestao['enunciado'] ?>">
                </div>

                <!-- QUESTAO A -->
                <div class="form-group">
                    <label for="a">Opcao A:</label>
                    <input type="text" name="a" required class="form-control" id="a" value="<?php echo $dadosQuestao['a'] ?>">
                </div>

                <!-- QUESTAO B -->
                <div class="form-group">
                    <label for="b">Opcao B:</label>
                    <input type="text" name="b" required class="form-control" id="b" value="<?php echo $dadosQuestao['b'] ?>">
                </div>

                <!-- QUESTAO C -->
                <div class="form-group">
                    <label for="c">Opcao C:</label>
                    <input type="text" name="c" required class="form-control" id="c" value="<?php echo $dadosQuestao['c'] ?>">
                </div>

                <!-- QUESTAO D -->
                <div class="form-group">
                    <label for="d">Opcao D:</label>
                    <input type="text" name="d" required class="form-control" id="d" value="<?php echo $dadosQuestao['d'] ?>">
                </div>

                <div class="form-group">
                    <label for="resposta">Resposta Correta:</label>
                    <br/>
                    <?php
                    if ($dadosQuestao['resposta'] == 'A')
                    {
                        ?>
                        <input type="radio" checked="checked" required id="resposta" name="resposta" value="A"> A
                        <?php
                    } else
                    {
                        ?>
                        <input type="radio" required id="resposta" name="resposta" value="A"> A
                        <?php
                    }
                    ?>
                    <br/>
                    <?php
                    if ($dadosQuestao['resposta'] == 'B')
                    {
                        ?>
                        <input type="radio" checked="checked" required id="resposta" name="resposta" value="B"> B
                        <?php
                    } else
                    {
                        ?>
                        <input type="radio" required id="resposta" name="resposta" value="B"> B
                        <?php
                    }
                    ?>
                    <br/>
                    <?php
                    if ($dadosQuestao['resposta'] == 'C')
                    {
                        ?>
                        <input type="radio" checked="checked" required id="resposta" name="resposta" value="C"> C
                        <?php
                    } else
                    {
                        ?>
                        <input type="radio" required id="resposta" name="resposta" value="C"> C
                        <?php
                    }
                    ?>
                    <br/>
                    <?php
                    if ($dadosQuestao['resposta'] == 'D')
                    {
                        ?>
                        <input type="radio" checked="checked" required id="resposta" name="resposta" value="D"> D
                        <?php
                    } else
                    {
                        ?>
                        <input type="radio" required id="resposta" name="resposta" value="D"> D
                        <?php
                    }
                    ?>

                    <br/>
                </div>

                <!-- BOTÕES DE ACESSO AO FORMULÁRIO: SUBMIT E RESET -->
                <button type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
        </div>
    </section>

    <?php
}
include '../template/footer.php';
?>