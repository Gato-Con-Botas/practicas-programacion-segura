<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<p>No tiene permiso de ver esta página. <a href='login.php'>Iniciar sesión</a></p>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=" />
    <title>Lista de estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-3">
    <h2>Lista de estudiantes <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
        </ol>
    </nav>
    <p>Haga clic en el vínculo Ver datos para ver la información completa de un estudiante.</p>
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Información</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Roberto Sánchez</td>
                <td><a href="info.php?id=1">Ver datos</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Lorena Ochoa</td>
                <td><a href="info.php?id=2">Ver datos</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Luis Hernández</td>
                <td><a href="info.php?id=3">Ver datos</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Susana Ramírez</td>
                <td><a href="info.php?id=4">Ver datos</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Gabriela López</td>
                <td><a href="info.php?id=5">Ver datos</a></td>
            </tr>
        </tbody>
    </table>
    <p><span class="badge text-bg-primary">Usuario: <?php echo $_SESSION['user']; ?></span> <a href="salir.php">Cerrar sesión</a></p>
</body>
</html>