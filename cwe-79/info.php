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
    <h2>Datos del estudiante <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información</li>
        </ol>
    </nav>
    <p>A continuación se muestran los datos del estudiante.</p>
    <div class="card mb-2">
        <div class="card-header">
            Datos del estudiante
        </div>
        <div class="card-body">
            <p><strong>Id:</strong> <?php echo $_GET["id"]; ?></p>
            <p><strong>Nombre:</strong> Roberto Sánchez</p>
            <p><strong>Edad:</strong> 22 años</p>
            <p><strong>Facultad:</strong> Facultad de Estadística e Informática</p>
        </div>
    </div>
    <p><span class="badge text-bg-primary">Usuario: <?php echo $_SESSION['user']; ?></span> <a href="salir.php">Cerrar sesión</a></p>
</body>
</html>