<?php
require_once("../../Basicas/Complejo/Modelo/complejo.php");

$codigo = $_POST["codigo"];
$arreglo = array();

$modeloComplejo = new complejo();
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