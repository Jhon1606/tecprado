<?php 
require_once("../../../conexion.php");

class ambiente extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$descripcion,$centro_costo,$tipo_ubicacion,){
    $statement=$this->conexion->prepare("INSERT INTO ubicacion(codigo,descripcion,centro_costo,tipo_ubicacion)
                                        VALUES(:codigo,:descripcion,:centro_costo,:tipo_ubicacion)");
    $statement->bindParam(':codigo',$codigo);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':centro_costo',$centro_costo);
    $statement->bindParam(':tipo_ubicacion',$tipo_ubicacion);
    if($statement->execute()){
        header('Location: ../Vista/index.php');
    }else{
        header('Location: ../Vista/index.php');
    }

    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.id, a.codigo, a.descripcion, b.descripcion as centro_costo, c.descripcion as tipo_ubicacion
                                             FROM ubicacion AS a
                                             INNER JOIN centros_costos AS b ON a.centro_costo = b.codigo
                                             INNER JOIN tipo_ubicacion AS c ON a.tipo_ubicacion = c.id");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getComplejos(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getTipoA(){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM tipo_ubicacion");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($ideditar){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ubicacion WHERE codigo=:ideditar");
        $statement->bindParam(":ideditar",$ideditar);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($id,$codigo,$descripcion,$tipo_ubicacion,$estado,$centro_costo){
        $statement=$this->conexion->prepare("UPDATE ubicacion SET codigo=:codigo, descripcion=:descripcion, tipo_ubicacion=:tipo_ubicacion
                                            estado=:estado,centro_costo=:centro_costo WHERE id = :id");

         $statement->bindParam(':id',$id);
         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':descripcion',$descripcion);
         $statement->bindParam(':tipo_ubicacion',$tipo_ubicacion);
         $statement->bindParam(':estado',$estado);
         $statement->bindParam(':centro_costo',$centro_costo);
         
         if($statement->execute()){
            header('Location: ../Vista/index.php');
         }else{
             header('Location: ../Vista/edit.php');
         }
    }

    public function delete($id){
        $statement=$this->conexion->prepare("DELETE FROM ubicacion WHERE id = :id");
        $statement->bindParam(":id",$id);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}

?>