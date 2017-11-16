<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Práctica 5</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
    </head>
    <body>
    <?php
    include "../../confUsuarios.php";
        try{
            $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión a la base de datos
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Control de excepciones
            $miDB->beginTransaction();//Transacción de modo que si hay un error no almacena ningún dato.
            //Consultas que se van a ejecutar
            $consulta1 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('COM','Comercial')");
            $consulta2 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('AIN','Asuntos Internos')");
            $consulta3 = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES ('RIT','Relaciones Interacionales')");
            $miDB->commit();//Se guarda lo que esté correcto
            echo "Se ha llevado a cabo la transacción.";
        }catch (Exception $exception){//Si salta la excepción
            $miDB->rollBack();//No se guardará ninguno de los datos
            echo 'Error: '.$exception->getMessage();//Mensaje de error
            echo 'Codigo de error: '.$exception->getCode();//Código de error
        }
    ?>
    </body>
</html>