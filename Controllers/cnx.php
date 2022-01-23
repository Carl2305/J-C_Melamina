<?php
error_reporting(0);
//conexion para la BD en localhost

$servidor='mysql:host=localhost;dbname=jcmelamina';
$user='root';
$password='';

try{
	$pdo=new PDO($servidor, $user, $password);
	//echo 'conectado';	
}catch(PDOException $e){
	print '¡Error!: ' . $e->getMessage() . "<br/>";
	die();
}
?>
