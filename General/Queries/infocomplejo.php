<?php

require_once("../../Basicas/Complejo/Modelo/complejo.php");

$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$arreglo = array();

$modeloComplejo = new Complejo();
$informacionComplejo = $modeloComplejo->getById($codigo);

if ($informacionComplejo != null){

    foreach ($informacionComplejo as $infoComplejo) {
       
        $arreglo[] = array(
                            "descripcion"=>$infoComplejo["descripcion"]     
                        );
    }
}

echo json_encode($arreglo);

?>