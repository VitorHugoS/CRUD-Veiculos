<?php
class Login{
	private $Usuario;
	private $Senha;

	function checaLogin($conn, $user, $senha){
		$buscar = $conn->prepare("SELECT * from login where user = :user and senha = MD5(:senha)");
		$buscar->bindValue(":user", $user, PDO::PARAM_STR);
		$buscar->bindValue(":senha", $senha, PDO::PARAM_STR);
		$buscar->execute();
		$linhas = $buscar->rowCount();
		return $linhas;
	}
}