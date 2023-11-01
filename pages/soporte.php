<?php
session_start(); 

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit(); 
}
require_once('../includes/db_connect.php');

$mensaje = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cambiar_datos'])) {
    $usuario = $_SESSION['usuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $nuevo_usuario = $_POST['nuevo_usuario'];

    $sql = "UPDATE usuarios SET nombre = ?, correo = ?, usuario = ? WHERE usuario = ?";
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ssss", $nombre, $correo, $nuevo_usuario, $usuario);
        if ($stmt->execute()) {
            $_SESSION['usuario'] = $nuevo_usuario;
            $mensaje = "Datos actualizados correctamente.";
        } else {
            $error = "Error al actualizar los datos: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Error en la preparación de la consulta: " . $conexion->error;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cerrar_sesion'])) {
    session_unset();

    session_destroy();

    header("Location: index.php");
    exit();
}


$usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("s", $usuario);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    } else {
        $error = "Error al obtener los datos del usuario: " . $stmt->error;
    }
    $stmt->close();
} else {
    $error = "Error en la preparación de la consulta: " . $conexion->error;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Soporte</title>
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include('../includes/menu.php'); ?> 

<div class="container mt-4">
    <h2>Editar Datos del Usuario</h2>
    <?php if ($mensaje != "") : ?>
        <div class="alert alert-success">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <?php if ($error != "") : ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nuevo_usuario">Nuevo Usuario:</label>
            <input type="text" class="form-control" id="nuevo_usuario" name="nuevo_usuario" value="<?php echo $row['usuario']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="cambiar_datos">Guardar Cambios</button>
    </form>
</div>

<div class="container mt-4">
    <h2>Datos del Usuario</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['usuario']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<form method="post" action="">
    <button type="submit" class="btn btn-danger" name="cerrar_sesion">Cerrar Sesión</button>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
