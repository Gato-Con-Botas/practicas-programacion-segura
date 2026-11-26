<?php
session_start();
if (!isset($_SESSION['codigo'])) {
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
    <title>Página protegida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Sitio protegido <small class="text-muted fs-5">Universidad Veracruzana</small></h2>
    <div class="h-100 mt-5 p-5 bg-body-tertiary border rounded-3">
        <h2>Programación segura</h2>
        <p>Bienvenido a este sitio protegido por correo electrónico y un código de acceso.</p>
        <a href="login.php" class="btn btn-outline-secondary" type="button">Cerrar sesión</a>
    </div>
</body>
</html>