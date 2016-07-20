<?php
require ("../class/conecta_db.php");
function checar($id, $imgs){
	if(file_exists("../img/".$id."/".$imgs.".jpg")){
		return checar($id, $imgs+1);
	}else{
		return $imgs;
	}
}
if(isset($_FILES["file"]))
{
	$id = $_POST["id"];
	$total = count($_FILES["file"]["tmp_name"]);
	if(file_exists("../img/".$id)){
		}else{
		mkdir("../img/".$id);
	}
	for($i=0;$i < $total; $i++){
		$imgs=$i+1;
		$imgid = checar($id, $imgs);
		$sourcePath = $_FILES['file']['tmp_name'][$i]; 
		$targetPath = "../img/".$id."/".$imgid.".jpg"; 
		move_uploaded_file($sourcePath,$targetPath) ; 
		$diretorio="img/".$id."/".$imgid.".jpg";
		$att=$conn->prepare("INSERT INTO img (id_veiculo, posicao, url) VALUES (:idv, :pos, :url)");
		$att->bindValue(":idv", $id, PDO::PARAM_INT);
		$att->bindValue(":pos", $imgid, PDO::PARAM_INT);
		$att->bindValue(":url", $diretorio, PDO::PARAM_STR);
		$att->execute();
	}
}
?>