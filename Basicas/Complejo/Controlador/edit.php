<?php

require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    
    $modeloProducto->update($codigo,$descripcion);
    }else{
        header('Location: ../Vista/index.php');
    }

?>