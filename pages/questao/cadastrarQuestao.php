<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

$dadosAvaliacao = mysql_fetch_array(consultarAvaliacoesPorId($_GET['id']));

if (isset($_POST['enviar']))
{
    cadastrarQuestao($_GET['id'], $_POST['enunciado'], $_POST['a'], $_POST['b'], $_POST['c'], $_POST['d'], $_POST['resposta']);
}
?>


<section id="cadastrarQuestao" class="container">
    <div class="bs-component">
        <ul class="breadcrumb">
            <li> <a class="link-breadcrumb" href="../index/indexProfessor.php">Home</a></li>
            <li> <a class="link-breadcrumb" href="../avaliacao/infoAvaliacao.php?id=<?php echo $dadosAvaliacao['idTurma'] ?>">Avaliação</a></li>
            <li> <a class="link-breadcrumb" href="../questao/infoQuestao.php?id=<?php echo $dadosAvaliacao['id'] ?>&idTurma=<?php echo $dadosAvaliacao['idTurma'] ?>">Questão</a></li>
            <li class="active">Alterar Questão</li>
        </ul>
    </div>

    <!-- FORMULÁRIO PARA CADASTRO DE UM NOVO USUÁRIO -->
    <div class="container">
        <form action="cadastrarQuestao.php?id=<?php echo $_GET['id'] ?>" method="post" name="CadastrarQuestao">
            <!-- ENUNCIADO -->
            <div class="form-group">
                <label for="enunciado">Enunciado:</label>
                <input type="text" name="enunciado" required class="form-control" id="enunciado">
            </div>

            <!-- QUESTAO A -->
            <div class="form-group">
                <label for="a">Opcao A:</label>
                <input type="text" name="a" required class="form-control" id="a">
            </div>

            <!-- QUESTAO B -->
            <div class="form-group">
                <label for="b">Opcao B:</label>
                <input type="text" name="b" required class="form-control" id="b">
            </div>

            <!-- QUESTAO C -->
            <div class="form-group">
                <label for="c">Opcao C:</label>
                <input type="text" name="c" required class="form-control" id="c">
            </div>

            <!-- QUESTAO D -->
            <div class="form-group">
                <label for="d">Opcao D:</label>
                <input type="text" name="d" required class="form-control" id="d">
            </div>

            <div class="form-group">
                <label for="resposta">Resposta Correta:</label>
                <br/>
                <input type="radio" required id="resposta" name="resposta" value="A"> A
                <br/>
                <input type="radio" required id="resposta" name="resposta" value="B"> B
                <br/>
                <input type="radio" required id="resposta" name="resposta" value="C"> C
                <br/>
                <input type="radio" required id="resposta" name="resposta" value="D"> D
                <br/>
            </div>

            <!-- BOTÕES DE ACESSO AO FORMULÁRIO: SUBMIT E RESET -->
            <button type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
            <button type="reset" class="btn btn-warning">Limpar</button>
        </form>
    </div>
</section>
<?php include("../template/footer.php") ?>
