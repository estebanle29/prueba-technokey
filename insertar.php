<?php
    if(!isset($_POST['oculto'])){
      exit();

    }
    include 'model/conexion.php';
    $fecha = $_POST['fecha'];
    $horaSalida = $_POST['horaSalida'];
    $horaLlegada = $_POST['horaLlegada'];
    $duracion = $_POST['duracion'];
    $tipo = $_POST['tipo'];
    $costo = $_POST['costo'];

    $sentencia = $bd->prepare("INSERT INTO vuelos (fecha_del_vuelo, hora_de_salida, hora_de_llegada, duracion_del_trayecto, tipo_de_trayecto, costo_del_vuelo) VALUES (?,?,?,?,?,?); ");
    $resultado = $sentencia->execute([$fecha,$horaSalida,$horaLlegada,$duracion,$tipo,$costo]);

    if($resultado===TRUE){
        header("location:index.php");
        exit();
    }else{
        echo "ocurrio un Error";
    }

?>