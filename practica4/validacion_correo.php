<?php
require_once 'userPOO.php';
class Helpers extends Usuario{
    //propietats
    // public $email;
    //mètodes
    public function comprobarEmail($correo) {
        return (filter_var($correo, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
    }
}

?>