<?php
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Intranet J&C Melamina| Login</title>
	<link href="../../Content/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../Content/css/StylesLogin.css" rel="stylesheet" type="text/css">
</head>

<body style="overflow: visible;">
	<form action="../../Controllers/LogIn.php" autocomplete="off" id="frm-Login" method="post" role="form">
		<div class="limiter">
        	<div class="container-login100">
            	<div class="login100-more" style="background-image: url('../../Content/images/img_LogIn.jpg');"></div>
				<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                	<div class="col-md-12 text-center">
                    	<img class="img-responsive" width="400" src="../../Content/images/Logotipo_J&CMelamina.png">
                	</div>

                	<div class="col-md-12 col-sm-12 col-xs-12">
                    	<div class="wrap-input100 validate-input">
                        	<span class="label-input100">Usuario</span>
                        	<input class="input100" id="Usuario" name="Usuario" placeholder="" type="text" value="">
                    	</div>

                    	<div class="wrap-input100 validate-input">
                        	<span class="label-input100">Contraseña</span>
                        	<input class="input100" id="text-Clave" name="Contraseña" placeholder="" type="password">
                    	</div>

                    	<div class="wrap-login100-form-btn">
                        	<div class="login100-form-bgbtn"></div>
                        	<button class="login100-form-btn" style="width:100%;" type="submit"> Iniciar Sesión </button>
                    	</div>
                	</div>
            	</div>
        	</div>
    	</div>
	</form>	
	<script src="../../Content/js/jquery-3.3.1.min.js"></script>
	<script src="../../Content/js/popper.min.js"></script>
	<script src="../../Content/js/bootstrap.min.js"></script>
	<script src="../../Content/js/Login.js" type="text/javascript"></script>
</body>	
</html>