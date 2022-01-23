<?php
error_reporting(0);
header('Content-type: application/json; charset=utf-8');
function AllProyectos(){
	include_once('cnx.php');
	$query='SELECT * FROM tb_proyectos';
	$resul=$pdo->prepare($query);
	$resul->execute();
	$data=$resul->fetchAll(PDO::FETCH_ASSOC);
	$result= json_encode($data, JSON_UNESCAPED_UNICODE);
	return $result;
	$pdo=null;
}
echo AllProyectos();
?>