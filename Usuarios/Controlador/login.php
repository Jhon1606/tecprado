<?php

require_once("../Modelo/usuarios.php");

if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $modelo = new usuarios();
    $modelo->login($usuario,$password);
} else{
    header('Location: ../../index.php');
}

?>