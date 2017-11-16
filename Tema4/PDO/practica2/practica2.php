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
        try {
            $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);
            foreach ($miDB->query("SELECT * FROM Departamento") as $registro){
                print_r($registro);
                echo '<br>';
            }
            $miDB=null;
        } catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
        ?>
    </body>
</html>

