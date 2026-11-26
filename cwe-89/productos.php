<?php
include_once('tienda.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de productos de informática</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="m-4">
    <h2>Tienda de productos de informática <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
        </ol>
    </nav>
    <?php
    $tienda = new Tienda();
    $mysqli = $tienda->obten_conexion();

    $consulta = "SELECT * FROM producto WHERE id_fabricante=" . $_GET["id"];
    $sentencia = $mysqli->multi_query($consulta);
    $resultado = $mysqli->store_result();

    echo "<h5>Productos del fabricante</h5>";
    echo '<p>La consulta devolvió ' . $resultado->num_rows . ' registros.</p>';

    $i = 0;
    echo '<table class="table table-sm table-striped table-bordered">';
    while ($fila = $resultado->fetch_assoc()) :
        if ($i == 0) {
            echo "<thead><tr>";
            foreach (array_keys($fila) as $columna) {
                echo "<th>{$columna}</th>";
            }
            echo "</tr></thead><tbody>";
        }
        echo "<tr>";
        foreach ($fila as $dato) {
            echo "<td>{$dato}</td>";
        }
        echo "</tr>";
        $i++;
    endwhile;
    echo '</tbody></table>';
    ?>
</body>
</html>