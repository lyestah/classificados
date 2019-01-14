<?php 
class Categorias{

	public function getLista(){
		global $pdo;
		$array=Array();
		$sql=$pdo->query("SELECT * FROM categorias");
		if($sql->rowCount() > 0){
			$array=$sql->fetchAll();
		}
		return $array;
	}
}

 ?>