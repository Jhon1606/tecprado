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
        $statement=$this->conexion->prepare("SELECT * FROM grupo_equipo");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM grupo_equipo WHERE codigo_gru=:codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    
    public function existe($codigo){
        $statement = $this->conexion->prepare("SELECT COUNT(*) FROM grupo_equipo WHERE codigo_gru = :codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        if($statement->fetchColumn()>0){
            create_flash_message("Error", "El código existe","error");
            header('Location: ../Vista/index.php');
        }
        return false;
    }

    public function update($codigo,$descripcion,$estado,$consecutivo,$tipo_medicion,$frecuencia_mtto){
        $statement=$this->conexion->prepare("UPDATE grupo_equipo SET descripcion=:descripcion, estado=:estado,
                                            consecutivo=:consecutivo,tipo_medicion=:tipo_medicion, frecuencia_mtto = :frecuencia_mtto WHERE codigo_gru = :codigo");

         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':descripcion',$descripcion);
         $statement->bindParam(':estado',$estado);
         $statement->bindParam(':consecutivo',$consecutivo);
         $statement->bindParam(':tipo_medicion',$tipo_medicion);
         $statement->bindParam(':frecuencia_mtto',$frecuencia_mtto);
         
         if($statement->execute()){
            header('Location: ../Vista/index.php');
         }else{
             header('Location: ../Vista/edit.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM grupo_equipo WHERE codigo_gru = :codigo");
        $statement->bindParam(":codigo",$codigo);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}

?>