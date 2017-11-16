<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 1</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
            include "../../confUsuarios.php";
            $conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
            if($conexion->connect_errno){
                echo "Error al conectar: (".$conexion->connect_errno.")".$conexion->connect_errno;
            }
            echo "Conexion realizada a través de: ".$conexion->host_info.'<br>';
            $conexion->close();
        ?>
    </body>
</html>

