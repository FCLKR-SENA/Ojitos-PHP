 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojitos_db1";

$primernombre = $_POST["prinombreCliente"];
$segundonombre = $_POST["segnombreCliente"];
$primerapellido = $_POST["priapellidoCliente"];
$segundoapellido = $_POST["segapellidoCliente"];
$documento = $_POST["documentoCliente"];
$edad = $_POST["edadCliente"];
$email = $_POST["mailCliente"];
$direccion = $_POST["addressCliente"];
$celular=$_POST["numeroCelular"];
$contrasena1 = $_POST["passwordCliente"];
$contrasena2 = $_POST["passwordClienteii"];

$conexion = mysqli_connect($servername, $username, $password, $dbname);
if (!$conexion){
    die("connection failed:" .mysqli_connect_error());
}

$sql = "INSERT INTO cliente(prinombreCliente,segnombreCliente,priapellidoCliente,segapellidoCliente,documentoCliente,edadCliente,mailCliente,addressCliente,numeroCelular,passwordCliente)
VALUES ('$primernombre','$segundonombre','$primerapellido','$segundoapellido','$documento','$edad','$email','$direccion','$celular','$contrasena1')";
   
if ($primernombre!=""&& $segundonombre!=""&&$primerapellido!=""&&$segundoapellido!="" &&$documento!=""&&$edad !=""&& $celular!=""&&$email!=""&&$direccion!=""&&$contrasena1==$contrasena2) {
    
    $sql1 = "SELECT * FROM cliente WHERE documentoCliente= '$documento'";# or mailClient='$email'";
    $query = $conexion->query($sql1);
    if ($query->num_rows >0) {
        print "<script>alert(\"Ups! tu documento ya esta registrado. !Vamos e inicias sesion!\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
    }elseif (mysqli_query($conexion, $sql)) {
        print "<script>alert(\"Bienvenido a nuestra base datos, ¡Ya puedes iniciar sesion!\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
        #header('location: adopcionAdmListado.php');
        }
}else {
        print "<script>alert(\"¡Las contraseñas no coinciden!\");window.location='http://localhost/Ojitos/vista/html/Homepage/Register/Sing_Up.php';</script>" . mysqli_error($conexion);
    } 

mysqli_close($conexion);


?>