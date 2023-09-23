<?php 
    if(!isset($_GET['id'])){
        header("location:index.php");
    }
    include 'model/conexion.php';

    $id = $_GET['id'];
    $sentencia = $bd->prepare("SELECT * FROM vuelos WHERE id = ?; ");
    $sentencia->execute([$id]);
    $vuelo = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Vuelos</title>
    <!-- Agregar enlaces a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h3>Actualizar Vuelos</h3>
        </div>
        <form method="POST" action="editarProceso.php">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label for="fecha1" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha1" name="fecha1" value="<?php echo $vuelo->fecha_del_vuelo ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="horaSalida1" class="form-label">Hora Salida</label>
                        <input type="time" class="form-control" id="horaSalida1" name="horaSalida1" value="<?php echo $vuelo->hora_de_salida ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="horaLlegada1" class="form-label">Hora Llegada</label>
                        <input type="time" class="form-control" id="horaLlegada1" name="horaLlegada1" value="<?php echo $vuelo->hora_de_llegada ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="duracion1" class="form-label">Duración en minutos</label>
                        <input type="number" class="form-control" id="duracion1" name="duracion1" value="<?php echo $vuelo->duracion_del_trayecto ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="tipo1" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo1" name="tipo1" value="<?php echo $vuelo->tipo_de_trayecto ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="costo1" class="form-label">Costo</label>
                        <input type="number" class="form-control" id="costo1" name="costo1" value="<?php echo $vuelo->costo_del_vuelo ?>" required />
                    </div>
                    <input type="hidden" name="oculto">
                    <input type="hidden" name="id1" value="<?php echo $vuelo->id ?>" required />
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Agregar enlaces a los scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
