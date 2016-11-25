<?php

require_once '../../functions/validateSessionFunctions.php';
require_once '../../functions/functionsBd.php';
validateHeader();


cadastrarAvaliacao($_GET['idDisciplina'], $_GET['idTurma']);

include("../template/footer.php")

?>
