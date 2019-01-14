<?php 
require 'config.php';
if(empty($_SESSION['cLogin'])){
	header("Location: login.php");
	exit;
}

require 'classes/Anuncios.php';
		$a=new Anuncios;

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$a->excluirAnuncio($_GET['id']);
		}
        header("Location: meusanuncios.php");
 ?>