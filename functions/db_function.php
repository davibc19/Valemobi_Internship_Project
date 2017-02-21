<?php

include '../../functions/db_conection.php';

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE CREATE
 * ---------------------------------------------------------------------- */

/*
function cadastrarUsuario($tipo, $cpf, $nome, $senha, $dataNasc) {
    $res = "INSERT INTO usuarios (tipo, cpf, nome, senha, dataNasc)"
            . " VALUES ('$tipo', '$cpf', '$nome', '$senha', '$dataNasc')";

    if (mysql_query($res)) {
        echo "<script> alert('Usuário cadastrado com sucesso!'); "
        . "window.location='../index/login_index.php';</script>";
    } else {
        echo "<script> alert('Erro no cadastro do usuario!');"
        . " window.location='cadastrarUsuario.php';</script>";
    }
}
*/
/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE READ
 * ---------------------------------------------------------------------- */

// Função responsável por retornar a query de todas as mercadorias
function consultarTodasMercadorias() {
    // Abre conexão
    $conn = createConn();

    RETURN mysqli_query($conn, "SELECT * FROM mercadoria");
}

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE UPDATE
 * ---------------------------------------------------------------------- */

//

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE DELETE
 * ---------------------------------------------------------------------- */

//