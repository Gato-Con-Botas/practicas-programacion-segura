<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] == 'invitado' || $_POST['username'] == 'admin') {
        $_SESSION['user'] = $_POST['username'];
        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=" />
    <title>Formulario con Inicio de sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor-login mx-4">
        <h1 class="h3 text-center text-success">Universidad Veracruzana</h1>
        <h2 class="h5 text-center text-muted">Programación Segura</h2>
        <form method="post">
            <div class="card mx-auto mt-3">
                <div class="card-body">
                    <h5 class="card-card-title text-center">Inicio de sesión</h5>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="username" placeholder="Escriba el usuario">
                        <?php if (isset($_POST['username'])) : ?>
                            <span class="text-danger">Credenciales incorrectas</span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Contraseña</label>
                        <input class="form-control" type="password" name="password" placeholder="Escriba su contraseña">
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>