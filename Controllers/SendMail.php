<?php
error_reporting(0);
function sendMailTo ($correo,$consulta){
    $header = "From: " . $correo ."\r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/html";
    $mensaje = "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body style='margin: auto;'><div style='width:50%; text-align:center;'><h3>Su correo es: <span style='font-weight: bold;'>$correo</span></h3><p style='font-size: 18px; font-weight: bold;'>Consulta de Instalación: </p><p><br><span style='font-size: 18px; text-align:justify;'>$consulta</span></p><br><h5>Fecha de Consulta: ".date('d/m/y',time())."</h5><img src='http://jyc-melamina.000webhostapp.com/Content/images/uploads/20210428_215222.png' width='400'></div></body></html>";
    $para = 'melamina.jyc@gmail.com';
    $asunto = 'CONSULTA DE INSTALACION';
    if(mail($para, $asunto, utf8_decode($mensaje), $header)){
		return 1;
	}
	return 0;
}
$correo= $_POST['correo'];
$consulta = $_POST['consulta'];
echo sendMailTo($correo,$consulta);
?>