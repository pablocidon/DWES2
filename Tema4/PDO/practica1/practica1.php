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
            try {
                $conexion = new PDO(DATOSCONEXION, USER, PASSWORD);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Version del cliente: ",$conexion->getAttribute(PDO::ATTR_CLIENT_VERSION),'<br>';
                echo "Version del cliente: ",$conexion->getAttribute(PDO::ATTR_SERVER_VERSION),'<br>';
                echo "Estado de la conexión: ",$conexion->getAttribute(PDO::ATTR_CONNECTION_STATUS),'<br>';
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            unset($conexion);
        ?>
    </body>
</html>

