<?php
error_reporting(0);
function LoadLogo(){
    include_once('cnx.php');
	session_start();
    $varsesion=$_SESSION['usuario'];
	if($varsesion==null||$varsesion==''){
		echo '<h1>usted no tiene autorización</h1>';
		header('location:../index.php');
		die();
	}
	$nombre_img=$_FILES['uploadimg']['name'];
	if($nombre_img==''){
		echo 'eliga una imagen!!!';
		return ;
	}
	else{
		$nombre_imagen=date("Ymd_His").'.'.pathinfo($nombre_img, PATHINFO_EXTENSION);
	}
    $tipo_imagen=$_FILES['uploadimg']['type'];
	$tamagno_imagen=$_FILES['uploadimg']['size'];
    if($tamagno_imagen<=30000){
        if($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif"){
            //ruta de la carpeta destino servidor
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectoMelamina/Content/images/uploads/';
            //movemos imagen del dir temporal al directorio escogido
			move_uploaded_file($_FILES['uploadimg']['tmp_name'],$carpeta_destino.$nombre_imagen);
            $sql="update tb_contenidopagina set img_contenido='../Content/images/uploads/$nombre_imagen', fecha_modificacion=NOW() where id_objeto='Logotipo_JCMelamina'"; 
            $resultado=$pdo->prepare($sql);
			$resultado->execute();
			//header('location:../Intranet/PanelIntranet/Novedades.php');
			$pdo=null;
        }
    }
}
echo LoadLogo();  
?>