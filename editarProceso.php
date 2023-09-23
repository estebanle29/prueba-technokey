<?php
    if(!isset($_POST['oculto'])){
        header('location: index.php');
    }

    include 'model/conexion.php';
    $id1 = $_POST['id1'];
    $fecha1 = $_POST['fecha1'];
    $horaSalida1 = $_POST['horaSalida1'];
    $horaLlegada1 = $_POST['horaLlegada1'];
    $duracion1 = $_POST['duracion1'];
    $tipo1 = $_POST['tipo1'];
    $costo1 = $_POST['costo1'];

    $sentencia = $bd->prepare("UPDATE vuelos SET fecha_del_vuelo = ?, hora_de_salida = ?, hora_de_llegada = ?, duracion_del_trayecto = ?, tipo_de_trayecto = ?, costo_del_vuelo = ? WHERE id=?; ");
    $resultado=$sentencia->execute([$fecha1,$horaSalida1,$horaLlegada1,$duracion1,$tipo1,$costo1,$id1]);

    if($resultado===TRUE){
        header('location: index.php');
    }else{
        echo"error al actualizar";
    }




?>