<?php
error_reporting(0);
header('Content-type: application/json; charset=utf-8');
function CargaObjeto(){
    include_once('cnx.php');
        $sql="SELECT * FROM tb_contenidopagina";
        $resultado=$pdo->prepare($sql);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $resultado= json_encode($data, JSON_UNESCAPED_UNICODE);
        return $resultado;
        $pdo=null;
}
echo CargaObjeto();
?>