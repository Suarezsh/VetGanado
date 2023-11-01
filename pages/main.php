<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VetGanado - Página Principal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="../images/logo.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #007bff; 
        }

        .navbar + main {
            margin-top: 60px; 
            position:center;
        }

        #imagenCarousel {
            width: 80%;
        }
    </style>
</head>
<body>

<?php include('../includes/menu.php'); ?>

<main class="container">
    <div class="content">
        <?php
        session_start();
        if (isset($_SESSION['usuario'])) {
            $nombreUsuario = $_SESSION['usuario'];
            echo "<h1 class='mt-5'>Bienvenido, $nombreUsuario</h1>";
        }
        ?>

        <h2>¿Por qué usar VetGanado?</h2>
        <p>VetGanado es una solución de gestión ganadera que te ayuda a optimizar tus operaciones. Con VetGanado, puedes:</p>
        <ul>
            <li>Llevar un registro detallado de tus vacunos y ovinos.</li>
            <li>Administrar las dosis de medicamentos y vacunas de manera eficiente.</li>
            <li>Controlar la salud de tus animales y detectar enfermedades rápidamente.</li>
            <li>Optimizar la gestión de tu ganadería y mejorar tu productividad.</li>
        </ul>
        <p>¡Descubre cómo VetGanado puede hacer que tu ganadería sea más eficiente y rentable!</p>
    </div>
</main>

<div id="imagenCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#imagenCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#imagenCarousel" data-slide-to="1"></li>
        <li data-target="#imagenCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/imagen1.jpg" alt="Imagen 1" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="../images/imagen2.jpg" alt="Imagen 2" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="../images/imagen3.jpg" alt="Imagen 3" class="d-block w-100">
        </div>
    </div>
    <a class="carousel-control-prev" href="#imagenCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#imagenCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
