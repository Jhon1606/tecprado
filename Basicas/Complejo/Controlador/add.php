<?php
require_once('../Modelo/complejo.php');

if ($_POST) {
    $modeloComplejo = new complejo();

    $codigo = $_POST['codigo'];
    $descripcion = strtoupper($_POST['descripcion']); 
    
    if ($modeloComplejo->existe($codigo)){
        header('Location: ../Vista/index.php');
    } 
    
    $modeloComplejo->add($codigo,$descripcion);
   
    }else{
        header('Location: ../../index.php');
    }

?>