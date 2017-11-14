<!DOCTYPE html>
<html lang="es">
<head>
    <title>Práctica 8</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../../favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include "../../confUsuarios.php";
try {
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!filter_has_var(INPUT_POST, 'Exportar')) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="Exportar"></label>
            <input type="submit" name="Exportar" id="Exportar" value="Exportar">
        </form>
        <?php
    } else {
        $consulta = "SELECT * from Departamento";
        $sentencia = $miDB->prepare($consulta);
        $resultado = $sentencia->execute();
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Departamentos></Departamentos>'); //creación del XML y su nodo raiz
        header("Content-type: text/xml");
        while ($registro = $sentencia->fetch(PDO::FETCH_OBJ)) {
            $departamento = $xml->addChild('Departamento');
            $departamento->addChild('CodDepartamento', $registro->CodDepartamento);
            $departamento->addChild('DescDepartamento', $registro->DescDepartamento);
        }
        $xml->asXML("../xml/Departamentos.xml");
    }
    echo ("Se ha llevado a cabo la exportación");
} catch (PDOException $e) {
    echo "Error: ".$exception->getMessage().'<br>';
    echo "Codigo de error ".$exception->getCode().'<br>';
}finally{
    unset($miDB);
}
?>
</body>
</html>