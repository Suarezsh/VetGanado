<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Agregar Ovino</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <style>
        #agregarOvinoModal {
            background-color: #F7DC6F; 
            border-radius: 10px;
        }

        #btnAgregarOvino {
            background-color: #FF5733;
            border-color: #FF5733;
            color: #fff; 
        }

        .table {
            background-color: #D2B4DE; 
        }
    </style>
</head>
<body>

<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];

  
    include('../includes/db_connect.php'); 
    $query = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        $idUsuario = $usuario['id'];
    } else {
        echo '<div class="alert alert-danger">Error al obtener información del usuario.</div>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeroIdentificacion = $_POST['numero_identificacion'];
        $nombreOvino = $_POST['nombre_ovino'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $raza = $_POST['raza'];
        $sexo = $_POST['sexo'];
        $padre = $_POST['padre'];
        $madre = $_POST['madre'];

        $insertQuery = "INSERT INTO ovinos (id_usuario, numero_identificacion, nombre_ovino, fecha_nacimiento, raza, sexo, padre, madre)
                        VALUES ('$idUsuario', '$numeroIdentificacion', '$nombreOvino', '$fechaNacimiento', '$raza', '$sexo', '$padre', '$madre')";
        if (mysqli_query($conexion, $insertQuery)) {
            echo '<div class="alert alert-success">Ovino agregado con éxito.</div>';
        } else {
            echo '<div class="alert alert-danger">Error al agregar el ovino: ' . mysqli_error($conexion) . '</div>';
        }
    }

    mysqli_close($conexion);
} else {
    header("location: index.php");
    exit();
}
?>

<?php include('../includes/menu.php'); ?> 

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Listado de Ovinos</h2>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Número de Identificación</th>
                            <th>Nombre</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Raza</th>
                            <th>Sexo</th>
                            <th>Padre</th>
                            <th>Madre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../includes/db_connect.php'); 
                        $query = "SELECT * FROM ovinos WHERE id_usuario = '$idUsuario'";
                        $result = mysqli_query($conexion, $query);

                        while ($fila = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $fila['numero_identificacion'] . '</td>';
                            echo '<td>' . $fila['nombre_ovino'] . '</td>';
                            echo '<td>' . $fila['fecha_nacimiento'] . '</td>';
                            echo '<td>' . $fila['raza'] . '</td>';
                            echo '<td>' . $fila['sexo'] . '</td>';
                            echo '<td>' . $fila['padre'] . '</td>';
                            echo '<td>' . $fila['madre'] . '</td>';
                            echo '</tr>';
                        }

                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#agregarOvinoModal">
                Agregar Ovino
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarOvinoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Ovino</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="numero_identificacion">Número de Identificación:</label>
                        <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_ovino">Nombre del Ovino (Opcional):</label>
                        <input type="text" class="form-control" id="nombre_ovino" name="nombre_ovino">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="macho">Macho</option>
                            <option value="hembra">Hembra</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="padre">Padre (Opcional):</label>
                        <input type="text" class="form-control" id="padre" name="padre">
                    </div>
                    <div class="form-group">
                        <label for="madre">Madre (Opcional):</label>
                        <input type="text" class="form-control" id="madre" name="madre">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar Ovino</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
