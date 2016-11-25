<?php

session_start();

// Valida o tipo de usuário que iniciou a sessão, ou se é um usuário não-logado
function validateHeader()
{
    // Usuário não está logado no sistema
    if (!isset($_SESSION["tipo"]))
    {
        include("../template/headerOF.php");
    }
    // Usuário Administrador
    else if (strcmp($_SESSION["tipo"], "Admin") == 0)
    {
        include("../template/headerAdmin.php");
    }
    // Usuário Professor
    else if (strcmp($_SESSION["tipo"], "Professor") == 0)
    {
        include("../template/headerProf.php");
    }
    // Usuário Alumnos
    else if (strcmp($_SESSION["tipo"], "Aluno") == 0)
    {
        include("../template/headerAluno.php");
    }
}
?>