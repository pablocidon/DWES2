<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 6</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include "../../confUsuarios.php";
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $miDB->beginTransaction();
    $departamentos=array(
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
    $consulta = $miDB->prepare("INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:CodDepartamento,:DescDepartamento)");
    $consulta->bindParam(":CodDepartamento",$codigo);
    $consulta->bindParam(":DescDepartamento",$descripcion);
    for($j=0;$j<count($departamentos);$j++){
        $codigo=$departamentos[$j]['CodDepartamento'];
        $descripcion=$departamentos[$j]['DescDepartamento'];
        $consulta->execute();
    }
    $miDB->commit();
    echo "Se ha llevado a cabo la inserción";
}catch (Exception $exception){
    echo "Error: ".$exception->getMessage().'<br>';
    echo "Codigo de error ".$exception->getCode().'<br>';
}finally{
    unset($consulta);
    unset($miDB);
}
?>
</body>
</html>