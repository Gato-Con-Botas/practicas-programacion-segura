<?php
include_once('tienda.php'); // Incluye el archivo tienda.php dentro de este

// Validamos que exista el ID del fabricante en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id_fabricante = intval($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="m-4">
    <h2>Tienda de productos de informática <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
        </ol>
    </nav>

    <?php
    // Crea el objeto que tiene las funciones de conexión a MySQL 
    $tienda = new Tienda();
    
    // Se obtiene la conexión 
    $mysqli = $tienda->obten_conexion();
    
    // Obtenemos los productos del fabricante usando consultas preparadas por seguridad
    $consulta = "SELECT p.id, p.nombre AS producto, p.precio, f.nombre AS fabricante 
                 FROM producto p 
                 INNER JOIN fabricante f ON p.id_fabricante = f.id 
                 WHERE p.id_fabricante = ?";
    
    $sentencia = $mysqli->prepare($consulta);
    $sentencia->bind_param("i", $id_fabricante);
    $sentencia->execute();
    
    $resultado = $sentencia->get_result();
    $sentencia->close();

    if ($resultado->num_rows > 0) {
        echo "<p>Listado de productos disponibles.</p>";
        echo '<table class="table table-sm table-striped table-bordered">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Producto</th>";
        echo "<th>Precio</th>";
        echo "<th>Fabricante</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$fila["id"]}</td>";
            echo "<td>{$fila["producto"]}</td>";
            echo "<td>\${$fila["precio"]}</td>";
            echo "<td>{$fila["fabricante"]}</td>";
            echo "</tr>";
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info">Este fabricante no tiene productos registrados actualmente.</div>';
    }
    ?>
</body>

</html>