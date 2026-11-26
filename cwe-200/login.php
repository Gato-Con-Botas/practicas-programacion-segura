<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=" />
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <script defer src="login.js"></script>
</head>
<body>
    <div class="contenedor-login mx-4">
        <h1 class="h3 text-center text-success">Universidad Veracruzana</h1>
        <h2 class="h5 text-center text-muted">Programación Segura</h2>
        <form method="post">
            <div class="card mx-auto mt-3">
                <div class="card-header">Inicio de sesión</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="cuenta@uv.mx">
                        <div class="small">Solo se permite el acceso con cuentas UV.</div>
                        <span class="text-danger d-none">No es un correo válido institucional.</span>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button id="submit" type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>