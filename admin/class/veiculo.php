<?php

class Veiculo{
	private $Modelo;
	private $Ano;
	private $Cor;
	private $Preco;
	private $Portas;
	private $Motor;
	private $Codigo;
	private $Categoria;
	private $Combustivel;
	private $Transmissao;

	function cadastrar($conn, $modelo, $ano, $cor, $preco, $portas, $motor, $codigo, $categoria, $combustivel, $transmissao, $descricao){
		//prepara a query para receber as variaveis
		$cadastro=$conn->prepare("INSERT INTO carro (modelo, ano, motor, categoria, transmissao, combustivel, cor, portas, descricao, codigo, preco) VALUES (:model, :ano, :motor, :categoria, :transmissao, :combustivel, :cor, :portas, :descricao, :codigo, :preco)");
		//trata as variaveis
		$cadastro->bindParam(':model', $modelo, PDO::PARAM_STR);
		$cadastro->bindParam(':ano', $ano, PDO::PARAM_STR);
		$cadastro->bindParam(':categoria', $categoria, PDO::PARAM_STR);
		$cadastro->bindParam(':motor', $motor, PDO::PARAM_STR);
		$cadastro->bindParam(':transmissao', $transmissao, PDO::PARAM_STR);
		$cadastro->bindParam(':combustivel', $combustivel, PDO::PARAM_STR);
		$cadastro->bindParam(':cor', $cor, PDO::PARAM_STR);
		$cadastro->bindParam(':portas', $portas, PDO::PARAM_STR);
		$cadastro->bindParam(':descricao', $descricao, PDO::PARAM_STR);
		$cadastro->bindParam(':codigo', $codigo, PDO::PARAM_STR);
		$cadastro->bindParam(':preco', $preco, PDO::PARAM_STR);
		//executa a query
		try{
			$cadastro->execute();
			$id=$conn->lastinsertId();
			return $id; 
		}catch (PDOException $e){
			return 0;
		}
	}

	function atualizar($conn, $id, $modelo, $ano, $cor, $preco, $portas, $motor, $codigo, $categoria, $combustivel, $transmissao, $descricao){
		//prepara a query para receber as variaveis
		$cadastro=$conn->prepare("UPDATE carro SET modelo = :model, ano = :ano, motor = :motor, categoria = :categoria, transmissao = :transmissao, combustivel = :combustivel, cor = :cor, portas = :portas, descricao = :descricao, codigo = :codigo, preco = :preco where id = :id");
		//trata as variaveis
		$cadastro->bindParam(':model', $modelo, PDO::PARAM_STR);
		$cadastro->bindParam(':ano', $ano, PDO::PARAM_STR);
		$cadastro->bindParam(':categoria', $categoria, PDO::PARAM_STR);
		$cadastro->bindParam(':motor', $motor, PDO::PARAM_STR);
		$cadastro->bindParam(':transmissao', $transmissao, PDO::PARAM_STR);
		$cadastro->bindParam(':combustivel', $combustivel, PDO::PARAM_STR);
		$cadastro->bindParam(':cor', $cor, PDO::PARAM_STR);
		$cadastro->bindParam(':portas', $portas, PDO::PARAM_STR);
		$cadastro->bindParam(':descricao', $descricao, PDO::PARAM_STR);
		$cadastro->bindParam(':codigo', $codigo, PDO::PARAM_STR);
		$cadastro->bindParam(':preco', $preco, PDO::PARAM_STR);
		$cadastro->bindParam(':id', $id, PDO::PARAM_STR);
		//executa a query
		try{
			$cadastro->execute();
			return $id; 
		}catch (PDOException $e){
			return 0;
		}
	}

	function excluir($conn, $id){
		//deleta registros de imagens do veiculo
		$excluir=$conn->prepare("DELETE from img where id_veiculo = :id");
		$excluir->bindValue(":id", $id, PDO::PARAM_INT);
		try{
			$excluir->execute();
			$status = 1; 
		}catch (PDOException $e){
			$status = 0;
		}
		//se as imagens foram apagadas, entao apaga veiculo
		if($status==1){
			$excluir=$conn->prepare("DELETE from carro where id = :id");
			$excluir->bindValue(":id", $id, PDO::PARAM_INT);
			try{
				$excluir->execute();
				return 1;
			}catch (PDOException $e){
				return 0;
			}
		}else{
			return 0;
		}
	}
	function excluirimg($conn, $id){
		//deleta registros de imagens do veiculo
		$excluir=$conn->prepare("DELETE from img where id = :id");
		$excluir->bindValue(":id", $id, PDO::PARAM_INT);
		try{
			$excluir->execute();
			return 1; 
		}catch (PDOException $e){
			return 0;
		}
	}
}