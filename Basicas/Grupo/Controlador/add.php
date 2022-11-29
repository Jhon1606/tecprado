<?php
require_once('../Modelo/grupo.php');

if ($_POST) {
    $modeloGrupo = new grupo();

    $codigo_gru = $_POST['codigo_gru'];
    $descripcion = strtoupper($_POST['descripcion']); 
    $consecutivo = $_POST['consecutivo']; 
    $tipo_medicion = $_POST['tipo_medicion']; 
    $frecuencia_mtto = $_POST['frecuencia_mtto']; 
    $modeloGrupo->existe($codigo);
    
    $modeloGrupo->add($codigo_gru,$descripcion,$consecutivo,$tipo_medicion,$frecuencia_mtto);
   
    }else{
        header('Location: ../../index.php');
    }

?>