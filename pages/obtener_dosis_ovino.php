<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_ovino'])) {
    $idOvino = $_POST['id_ovino'];

    include('../includes/db_connect.php');

    $queryDosis = "SELECT fecha, descripcion, nombre_producto, dosis_cantidad, dias_proxima_dosis, observaciones
                   FROM dosisovinos
                   WHERE id_ovino = '$idOvino'";

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
                echo '<td>Acciones</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">No se encontraron dosis para este ovino.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="7">Error al consultar las dosis.</td></tr>';
    }

    mysqli_close($conexion);
} else {
    echo '<tr><td colspan="7">Error al cargar las dosis.</td></tr>';
}
?>
