<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 5</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
    <?php
        try{
            include "../confUsuarios.php";
            $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $miDB->beginTransaction();
            $consulta1 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('COM','Comercial')");
            $consulta2 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('AIN','Asuntos Internos')");
            $consulta3 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('RIT','Relaciones Interacionales')");
            $miDB->commit();
        }catch (Exception $exception){
            $miDB->rollBack();
            echo 'Error: '.$exception->getMessage();
            echo 'Codigo de error: '.$exception->getCode();
        }
    ?>
    </body>
</html>