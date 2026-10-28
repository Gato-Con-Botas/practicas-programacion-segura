<?php
include_once('tienda.php'); // Incluye el archivo tienda.php dentro de este 
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
            <li class="breadcrumb-item active">Inicio</li>
        </ol>
    </nav>

    <?php
    // Crea el objeto que tiene las funciones de conexión a MySQL 
    $tienda = new Tienda();
    
    // Se obtiene la conexión 
    $mysqli = $tienda->obten_conexion();
    
    // Obtenemos todos los fabricantes 
    $consulta = "SELECT * FROM fabricante";
    
    // Creamos la consulta 
    $sentencia = $mysqli->prepare($consulta);
    
    /* ejecutar la sentencia */
    $sentencia->execute();
    
    // Aqui queda el resultado 
    $resultado = $sentencia->get_result();
    $sentencia->close();

    echo "<p>Listado de todos los fabricantes.</p>";
    
    echo '<table class="table table-sm table-striped table-bordered">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Nombre</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    $i = 0;
    // Recorremos para ir fila x fila 
    while ($fila = $resultado->fetch_assoc()) :
        // Imprimimos los datos 
        echo "<tr>";
        echo "<td>{$fila["id"]}</td>";
        echo "<td><a href='productos.php?id={$fila["id"]}'>{$fila["nombre"]}</a></td>";
        echo "</tr>";
        $i++;
    endwhile;

    echo '</tbody>';
    echo '</table>';
    ?>
</body>

</html>