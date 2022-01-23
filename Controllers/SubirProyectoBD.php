<?php
	include_once('cnx.php');
	session_start();
    $varsesion=$_SESSION['usuario'];
	if($varsesion==null||$varsesion==''){
		echo 'usted no tiene autorización';
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
	$Nombre_Proyecto=$_POST['Nomb_Proyecto'];
	$Descrip_Proyecto=$_POST['Descrip_Proyecto'];
	if($tamagno_imagen<=30000){
		if($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif"){
			//ruta de la carpeta destino servidor
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/ProyectoMelamina/Content/images/uploads/';
			//movemos imagen del dir temporal al directorio escogido
			move_uploaded_file($_FILES['uploadimg']['tmp_name'],$carpeta_destino.$nombre_imagen);
			//print move_uploaded_file($_FILES['uploadimg']['tmp_name'],$carpeta_destino.$nombre_imagen);
			$sql="INSERT INTO tb_proyectos (id_proyecto, nombre, Descripcion, imagen, estado) VALUES (null,'$Nombre_Proyecto','$Descrip_Proyecto','../Content/images/uploads/$nombre_imagen', b'1')";
			$resultado=$pdo->prepare($sql);
			$resultado->execute();
			$pdo=null;
		}
		else{
			echo 'solo se permite subir imagenes';
		}
	}
	else{
		echo 'el tamaño es demasiado grande';
	}
?>