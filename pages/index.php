<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('../images/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="login-container">
                <h2 class="text-center">Iniciar Sesión</h2>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    include('../includes/db_connect.php'); 

                    $usuario = $_POST['usuario'];
                    $contraseña = $_POST['contraseña'];

                    $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
                    $resultado = mysqli_query($conexion, $sql);

                    if (mysqli_num_rows($resultado) == 1) {
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        header("location: main.php");
                        exit(); 
                    } else {
                        echo '<div class="alert alert-danger">Usuario o contraseña incorrectos.</div>';
                    }

                    mysqli_close($conexion);
                }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                </form>
                <p class="text-center mt-3">¿No tienes una cuenta? <a href="crear_cuenta.php">Crear Cuenta</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
