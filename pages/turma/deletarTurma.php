<?php
include '../../functions/validateSessionFunctions.php';
include '../../functions/functionsBd.php';
validateHeader();

deletarTurma($_GET['id']);