<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mantenimiento Departamentos</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<header>
    <h1>MANTENIMIENTO DE DEPARTAMENTOS</h1>
</header>
<nav>
    <a href="mtoDepartamentos.php"><button type="button"><img src="images/inicio.png" alt="inicio">Inicio</button></a>
    <a href="altaDepartamento.php"><button type="button"><img src="images/nuevo.png" alt="nuevo">Nuevo</button></a>
    <a href="modificacionDepartamento.php"><button type="button" disabled><img src="images/editar.png" alt="editar">Editar</button></a>
    <a href="borradoDepartamento.php"><button type="button" disabled><img src="images/borrar.png" alt="borrar">Borrar</button></a>
    <a href="importarDepartamento.php"><button type="button" class="abierto"><img src="images/importar.png" alt="importar">Importar</button></a>
    <a href="exportaDepartamento.php"><button type="button" disabled><img src="images/exportar.png" alt="exportar">Exportar</button></a>
    <a href="../index.html"><button type="button"><img src="images/salir.png" alt="salir">Salir</button></a>
</nav>
<br><br>
<?php
include 'Librerias/confUsuarios.php';//Incluimos la libreria para la conexion
try{
    $miDB = new PDO(DATOSCONEXION, USER, PASSWORD);//Establecemos la conexión a la base de datos
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Establecemos el control de excepciones
    $miDB->beginTransaction();
}catch (PDOException $exception){//En caso de que falle la conexión:
    echo "Error: ".$exception->getMessage().'<br>';//Mensaje de error.
    echo "Codigo de error ".$exception->getCode().'<br>';//Codigo de error.
}
$error=false;//Declaramos la variable que cambiará de valor cuando haya un error.
if (filter_has_var(INPUT_POST, 'Importar')) {//Realizar en caso de que se pulse en importar
    $xml_file = $_FILES['fichero']['tmp_name'];//Aparece el cuadro para seleccionar el documento
    if (file_exists($xml_file)) {//En caso de que exista el xml
        $xml = simplexml_load_file($xml_file);//Carga el archivo xml
    } else {//Por el contrario
        $error = true;//Se establece que hay error.
        unset($miDB);//Se cierra la conexión a la base de datos.
    }
    header('Location:mtoDepartamentos.php');
}
if (!filter_has_var(INPUT_POST, 'Importar') || $error) {//Si no ha pulsado importar o hay algún error
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="Fichero">Seleccione un fichero XML:</label><br/>
        <input type="file" id="fichero" name="fichero">
        <br/><br/>
        <input type="submit" name="Importar" value="Importar">
    </form>
    <?php
}else{//Si no hay errores
    $numRegistros = 0;//Establecemos un contador de registros
    $correcto = true;//Variable que cambiará el valor si algo falla
    $CodDepartamento = "";//Almacena el código del departamento
    $DescDepartamento = "";//Almacena la descripción del departamento
    $consulta = "INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES (:CodDepartamento,:DescDepartamento)";//Establecemos la consulta que se va a ejecutar
    $sentencia = $miDB->prepare($consulta);//Ejecutamos la consulta
    //Parámetros de la consulta que van a recibir los datos
    $sentencia->bindParam(":CodDepartamento", $CodDepartamento);
    $sentencia->bindParam(":DescDepartamento", $DescDepartamento);
    //Recorremos la consulta almacenando los datos en sus respectivas etiquetas
    foreach ($xml->Departamento as $departamento) {
        $numRegistros++;//Contamos los registros
        $CodDepartamento = $departamento->CodDepartamento;
        $DescDepartamento = $departamento->DescDepartamento;
        try {
            $sentencia->execute();//Ejecutamos la consulta.
            echo ("Se ha llevado a cabo la inserción".'<br>');
        } catch (PDOException $PdoE) {//Error que va saltar
            echo("El $numRegistros º registro ha fallado<br />");
        }
    }
    $miDB->commit();//Almacena los datos que han sido correctos
}
?>
</body>
</html>