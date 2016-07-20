<?php
require ("../class/conecta_db.php");
require ("../class/veiculo.php");
$id = $_POST["id"];

$carro = new Veiculo();
$resultado = $carro->excluir($conn, $id);
echo $resultado;