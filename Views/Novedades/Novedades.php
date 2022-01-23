<!doctype html>
<html lang="es"><!-- InstanceBegin template="/Templates/TemplateSitioMelamina.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>J&C Melamina :: Novedades</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
	<link href="../../Content/css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
	<link href="../../Content/css/Styles.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
			<a class="navbar-brand" href="../../index.php">J&C Melamina</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent1">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="../../index.php">Inicio
							<span class="sr-only">(current)</span>
						</a>
					</li>
				  	<li class="nav-item active">
						<a class="nav-link" href="Novedades.php">Novedades
							<span class="sr-only">(current)</span>
						</a>
					</li>
				  	<li class="nav-item active">
						<a class="nav-link" href="../Nosotros/Nosotros.php">Nosotros
							<span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	
	
	<!-- InstanceBeginEditable name="main" -->
	<div class="container-fluid" style="background: rgba(198,189,189,0.87);">
        <div class="row pb-3" id="GaleryProducts">
            <!--Cards are added here (Products)-->
        </div>
							
		<template id="itemsProyecto">
			<div class="col-md-3 col-sm-6 pb-2 pb-md-0 mt-3">
				<div class="card">
            		<img class="card-img-top example-image" src="" alt="" title="" height="200">
					<div class="card-body">
						<div style="height: auto">
							<h5 class="card-title ellipsis" style="overflow:hidden; white-space:nowrap; text-overflow: ellipsis; height: 2rem;">Título</h5>
							<p class="card-text" style="overflow:auto; text-overflow: ellipsis; height: 6rem;">Descripción</p>
							<a class="btn btn-info" style="width: 100%; color: white;" target="_blank">Cotizar</a>
						</div>				   
					</div>
				</div>
			</div>
	  	</template>
	</div>
	<!-- InstanceEndEditable -->
	
	
	
	<footer class="footer bg-dark" id="idFooter">
		<div class="container text-center">
			<div class="row pb-3 pt-3">
				<div class="col-12 col-sm-6 col-md-7">
					<div class="row text-center">
						<div class="col-12">
							<h5>Contactenos Vía E-mail</h5>
							<div class="">
								<div class="mb-3">
  									<input type="email" class="form-control" id="email" placeholder="ingrese su e-mail">
								</div>
								<div class="mb-3">
									<textarea class="form-control" id="consulta" rows="5" placeholder="escribe tu consulta"></textarea>
									<button class="btn btn-success float-right mt-2" id="idSendConsult">Enviar ►</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-5">
					<div class="text-center">
						<address>
							<strong>J&C Melamina</strong><br>
								<div class="overflow-auto">
									jyc-melamina.000webhostapp.com<br>
								</div>
							<abbr title="Teléfono">Cel:</abbr> +51 924859632
						</address>
						<address>
							<strong>Email</strong><br>
							<div class="overflow-auto" id="emailPageFooter">
								
							</div>
						</address>
					</div>
				</div>
			</div>
			<span class="text-white">Copyright © J&C Melamina. Todos los desrechos Reservados.</span>
        </div>
	</footer>
	<div class="btn-whatsapp">
		<a class="imgRds" data-cod="0" href="https://wa.me/51924859632?text=Hola%20!!,%20quiero%20información%20para%20una%20instalación%20de%20un%20mueble%20de%20melamina." target="_blank">
			<img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">
		</a>
	</div>
	
	<!-- InstanceBeginEditable name="Scripts" -->
	<script src="../../Content/js/jquery-3.3.1.min.js"></script>
	<script src="../../Content/js/popper.min.js"></script>
	<script src="../../Content/js/bootstrap-4.3.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="../../Content/js/app.js" type="text/javascript"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            ContenidoPage();
            Enviar_mail();
        });
        const ContenidoPage =()=>{
            $.ajax({
                type: "post",
                url:"../../Controllers/LoadContentPage.php",
                async: true,
                data:'CargaObjeto',
                dataType:'json',
                success: data =>{
                    showEmail(data);
                },
                error : e => {
                    console.log('Error al retornar la data del contenido '+ e.message());
                }
            });
        }
        function showEmail(data){
            $("#emailPageFooter").html(data[1]['texto_contenido']);
        }
        const Enviar_mail=()=>{
            $("#idSendConsult").click(function(){
                let email=$("#email").val();
                let consult=$("#consulta").val();
                if(email===""||consult===""){
                    Swal.fire({
                      icon: 'warning',
                      title: 'Ingrese su consulta y email !!',
                      showConfirmButton: false,
                      timer: 1500
                    });
                    return;
                }
                else{
                    if(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email.trim())){
                        $.ajax({
                            type: "POST",
                            url:"../../Controllers/SendMail.php",
                            async: true,
                            data: {'correo':email,'consulta':consult},
                            success: function (data){
                                console.log(data);
                                if(data==1){
                                    Swal.fire({
                                      icon: 'success',
                                      title: 'Consulta Enviada',
                                      showConfirmButton: false,
                                      timer: 1500
                                    })
                                }
                                else{
                                    Swal.fire({
                                      icon: 'error',
                                      title: 'Error! Consulta no Enviada',
                                      showConfirmButton: false,
                                      timer: 1500
                                    })
                                }
                            },
                            error : e => {
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Error! Consulta no Enviada',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                                console.log('Error al momento de enviar su consulta '+e.message);
                            },
                            complete: c =>{
                                $("#email").val('');
                                $("#consulta").val('');
                            }
                        });
                    }
                    else{
                        Swal.fire({
                          icon: 'warning',
                          title: 'Ingrese un email válido !!',
                          showConfirmButton: false,
                          timer: 1500
                        });
                        return;
                    }
                }
            });
        }
    </script>
	<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
