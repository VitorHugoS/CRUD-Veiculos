<?php
session_start();
require ("../class/conecta_db.php");
require ("../class/login.php");

$user = trim($_POST["user"]);
$pass = trim($_POST["pass"]);

$login = new Login();
$result = $login->checaLogin($conn, $user, $pass);
if($result>0){
	$_SESSION["autenticado"]=1;
	echo $result;
}else{
	session_destroy();
	echo $result;
}
