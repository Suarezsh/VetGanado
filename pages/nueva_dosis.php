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
        $idVaca = $_POST['id_vaca'];
        $fecha = date('Y-m-d'); 
        $descripcion = $_POST['descripcion'];
        $nombreProducto = $_POST['nombre_producto'];
        $dosisCantidad = $_POST['dosis_cantidad'];
        $diasProximaDosis = $_POST['dias_proxima_dosis'];
        $observaciones = $_POST['observaciones'];

        $insertQuery = "INSERT INTO dosisvacunos (id_usuario, id_vaca, fecha, descripcion, nombre_producto, dosis_cantidad, dias_proxima_dosis, observaciones)
                        VALUES ('$idUsuario', '$idVaca', '$fecha', '$descripcion', '$nombreProducto', '$dosisCantidad', '$diasProximaDosis', '$observaciones')";

        if (mysqli_query($conexion, $insertQuery)) {
            header("location: dosis_vacunos.php");
    exit(); 
        } else {
            echo '<div class="alert alert-danger">Error al agregar la dosis: ' . mysqli_error($conexion) . '</div>';
        }
    }

    mysqli_close($conexion); 
} else {
    header("location: index.php");
    exit();
}
?>
