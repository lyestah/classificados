<?php 
session_start();
global $pdo;
try {
	$pdo=new PDO("mysql:dbname=classificados;host=localhost","root","");
} catch (PDOException $e) {
	echo "Erro ao acessar banco de Dados";
	exit;
}
 ?>