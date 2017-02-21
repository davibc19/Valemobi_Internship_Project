<?php
// Inclui funções do Banco de Dados e o Header. Ao final do arquivo, incluimos o Footer
include '../../functions/db_function.php';
include '../template/header.php';

$codigoMercadoria = $_GET['id'];

cadastrarOperacao($codigoMercadoria);

