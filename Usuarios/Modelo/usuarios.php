<?php
session_start();
require_once("../../conexion.php");
require_once("../../Helpers/alert.php");


class usuarios extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }

    public function login($usuario,$password){

    $rows=null;
    $statement=$this->conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND clave = :contrasena");
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':contrasena',$password);
    $statement->execute();
    if ($statement->rowCount() == 1){
        $result=$statement->fetch();
        $_SESSION['Nombre'] = $result["user_nombre"];
        $_SESSION['Id'] = $result["empleado"];
        $_SESSION['Perfil'] = $result["perfil"];
        header('Location: ../../Basicas/Complejo/Vista/index.php');
    }
        create_flash_message("Error", "Datos incorrectos","error");
        header('Location: ../../index.php');
    }

    public function getNombre(){
        return $_SESSION['Nombre'];
    }

    public function getId(){
        return $_SESSION['Id'];
    }

    public function getPerfil(){
        return $_SESSION['Perfil'];
    }

    public function validarSesion(){
        if($_SESSION['Id']==null){
            header('Location: ../../index.php'); 
        }
    }
    
    // public function validarSesionAdministrador(){
    //     if($_SESSION['Id'] != null){
    //         if($_SESSION['Perfil']=='Docente'){
    //             header('Location: ../../Estudiantes/Vista/index.php'); 
    //         }
    //     }
    // }

    public function salir(){
        $_SESSION['Id'] = null;
        $_SESSION['Nombre'] = null;
        $_SESSION['Perfil'] = null;
        session_destroy();
        header('Location: ../../index.php');
    }
        
    }




?>