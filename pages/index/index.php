<?php
// Inclui funções do Banco de Dados e o Header. Ao final do arquivo, incluimos o Footer
include '../../functions/db_function.php';
include '../template/header.php';
?>

<!-- Página Inicial -->
<section id="index_page" class="container">
    <div class="container">
        <h1 class="header">Mercadorias</h1>
        <div class="table-responsive">
            <table id="listarMercadorias" class="table table-striped">
                <thead>
                    <tr>
                        <th>Código da Mercadoria</th>
                        <th>Tipo da Mercadoria</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Tipo de Negócio</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Busca as mercadorias e as lista em uma tabela
                    $queryMercadorias = consultarTodasMercadorias();
                    while ($dadosMercadorias = mysqli_fetch_assoc($queryMercadorias)) {
                        $codigoMercadoria = $dadosMercadorias['codigo'];
                        ?>  
                        <tr>
                            <td width="10%"><?php echo $dadosMercadorias['codigo'] ?></td>
                            <td><?php echo $dadosMercadorias['tipo_mercadoria'] ?></td>
                            <td><?php echo $dadosMercadorias['nome'] ?></td>
                            <td><?php echo $dadosMercadorias['quantidade'] ?></td>
                            <td><?php echo $dadosMercadorias['preco'] ?></td>
                            <td><?php echo $dadosMercadorias['tipo_negocio'] ?></td>
                            <td width="20%">
                                <a href="../operacoes/insert_operation.php?id=<?php echo $codigoMercadoria ?>"><span class="glyphicon glyphicon-plus-sign"></span> Realizar <?php echo $dadosMercadorias['tipo_negocio'] ?></a>
                            </td>
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

