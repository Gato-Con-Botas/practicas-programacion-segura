<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['codigo'] == '7824') {
        $_SESSION['codigo'] = $_POST['codigo'];
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
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
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
                        <label for="codigo" class="form-label">Código de seguridad</label>
                        <input type="text" class="form-control" name="codigo" placeholder="Escriba el código de seguridad">
                        <?php if (isset($_POST['codigo'])) : ?>
                            <span class="text-danger">Código incorrecto</span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="login.php" class="btn btn-secondary">Regresar</a>
                    <button id="submit" type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>