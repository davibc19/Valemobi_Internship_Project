<?php

function createConn() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "valemobi";

// Cria Conexão
    $conn = mysqli_connect($servername, $username, $password, $dbname);

// Checa a Conexão
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    RETURN $conn;
}

?>
