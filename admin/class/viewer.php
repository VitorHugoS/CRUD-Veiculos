<?php
class Viewer{
	//Titulo header page
	function carregaTitulo($conn){
		$buscar=$conn->query("SELECT titulo from config");
		return $buscar->fetch();	
	}
	//carregar categorias dos veliculos
	function carregaCategorias($conn){
		$buscar=$conn->query("SELECT * from categorias order by nome asc");
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carregar 1 categoria
	function carregaCategoriaUnica($conn, $id){
		$buscar=$conn->prepare("SELECT * from categorias where id = :id");
		$buscar->bindValue(":id", $id, PDO::PARAM_INT);
		$buscar->execute();
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carregar combustiveis
	function carregaCombs($conn){
		$buscar=$conn->query("SELECT * from combustivel order by nome asc");
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carregar 1 combustivel
	function carregaCombustivelUnica($conn, $id){
		$buscar=$conn->prepare("SELECT * from combustivel where id = :id");
		$buscar->bindValue(":id", $id, PDO::PARAM_INT);
		$buscar->execute();
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carregar todos os veiculos
	function carregaVeiculos($conn){
		$buscar=$conn->query("SELECT * from carro order by id asc");
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carregar todos os veiculos
	function carregaVeiculosUltimos($conn){
		$buscar=$conn->query("SELECT * from carro order by id desc limit 5");
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carrega veiculo unico
	function carregaVeiculoUnico($conn, $id){
		$buscar=$conn->prepare("SELECT * from carro where id = :id");
		$buscar->bindValue(":id", $id, PDO::PARAM_INT);
		$buscar->execute();
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carrega imagem principal
	function carregaImagemPrincipal($conn, $id){
		$buscar=$conn->prepare("SELECT url from img where id_veiculo = :id order by posicao asc limit 1");
		$buscar->bindValue(":id", $id, PDO::PARAM_INT);
		$buscar->execute();
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
	//carrega todas as imagens do veiculo
	function carregaTodasImagensVeiculo($conn, $id){
		$buscar=$conn->prepare("SELECT id, url from img where id_veiculo = :id order by posicao asc");
		$buscar->bindValue(":id", $id, PDO::PARAM_INT);
		$buscar->execute();
		return $buscar->fetchAll(PDO::FETCH_ASSOC);
	}
}