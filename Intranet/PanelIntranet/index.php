<?php
    error_reporting(0);
	session_start();
	$varsesion=$_SESSION['usuario'];
	if($varsesion==null||$varsesion==''){
		echo '<h1>usted no tiene autorización</h1>';
		header('location:../../index.php');
		die();
	}
?>
<!doctype html>
<html lang="es"><!-- InstanceBegin template="/Templates/TemplateIntranet.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel Intanet :: Inicio</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
    <link href="../../Content/css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
	<!--<link href="../Content/css/Styles.css" rel="stylesheet" type="text/css">-->
<!-- InstanceEndEditable -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">J&C Melamina</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent1">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Inicio</a>
					</li>
				  	<li class="nav-item active">
						<a class="nav-link" href="Novedades.php">Novedades</a>
					</li>
				  	<li class="nav-item active">
						<a class="nav-link" href="#">Nosotros</a>
					</li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../../Controllers/cerrar_session.php">Cerrar Sesión</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    <!-- InstanceBeginEditable name="main" -->
    <div class="container">
        <div class="row mt-3 mb-3">
            <!--<div class="col-sm-12 col-md-4">
               <h5>Logotipo J&C Melamina</h5>
            </div>-->
            <div class="col-sm-12 col-md-6">
                <figure style="border: 1px solid gray;">
                    <img class="img-fluid" id="imgLogo" style="width: 100%;" onClick="ContenidoPage(0);">
                    <figcaption style="background-color: black; color: white;">Logotipo J&C Melamina</figcaption>
                </figure>
            </div>
            <div class="col-sm-12 col-md-6">
                <button class="btn btn-success" id="UpdateLogo">Cambiar Logotipo</button>
            </div>
	    </div>
        <div class="modal" tabindex="-1" id="myModal_logo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiar Logotipo J&C Melamina</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off" id="formUploadLogo" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <input type="file" name="uploadimgLogo" size="1" accept="image/png, image/jpeg, image/gif" id="uploadimgLogo" style="width: 155px;">
                                </div>
                                <div class="col-12">
                                    <img class="img-fluid" id="imgPreview" width="250">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>
    </div>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="scripts" -->
    <script src="../../Content/js/jquery-3.3.1.min.js"></script>
	<script src="../../Content/js/bootstrap-4.3.1.js"></script>
	<script src="../../Content/js/popper.min.js"></script>
    <script src="../../Content/js/PanelIntranetIndex.js"></script>
    <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
