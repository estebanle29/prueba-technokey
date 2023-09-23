<?php 
include 'model/conexion.php';
$sentencia = $bd->query("SELECT * FROM vuelos;");
$vuelos = $sentencia->fetchAll(PDO::FETCH_OBJ);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos</title>
    <!-- Agregar enlaces a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Agregar estilo para DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <h3>Lista de vuelos</h3>
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalVuelo">Agregar Vuelo</button>
        </div>
        <table id="datos_vuelos" class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Hora Salida</th>
                    <th>Hora Llegada</th>
                    <th>Duración en minutos</th>
                    <th>Tipo</th>
                    <th>Costo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($vuelos as $datos){
                ?>
                <tr>
                    <td><?php echo $datos->id; ?></td>
                    <td><?php echo $datos->fecha_del_vuelo; ?></td>
                    <td><?php echo $datos->hora_de_salida; ?></td>
                    <td><?php echo $datos->hora_de_llegada; ?></td>
                    <td><?php echo $datos->duracion_del_trayecto; ?></td>
                    <td><?php echo $datos->tipo_de_trayecto; ?></td>
                    <td><?php echo $datos->costo_del_vuelo; ?></td>
                    <td><a href="editar.php?id=<?php echo $datos->id ?>" class="btn btn-primary btn-sm">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $datos->id ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <hr>
        
    </div>

    <!-- Modal para ingresar vuelos -->
    <div class="modal fade" id="modalVuelo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Vuelo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="insertar.php">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required />
                        </div>
                        <div class="mb-3">
                            <label for="horaSalida" class="form-label">Hora Salida</label>
                            <input type="time" class="form-control" id="horaSalida" name="horaSalida" required />
                        </div>
                        <div class="mb-3">
                            <label for="horaLlegada" class="form-label">Hora Llegada</label>
                            <input type="time" class="form-control" id="horaLlegada" name="horaLlegada" required />
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duración en minutos</label>
                            <input type="number" class="form-control" id="duracion" name="duracion" required />
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="domestico">Domestico</option>
                                <option value="internacional">Internacional</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" class="form-control" id="costo" name="costo" required />
                        </div>
                        <input type="hidden" name="oculto" value="1">
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary">Limpiar</button>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar enlaces a los scripts de Bootstrap, jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datos_vuelos').DataTable();
        });
    </script>
</body>
</html>
