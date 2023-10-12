













<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Archivos</title>
</head>
<body>
    <h1>Índice de Archivos</h1>
    <ul>
        <?php
        // Obtener la lista de archivos en el directorio
        $archivos = glob('*');
        
        // Mostrar la lista de archivos
        foreach ($archivos as $archivo) {
            // Excluir el archivo index.php de la lista
            if ($archivo != 'index.php') {
                echo '<li><a href="' . $archivo . '">' . $archivo . '</a></li>';
            }
        }
        ?>
    </ul>
</body>
</html>

