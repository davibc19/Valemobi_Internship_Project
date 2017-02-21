<?php

include '../../functions/db_conection.php';

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE CREATE
 * ---------------------------------------------------------------------- */

// Função responsável por cadastrar uma operação
function cadastrarOperacao($codigo_mercadoria)
{
    // Abre conexão
    $conn = createConn();
    
    // Verifica se a operação foi feita com sucesso
    if(!mysqli_query($conn, "INSERT INTO operacao (codigo_mercadoria) VALUES ('".$codigo_mercadoria."')"))
    {
        // Ocorreu um erro, exibe o alerta
        echo "<script> alert('Erro ao cadastrar a operacao!'); "
        . "window.location='../index/index.php';</script>";
    }
    else
    {
        // A operação foi um sucesso
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
    
    // Retorna a query em questão
    RETURN mysqli_query($conn, "SELECT * FROM mercadoria");
}

// Função responsável por retornar a query de todas as operacoes
function consultarTodasOperacoes() {
    // Abre conexão
    $conn = createConn();
    
    // Retorna a query em questão
    RETURN mysqli_query($conn, 
            "SELECT * FROM mercadoria AS m JOIN operacao AS o ON m.codigo = o.codigo_mercadoria");
}

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE UPDATE
 * ---------------------------------------------------------------------- */

// Não há

/* ----------------------------------------------------------------------
 *                    FUNÇÕES DE DELETE
 * ---------------------------------------------------------------------- */

// Não há