
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="m-4">

    <h2>
        Programación Segura
        <small class="text-muted fs-5">
            Universidad Veracruzana
        </small>
    </h2>

    <div class="container">

        <?php
        // Validamos que nos envíen la llave del archivo.
        if (isset($_GET['index'])) {

            $array = array(
                1 => 'archivo1.txt',
                2 => 'archivo2.txt',
                3 => 'archivo3.txt',
            );

            echo "<p>El archivo solicitado es <strong>"
                . $array[$_GET['index']]
                . "</strong></p>";

            echo '<a href="file.php">Regresar</a>';

        } else {

            echo "Escoja un archivo a leer:";

            echo '
                <ul>
                    <li><a href="file.php?index=1">Archivo 1</a></li>
                    <li><a href="file.php?index=2">Archivo 2</a></li>
                    <li><a href="file.php?index=3">Archivo 3</a></li>
                </ul>
            ';
        }
        ?>

    </div>

</body>

</html>