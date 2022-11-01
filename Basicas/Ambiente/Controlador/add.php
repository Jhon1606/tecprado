<?php

require_once('../Modelo/ambiente.php');

if ($_POST) {
    $modeloAmbiente = new ambiente();

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion']; 
    $centro_costo = $_POST['complejo']; 
    $tipo_ubicacion = $_POST['tipoambiente']; 
    
    $modeloAmbiente->add($codigo,$descripcion,$centro_costo,$tipo_ubicacion);
    }else{
        header('Location: ../../index.php');
    }

?>