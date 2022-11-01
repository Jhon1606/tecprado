<?php 
require_once("../../../conexion.php");

class grupo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo_gru,$descripcion,$consecutivo,$tipo_medicion,$frecuencia_mtto){
    $statement=$this->conexion->prepare("INSERT INTO grupo_equipo(codigo_gru,descripcion,consecutivo,tipo_medicion,frecuencia_mtto)
                                        VALUES(:codigo_gru,:descripcion,:consecutivo,:tipo_medicion,:frecuencia_mtto)");
    $statement->bindParam(':codigo_gru',$codigo_gru);
    $statement->bindParam(':descripcion',$descripcion);
    $statement->bindParam(':consecutivo',$consecutivo);
    $statement->bindParam(':tipo_medicion,',$tipo_medicion,);
    $statement->bindParam(':frecuencia_mtto,',$frecuencia_mtto,);
    if($statement->execute()){
        header('Location: ../Vista/index.php');
    }else{
        header('Location: ../Vista/add.php');
    }

    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT a.codigo, a.descripcion, b.descripcion as complejo, c.descripcion as tipoambiente
                                             FROM grupo_equipo AS a
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

    public function getById($id){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM ubicacion WHERE id=:id");
        $statement->bindParam(":id",$id);
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