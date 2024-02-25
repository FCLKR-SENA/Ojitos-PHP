<?php
session_start();
include("Conexion.php");
if(isset($_POST['Submit']))
{
 $oldpass=($_POST['opwd']);
 $Doc=$_SESSION['username'];
 $newpassword=($_POST['npwd']);
$sql=mysqli_query($conexion,"SELECT passwordCliente FROM cliente where passwordCliente='$oldpass' && documentoCliente='$Doc'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $conexion=mysqli_query($conexion,"UPDATE cliente SET passwordCliente='$newpassword' WHERE documentoCliente='$Doc'");
 $_SESSION['msg1']="Contraseña cambiada correctamente";
}
else
{
$_SESSION['msg1']="La contraseña actual no es correcta";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ojitos Nueva clave</title>
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
<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Campo de vieja contraseña vacio");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("Campo de nueva contraseña vacio");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Campo de confirmar contraseña vacio");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Las nueva contraseña no coincide en ambos campos");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
</head>

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
				<h1>Cambia tu contraseña</h1>
                   <p style="color:red;"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
             <form name="chngpwd" id="chngpwd" action="" method="post" onSubmit="return valid();">
              <table align="center">
			  <tr height="50">
			  <td>Contraseña actual:</td>
			  <td><input type="password" name="opwd" id="opwd"></td>
			  </tr>
		  <tr height="50">
			  <td>Nueva contraseña:</td>
			  <td><input type="password" name="npwd" id="npwd"></td>
			  </tr>
		  <tr height="50">
			  <td>Confirmar nueva contraseña:</td>
			  <td><input type="password" name="cpwd" id="cpwd"></td>
			  </tr>
			  <tr>
			  <td><a href="http://localhost/Ojitos/vista/html/dashboard/Layout/inicioCliente.php">Regresar</a></td>
			  <td><input type="submit" name="Submit" value="Cambia tu contraseña"/></td>
			  </tr>
                <tr>
              <td></td>
              <td></td>
              </tr>
			  </table>
			  </form>

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
