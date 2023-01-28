<?php

class conexion{

    private $servidor = "localhost:3308";
    private $usuario = "root";
    private $db = "tecprado";
    private $password = "";

    public function __construct(){

        try {
        $conexion=new PDO("mysql:host={$this->servidor};dbname={$this->db}",$this->usuario,$this->password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
        } catch (PDOException $error) {
            echo "Error" .$error->getMessage();
        }
    }
}

?>