<html lang="en">
    <head>
        <title>Valemobi</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../js/bootstrap.min.js"></script>

        <!-- Scripts -->
        <script type="text/javascript">
            // CRIAÇÃO DA TABELA DINÂMICA
            $(document).ready(function ()
                {
                    $('#listarMercadorias').DataTable();
                    $('#listarOperacoes').DataTable();
                });
            // FIM DA CRIAÇÃO
        </script>

        <!-- Funções para dataTable -->
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="../index/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="../operacoes/view_operation.php"><span class="glyphicon glyphicon-tag"></span> Operações</a></li>
                </ul>
            </div>
        </nav>

    