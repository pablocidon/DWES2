<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 6</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include "../../confUsuarios.php";//Fichero que almacena la configuración de usuario en la conexion.
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexion.
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Establecemos el control de excepciones.
    $miDB->beginTransaction();//Transacción de modo que si hay un error no almacena ningún dato.
    $departamentos=array(//Array de arrays que almacenan los departamentos a almacenar
            array(
                'CodDepartamento'=>"IDM",
                'DescDepartamento'=>"Idiomas"
            ),array(
                'CodDepartamento'=>"TEC",
                'DescDepartamento'=>"Tecnologia"
            ),array(
                'CodDepartamento'=>"FOL",
                'DescDepartamento'=>"Orientacion Laboral"
            )
    );
    $consulta = $miDB->prepare("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:CodDepartamento,:DescDepartamento)");//Establecemos la consulta preparada que vamos a ejecutar
    //Parámetros de la consulta y datos que va a almacenar
    $consulta->bindParam(":CodDepartamento",$codigo);
    $consulta->bindParam(":DescDepartamento",$descripcion);
    //Bucle que recorre los arrays con los datos para su posterior almacenamiento
    for($j=0;$j<count($departamentos);$j++){
        $codigo=$departamentos[$j]['CodDepartamento'];
        $descripcion=$departamentos[$j]['DescDepartamento'];
        $consulta->execute();//Ejecutamos la consulta
    }
    $miDB->commit();//Se almacenan los datos que han sido correctos
    echo "Se ha llevado a cabo la inserción";
}catch (Exception $exception){//Si salta la exception
    echo "Error: ".$exception->getMessage().'<br>';//Mostramos el mensaje de error
    echo "Codigo de error ".$exception->getCode().'<br>';//Mostramos el código de excepción
}finally{//En caso de que salte la excepción o no
    unset($consulta);//Cerramos la consulta
    unset($miDB);//Cerramos la conexión
}
?>
</body>
</html>