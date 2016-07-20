<?php
session_start();
//carrega conexao com o DB
require ("conecta_db.php");
//carrega funcoes basicas de exibicao da pagina
require ("viewer.php");

$views = new Viewer();
//titulo da pagina
$titulo = $views->carregaTitulo($conn);
//categoria de veiculos
$categorias = $views->carregaCategorias($conn);
//tipos de combustives
$combustivel = $views->carregaCombs($conn);
//carega veiculos
$veiculos = $views->carregaVeiculos($conn);
//carega ultimos veiculos
$veiculosu = $views->carregaVeiculosUltimos($conn);