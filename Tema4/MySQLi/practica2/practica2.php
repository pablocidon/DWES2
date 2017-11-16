<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 2</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
            include "../../confUsuarios.php";
            $miDB = new mysqli();
            $miDB->connect(HOST, USER, PASSWORD, DATABASE);
            $error = $miDB->connect_errno;
            if($miDB->connect_errno){
                echo "Error al conectarse a la base de datos<br/>";
                echo "Codigo de error:" .$db->connect_errno;
            }
            else{
                $consulta = "SELECT * FROM Departamento";

                $sentencia=$miDB->prepare($consulta);

                $sentencia->execute();

                $resultado=$sentencia->get_result();

                $numRegistros = $resultado->num_rows;

                echo "Numero de registros $numRegistros<br/>";

                $departamento=$resultado->fetch_object();

                while($departamento != null){
                    echo "Codigo Departamento:".$departamento->CodDepartamento."<br />";
                    echo "Descripcion Departamento:".$departamento->DescDepartamento."<br />";
                    echo "<br />";
                    $departamento=$resultado->fetch_object();
                }
            }
            $miDB->close();
        ?>
    </body>
</html>

