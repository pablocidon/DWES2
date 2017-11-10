<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 6</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include "../confUsuarios.php";
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $filas=0;
    $departamentos=array();
    for($i=0;$i<3;$i++){
        $departamentos[$i]=array(
          'CodDepartamento'=>'',
          'DescDepartamento'=>''
        );
    }
    $departamentos[0]['CodDepartamento']="IDM";
    $departamentos[0]['DescDepartamento']="Idiomas";
    $departamentos[1]['CodDepartamento']="TEC";
    $departamentos[1]['DescDepartamento']="Tecnologia";
    $departamentos[2]['CodDepartamento']="FOL";
    $departamentos[2]['DescDepartamento']="Orientacion Laboral";
    $consulta = $miDB->exec("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:CodDepartamento,:DescDepartamento)");
    for($j=0;$j<3;$j++){
        $sentencia=$miDB->prepare($consulta);
        $sentencia->bindParam(":CodDepartamento",$departamentos[$i]['CodDepartamento']);
        $sentencia->bindParam(":DescDepartamento",$departamentos[$i]['DescDepartamento']);
        $sentencia->execute();
        $filas=$sentencia->rowCount();
    }
    if($filas==3){
        echo "Se han realizado con éxito las inserciones";
    }else{
        echo "Error en las inserciones";
    }
    unset($miDB);
}catch (Exception $exception){
    echo "Error: ".$exception->getMessage().'<br>';
    echo "Codigo de error" .$exception->getCode().'<br>';
    unset($miDB);
}
?>
</body>
</html>