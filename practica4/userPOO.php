<?php

class Usuario {
    //Properties
    public $nombre;
    public $apellido;
    public $correo;
    public $contraseña;
    public $user;

    public function __construct($nombre, $apellido, $correo, $user, $contraseña){
        $status = false;
        if(preg_match("/^[a-z]+$/i", $nombre)){
            $this->nombre = $nombre;
            $nombre = ucfirst(trim($nombre));
            $status = true;
        }
        if(preg_match("/^[a-z]+$/i", $apellido)){
            $this->apellido = $apellido;
            $apellido = ucfirst(trim($apellido));
            $status = true;
        }
        
        $this->correo = $correo;
        $this->user = $user;
        $this->contraseña = $contraseña;
        return $status;
    }
    //Methods

    //Mostrar usuario
    public function getNombre (){
        return $this->nombre;
    }
    public function getApellido (){
        return $this->apellido;
    }
    public function getEmail (){
        return $this->correo;
    }
    public function getUser (){
        return $this->user;
    }
        
    //función q coge los datos introducidos en el registre.php y los añade a la tabla.
    public function insertarValores($nombre, $apellido, $correo, $user, $contraseña){
        $datos = "INSERT INTO berta_cv.usuari (nombre, apellido, correo, user, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$user', '$contraseña')";
        echo $datos;
        return $datos;
    }


    
}

?>