<?php
$host = "localhost"; 
$usuario = "root";
$contrasena = ""; 
$base_datos = "vetganado"; 

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}
?>
