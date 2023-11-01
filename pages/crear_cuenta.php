<?php
session_start();
require_once '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql_verificar = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado_verificar = $conexion->query($sql_verificar);

    if ($resultado_verificar->num_rows > 0) {
        $registro_mensaje = "El usuario ya existe. Por favor, elige otro nombre de usuario.";
    } else {
        $sql_insertar = "INSERT INTO usuarios (nombre, correo, usuario, contraseña) VALUES ('$nombre', '$correo', '$usuario', '$contrasena')";

        if ($conexion->query($sql_insertar) === TRUE) {
            $registro_mensaje = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>VetGanado - Crear cuenta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="estilos.css">
    <style> 
    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 10px;
    max-width: 400px;
    width: 100%;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.btn-primary {
    width: 100%;
}
body {
            background-image: url('../images/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }


</style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Crear Cuenta</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
            <?php
            if (isset($registro_mensaje)) {
                echo '<div class="alert alert-info">' . $registro_mensaje . '</div>';
            }
            ?>
            <p>¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesión</a></p>
        </div>
    </div>

    <!-- Incluye los archivos JS de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
