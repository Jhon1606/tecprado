<?php

require_once('../Modelo/ambiente.php');

if ($_POST) {
    $modeloAmbiente = new ambiente();

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion']; 
    $centro_costo = $_POST['centro_costo']; 
    $tipo_ubicacion = $_POST['tipo_ubicacion']; 
    
    $modeloAmbiente->add($codigo,$descripcion,$centro_costo,$tipo_ubicacion);
    }else{
        header('Location: ../../index.php');
    }

?>