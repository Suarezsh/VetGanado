<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlaza el CSS de Bootstrap -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Agrega enlaces a tus archivos CSS personalizados si es necesario -->
    <style>
        body {
            background-image: url('images/vaca.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh; /* Asegura que el fondo ocupe toda la altura de la ventana */
        }

        .centered {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Centra verticalmente */
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="text-center centered">
                <h1 style="background-color: rgba(45, 231, 20, 0.374); color: black; padding: 10px;">Bienvenido a VetGanado</h1>
                <p style="background-color: rgba(45, 231, 20, 0.384); color: black; padding: 10px;">
                    Registra y administra tus vacas y dosis de manera eficiente.
                </p>
                <a href="pages/index.php" class="btn btn-primary">Iniciar Sesión</a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
