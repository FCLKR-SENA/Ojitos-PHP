<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ojitos_db1";
$documentoiniciar = $_POST["documentoCliente"];
$contraseñainiciar = $_POST["passwordCliente"];

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("connection failed:" . mysqli_connect_error());
}

if ($documentoiniciar != "" && $contraseñainiciar = !"") {
    
    $user_id = null;
    $sql2 = "SELECT * FROM cliente WHERE (documentoCliente=\"$_POST[documentoCliente]\") and passwordCliente=\"$_POST[passwordCliente]\""; # or mailClient='$email'";
    $query2 = $conexion->query($sql2);
    while ($r = $query2->fetch_array()) {
        $user_id = ["id"];
        break;
    }
    if ($user_id == null) {
        #print "<script>alert(\"Auch! el documento o contraseña no son correctos\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
        
        $admin_id = null;
        $sql2 = "SELECT usuarios.documentoUsuario, usuarios.passwordUsers, roles.nomRol, roles.cargo
                    FROM usuarios
                    INNER JOIN roles ON usuarios.Roles_idRol = roles.idRol WHERE (documentoUsuario=\"$_POST[documentoCliente]\") AND passwordUsers = \"$_POST[passwordCliente]\" AND cargo = 'admin'";
        $query2 = $conexion->query($sql2);
        while ($r = $query2->fetch_array()) {
        $admin_id = ["id"];
        break;
        }
            if ($admin_id == null) {
                $staff_id = null;
                $sql2 = "SELECT usuarios.documentoUsuario, usuarios.passwordUsers, roles.nomRol, roles.cargo
                    FROM usuarios
                    INNER JOIN roles ON usuarios.Roles_idRol = roles.idRol WHERE (documentoUsuario=\"$_POST[documentoCliente]\") AND passwordUsers = \"$_POST[passwordCliente]\" AND cargo = 'staff'";
                $query2 = $conexion->query($sql2);
                while ($r = $query2->fetch_array()) {
                $staff_id = ["id"];
                break;
                }if($staff_id==null){
                    print "<script>alert(\"Auch! el documento o contraseña no son correctos\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
                    }else{
                        $staffActive=null;
                        $sql2 = "SELECT usuarios.documentoUsuario, usuarios.passwordUsers, roles.nomRol, roles.cargo
                        FROM usuarios
                        INNER JOIN roles ON usuarios.Roles_idRol = roles.idRol WHERE (documentoUsuario=\"$_POST[documentoCliente]\") AND passwordUsers = \"$_POST[passwordCliente]\" AND cargo = 'staff' AND estado='Activo'";
                        $query2 = $conexion->query($sql2);
                        while ($r = $query2->fetch_array()) {
                        $staff_idActive = ["id"];
                        break;
                            }if($staff_idActive==null){
                            print "<script>alert(\"Usuario inactivo contacta al Administrador\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
                                }else{
                                    session_start();
                                    $_SESSION["username"] = $documentoiniciar;
                                    print "<script>alert(\"Haz iniciado sesion como TRABAJADOR\");window.location='http://localhost/Ojitos/vista/html/dashboard/Layout/inicioEmpleado.php';</script>";
                    }}
            } else {
            session_start();
            $_SESSION["username"] = $documentoiniciar;
            print "<script>alert(\"Haz iniciado sesion como ADMINISTRADOR\");window.location='http://localhost/Ojitos/vista/html/dashboard/Layout/inicioAdmin.php';</script>";
        }
    } else {
        $ClienteActive = null;
        $sql2 = "SELECT * FROM cliente WHERE (documentoCliente=\"$_POST[documentoCliente]\") and passwordCliente=\"$_POST[passwordCliente]\" and estado='Activo'";
        $query2 = $conexion->query($sql2);
        while ($r = $query2->fetch_array()) {
            $ClienteActive = ["id"];
            break;
        }if ($ClienteActive == null) {
            print "<script>alert(\"Usuario inactivo contacta al Administrador\");window.location='http://localhost/Ojitos/vista/html/Homepage/Login/Login.html';</script>";
        } else {
            session_start();
            $_SESSION["username"] = $documentoiniciar;
            print "<script>alert(\"Haz iniciado sesion como Cliente\");window.location='http://localhost/Ojitos/vista/html/dashboard/Layout/inicioCliente.php';</script>";
           
        }
    }
} else {
    echo "aAlgiuno de los campos se encuentran vacios" . mysqli_error($conexion);
}
?>
