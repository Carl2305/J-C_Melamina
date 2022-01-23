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
<title>Panel Intanet :: Novedades</title>
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
        <div class="p-3 d-flex justify-content-end">
			<button class="btn btn-success" id="agregarProyecto">Agragar Proyecto</button>
		</div>
		<div id="ListProyectos">
		    <!-- aqui cargan todos los proyectos subidos hasta el momento-->
		</div>
        <template id="itemsProyecto">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4 col-sm-12">
                        <img class="img-fluid" src="" alt="" title="" style="width: 100%; height: 100%; padding: 15px">
					</div>
					<div class="col-md-7 col-sm-12">
				        <div class="card-body">
							<h4 class="card-title">Nombre Proyecto</h4>
							<p class="card-text">Descripcion del Proyecto This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				        </div>
					</div>
					<div class="col-md-1 col-sm-12">
						<button class="btn btn-secondary" id="editProyect" onClick="alert('Funcion no disponible!!');">&#x270F;&#xFE0F;</button>
					</div>
                </div>
			</div>
		</template>
        <div class="modal" tabindex="-1" id="myModal">
            <div class="modal-dialog">
            	<div class="modal-content">
            		<div class="modal-header">
            			<h5 class="modal-title">Agregar Nuevo Proyecto</h5>
            			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            				<span aria-hidden="true">&times;</span>
            			</button>
            		</div>
            		<div class="modal-body">
            			<form autocomplete="off" id="formNewProyect" enctype="multipart/form-data">
            				<div class="row">
            					<div class="col-12">
            						<label>Nombre Proyecto</label><br>
            						<input type="text" class="form-control" name="Nomb_Proyecto" id="Nomb_Proyecto" maxlength="55">
            					</div>
            					<div class="col-12">
            						<label>Descripción Proyecto</label><br>
            						<textarea class="form-control" maxlength="390" name="Descrip_Proyecto" id="Descrip_Proyecto"></textarea>
            					</div>
            					<div class="col-12 mt-3">
            						<input type="file" name="uploadimg" size="1" accept="image/png, image/jpeg, image/gif" id="uploadimg" style="width: 155px;">
            					</div>
                                <div class="col-12 mt-2">
                                    <img class="img-fluid" id="imgPreview" width="250">
                                </div>
            				</div>
            			</form>
            		</div>
            		<div class="modal-footer">
            			<button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cancelar</button>
            			<button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            		</div>
            	</div>
            </div>
        </div>
    </div>
    <!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="scripts" -->
    <script src="../../Content/js/jquery-3.3.1.min.js"></script>
	<script src="../../Content/js/bootstrap-4.3.1.js"></script>
	<script src="../../Content/js/popper.min.js"></script>
	<script src="../../Content/js/script-PanelIntranet-Novedades.js"></script>
    <!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
