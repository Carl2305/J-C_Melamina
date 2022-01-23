<?php
error_reporting(0);
function Logueo(){
	session_start();
	include_once('cnx.php');
	$login=htmlentities(addslashes($_POST['Usuario']));
	$password=htmlentities((addslashes($_POST['Contraseña'])));
	$contador=0;
	$sql="SELECT * FROM tb_personalempresa where usuario= :login";
	$resultado=$pdo->prepare($sql);
	$resultado->execute(array(":login"=>$login));
	while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		if(password_verify($password,$registro['contrasena'])){
			$contador++;
		}
	}
	if($contador>0){
		$_SESSION['usuario']=$login;
		header('location:../Intranet/PanelIntranet/index.php');
		$Fecha= date('Y-m-d H:i:s');
		echo $Fecha;
		$query="UPDATE tb_personalempresa SET hora_acceso ='$Fecha' WHERE usuario = '$login'";
		$result=$pdo->prepare($query);
		$result->execute();
	}
	else{
		//echo 'error';
		header('location:../Intranet/Login/index.php');
	}
	$resultado->closeCursor();
	$pdo=null;
}
echo Logueo();
?>