<?php

//Conexao em PDO

//variaveis para a conexao com o DB
$url = "localhost";
$dbname = "banco";
$user = "usuario";
$pass = "";

try {
    $conn = new PDO('mysql:host='.$url.';dbname='.$dbname.'', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erro de conexão com o DB: ' . $e->getMessage();
}