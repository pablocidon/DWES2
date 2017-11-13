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
}catch (PDOException $exception){
    echo "Error: ".$exception->getMessage().'<br>';
    echo "Codigo de error ".$exception->getCode().'<br>';
}
$error=false;
if (filter_has_var(INPUT_POST, 'Importar')) {
    $xml_file = $_FILES['fichero']['tmp_name'];
    if (file_exists($xml_file)) {
        $xml = simplexml_load_file($xml_file);
    } else {
        $error = true;
        unset($miDB);
    }
}
if (!filter_has_var(INPUT_POST, 'Importar') || $error) {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="Fichero">Seleccione un fichero XML:</label><br/>
        <input type="file" id="fichero" name="fichero">
        <br/><br/>
        <input type="submit" name="Importar" value="Importar">
    </form>
    <?php
}else{
    $numRegistros = 0;
    $correcto = true;
    $CodDepartamento = "";
    $DescDepartamento = "";
    $miDB->beginTransaction();
    $consulta = "INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:CodDepartamento,:DescDepartamento)";
    $sentencia = $miDB->prepare($consulta);
    $sentencia->bindParam(":CodDepartamento", $CodDepartamento);
    $sentencia->bindParam(":DescDepartamento", $DescDepartamento);
    foreach ($xml->Departamento as $departamento) {
        $numRegistros++;
        $CodDepartamento = $departamento->CodDepartamento;
        $DescDepartamento = $departamento->DescDepartamento;
        try {
            $sentencia->execute();
            echo ("Se ha llevado a cabo la inserción".'<br>');
        } catch (PDOException $PdoE) {
            echo("La insercion del registro $numRegistros ha fallado<br />");
        }
    }
    $miDB->commit();
}
?>
</body>
</html>