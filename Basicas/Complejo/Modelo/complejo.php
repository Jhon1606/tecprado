<?php 
require_once("../../../conexion.php");

class complejo extends conexion{

    public function __construct(){
        $this->conexion=parent::__construct();
    }   

    public function add($codigo,$descripcion){
    $statement=$this->conexion->prepare("INSERT INTO centros_costos(codigo,descripcion)
                                        VALUES(:codigo,:descripcion)");
    $statement->bindParam(':codigo',$codigo);
    $statement->bindParam(':descripcion',$descripcion);
    if($statement->execute()){
        header('Location: ../Vista/index.php');
    }else{
        header('Location: ../Vista/add.php');
    }

    }
  
    public function get(){
        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos");
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function getById($codigo){

        $rows=null;
        $statement=$this->conexion->prepare("SELECT * FROM centros_costos WHERE codigo=:codigo");
        $statement->bindParam(":codigo",$codigo);
        $statement->execute();
        while($result=$statement->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function update($codigo,$descripcion){
        $statement=$this->conexion->prepare("UPDATE centros_costos SET descripcion=:descripcion, WHERE codigo = :codigo");

         $statement->bindParam(':codigo',$codigo);
         $statement->bindParam(':descripcion',$descripcion);
         
         if($statement->execute()){
            header('Location: ../Vista/index.php');
         }else{
             header('Location: ../Vista/edit.php');
         }
    }

    public function delete($codigo){
        $statement=$this->conexion->prepare("DELETE FROM centros_costos WHERE codigo = :codigo");
        $statement->bindParam(":codigo",$codigo);
        if($statement->execute()){
            header('Location: ../Vista/index.php');
        }else{
            header('Location: ../Vista/delete.php');
        }
    }
}

?>