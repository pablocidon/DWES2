<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 1</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
            $conexion = new mysqli('localhost', 'DAW211', 'paso');
            if($conexion->connect_errno){
                echo "Error al conectar: (".$conexion->connect_errno.")".$conexion->connect_errno;
            }
            echo "Conexion realizada a través de: ".$conexion->host_info.'<br>';
        ?>
    </body>
</html>

