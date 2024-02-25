<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ojitos Sing Up</title>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                            <form name="Sing_UP"class="login100-form validate-form" action="insertnewClient.php" method="post">
					<span class="login100-form-title p-b-43">
						Registrate y cuidemos a tu amigo
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Escriba el primer nombre">
						<input class="input100" type="text" name="prinombreCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Primer Nombre</span>
					</div>
					
					
					<div class="wrap-input100">
						<input class="input100" type="text" id="segnombreCliente" name="segnombreCliente" data-validate="No puede contener numeros o hay mas de una palabra">
						<span class="focus-input100"></span>
						<span class="label-input100">Segundo Nombre</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "No puede contener numeros o hay mas de una palabra">
						<input class="input100" type="text" id="priapellidoCliente" name="priapellidoCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Primer Apellido</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="No puede contener numeros o hay mas de una palabra">
						<input class="input100" type="text" id="segapellidoCliente" name="segapellidoCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Segundo Apellido</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "No puede contener palabras">
						<input class="input100" type="text" id="documentoCliente" name="documentoCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Numero de identificacion</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="El numero inscrito no es mayor a 18">
						<input class="input100" type="number" id="edadCliente" name="edadCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">¿Cual es tu edad?</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valida tu direccion de correo, por ejemplo: ex@abc.xyz">
						<input class="input100" type="text" id="mailCliente"  name="mailCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Escribe tu direccion correo</span>
					</div>	
					<div class="wrap-input100 validate-input" data-validate="Recuerda escribir la direccion donde quieres que asistamos a tu amigo">
						<input class="input100" type="text" id="addressCliente" name="addressCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">¿Cual es tu direccion?</span>
					</div>

					<div class="wrap-input100 " data-validate="#">
						<input class="input100" type="text" id="numeroCelular" name="numeroCelular">
						<span class="focus-input100"></span>
						<span class="label-input100">Numero de celular (Opcional)</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Ingresar una contraseña">
						<input class="input100" type="password" id="passwordCliente" name="passwordCliente">
						<span class="focus-input100"></span>
						<span class="label-input100">Crea una contraseña</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Tu confirmacion no es valida">
						<input class="input100" type="password" id="passwordClienteii"  name="passwordClienteii">
						<span class="focus-input100"></span>
						<span class="label-input100">Repite tu contraseña</span>
					</div>
                                        
					<div class="flex-sb-m w-full p-t-3 p-b-32">
                                            <!--
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="check">
							<label class="label-checkbox100" for="ckb1">
								Acepto términos y condiciones y autorizo tratamiento de datos y políticas.
							</label>
						</div> -->
					</div>
					<div class="container-login100-form-btn">
                                            
						<button type="submit" class="login100-form-btn" name="sendall">
							Registrarme
						</button>
                                          
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn2">
							<a  class="login100-form-btn2" href="http://localhost/Ojitos/" style="text-decoration: none; color: aliceblue">Regresar</a>
						</button>
                                        </div>
                            </form>
                                
                            <script src= "validar_singup.js"></script>
                            <div class="login100-more" style="background-image: url('images/Logo.png');" >
                            </div>
                        </div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
        

</body>
</html>