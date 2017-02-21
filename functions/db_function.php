<?php

include '../../functions/db_conection.php';

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE CREATE
 * ---------------------------------------------------------------------- */

function cadastrarOperacao($codigo_mercadoria)
{
    $conn = createConn();
    
    if(!mysqli_query($conn, "INSERT INTO operacao (codigo_mercadoria) VALUES ('".$codigo_mercadoria."')"))
    {
        echo "<script> alert('Erro ao cadastrar a operacao!'); "
        . "window.location='../index/index.php';</script>";
    }
    else
    {
        echo "<script> alert('Operação cadastrada com sucesso!'); "
        . "window.location='../index/index.php';</script>";
    }
}

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