<?php
error_reporting(0);
//conexion para el servidor remoto 000webhostapp.com
/*$link='mysql:host=localhost;dbname=id16497396_jcmelamina';
$user='id16497396_root';
$password='_JZC1De+-26EiT\i';
try{
	$pdo=new PDO($link, $user, $password);
	//echo 'conectado';	
}catch(PDOException $e){
	print '¡Error!: ' . $e->getMessage() . "<br/>";
	die();
}*/
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