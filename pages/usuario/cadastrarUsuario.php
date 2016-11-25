<?php
require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();

if (isset($_POST['enviar']))
{
    cadastrarUsuario($_POST['tipoUsr'], $_POST['cpf'], $_POST['nome'], 
            $_POST['senha'], $_POST['dataNasc']);
}
?>

<!-- FORMULÁRIO PARA CADASTRO DE UM NOVO USUÁRIO -->
<div class="container">
    <form action="cadastrarUsuario.php" method="post" name="CadastrarUsuario">
        <!-- TIPO -->
        <div class="form-group">
            <label for="tipoUsr">Tipo de Usuário</label>
            <br/>
            <select class="selectpicker form-control" id="tipoUsr" name="tipoUsr">
                <option value="Professor">Professor</option>
                <option value="Aluno">Aluno</option>
            </select>
        </div>
        
        <!-- CPF -->
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required class="form-control" placeholder="000.000.000-00" id="cpf" onkeypress="mascara(this, mcpf);" maxlength="14">
        </div>
        
        <!-- SENHA -->
        <div class="form-group">
            <label for="pwd">Senha:</label>
            <input type="password" name="senha" required class="form-control" id="pwd">
        </div>
        
        <!-- NOME COMPLETO -->
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" required class="form-control" id="nome">
        </div>

        <!-- DATA DE NASCIMENTO -->
        <div class="form-group">
            <label for="dataNasc">Data de Nascimento:</label>
            <input type="date" name="dataNasc" required class="form-control"  placeholder="YYYY-MM-DD" id="dataNasc" onkeypress="mascara(this, mdate);" maxlength="10">
        </div>

        <!-- BOTÕES DE ACESSO AO FORMULÁRIO: SUBMIT E RESET -->
        <button type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </form>
</div>

<?php include("../template/footer.php") ?>
