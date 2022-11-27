<?php
require_once "configPOO.php";
require_once "databasePOO.php";
require_once "userPOO.php";
require_once "validacion_correo.php";

$conn = new Conexion($host, $user, $passwd, $dbname);

$conn = $conn->crearConexion();

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



$user_registrado = (isset($_REQUEST['user'])) ? $_REQUEST['user'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";
$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : "";
$apellido = (isset($_REQUEST['apellido'])) ? $_REQUEST['apellido'] : "";
$correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo'] : ""; 

if (empty($user_registrado) || empty($contraseña) || empty($nombre) || empty($apellido) || empty($correo)) {
    header("Location: registre.php?error=faltan_cosas");
    exit;
}


//comparamos si el correo o el usuario estan en la tabla
// $consulta1 = $usuario -> compararValoresRegistro($correo, $user_registrado);
$consulta1 = $conn->query("SELECT * FROM berta_cv.usuari WHERE correo = '$correo' OR user = '$user'");

if ($consulta1-> num_rows > 0) {
    header("Location: registre.php?error=ya_en_uso");
    exit;
}

else {
    session_start();
    $usuario = new Usuario($nombre, $apellido, $correo, $user_registrado, $contraseña);
    $helper = new Helpers($nombre, $apellido, $correo, $user_registrado, $contraseña);
    if ($helper = $helper ->comprobarEmail($correo)){
        echo 'El email introducido es correcto!';
        

        $consulta2 = $usuario -> insertarValores($nombre, $apellido, $correo, $user_registrado, $contraseña);

        $resultado = $conn->query($consulta2);
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $usuario -> getNombre();
        $_SESSION['apellido'] = $usuario -> getApellido();
        
        $_SESSION['email'] = $usuario -> getEmail();

        header("Location: cv.php");
        exit;
    }
        
    else{
        header("Location: registre.php?error=correo_incorrecto");
        exit;
        
    }
           
    
    

}

?>