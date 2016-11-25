<?php 
include '../../functions/validateSessionFunctions.php';
validateHeader();
?>

<div class="container">
    <form id="formLogin" name="formLogin" action="../../functions/confirmaLogin.php" method="POST">
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" required class="form-control" name="cpf" onkeypress="mascara(this, mcpf);" maxlength="14">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" required class="form-control" name="senha">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<?php include '../template/footer.php'  ?>