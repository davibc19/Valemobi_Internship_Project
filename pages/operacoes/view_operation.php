<?php
// Inclui funções do Banco de Dados e o Header. Ao final do arquivo, incluimos o Footer
include '../../functions/db_function.php';
include '../template/header.php';
?>

<!-- Página Inicial -->
<section id="view_operations_page" class="container">
    <div class="container">
        <h1 class="header">Operações</h1>
        <div class="table-responsive">
            <table id="listarOperacoes" class="table table-striped">
                <thead>
                    <tr>
                        <th>Código da Mercadoria</th>
                        <th>Tipo da Mercadoria</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Tipo de Negócio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Busca as mercadorias e as lista em uma tabela
                    $query = consultarTodasOperacoes();
                    while ($dados = mysqli_fetch_assoc($query)) {
                        ?>  
                        <tr>
                            <td width="10%"><?php echo $dados['codigo'] ?></td>
                            <td><?php echo $dados['tipo_mercadoria'] ?></td>
                            <td><?php echo $dados['nome'] ?></td>
                            <td><?php echo $dados['quantidade'] ?></td>
                            <td><?php echo $dados['preco'] ?></td>
                            <td><?php echo $dados['tipo_negocio'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <br />
    </div>
</section>

<?php include '../template/footer.php'; ?>

