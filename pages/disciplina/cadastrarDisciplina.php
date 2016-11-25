<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

if (isset($_POST['enviar']))
{
    cadastrarDisciplina($_POST['codigo'], $_POST['nome']);
}
?>

<!-- FORMULÁRIO PARA CADASTRO DE UM NOVO USUÁRIO -->
<div class="container">
    <form action="cadastrarDisciplina.php" method="post" name="CadastrarDisciplina">
        <!-- CÓDIGO -->
        <div class="form-group">
            <label for="codigo">CÓDIGO:</label>
            <input type="text" name="codigo" required class="form-control" placeholder="XXX000" id="codigo" maxlength="6">
        </div>
        
        <!-- NOME COMPLETO -->
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" required class="form-control" id="nome">
        </div>

        <!-- BOTÕES DE ACESSO AO FORMULÁRIO: SUBMIT E RESET -->
        <button type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </form>
</div>

<?php include("../template/footer.php") ?>
