<?php
require_once "configPOO.php";
require_once "databasePOO.php";
require_once "index.php";
require_once "userPOO.php";

$user_logueado = (isset($_REQUEST['user'])) ? $_REQUEST['user'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";


$conn = new Conexion($host, $user, $passwd, $dbname);

$conn = $conn->crearConexion();

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$consulta = $conn->query("SELECT * FROM berta_cv.usuari WHERE contraseña = '$contraseña' AND user = '$user_logueado'");

if ($consulta-> num_rows > 0){
    session_start();
    
    if ($row = $consulta->fetch_assoc()){
        
        $_SESSION['usuario'] = $conn->query("SELECT * FROM berta_cv.usuari WHERE contraseña = '$contraseña' AND user = '$user_logueado'");
        $_SESSION['nombre']= $row["nombre"];
        $_SESSION['apellido']= $row["apellido"];
        $_SESSION['email']= $row["correo"];
    
    
    header("Location: cv.php"); 
    exit;
    }
   
}
else {
    header("Location: index.php?error=no_en_uso");
    exit;
}




?>