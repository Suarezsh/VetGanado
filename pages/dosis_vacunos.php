<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Dosis de Vacunos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .modal-dialog {
            max-width: 80%; 
        }

        .modal-content {
            width: 80%; 
            margin: 0 auto; 
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

    $queryVacunos = "SELECT * FROM vacunos WHERE id_usuario = '$idUsuario'";
    $resultVacunos = mysqli_query($conexion, $queryVacunos);
    ?>

    <?php include('../includes/menu.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Listado de Vacunos</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Identificación</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($filaVacuno = mysqli_fetch_assoc($resultVacunos)) { ?>
                            <tr>
                                <td><?php echo $filaVacuno['id']; ?></td>
                                <td><?php echo $filaVacuno['numero_identificacion']; ?></td>
                                <td><?php echo $filaVacuno['nombre_vacuno']; ?></td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#dosisModal_<?php echo $filaVacuno['id']; ?>">Ver Dosis</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    mysqli_data_seek($resultVacunos, 0);
    while ($filaVacuno = mysqli_fetch_assoc($resultVacunos)) {
        $idVaca = $filaVacuno['id'];
        ?>
        <div class="modal" id="dosisModal_<?php echo $idVaca; ?>" style="width: 100%; height: 100vh;">
            <div class="modal-dialog modal-dialog-scrollable" style="max-height: 90vh;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Dosis de la Vaca <?php echo $filaVacuno['nombre_vacuno']; ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" name="id_vaca" value="<?php echo $idVaca; ?>">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Producto</th>
                                        <th>Dosis(ml)</th>
                                        <th>Próxima Dosis</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryDosis = "SELECT fecha, descripcion, nombre_producto, dosis_cantidad, dias_proxima_dosis, observaciones
                                                   FROM dosisvacunos
                                                   WHERE id_vaca = '$idVaca'";

                                    $resultDosis = mysqli_query($conexion, $queryDosis);
                                    

                                    if ($resultDosis) {
                                        if (mysqli_num_rows($resultDosis) > 0) {
                                            while ($filaDosis = mysqli_fetch_assoc($resultDosis)) {
                                                echo '<tr>';
                                                echo '<td>' . $filaDosis['fecha'] . '</td>';
                                                echo '<td>' . $filaDosis['descripcion'] . '</td>';
                                                echo '<td>' . $filaDosis['nombre_producto'] . '</td>';
                                                echo '<td>' . $filaDosis['dosis_cantidad'] . '</td>';
                                                echo '<td>' . $filaDosis['dias_proxima_dosis'] . '</td>';
                                                echo '<td>' . $filaDosis['observaciones'] . '</td>';
                                                echo '<td>Eliminar</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="7">No se encontraron dosis para esta vaca.</td></tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">Error al consultar las dosis.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <button class="btn btn-primary" data-toggle="modal" data-target="#nuevaDosisModal">Agregar Nueva Dosis</button>
            </div>
        </div>
    </div>

    <div class="modal" id="nuevaDosisModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Nueva Dosis</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="nueva_dosis.php">
                        <div class="form-group">
                            <label for="id_vaca">Seleccione una Vaca:</label>
                            <select class="form-control" id="id_vaca" name="id_vaca" required>
                                <?php
                                $resultVacunos = mysqli_query($conexion, $queryVacunos);

                                while ($filaVacuno = mysqli_fetch_assoc($resultVacunos)) {
                                    echo '<option value="' . $filaVacuno['id'] . '">' . $filaVacuno['nombre_vacuno'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_producto">Nombre del Producto Aplicado:</label>
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                        </div>
                        <div class="form-group">
                            <label for="dosis_cantidad">Dosis (ml):</label>
                            <input type="number" class="form-control" id="dosis_cantidad" name="dosis_cantidad" required>
                        </div>
                        <div class="form-group">
                            <label for="dias_proxima_dosis">Días para la Próxima Dosis:</label>
                            <input type="number" class="form-control" id="dias_proxima_dosis" name="dias_proxima_dosis" required>
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Agregar Dosis</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <?php
    mysqli_close($conexion);
} else {
    header("location: index.php");
    exit();
}
?>

</body>
</html>
