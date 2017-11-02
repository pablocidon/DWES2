<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 2</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
        $conexion = new mysqli('localhost', 'DAW211', 'paso');
        if ($conexion->connect_errno) {
            echo "Error al conectar: (" . $conexion->connect_errno . ")" . $conexion->connect_errno;
        } else {
            echo "Conexion realizada a través de: " . $conexion->host_info . '<br>';
            mysqli_select_db($conexion, 'DAW211_DBdepartamentos') or die('No se ha podido acceder a la base de datos');
            $query = "SELECT * FROM Departamento";
            $result = mysqli_query($conexion, $query) or die('Error en la consulta: ' . mysqli_error($conexion));
            echo "<table>\n";
            while ($line = mysqli_fetch_object($result)) {
                echo "\t<tr>\n";
                foreach ($line as $col_value) {
                    echo "\t\t<td>$col_value</td>\n";
                }
                echo "\t</tr>\n";
            }
            echo "</table>\n";
            mysqli_free_result($result);
            mysqli_close($conexion);
        }
        ?>
    </body>
</html>

