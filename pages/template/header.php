<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Escola ChX</title>

        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../../js/bootstrap.min.js"></script>

        <!-- Scripts -->
        <script type="text/javascript">
            function mascara(o, f) {
                v_obj = o
                v_fun = f
                setTimeout("execmascara()", 1)
            }
            function execmascara() {
                v_obj.value = v_fun(v_obj.value)
            }
            function mcpf(v)
            {
                v = v.replace(/\D/g, "")                    //Remove tudo o que não é dígito
                v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                //de novo (para o segundo bloco de números)
                v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
                return v
            }
            function mdate(v)
            {
                v = v.replace(/\D/g, "")                    //Remove tudo o que não é dígito
                v = v.replace(/(\d{4})(\d)/, "$1-$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                //de novo (para o segundo bloco de números)
                v = v.replace(/(\d{2})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
                return v
            }
            // CRIAÇÃO DA TABELA DINÂMICA
            $(document).ready(function ()
                {
                    $('#listarDisciplinas').DataTable();
                    $('#listarTurmas').DataTable();
                    $('#listarProfessores').DataTable();
                    $('#listarProfessorTurma').DataTable();
                    $('#listarAlunoTurma').DataTable();
                    $('#listarTurmaAluno').DataTable();
                    $('#listarAvaliacoes').DataTable();
                    $('#listarQuestoes').DataTable();
                });
            // FIM DA CRIAÇÃO
        </script>

        <!-- Funções para dataTable -->
        <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
    