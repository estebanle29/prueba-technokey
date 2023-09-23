<?php 
  if(!isset($_GET['id'])){
    header('location: index.php');

  }
  include 'model/conexion.php';
  $codigo = $_GET['id'];
  $sentencia = $bd->prepare("DELETE FROM vuelos WHERE id = ?;");
  $resultado = $sentencia->execute([$codigo]);
  if($resultado===TRUE){
    header('location: index.php');
}else{
    echo"error al eliminar";
}

?>