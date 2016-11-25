<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

if (isset($_POST['enviar']))
{
    alterarDisciplina($_POST['id'], $_POST['codigo'], $_POST['nome']);
}

$query = consultarDisciplinaPorId($_GET['id']);
$dados = mysql_fetch_array($query);

?>

<div class="container">
    <form action="alterarDisciplina.php" method="post" name="AlterarDisciplina">
        <!-- CÓDIGO -->
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" class="form-control" id="codigo" value="<?php echo $dados['codigo'] ?>" maxlength="6">
        </div>
        
        <!-- NOME COMPLETO -->
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $dados['nome'] ?>">
        </div>
        
        <!-- ID - HIDDEN -->
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $dados['id'] ?>">
        </div>

        <button type="submit" name="enviar" class="btn btn-success">Alterar</button>
        <button type="reset" name="limpar" class="btn btn-warning">Limpar</button>
    </form>
</div>

<?php include("../template/footer.php") ?>