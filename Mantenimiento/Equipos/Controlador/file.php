<?php

require_once('../Modelo/equipos.php');

if ($_POST) {
    $modeloEquipo = new equipo();

    $equipo = $_POST['equipo'];
    $nomdocumento = $_POST['nomdocumento'];
    $comentario = $_POST['comentario'];
    $archivo = $_FILES['archivo'];
    
    $modeloEquipo->addArchivo($equipo,$nomdocumento,$comentario,$archivo);
    }else{
        header('Location: ../../index.php');
    }

?>