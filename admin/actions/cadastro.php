<?php
require ("../class/conecta_db.php");
require ("../class/veiculo.php");
//recebe variaveis do adicionar.php
$modelo = trim($_POST["modelo"]);
$ano = trim($_POST["ano"]);
$motor = trim($_POST["motor"]);
$codigo = trim($_POST["codigo"]);
$combustivel = trim($_POST["combustivel"]);
$cor = trim($_POST["cor"]);
$preco = trim($_POST["preco"]);
$categoria = trim($_POST["categoria"]);
$transmissao = trim($_POST["transmissao"]);
$portas = trim($_POST["portas"]);
$descricao = trim($_POST["descricao"]);

$carro = new Veiculo();
$resultado=$carro->cadastrar($conn, $modelo, $ano, $cor, $preco, $portas, $motor, $codigo, $categoria, $combustivel, $transmissao, $descricao);

echo $resultado;
