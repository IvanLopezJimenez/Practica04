<?php

require_once "configPOO.php";



class Conexion {
    //properties
    public $host;
    public $user; 
    public $passwd;
    public $dbname;
    public $conexion;
    //construct
    public function __construct($host, $user, $passwd, $dbname){
        $this->host = $host;
        $this->user = $user;
        $this->passwd = $passwd;
        $this->dbname = $dbname;
        
    }

    //methods
    public function crearConexion(){
        $this->conexion = new mysqli($this->host, $this->user, $this->passwd, $this->dbname);

        //chequeamos si se ha hecho bien la conexión
        if ($this->conexion -> connect_error) {
            die("Conexión fallida: ". $this->conexion->connect_error);
        }
        echo "Connected successfully";
        return $this->conexion;
    }
    
}


?>